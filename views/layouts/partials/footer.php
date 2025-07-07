<?php
/**
 * Premium Footer Architecture - Non-template Design
 */

// Data for footer links and information
$companyName = "Antosa Architect";
$companyDescription = "Studio arsitektur profesional yang mewujudkan visi Anda menjadi ruang yang fungsional dan estetis.";

$socialLinks = [
    ['icon' => 'fab fa-facebook-f', 'url' => '#', 'label' => 'Facebook'],
    ['icon' => 'fab fa-instagram', 'url' => '#', 'label' => 'Instagram'],
    ['icon' => 'fab fa-linkedin-in', 'url' => '#', 'label' => 'LinkedIn'],
    ['icon' => 'fab fa-pinterest-p', 'url' => '#', 'label' => 'Pinterest'],
];

$quickLinks = [
    ['text' => 'Beranda', 'url' => '/'],
    ['text' => 'Tentang Kami', 'url' => '/tentang-kami'],
    ['text' => 'Layanan', 'url' => '/layanan'],
    ['text' => 'Portofolio', 'url' => '/portofolio'],
    ['text' => 'Testimoni', 'url' => '/testimoni'],
    ['text' => 'Blog', 'url' => '/blog'],
    ['text' => 'Hubungi Kami', 'url' => '/kontak'],
];

$serviceLinks = [
    ['text' => 'Desain Arsitektur', 'url' => '/layanan#desain-arsitektur'],
    ['text' => 'Desain Interior', 'url' => '/layanan#desain-interior'],
    ['text' => 'Konsultasi Proyek', 'url' => '/layanan#konsultasi-proyek'],
    ['text' => 'Manajemen Konstruksi', 'url' => '/layanan#manajemen-konstruksi'],
    ['text' => 'Desain Lanskap', 'url' => '/layanan#desain-lanskap'],
];

$contactInfo = [
    ['icon' => 'fas fa-map-marker-alt', 'lines' => ['Bernady Land, Cluster Camelia Blok E6, Puring, Slawu, Kec. Patrang, Kabupaten Jember, Jawa Timur 68116'], 'type' => 'address'],
    ['icon' => 'fas fa-phone-alt', 'text' => '+62 851 8952 3863', 'type' => 'phone', 'url' => 'tel:+6285189523863'],
    ['icon' => 'fas fa-envelope', 'text' => 'info@antosaarchitect.com', 'type' => 'email', 'url' => 'mailto:info@antosaarchitect.com'],
    ['icon' => 'fas fa-clock', 'text' => 'Senin - Jumat: 08:00 - 17:00 WIB', 'type' => 'hours'],
];

// Premium styling variables - optimized for non-template look
$footerBgColor = "bg-gradient-to-br from-dark-950 via-dark-900 to-dark-950";
$footerTextColor = "text-dark-300";
$headingClasses = "text-xs font-medium text-white/90 uppercase tracking-widest mb-4";
$companyNameClasses = "text-base font-semibold text-white mb-2";
$paragraphClasses = "text-dark-400 text-xs leading-relaxed mb-4";
$socialIconClasses = "w-8 h-8 flex items-center justify-center bg-dark-800/50 hover:bg-primary-500/20 border border-dark-700 hover:border-primary-500/30 rounded-lg text-dark-400 hover:text-primary-400 transition-all duration-300 text-sm";
$listLinkClasses = "text-dark-400 hover:text-primary-400 transition-colors duration-300 text-xs py-1.5 block hover:translate-x-1";
$contactIconClasses = "text-primary-500 text-sm flex-shrink-0";
$contactTextClasses = "text-dark-400 text-xs";
$dividerColor = "border-dark-800/50";
$copyrightTextClasses = "text-dark-500 text-xs";
$bottomLinkClasses = "text-dark-500 hover:text-primary-400 text-xs mx-2 transition-colors duration-300";

