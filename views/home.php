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
// Use hero data from controller
$hero_slides = $hero['slides'] ?? [];
$hero_title = $hero['title'] ?? 'Bangun Rumah Impian Anda';
$hero_subtitle = $hero['subtitle'] ?? 'Desain modern, konstruksi berkualitas, dan solusi berkelanjutan untuk mewujudkan hunian ideal sesuai gaya hidup Anda.';
$hero_cta_buttons = $hero['cta_buttons'] ?? [];
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
            <h1 class="hero-title font-sans text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-black text-white leading-[0.9] mb-4 lg:mb-6 text-shadow-lg" data-aos="fade-up" data-aos-duration="800">
                <?php
                $title_parts = explode(' ', $hero_title);
                $first_part = implode(' ', array_slice($title_parts, 0, 2));
                $second_part = implode(' ', array_slice($title_parts, 2));
                ?>
                <span class="hero-title-line-1 block" data-aos="fade-up" data-aos-delay="200"><?= htmlspecialchars($first_part) ?></span>
                <span class="hero-title-line-2 block text-primary-400 drop-shadow-lg" data-aos="fade-up" data-aos-delay="400"><?= htmlspecialchars($second_part) ?></span>
            </h1>

            <!-- Subtitle - Reduced sizes with Delayed Animation -->
            <p class="hero-subtitle text-base sm:text-lg md:text-xl lg:text-2xl font-sans font-light text-gray-200 max-w-3xl mx-auto mb-6 lg:mb-8 text-shadow leading-relaxed" data-aos="fade-up" data-aos-delay="600">
                <?= htmlspecialchars($hero_subtitle) ?>
            </p>

            <!-- Consistent CTA Buttons -->
            <div class="hero-cta-buttons flex flex-col sm:flex-row justify-center items-center gap-4 lg:gap-6" data-aos="fade-up" data-aos-delay="800">
                <a href="#contact"
                   class="hero-cta-primary group bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-400 hover:to-primary-500 text-white font-sans font-bold py-4 px-8 rounded-xl transition-all duration-300 hover:scale-105 hover:shadow-xl hover:shadow-primary-500/30 text-base flex items-center justify-center min-w-[260px] focus:outline-none focus:ring-4 focus:ring-primary-400/50"
                   data-aos="zoom-in" data-aos-delay="1000"
                   role="button"
                   aria-label="Mulai konsultasi gratis dengan tim arsitek kami">
                    <span>Mulai Konsultasi Gratis</span>
                    <i class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
                </a>
                <a href="#portfolio"
                   class="hero-cta-secondary group bg-gray-800/60 hover:bg-gray-700/80 border-2 border-gray-600 hover:border-primary-400 text-white font-sans font-bold py-4 px-8 rounded-xl transition-all duration-300 hover:scale-105 text-base backdrop-blur-md flex items-center justify-center min-w-[260px] focus:outline-none focus:ring-4 focus:ring-white/20"
                   data-aos="zoom-in" data-aos-delay="1200"
                   role="button"
                   aria-label="Lihat portofolio hasil karya kami">
                    <span>Lihat Hasil Karya</span>
                    <i class="fas fa-external-link-alt ml-2 transition-transform group-hover:translate-x-1"></i>
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
        <div class="absolute top-20 left-10 w-96 h-96 border border-primary-400 rotate-45 transform-gpu" data-aos="fade" data-aos-duration="2000"></div>
        <div class="absolute bottom-20 right-10 w-64 h-64 border border-emerald-400 rotate-12 transform-gpu" data-aos="fade" data-aos-duration="2000" data-aos-delay="500"></div>
        <div class="absolute top-1/2 left-1/3 w-32 h-32 bg-gradient-to-br from-primary-500/20 to-emerald-500/20 rotate-45 transform-gpu" data-aos="fade" data-aos-duration="2000" data-aos-delay="1000"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Hero Content - Asymmetric Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16 mb-16 lg:mb-24">
            <!-- Left Content - 7 columns -->
            <div class="lg:col-span-7 space-y-8">
                <div data-aos="fade-up" data-aos-duration="800">
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
                <div data-aos="fade-left" data-aos-duration="800" data-aos-delay="300">
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
            <div class="text-center" data-aos="fade-up" data-aos-duration="800" data-aos-delay="500">
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
                    <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="<?= 200 * ($index + 1) ?>">

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

