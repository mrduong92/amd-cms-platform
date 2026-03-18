<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('settings')
            ->where('key', 'social_zalo')
            ->update([
                'key' => 'social_zalo_oa_id',
                'type' => 'text',
                'label' => 'Zalo OA ID',
                'description' => 'ID của Zalo Official Account (dùng cho Zalo Chat Widget)',
                'value' => '',
            ]);
    }

    public function down(): void
    {
        DB::table('settings')
            ->where('key', 'social_zalo_oa_id')
            ->update([
                'key' => 'social_zalo',
                'type' => 'url',
                'label' => 'Zalo',
                'description' => 'Link Zalo OA',
                'value' => 'https://zalo.me/nmtauto',
            ]);
    }
};
