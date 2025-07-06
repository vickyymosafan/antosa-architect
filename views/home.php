<?php
/**
 * Home/Landing Page View
 */

// Set meta data for the page
$description = SITE_DESCRIPTION;

// Start output buffering for the content
ob_start();
?>

<?php
$hero_slides = [
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
];
?>
<!-- Hero Section - Compact -->
<section id="home" class="relative min-h-[85vh] flex flex-col text-white overflow-hidden scroll-mt-20 bg-gradient-to-br from-gray-900 via-black to-gray-800" role="banner" aria-label="Hero section">
    <!-- Background Slider Container -->
    <div id="hero-slider" class="absolute inset-0 w-full h-full" role="img" aria-label="Background image carousel">
        <?php foreach ($hero_slides as $index => $slide): ?>
        <div class="hero-slide absolute inset-0 w-full h-full bg-cover bg-center transition-all duration-1000 ease-in-out <?= $index === 0 ? 'opacity-100 scale-100' : 'opacity-0 scale-105' ?>"
             style="background-image: url('<?= htmlspecialchars($slide['image']) ?>');"
             aria-hidden="<?= $index !== 0 ? 'true' : 'false' ?>"
             role="group"
             aria-roledescription="slide"
             aria-label="<?= htmlspecialchars($slide['alt']) ?>">
            <!-- Enhanced overlay with gradient -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-black/30"></div>
            <!-- Performance optimization: Preload next image -->
            <?php if ($index === 1): ?>
            <link rel="preload" as="image" href="<?= htmlspecialchars($slide['image']) ?>">
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Content Overlay with improved structure -->
    <div class="relative z-10 flex flex-col min-h-[85vh]">
        <!-- Top Bar Elements -->
        <header class="container mx-auto px-4 sm:px-6 lg:px-8 pt-6 md:pt-8 lg:pt-12">
            <div class="flex justify-end">
                <!-- Featured Badge - Enhanced -->
                <div class="bg-gradient-to-r from-primary-500 to-primary-400 text-black px-4 py-2 rounded-full text-sm font-bold flex items-center shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <span>Arsitek Terpercaya</span>
                </div>
            </div>
        </header>

        <!-- Main Hero Content (Centered) - Compact with Enhanced Animations -->
        <main class="container mx-auto px-4 sm:px-6 lg:px-8 flex-grow flex flex-col justify-center text-center py-8 md:py-10 lg:py-12">
            <!-- Main Heading - Reduced sizes with Staggered Animation -->
            <h1 class="hero-title font-sans text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-black text-white leading-[0.9] mb-4 lg:mb-6 text-shadow-lg opacity-0 translate-y-8 transition-all duration-700 ease-out">
                <span class="hero-title-line-1 block opacity-0 translate-y-4 transition-all duration-600 ease-out">Bangun Rumah</span>
                <span class="hero-title-line-2 block text-primary-400 drop-shadow-lg opacity-0 translate-y-4 transition-all duration-600 ease-out">Impian Anda</span>
            </h1>

            <!-- Subtitle - Reduced sizes with Delayed Animation -->
            <p class="hero-subtitle text-base sm:text-lg md:text-xl lg:text-2xl font-sans font-light text-gray-200 max-w-3xl mx-auto mb-6 lg:mb-8 text-shadow leading-relaxed opacity-0 translate-y-6 transition-all duration-700 ease-out">
                <?= htmlspecialchars($hero['subtitle'] ?? 'Desain modern, konstruksi berkualitas, dan solusi berkelanjutan untuk mewujudkan hunian ideal sesuai gaya hidup Anda.') ?>
            </p>

            <!-- CTA Buttons - Compact with Staggered Animation -->
            <div class="hero-cta-buttons flex flex-col sm:flex-row justify-center items-center gap-3 lg:gap-4 opacity-0 translate-y-8 transition-all duration-700 ease-out">
                <a href="#contact"
                   class="hero-cta-primary group bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-black font-sans font-bold py-3 px-6 lg:py-4 lg:px-8 rounded-lg transition-all duration-300 hover:scale-105 hover:shadow-xl text-sm lg:text-base flex items-center justify-center min-w-[240px] focus:outline-none focus:ring-4 focus:ring-primary-400/50 opacity-0 translate-y-4 scale-95"
                   role="button"
                   aria-label="Mulai konsultasi gratis dengan tim arsitek kami">
                    <span>Mulai Konsultasi Gratis</span>
                    <svg class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
                <a href="#portfolio"
                   class="hero-cta-secondary group bg-black/60 hover:bg-black/80 border-2 border-gray-600 hover:border-primary-400 text-white font-sans font-bold py-3 px-6 lg:py-4 lg:px-8 rounded-lg transition-all duration-300 hover:scale-105 text-sm lg:text-base backdrop-blur-md flex items-center justify-center min-w-[240px] focus:outline-none focus:ring-4 focus:ring-white/20 opacity-0 translate-y-4 scale-95"
                   role="button"
                   aria-label="Lihat portofolio hasil karya kami">
                    <span>Lihat Hasil Karya</span>
                    <svg class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                </a>
            </div>
        </main>

        <!-- Bottom Navigation -->
        <footer class="container mx-auto px-4 sm:px-6 lg:px-8 pb-6 md:pb-8 lg:pb-12">
            <div class="flex justify-center sm:justify-end items-end">
                <!-- Enhanced Slider Navigation -->
                <nav class="flex items-center gap-4 bg-black/70 backdrop-blur-md px-4 py-3 rounded-xl shadow-lg border border-white/10"
                     role="navigation"
                     aria-label="Hero image navigation">
                    <button id="hero-prev"
                            class="p-2 text-gray-400 hover:text-white hover:bg-white/10 rounded-lg transition-all duration-200 disabled:opacity-30 disabled:cursor-not-allowed focus:outline-none focus:ring-2 focus:ring-primary-400/50"
                            aria-label="Previous slide"
                            type="button">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>

                    <div id="hero-pagination"
                         class="text-sm font-sans font-medium text-gray-200 min-w-[60px] text-center"
                         aria-live="polite"
                         aria-label="Current slide">
                        01 / <?= str_pad(count($hero_slides), 2, '0', STR_PAD_LEFT) ?>
                    </div>

                    <button id="hero-next"
                            class="p-2 text-gray-400 hover:text-white hover:bg-white/10 rounded-lg transition-all duration-200 disabled:opacity-30 disabled:cursor-not-allowed focus:outline-none focus:ring-2 focus:ring-primary-400/50"
                            aria-label="Next slide"
                            type="button">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </nav>
            </div>
        </footer>
    </div>
