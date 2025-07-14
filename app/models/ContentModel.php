<?php

/**
 * Content Model
 * 
 * Centralized data management for all landing page content
 */
class ContentModel
{
    /**
     * Get hero section data
     * 
     * @return array
     */
    public static function getHeroData()
    {
        return [
            'title' => 'Bangun Rumah Impian Anda',
            'subtitle' => 'Desain modern, konstruksi berkualitas, dan solusi berkelanjutan untuk mewujudkan hunian ideal sesuai gaya hidup Anda.',
            'slides' => [
                [
                    'image' => 'assets/images/1.webp',
                    'alt' => 'Desain arsitektur modern villa dengan pemandangan alam',
                    'title' => 'Villa Modern Minimalis'
                ],
                [
                    'image' => 'assets/images/2.webp',
                    'alt' => 'Interior ruang tamu kontemporer dengan pencahayaan alami',
                    'title' => 'Interior Kontemporer'
                ],
                [
                    'image' => 'assets/images/5.webp',
                    'alt' => 'Desain komersial modern dengan fasad kaca',
                    'title' => 'Arsitektur Komersial'
                ]
            ],
            'cta_buttons' => [
                [
                    'text' => 'Mulai Konsultasi Gratis',
                    'href' => '#contact',
                    'type' => 'primary',
                    'icon' => 'arrow-right'
                ],
                [
                    'text' => 'Lihat Hasil Karya',
                    'href' => '#portfolio',
                    'type' => 'secondary',
                    'icon' => 'external-link'
                ]
            ]
        ];
    }

    /**
     * Get about section data
     * 
     * @return array
     */
    public static function getAboutData()
    {
        return [
            'title' => 'Tentang Kami',
            'description' => 'Antosa Architect adalah perusahaan terkemuka yang bergerak di bidang arsitektur, perencanaan pembangunan, jasa konstruksi, hingga renovasi bangunan. Dengan pengalaman lebih dari 10 tahun, kami telah membantu ribuan keluarga Indonesia mewujudkan rumah impian mereka. Didukung oleh tim profesional bersertifikasi dan berpengalaman, kami berkomitmen untuk menghadirkan desain yang tidak hanya estetis, tetapi juga fungsional, nyaman dan aman.',
            'vision' => 'Mewujudkan kualitas hidup masyarakat dengan menciptakan bangunan yang nyaman dan aman.',
            'mission' => [
                'Menciptakan desain yang sesuai dengan karakter pemilik.',
                'Menciptakan keunikan dalam setiap karya desain.',
                'Menciptakan bangunan yang selaras dengan alam dan ramah lingkungan.',
                'Menjadi perusahaan arsitek yang bisa menjadi inspirasi dan manfaat untuk banyak orang dan alam semesta.',
                'Menjadi perusahaan arsitek global yang terus memperluas bisnis perusahaan.'
            ],
            'stats' => [
                [
                    'value' => 10,
                    'suffix' => '+',
                    'label' => 'Tahun Pengalaman',
                    'gradient' => 'from-primary-400 via-primary-500 to-primary-600',
                    'duration' => 2000
                ],
                [
                    'value' => 239,
                    'suffix' => '+',
                    'label' => 'Proyek Selesai',
                    'gradient' => 'from-primary-400 via-primary-500 to-primary-600',
                    'duration' => 2500
                ],
                [
                    'value' => 58,
                    'suffix' => '+',
                    'label' => 'Konstruksi',
                    'gradient' => 'from-primary-400 via-primary-500 to-primary-600',
                    'duration' => 2200
                ]
            ],

            'team' => [
                [
                    'name' => 'Ahmad Farhan',
                    'position' => 'Principal Architect',
                    'bio' => 'Berpengalaman lebih dari 15 tahun dalam bidang arsitektur.',
                    'image' => 'https://source.unsplash.com/100x100/?portrait,man,architect&sig=1',
                    'social' => [
                        'linkedin' => '#',
                        'twitter' => '#',
                        'email' => 'ahmad.farhan@antosa.com'
                    ]
                ],
                [
                    'name' => 'Sarah Wijaya',
                    'position' => 'Senior Interior Designer',
                    'bio' => 'Spesialis desain interior dengan fokus pada sustainable design.',
                    'image' => 'https://source.unsplash.com/100x100/?portrait,woman,designer&sig=2',
                    'social' => [
                        'linkedin' => '#',
                        'twitter' => '#',
                        'email' => 'sarah.wijaya@antosa.com'
                    ]
                ],
                [
                    'name' => 'Budi Santoso',
                    'position' => 'Project Manager',
                    'bio' => 'Mengelola proyek konstruksi dengan efisiensi tinggi.',
                    'image' => 'https://source.unsplash.com/100x100/?portrait,man,manager&sig=3',
                    'social' => [
                        'linkedin' => '#',
                        'twitter' => '#',
                        'email' => 'budi.santoso@antosa.com'
                    ]
                ]
            ]
        ];
    }

