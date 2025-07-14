<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title . ' - ' . SITE_NAME : SITE_NAME ?></title>
    <meta name="description" content="<?= isset($description) ? $description : SITE_DESCRIPTION ?>">
    <meta name="keywords" content="<?= META_KEYWORDS ?>">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="text/javascript" id="tailwind-config">
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                            950: '#082f49',
                        },
                        secondary: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                            950: '#020617',
                        },
                        dark: {
                            50: '#fafafa',
                            100: '#f4f4f5',
                            200: '#e4e4e7',
                            300: '#d4d4d8',
                            400: '#a1a1aa',
                            500: '#71717a',
                            600: '#52525b',
                            700: '#3f3f46',
                            800: '#27272a',
                            900: '#18181b',
                            950: '#09090b',
                        },
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                    spacing: {
                        '18': '4.5rem',
                        '88': '22rem',
                        '128': '32rem',
                    },

                    textShadow: {
                        DEFAULT: '0 2px 10px rgba(0, 0, 0, 0.8)',
                        sm: '0 1px 2px rgba(0, 0, 0, 0.7)',
                        md: '0 3px 6px rgba(0, 0, 0, 0.7)',
                        lg: '0 5px 15px rgba(0, 0, 0, 0.7)',
                        xl: '0 8px 25px rgba(0, 0, 0, 0.8)',
                    },
                    backdropBlur: {
                        xs: '2px',
                    },


                    minHeight: {
                        'screen-75': '75vh',
                        'screen-90': '90vh',
                    },
                    maxWidth: {
                        '8xl': '88rem',
                        '9xl': '96rem',
                    }
                }
            },
            plugins: [
                function({ addUtilities, theme, e }) {
                    const textShadowUtilities = Object.entries(theme('textShadow', {})).map(([key, value]) => {
                        return {
                            [`.${e(key === 'DEFAULT' ? 'text-shadow' : `text-shadow-${key}`)}`]: {
                                textShadow: value,
                            },
                        }
                    });
                    addUtilities(textShadowUtilities, ['responsive', 'hover']);

                    // Add custom utilities for better UX
                    addUtilities({
                        '.focus-ring': {
                            '@apply focus:outline-none focus:ring-4 focus:ring-primary-400/50': {},
                        },
                        '.btn-primary': {
                            '@apply bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-black font-bold py-4 px-8 rounded-xl transition-all duration-300 hover:scale-105 hover:shadow-2xl focus-ring': {},
                        },
                        '.btn-secondary': {
                            '@apply bg-black/60 hover:bg-black/80 border-2 border-gray-600 hover:border-primary-400 text-white font-bold py-4 px-8 rounded-xl transition-all duration-300 hover:scale-105 backdrop-blur-md focus-ring': {},
                        },
                        '.glass-card': {
                            '@apply bg-black/80 backdrop-blur-md border border-white/10 hover:border-primary-400/30 transition-all duration-300': {},
                        },
                        '.dock-container': {
                            '@apply transition-all duration-300 ease-out': {},
                        },
                        '.dock-icon': {
                            '@apply transition-all duration-300 ease-out': {},
                        },
                        '.dock-tooltip': {
                            '@apply transition-all duration-200 ease-out': {},
                        },

                    }, ['responsive', 'hover']);


                }
            ]
        }
    </script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- AOS (Animate On Scroll) Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Custom CSS -->
    
