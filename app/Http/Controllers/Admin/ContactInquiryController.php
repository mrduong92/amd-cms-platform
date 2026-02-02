<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use Illuminate\Http\Request;

class ContactInquiryController extends Controller
{
    public function index(Request $request)
    {
        $query = ContactInquiry::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('phone', 'like', '%' . $request->search . '%')
                    ->orWhere('subject', 'like', '%' . $request->search . '%');
            });
        }

        $inquiries = $query->latest()->paginate(15);
        $newCount = ContactInquiry::new()->count();

        return view('admin.inquiries.index', compact('inquiries', 'newCount'));
    }

    public function show(ContactInquiry $inquiry)
    {
        $inquiry->markAsRead();

        return view('admin.inquiries.show', compact('inquiry'));
    }

    public function updateStatus(Request $request, ContactInquiry $inquiry)
    {
        $request->validate([
            'status' => 'required|in:new,read,replied,closed',
            'admin_notes' => 'nullable|string',
        ]);

        $inquiry->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes,
        ]);

        return redirect()->back()->with('success', 'Trạng thái đã được cập nhật.');
    }

    public function destroy(ContactInquiry $inquiry)
    {
        $inquiry->delete();

        return redirect()->route('admin.inquiries.index')
            ->with('success', 'Yêu cầu liên hệ đã được xóa.');
    }
}
