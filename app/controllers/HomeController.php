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
        
        $aboutData = [
            'title' => 'Tentang Kami',
            'description' => 'Antosa Architect adalah studio arsitektur profesional yang berdedikasi untuk menciptakan ruang fungsional dengan sentuhan estetika yang memukau. Dengan pengalaman lebih dari 10 tahun, kami telah menyelesaikan berbagai proyek dari residensial hingga komersial.',
            'team' => [
                [
                    'name' => 'Ahmad Farhan',
                    'position' => 'Principal Architect',
                    'bio' => 'Berpengalaman lebih dari 15 tahun dalam bidang arsitektur.',
                    'image' => 'https://source.unsplash.com/100x100/?portrait,man,architect&sig=1'
                ],
                [
                    'name' => 'Siti Aisyah',
                    'position' => 'Interior Designer',
                    'bio' => 'Spesialis desain interior yang menggabungkan fungsi dan estetika.',
                    'image' => 'https://source.unsplash.com/100x100/?portrait,woman,designer&sig=2'
                ],
                [
                    'name' => 'Budi Santoso',
                    'position' => 'Project Manager',
                    'bio' => 'Ahli dalam mengelola proyek konstruksi tepat waktu dan sesuai anggaran.',
                    'image' => 'https://source.unsplash.com/100x100/?portrait,man,manager&sig=3'
                ]
            ]
        ];
        
        $servicesData = [
            'title' => 'Layanan Kami',
            'subtitle' => 'Kami menyediakan berbagai layanan arsitektur dan desain interior yang sesuai dengan kebutuhan Anda',
            'services' => [
                [
                    'title' => 'Desain Arsitektur',
                    'description' => 'Menciptakan desain bangunan yang indah, fungsional dan berkelanjutan sesuai visi Anda',
                    'icon' => 'building'
                ],
                [
                    'title' => 'Desain Interior',
                    'description' => 'Mengubah ruang interior menjadi lingkungan yang nyaman, fungsional dan estetis',
                    'icon' => 'couch'
                ],
                [
                    'title' => 'Konsultasi Proyek',
                    'description' => 'Memberikan saran profesional dan solusi untuk proyek renovasi atau konstruksi baru',
                    'icon' => 'comments'
                ],
                [
                    'title' => 'Manajemen Konstruksi',
                    'description' => 'Mengawasi proyek dari awal hingga selesai untuk memastikan kualitas dan efisiensi',
                    'icon' => 'tasks'
                ]
            ],
            'stats' => [
                [
                    'value' => 239,
                    'label' => 'Proyek Selesai'
                ],
                [
                    'value' => 179,
                    'label' => 'Arsitektur'
                ],
                [
                    'value' => 58,
                    'label' => 'Konstruksi'
                ],
            ]
        ];
        
        $portfolioData = [
            'title' => 'Portofolio Proyek',
            'subtitle' => 'Portofolio proyek yang telah kami kerjakan',
            'projects' => [
                [
                    'title' => 'Villa Pesisir',
                    'category' => 'Residensial',
                    'location' => 'Bali',
                    'year' => '2023',
                    'description' => 'Villa mewah dengan pemandangan laut yang menakjubkan. Desain modern yang menyatu dengan alam.',
                ],
                [
                    'title' => 'Kantor Modern Greenspace',
                    'category' => 'Komersial',
                    'location' => 'Jakarta',
                    'year' => '2022',
                    'description' => 'Ruang kantor dengan konsep hijau yang mengutamakan produktivitas dan kesejahteraan karyawan.',
                ],
                [
                    'title' => 'Apartment Sky View',
                    'category' => 'Residensial',
                    'location' => 'Surabaya',
                    'year' => '2021',
                    'description' => 'Apartemen premium dengan pemandangan kota yang memukau. Desain interior yang elegan dan fungsional.',
                ],
                [
                    'title' => 'Restoran Archipelago',
                    'category' => 'Komersial',
                    'location' => 'Yogyakarta',
                    'year' => '2022',
                    'description' => 'Restoran dengan desain yang terinspirasi keindahan kepulauan Indonesia. Atmosfer yang nyaman dan instagramable.',
                ],
                [
                    'title' => 'Rumah Minimalis Sejuk',
                    'category' => 'Residensial',
                    'location' => 'Bandung',
                    'year' => '2023',
                    'description' => 'Rumah dengan desain minimalis modern yang memberikan kesejukan dan kenyamanan. Maksimal dalam fungsi, minimal dalam dekorasi.',
                ],
                [
                    'title' => 'Butik Hotel Cerita',
                    'category' => 'Hospitality',
                    'location' => 'Lombok',
                    'year' => '2022',
                    'description' => 'Butik hotel yang menawarkan pengalaman menginap unik dengan cerita lokal. Setiap kamar memiliki tema berbeda.',
                ]
            ]
        ];
        
        $testimonialData = [
            'title' => 'Apa Kata Klien Kami',
            'subtitle' => 'Dengarkan pengalaman klien yang telah bekerja sama dengan kami.',
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
        
        // Comprehensive FAQ Data
        $faqData = [
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

        // Combine all data
        $viewData = [
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