</head>
    <body class="font-sans text-white bg-black">
    <!-- Logo Header (Top) -->
    <header class="fixed top-0 left-0 right-0 z-50 bg-transparent">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex justify-center md:justify-start">
                <a href="<?= url('/') ?>" class="block group">
                    <img src="assets/images/4.webp" alt="Antosa Architect Logo" class="h-10 transition-transform duration-300 group-hover:scale-105">
                    <div class="h-[3px] bg-primary-400 mt-[2px] w-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform scale-x-0 group-hover:scale-x-100 origin-left"></div>
                </a>
            </div>
        </div>
    </header>

    <!-- Dock Navigation (Bottom) -->
    <nav id="dock-nav" class="fixed bottom-6 left-1/2 transform -translate-x-1/2 z-50 hidden md:block">
        <div class="dock-container bg-black/20 backdrop-blur-md border border-white/10 rounded-2xl p-2 shadow-2xl">
            <div class="flex items-center gap-2">
                <!-- Home -->
                <a href="#home" class="dock-item nav-item group relative" data-tooltip="Beranda">
                    <div class="dock-icon w-12 h-12 flex items-center justify-center rounded-xl bg-primary-400/10 border border-primary-400/20 transition-all duration-300 group-hover:bg-primary-400/20 group-hover:scale-110">
                        <svg class="w-6 h-6 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                    </div>
                    <div class="dock-tooltip absolute -top-12 left-1/2 transform -translate-x-1/2 bg-black/80 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap">
                        Beranda
                    </div>
                </a>

                <!-- About -->
                <a href="#about" class="dock-item nav-item group relative" data-tooltip="Tentang Kami">
                    <div class="dock-icon w-12 h-12 flex items-center justify-center rounded-xl bg-dark-300/10 border border-dark-300/20 transition-all duration-300 group-hover:bg-primary-400/20 group-hover:scale-110">
                        <svg class="w-6 h-6 text-dark-300 group-hover:text-primary-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="dock-tooltip absolute -top-12 left-1/2 transform -translate-x-1/2 bg-black/80 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap">
                        Tentang Kami
                    </div>
                </a>

                <!-- Services -->
                <a href="#services" class="dock-item nav-item group relative" data-tooltip="Layanan">
                    <div class="dock-icon w-12 h-12 flex items-center justify-center rounded-xl bg-dark-300/10 border border-dark-300/20 transition-all duration-300 group-hover:bg-primary-400/20 group-hover:scale-110">
                        <svg class="w-6 h-6 text-dark-300 group-hover:text-primary-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <div class="dock-tooltip absolute -top-12 left-1/2 transform -translate-x-1/2 bg-black/80 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap">
                        Layanan
                    </div>
                </a>

                <!-- Portfolio -->
                <a href="#portfolio" class="dock-item nav-item group relative" data-tooltip="Portfolio">
                    <div class="dock-icon w-12 h-12 flex items-center justify-center rounded-xl bg-dark-300/10 border border-dark-300/20 transition-all duration-300 group-hover:bg-primary-400/20 group-hover:scale-110">
                        <svg class="w-6 h-6 text-dark-300 group-hover:text-primary-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                    </div>
                    <div class="dock-tooltip absolute -top-12 left-1/2 transform -translate-x-1/2 bg-black/80 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap">
                        Portfolio
                    </div>
                </a>

                <!-- Clients -->
                <a href="#clients" class="dock-item nav-item group relative" data-tooltip="Klien Kami">
                    <div class="dock-icon w-12 h-12 flex items-center justify-center rounded-xl bg-dark-300/10 border border-dark-300/20 transition-all duration-300 group-hover:bg-primary-400/20 group-hover:scale-110">
                        <svg class="w-6 h-6 text-dark-300 group-hover:text-primary-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <div class="dock-tooltip absolute -top-12 left-1/2 transform -translate-x-1/2 bg-black/80 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap">
                        Klien Kami
                    </div>
                </a>

                <!-- FAQ -->
                <a href="#faq" class="dock-item nav-item group relative" data-tooltip="FAQ">
                    <div class="dock-icon w-12 h-12 flex items-center justify-center rounded-xl bg-dark-300/10 border border-dark-300/20 transition-all duration-300 group-hover:bg-primary-400/20 group-hover:scale-110">
                        <svg class="w-6 h-6 text-dark-300 group-hover:text-primary-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="dock-tooltip absolute -top-12 left-1/2 transform -translate-x-1/2 bg-black/80 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap">
                        FAQ
                    </div>
                </a>

                <!-- Contact -->
                <a href="#contact" class="dock-item nav-item group relative" data-tooltip="Kontak">
                    <div class="dock-icon w-12 h-12 flex items-center justify-center rounded-xl bg-dark-300/10 border border-dark-300/20 transition-all duration-300 group-hover:bg-primary-400/20 group-hover:scale-110">
                        <svg class="w-6 h-6 text-dark-300 group-hover:text-primary-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="dock-tooltip absolute -top-12 left-1/2 transform -translate-x-1/2 bg-black/80 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap">
                        Kontak
                    </div>
                </a>
            </div>
        </div>
    </nav>

    <!-- Mobile Navigation (Fallback) -->
    <div id="mobile-menu" class="md:hidden fixed bottom-6 left-4 right-4 z-40 hidden">
        <div class="bg-black/90 backdrop-blur-md border border-white/10 rounded-2xl p-4 shadow-2xl">
            <div class="grid grid-cols-4 gap-4">
                <a href="#home" class="mobile-nav-item flex flex-col items-center p-2 rounded-lg text-primary-400 hover:bg-primary-400/10">
                    <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span class="text-xs">Home</span>
                </a>
                <a href="#about" class="mobile-nav-item flex flex-col items-center p-2 rounded-lg text-white hover:text-primary-400 hover:bg-primary-400/10">
                    <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="text-xs">About</span>
                </a>
                <a href="#services" class="mobile-nav-item flex flex-col items-center p-2 rounded-lg text-white hover:text-primary-400 hover:bg-primary-400/10">
                    <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    <span class="text-xs">Services</span>
                </a>
                <a href="#portfolio" class="mobile-nav-item flex flex-col items-center p-2 rounded-lg text-white hover:text-primary-400 hover:bg-primary-400/10">
                    <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                    <span class="text-xs">Portfolio</span>
                </a>
            </div>
            <div class="grid grid-cols-3 gap-4 mt-4">
                <a href="#clients" class="mobile-nav-item flex flex-col items-center p-2 rounded-lg text-white hover:text-primary-400 hover:bg-primary-400/10">
                    <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span class="text-xs">Klien Kami</span>
                </a>
                <a href="#faq" class="mobile-nav-item flex flex-col items-center p-2 rounded-lg text-white hover:text-primary-400 hover:bg-primary-400/10">
                    <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="text-xs">FAQ</span>
                </a>
                <a href="#contact" class="mobile-nav-item flex flex-col items-center p-2 rounded-lg text-white hover:text-primary-400 hover:bg-primary-400/10">
                    <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span class="text-xs">Contact</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Toggle Button -->
    <button id="mobile-menu-button" class="md:hidden fixed bottom-6 right-6 z-50 w-14 h-14 bg-primary-400 rounded-full flex items-center justify-center shadow-lg hover:bg-primary-500 transition-colors">
        <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>

    <!-- Main Content -->
    <main>
        <?= $content ?? '' ?>
    </main>

    <!-- AOS JavaScript -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- JavaScript -->
    <script src="/assets/js/app.js" defer></script>
    <script src="/assets/js/slider.js" defer></script>
    <script src="/assets/js/portfolio.js" defer></script>
    <script src="/assets/js/faq.js" defer></script>
    <script src="/assets/js/contact.js" defer></script>

    <!-- Initialize AOS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                easing: 'ease-out-cubic',
                once: true,
                offset: 50,
                delay: 100
            });
        });
    </script>
    <script src="/assets/js/services.js" defer></script>

    <?php require_once 'partials/footer.php'; ?>
</body>
</html>
