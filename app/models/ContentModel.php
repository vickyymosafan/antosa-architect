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
                    'image' => 'assets/images/3.webp',
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
            'description' => 'Antosa Architect adalah studio arsitektur profesional yang berdedikasi untuk menciptakan ruang fungsional dengan sentuhan estetika yang memukau. Dengan pengalaman lebih dari 10 tahun, kami telah menyelesaikan berbagai proyek dari residensial hingga komersial.',
            'stats' => [
                [
                    'value' => 10,
                    'suffix' => '+',
                    'label' => 'Tahun Pengalaman',
                    'gradient' => 'from-primary-400 via-primary-500 to-primary-600',
                    'duration' => 2000
                ],
                [
                    'value' => 150,
                    'suffix' => '+',
                    'label' => 'Proyek Selesai',
                    'gradient' => 'from-primary-400 via-primary-500 to-primary-600',
                    'duration' => 2500
                ],
                [
                    'value' => 98,
                    'suffix' => '%',
                    'label' => 'Kepuasan Klien',
                    'gradient' => 'from-primary-400 via-primary-500 to-primary-600',
                    'duration' => 2200
                ]
            ],
            'values' => [
                [
                    'title' => 'Inovasi',
                    'description' => 'Menciptakan solusi arsitektur yang inovatif dan berkelanjutan',
                    'color' => 'primary-400'
                ],
                [
                    'title' => 'Kualitas',
                    'description' => 'Mengutamakan kualitas dalam setiap detail desain',
                    'color' => 'emerald-400'
                ],
                [
                    'title' => 'Kolaborasi',
                    'description' => 'Bekerja sama dengan klien untuk mewujudkan visi bersama',
                    'color' => 'primary-400'
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
                    'description' => 'Menciptakan desain bangunan yang indah, fungsional dan berkelanjutan sesuai visi Anda',
                    'icon' => 'building',
                    'color' => 'blue',
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
                    'features' => [
                        'Analisis kebutuhan',
                        'Estimasi biaya',
                        'Timeline proyek',
                        'Rekomendasi kontraktor'
                    ]
                ],
                [
                    'title' => 'Manajemen Konstruksi',
                    'description' => 'Mengawasi proyek dari awal hingga selesai untuk memastikan kualitas dan efisiensi',
                    'icon' => 'tasks',
                    'color' => 'amber',
                    'features' => [
                        'Pengawasan harian',
                        'Quality control',
                        'Progress reporting',
                        'Koordinasi tim'
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
            'subtitle' => 'Kepuasan klien adalah prioritas utama kami'
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
            'subtitle' => 'Temukan jawaban atas pertanyaan yang sering diajukan tentang layanan kami'
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