</section>

<!-- About Section - Premium Architecture Design -->
<section id="about" class="relative py-16 sm:py-24 lg:py-32 bg-black text-white scroll-mt-20 overflow-hidden" aria-label="Tentang Kami dan Tim Profesional">
    <!-- Geometric Background Elements -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-20 left-10 w-96 h-96 border border-primary-400 rotate-45 transform-gpu animate-float"></div>
        <div class="absolute bottom-20 right-10 w-64 h-64 border border-emerald-400 rotate-12 transform-gpu animate-float-reverse"></div>
        <div class="absolute top-1/2 left-1/3 w-32 h-32 bg-gradient-to-br from-primary-500/20 to-emerald-500/20 rotate-45 transform-gpu animate-pulse-glow"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Hero Content - Asymmetric Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16 mb-16 lg:mb-24">
            <!-- Left Content - 7 columns -->
            <div class="lg:col-span-7 space-y-8">
                <div class="opacity-0 translate-y-8 transition-all duration-700 ease-out">
                    <!-- Overline -->
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="w-12 h-px bg-gradient-to-r from-primary-400 to-emerald-400"></div>
                        <span class="text-sm font-medium tracking-wider text-primary-400 uppercase">Studio Profile</span>
                    </div>

                    <!-- Main Heading -->
                    <h2 class="font-sans text-4xl sm:text-5xl lg:text-7xl xl:text-8xl font-black text-white leading-[0.9] mb-6 lg:mb-8 tracking-tight">
                        <span class="block relative">
                            Tentang
                        </span>
                        <span class="block text-transparent bg-clip-text bg-gradient-to-r from-primary-400 via-emerald-400 to-primary-500 relative">
                            Kami
                            <div class="absolute -bottom-1 left-0 w-full h-1 bg-gradient-to-r from-primary-400/30 to-emerald-400/30 rounded-full"></div>
                        </span>
                    </h2>

                    <!-- Description -->
                    <div class="space-y-6">
                        <p class="font-sans text-lg sm:text-xl lg:text-2xl text-gray-300 leading-relaxed font-light">
                            <?= $about['description'] ?>
                        </p>

                        <!-- Stats Row -->
                        <div class="grid grid-cols-3 gap-8 pt-10 mt-10 border-t border-gray-700 relative">
                            <?php
                            $stats = [
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
                            ];
                            ?>

                            <?php foreach ($stats as $index => $stat): ?>
                            <div class="text-center lg:text-left group">
                                <div class="text-4xl lg:text-5xl font-black mb-3 group-hover:scale-110 transition-transform duration-300">
                                    <span class="counter text-transparent bg-clip-text bg-gradient-to-r <?= $stat['gradient'] ?>"
                                          data-target="<?= $stat['value'] ?>"
                                          data-suffix="<?= $stat['suffix'] ?>"
                                          data-duration="<?= $stat['duration'] ?>">0</span><span class="text-transparent bg-clip-text bg-gradient-to-r <?= $stat['gradient'] ?>"><?= $stat['suffix'] ?></span>
                                </div>
                                <div class="text-xs text-gray-500 uppercase tracking-[0.15em] font-medium"><?= $stat['label'] ?></div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Visual Element - 5 columns -->
            <div class="lg:col-span-5 relative">
                <div class="opacity-0 translate-x-8 transition-all duration-700 ease-out delay-300">
                    <!-- Floating Card with Company Values -->
                    <div class="relative mt-16 lg:mt-32">
                        <!-- Main Card -->
                        <div class="bg-gradient-to-br from-gray-900/80 to-black/80 backdrop-blur-xl border border-gray-700/50 rounded-2xl p-8 shadow-2xl">
                            <div class="space-y-6">
                                <div class="flex items-center space-x-3">
                                    <div class="w-3 h-3 bg-primary-400 rounded-full"></div>
                                    <span class="text-sm font-medium text-gray-300 uppercase tracking-wider">Visi & Misi</span>
                                </div>

                                <div class="space-y-4">
                                    <div class="border-l-2 border-primary-400 pl-4">
                                        <h4 class="font-semibold text-white mb-2">Inovasi</h4>
                                        <p class="text-sm text-gray-400">Menciptakan solusi arsitektur yang inovatif dan berkelanjutan</p>
                                    </div>
                                    <div class="border-l-2 border-emerald-400 pl-4">
                                        <h4 class="font-semibold text-white mb-2">Kualitas</h4>
                                        <p class="text-sm text-gray-400">Mengutamakan kualitas dalam setiap detail desain</p>
                                    </div>
                                    <div class="border-l-2 border-primary-400 pl-4">
                                        <h4 class="font-semibold text-white mb-2">Kolaborasi</h4>
                                        <p class="text-sm text-gray-400">Bekerja sama dengan klien untuk mewujudkan visi bersama</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Floating Elements -->
                        <div class="absolute -top-4 -right-4 w-24 h-24 bg-gradient-to-br from-primary-500/20 to-emerald-500/20 rounded-full blur-xl"></div>
                        <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-gradient-to-br from-emerald-500/10 to-primary-500/10 rounded-full blur-2xl"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Section - Masonry Grid -->
        <div class="space-y-12">
            <!-- Section Header -->
            <div class="text-center opacity-0 translate-y-8 transition-all duration-700 ease-out delay-500">
                <div class="flex items-center justify-center space-x-6 mb-8">
                    <div class="w-16 h-px bg-gradient-to-r from-transparent via-primary-400 to-emerald-400"></div>
                    <div class="relative">
                        <span class="text-sm font-semibold tracking-[0.2em] text-primary-400 uppercase relative z-10">Tim Profesional</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-primary-400/10 to-emerald-400/10 blur-sm rounded-full"></div>
                    </div>
                    <div class="w-16 h-px bg-gradient-to-r from-emerald-400 via-primary-400 to-transparent"></div>
                </div>
                <h3 class="font-sans text-4xl lg:text-5xl xl:text-6xl font-black text-white mb-6 leading-tight tracking-tight">
                    <span class="relative inline-block">
                        Arsitek
                    </span>
                    <br class="hidden sm:block">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-400 via-emerald-400 to-primary-500 relative">
                        Berpengalaman
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-gradient-to-r from-primary-400/50 to-emerald-400/50 rounded-full"></div>
                    </span>
                </h3>
                <p class="text-lg text-gray-400 max-w-2xl mx-auto leading-relaxed">
                    Bertemu dengan tim profesional kami yang berpengalaman dalam menciptakan karya arsitektur yang memukau dan fungsional.
                </p>
            </div>

            <!-- Consistent Team Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                <?php foreach ($about['team'] as $index => $member): ?>
                    <div class="opacity-0 translate-y-8 transition-all duration-700 ease-out stagger-item"
                         style="transition-delay: <?= 0.2 * ($index + 3) ?>s;">

                        <!-- Card Container -->
                        <div class="group relative h-full bg-gradient-to-br from-gray-900/60 to-black/60 backdrop-blur-xl border border-gray-700/30 rounded-2xl overflow-hidden hover:border-primary-400/50 transition-all duration-500 hover:transform hover:scale-[1.02]">

                            <!-- Background Pattern -->
                            <div class="absolute inset-0 opacity-5">
                                <div class="absolute top-4 right-4 w-16 h-16 border border-primary-400 rotate-45"></div>
                                <div class="absolute bottom-4 left-4 w-12 h-12 border border-emerald-400 rotate-12"></div>
                            </div>

                            <!-- Content -->
                            <div class="relative z-10 p-6 h-full flex flex-col">

                                <!-- Profile Image Placeholder -->
                                <div class="w-24 h-24 mb-6 rounded-2xl bg-gradient-to-br from-primary-500/20 to-emerald-500/20 flex items-center justify-center mx-auto group-hover:scale-105 transition-transform duration-300">
                                    <div class="w-20 h-20 rounded-xl bg-gradient-to-br from-primary-400 to-emerald-400 flex items-center justify-center">
                                        <i class="fas fa-user text-white text-xl"></i>
                                    </div>
                                </div>

                                <!-- Name & Position -->
                                <div class="text-center mb-4 flex-grow">
                                    <h4 class="font-sans font-bold text-xl text-white mb-2 group-hover:text-primary-400 transition-colors">
                                        <?= $member['name'] ?>
                                    </h4>
                                    <p class="font-sans font-medium text-primary-400 text-base mb-4">
                                        <?= $member['position'] ?>
                                    </p>

                                    <!-- Bio with consistent styling -->
                                    <p class="font-sans text-sm text-gray-400 leading-relaxed">
                                        <?= $member['bio'] ?>
                                    </p>
                                </div>

                                <!-- Social Links -->
                                <div class="flex justify-center items-center space-x-4 pt-4 border-t border-gray-800 mt-auto">
                                    <a href="#" class="w-10 h-10 rounded-full bg-gray-800 hover:bg-primary-500 flex items-center justify-center text-gray-400 hover:text-white transition-all duration-300 group/social">
                                        <i class="fab fa-linkedin text-sm group-hover/social:scale-110 transition-transform"></i>
                                    </a>
                                    <a href="#" class="w-10 h-10 rounded-full bg-gray-800 hover:bg-primary-500 flex items-center justify-center text-gray-400 hover:text-white transition-all duration-300 group/social">
                                        <i class="fab fa-twitter text-sm group-hover/social:scale-110 transition-transform"></i>
                                    </a>
                                    <a href="mailto:<?= strtolower(str_replace(' ', '.', $member['name'])) ?>@antosa.com" class="w-10 h-10 rounded-full bg-gray-800 hover:bg-emerald-500 flex items-center justify-center text-gray-400 hover:text-white transition-all duration-300 group/social">
                                        <i class="fas fa-envelope text-sm group-hover/social:scale-110 transition-transform"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Hover Glow Effect -->
                            <div class="absolute inset-0 bg-gradient-to-br from-primary-500/5 to-emerald-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Services Section - Optimized Spacing -->