    /**
     * Get services section data
     * 
     * @return array
     */
    public static function getServicesData()
    {
        return [
            'title' => 'Layanan Kami',
            'subtitle' => 'Kami menyediakan berbagai layanan arsitektur dan desain interior yang sesuai dengan kebutuhan Anda',
            'services' => [
                [
                    'title' => 'Desain Arsitektur',
                    'description' => 'Menciptakan desain bangunan yang indah, fungsional dan berkelanjutan sesuai visi Anda dengan pendekatan holistik dan inovatif',
                    'icon' => 'building',
                    'color' => 'blue',
                    'image' => 'assets/images/jasa1.webp',
                    'features' => [
                        'Konsep desain 3D',
                        'Gambar teknik lengkap',
                        'Perhitungan struktur',
                        'Analisis pencahayaan'
                    ]
                ],
                [
                    'title' => 'Desain Interior',
                    'description' => 'Mengubah ruang interior menjadi lingkungan yang nyaman, fungsional dan estetis',
                    'icon' => 'couch',
                    'color' => 'emerald',
                    'image' => 'assets/images/jasa2.webp',
                    'features' => [
                        'Layout ruang optimal',
                        'Pemilihan material',
                        'Desain furniture custom',
                        'Sistem pencahayaan'
                    ]
                ],
                [
                    'title' => 'Konsultasi Proyek',
                    'description' => 'Memberikan saran profesional dan solusi untuk proyek renovasi atau konstruksi baru',
                    'icon' => 'comments',
                    'color' => 'cyan',
                    'image' => 'assets/images/jasa3.webp',
                    'features' => [
                        'Analisis kebutuhan',
                        'Estimasi biaya',
                        'Timeline proyek',
                        'Rekomendasi kontraktor'
                    ]
                ]
            ]
        ];
    }

