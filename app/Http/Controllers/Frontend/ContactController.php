<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\NewContactInquiry;
use App\Models\ContactInquiry;
use App\Models\NewsletterSubscriber;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'phone' => ['required', 'string', 'regex:/^[0-9]{10}$/'],
            'message' => 'required|string|max:5000',
            'recaptcha_token' => 'nullable|string',
        ], [
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.regex' => 'Số điện thoại phải có đúng 10 chữ số.',
            'message.required' => 'Vui lòng nhập nội dung tin nhắn.',
            'message.max' => 'Nội dung tin nhắn không được quá 5000 ký tự.',
        ]);

        // Verify reCAPTCHA if configured
        $secretKey = Setting::get('recaptcha_secret_key');
        if ($secretKey && !empty($secretKey)) {
            $recaptchaToken = $request->input('recaptcha_token');

            if (empty($recaptchaToken)) {
                return back()
                    ->withInput()
                    ->with('error', 'Xác thực reCAPTCHA thất bại. Vui lòng thử lại.');
            }

            $verified = $this->verifyRecaptcha($recaptchaToken, $secretKey, $request->ip());

            if (!$verified) {
                return back()
                    ->withInput()
                    ->with('error', 'Xác thực reCAPTCHA thất bại. Vui lòng thử lại.');
            }
        }

        $inquiry = ContactInquiry::create([
            'phone' => $validated['phone'],
            'message' => $validated['message'],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        // Send email notification
        try {
            $adminEmail = Setting::get('notification_email') ?: Setting::get('contact_email');
            if ($adminEmail) {
                Mail::to($adminEmail)->send(new NewContactInquiry($inquiry));
            }
        } catch (\Exception $e) {
            Log::error('Failed to send contact notification: ' . $e->getMessage());
        }

        return back()->with('success', 'Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất có thể.');
    }

    /**
     * Verify reCAPTCHA v3 token
     */
    private function verifyRecaptcha(string $token, string $secretKey, string $ip): bool
    {
        try {
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => $secretKey,
                'response' => $token,
                'remoteip' => $ip,
            ]);

            $result = $response->json();

            // Log for debugging (optional)
            Log::debug('reCAPTCHA verification result', [
                'success' => $result['success'] ?? false,
                'score' => $result['score'] ?? null,
                'action' => $result['action'] ?? null,
            ]);

            // Check if verification was successful
            if (!isset($result['success']) || !$result['success']) {
                Log::warning('reCAPTCHA verification failed', [
                    'error-codes' => $result['error-codes'] ?? [],
                ]);
                return false;
            }

            // Check score (0.0 - 1.0, higher is more likely human)
            // 0.5 is a reasonable threshold, adjust as needed
            $score = $result['score'] ?? 0;
            if ($score < 0.5) {
                Log::warning('reCAPTCHA score too low', ['score' => $score]);
                return false;
            }

            // Verify action matches
            if (isset($result['action']) && $result['action'] !== 'contact') {
                Log::warning('reCAPTCHA action mismatch', ['action' => $result['action']]);
                return false;
            }

            return true;
        } catch (\Exception $e) {
            Log::error('reCAPTCHA verification error', ['error' => $e->getMessage()]);
            // If verification fails due to network issues, you might want to allow submission
            // For strict security, return false
            return false;
        }
    }

    public function newsletter(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255|unique:newsletter_subscribers,email',
        ]);

        NewsletterSubscriber::create([
            'email' => $validated['email'],
            'ip_address' => $request->ip(),
        ]);

        return back()->with('newsletter_success', 'Đăng ký nhận tin thành công!');
    }
}
