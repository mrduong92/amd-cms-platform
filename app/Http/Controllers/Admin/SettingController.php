<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        $group = $request->get('group', 'general');
        $settings = Setting::getByGroup($group);
        $groups = Setting::distinct()->pluck('group');

        return view('admin.settings.index', compact('settings', 'groups', 'group'));
    }

    public function update(Request $request)
    {
        $settings = $request->except(['_token', 'group']);

        foreach ($settings as $key => $value) {
            $setting = Setting::where('key', $key)->first();

            if (!$setting) {
                continue;
            }

            // Handle file uploads
            if ($setting->type === 'image' && $request->hasFile($key)) {
                // Delete old file
                if ($setting->value) {
                    Storage::disk('public')->delete($setting->value);
                }
                $value = $request->file($key)->store('settings', 'public');
            }

            Setting::set($key, $value);
        }

        return redirect()->route('admin.settings.index', ['group' => $request->group ?? 'general'])
            ->with('success', 'Cài đặt đã được lưu.');
    }
}