<!-- Services Section - Consistent Design System -->
<section id="services" class="py-16 lg:py-24 scroll-mt-20 bg-black">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Consistent Header Styling -->
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <div class="inline-flex items-center space-x-4 mb-6">
                <div class="w-12 h-px bg-gradient-to-r from-transparent via-primary-400 to-transparent"></div>
                <span class="text-sm font-bold tracking-widest text-primary-400 uppercase">Layanan</span>
                <div class="w-12 h-px bg-gradient-to-r from-transparent via-primary-400 to-transparent"></div>
            </div>
            <h2 class="font-sans text-4xl sm:text-5xl lg:text-6xl font-black bg-gradient-to-r from-white via-gray-100 to-white bg-clip-text text-transparent mb-6">
                <?= $services['title'] ?>
            </h2>
            <p class="font-sans font-normal max-w-3xl mx-auto text-gray-300 text-lg lg:text-xl leading-relaxed">
                <?= $services['subtitle'] ?>
            </p>
        </div>

        <!-- Bento Grid Services Layout -->
        <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
            <!-- Bento Grid Container with Improved Accessibility -->
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 lg:gap-6 max-w-7xl mx-auto auto-rows-fr" role="list" aria-label="Layanan arsitektur yang tersedia">

                <?php
                // Improved Bento Grid layout configuration for better consistency
                $bentoConfig = [
                    ['cols' => 'md:col-span-2 lg:col-span-2', 'rows' => 'md:row-span-2', 'featured' => true],
                    ['cols' => 'md:col-span-1', 'rows' => 'md:row-span-1', 'featured' => false],
                    ['cols' => 'md:col-span-1', 'rows' => 'md:row-span-1', 'featured' => false],
                    ['cols' => 'md:col-span-2 lg:col-span-2', 'rows' => 'md:row-span-1', 'featured' => false]
                ];

                // Base card classes to avoid repetition
                $baseCardClasses = 'group relative h-full bg-gradient-to-br from-gray-900/95 to-black/98 backdrop-blur-xl border border-gray-700/40 rounded-2xl overflow-hidden hover:border-primary-400/70 transition-all duration-500 ease-out hover:shadow-xl hover:shadow-primary-500/20 hover:-translate-y-1 hover:scale-[1.01]';
                ?>

                <?php foreach ($services['services'] as $index => $service): ?>
                    <?php
                    $config = $bentoConfig[$index];
                    $isFeatured = $config['featured'];
                    ?>

                    <div class="<?= $config['cols'] ?> <?= $config['rows'] ?>" data-aos="fade-up" data-aos-duration="800" data-aos-delay="<?= 100 * ($index + 1) ?>" role="listitem">
                        <article class="<?= $baseCardClasses ?> <?= $isFeatured ? 'min-h-[380px] lg:min-h-[420px]' : 'min-h-[320px] lg:min-h-[360px]' ?>" aria-labelledby="service-title-<?= $index ?>" tabindex="0">

                            <!-- Optimized Background Elements -->
                            <div class="absolute inset-0 opacity-[0.03]">
                                <div class="absolute <?= $isFeatured ? 'top-6 right-6 w-12 h-12' : 'top-4 right-4 w-6 h-6' ?> border border-primary-400/<?= $isFeatured ? '30' : '20' ?> rotate-45 rounded-<?= $isFeatured ? 'lg' : 'md' ?>"></div>
                                <div class="absolute <?= $isFeatured ? 'bottom-6 left-6 w-8 h-8' : 'bottom-4 left-4 w-4 h-4' ?> bg-primary-400/<?= $isFeatured ? '10' : '8' ?> rounded-full"></div>
                                <?php if ($isFeatured): ?>
                                    <div class="absolute top-1/2 left-1/4 w-4 h-4 bg-primary-400/5 rounded-full"></div>
                                <?php endif; ?>
                            </div>

                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-br from-primary-500/[0.02] via-transparent to-<?= $service['color'] ?>-500/[0.01]"></div>

                            <!-- Optimized Content Container with Consistent Layout -->
                            <div class="relative z-10 p-6 lg:p-8 h-full flex flex-col justify-between">

                                <!-- Icon Container with Consistent Spacing -->
                                <div class="<?= $isFeatured ? 'w-18 h-18 lg:w-20 lg:h-20 mb-4' : 'w-16 h-16 mb-4' ?> relative mx-auto transition-transform duration-300 group-hover:scale-110">
                                    <div class="w-full h-full bg-gradient-to-br from-primary-400 to-primary-600 rounded-xl flex items-center justify-center shadow-lg shadow-primary-500/20">
                                        <i class="fas fa-<?= $service['icon'] ?> <?= $isFeatured ? 'text-xl lg:text-2xl' : 'text-lg lg:text-xl' ?> text-white"></i>
                                    </div>
                                </div>

                                <!-- Content Section with Consistent Spacing -->
                                <div class="text-center flex-grow flex flex-col justify-center">
                                    <h3 id="service-title-<?= $index ?>" class="font-sans font-bold <?= $isFeatured ? 'text-xl lg:text-2xl mb-3' : 'text-lg lg:text-xl mb-3' ?> text-white group-hover:text-primary-400 transition-colors duration-300 leading-tight">
                                        <?= $service['title'] ?>
                                    </h3>
                                    <p class="font-sans text-gray-300 <?= $isFeatured ? 'text-base lg:text-lg leading-relaxed max-w-md mx-auto mb-3' : 'text-sm lg:text-base leading-relaxed mb-3' ?>">
                                        <?= $service['description'] ?>
                                    </p>

                                    <!-- Features for All Cards - Improved Consistency -->
                                    <?php if (!empty($service['features'])): ?>
                                        <div class="mt-2 <?= $isFeatured ? 'grid grid-cols-2 gap-2' : 'space-y-1' ?> text-xs <?= $isFeatured ? 'text-gray-400' : 'text-gray-500' ?>">
                                            <?php foreach ($service['features'] as $index => $feature): ?>
                                                <?php if ($isFeatured): ?>
                                                    <div class="flex items-center space-x-2">
                                                        <i class="fas fa-check text-primary-400 text-xs"></i>
                                                        <span><?= $feature ?></span>
                                                    </div>
                                                <?php else: ?>
                                                    <?php if ($index < 2): // Show only first 2 features for non-featured cards ?>
                                                        <div class="flex items-center justify-center space-x-1">
                                                            <i class="fas fa-check text-primary-400 text-xs"></i>
                                                            <span><?= $feature ?></span>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Consistent CTA Button Spacing -->
                                <div class="mt-4 pt-3 border-t border-gray-700/30">
                                    <a href="#contact" class="group/cta w-full bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-400 hover:to-primary-500 text-white font-semibold <?= $isFeatured ? 'py-3 px-6 text-base' : 'py-2.5 px-5 text-sm' ?> rounded-xl transition-all duration-300 flex items-center justify-center space-x-2 hover:shadow-lg hover:shadow-primary-500/30 focus:outline-none focus:ring-2 focus:ring-primary-400 focus:ring-offset-2 focus:ring-offset-gray-900" aria-label="Konsultasi untuk <?= $service['title'] ?>">
                                        <span>Konsultasi</span>
                                        <i class="fas fa-arrow-right text-xs transition-transform group-hover/cta:translate-x-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Section - Consistent Background -->
