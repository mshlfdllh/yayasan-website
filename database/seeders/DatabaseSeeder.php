<?php

namespace Database\Seeders;

use App\Models\Achievement;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\OrganizationMember;
use App\Models\Program;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'name'     => 'Administrator',
            'email'    => 'admin@yayasan.org',
            'password' => Hash::make('password'),
            'role'     => 'admin',
        ]);

        User::create([
            'name'     => 'Editor',
            'email'    => 'editor@yayasan.org',
            'password' => Hash::make('password'),
            'role'     => 'editor',
        ]);

        // Site settings
        $settings = [
            ['key' => 'site_name',        'value' => 'Yayasan Cahaya Bangsa',         'label' => 'Nama Situs',           'group' => 'general'],
            ['key' => 'site_tagline',     'value' => 'Mencerdaskan Generasi, Membangun Bangsa', 'label' => 'Tagline',   'group' => 'general'],
            ['key' => 'site_description', 'value' => 'Yayasan Cahaya Bangsa adalah lembaga nirlaba yang berdedikasi untuk meningkatkan kualitas pendidikan anak-anak kurang mampu di seluruh Indonesia.', 'label' => 'Deskripsi', 'group' => 'general'],
            ['key' => 'contact_email',    'value' => 'info@cahayabangsa.org',          'label' => 'Email Kontak',         'group' => 'contact'],
            ['key' => 'contact_phone',    'value' => '+62 21 1234 5678',               'label' => 'Telepon',              'group' => 'contact'],
            ['key' => 'contact_address',  'value' => 'Jl. Pendidikan No. 45, Jakarta Selatan, DKI Jakarta 12345', 'label' => 'Alamat', 'group' => 'contact'],
            ['key' => 'foundation_year',  'value' => '2010',                           'label' => 'Tahun Berdiri',        'group' => 'about'],
            ['key' => 'vision',           'value' => 'Menjadi lembaga pendidikan terpercaya yang mampu mewujudkan generasi bangsa yang cerdas, berkarakter, dan mandiri.',  'label' => 'Visi', 'group' => 'about'],
            ['key' => 'mission',          'value' => "1. Memberikan akses pendidikan berkualitas bagi anak-anak kurang mampu\n2. Membangun karakter dan moral generasi muda\n3. Mengembangkan potensi akademik dan non-akademik siswa\n4. Membangun kemitraan dengan berbagai pihak untuk mendukung program pendidikan", 'label' => 'Misi', 'group' => 'about'],
            ['key' => 'history',          'value' => 'Yayasan Cahaya Bangsa didirikan pada tahun 2010 oleh sekelompok akademisi dan praktisi yang peduli terhadap perkembangan pendidikan di Indonesia. Berawal dari keprihatinan terhadap masih banyaknya anak-anak berbakat yang tidak dapat mengakses pendidikan berkualitas karena keterbatasan ekonomi, para pendiri bertekad untuk hadir sebagai jembatan antara potensi dan kesempatan.', 'label' => 'Sejarah', 'group' => 'about'],
            ['key' => 'facebook_url',     'value' => 'https://facebook.com/cahayabangsa', 'label' => 'Facebook',         'group' => 'social'],
            ['key' => 'instagram_url',    'value' => 'https://instagram.com/cahayabangsa', 'label' => 'Instagram',       'group' => 'social'],
            ['key' => 'youtube_url',      'value' => 'https://youtube.com/@cahayabangsa', 'label' => 'YouTube',          'group' => 'social'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::create(array_merge($setting, ['type' => 'text']));
        }

        // Programs
        $programs = [
            [
                'title'             => 'Beasiswa Pendidikan',
                'short_description' => 'Program beasiswa penuh untuk siswa berprestasi dari keluarga kurang mampu.',
                'description'       => 'Program Beasiswa Pendidikan kami dirancang khusus untuk membantu siswa-siswa berbakat yang memiliki keterbatasan ekonomi. Kami menyediakan bantuan biaya pendidikan mulai dari tingkat SD hingga SMA, termasuk biaya sekolah, perlengkapan belajar, dan uang saku bulanan.',
                'status'            => 'active',
                'is_featured'       => true,
                'order'             => 1,
                'icon'              => '🎓',
            ],
            [
                'title'             => 'Kelas Bimbingan Belajar',
                'short_description' => 'Bimbingan belajar gratis untuk mata pelajaran inti oleh tenaga pengajar profesional.',
                'description'       => 'Kelas Bimbingan Belajar kami menyediakan tutoring gratis untuk mata pelajaran utama seperti Matematika, IPA, Bahasa Indonesia, dan Bahasa Inggris. Dipandu oleh tenaga pengajar berpengalaman dan relawan dari berbagai perguruan tinggi terkemuka.',
                'status'            => 'active',
                'is_featured'       => true,
                'order'             => 2,
                'icon'              => '📚',
            ],
            [
                'title'             => 'Pelatihan Keterampilan Digital',
                'short_description' => 'Mempersiapkan generasi muda untuk menghadapi era digital dengan skill yang relevan.',
                'description'       => 'Di era digital ini, kami berkomitmen untuk membekali siswa dengan keterampilan teknologi yang relevan. Program ini mencakup pelatihan coding dasar, desain grafis, dan literasi digital yang akan membantu mereka bersaing di masa depan.',
                'status'            => 'active',
                'is_featured'       => true,
                'order'             => 3,
                'icon'              => '💻',
            ],
            [
                'title'             => 'Pengembangan Karakter',
                'short_description' => 'Program pembentukan karakter dan kepemimpinan melalui kegiatan ekstrakurikuler.',
                'description'       => 'Kami percaya bahwa pendidikan bukan hanya soal akademik. Program Pengembangan Karakter kami mencakup pelatihan kepemimpinan, kegiatan seni dan budaya, olahraga, serta pengembangan soft skills yang akan membentuk generasi penerus bangsa yang berkarakter.',
                'status'            => 'active',
                'is_featured'       => false,
                'order'             => 4,
                'icon'              => '⭐',
            ],
            [
                'title'             => 'Bantuan Perlengkapan Sekolah',
                'short_description' => 'Distribusi seragam, buku, dan perlengkapan belajar bagi siswa yang membutuhkan.',
                'description'       => 'Program ini menyediakan bantuan perlengkapan sekolah lengkap termasuk seragam, tas, buku pelajaran, dan alat tulis bagi siswa-siswa yang membutuhkan. Kami berkolaborasi dengan berbagai donatur untuk memastikan tidak ada siswa yang tidak bisa belajar karena kekurangan perlengkapan.',
                'status'            => 'active',
                'is_featured'       => false,
                'order'             => 5,
                'icon'              => '🎒',
            ],
        ];

        foreach ($programs as $program) {
            Program::create($program);
        }

        // Achievements
        $achievements = [
            ['student_name' => 'Budi Santoso',    'education_level' => 'sma', 'competition_name' => 'Olimpiade Matematika',        'competition_level' => 'nasional',     'award' => 'Medali Emas',   'year' => 2024, 'is_featured' => true],
            ['student_name' => 'Sari Dewi',       'education_level' => 'smp', 'competition_name' => 'Lomba Karya Tulis Ilmiah',    'competition_level' => 'provinsi',     'award' => 'Juara 1',       'year' => 2024, 'is_featured' => true],
            ['student_name' => 'Ahmad Fauzi',     'education_level' => 'sd',  'competition_name' => 'Lomba Cerdas Cermat',         'competition_level' => 'kabupaten',    'award' => 'Juara 2',       'year' => 2024, 'is_featured' => false],
            ['student_name' => 'Putri Rahayu',    'education_level' => 'sma', 'competition_name' => 'Olimpiade Fisika',            'competition_level' => 'nasional',     'award' => 'Medali Perak',  'year' => 2023, 'is_featured' => true],
            ['student_name' => 'Rizky Pratama',   'education_level' => 'smp', 'competition_name' => 'Lomba Debat Bahasa Inggris',  'competition_level' => 'provinsi',     'award' => 'Juara 3',       'year' => 2023, 'is_featured' => false],
            ['student_name' => 'Anita Kusuma',    'education_level' => 'sd',  'competition_name' => 'Lomba Menggambar',            'competition_level' => 'kabupaten',    'award' => 'Juara 1',       'year' => 2023, 'is_featured' => false],
            ['student_name' => 'Dian Purnama',    'education_level' => 'sma', 'competition_name' => 'Olimpiade Kimia',             'competition_level' => 'nasional',     'award' => 'Medali Perunggu','year' => 2023, 'is_featured' => false],
            ['student_name' => 'Fajar Nugroho',   'education_level' => 'sma', 'competition_name' => 'Kompetisi Robotika',          'competition_level' => 'internasional', 'award' => 'Best Innovation','year' => 2024,'is_featured' => true],
        ];

        foreach ($achievements as $achievement) {
            Achievement::create($achievement);
        }

        // Gallery categories
        $categories = [
            GalleryCategory::create(['name' => 'Kegiatan Belajar', 'slug' => 'kegiatan-belajar']),
            GalleryCategory::create(['name' => 'Prestasi Siswa',   'slug' => 'prestasi-siswa']),
            GalleryCategory::create(['name' => 'Acara & Event',    'slug' => 'acara-event']),
            GalleryCategory::create(['name' => 'Fasilitas',        'slug' => 'fasilitas']),
        ];

        // Gallery items (sample - no real images, just data)
        for ($i = 1; $i <= 8; $i++) {
            Gallery::create([
                'title'               => "Galeri Foto {$i}",
                'description'         => "Dokumentasi kegiatan yayasan {$i}",
                'image_path'          => "gallery/sample-{$i}.jpg",
                'gallery_category_id' => $categories[array_rand($categories)]->id,
                'is_featured'         => $i <= 4,
                'order'               => $i,
                'taken_at'            => now()->subDays(rand(1, 365)),
            ]);
        }

        // News categories
        $newsCategories = [
            NewsCategory::create(['name' => 'Berita',    'slug' => 'berita']),
            NewsCategory::create(['name' => 'Program',   'slug' => 'program']),
            NewsCategory::create(['name' => 'Prestasi',  'slug' => 'prestasi']),
            NewsCategory::create(['name' => 'Kegiatan',  'slug' => 'kegiatan']),
        ];

        // News articles
        $newsData = [
            ['title' => 'Yayasan Cahaya Bangsa Raih Penghargaan Lembaga Pendidikan Terbaik 2024',  'is_featured' => true,  'cat' => 0],
            ['title' => 'Program Beasiswa Baru Dibuka untuk Tahun Ajaran 2024/2025',               'is_featured' => true,  'cat' => 1],
            ['title' => 'Siswa Kami Raih Medali Emas di Olimpiade Matematika Nasional',             'is_featured' => false, 'cat' => 2],
            ['title' => 'Pelatihan Keterampilan Digital Hadir di 5 Kota Baru',                     'is_featured' => false, 'cat' => 1],
            ['title' => 'Acara Malam Apresiasi Siswa Berprestasi 2024',                            'is_featured' => false, 'cat' => 3],
            ['title' => 'Kolaborasi Baru dengan Universitas Terkemuka untuk Program Mentoring',    'is_featured' => false, 'cat' => 0],
        ];

        $admin = User::where('role', 'admin')->first();

        foreach ($newsData as $i => $data) {
            News::create([
                'title'           => $data['title'],
                'excerpt'         => 'Baca selengkapnya tentang ' . strtolower($data['title']) . ' di artikel ini.',
                'content'         => '<p>Konten artikel lengkap tentang ' . $data['title'] . '. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p><p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.</p>',
                'user_id'         => $admin->id,
                'news_category_id'=> $newsCategories[$data['cat']]->id,
                'status'          => 'published',
                'published_at'    => now()->subDays($i * 7),
                'is_featured'     => $data['is_featured'],
                'views'           => rand(50, 500),
            ]);
        }

        // Organization members
        $members = [
            ['name' => 'Prof. Dr. H. Ahmad Subagyo, M.Pd.',     'position' => 'Ketua Yayasan',     'order' => 1],
            ['name' => 'Dra. Hj. Sri Mulyani, M.M.',            'position' => 'Sekretaris',         'order' => 2],
            ['name' => 'Ir. Bambang Hermanto, M.T.',             'position' => 'Bendahara',          'order' => 3],
            ['name' => 'Dr. Siti Rahayu, M.Pd.',                 'position' => 'Kepala Program',     'order' => 4],
            ['name' => 'Drs. Hendra Wijaya, M.Si.',              'position' => 'Koordinator Beasiswa','order' => 5],
            ['name' => 'Yulia Permatasari, S.Kom.',              'position' => 'Koordinator IT',     'order' => 6],
        ];

        foreach ($members as $member) {
            OrganizationMember::create(array_merge($member, ['is_active' => true]));
        }
    }
}