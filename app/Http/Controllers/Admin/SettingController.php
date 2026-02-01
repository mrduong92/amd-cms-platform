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
        $siteId = adminSiteId();

        // Get settings for current site, falling back to global settings
        $settings = Setting::where('group', $group)
            ->where(function ($q) use ($siteId) {
                $q->where('site_id', $siteId)
                  ->orWhereNull('site_id');
            })
            ->orderBy('site_id', 'desc') // Site-specific first
            ->orderBy('order')
            ->get()
            ->unique('key'); // Remove duplicates, keeping site-specific

        $groups = Setting::distinct()->pluck('group');

        return view('admin.settings.index', compact('settings', 'groups', 'group'));
    }

    public function update(Request $request)
    {
        $settings = $request->except(['_token', 'group']);
        $siteId = adminSiteId();

        foreach ($settings as $key => $value) {
            // First, try to find site-specific setting
            $setting = Setting::where('key', $key)->where('site_id', $siteId)->first();

            if (!$setting) {
                // Find global setting as template
                $globalSetting = Setting::where('key', $key)->whereNull('site_id')->first();

                if (!$globalSetting) {
                    continue;
                }

                // Create site-specific setting based on global template
                $setting = Setting::create([
                    'site_id' => $siteId,
                    'key' => $key,
                    'value' => $value,
                    'type' => $globalSetting->type,
                    'group' => $globalSetting->group,
                    'label' => $globalSetting->label,
                    'description' => $globalSetting->description,
                    'order' => $globalSetting->order,
                ]);

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

            $setting->update(['value' => $value]);
            Setting::clearCache();
        }

        return redirect()->route('admin.settings.index', ['group' => $request->group ?? 'general'])
            ->with('success', 'Cài đặt đã được lưu.');
    }
}