<section id="portfolio" class="relative py-20 bg-black scroll-mt-20 overflow-hidden">
    <!-- Enhanced Background Elements for Visual Interest -->
    <div class="absolute inset-0 opacity-8">
        <div class="absolute top-20 left-10 w-72 h-72 bg-gradient-to-br from-primary-500/25 to-emerald-500/25 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-gradient-to-br from-cyan-500/15 to-blue-500/15 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-gradient-to-br from-primary-500/10 to-transparent rounded-full blur-2xl animate-pulse" style="animation-delay: 4s;"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Enhanced Header -->
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <div class="inline-flex items-center space-x-4 mb-6">
                <div class="w-12 h-px bg-gradient-to-r from-transparent via-primary-400 to-transparent"></div>
                <span class="text-sm font-bold tracking-widest text-primary-400 uppercase">Portfolio</span>
                <div class="w-12 h-px bg-gradient-to-r from-transparent via-primary-400 to-transparent"></div>
            </div>
            <h2 class="font-sans text-4xl sm:text-5xl lg:text-6xl font-black bg-gradient-to-r from-white via-gray-100 to-white bg-clip-text text-transparent mb-6">
                <?= $portfolio['title'] ?>
            </h2>
            <p class="font-sans font-normal max-w-3xl mx-auto text-gray-300 text-lg lg:text-xl leading-relaxed">
                <?= $portfolio['subtitle'] ?>
            </p>
        </div>

        <!-- Advanced Filter & Search System -->
        <div class="mb-12" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
            <!-- Search Bar -->
            <div class="max-w-md mx-auto mb-8">
                <div class="relative">
                    <input type="text"
                           id="portfolio-search"
                           placeholder="Cari proyek..."
                           class="w-full bg-gray-800/50 border border-gray-700 rounded-2xl py-4 px-6 pl-12 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent backdrop-blur-sm transition-all duration-300">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>
            </div>

            <!-- Filter Buttons -->
            <div class="flex flex-wrap justify-center gap-3 mb-8">
                <?php foreach ($portfolio['categories'] as $key => $label): ?>
                <button class="filter-btn <?= $key === 'all' ? 'active' : '' ?> group relative overflow-hidden font-sans py-3 px-6 rounded-2xl font-medium transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-primary-500/50"
                        data-filter="<?= $key ?>">
                    <div class="absolute inset-0 bg-gradient-to-r from-primary-500 to-emerald-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute inset-0 bg-gray-800/80 backdrop-blur-sm"></div>
                    <span class="relative z-10 flex items-center space-x-2 text-gray-300 group-hover:text-white transition-colors duration-300">
                        <?php
                        $icons = [
                            'all' => 'fas fa-th-large',
                            'Residensial' => 'fas fa-home',
                            'Komersial' => 'fas fa-building',
                            'Hospitality' => 'fas fa-hotel',
                            'Institutional' => 'fas fa-university'
                        ];
                        ?>
                        <i class="<?= $icons[$key] ?? 'fas fa-folder' ?>"></i>
                        <span><?= $label ?></span>
                    </span>
                </button>
                <?php endforeach; ?>
            </div>

            <!-- View Options & Sort -->
            <div class="flex flex-wrap justify-between items-center gap-4">
                <div class="flex items-center space-x-4">
                    <span class="text-gray-400 text-sm font-medium">Tampilan:</span>
                    <div class="flex bg-gray-800/50 rounded-xl p-1">
                        <button id="grid-view" class="view-toggle active px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300">
                            <i class="fas fa-th mr-2"></i>Grid
                        </button>
                        <button id="list-view" class="view-toggle px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300">
                            <i class="fas fa-list mr-2"></i>List
                        </button>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <span class="text-gray-400 text-sm font-medium">Urutkan:</span>
                    <select id="sort-options" class="bg-gray-800/50 border border-gray-700 rounded-xl py-2 px-4 text-white text-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                        <option value="newest">Terbaru</option>
                        <option value="oldest">Terlama</option>
                        <option value="name">Nama A-Z</option>
                        <option value="category">Kategori</option>
                    </select>
                </div>
            </div>
        </div>
        
        <!-- Dynamic Portfolio Bento Grid -->
        <div id="portfolio-container" class="relative">
            <!-- Bento Grid View -->
            <div id="portfolio-grid" class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-6 gap-4 lg:gap-6 auto-rows-fr">
                <?php
                // Enhanced Bento Grid layout configuration for portfolio
                $portfolioBentoConfig = [
                    // First row - Featured large project
                    0 => ['cols' => 'md:col-span-2 lg:col-span-3', 'rows' => 'md:row-span-2', 'featured' => true, 'size' => 'hero'],
                    1 => ['cols' => 'md:col-span-1 lg:col-span-1', 'rows' => 'md:row-span-1', 'featured' => false, 'size' => 'small'],
                    2 => ['cols' => 'md:col-span-1 lg:col-span-2', 'rows' => 'md:row-span-1', 'featured' => false, 'size' => 'medium'],

                    // Second row
                    3 => ['cols' => 'md:col-span-1 lg:col-span-1', 'rows' => 'md:row-span-1', 'featured' => false, 'size' => 'small'],
                    4 => ['cols' => 'md:col-span-2 lg:col-span-2', 'rows' => 'md:row-span-1', 'featured' => true, 'size' => 'wide'],
                    5 => ['cols' => 'md:col-span-1 lg:col-span-1', 'rows' => 'md:row-span-1', 'featured' => false, 'size' => 'small'],

                    // Third row and beyond - dynamic pattern
                    6 => ['cols' => 'md:col-span-1 lg:col-span-2', 'rows' => 'md:row-span-1', 'featured' => false, 'size' => 'medium'],
                    7 => ['cols' => 'md:col-span-1 lg:col-span-1', 'rows' => 'md:row-span-1', 'featured' => false, 'size' => 'small'],
                    8 => ['cols' => 'md:col-span-2 lg:col-span-3', 'rows' => 'md:row-span-1', 'featured' => false, 'size' => 'wide'],
                ];

                // Base portfolio card classes
                $basePortfolioCardClasses = 'portfolio-item group relative overflow-hidden rounded-2xl shadow-lg bg-gradient-to-br from-gray-800 to-gray-900 border border-gray-800 hover:border-primary-500/30 transition-all duration-500';
                ?>

                <?php foreach ($portfolio['projects'] as $index => $project): ?>
                <?php
                    // Get Bento configuration or use default for additional projects
                    $bentoConfig = $portfolioBentoConfig[$index] ?? ['cols' => 'md:col-span-1', 'rows' => 'md:row-span-1', 'featured' => false, 'size' => 'small'];
                    $isBentoFeatured = $bentoConfig['featured'];
                    $bentoSize = $bentoConfig['size'];

                    // Get first image from the project's images array
                    $imageUrl = $project['images'][0] ?? 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80';

                    // Generate tags string for data attribute
                    $tagsString = implode(',', $project['tags'] ?? []);

                    // Calculate AOS delay based on index
                    $aosDelay = 100 + ($index * 50);
                ?>
                <div class="<?= $bentoConfig['cols'] ?> <?= $bentoConfig['rows'] ?>" data-aos="fade-up" data-aos-duration="800" data-aos-delay="<?= $aosDelay ?>">
                    <div class="<?= $basePortfolioCardClasses ?> h-full <?=
                        $bentoSize === 'hero' ? 'min-h-[400px] lg:min-h-[500px]' :
                        ($bentoSize === 'wide' ? 'min-h-[280px] lg:min-h-[320px]' :
                        ($bentoSize === 'medium' ? 'min-h-[300px] lg:min-h-[350px]' : 'min-h-[250px] lg:min-h-[280px]'))
                    ?>"
                         data-category="<?= $project['category'] ?>"
                         data-id="<?= $project['id'] ?>"
                         data-year="<?= $project['year'] ?>"
                         data-location="<?= $project['location'] ?>"
                         data-tags="<?= $tagsString ?>"
                         data-featured="<?= $project['featured'] ? 'true' : 'false' ?>">

                        <!-- Adaptive Project Image with Gradient Overlay -->
                        <div class="relative overflow-hidden <?=
                            $bentoSize === 'hero' ? 'h-3/5' :
                            ($bentoSize === 'wide' ? 'h-2/3' :
                            ($bentoSize === 'medium' ? 'h-3/5' : 'h-2/3'))
                        ?>">
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent z-10"></div>
                            <img src="<?= $imageUrl ?>"
                                 alt="<?= $project['title'] ?>"
                                 class="w-full h-full object-cover transition-all duration-700 ease-in-out group-hover:scale-110 group-hover:rotate-1">

                            <!-- Enhanced Hover Overlay for Different Sizes -->
                            <div class="absolute inset-0 bg-gradient-to-b from-primary-600/80 to-gray-900/90 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-500 z-20">
                                <div class="flex flex-col items-center space-y-<?= $bentoSize === 'hero' ? '4' : '2' ?> p-<?= $bentoSize === 'hero' ? '6' : '4' ?> text-center">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-white/20 backdrop-blur-sm text-white">
                                        <?= $project['category'] ?>
                                    </span>
                                    <h3 class="font-sans font-bold <?= $bentoSize === 'hero' ? 'text-xl md:text-2xl' : ($bentoSize === 'small' ? 'text-lg' : 'text-xl') ?> text-white"><?= $project['title'] ?></h3>
                                    <?php if ($bentoSize !== 'small'): ?>
                                        <p class="font-sans text-sm text-gray-200 line-clamp-<?= $bentoSize === 'hero' ? '3' : '2' ?>"><?= $project['description'] ?></p>
                                    <?php endif; ?>
                                    <button onclick="openProjectModal('<?= $project['id'] ?>')"
                                            class="mt-<?= $bentoSize === 'hero' ? '4' : '2' ?> px-<?= $bentoSize === 'hero' ? '6' : '4' ?> py-2 bg-white text-gray-900 rounded-full font-medium transform hover:scale-105 transition-all duration-300 flex items-center space-x-2 <?= $bentoSize === 'small' ? 'text-sm' : '' ?>">
                                        <span>Detail</span>
                                        <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Adaptive Project Info -->
                        <div class="p-<?= $bentoSize === 'hero' ? '6' : ($bentoSize === 'small' ? '4' : '5') ?> relative z-10 flex-1 flex flex-col justify-between">
                            <!-- Tags - Adaptive display -->
                            <?php if ($bentoSize !== 'small'): ?>
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <?php
                                    $tagLimit = $bentoSize === 'hero' ? 4 : 2;
                                    foreach (array_slice($project['tags'] ?? [], 0, $tagLimit) as $tag):
                                    ?>
                                    <span class="text-xs font-medium px-2 py-1 rounded-md bg-gray-700/50 text-gray-300">#<?= $tag ?></span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <h3 class="font-sans font-bold <?=
                                $bentoSize === 'hero' ? 'text-xl lg:text-2xl' :
                                ($bentoSize === 'small' ? 'text-lg' : 'text-xl')
                            ?> text-white group-hover:text-primary-400 transition-colors <?= $bentoSize === 'small' ? 'mb-2' : 'mb-3' ?>"><?= $project['title'] ?></h3>

                            <!-- Location and Year - Adaptive -->
                            <div class="flex items-center <?= $bentoSize === 'small' ? 'space-x-2' : 'space-x-4' ?> mt-2 text-<?= $bentoSize === 'small' ? 'xs' : 'sm' ?> text-gray-400">
                                <span class="flex items-center">
                                    <i class="fas fa-map-marker-alt mr-1 text-primary-500"></i> <?= $project['location'] ?>
                                </span>
                                <span class="flex items-center">
                                    <i class="fas fa-calendar mr-1 text-primary-500"></i> <?= $project['year'] ?>
                                </span>
                            </div>

                            <!-- Description - Only for larger cards -->
                            <?php if ($bentoSize !== 'small'): ?>
                                <p class="font-sans text-gray-300 mt-3 mb-4 line-clamp-<?= $bentoSize === 'hero' ? '3' : '2' ?>"><?= $project['description'] ?></p>
                            <?php endif; ?>

                            <!-- Action and Featured Badge -->
                            <div class="flex justify-between items-center mt-auto">
                                <button onclick="openProjectModal('<?= $project['id'] ?>')"
                                        class="text-primary-400 hover:text-primary-300 font-medium inline-flex items-center group <?= $bentoSize === 'small' ? 'text-sm' : '' ?>">
                                    <span>Detail</span>
                                    <svg class="w-4 h-4 ml-2 transform transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>

                                <?php if ($project['featured'] && $bentoSize !== 'small'): ?>
                                <span class="inline-flex items-center px-2 py-1 rounded-md text-xs font-medium bg-primary-500/20 text-primary-400">
                                    <i class="fas fa-star mr-1"></i> Featured
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- List View (Hidden by Default) -->
            <div id="portfolio-list" class="hidden space-y-4">
                <?php foreach ($portfolio['projects'] as $index => $project): ?>
                <div class="portfolio-item group relative overflow-hidden rounded-xl shadow-md bg-gray-800/80 border border-gray-700 hover:border-primary-500/30 transition-all duration-300"
                     data-category="<?= $project['category'] ?>"
                     data-id="<?= $project['id'] ?>"
                     data-year="<?= $project['year'] ?>"
                     data-location="<?= $project['location'] ?>"
                     data-tags="<?= implode(',', $project['tags'] ?? []) ?>"
                     data-featured="<?= $project['featured'] ? 'true' : 'false' ?>"
                     data-aos="fade-up" data-aos-duration="600" data-aos-delay="<?= 50 * ($index + 1) ?>">

                    <div class="flex flex-col md:flex-row">
                        <!-- Image -->
                        <div class="md:w-1/3 relative h-48 md:h-auto">
                            <img src="<?= $project['images'][0] ?? '' ?>"
                                 alt="<?= $project['title'] ?>"
                                 class="w-full h-full object-cover">

                            <!-- Category Badge -->
                            <div class="absolute top-4 left-4 bg-primary-500/80 backdrop-blur-sm text-white text-xs font-medium py-1 px-3 rounded-full">
                                <?= $project['category'] ?>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="md:w-2/3 p-6">
                            <div class="flex justify-between items-start">
                                <h3 class="font-sans font-bold text-xl text-white group-hover:text-primary-400 transition-colors"><?= $project['title'] ?></h3>

                                <?php if ($project['featured']): ?>
                                <span class="inline-flex items-center px-2 py-1 rounded-md text-xs font-medium bg-primary-500/20 text-primary-400">
                                    <i class="fas fa-star mr-1"></i> Featured
                                </span>
                                <?php endif; ?>
                            </div>

                            <div class="flex items-center space-x-4 mt-2 text-sm text-gray-400">
                                <span class="flex items-center">
                                    <i class="fas fa-map-marker-alt mr-1 text-primary-500"></i> <?= $project['location'] ?>
                                </span>
                                <span class="flex items-center">
                                    <i class="fas fa-calendar mr-1 text-primary-500"></i> <?= $project['year'] ?>
                                </span>
                                <span class="flex items-center">
                                    <i class="fas fa-ruler-combined mr-1 text-primary-500"></i> <?= $project['area'] ?>
                                </span>
                            </div>

                            <p class="font-sans text-gray-300 mt-3 mb-4"><?= $project['description'] ?></p>

                            <!-- Tags -->
                            <div class="flex flex-wrap gap-2 mb-4">
                                <?php foreach (array_slice($project['tags'] ?? [], 0, 5) as $tag): ?>
                                <span class="text-xs font-medium px-2 py-1 rounded-md bg-gray-700/50 text-gray-300">#<?= $tag ?></span>
                                <?php endforeach; ?>
                            </div>

                            <button onclick="openProjectModal('<?= $project['id'] ?>')"
                                    class="px-5 py-2 bg-primary-500 hover:bg-primary-600 text-white rounded-lg font-medium transform hover:scale-105 transition-all duration-300 flex items-center space-x-2">
                                <span>Lihat Detail</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Empty State (Hidden by Default) -->
            <div id="portfolio-empty" class="hidden py-20 text-center">
                <div class="inline-block p-6 rounded-full bg-gray-800/50 mb-6">
                    <i class="fas fa-search text-4xl text-gray-500"></i>
                </div>
                <h3 class="text-2xl font-bold text-white mb-2">Tidak Ada Proyek Ditemukan</h3>
                <p class="text-gray-400 max-w-md mx-auto">Coba ubah filter atau kata kunci pencarian Anda untuk menemukan proyek yang Anda cari.</p>
                <button id="reset-filters" class="mt-6 px-6 py-3 bg-primary-500 hover:bg-primary-600 text-white rounded-lg font-medium">
                    Reset Filter
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section - Consistent Design System -->
<section id="testimonials" class="py-16 lg:py-24 bg-black scroll-mt-20">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Consistent Header Styling -->
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <div class="inline-flex items-center space-x-4 mb-6">
                <div class="w-12 h-px bg-gradient-to-r from-transparent via-primary-400 to-transparent"></div>
                <span class="text-sm font-bold tracking-widest text-primary-400 uppercase">Testimoni</span>
                <div class="w-12 h-px bg-gradient-to-r from-transparent via-primary-400 to-transparent"></div>
            </div>
            <h2 class="font-sans text-4xl sm:text-5xl lg:text-6xl font-black bg-gradient-to-r from-white via-gray-100 to-white bg-clip-text text-transparent mb-6">
                <?= $testimonials['title'] ?>
            </h2>
            <p class="font-sans font-normal max-w-3xl mx-auto text-gray-300 text-lg lg:text-xl leading-relaxed">
                <?= $testimonials['subtitle'] ?>
            </p>
        </div>

        <!-- Consistent Testimonials Grid -->
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                <?php foreach ($testimonials['testimonials'] as $index => $testimonial): ?>
                <div class="group relative h-full bg-gradient-to-br from-gray-900/95 to-black/98 backdrop-blur-xl border border-gray-700/40 rounded-2xl overflow-hidden hover:border-primary-400/70 transition-all duration-500 ease-out hover:shadow-xl hover:shadow-primary-500/20 hover:-translate-y-2 hover:scale-[1.02] p-6 lg:p-8" data-aos="fade-up" data-aos-duration="800" data-aos-delay="<?= 100 * ($index + 1) ?>">

                    <!-- Consistent Background Elements -->
                    <div class="absolute inset-0 opacity-[0.02]">
                        <div class="absolute top-4 right-4 w-8 h-8 border border-primary-400/30 rotate-45 rounded-lg"></div>
                        <div class="absolute bottom-4 left-4 w-6 h-6 bg-primary-400/10 rounded-full"></div>
                    </div>

                    <!-- Quote Icon -->
                    <div class="absolute -top-2 left-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-primary-400 to-primary-600 rounded-xl flex items-center justify-center shadow-lg shadow-primary-500/20">
                            <i class="fas fa-quote-left text-white text-lg"></i>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="relative z-10 pt-8">
                        <!-- Testimonial Text -->
                        <p class="font-sans text-gray-300 text-base leading-relaxed mb-6 italic">
                            "<?= $testimonial['text'] ?>"
                        </p>

                        <!-- Rating Stars -->
                        <div class="flex mb-6">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <i class="fas fa-star <?= $i <= $testimonial['rating'] ? 'text-primary-400' : 'text-gray-600' ?> text-sm"></i>
                            <?php endfor; ?>
                        </div>

                        <!-- Client Info -->
                        <div class="flex items-center pt-4 border-t border-gray-700/30">
                            <div class="w-12 h-12 rounded-xl mr-4 overflow-hidden bg-gradient-to-br from-primary-400/20 to-primary-600/20 flex items-center justify-center">
                                <img src="<?= htmlspecialchars($testimonial['image']) ?>" alt="<?= htmlspecialchars($testimonial['name']) ?>" class="w-full h-full object-cover rounded-xl" loading="lazy">
                            </div>
                            <div>
                                <h4 class="font-sans font-bold text-white text-base group-hover:text-primary-400 transition-colors duration-300">
                                    <?= $testimonial['name'] ?>
                                </h4>
                                <p class="font-sans text-gray-400 text-sm">
                                    <?= $testimonial['position'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Premium FAQ Section -->
<section id="faq" class="py-12 bg-gradient-to-br from-dark-950 via-black to-dark-950 text-white scroll-mt-20 relative overflow-hidden">
  <!-- Subtle background pattern -->
  <div class="absolute inset-0 opacity-5">
    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-primary-500/10 to-transparent transform skew-y-1"></div>
  </div>

  <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative">
    <!-- Compact header -->
    <div class="text-center mb-8">
      <h2 class="font-sans text-xl sm:text-2xl font-semibold mb-2 text-white/90">Pertanyaan Umum</h2>
      <p class="text-xs text-gray-400 max-w-2xl mx-auto">Temukan jawaban atas pertanyaan yang sering diajukan tentang layanan kami.</p>
    </div>

    <!-- Premium asymmetric layout -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

      <!-- Categories - Compact sidebar -->
      <aside class="lg:col-span-3">
        <div class="bg-dark-900/50 backdrop-blur-sm rounded-lg border border-dark-800/50 p-3 sticky top-24">
          <h3 class="text-xs font-medium text-white/70 uppercase tracking-widest mb-3 px-2">Kategori</h3>
          <div class="space-y-1">
            <?php $firstCat = true; foreach ($faq['categories'] as $cat => $items): ?>
              <button type="button"
                class="faq-category w-full text-left px-3 py-2 rounded-md transition-all duration-300 font-medium text-xs flex items-center gap-2 group
                  <?php if ($firstCat) {echo 'bg-gradient-to-r from-primary-500/20 to-primary-600/20 text-primary-300 border border-primary-500/30';} else {echo 'text-gray-400 hover:text-primary-300 hover:bg-dark-800/50';} ?>"
                data-category="<?= htmlspecialchars($cat) ?>">
                <div class="w-5 h-5 flex items-center justify-center bg-dark-800/50 rounded group-hover:bg-primary-500/20 transition-colors duration-300">
                  <?php if ($cat === 'Umum'): ?><i class="fa fa-question-circle text-xs"></i><?php elseif ($cat === 'Desain'): ?><i class="fa fa-pencil-ruler text-xs"></i><?php elseif ($cat === 'Biaya'): ?><i class="fa fa-wallet text-xs"></i><?php elseif ($cat === 'Konstruksi'): ?><i class="fa fa-hard-hat text-xs"></i><?php endif; ?>
                </div>
                <?= htmlspecialchars($cat) ?>
              </button>
            <?php $firstCat = false; endforeach; ?>
          </div>
        </div>
      </aside>

      <!-- Questions/Answers - Main content area -->
      <div class="lg:col-span-9">
        <?php $firstPanel = true; foreach ($faq['categories'] as $cat => $items): ?>
          <div class="faq-panel <?php if (!$firstPanel) echo 'hidden'; ?>" data-category="<?= htmlspecialchars($cat) ?>">
            <div class="space-y-3">
              <?php foreach ($items as $index => $q): ?>
                <div class="faq-item group">
                  <div class="bg-dark-900/30 backdrop-blur-sm border border-dark-800/50 rounded-lg overflow-hidden hover:border-primary-500/30 transition-all duration-300">
                    <button type="button" class="faq-question w-full flex justify-between items-center px-4 py-3 text-sm font-medium text-left focus:outline-none focus:ring-2 focus:ring-primary-500/50 group-hover:bg-dark-800/30 transition-all duration-300">
                      <span class="text-white/90 group-hover:text-primary-300 transition-colors duration-300"><?= htmlspecialchars($q['question']) ?></span>
                      <div class="w-6 h-6 flex items-center justify-center bg-dark-800/50 rounded-md ml-3 flex-shrink-0 group-hover:bg-primary-500/20 transition-all duration-300">
                        <i class="faq-toggle-icon fa fa-chevron-down text-xs text-gray-400 group-hover:text-primary-400 transition-all duration-300"></i>
                      </div>
                    </button>
                    <div class="faq-answer hidden">
                      <div class="px-4 pb-4 pt-1">
                        <div class="border-t border-dark-800/50 pt-3">
                          <p class="text-gray-300 text-xs leading-relaxed"><?= htmlspecialchars($q['answer']) ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php $firstPanel = false; endforeach; ?>
      </div>
    </div>

    <!-- Contact CTA - Compact and elegant -->
    <div class="mt-8 text-center">
      <div class="inline-flex items-center bg-dark-900/50 backdrop-blur-sm border border-dark-800/50 rounded-lg px-4 py-3 hover:border-primary-500/30 transition-all duration-300 group">
        <div class="w-8 h-8 bg-gradient-to-br from-primary-500/20 to-primary-600/20 rounded-lg flex items-center justify-center mr-3">
          <i class="fa fa-question-circle text-primary-400 text-sm"></i>
        </div>
        <div class="text-left">
          <span class="font-medium text-sm text-white/90 block">Masih punya pertanyaan?</span>
          <a href="#contact" class="text-xs text-primary-400 hover:text-primary-300 transition-colors duration-300 group-hover:underline">
            Hubungi tim kami <i class="fa fa-arrow-right ml-1"></i>
          </a>
        </div>
      </div>
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
        <!-- Consistent Header Section -->
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <div class="inline-flex items-center space-x-4 mb-6">
                <div class="w-12 h-px bg-gradient-to-r from-transparent via-primary-400 to-transparent"></div>
                <span class="text-sm font-bold tracking-widest text-primary-400 uppercase">Kontak</span>
                <div class="w-12 h-px bg-gradient-to-r from-transparent via-primary-400 to-transparent"></div>
            </div>
            <h2 class="font-sans text-4xl sm:text-5xl lg:text-6xl font-black bg-gradient-to-r from-white via-gray-100 to-white bg-clip-text text-transparent mb-6">
                Hubungi Kami
            </h2>
            <p class="font-sans font-normal max-w-3xl mx-auto text-gray-300 text-lg lg:text-xl leading-relaxed">
                Punya pertanyaan atau ingin memulai proyek dengan kami? Jangan ragu untuk menghubungi kami.
            </p>
        </div>

        <!-- Premium Asymmetric Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 lg:gap-8">
            <!-- Contact Form - 60% width (3/5) -->
            <div class="lg:col-span-3">
                <div id="contact-form" class="bg-gradient-to-br from-gray-800/95 to-gray-900/95 backdrop-blur-sm p-6 md:p-8 rounded-2xl shadow-2xl border border-primary-400/20" data-aos="fade-right" data-aos-duration="800" data-aos-delay="200">
                    <div class="flex items-center mb-6">
                        <div class="w-8 h-8 rounded-lg bg-primary-500 flex items-center justify-center mr-3">
                            <i class="fas fa-envelope text-white text-sm"></i>
                        </div>
                        <h3 class="font-sans text-xl font-bold text-white">Kirim Pesan</h3>
                    </div>

                    <form action="<?= url('/api/send-inquiry') ?>" method="POST" class="space-y-4" id="contact-form-element">
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

                        <button type="submit" class="font-sans w-full py-4 px-6 bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-400 hover:to-primary-500 text-white font-semibold rounded-xl transition-all duration-300 transform hover:scale-[1.02] shadow-lg hover:shadow-xl hover:shadow-primary-500/30 flex items-center justify-center space-x-2">
                            <i class="fas fa-paper-plane"></i>
                            <span>Kirim Pesan</span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Contact Information - 40% width (2/5) -->
            <div class="lg:col-span-2 space-y-4">
                <!-- Consistent Contact Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-4">
                    <!-- Phone Card -->
                    <div class="group relative min-h-[120px] bg-gradient-to-br from-gray-900/95 to-black/98 backdrop-blur-xl border border-gray-700/40 rounded-2xl overflow-hidden hover:border-primary-400/70 transition-all duration-500 ease-out hover:shadow-xl hover:shadow-primary-500/20 hover:-translate-y-1 hover:scale-[1.02] p-6" data-aos="fade-left" data-aos-duration="800" data-aos-delay="300">
                        <div class="flex items-center h-full">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center mr-4 shadow-lg shadow-primary-500/20 flex-shrink-0">
                                <i class="fas fa-phone-alt text-white text-base"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-sans font-bold text-white text-base mb-1 group-hover:text-primary-400 transition-colors duration-300">Telepon</h4>
                                <a href="tel:<?= str_replace([' ', '-'], '', COMPANY_PHONE) ?>" class="font-sans text-gray-300 text-sm hover:text-primary-400 transition-colors break-words"><?= COMPANY_PHONE ?></a>
                            </div>
                        </div>
                    </div>

                    <!-- Email Card -->
                    <div class="group relative min-h-[120px] bg-gradient-to-br from-gray-900/95 to-black/98 backdrop-blur-xl border border-gray-700/40 rounded-2xl overflow-hidden hover:border-primary-400/70 transition-all duration-500 ease-out hover:shadow-xl hover:shadow-primary-500/20 hover:-translate-y-1 hover:scale-[1.02] p-6" data-aos="fade-left" data-aos-duration="800" data-aos-delay="400">
                        <div class="flex items-center h-full">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center mr-4 shadow-lg shadow-primary-500/20 flex-shrink-0">
                                <i class="fas fa-envelope text-white text-base"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-sans font-bold text-white text-base mb-1 group-hover:text-primary-400 transition-colors duration-300">Email</h4>
                                <a href="mailto:<?= COMPANY_EMAIL ?>" class="font-sans text-gray-300 text-sm hover:text-primary-400 transition-colors break-words"><?= COMPANY_EMAIL ?></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address Card -->
                <div class="group relative min-h-[120px] bg-gradient-to-br from-gray-900/95 to-black/98 backdrop-blur-xl border border-gray-700/40 rounded-2xl overflow-hidden hover:border-primary-400/70 transition-all duration-500 ease-out hover:shadow-xl hover:shadow-primary-500/20 hover:-translate-y-1 hover:scale-[1.02] p-6" data-aos="fade-left" data-aos-duration="800" data-aos-delay="500">
                    <div class="flex items-start h-full">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center mr-4 shadow-lg shadow-primary-500/20 flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-white text-base"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-sans font-bold text-white text-base mb-2 group-hover:text-primary-400 transition-colors duration-300">Alamat</h4>
                            <div class="font-sans text-gray-300 text-sm leading-relaxed hover:text-primary-400 transition-colors break-words">
                                <div>Bernady Land, Cluster Camelia Blok E6</div>
                                <div>Puring, Slawu, Kec. Patrang</div>
                                <div>Kabupaten Jember, Jawa Timur 68116</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Working Hours Card -->
                <div class="group relative min-h-[120px] bg-gradient-to-br from-gray-900/95 to-black/98 backdrop-blur-xl border border-gray-700/40 rounded-2xl overflow-hidden hover:border-primary-400/70 transition-all duration-500 ease-out hover:shadow-xl hover:shadow-primary-500/20 hover:-translate-y-1 hover:scale-[1.02] p-6" data-aos="fade-left" data-aos-duration="800" data-aos-delay="600">
                    <div class="flex items-center h-full">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center mr-4 shadow-lg shadow-primary-500/20 flex-shrink-0">
                            <i class="fas fa-clock text-white text-base"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-sans font-bold text-white text-base mb-1 group-hover:text-primary-400 transition-colors duration-300">Jam Kerja</h4>
                            <p class="font-sans text-gray-300 text-sm hover:text-primary-400 transition-colors break-words"><?= OFFICE_HOURS ?></p>
                        </div>
                    </div>
                </div>

                <!-- Interactive Map Card -->
                <div class="bg-white/95 backdrop-blur-sm rounded-xl shadow-lg overflow-hidden hover:scale-105 transform transition-transform duration-300" data-aos="fade-left" data-aos-duration="800" data-aos-delay="700">
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

<!-- Enhanced Project Modal -->
<div id="project-modal" class="fixed inset-0 z-50 flex items-center justify-center hidden p-4">
    <div class="absolute inset-0 bg-gradient-to-br from-gray-900/95 via-black/90 to-gray-900/95 backdrop-blur-md transition-opacity duration-500 opacity-0" id="modal-overlay"></div>

    <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl shadow-2xl w-full max-w-6xl mx-auto transform transition-all duration-500 ease-out scale-90 opacity-0 border border-gray-700/50" id="modal-container">
        <!-- Close button -->
        <button id="modal-close" class="absolute top-6 right-6 w-12 h-12 bg-gray-800/80 hover:bg-red-500/80 text-gray-400 hover:text-white rounded-full flex items-center justify-center text-xl focus:outline-none focus:ring-2 focus:ring-primary-500 z-20 transition-all duration-300 backdrop-blur-sm">
            <i class="fas fa-times"></i>
        </button>

        <!-- Modal content -->
        <div class="flex flex-col lg:flex-row h-full max-h-[90vh] overflow-hidden">
            <!-- Image Gallery Section -->
            <div class="lg:w-3/5 relative">
                <!-- Main Image -->
                <div class="relative h-64 lg:h-full min-h-[400px] overflow-hidden rounded-l-3xl">
                    <img id="modal-image" src="" alt="Project" class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">

                    <!-- Image Overlay with Navigation -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>

                    <!-- Image Counter -->
                    <div class="absolute top-6 left-6 bg-black/50 backdrop-blur-sm text-white px-3 py-1 rounded-full text-sm font-medium">
                        <span id="modal-image-counter">1 / 3</span>
                    </div>

                    <!-- Navigation Arrows -->
                    <button id="modal-prev-image" class="absolute left-4 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-black/50 hover:bg-black/70 text-white rounded-full flex items-center justify-center transition-all duration-300 backdrop-blur-sm opacity-0 hover:opacity-100">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button id="modal-next-image" class="absolute right-4 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-black/50 hover:bg-black/70 text-white rounded-full flex items-center justify-center transition-all duration-300 backdrop-blur-sm opacity-0 hover:opacity-100">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>

                <!-- Image Thumbnails -->
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2" id="modal-thumbnails">
                    <!-- Thumbnails will be dynamically generated -->
                </div>
            </div>

            <!-- Project Details Section -->
            <div class="lg:w-2/5 p-8 lg:p-10 overflow-y-auto">
                <!-- Category Badge -->
                <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-primary-500 to-emerald-500 text-white text-sm font-bold tracking-wider uppercase rounded-full mb-6">
                    <i class="fas fa-tag mr-2"></i>
                    <span id="modal-category">Category</span>
                </div>

                <!-- Project Title -->
                <h3 id="modal-title" class="text-3xl lg:text-4xl font-black text-white mb-4 leading-tight">Project Title</h3>

                <!-- Project Meta Info -->
                <div class="flex flex-wrap gap-4 mb-6">
                    <div class="flex items-center text-gray-300">
                        <i class="fas fa-map-marker-alt text-primary-400 mr-2"></i>
                        <span id="modal-location" class="text-sm">Location</span>
                    </div>
                    <div class="flex items-center text-gray-300">
                        <i class="fas fa-calendar text-primary-400 mr-2"></i>
                        <span id="modal-year" class="text-sm">Year</span>
                    </div>
                    <div class="flex items-center text-gray-300">
                        <i class="fas fa-ruler-combined text-primary-400 mr-2"></i>
                        <span id="modal-area" class="text-sm">Area</span>
                    </div>
                </div>

                <!-- Project Description -->
                <div class="mb-8">
                    <h4 class="text-xl font-bold text-white mb-4">Deskripsi Proyek</h4>
                    <p id="modal-description" class="text-gray-300 leading-relaxed text-base">Project description will be displayed here...</p>
                </div>

                <!-- Project Details Grid -->
                <div class="mb-8">
                    <h4 class="text-xl font-bold text-white mb-4">Detail Proyek</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="bg-gray-800/50 rounded-xl p-4 border border-gray-700/50">
                            <p class="text-gray-400 text-sm mb-1">Klien</p>
                            <p id="modal-client" class="font-semibold text-white">Client Name</p>
                        </div>
                        <div class="bg-gray-800/50 rounded-xl p-4 border border-gray-700/50">
                            <p class="text-gray-400 text-sm mb-1">Status</p>
                            <p id="modal-status" class="font-semibold text-emerald-400">Completed</p>
                        </div>
                        <div class="bg-gray-800/50 rounded-xl p-4 border border-gray-700/50">
                            <p class="text-gray-400 text-sm mb-1">Durasi</p>
                            <p id="modal-duration" class="font-semibold text-white">Duration</p>
                        </div>
                        <div class="bg-gray-800/50 rounded-xl p-4 border border-gray-700/50">
                            <p class="text-gray-400 text-sm mb-1">Budget Range</p>
                            <p id="modal-budget" class="font-semibold text-white">Budget</p>
                        </div>
                    </div>
                </div>

                <!-- Project Features -->
                <div class="mb-8">
                    <h4 class="text-xl font-bold text-white mb-4">Fitur Utama</h4>
                    <div id="modal-features" class="space-y-2">
                        <!-- Features will be dynamically generated -->
                    </div>
                </div>

                <!-- Project Tags -->
                <div class="mb-8">
                    <h4 class="text-xl font-bold text-white mb-4">Tags</h4>
                    <div id="modal-tags" class="flex flex-wrap gap-2">
                        <!-- Tags will be dynamically generated -->
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#contact" class="flex-1 bg-gradient-to-r from-primary-500 to-emerald-500 hover:from-primary-600 hover:to-emerald-600 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 flex items-center justify-center space-x-2 shadow-lg" id="modal-contact-btn">
                        <i class="fas fa-envelope"></i>
                        <span>Konsultasi Proyek</span>
                    </a>
                    <button class="flex-1 bg-gray-700 hover:bg-gray-600 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 flex items-center justify-center space-x-2" id="modal-share-btn">
                        <i class="fas fa-share-alt"></i>
                        <span>Share</span>
                    </button>
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