<section id="services" class="py-12 lg:py-16 scroll-mt-20 bg-black">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10 lg:mb-12 opacity-0 translate-y-8 transition-all duration-700 ease-out">
            <h2 class="font-sans text-3xl sm:text-4xl font-black text-secondary-800 dark:text-dark-100 mb-4"><?= $services['title'] ?></h2>
            <div class="w-24 h-1 bg-primary-500 mx-auto mb-6"></div>
            <p class="font-sans font-normal max-w-3xl mx-auto text-secondary-600 dark:text-dark-300 text-lg"><?= $services['subtitle'] ?></p>
        </div>

        <!-- Premium Consistent Grid Layout -->
        <div class="opacity-0 translate-y-8 transition-all duration-700 ease-out delay-100">
            <!-- Optimized 2x2 Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:gap-6 max-w-4xl mx-auto">
                <?php
                // Premium uniform service styling - perfect consistency
                $serviceLayouts = [
                    0 => [ // Desain Arsitektur
                        'accent' => 'blue',
                        'delay' => '0.1s'
                    ],
                    1 => [ // Desain Interior
                        'accent' => 'emerald',
                        'delay' => '0.2s'
                    ],
                    2 => [ // Konsultasi Proyek
                        'accent' => 'cyan',
                        'delay' => '0.3s'
                    ],
                    3 => [ // Manajemen Konstruksi
                        'accent' => 'amber',
                        'delay' => '0.4s'
                    ]
                ];
                ?>

                <?php foreach ($services['services'] as $index => $service): ?>
                    <?php
                    $layout = $serviceLayouts[$index];
                    ?>

                    <!-- Premium Service Card Container -->
                    <div class="opacity-0 translate-y-8 transition-all duration-700 ease-out animate-fade-in-up"
                         style="animation-delay: <?= $layout['delay'] ?>;">

                        <!-- Premium Consistent Service Card - Optimized Height -->
                        <div class="group relative h-full min-h-[320px] bg-gradient-to-br from-gray-900/95 to-black/98 backdrop-blur-xl border border-gray-700/40 rounded-2xl overflow-hidden hover:border-<?= $layout['accent'] ?>-400/70 transition-all duration-500 ease-out hover:shadow-xl hover:shadow-<?= $layout['accent'] ?>-500/20 hover:-translate-y-2 hover:scale-[1.02]">

                            <!-- Premium Background Elements -->
                            <div class="absolute inset-0 opacity-[0.02]">
                                <div class="absolute top-4 right-4 w-8 h-8 border border-<?= $layout['accent'] ?>-400/30 rotate-45 rounded-lg"></div>
                                <div class="absolute bottom-4 left-4 w-6 h-6 bg-<?= $layout['accent'] ?>-400/10 rounded-full"></div>
                            </div>

                            <!-- Subtle Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-br from-<?= $layout['accent'] ?>-500/[0.01] to-transparent"></div>

                            <!-- Optimized Content Container -->
                            <div class="relative z-10 p-5 lg:p-6 h-full flex flex-col justify-between">

                                <!-- Optimized Icon Container -->
                                <div class="w-14 h-14 mb-3 relative mx-auto transition-transform duration-200 group-hover:scale-110">
                                    <div class="w-full h-full bg-gradient-to-br from-<?= $layout['accent'] ?>-400 to-<?= $layout['accent'] ?>-600 rounded-xl flex items-center justify-center shadow-lg shadow-<?= $layout['accent'] ?>-500/20">
                                        <i class="fas fa-<?= $service['icon'] ?> text-lg text-white"></i>
                                    </div>
                                </div>

                                <!-- Balanced Content Section -->
                                <div class="text-center flex-grow flex flex-col justify-center">
                                    <h3 class="font-sans font-bold text-lg lg:text-xl text-white mb-2 group-hover:text-<?= $layout['accent'] ?>-400 transition-colors duration-300 leading-tight">
                                        <?= $service['title'] ?>
                                    </h3>
                                    <p class="font-sans text-gray-300 text-sm leading-relaxed px-1">
                                        <?= $service['description'] ?>
                                    </p>
                                </div>

                                <!-- Compact CTA Button -->
                                <div class="mt-3 pt-3 border-t border-gray-700/30">
                                    <a href="#contact" class="group/cta w-full bg-gradient-to-r from-<?= $layout['accent'] ?>-500 to-<?= $layout['accent'] ?>-600 hover:from-<?= $layout['accent'] ?>-400 hover:to-<?= $layout['accent'] ?>-500 text-white font-medium py-2.5 px-4 rounded-xl transition-all duration-300 flex items-center justify-center space-x-2 hover:shadow-lg hover:shadow-<?= $layout['accent'] ?>-500/30 text-sm">
                                        <span>Konsultasi</span>
                                        <i class="fas fa-arrow-right text-xs transition-transform group-hover/cta:translate-x-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        

    </div>
