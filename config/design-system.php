<?php

/**
 * Design System Configuration
 * 
 * Centralized design tokens and component configurations for consistency
 */

return [
    // Color Palette
    'colors' => [
        'primary' => [
            '400' => '#60a5fa',
            '500' => '#3b82f6',
            '600' => '#2563eb',
            '700' => '#1d4ed8'
        ],
        'secondary' => [
            '400' => '#34d399',
            '500' => '#10b981',
            '600' => '#059669',
            '700' => '#047857'
        ],
        'accent' => [
            'blue' => '#3b82f6',
            'emerald' => '#10b981',
            'cyan' => '#06b6d4',
            'amber' => '#f59e0b'
        ],
        'neutral' => [
            'black' => '#000000',
            'gray-900' => '#111827',
            'gray-800' => '#1f2937',
            'gray-700' => '#374151',
            'gray-600' => '#4b5563',
            'gray-500' => '#6b7280',
            'gray-400' => '#9ca3af',
            'gray-300' => '#d1d5db',
            'gray-200' => '#e5e7eb',
            'gray-100' => '#f3f4f6',
            'white' => '#ffffff'
        ]
    ],

    // Typography Scale
    'typography' => [
        'font_family' => [
            'sans' => ['Inter', 'system-ui', 'sans-serif']
        ],
        'font_sizes' => [
            'xs' => '0.75rem',    // 12px
            'sm' => '0.875rem',   // 14px
            'base' => '1rem',     // 16px
            'lg' => '1.125rem',   // 18px
            'xl' => '1.25rem',    // 20px
            '2xl' => '1.5rem',    // 24px
            '3xl' => '1.875rem',  // 30px
            '4xl' => '2.25rem',   // 36px
            '5xl' => '3rem',      // 48px
            '6xl' => '3.75rem',   // 60px
            '7xl' => '4.5rem'     // 72px
        ],
        'font_weights' => [
            'light' => '300',
            'normal' => '400',
            'medium' => '500',
            'semibold' => '600',
            'bold' => '700',
            'black' => '900'
        ],
        'line_heights' => [
            'normal' => '1.5',
            'relaxed' => '1.625'
        ]
    ],

    // Spacing Scale
    'spacing' => [
        '0' => '0',
        '1' => '0.25rem',   // 4px
        '2' => '0.5rem',    // 8px
        '3' => '0.75rem',   // 12px
        '4' => '1rem',      // 16px
        '5' => '1.25rem',   // 20px
        '6' => '1.5rem',    // 24px
        '8' => '2rem',      // 32px
        '10' => '2.5rem',   // 40px
        '12' => '3rem',     // 48px
        '16' => '4rem',     // 64px
        '20' => '5rem'      // 80px
    ],

    // Animation Timings
    'animations' => [
        'duration' => [
            'fast' => '200ms',
            'normal' => '300ms',
            'slow' => '500ms',
            'slower' => '800ms'
        ],
        'easing' => [
            'ease' => 'ease',
            'ease_in' => 'ease-in',
            'ease_out' => 'ease-out',
            'ease_in_out' => 'ease-in-out',
            'bounce' => 'cubic-bezier(0.68, -0.55, 0.265, 1.55)'
        ],
        'delays' => [
            'none' => '0ms',
            'short' => '100ms',
            'medium' => '200ms',
            'long' => '400ms'
        ]
    ],

    // Component Configurations
    'components' => [
        'button' => [
            'primary' => [
                'bg' => 'bg-gradient-to-r from-primary-500 to-primary-600',
                'hover' => 'hover:from-primary-600 hover:to-primary-700',
                'text' => 'text-black',
                'padding' => 'py-4 px-8',
                'border_radius' => 'rounded-xl',
                'font' => 'font-bold',
                'transition' => 'transition-all duration-300',
                'transform' => 'hover:scale-105',
                'shadow' => 'hover:shadow-2xl',
                'focus' => 'focus:outline-none focus:ring-4 focus:ring-primary-400/50'
            ]
        ],
        'card' => [
            'default' => [
                'bg' => 'bg-gradient-to-br from-gray-900/95 to-black/98',
                'backdrop' => 'backdrop-blur-xl',
                'border' => 'border border-gray-700/40',
                'border_radius' => 'rounded-2xl',
                'shadow' => 'shadow-2xl',
                'transition' => 'transition-all duration-500 ease-out',
                'hover' => 'hover:shadow-xl hover:-translate-y-2 hover:scale-[1.02]'
            ],
            'glass' => [
                'bg' => 'bg-black/80',
                'backdrop' => 'backdrop-blur-md',
                'border' => 'border border-white/10',
                'hover_border' => 'hover:border-primary-400/30',
                'transition' => 'transition-all duration-300'
            ]
        ],
        'section' => [
            'padding' => [
                'mobile' => 'py-12',
                'tablet' => 'sm:py-16',
                'desktop' => 'lg:py-20'
            ],
            'margin' => [
                'scroll_offset' => 'scroll-mt-20'
            ]
        ]
    ],

    // Breakpoints
    'breakpoints' => [
        'sm' => '640px',
        'md' => '768px',
        'lg' => '1024px',
        'xl' => '1280px',
        '2xl' => '1536px'
    ],

    // Simplified Grid System
    'grid' => [
        'container' => [
            'max_width' => 'max-w-7xl',
            'margin' => 'mx-auto',
            'padding' => 'px-4 sm:px-6 lg:px-8'
        ],
        'services' => [
            'base' => 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8',
            'card_height' => 'min-h-[320px]'
        ],
        'portfolio' => [
            'base' => 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6',
            'card_height' => 'min-h-[280px]'
        ],
        'testimonials' => [
            'base' => 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8',
            'card_height' => 'min-h-[200px]'
        ]
    ],

    // AOS (Animate On Scroll) Configuration
    'aos' => [
        'duration' => 800,
        'easing' => 'ease-out-cubic',
        'once' => true,
        'offset' => 50,
        'delay' => 100,
        'stagger_delay' => 100
    ]
];
