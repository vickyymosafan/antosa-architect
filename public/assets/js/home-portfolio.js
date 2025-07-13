// assets/js/home-portfolio.js

document.addEventListener('DOMContentLoaded', function() {
    // Cache DOM elements
    const filterBtns = document.querySelectorAll('.filter-btn');
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    const portfolioGrid = document.getElementById('portfolio-grid');
    const portfolioList = document.getElementById('portfolio-list');
    const portfolioEmpty = document.getElementById('portfolio-empty');
    const portfolioSearch = document.getElementById('portfolio-search');
    const sortOptions = document.getElementById('sort-options');
    const gridViewBtn = document.getElementById('grid-view');
    const listViewBtn = document.getElementById('list-view');
    const resetFiltersBtn = document.getElementById('reset-filters');

    // Modal elements
    const modal = document.getElementById('project-modal');
    const modalOverlay = document.getElementById('modal-overlay');
    const modalContainer = document.getElementById('modal-container');
    const modalClose = document.getElementById('modal-close');
    const modalImage = document.getElementById('modal-image');
    const modalTitle = document.getElementById('modal-title');
    const modalCategory = document.getElementById('modal-category');
    const modalDescription = document.getElementById('modal-description');
    const modalContactBtn = document.getElementById('modal-contact-btn');
    const modalClient = document.getElementById('modal-client');
    const modalYear = document.getElementById('modal-year');
    const modalLocation = document.getElementById('modal-location');
    const modalArea = document.getElementById('modal-area');
    const modalStatus = document.getElementById('modal-status');
    const modalDuration = document.getElementById('modal-duration');
    const modalBudget = document.getElementById('modal-budget');
    const modalFeatures = document.getElementById('modal-features');
    const modalTags = document.getElementById('modal-tags');
    const modalThumbnails = document.getElementById('modal-thumbnails');
    const modalImageCounter = document.getElementById('modal-image-counter');
    const modalPrevImage = document.getElementById('modal-prev-image');
    const modalNextImage = document.getElementById('modal-next-image');
    const modalShareBtn = document.getElementById('modal-share-btn');

    // Animation constants
    const ANIMATION_DURATION_MS = 300;
    const ITEM_ANIMATION_DELAY_MS = 30;

    // Filter state
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
     * Advanced filtering function that handles multiple criteria.
     * @param {Array} items - Array of portfolio items to filter.
     * @returns {Array} - Filtered items.
     */
    function applyAdvancedFilter(items) {
        return items.filter(item => {
            const category = item.getAttribute('data-category');
            const tags = item.getAttribute('data-tags')?.toLowerCase() || '';
            const title = item.querySelector('h3')?.textContent?.toLowerCase() || '';
            const description = item.querySelector('p')?.textContent?.toLowerCase() || '';
            const location = item.getAttribute('data-location')?.toLowerCase() || '';
            const year = item.getAttribute('data-year') || '';

            // Category filter
            const categoryMatch = filterState.category === 'all' || category === filterState.category;

            // Search filter
            const searchTerm = filterState.search.toLowerCase();
            const searchMatch = !searchTerm ||
                title.includes(searchTerm) ||
                description.includes(searchTerm) ||
                tags.includes(searchTerm) ||
                location.includes(searchTerm);

            return categoryMatch && searchMatch;
        });
    }

    /**
     * Sorts portfolio items based on the selected criteria.
     * @param {Array} items - Array of portfolio items to sort.
     * @returns {Array} - Sorted items.
     */
    function sortPortfolioItems(items) {
        return items.sort((a, b) => {
            switch (filterState.sort) {
                case 'newest':
                    return parseInt(b.getAttribute('data-year')) - parseInt(a.getAttribute('data-year'));
                case 'oldest':
                    return parseInt(a.getAttribute('data-year')) - parseInt(b.getAttribute('data-year'));
                case 'name':
                    const titleA = a.querySelector('h3')?.textContent || '';
                    const titleB = b.querySelector('h3')?.textContent || '';
                    return titleA.localeCompare(titleB);
                case 'category':
                    const catA = a.getAttribute('data-category') || '';
                    const catB = b.getAttribute('data-category') || '';
                    return catA.localeCompare(catB);
                default:
                    return 0;
            }
        });
    }

    /**
     * Updates the portfolio display based on current filters and view mode.
     */
    function updatePortfolioDisplay() {
        const allItems = Array.from(portfolioItems);
        const filteredItems = applyAdvancedFilter(allItems);
        const sortedItems = sortPortfolioItems(filteredItems);

        // Hide all items first
        allItems.forEach(item => {
            item.classList.add('hidden', 'opacity-0');
        });

        // Show/hide containers based on view mode and results
        if (sortedItems.length === 0) {
            portfolioGrid.classList.add('hidden');
            portfolioList.classList.add('hidden');
            portfolioEmpty.classList.remove('hidden');
        } else {
            portfolioEmpty.classList.add('hidden');

            if (filterState.view === 'grid') {
                portfolioGrid.classList.remove('hidden');
                portfolioList.classList.add('hidden');
            } else {
                portfolioGrid.classList.add('hidden');
                portfolioList.classList.remove('hidden');
            }

            // Animate filtered items
            sortedItems.forEach((item, index) => {
                setTimeout(() => {
                    item.classList.remove('hidden');
                    setTimeout(() => {
                        item.classList.remove('opacity-0');
                        item.classList.add('opacity-100');
                    }, 10);
                }, index * ITEM_ANIMATION_DELAY_MS);
            });
        }
    }

    /**
     * Initializes search functionality.
     */
    function initializeSearch() {
        if (!portfolioSearch) return;

        let searchTimeout;
        portfolioSearch.addEventListener('input', function() {
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
        if (!sortOptions) return;

        sortOptions.addEventListener('change', function() {
            filterState.sort = this.value;
            updatePortfolioDisplay();
        });
    }

    /**
     * Initializes view toggle functionality.
     */
    function initializeViewToggle() {
        if (!gridViewBtn || !listViewBtn) return;

        gridViewBtn.addEventListener('click', function() {
            filterState.view = 'grid';
            styleViewToggle(gridViewBtn, true);
            styleViewToggle(listViewBtn, false);
            updatePortfolioDisplay();
        });

        listViewBtn.addEventListener('click', function() {
            filterState.view = 'list';
            styleViewToggle(listViewBtn, true);
            styleViewToggle(gridViewBtn, false);
            updatePortfolioDisplay();
        });
    }

    /**
     * Initializes filter button event listeners.
     */
    function initializeFilterButtons() {
        if (filterBtns.length === 0) return;

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                filterBtns.forEach(b => styleFilterButton(b, false));
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
        if (!resetFiltersBtn) return;

        resetFiltersBtn.addEventListener('click', function() {
            // Reset filter state
            filterState.category = 'all';
            filterState.search = '';
            filterState.sort = 'newest';

            // Reset UI elements
            if (portfolioSearch) portfolioSearch.value = '';
            if (sortOptions) sortOptions.value = 'newest';

            // Reset filter buttons
            filterBtns.forEach(btn => {
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
        if (!modal || !modalOverlay || !modalContainer) return;
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        setTimeout(() => {
            modalOverlay.classList.add('opacity-100');
            modalContainer.classList.remove('scale-90', 'opacity-0');
            modalContainer.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    /**
     * Closes the project details modal with animation.
     */
    function closeModal() {
        if (!modal || !modalOverlay || !modalContainer || modal.classList.contains('hidden')) return;
        modalOverlay.classList.remove('opacity-100');
        modalContainer.classList.remove('scale-100', 'opacity-100');
        modalContainer.classList.add('scale-90', 'opacity-0');

        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }, ANIMATION_DURATION_MS);
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
        if (modalTitle) modalTitle.textContent = project.title;
        if (modalCategory) modalCategory.textContent = project.category;
        if (modalDescription) modalDescription.textContent = project.description;
        if (modalYear) modalYear.textContent = project.year;
        if (modalLocation) modalLocation.textContent = project.location;
        if (modalArea) modalArea.textContent = project.area;
        if (modalClient) modalClient.textContent = project.client;
        if (modalStatus) modalStatus.textContent = project.status;
        if (modalDuration) modalDuration.textContent = project.duration;
        if (modalBudget) modalBudget.textContent = project.budget;

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
        if (modalClose) modalClose.addEventListener('click', closeModal);
        if (modalOverlay) modalOverlay.addEventListener('click', closeModal);

        // Image navigation
        if (modalPrevImage) modalPrevImage.addEventListener('click', showPrevImage);
        if (modalNextImage) modalNextImage.addEventListener('click', showNextImage);

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (modal && !modal.classList.contains('hidden')) {
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

        if (modalContactBtn) {
            modalContactBtn.addEventListener('click', closeModal);
        }

        if (modalShareBtn) {
            modalShareBtn.addEventListener('click', function() {
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
        if (!modalThumbnails) return;

        modalThumbnails.innerHTML = '';
        images.forEach((image, index) => {
            const thumbnail = document.createElement('button');
            thumbnail.className = `w-12 h-12 rounded-lg overflow-hidden border-2 transition-all duration-300 ${
                index === 0 ? 'border-primary-500' : 'border-gray-600 hover:border-gray-400'
            }`;
            thumbnail.innerHTML = `<img src="${image}" alt="Thumbnail ${index + 1}" class="w-full h-full object-cover">`;
            thumbnail.addEventListener('click', () => showImage(index));
            modalThumbnails.appendChild(thumbnail);
        });
    }

    /**
     * Shows a specific image in the modal gallery.
     * @param {number} index - Index of the image to show.
     */
    function showImage(index) {
        if (!currentProjectImages.length || index < 0 || index >= currentProjectImages.length) return;

        currentImageIndex = index;

        if (modalImage) {
            modalImage.src = currentProjectImages[index];
            modalImage.alt = `${currentProjectData.title} - Image ${index + 1}`;
        }

        if (modalImageCounter) {
            modalImageCounter.textContent = `${index + 1} / ${currentProjectImages.length}`;
        }

        // Update thumbnail active state
        const thumbnails = modalThumbnails?.querySelectorAll('button');
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
        if (!modalFeatures || !features) return;

        modalFeatures.innerHTML = '';
        features.forEach(feature => {
            const featureElement = document.createElement('div');
            featureElement.className = 'flex items-center space-x-3 text-gray-300';
            featureElement.innerHTML = `
                <div class="w-2 h-2 bg-primary-500 rounded-full flex-shrink-0"></div>
                <span class="text-sm">${feature}</span>
            `;
            modalFeatures.appendChild(featureElement);
        });
    }

    /**
     * Creates tag list for the modal.
     * @param {Array} tags - Array of tag strings.
     */
    function createTagList(tags) {
        if (!modalTags || !tags) return;

        modalTags.innerHTML = '';
        tags.forEach(tag => {
            const tagElement = document.createElement('span');
            tagElement.className = 'inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-700/50 text-gray-300 border border-gray-600/50';
            tagElement.textContent = `#${tag}`;
            modalTags.appendChild(tagElement);
        });
    }

    /**
     * Initializes all portfolio functionality.
     */
    function initializePortfolio() {
        // Cache project data for performance
        projectsData = Array.from(portfolioItems);

        // Initialize all components
        initializeFilterButtons();
        initializeSearch();
        initializeSorting();
        initializeViewToggle();
        initializeResetFilters();
        initializeModalEventListeners();

        // Set initial view state
        if (gridViewBtn && listViewBtn) {
            styleViewToggle(gridViewBtn, true);
            styleViewToggle(listViewBtn, false);
        }

        // Initial display
        updatePortfolioDisplay();

        // Add AOS refresh for dynamic content
        if (typeof AOS !== 'undefined') {
            AOS.refresh();
        }
    }

    // Initialize when DOM is ready
    initializePortfolio();
});