    /**
     * Get portfolio section data
     *
     * @return array
     */
    public static function getPortfolioData()
    {
        return [
            'title' => 'Portofolio Proyek',
            'subtitle' => 'Koleksi karya terbaik kami yang menginspirasi dan memukau',
            'categories' => [
                'all' => 'Semua Proyek',
                'Residensial' => 'Residensial',
                'Komersial' => 'Komersial',
                'Hospitality' => 'Hospitality',
                'Institutional' => 'Institusional'
            ],
            'category_icons' => [
                'all' => 'fas fa-th-large',
                'Residensial' => 'fas fa-home',
                'Komersial' => 'fas fa-building',
                'Hospitality' => 'fas fa-hotel',
                'Institutional' => 'fas fa-university'
            ],
            'projects' => [
                [
                    'id' => 'villa-pesisir',
                    'title' => 'Villa Pesisir',
                    'category' => 'Residensial',
                    'location' => 'Bali',
                    'year' => '2023',
                    'status' => 'completed',
                    'featured' => true,
                    'size' => 'large',
                    'area' => '450 m²',
                    'client' => 'PT Pesisir Indah',
                    'budget_range' => '2-5M',
                    'duration' => '8 bulan',
                    'description' => 'Villa mewah dengan pemandangan laut yang menakjubkan. Desain modern yang menyatu dengan alam, menghadirkan keseimbangan sempurna antara kemewahan dan keberlanjutan.',
                    'detailed_description' => 'Proyek villa pesisir ini menggabungkan arsitektur modern dengan elemen tradisional Bali. Struktur bangunan dirancang untuk memaksimalkan pemandangan laut sambil tetap memberikan privasi. Material lokal seperti batu alam dan kayu jati dipadukan dengan elemen kontemporer seperti kaca floor-to-ceiling dan steel frame.',
                    'tags' => ['modern', 'sustainable', 'luxury', 'oceanview', 'tropical'],
                    'images' => [
                        'https://images.unsplash.com/photo-1613490493576-7fde63acd811?w=800&h=600&fit=crop',
                        'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=800&h=600&fit=crop',
                        'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=800&h=600&fit=crop'
                    ],
                    'features' => [
                        'Infinity Pool dengan Ocean View',
                        'Smart Home System',
                        'Solar Panel Integration',
                        'Natural Ventilation System',
                        'Private Beach Access'
                    ],
                    'awards' => ['Best Residential Design 2023', 'Sustainable Architecture Award']
                ],
                [
                    'id' => 'kantor-greenspace',
                    'title' => 'Kantor Modern Greenspace',
                    'category' => 'Komersial',
                    'location' => 'Jakarta',
                    'year' => '2022',
                    'status' => 'completed',
                    'featured' => true,
                    'size' => 'medium',
                    'area' => '1,200 m²',
                    'client' => 'PT Teknologi Hijau',
                    'budget_range' => '5-10M',
                    'duration' => '12 bulan',
                    'description' => 'Ruang kantor dengan konsep hijau yang mengutamakan produktivitas dan kesejahteraan karyawan.',
                    'detailed_description' => 'Kantor modern dengan konsep biophilic design yang mengintegrasikan elemen alam ke dalam ruang kerja. Desain ini terbukti meningkatkan produktivitas karyawan hingga 30% dan mengurangi tingkat stress. Sistem HVAC yang efisien dan pencahayaan alami yang optimal menciptakan lingkungan kerja yang sehat.',
                    'tags' => ['biophilic', 'productive', 'sustainable', 'modern', 'wellness'],
                    'images' => [
                        'https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&h=600&fit=crop',
                        'https://images.unsplash.com/photo-1497366811353-6870744d04b2?w=800&h=600&fit=crop',
                        'https://images.unsplash.com/photo-1556761175-b413da4baf72?w=800&h=600&fit=crop'
                    ],
                    'features' => [
                        'Vertical Garden System',
                        'Natural Light Optimization',
                        'Flexible Workspace Layout',
                        'Air Purification System',
                        'Rooftop Garden'
                    ],
                    'awards' => ['Green Building Certification', 'Workplace Innovation Award']
                ],
                [
                    'id' => 'apartment-skyview',
                    'title' => 'Apartment Sky View',
                    'category' => 'Residensial',
                    'location' => 'Surabaya',
                    'year' => '2021',
                    'status' => 'completed',
                    'featured' => false,
                    'size' => 'small',
                    'area' => '85 m²',
                    'client' => 'Private Client',
                    'budget_range' => '500K-1M',
                    'duration' => '4 bulan',
                    'description' => 'Apartemen premium dengan pemandangan kota yang memukau. Desain interior yang elegan dan fungsional.',
                    'detailed_description' => 'Transformasi apartemen kompak menjadi ruang hidup yang maksimal dengan desain interior yang cerdas. Setiap sudut dioptimalkan untuk fungsi ganda, menciptakan ilusi ruang yang lebih luas. Pemilihan warna dan material yang tepat menghadirkan suasana mewah dalam ruang terbatas.',
                    'tags' => ['compact', 'elegant', 'functional', 'cityview', 'luxury'],
                    'images' => [
                        'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=800&h=600&fit=crop',
                        'https://images.unsplash.com/photo-1560449752-2dd9b55c3d0e?w=800&h=600&fit=crop'
                    ],
                    'features' => [
                        'Space-Saving Furniture',
                        'Floor-to-Ceiling Windows',
                        'Built-in Storage Solutions',
                        'Smart Lighting System',
                        'Panoramic City View'
                    ]
                ],
                [
                    'id' => 'restoran-archipelago',
                    'title' => 'Restoran Archipelago',
                    'category' => 'Komersial',
                    'location' => 'Yogyakarta',
                    'year' => '2022',
                    'status' => 'completed',
                    'featured' => true,
                    'size' => 'medium',
                    'area' => '300 m²',
                    'client' => 'Archipelago Group',
                    'budget_range' => '1-2M',
                    'duration' => '6 bulan',
                    'description' => 'Restoran dengan desain yang terinspirasi keindahan kepulauan Indonesia. Atmosfer yang nyaman dan instagramable.',
                    'detailed_description' => 'Konsep desain yang menggabungkan elemen tradisional Nusantara dengan sentuhan kontemporer. Setiap area dining memiliki karakteristik pulau yang berbeda, menciptakan journey kuliner yang unik. Material bambu, rotan, dan batu alam dipadukan dengan teknologi modern untuk pengalaman dining yang tak terlupakan.',
                    'tags' => ['traditional', 'instagramable', 'cultural', 'dining', 'atmospheric'],
                    'images' => [
                        'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=800&h=600&fit=crop',
                        'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=800&h=600&fit=crop',
                        'https://images.unsplash.com/photo-1514933651103-005eec06c04b?w=800&h=600&fit=crop'
                    ],
                    'features' => [
                        'Themed Dining Areas',
                        'Traditional Material Integration',
                        'Instagram-worthy Spots',
                        'Acoustic Design',
                        'Cultural Art Installation'
                    ],
                    'awards' => ['Best Restaurant Design 2022']
                ],
                [
                    'id' => 'rumah-minimalis',
                    'title' => 'Rumah Minimalis Sejuk',
                    'category' => 'Residensial',
                    'location' => 'Bandung',
                    'year' => '2023',
                    'status' => 'completed',
                    'featured' => false,
                    'size' => 'medium',
                    'area' => '180 m²',
                    'client' => 'Keluarga Santoso',
                    'budget_range' => '1-2M',
                    'duration' => '5 bulan',
                    'description' => 'Rumah dengan desain minimalis modern yang memberikan kesejukan dan kenyamanan. Maksimal dalam fungsi, minimal dalam dekorasi.',
                    'detailed_description' => 'Filosofi "less is more" diterapkan secara konsisten dalam setiap elemen desain. Cross ventilation yang optimal dan penggunaan material dengan thermal mass yang baik menciptakan suhu ruang yang sejuk secara alami. Desain landscape yang terintegrasi menambah kesejukan dan keindahan visual.',
                    'tags' => ['minimalist', 'functional', 'cool', 'efficient', 'family'],
                    'images' => [
                        'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&h=600&fit=crop',
                        'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?w=800&h=600&fit=crop'
                    ],
                    'features' => [
                        'Cross Ventilation System',
                        'Minimalist Interior Design',
                        'Energy Efficient Lighting',
                        'Integrated Landscape',
                        'Multi-functional Spaces'
                    ]
                ],
                [
                    'id' => 'butik-hotel-cerita',
                    'title' => 'Butik Hotel Cerita',
                    'category' => 'Hospitality',
                    'location' => 'Lombok',
                    'year' => '2022',
                    'status' => 'completed',
                    'featured' => true,
                    'size' => 'large',
                    'area' => '800 m²',
                    'client' => 'Cerita Hospitality',
                    'budget_range' => '3-5M',
                    'duration' => '10 bulan',
                    'description' => 'Butik hotel yang menawarkan pengalaman menginap unik dengan cerita lokal. Setiap kamar memiliki tema berbeda.',
                    'detailed_description' => 'Setiap ruang dalam hotel ini menceritakan kisah budaya lokal Lombok. Dari lobby yang terinspirasi tradisi tenun Sasak hingga kamar-kamar yang mengangkat legenda lokal. Desain yang autentik namun tetap memenuhi standar kenyamanan modern, menciptakan pengalaman menginap yang berkesan.',
                    'tags' => ['boutique', 'cultural', 'storytelling', 'unique', 'hospitality'],
                    'images' => [
                        'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=800&h=600&fit=crop',
                        'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800&h=600&fit=crop',
                        'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=800&h=600&fit=crop'
                    ],
                    'features' => [
                        'Themed Guest Rooms',
                        'Cultural Art Integration',
                        'Local Material Usage',
                        'Storytelling Architecture',
                        'Authentic Experience Design'
                    ],
                    'awards' => ['Best Boutique Hotel Design 2022', 'Cultural Heritage Award']
                ]
            ]
        ];
    }

