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
                    'href' => 'https://wa.me/' . COMPANY_WHATSAPP_NUMBER . '?text=' . urlencode('Halo! Saya tertarik untuk konsultasi mengenai jasa arsitektur. Mohon informasi lebih lanjut.'),
                    'type' => 'primary',
                    'icon' => 'whatsapp',
                    'target' => '_blank'
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
                    'name' => 'Ir. Ar. Dwiantosa Ahmad Fathony, IAI., IPP',
                    'position' => 'Founder / CEO',
                    'bio' => 'Berpengalaman lebih dari 15 tahun dalam bidang arsitektur.',
                    'image' => 'https://source.unsplash.com/100x100/?portrait,man,architect&sig=1',
                    'social' => [
                        'linkedin' => '#',
                        'email' => 'dwiantosa.ahmad@antosa.com'
                    ]
                ],
                [
                    'name' => 'Rezha Reynaldi',
                    'position' => 'Marketing Manager',
                    'bio' => 'Spesialis desain interior dengan fokus pada sustainable design.',
                    'image' => 'https://source.unsplash.com/100x100/?portrait,woman,designer&sig=2',
                    'social' => [
                        'linkedin' => '#',
                        'email' => 'rezha.reynaldi@antosa.com'
                    ]
                ],
                [
                    'name' => 'Syechul Hardiansyah',
                    'position' => 'Design',
                    'bio' => 'Mengelola proyek konstruksi dengan efisiensi tinggi.',
                    'image' => 'https://source.unsplash.com/100x100/?portrait,man,manager&sig=3',
                    'social' => [
                        'linkedin' => '#',
                        'email' => 'syechul.hardiansyah@antosa.com'
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
                    'description' => 'Menciptakan desain bangunan yang indah, fungsional dan berkelanjutan sesuai visi Anda',
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
     * Get clients section data
     *
     * @return array
     */
    public static function getClientsData()
    {
        return [
            'title' => 'Klien Kami',
            'subtitle' => 'Mereka yang telah mempercayai jasa arsitek jember - Antosa Architect',
            'main_image' => 'assets/images/client_kami.webp'
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
            'title' => 'Pertanyaan Yang Sering Diajukan',
            'subtitle' => 'Temukan jawaban atas pertanyaan yang sering diajukan tentang layanan kami',
            'categories' => [
                'Layanan' => [
                    [
                        'question' => 'Apa saja layanan yang ditawarkan?',
                        'answer' => 'Kami menyediakan layanan lengkap mulai dari: Desain arsitektur rumah, Renovasi rumah lama, Pembangunan rumah baru, Gambar kerja & RAB, dan Konsultasi desain.'
                    ],
                    [
                        'question' => 'Apakah bisa hanya menggunakan jasa desain tanpa pembangunan?',
                        'answer' => 'Tentu bisa. Kami melayani jasa desain arsitektur saja, lengkap dengan gambar kerja dan RAB.'
                    ],
                    [
                        'question' => 'Apakah ada survei lokasi sebelum memulai proyek?',
                        'answer' => 'Ya. Survei lokasi adalah bagian penting dari proses awal untuk memahami kondisi lahan, orientasi matahari, kebutuhan klien, dan potensi desain.'
                    ]
                ],
                'Biaya & Pembayaran' => [
                    [
                        'question' => 'Berapa biaya jasa desain arsitek?',
                        'answer' => 'Biaya desain tergantung pada luas bangunan, tingkat kerumitan desain, dan kebutuhan khusus klien. Hubungi kami untuk mendapatkan penawaran harga sesuai kebutuhan Anda.'
                    ],
                    [
                        'question' => 'Bagaimana sistem pembayaran jasa?',
                        'answer' => 'Pembayaran dibagi dalam beberapa tahap, seperti: DP saat kesepakatan awal, Termin di tengah proses, dan Pelunasan saat proyek selesai (untuk pembangunan).'
                    ]
                ],
                'Proses & Revisi' => [
                    [
                        'question' => 'Apakah bisa mengurus IMB/PBG juga?',
                        'answer' => 'Ya, kami dapat membantu proses perizinan seperti PBG (Persetujuan Bangunan Gedung) sesuai peraturan terbaru.'
                    ],
                    [
                        'question' => 'Apakah hasil desain bisa direvisi?',
                        'answer' => 'Ya, kami memberikan beberapa kali revisi (jumlah revisi disesuaikan dengan paket layanan) untuk memastikan desain sesuai keinginan Anda.'
                    ],
                    [
                        'question' => 'Apakah bisa menggunakan material sesuai permintaan klien?',
                        'answer' => 'Tentu. Kami terbuka dengan permintaan material tertentu, selama masih sesuai dengan standar teknis dan anggaran.'
                    ]
                ],
                'Garansi & Area' => [
                    [
                        'question' => 'Apakah ada garansi hasil kerja?',
                        'answer' => 'Ya, untuk pembangunan kami memberikan garansi struktur dan pekerjaan sesuai perjanjian kontrak.'
                    ],
                    [
                        'question' => 'Di area mana saja layanan ini tersedia?',
                        'answer' => 'Kami melayani klien di Jember, Malang, Surabaya dan sekitarnya, serta layanan desain online untuk seluruh Indonesia.'
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

    /**
     * Get footer section data
     *
     * @return array
     */
    public static function getFooterData()
    {
        return [
            'company' => [
                'name' => SITE_NAME,
                'description' => 'Studio arsitektur profesional yang mewujudkan visi Anda menjadi ruang yang fungsional dan estetis dengan desain inovatif dan berkelanjutan.'
            ],
            'navigation' => [
                'title' => 'Navigasi',
                'links' => [
                    ['text' => 'Beranda', 'url' => '/', 'icon' => 'fas fa-home'],
                    ['text' => 'Tentang Kami', 'url' => '#about', 'icon' => 'fas fa-users'],
                    ['text' => 'Layanan', 'url' => '#services', 'icon' => 'fas fa-cogs'],
                    ['text' => 'Portofolio', 'url' => '#portfolio', 'icon' => 'fas fa-folder-open'],
                    ['text' => 'Klien Kami', 'url' => '#clients', 'icon' => 'fas fa-users'],
                    ['text' => 'FAQ', 'url' => '#faq', 'icon' => 'fas fa-question-circle'],
                    ['text' => 'Kontak', 'url' => '#contact', 'icon' => 'fas fa-envelope']
                ]
            ],
            'services' => [
                'title' => 'Layanan Utama',
                'links' => [
                    ['text' => 'Desain Arsitektur', 'url' => '#services', 'icon' => 'fas fa-drafting-compass'],
                    ['text' => 'Desain Interior', 'url' => '#services', 'icon' => 'fas fa-couch'],
                    ['text' => 'Konsultasi Proyek', 'url' => '#services', 'icon' => 'fas fa-handshake'],
                    ['text' => 'Manajemen Konstruksi', 'url' => '#services', 'icon' => 'fas fa-hard-hat'],
                    ['text' => 'Desain Lanskap', 'url' => '#services', 'icon' => 'fas fa-tree']
                ]
            ],
            'contact' => [
                'title' => 'Hubungi Kami',
                'info' => [
                    [
                        'icon' => 'fas fa-map-marker-alt',
                        'type' => 'address',
                        'text' => COMPANY_ADDRESS,
                        'lines' => explode(', ', COMPANY_ADDRESS)
                    ],
                    [
                        'icon' => 'fas fa-phone-alt',
                        'type' => 'phone',
                        'text' => COMPANY_PHONE,
                        'url' => 'tel:' . str_replace([' ', '-', '(', ')'], '', COMPANY_PHONE)
                    ],
                    [
                        'icon' => 'fas fa-envelope',
                        'type' => 'email',
                        'text' => COMPANY_EMAIL,
                        'url' => 'mailto:' . COMPANY_EMAIL
                    ],
                    [
                        'icon' => 'fas fa-clock',
                        'type' => 'hours',
                        'text' => OFFICE_HOURS
                    ]
                ]
            ],
            'social' => [
                'title' => 'Ikuti Kami',
                'links' => [
                    ['icon' => 'fab fa-instagram', 'url' => SOCIAL_INSTAGRAM, 'label' => 'Instagram', 'color' => 'hover:text-pink-400'],
                    ['icon' => 'fab fa-linkedin-in', 'url' => SOCIAL_LINKEDIN, 'label' => 'LinkedIn', 'color' => 'hover:text-blue-500']
                ]
            ],
            'legal' => [
                'copyright' => '© ' . date('Y') . ' ' . SITE_NAME . '. Hak Cipta Dilindungi.',
                'links' => [
                    ['text' => 'Syarat & Ketentuan', 'url' => '/syarat-ketentuan'],
                    ['text' => 'Kebijakan Privasi', 'url' => '/kebijakan-privasi']
                ]
            ]
        ];
    }
}
