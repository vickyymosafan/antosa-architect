<?php

/**
 * Home Controller
 * 
 * Handles requests for the main landing page
 */
class HomeController
{
    /**
     * Display the home page
     *
     * @return void
     */
    public function index()
    {
        // Load the ContentModel
        require_once APP_DIR . '/models/ContentModel.php';

        // Get all section data from the model
        $heroData = ContentModel::getHeroData();
        $aboutData = ContentModel::getAboutData();
        $servicesData = ContentModel::getServicesData();
        $portfolioData = ContentModel::getPortfolioData();
        $testimonialData = ContentModel::getTestimonialsData();
        $faqData = ContentModel::getFaqData();

        // Add comprehensive portfolio projects data (keeping existing data structure)
        $portfolioData['projects'] = [
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
            ];

        // Add testimonials data to the model data
        $testimonialData['testimonials'] = [
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
        ];

        // Add FAQ categories data to the model data
        $faqData['categories'] = [
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
        ];

        // Combine all data
        $viewData = [
            'hero' => $heroData,
            'about' => $aboutData,
            'services' => $servicesData,
            'portfolio' => $portfolioData,
            'testimonials' => $testimonialData,
            'faq' => $faqData
        ];
        
        // Render the home page view
        view('home', $viewData);
    }
}