    /**
     * Get testimonials section data
     *
     * @return array
     */
    public static function getTestimonialsData()
    {
        return [
            'title' => 'Testimoni Klien',
            'subtitle' => 'Kepuasan klien adalah prioritas utama kami',
            'testimonials' => [
                [
                    'name' => 'Aditya Pratama',
                    'position' => 'CEO, PT Maju Bersama',
                    'text' => 'Antosa Architect memahami kebutuhan kami dengan sangat baik. Mereka menerjemahkan visi kami menjadi desain kantor yang tidak hanya estetis tapi juga sangat fungsional untuk karyawan kami.',
                    'rating' => 5,
                    'image' => 'https://source.unsplash.com/100x100/?portrait,man,ceo&sig=4'
                ],
                [
                    'name' => 'Maya Anggraini',
                    'position' => 'Pemilik Rumah',
                    'text' => 'Saya sangat puas dengan desain rumah yang dikerjakan oleh tim Antosa. Mereka memperhatikan detail dan memberikan solusi kreatif untuk lahan terbatas yang kami miliki.',
                    'rating' => 5,
                    'image' => 'https://source.unsplash.com/100x100/?portrait,woman,homeowner&sig=5'
                ],
                [
                    'name' => 'Hendra Wijaya',
                    'position' => 'Pengembang Properti',
                    'text' => 'Sudah bekerja sama dengan Antosa Architect untuk 3 proyek perumahan kami. Selalu tepat waktu dan hasilnya selalu disukai oleh pembeli.',
                    'rating' => 5,
                    'image' => 'https://source.unsplash.com/100x100/?portrait,man,developer&sig=6'
                ]
            ]
        ];
    }

