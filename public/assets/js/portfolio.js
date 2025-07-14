/**
 * Optimized Portfolio Grid System
 * Enhanced performance with clean responsive grid layout
 */

document.addEventListener('DOMContentLoaded', function() {
    // Optimized DOM element caching with null checks
    const elements = {
        // Filter elements
        filterBtns: document.querySelectorAll('.filter-btn'),
        portfolioItems: document.querySelectorAll('.portfolio-item'),
        portfolioGrid: document.getElementById('portfolio-grid'),
        portfolioList: document.getElementById('portfolio-list'),
        portfolioEmpty: document.getElementById('portfolio-empty'),
        portfolioSearch: document.getElementById('portfolio-search'),
        sortOptions: document.getElementById('sort-options'),
        gridViewBtn: document.getElementById('grid-view'),
        listViewBtn: document.getElementById('list-view'),
        resetFiltersBtn: document.getElementById('reset-filters'),

        // Modal elements - grouped for efficiency
        modal: document.getElementById('project-modal'),
        modalOverlay: document.getElementById('modal-overlay'),
        modalContainer: document.getElementById('modal-container'),
        modalClose: document.getElementById('modal-close'),
        modalElements: {
            image: document.getElementById('modal-image'),
            title: document.getElementById('modal-title'),
            category: document.getElementById('modal-category'),
            description: document.getElementById('modal-description'),
            contactBtn: document.getElementById('modal-contact-btn'),
            client: document.getElementById('modal-client'),
            year: document.getElementById('modal-year'),
            location: document.getElementById('modal-location'),
            area: document.getElementById('modal-area'),
            status: document.getElementById('modal-status'),
            duration: document.getElementById('modal-duration'),
            budget: document.getElementById('modal-budget'),
            features: document.getElementById('modal-features'),
            tags: document.getElementById('modal-tags'),
            thumbnails: document.getElementById('modal-thumbnails'),
            imageCounter: document.getElementById('modal-image-counter'),
            prevImage: document.getElementById('modal-prev-image'),
            nextImage: document.getElementById('modal-next-image'),
            shareBtn: document.getElementById('modal-share-btn')
        }
    };

    // Optimized constants
    const CONFIG = {
        ANIMATION_DURATION_MS: 300,
        ITEM_ANIMATION_DELAY_MS: 30
    };

    // Consolidated filter state
    const filterState = {
        category: 'all',
        search: '',
        sort: 'newest',
        view: 'grid',
        activeFilters: new Set()
    };

    // Project data cache
    let projectsData = [];

    /**
     * Styles a filter button based on its active state using modern styling.
     * @param {HTMLButtonElement} button - The filter button element.
     * @param {boolean} isActive - Whether the button should be styled as active.
     */
    function styleFilterButton(button, isActive) {
        if (isActive) {
            button.classList.add('active');
            button.querySelector('.absolute').classList.add('opacity-100');
            button.querySelector('.absolute').classList.remove('opacity-0');
            button.querySelector('.relative').classList.add('text-white');
            button.querySelector('.relative').classList.remove('text-gray-300');
        } else {
            button.classList.remove('active');
            button.querySelector('.absolute').classList.remove('opacity-100');
            button.querySelector('.absolute').classList.add('opacity-0');
            button.querySelector('.relative').classList.remove('text-white');
            button.querySelector('.relative').classList.add('text-gray-300');
        }
    }

    /**
     * Styles a view toggle button based on its active state.
     * @param {HTMLButtonElement} button - The view toggle button.
     * @param {boolean} isActive - Whether the button should be styled as active.
     */
    function styleViewToggle(button, isActive) {
        if (isActive) {
            button.classList.add('active', 'bg-primary-500', 'text-white');
        } else {
            button.classList.remove('active', 'bg-primary-500', 'text-white');
        }
    }

    /**
     * Shows or hides a portfolio item with animation.
     * @param {HTMLElement} item - The portfolio item element.
     * @param {boolean} show - Whether to show or hide the item.
     * @param {number} delay - Delay before starting the animation.
     */
    function animatePortfolioItem(item, show, delay = 0) {
        if (show) {
            item.classList.remove('hidden');
            setTimeout(() => {
                item.classList.remove('opacity-0', 'translate-y-4');
                item.classList.add('opacity-100', 'translate-y-0');
            }, delay);
        } else {
            item.classList.add('opacity-0', 'translate-y-4');
            setTimeout(() => {
                item.classList.add('hidden');
            }, ANIMATION_DURATION_MS);
        }
    }

    /**
     * Optimized filtering with cached data extraction
     */
    function applyOptimizedFilter(items) {
        const searchTerm = filterState.search.toLowerCase();

        return items.filter(item => {
            // Cache data attributes for performance
            const itemData = item._cachedData || (item._cachedData = {
                category: item.getAttribute('data-category'),
                tags: item.getAttribute('data-tags')?.toLowerCase() || '',
                title: item.querySelector('h3')?.textContent?.toLowerCase() || '',
                description: item.querySelector('p')?.textContent?.toLowerCase() || '',
                location: item.getAttribute('data-location')?.toLowerCase() || '',
                year: item.getAttribute('data-year') || ''
            });

            // Optimized category filter
            const categoryMatch = filterState.category === 'all' || itemData.category === filterState.category;

            // Optimized search filter
            const searchMatch = !searchTerm || (
                itemData.title.includes(searchTerm) ||
                itemData.description.includes(searchTerm) ||
                itemData.tags.includes(searchTerm) ||
                itemData.location.includes(searchTerm)
            );

            return categoryMatch && searchMatch;
        });
    }

    /**
     * Optimized sorting with cached comparisons
     */
    function sortOptimizedItems(items) {
        const sortFunctions = {
            newest: (a, b) => parseInt(b.getAttribute('data-year')) - parseInt(a.getAttribute('data-year')),
            oldest: (a, b) => parseInt(a.getAttribute('data-year')) - parseInt(b.getAttribute('data-year')),
            name: (a, b) => {
                const titleA = a.querySelector('h3')?.textContent || '';
                const titleB = b.querySelector('h3')?.textContent || '';
                return titleA.localeCompare(titleB);
            },
            category: (a, b) => {
                const catA = a.getAttribute('data-category') || '';
                const catB = b.getAttribute('data-category') || '';
                return catA.localeCompare(catB);
            }
        };

        return items.sort(sortFunctions[filterState.sort] || (() => 0));
    }

    /**
     * Optimized portfolio display update with responsive grid support
     */
    function updatePortfolioDisplay() {
        const allItems = Array.from(elements.portfolioItems);
        const filteredItems = applyOptimizedFilter(allItems);
        const sortedItems = sortOptimizedItems(filteredItems);

        // Batch DOM updates for performance
        requestAnimationFrame(() => {
            // Hide all items efficiently
            allItems.forEach(item => {
                item.classList.add('hidden', 'opacity-0');
            });

            // Update container visibility
            const hasResults = sortedItems.length > 0;
            elements.portfolioEmpty.classList.toggle('hidden', hasResults);

            if (hasResults) {
                const isGridView = filterState.view === 'grid';
                elements.portfolioGrid.classList.toggle('hidden', !isGridView);
                elements.portfolioList.classList.toggle('hidden', isGridView);

                // Optimized staggered animation for responsive grid
                sortedItems.forEach((item, index) => {
                    const delay = index * CONFIG.ITEM_ANIMATION_DELAY_MS;
                    setTimeout(() => {
                        item.classList.remove('hidden');
                        requestAnimationFrame(() => {
                            item.classList.remove('opacity-0');
                            item.classList.add('opacity-100');
                        });
                    }, delay);
                });
            }
        });

        // Refresh AOS for new layout if available
        if (typeof AOS !== 'undefined') {
            setTimeout(() => AOS.refresh(), 100);
        }
    }

    /**
     * Initializes search functionality.
     */
    function initializeSearch() {
        if (!elements.portfolioSearch) return;

        let searchTimeout;
        elements.portfolioSearch.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                filterState.search = this.value.trim();
                updatePortfolioDisplay();
            }, 300); // Debounce search
        });
    }

    /**
     * Initializes sorting functionality.
     */
    function initializeSorting() {
        if (!elements.sortOptions) return;

        elements.sortOptions.addEventListener('change', function() {
            filterState.sort = this.value;
            updatePortfolioDisplay();
        });
    }

    /**
     * Initializes view toggle functionality.
     */
    function initializeViewToggle() {
        if (!elements.gridViewBtn || !elements.listViewBtn) return;

        elements.gridViewBtn.addEventListener('click', function() {
            filterState.view = 'grid';
            styleViewToggle(elements.gridViewBtn, true);
            styleViewToggle(elements.listViewBtn, false);
            updatePortfolioDisplay();
        });

        elements.listViewBtn.addEventListener('click', function() {
            filterState.view = 'list';
            styleViewToggle(elements.listViewBtn, true);
            styleViewToggle(elements.gridViewBtn, false);
            updatePortfolioDisplay();
        });
    }

    /**
     * Initializes filter button event listeners.
     */
    function initializeFilterButtons() {
        if (elements.filterBtns.length === 0) return;

        elements.filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                elements.filterBtns.forEach(b => styleFilterButton(b, false));
                styleFilterButton(this, true);

                filterState.category = this.getAttribute('data-filter');
                updatePortfolioDisplay();
            });
        });
    }

    /**
     * Initializes reset filters functionality.
     */
    function initializeResetFilters() {
        if (!elements.resetFiltersBtn) return;

        elements.resetFiltersBtn.addEventListener('click', function() {
            // Reset filter state
            filterState.category = 'all';
            filterState.search = '';
            filterState.sort = 'newest';

            // Reset UI elements
            if (elements.portfolioSearch) elements.portfolioSearch.value = '';
            if (elements.sortOptions) elements.sortOptions.value = 'newest';

            // Reset filter buttons
            elements.filterBtns.forEach(btn => {
                const isAll = btn.getAttribute('data-filter') === 'all';
                styleFilterButton(btn, isAll);
            });

            updatePortfolioDisplay();
        });
    }

    /**
     * Opens the project details modal with animation.
     */
    function openModal() {
        if (!elements.modal || !elements.modalOverlay || !elements.modalContainer) return;
        elements.modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        setTimeout(() => {
            elements.modalOverlay.classList.add('opacity-100');
            elements.modalContainer.classList.remove('scale-90', 'opacity-0');
            elements.modalContainer.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    /**
     * Closes the project details modal with animation.
     */
    function closeModal() {
        if (!elements.modal || !elements.modalOverlay || !elements.modalContainer || elements.modal.classList.contains('hidden')) return;
        elements.modalOverlay.classList.remove('opacity-100');
        elements.modalContainer.classList.remove('scale-100', 'opacity-100');
        elements.modalContainer.classList.add('scale-90', 'opacity-0');

        setTimeout(() => {
            elements.modal.classList.add('hidden');
            document.body.style.overflow = '';
        }, CONFIG.ANIMATION_DURATION_MS);
    }

    /**
     * Enhanced project modal function that accepts project ID.
     * @param {string} projectId - The project ID to display.
     */
    window.openProjectModal = function(projectId) {
        // Find project data by ID from the enhanced data structure
        const projectsData = {
            'villa-pesisir': {
                title: 'Villa Pesisir',
                category: 'Residensial',
                year: '2023',
                location: 'Bali',
                area: '450 m²',
                client: 'PT Pesisir Indah',
                status: 'Completed',
                duration: '8 bulan',
                budget: '2-5M',
                description: 'Villa mewah dengan pemandangan laut yang menakjubkan. Desain modern yang menyatu dengan alam, menghadirkan keseimbangan sempurna antara kemewahan dan keberlanjutan.',
                images: [
                    'https://images.unsplash.com/photo-1613490493576-7fde63acd811?w=800&h=600&fit=crop',
                    'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=800&h=600&fit=crop',
                    'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=800&h=600&fit=crop'
                ],
                features: [
                    'Infinity Pool dengan Ocean View',
                    'Smart Home System',
                    'Solar Panel Integration',
                    'Natural Ventilation System',
                    'Private Beach Access'
                ],
                tags: ['modern', 'sustainable', 'luxury', 'oceanview', 'tropical']
            },
            'kantor-greenspace': {
                title: 'Kantor Modern Greenspace',
                category: 'Komersial',
                year: '2022',
                location: 'Jakarta',
                area: '1,200 m²',
                client: 'PT Teknologi Hijau',
                status: 'Completed',
                duration: '12 bulan',
                budget: '5-10M',
                description: 'Ruang kantor dengan konsep hijau yang mengutamakan produktivitas dan kesejahteraan karyawan.',
                images: [
                    'https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&h=600&fit=crop',
                    'https://images.unsplash.com/photo-1497366811353-6870744d04b2?w=800&h=600&fit=crop',
                    'https://images.unsplash.com/photo-1556761175-b413da4baf72?w=800&h=600&fit=crop'
                ],
                features: [
                    'Vertical Garden System',
                    'Natural Light Optimization',
                    'Flexible Workspace Layout',
                    'Air Purification System',
                    'Rooftop Garden'
                ],
                tags: ['biophilic', 'productive', 'sustainable', 'modern', 'wellness']
            },
            'apartment-skyview': {
                title: 'Apartment Sky View',
                category: 'Residensial',
                year: '2021',
                location: 'Surabaya',
                area: '85 m²',
                client: 'Private Client',
                status: 'Completed',
                duration: '4 bulan',
                budget: '500K-1M',
                description: 'Apartemen premium dengan pemandangan kota yang memukau. Desain interior yang elegan dan fungsional.',
                images: [
                    'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=800&h=600&fit=crop',
                    'https://images.unsplash.com/photo-1560449752-2dd9b55c3d0e?w=800&h=600&fit=crop'
                ],
                features: [
                    'Space-Saving Furniture',
                    'Floor-to-Ceiling Windows',
                    'Built-in Storage Solutions',
                    'Smart Lighting System',
                    'Panoramic City View'
                ],
                tags: ['compact', 'elegant', 'functional', 'cityview', 'luxury']
            },
            'restoran-archipelago': {
                title: 'Restoran Archipelago',
                category: 'Komersial',
                year: '2022',
                location: 'Yogyakarta',
                area: '300 m²',
                client: 'Archipelago Group',
                status: 'Completed',
                duration: '6 bulan',
                budget: '1-2M',
                description: 'Restoran dengan desain yang terinspirasi keindahan kepulauan Indonesia. Atmosfer yang nyaman dan instagramable.',
                images: [
                    'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=800&h=600&fit=crop',
                    'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=800&h=600&fit=crop',
                    'https://images.unsplash.com/photo-1514933651103-005eec06c04b?w=800&h=600&fit=crop'
                ],
                features: [
                    'Themed Dining Areas',
                    'Traditional Material Integration',
                    'Instagram-worthy Spots',
                    'Acoustic Design',
                    'Cultural Art Installation'
                ],
                tags: ['traditional', 'instagramable', 'cultural', 'dining', 'atmospheric']
            },
            'rumah-minimalis': {
                title: 'Rumah Minimalis Sejuk',
                category: 'Residensial',
                year: '2023',
                location: 'Bandung',
                area: '180 m²',
                client: 'Keluarga Santoso',
                status: 'Completed',
                duration: '5 bulan',
                budget: '1-2M',
                description: 'Rumah dengan desain minimalis modern yang memberikan kesejukan dan kenyamanan. Maksimal dalam fungsi, minimal dalam dekorasi.',
                images: [
                    'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&h=600&fit=crop',
                    'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?w=800&h=600&fit=crop'
                ],
                features: [
                    'Cross Ventilation System',
                    'Minimalist Interior Design',
                    'Energy Efficient Lighting',
                    'Integrated Landscape',
                    'Multi-functional Spaces'
                ],
                tags: ['minimalist', 'functional', 'cool', 'efficient', 'family']
            },
            'butik-hotel-cerita': {
                title: 'Butik Hotel Cerita',
                category: 'Hospitality',
                year: '2022',
                location: 'Lombok',
                area: '800 m²',
                client: 'Cerita Hospitality',
                status: 'Completed',
                duration: '10 bulan',
                budget: '3-5M',
                description: 'Butik hotel yang menawarkan pengalaman menginap unik dengan cerita lokal. Setiap kamar memiliki tema berbeda.',
                images: [
                    'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=800&h=600&fit=crop',
                    'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800&h=600&fit=crop',
                    'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=800&h=600&fit=crop'
                ],
                features: [
                    'Themed Guest Rooms',
                    'Cultural Art Integration',
                    'Local Material Usage',
                    'Storytelling Architecture',
                    'Authentic Experience Design'
                ],
                tags: ['boutique', 'cultural', 'storytelling', 'unique', 'hospitality']
            }
        };

        const project = projectsData[projectId];
        if (!project) {
            console.error(`Project with ID ${projectId} not found.`);
            return;
        }

        // Store current project data
        currentProjectData = project;
        currentProjectImages = project.images || [];
        currentImageIndex = 0;

        // Populate modal with enhanced data
        if (elements.modalElements.title) elements.modalElements.title.textContent = project.title;
        if (elements.modalElements.category) elements.modalElements.category.textContent = project.category;
        if (elements.modalElements.description) elements.modalElements.description.textContent = project.description;
        if (elements.modalElements.year) elements.modalElements.year.textContent = project.year;
        if (elements.modalElements.location) elements.modalElements.location.textContent = project.location;
        if (elements.modalElements.area) elements.modalElements.area.textContent = project.area;
        if (elements.modalElements.client) elements.modalElements.client.textContent = project.client;
        if (elements.modalElements.status) elements.modalElements.status.textContent = project.status;
        if (elements.modalElements.duration) elements.modalElements.duration.textContent = project.duration;
        if (elements.modalElements.budget) elements.modalElements.budget.textContent = project.budget;

        // Set up image gallery
        if (currentProjectImages.length > 0) {
            showImage(0);
            createImageThumbnails(currentProjectImages);
        }

        // Create features and tags
        createFeatureList(project.features);
        createTagList(project.tags);

        openModal();
    };

    /**
     * Initializes modal event listeners.
     */
    function initializeModalEventListeners() {
        if (elements.modalClose) elements.modalClose.addEventListener('click', closeModal);
        if (elements.modalOverlay) elements.modalOverlay.addEventListener('click', closeModal);

        // Image navigation
        if (elements.modalElements.prevImage) elements.modalElements.prevImage.addEventListener('click', showPrevImage);
        if (elements.modalElements.nextImage) elements.modalElements.nextImage.addEventListener('click', showNextImage);

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (elements.modal && !elements.modal.classList.contains('hidden')) {
                switch(e.key) {
                    case 'Escape':
                        closeModal();
                        break;
                    case 'ArrowLeft':
                        showPrevImage();
                        break;
                    case 'ArrowRight':
                        showNextImage();
                        break;
                }
            }
        });

        if (elements.modalElements.contactBtn) {
            elements.modalElements.contactBtn.addEventListener('click', closeModal);
        }

        if (elements.modalElements.shareBtn) {
            elements.modalElements.shareBtn.addEventListener('click', function() {
                if (navigator.share && currentProjectData.title) {
                    navigator.share({
                        title: currentProjectData.title,
                        text: currentProjectData.description,
                        url: window.location.href
                    });
                } else {
                    // Fallback: copy to clipboard
                    navigator.clipboard.writeText(window.location.href);
                    // You could show a toast notification here
                }
            });
        }
    }

    // Modal state
    let currentImageIndex = 0;
    let currentProjectImages = [];
    let currentProjectData = {};

    /**
     * Creates image thumbnails for the modal gallery.
     * @param {Array} images - Array of image URLs.
     */
    function createImageThumbnails(images) {
        if (!elements.modalElements.thumbnails) return;

        elements.modalElements.thumbnails.innerHTML = '';
        images.forEach((image, index) => {
            const thumbnail = document.createElement('button');
            thumbnail.className = `w-12 h-12 rounded-lg overflow-hidden border-2 transition-all duration-300 ${
                index === 0 ? 'border-primary-500' : 'border-gray-600 hover:border-gray-400'
            }`;
            thumbnail.innerHTML = `<img src="${image}" alt="Thumbnail ${index + 1}" class="w-full h-full object-cover">`;
            thumbnail.addEventListener('click', () => showImage(index));
            elements.modalElements.thumbnails.appendChild(thumbnail);
        });
    }

    /**
     * Shows a specific image in the modal gallery.
     * @param {number} index - Index of the image to show.
     */
    function showImage(index) {
        if (!currentProjectImages.length || index < 0 || index >= currentProjectImages.length) return;

        currentImageIndex = index;

        if (elements.modalElements.image) {
            elements.modalElements.image.src = currentProjectImages[index];
            elements.modalElements.image.alt = `${currentProjectData.title} - Image ${index + 1}`;
        }

        if (elements.modalElements.imageCounter) {
            elements.modalElements.imageCounter.textContent = `${index + 1} / ${currentProjectImages.length}`;
        }

        // Update thumbnail active state
        const thumbnails = elements.modalElements.thumbnails?.querySelectorAll('button');
        thumbnails?.forEach((thumb, i) => {
            if (i === index) {
                thumb.classList.add('border-primary-500');
                thumb.classList.remove('border-gray-600');
            } else {
                thumb.classList.remove('border-primary-500');
                thumb.classList.add('border-gray-600');
            }
        });
    }

    /**
     * Shows the next image in the gallery.
     */
    function showNextImage() {
        const nextIndex = (currentImageIndex + 1) % currentProjectImages.length;
        showImage(nextIndex);
    }

    /**
     * Shows the previous image in the gallery.
     */
    function showPrevImage() {
        const prevIndex = currentImageIndex === 0 ? currentProjectImages.length - 1 : currentImageIndex - 1;
        showImage(prevIndex);
    }

    /**
     * Creates feature list for the modal.
     * @param {Array} features - Array of feature strings.
     */
    function createFeatureList(features) {
        if (!elements.modalElements.features || !features) return;

        elements.modalElements.features.innerHTML = '';
        features.forEach(feature => {
            const featureElement = document.createElement('div');
            featureElement.className = 'flex items-center space-x-3 text-gray-300';
            featureElement.innerHTML = `
                <div class="w-2 h-2 bg-primary-500 rounded-full flex-shrink-0"></div>
                <span class="text-sm">${feature}</span>
            `;
            elements.modalElements.features.appendChild(featureElement);
        });
    }

    /**
     * Creates tag list for the modal.
     * @param {Array} tags - Array of tag strings.
     */
    function createTagList(tags) {
        if (!elements.modalElements.tags || !tags) return;

        elements.modalElements.tags.innerHTML = '';
        tags.forEach(tag => {
            const tagElement = document.createElement('span');
            tagElement.className = 'inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-700/50 text-gray-300 border border-gray-600/50';
            tagElement.textContent = tag;
            elements.modalElements.tags.appendChild(tagElement);
        });
    }

    /**
     * Optimized portfolio initialization with error handling
     */
    function initializeOptimizedPortfolio() {
        try {
            // Cache project data efficiently
            projectsData = Array.from(elements.portfolioItems);

            // Batch initialize all components
            const initFunctions = [
                initializeFilterButtons,
                initializeSearch,
                initializeSorting,
                initializeViewToggle,
                initializeResetFilters,
                initializeModalEventListeners
            ];

            initFunctions.forEach(fn => {
                try {
                    fn();
                } catch (error) {
                    console.warn('Portfolio initialization warning:', error);
                }
            });

            // Set initial view state with null checks
            if (elements.gridViewBtn && elements.listViewBtn) {
                styleViewToggle(elements.gridViewBtn, true);
                styleViewToggle(elements.listViewBtn, false);
            }

            // Initial display update
            updatePortfolioDisplay();

            // Enhanced AOS integration
            if (typeof AOS !== 'undefined') {
                setTimeout(() => AOS.refresh(), 200);
            }

        } catch (error) {
            console.error('Portfolio initialization failed:', error);
        }
    }

    // Initialize with performance optimization
    initializeOptimizedPortfolio();
});
