<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenjangs = [
            ['name' => 'SD', 'slug' => 'sd'],
            ['name' => 'SMP', 'slug' => 'smp'],
            ['name' => 'SMA', 'slug' => 'sma'],
            ['name' => 'TKA', 'slug' => 'tka'],
            ['name' => 'OSN', 'slug' => 'osn'],
            ['name' => 'Umum', 'slug' => 'umum'],
        ];

        foreach ($jenjangs as $jenjang) {
            \App\Models\Jenjang::firstOrCreate(['slug' => $jenjang['slug']], $jenjang);
        }
    }
}