    /**
     * Get FAQ section data
     *
     * @return array
     */
    public static function getFaqData()
    {
        return [
            'title' => 'Pertanyaan Umum',
            'subtitle' => 'Temukan jawaban atas pertanyaan yang sering diajukan tentang layanan kami',
            'categories' => [
                'Umum' => [
                    [
                        'question' => 'Apa saja layanan utama yang ditawarkan oleh Antosa Architect?',
                        'answer' => 'Kami menawarkan layanan lengkap meliputi desain arsitektur, desain interior, konsultasi proyek, manajemen konstruksi, dan desain lanskap. Setiap layanan didukung oleh tim profesional berpengalaman.'
                    ],
                    [
                        'question' => 'Bagaimana proses kerja sama dengan Antosa Architect?',
                        'answer' => 'Proses dimulai dari konsultasi gratis, survei lokasi, analisis kebutuhan, pembuatan konsep desain, pengembangan detail, hingga pengawasan pelaksanaan. Setiap tahap melibatkan komunikasi intensif dengan klien.'
                    ],
                    [
                        'question' => 'Berapa lama waktu yang dibutuhkan untuk menyelesaikan proyek?',
                        'answer' => 'Waktu pengerjaan bervariasi: desain rumah tinggal 2-4 bulan, bangunan komersial 4-8 bulan, dan proyek besar 6-12 bulan. Timeline detail akan disepakati di awal kontrak.'
                    ],
                    [
                        'question' => 'Apakah Antosa Architect melayani proyek di luar Jember?',
                        'answer' => 'Ya, kami melayani proyek di seluruh Jawa Timur dan wilayah Indonesia lainnya. Untuk proyek luar kota, akan ada penyesuaian biaya transportasi dan akomodasi tim.'
                    ],
                    [
                        'question' => 'Bagaimana cara menghubungi Antosa Architect untuk konsultasi?',
                        'answer' => 'Anda dapat menghubungi kami melalui telepon +62 851 8952 3863, email info@antosaarchitect.com, atau mengunjungi kantor kami di Jember. Konsultasi awal gratis dan tanpa komitmen.'
                    ],
                    [
                        'question' => 'Apakah ada garansi untuk hasil pekerjaan?',
                        'answer' => 'Kami memberikan garansi desain selama 1 tahun dan garansi pengawasan konstruksi sesuai standar industri. Garansi mencakup revisi minor dan konsultasi teknis.'
                    ]
                ],
                'Desain' => [
                    [
                        'question' => 'Bagaimana proses desain arsitektur berjalan?',
                        'answer' => 'Proses meliputi: (1) Briefing dan analisis site, (2) Konsep desain dan sketsa awal, (3) Pengembangan desain skematik, (4) Detail desain dan gambar kerja, (5) Spesifikasi teknis dan RAB.'
                    ],
                    [
                        'question' => 'Berapa kali revisi desain yang diperbolehkan?',
                        'answer' => 'Kami menyediakan 3 kali revisi mayor gratis pada tahap konsep desain, dan revisi minor tanpa batas selama fase pengembangan. Revisi tambahan dikenakan biaya sesuai kompleksitas.'
                    ],
                    [
                        'question' => 'Apakah bisa melihat visualisasi 3D dari desain?',
                        'answer' => 'Ya, kami menyediakan visualisasi 3D berkualitas tinggi untuk semua proyek. Termasuk rendering eksterior, interior, dan virtual tour untuk memberikan gambaran realistis hasil akhir.'
                    ],
                    [
                        'question' => 'Bagaimana jika ingin mengubah desain di tengah proses?',
                        'answer' => 'Perubahan masih dimungkinkan dengan penyesuaian timeline dan biaya. Kami akan mengevaluasi dampak perubahan terhadap struktur, MEP, dan aspek teknis lainnya.'
                    ],
                    [
                        'question' => 'Apakah desain mengikuti standar dan regulasi yang berlaku?',
                        'answer' => 'Semua desain kami mengacu pada SNI, Peraturan Bangunan Gedung, IMB, dan regulasi setempat. Kami juga membantu proses perizinan dan konsultasi dengan instansi terkait.'
                    ],
                    [
                        'question' => 'Bisakah mengintegrasikan teknologi smart home dalam desain?',
                        'answer' => 'Tentu, kami berpengalaman merancang rumah pintar dengan sistem otomasi pencahayaan, keamanan, klimatisasi, dan entertainment. Desain akan mengakomodasi infrastruktur teknologi modern.'
                    ]
                ],
                'Biaya' => [
                    [
                        'question' => 'Bagaimana sistem pembayaran jasa arsitektur?',
                        'answer' => 'Pembayaran dilakukan bertahap: 30% saat kontrak, 40% saat konsep disetujui, 20% saat gambar kerja selesai, dan 10% saat serah terima. Sistem termin dapat disesuaikan dengan kesepakatan.'
                    ],
                    [
                        'question' => 'Apakah konsultasi awal dikenakan biaya?',
                        'answer' => 'Konsultasi awal dan survei lokasi gratis tanpa biaya. Kami akan memberikan gambaran umum solusi desain dan estimasi biaya sebagai bahan pertimbangan Anda.'
                    ],
                    [
                        'question' => 'Berapa kisaran biaya jasa desain arsitektur?',
                        'answer' => 'Biaya jasa desain berkisar 3-8% dari nilai konstruksi, tergantung kompleksitas proyek. Untuk rumah tinggal sederhana mulai dari Rp 15 juta, rumah mewah Rp 50-150 juta.'
                    ],
                    [
                        'question' => 'Apakah ada paket bundling untuk desain dan konstruksi?',
                        'answer' => 'Ya, kami menawarkan paket terintegrasi desain + build dengan harga lebih kompetitif. Paket ini mencakup desain lengkap, pengawasan, dan koordinasi dengan kontraktor pilihan.'
                    ],
                    [
                        'question' => 'Bagaimana cara pembayaran yang diterima?',
                        'answer' => 'Kami menerima pembayaran melalui transfer bank, cek, atau cash. Untuk kemudahan, tersedia juga pembayaran dengan kartu kredit untuk nominal tertentu.'
                    ],
                    [
                        'question' => 'Apakah ada diskon untuk proyek berulang atau referral?',
                        'answer' => 'Klien repeat mendapat diskon 10-15%, dan program referral memberikan cashback 5% dari nilai kontrak. Tersedia juga paket khusus untuk developer atau proyek multiple unit.'
                    ]
                ],
                'Konstruksi' => [
                    [
                        'question' => 'Apakah Antosa Architect juga menangani pelaksanaan konstruksi?',
                        'answer' => 'Kami fokus pada desain dan pengawasan konstruksi. Untuk pelaksanaan, kami bekerja sama dengan kontraktor terpercaya yang sudah teruji kualitas dan integritasnya.'
                    ],
                    [
                        'question' => 'Bagaimana proses pengawasan konstruksi dilakukan?',
                        'answer' => 'Tim kami melakukan pengawasan berkala sesuai tahapan konstruksi: pondasi, struktur, MEP, finishing. Termasuk quality control material dan progress report mingguan.'
                    ],
                    [
                        'question' => 'Apakah bisa membantu memilih kontraktor yang tepat?',
                        'answer' => 'Ya, kami memiliki database kontraktor terpercaya dengan track record baik. Kami akan merekomendasikan 2-3 kontraktor sesuai budget dan kompleksitas proyek Anda.'
                    ],
                    [
                        'question' => 'Bagaimana jika ada masalah selama konstruksi?',
                        'answer' => 'Tim pengawas kami akan segera mengidentifikasi dan menyelesaikan masalah. Kami berkoordinasi dengan kontraktor untuk memastikan solusi terbaik tanpa mengorbankan kualitas dan timeline.'
                    ],
                    [
                        'question' => 'Apakah ada jaminan kualitas untuk hasil konstruksi?',
                        'answer' => 'Melalui pengawasan ketat, kami memastikan konstruksi sesuai spesifikasi desain. Kontraktor partner memberikan garansi konstruksi 1-2 tahun sesuai standar industri.'
                    ]
                ]
            ]
        ];
    }

    /**
     * Get contact section data
     * 
     * @return array
     */
    public static function getContactData()
    {
        return [
            'title' => 'Hubungi Kami',
            'subtitle' => 'Punya pertanyaan atau ingin memulai proyek dengan kami? Jangan ragu untuk menghubungi kami.'
        ];
    }
}
