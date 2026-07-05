<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Discussion;
use App\Models\Material;
use App\Models\Quiz;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminUserSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(AdminUserSeeder::class);

        $categories = collect([
            ['name' => 'Matematika', 'slug' => 'matematika', 'type' => 'material'],
            ['name' => 'Bahasa Inggris', 'slug' => 'bahasa-inggris', 'type' => 'material'],
            ['name' => 'IPA', 'slug' => 'ipa', 'type' => 'material'],
        ])->map(fn (array $category) => Category::query()->create($category));

        Material::query()->create([
            'category_id' => $categories[0]->id,
            'title' => 'Pengenalan Pecahan',
            'slug' => 'pengenalan-pecahan',
            'excerpt' => 'Materi dasar pecahan untuk siswa SMP.',
            'content' => 'Konten materi pecahan akan dikembangkan lebih lanjut.',
            'status' => 'published',
            'is_featured' => true,
            'published_at' => now(),
        ]);

        Quiz::query()->create([
            'title' => 'Latihan Pecahan Dasar',
            'slug' => 'latihan-pecahan-dasar',
            'description' => 'Uji pemahaman dasar tentang pecahan.',
            'difficulty_level' => 'beginner',
            'duration_in_minutes' => 20,
            'attempt_limit' => 3,
            'status' => 'published',
        ]);

        Discussion::query()->create([
            'title' => 'Tips belajar matematika agar tidak bosan',
            'slug' => 'tips-belajar-matematika',
            'body' => 'Bagikan pengalaman dan strategi belajar terbaikmu di sini.',
            'status' => 'open',
            'is_pinned' => true,
        ]);
    }
}
