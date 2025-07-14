<?php
/**
 * Enhanced Footer with Magic UI Integration
 * Eliminates redundancy by using ContentModel and config constants
 */

// Get footer data from ContentModel (passed from controller)
$footerData = $footer ?? [];
if (empty($footerData)) {
    // Fallback if footer data not available
    require_once APP_DIR . '/models/ContentModel.php';
    $footerData = ContentModel::getFooterData();
}

// Extract data sections
$company = $footerData['company'] ?? [];
$navigation = $footerData['navigation'] ?? [];
$services = $footerData['services'] ?? [];
$contact = $footerData['contact'] ?? [];
$social = $footerData['social'] ?? [];
$legal = $footerData['legal'] ?? [];

?>
<!-- Enhanced Footer with Magic UI Interactive Grid Pattern -->
<footer class="relative bg-gradient-to-br from-gray-900 via-black to-gray-800 text-gray-300 overflow-hidden">

    <!-- Magic UI Interactive Grid Pattern Background -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute inset-0" style="
            background-image:
                linear-gradient(rgba(56, 189, 248, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(56, 189, 248, 0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: grid-move 20s linear infinite;
        "></div>
    </div>

    <!-- Animated Grid CSS -->
    <style>
        @keyframes grid-move {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }
        .footer-card:hover .grid-dot {
            transform: scale(1.5);
            background: rgba(56, 189, 248, 0.6);
        }
    </style>

    <div class="relative">
        <!-- Main Footer Content -->
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">

                <!-- Company Brand Section -->
                <div class="lg:col-span-4 space-y-6" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                    <div class="footer-card group">
                        <!-- Company Logo & Name -->
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="relative">
                                <div class="w-12 h-12 bg-gradient-to-br from-primary-400 to-primary-600 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-primary-500/25 transition-all duration-300">
                                    <i class="fas fa-building text-white text-lg"></i>
                                </div>
                                <div class="grid-dot absolute -top-1 -right-1 w-3 h-3 bg-primary-400/30 rounded-full transition-all duration-300"></div>
                            </div>
                            <h3 class="text-xl font-bold text-white"><?= htmlspecialchars($company['name'] ?? SITE_NAME) ?></h3>
                        </div>

                        <!-- Company Description -->
                        <p class="text-gray-400 text-sm leading-relaxed mb-6 max-w-sm">
                            <?= htmlspecialchars($company['description'] ?? '') ?>
                        </p>

                        <!-- Social Links with Enhanced Styling -->
                        <div class="flex space-x-4">
                            <?php foreach ($social['links'] ?? [] as $link): ?>
                                <a href="<?= htmlspecialchars($link['url']) ?>"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   class="group/social w-10 h-10 flex items-center justify-center bg-gray-800/50 hover:bg-primary-500/20 border border-gray-700 hover:border-primary-500/50 rounded-xl text-gray-400 <?= $link['color'] ?? 'hover:text-primary-400' ?> transition-all duration-300 hover:scale-110 hover:shadow-lg"
                                   aria-label="<?= htmlspecialchars($link['label']) ?>">
                                    <i class="<?= htmlspecialchars($link['icon']) ?> text-sm"></i>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="lg:col-span-2" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                    <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-6 flex items-center">
                        <i class="fas fa-compass mr-2 text-primary-400"></i>
                        <?= htmlspecialchars($navigation['title'] ?? 'Navigasi') ?>
                    </h3>
                    <ul class="space-y-3">
                        <?php foreach ($navigation['links'] ?? [] as $link): ?>
                            <li>
                                <a href="<?= htmlspecialchars($link['url']) ?>"
                                   class="group flex items-center text-gray-400 hover:text-primary-400 transition-all duration-300 text-sm py-2 hover:translate-x-2">
                                    <i class="<?= htmlspecialchars($link['icon']) ?> mr-3 text-xs opacity-60 group-hover:opacity-100 transition-opacity duration-300"></i>
                                    <?= htmlspecialchars($link['text']) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Services Links -->
                <div class="lg:col-span-3" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
                    <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-6 flex items-center">
                        <i class="fas fa-cogs mr-2 text-primary-400"></i>
                        <?= htmlspecialchars($services['title'] ?? 'Layanan') ?>
                    </h3>
                    <ul class="space-y-3">
                        <?php foreach ($services['links'] ?? [] as $link): ?>
                            <li>
                                <a href="<?= htmlspecialchars($link['url']) ?>"
                                   class="group flex items-center text-gray-400 hover:text-primary-400 transition-all duration-300 text-sm py-2 hover:translate-x-2">
                                    <i class="<?= htmlspecialchars($link['icon']) ?> mr-3 text-xs opacity-60 group-hover:opacity-100 transition-opacity duration-300"></i>
                                    <?= htmlspecialchars($link['text']) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Contact Information -->
                <div class="lg:col-span-3" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
                    <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-6 flex items-center">
                        <i class="fas fa-phone mr-2 text-primary-400"></i>
                        <?= htmlspecialchars($contact['title'] ?? 'Kontak') ?>
                    </h3>
                    <ul class="space-y-4">
                        <?php foreach ($contact['info'] ?? [] as $item): ?>
                            <li class="flex <?= $item['type'] === 'address' ? 'items-start' : 'items-center' ?> group">
                                <div class="w-8 h-8 flex items-center justify-center bg-gray-800/50 rounded-lg mr-4 flex-shrink-0 group-hover:bg-primary-500/20 transition-all duration-300">
                                    <i class="<?= htmlspecialchars($item['icon']) ?> text-primary-400 text-sm"></i>
                                </div>
                                <div class="text-gray-400 text-sm">
                                    <?php if ($item['type'] === 'address' && isset($item['lines'])): ?>
                                        <?php foreach ($item['lines'] as $line): ?>
                                            <div><?= htmlspecialchars($line) ?></div>
                                        <?php endforeach; ?>
                                    <?php elseif (isset($item['url'])): ?>
                                        <a href="<?= htmlspecialchars($item['url']) ?>"
                                           class="hover:text-primary-400 transition-colors duration-300">
                                            <?= htmlspecialchars($item['text']) ?>
                                        </a>
                                    <?php else: ?>
                                        <?= htmlspecialchars($item['text']) ?>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-gray-800/50 bg-black/50 backdrop-blur-sm" data-aos="fade-up" data-aos-duration="800" data-aos-delay="500">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                    <p class="text-gray-500 text-sm">
                        <?= htmlspecialchars($legal['copyright'] ?? '© ' . date('Y') . ' ' . SITE_NAME . '. Hak Cipta Dilindungi.') ?>
                    </p>
                    <div class="flex items-center space-x-6">
                        <?php foreach ($legal['links'] ?? [] as $link): ?>
                            <a href="<?= htmlspecialchars($link['url']) ?>"
                               class="text-gray-500 hover:text-primary-400 text-sm transition-colors duration-300">
                                <?= htmlspecialchars($link['text']) ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