</section>

<!-- Portfolio Section -->
<section id="portfolio" class="py-20 bg-black scroll-mt-20">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 opacity-0 translate-y-8 transition-all duration-700 ease-out">
            <h2 class="font-sans text-3xl sm:text-4xl font-black text-secondary-800 dark:text-dark-100 mb-4"><?= $portfolio['title'] ?></h2>
            <div class="w-24 h-1 bg-primary-500 mx-auto mb-8"></div>
            <p class="font-sans font-normal max-w-3xl mx-auto text-secondary-600 dark:text-dark-300 text-lg"><?= $portfolio['subtitle'] ?></p>
        </div>
        
        <!-- Portfolio Filter -->
        <div class="flex flex-wrap justify-center gap-4 mb-12 opacity-0 translate-y-8 transition-all duration-700 ease-out" style="transition-delay: 0.2s;">
            <button class="filter-btn active font-sans py-3 px-8 rounded-full bg-primary-500 text-white font-medium transition-all shadow-md hover:shadow-lg" data-filter="all">
                <i class="fas fa-border-all mr-2"></i> Semua Proyek
            </button>
            <button class="filter-btn font-sans py-3 px-8 rounded-full bg-white dark:bg-dark-900 dark:border dark:border-dark-700 text-secondary-700 dark:text-dark-300 font-medium transition-all shadow-md hover:shadow-lg hover:bg-primary-50 dark:hover:bg-dark-700 dark:hover:border-dark-600" data-filter="Residensial">
                <i class="fas fa-home mr-2"></i> Residensial
            </button>
            <button class="filter-btn font-sans py-3 px-8 rounded-full bg-white dark:bg-dark-900 dark:border dark:border-dark-700 text-secondary-700 dark:text-dark-300 font-medium transition-all shadow-md hover:shadow-lg hover:bg-primary-50 dark:hover:bg-dark-700 dark:hover:border-dark-600" data-filter="Komersial">
                <i class="fas fa-building mr-2"></i> Komersial
            </button>
            <button class="filter-btn font-sans py-3 px-8 rounded-full bg-white dark:bg-dark-900 dark:border dark:border-dark-700 text-secondary-700 dark:text-dark-300 font-medium transition-all shadow-md hover:shadow-lg hover:bg-primary-50 dark:hover:bg-dark-700 dark:hover:border-dark-600" data-filter="Hospitality">
                <i class="fas fa-hotel mr-2"></i> Hospitality
            </button>
        </div>
        
        <!-- Portfolio Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8" id="portfolio-grid">
            <?php foreach ($portfolio['projects'] as $index => $project): ?>
            <div class="portfolio-item group overflow-hidden rounded-lg shadow-md bg-dark-900 opacity-0 translate-y-10 transition-all duration-500 ease-out" 
                 data-category="<?= $project['category'] ?>" 
                 style="transition-delay: <?= 0.05 * ($index + 1) ?>s;">
                <div class="relative overflow-hidden">
                    <!-- Project images from Unsplash that match the project type -->
                    <div class="h-64 bg-secondary-200 dark:bg-dark-800 overflow-hidden">
                        <?php
                        // Define specific image URLs based on project category
                        $imageUrls = [
                            'Residensial' => [
                                'Villa Pesisir' => 'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80',
                                'Apartment Sky View' => 'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                                'Rumah Minimalis Sejuk' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80'
                            ],
                            'Komersial' => [
                                'Kantor Modern Greenspace' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                                'Restoran Archipelago' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80'
                            ],
                            'Hospitality' => [
                                'Butik Hotel Cerita' => 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80'
                            ]
                        ];
                        
                        // Get image URL for current project
                        $imageUrl = $imageUrls[$project['category']][$project['title']] ?? 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80';
                        ?>
                        <img src="<?= $imageUrl ?>" 
                             data-src="<?= $imageUrl ?>" 
                             alt="<?= $project['title'] ?>" 
                             class="w-full h-full object-cover transition-all duration-500 group-hover:scale-110">
                        
                        <!-- Overlay with quick view -->
                        <div class="absolute inset-0 bg-secondary-900 bg-opacity-0 group-hover:bg-opacity-75 flex items-center justify-center transition-all duration-300 opacity-0 group-hover:opacity-100">
                            <button class="bg-white dark:bg-dark-800 text-secondary-800 dark:text-dark-100 hover:bg-primary-500 dark:hover:bg-primary-600 hover:text-white dark:hover:text-gray-50 p-3 rounded-full transform translate-y-4 group-hover:translate-y-0 transition-all duration-300" 
                                    onclick="openProjectModal('<?= htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8') ?>', '<?= $imageUrl ?>', '<?= htmlspecialchars($project['description'] ?? '', ENT_QUOTES, 'UTF-8') ?>', '<?= htmlspecialchars($project['category'], ENT_QUOTES, 'UTF-8') ?>', '<?= htmlspecialchars($project['client'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?>', '<?= htmlspecialchars($project['year'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?>', '<?= htmlspecialchars($project['location'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?>', '<?= htmlspecialchars($project['area'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?>')">
                                <i class="fas fa-search-plus"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Category Badge -->
                    <div class="absolute top-4 right-4 bg-primary-500 text-white text-sm font-sans font-medium py-1 px-3 rounded-full shadow-md transform translate-x-4 opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-300">
                        <?= $project['category'] ?>
                    </div>
                </div>
                
                <div class="p-6">
                    <h3 class="font-sans font-bold text-xl mb-2 text-white group-hover:text-emerald-400 transition-colors"><?= $project['title'] ?></h3>
                    <p class="font-sans font-normal text-gray-300 mb-4"><?= substr($project['description'] ?? '', 0, 100) ?>...</p>
                    <a href="#" class="font-sans text-emerald-400 hover:text-emerald-300 font-medium inline-flex items-center group" 
                       onclick="openProjectModal('<?= htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8') ?>', '<?= $imageUrl ?>', '<?= htmlspecialchars($project['description'] ?? '', ENT_QUOTES, 'UTF-8') ?>', '<?= htmlspecialchars($project['category'], ENT_QUOTES, 'UTF-8') ?>', '<?= htmlspecialchars($project['client'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?>', '<?= htmlspecialchars($project['year'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?>', '<?= htmlspecialchars($project['location'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?>', '<?= htmlspecialchars($project['area'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?>'); return false;">
                        Lihat Detail 
                        <svg class="w-4 h-4 ml-2 transform transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="py-20 bg-black scroll-mt-20">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 opacity-0 translate-y-8 transition-all duration-700 ease-out">
            <h2 class="font-sans text-3xl sm:text-4xl font-black text-secondary-800 dark:text-dark-100 mb-4"><?= $testimonials['title'] ?></h2>
            <div class="w-24 h-1 bg-primary-500 mx-auto mb-8"></div>
            <p class="font-sans font-normal max-w-3xl mx-auto text-secondary-600 dark:text-dark-300 text-lg"><?= $testimonials['subtitle'] ?></p>
        </div>
        
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php foreach ($testimonials['testimonials'] as $testimonial): ?>
                <div class="bg-secondary-50 dark:bg-dark-900 p-8 rounded-lg shadow-lg relative testimonial-card pb-10 opacity-0 translate-y-8 transition-all duration-500 ease-out stagger-item">
                    <div class="absolute -top-5 left-8">
                        <span class="text-6xl text-primary-300 dark:text-primary-600">"</span>
                    </div>
                    <div class="pt-6">
                        <p class="font-sans font-normal text-secondary-600 dark:text-dark-200 mb-6 italic"><?= $testimonial['text'] ?></p>
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full mr-4 overflow-hidden">
                                <img src="<?= htmlspecialchars($testimonial['image']) ?>" alt="<?= htmlspecialchars($testimonial['name']) ?>" class="w-full h-full object-cover" loading="lazy">
                            </div>
                            <div>
                                <h4 class="font-sans font-bold"><?= $testimonial['name'] ?></h4>
                                <p class="font-sans font-normal text-gray-500 text-sm"><?= $testimonial['position'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 flex">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <i class="fas fa-star <?= $i <= $testimonial['rating'] ? 'text-yellow-400 dark:text-yellow-400' : 'text-secondary-300 dark:text-dark-600' ?>"></i>
                        <?php endfor; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section id="faq" class="py-20 bg-black text-white scroll-mt-20">
  <div class="container mx-auto px-4">
    <h2 class="font-sans text-3xl sm:text-4xl font-black mb-4 text-center">Pertanyaan Umum</h2>
    <p class="mb-10 text-center text-gray-400">Temukan jawaban atas pertanyaan yang sering diajukan tentang layanan kami.</p>
    <div class="flex flex-col md:flex-row gap-8">
      <!-- Categories -->
      <aside class="md:w-1/4">
        <div class="bg-dark-900 rounded-xl shadow-lg border border-dark-700 p-4">
          <?php $firstCat = true; foreach ($faq['categories'] as $cat => $items): ?>
            <button type="button"
              class="faq-category w-full text-left px-4 py-3 mb-2 rounded-lg transition font-medium flex items-center gap-2
                <?php if ($firstCat) {echo 'bg-primary-500 text-white shadow';} else {echo 'bg-dark-800 text-gray-300 hover:bg-dark-700';} ?>"
              data-category="<?= htmlspecialchars($cat) ?>">
              <?php if ($cat === 'Umum'): ?><i class="fa fa-question-circle"></i><?php elseif ($cat === 'Desain'): ?><i class="fa fa-pencil-ruler"></i><?php elseif ($cat === 'Biaya'): ?><i class="fa fa-wallet"></i><?php endif; ?>
              <?= htmlspecialchars($cat) ?>
            </button>
          <?php $firstCat = false; endforeach; ?>
        </div>
      </aside>
      <!-- Questions/Answers -->
      <div class="md:w-3/4">
        <?php $firstPanel = true; foreach ($faq['categories'] as $cat => $items): ?>
          <div class="faq-panel <?php if (!$firstPanel) echo 'hidden'; ?>" data-category="<?= htmlspecialchars($cat) ?>">
            <?php foreach ($items as $q): ?>
              <div class="faq-item bg-dark-900 border border-dark-700 rounded-xl shadow mb-4 overflow-hidden">
                <button type="button" class="faq-question w-full flex justify-between items-center px-6 py-4 text-base md:text-lg font-semibold text-left focus:outline-none">
                  <span><?= htmlspecialchars($q['question']) ?></span>
                  <span class="faq-toggle-icon ml-2 transition"><i class="fa fa-chevron-down"></i></span>
                </button>
                <div class="faq-answer hidden px-6 pb-6 text-gray-300 text-sm md:text-base leading-relaxed border-t border-dark-800"><?= htmlspecialchars($q['answer']) ?></div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php $firstPanel = false; endforeach; ?>
      </div>
    </div>
    <div class="mt-10 text-center bg-dark-900 rounded-xl shadow-lg border border-dark-700 p-6">
      <span class="font-bold text-lg">Masih punya pertanyaan?</span>
      <p class="text-gray-400 mb-2">Tim kami siap membantu menjawab segala pertanyaan Anda tentang layanan kami.</p>
      <a href="#contact" class="text-emerald-400 hover:underline font-medium">Hubungi Kami <i class="fa fa-arrow-right"></i></a>
    </div>
  </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-12 bg-black scroll-mt-20 relative overflow-hidden">
    <!-- Background Map with Overlay -->
    <div class="absolute inset-0 opacity-10">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.515560073746!2d113.69243997242727!3d-8.150696587006067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695266ceb2fbb%3A0x4f7d8c2cd93f9499!2sANTOSA%20ARCHITECT%20%7C%20JASA%20ARSITEK%20PROFESIONAL%20BERLISENSI!5e0!3m2!1sen!2sid!4v1749265217676!5m2!1sen!2sid"
            width="100%"
            height="100%"
            style="border:0;"
            allowfullscreen=""
            loading="lazy">
        </iframe>
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-black via-black/95 to-black/80"></div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Header Section -->
        <div class="text-center mb-10 opacity-0 translate-y-8 transition-all duration-700 ease-out">
            <h2 class="font-sans text-2xl sm:text-3xl font-black text-white mb-3">Hubungi Kami</h2>
            <div class="w-16 h-0.5 bg-primary-500 mx-auto mb-4"></div>
            <p class="font-sans font-normal max-w-2xl mx-auto text-gray-300 text-base">Punya pertanyaan atau ingin memulai proyek dengan kami? Jangan ragu untuk menghubungi kami.</p>
        </div>

        <!-- Premium Asymmetric Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 lg:gap-8">
            <!-- Contact Form - 60% width (3/5) -->
            <div class="lg:col-span-3">
                <div id="contact-form" class="bg-gradient-to-br from-gray-800/95 to-gray-900/95 backdrop-blur-sm p-6 md:p-8 rounded-2xl shadow-2xl border border-primary-400/20 opacity-0 translate-y-8 transition-all duration-700 ease-out delay-100">
                    <div class="flex items-center mb-6">
                        <div class="w-8 h-8 rounded-lg bg-primary-500 flex items-center justify-center mr-3">
                            <i class="fas fa-envelope text-white text-sm"></i>
                        </div>
                        <h3 class="font-sans text-xl font-bold text-white">Kirim Pesan</h3>
                    </div>

                    <form action="<?= url('/send-inquiry') ?>" method="POST" class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="font-sans font-medium text-xs text-gray-300 mb-1.5 block uppercase tracking-wide">Nama Lengkap</label>
                                <input type="text" id="name" name="name" required class="font-sans w-full px-3 py-2.5 border border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-400 bg-gray-700/50 text-white text-sm transition-all placeholder-gray-400">
                            </div>
                            <div>
                                <label for="phone" class="font-sans font-medium text-xs text-gray-300 mb-1.5 block uppercase tracking-wide">Nomor Telepon</label>
                                <input type="tel" id="phone" name="phone" class="font-sans w-full px-3 py-2.5 border border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-400 bg-gray-700/50 text-white text-sm transition-all placeholder-gray-400">
                            </div>
                        </div>

                        <div>
                            <label for="email" class="font-sans font-medium text-xs text-gray-300 mb-1.5 block uppercase tracking-wide">Email</label>
                            <input type="email" id="email" name="email" required class="font-sans w-full px-3 py-2.5 border border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-400 bg-gray-700/50 text-white text-sm transition-all placeholder-gray-400">
                        </div>

                        <div>
                            <label for="message" class="font-sans font-medium text-xs text-gray-300 mb-1.5 block uppercase tracking-wide">Pesan</label>
                            <textarea id="message" name="message" rows="4" required class="font-sans w-full px-3 py-2.5 border border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-400 bg-gray-700/50 text-white text-sm resize-none transition-all placeholder-gray-400"></textarea>
                        </div>

                        <button type="submit" class="font-sans w-full py-3 px-6 bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-semibold rounded-lg transition-all duration-300 transform hover:scale-[1.02] shadow-lg hover:shadow-xl">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>

            <!-- Contact Information - 40% width (2/5) -->
            <div class="lg:col-span-2 space-y-4">
                <!-- Quick Contact Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-4">
                    <!-- Phone Card -->
                    <div class="bg-gradient-to-br from-primary-500 to-primary-600 p-4 rounded-xl shadow-lg opacity-0 translate-y-8 transition-all duration-700 ease-out delay-200 hover:scale-105 transform">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-lg bg-white/20 flex items-center justify-center mr-3">
                                <i class="fas fa-phone-alt text-white text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-sans font-semibold text-white text-sm">Telepon</h4>
                                <a href="tel:<?= str_replace([' ', '-'], '', COMPANY_PHONE) ?>" class="font-sans text-white/90 text-xs hover:text-white transition-colors"><?= COMPANY_PHONE ?></a>
                            </div>
                        </div>
                    </div>

                    <!-- Email Card -->
                    <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 p-4 rounded-xl shadow-lg opacity-0 translate-y-8 transition-all duration-700 ease-out delay-250 hover:scale-105 transform">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-lg bg-white/20 flex items-center justify-center mr-3">
                                <i class="fas fa-envelope text-white text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-sans font-semibold text-white text-sm">Email</h4>
                                <a href="mailto:<?= COMPANY_EMAIL ?>" class="font-sans text-white/90 text-xs hover:text-white transition-colors"><?= COMPANY_EMAIL ?></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address Card -->
                <div class="bg-gradient-to-br from-slate-600 to-slate-700 p-4 rounded-xl shadow-lg opacity-0 translate-y-8 transition-all duration-700 ease-out delay-300 hover:scale-105 transform">
                    <div class="flex items-start">
                        <div class="w-10 h-10 rounded-lg bg-white/20 flex items-center justify-center mr-3">
                            <i class="fas fa-map-marker-alt text-white text-sm"></i>
                        </div>
                        <div>
                            <h4 class="font-sans font-semibold text-white text-sm">Alamat</h4>
                            <p class="font-sans text-white/90 text-xs leading-relaxed hover:text-white transition-colors"><?= COMPANY_ADDRESS ?></p>
                        </div>
                    </div>
                </div>

                <!-- Working Hours Card -->
                <div class="bg-gradient-to-br from-purple-500 to-purple-600 p-4 rounded-xl shadow-lg opacity-0 translate-y-8 transition-all duration-700 ease-out delay-350 hover:scale-105 transform">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-lg bg-white/20 flex items-center justify-center mr-3">
                            <i class="fas fa-clock text-white text-sm"></i>
                        </div>
                        <div>
                            <h4 class="font-sans font-semibold text-white text-sm">Jam Kerja</h4>
                            <p class="font-sans text-white/90 text-xs hover:text-white transition-colors"><?= OFFICE_HOURS ?></p>
                        </div>
                    </div>
                </div>

                <!-- Interactive Map Card -->
                <div class="bg-white/95 backdrop-blur-sm rounded-xl shadow-lg overflow-hidden opacity-0 translate-y-8 transition-all duration-700 ease-out delay-350 hover:scale-105 transform">
                    <div class="p-4 border-b border-gray-100">
                        <div class="flex items-center">
                            <div class="w-8 h-8 rounded-lg bg-primary-500 flex items-center justify-center mr-3">
                                <i class="fas fa-map text-white text-sm"></i>
                            </div>
                            <h4 class="font-sans font-semibold text-gray-900 text-sm">Lokasi Kami</h4>
                        </div>
                    </div>
                    <div class="h-48">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.515560073746!2d113.69243997242727!3d-8.150696587006067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695266ceb2fbb%3A0x4f7d8c2cd93f9499!2sANTOSA%20ARCHITECT%20%7C%20JASA%20ARSITEK%20PROFESIONAL%20BERLISENSI!5e0!3m2!1sen!2sid!4v1749265217676!5m2!1sen!2sid"
                            width="100%"
                            height="100%"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'layouts/partials/footer.php'; ?>

<!-- Project Modal -->
<div id="project-modal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <div class="absolute inset-0 bg-dark-950 bg-opacity-75 backdrop-blur-sm transition-opacity duration-300 opacity-0" id="modal-overlay"></div>
    
    <div class="relative bg-white dark:bg-dark-900 rounded-lg shadow-xl w-full max-w-2xl mx-auto transform transition-all duration-300 ease-out scale-90 opacity-0" id="modal-container">
        <!-- Close button -->
        <button id="modal-close" class="absolute top-4 right-4 text-secondary-500 dark:text-dark-400 hover:text-secondary-700 dark:hover:text-dark-100 text-2xl focus:outline-none z-10">
            <i class="fas fa-times text-xl"></i>
        </button>
        
        <!-- Modal content -->
        <div class="flex flex-col md:flex-row">
            <!-- Project image -->
            <div class="md:w-1/2">
                <img id="modal-image" src="" alt="Project" class="w-full h-full object-cover">
            </div>
            
            <!-- Project details -->
            <div class="md:w-1/2 p-8">
                <span id="modal-category" class="text-sm text-primary-500 dark:text-primary-400 font-medium tracking-wider uppercase">x-3 py-1 rounded-full text-sm font-medium mb-4"></span>
                <h3 id="modal-title" class="text-2xl font-bold text-secondary-800 dark:text-dark-100 mb-2"></h3>
                <div id="modal-description" class="text-secondary-600 dark:text-dark-300 my-4 text-lg leading-relaxed">
                
                <div class="border-t border-secondary-200 pt-4 mt-4">
                    <h4 class="font-bold text-lg mb-2">Detail Proyek</h4>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-gray-500 text-sm">Klien</p>
                            <p id="modal-client" class="font-medium">PT Sejahtera Abadi</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Tahun</p>
                            <p id="modal-year" class="font-medium">2024</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Lokasi</p>
                            <p id="modal-location" class="font-medium">Jakarta Selatan</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Luas</p>
                            <p id="modal-area" class="font-medium">450 m²</p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6">
                    <a href="#contact" class="bg-primary-500 hover:bg-primary-600 text-white font-medium py-2 px-6 rounded-md transition-colors inline-flex items-center" id="modal-contact-btn">
                        <i class="fas fa-envelope mr-2"></i> Konsultasikan Proyek Serupa
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Get the content from output buffer
$content = ob_get_clean();

// Include the layout with the content
require VIEWS_DIR . '/layouts/main.php';
?>
