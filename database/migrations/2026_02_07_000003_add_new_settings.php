<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Update existing contact_address label
        DB::table('settings')
            ->where('key', 'contact_address')
            ->update([
                'label' => 'Địa chỉ văn phòng',
                'description' => 'Địa chỉ văn phòng công ty',
            ]);

        // Insert warehouse address setting
        DB::table('settings')->insert([
            'key' => 'contact_warehouse_address',
            'value' => '',
            'type' => 'textarea',
            'group' => 'contact',
            'label' => 'Địa chỉ kho hàng',
            'description' => 'Địa chỉ kho hàng của công ty',
            'order' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Shift order of existing settings after order 4 in contact group
        DB::table('settings')
            ->where('group', 'contact')
            ->where('key', '!=', 'contact_warehouse_address')
            ->where('order', '>=', 5)
            ->increment('order');

        // Insert notification email setting
        DB::table('settings')->insert([
            'key' => 'notification_email',
            'value' => '',
            'type' => 'email',
            'group' => 'contact',
            'label' => 'Email nhận thông báo',
            'description' => 'Email nhận thông báo khi có liên hệ mới. Để trống sẽ dùng email liên hệ.',
            'order' => 10,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        DB::table('settings')
            ->where('key', 'contact_address')
            ->update([
                'label' => 'Địa chỉ',
                'description' => 'Địa chỉ công ty',
            ]);

        DB::table('settings')
            ->whereIn('key', ['contact_warehouse_address', 'notification_email'])
            ->delete();
    }
};