?>
<!-- Premium Footer Architecture - Non-template Design -->
<footer class="<?= $footerBgColor ?> <?= $footerTextColor ?> relative overflow-hidden">
    <!-- Subtle background pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-primary-500/10 to-transparent transform -skew-y-1"></div>
    </div>

    <div class="relative">
        <!-- Main Footer Content -->
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Premium asymmetric layout -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-6">

                <!-- Company Brand Section - Takes more space for premium feel -->
                <div class="lg:col-span-5 space-y-4">
                    <div class="flex items-center space-x-3 mb-3">
                        <div class="w-8 h-8 bg-gradient-to-br from-primary-400 to-primary-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-building text-white text-sm"></i>
                        </div>
                        <h3 class="<?= $companyNameClasses ?>"><?= htmlspecialchars($companyName) ?></h3>
                    </div>
                    <p class="<?= $paragraphClasses ?> max-w-md"><?= htmlspecialchars($companyDescription) ?></p>

                    <!-- Social Links with premium styling -->
                    <div class="flex space-x-3 pt-2">
                        <?php foreach ($socialLinks as $link): ?>
                            <a href="<?= htmlspecialchars($link['url']) ?>" target="_blank" rel="noopener noreferrer"
                               class="<?= $socialIconClasses ?>" aria-label="<?= htmlspecialchars($link['label']) ?>">
                                <i class="<?= htmlspecialchars($link['icon']) ?>"></i>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Navigation Links - Compact columns -->
                <div class="lg:col-span-2">
                    <h3 class="<?= $headingClasses ?>">Navigasi</h3>
                    <ul class="space-y-1">
                        <?php foreach ($quickLinks as $link): ?>
                            <li><a href="<?= htmlspecialchars($link['url']) ?>" class="<?= $listLinkClasses ?>"><?= htmlspecialchars($link['text']) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Services Links -->
                <div class="lg:col-span-2">
                    <h3 class="<?= $headingClasses ?>">Layanan Utama</h3>
                    <ul class="space-y-1">
                        <?php foreach ($serviceLinks as $link): ?>
                            <li><a href="<?= htmlspecialchars($link['url']) ?>" class="<?= $listLinkClasses ?>"><?= htmlspecialchars($link['text']) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Contact Info - Compact but prominent -->
                <div class="lg:col-span-3">
                    <h3 class="<?= $headingClasses ?>">Hubungi Kami</h3>
                    <ul class="space-y-3">
                        <?php foreach ($contactInfo as $item): ?>
                            <li class="flex <?= $item['type'] === 'address' ? 'items-start' : 'items-center' ?> group">
                                <div class="w-6 h-6 flex items-center justify-center bg-dark-800/50 rounded-md mr-3 flex-shrink-0 group-hover:bg-primary-500/20 transition-colors duration-300">
                                    <i class="<?= htmlspecialchars($item['icon']) ?> <?= $contactIconClasses ?>"></i>
                                </div>
                                <span class="<?= $contactTextClasses ?>">
                                    <?php if (isset($item['lines'])): ?>
                                        <?php foreach ($item['lines'] as $line): ?>
                                            <?= htmlspecialchars($line) ?><br>
                                        <?php endforeach; ?>
                                    <?php elseif (isset($item['url'])): ?>
                                        <a href="<?= htmlspecialchars($item['url']) ?>" class="hover:text-primary-400 transition-colors duration-300"><?= htmlspecialchars($item['text']) ?></a>
                                    <?php else: ?>
                                        <?= htmlspecialchars($item['text']) ?>
                                    <?php endif; ?>
                                </span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Bottom Bar with subtle styling -->
        <div class="border-t <?= $dividerColor ?> bg-dark-950/50 backdrop-blur-sm">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <div class="flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0">
                    <p class="<?= $copyrightTextClasses ?>">&copy; <?= date('Y') ?> <?= htmlspecialchars($companyName) ?>. Hak Cipta Dilindungi.</p>
                    <div class="flex items-center space-x-1">
                        <a href="/syarat-ketentuan" class="<?= $bottomLinkClasses ?>">Syarat & Ketentuan</a>
                        <span class="<?= $copyrightTextClasses ?> mx-1">•</span>
                        <a href="/kebijakan-privasi" class="<?= $bottomLinkClasses ?>">Kebijakan Privasi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
