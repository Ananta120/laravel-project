<?php

namespace Database\Seeders;

use App\Models\campaign;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    public function run(): void
    {
        campaign::create([
            'title' => 'bantu korban banjir',
            'description' => 'donasi untuk korban banjir.',
            'target_amount' => 100000000,
            'collected_donation' => 250000000,
            'deadline' => '2026-12-31',
        ]);

        campaign::create([
            'title' => 'beasiswa untuk anak yatim',
            'description' => 'pendidikan untuk anak yatim.',
            'target_amount' => 200000000,
            'collected_donation' => 150000000,
            'deadline' => '2026-11-30',
        ]);
    }
}
