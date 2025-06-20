// SCND - Main JavaScript File

document.addEventListener('DOMContentLoaded', () => {
        // Toggle sidebar
        const toggleSidebarBtn = document.querySelector('.toggle-sidebar-btn');
        toggleSidebarBtn?.addEventListener('click', (e) => {
            document.body.classList.toggle('toggle-sidebar');
        });
    });

document.addEventListener('DOMContentLoaded', function() {
    // Sticky header effect
    const header = document.querySelector('header');
    
    window.addEventListener('scroll', function() {
        if (window.scrollY > 100) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 80,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Newsletter form submission
    const newsletterForm = document.querySelector('.newsletter-form');
    
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const emailInput = this.querySelector('input[type="email"]');
            const email = emailInput.value.trim();
            
            if (email) {
                // In a real application, you would send this to the server
                // This is just a frontend demo
                alert('Thank you for subscribing to our newsletter!');
                emailInput.value = '';
            }
        });
    }
    
    // Add fade-in animation to elements as they enter viewport
    const fadeElements = document.querySelectorAll('.product-card, .category-card, .step-card, .value-card, .testimonial-card');
    
    const fadeObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
                fadeObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1
    });
    
    fadeElements.forEach(element => {
        element.classList.add('fade-element');
        fadeObserver.observe(element);
    });
    
    // Testimonial Slider functionality
    const testimonialSlider = document.querySelector('.testimonial-slider');
    
    if (testimonialSlider) {
        const slides = testimonialSlider.querySelectorAll('.testimonial-slide');
        const dots = document.querySelectorAll('.testimonial-dots .dot');
        const prevButton = testimonialSlider.querySelector('.nav-button.prev');
        const nextButton = testimonialSlider.querySelector('.nav-button.next');
        let currentIndex = 0;
        const totalSlides = slides.length;
        let autoSlideInterval;
        
        // Function to update the slider to show the current slide
        function updateSlider() {
            // Hide all slides
            slides.forEach(slide => {
                slide.classList.remove('active');
            });
            
            // Show current slide
            slides[currentIndex].classList.add('active');
            
            // Update dots
            dots.forEach(dot => {
                dot.classList.remove('active');
            });
            
            dots[currentIndex].classList.add('active');
        }
        
        // Go to next slide
        function nextSlide() {
            currentIndex = (currentIndex + 1) % totalSlides;
            updateSlider();
        }
        
        // Go to previous slide
        function prevSlide() {
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            updateSlider();
        }
        
        // Start auto sliding
        function startAutoSlide() {
            stopAutoSlide(); // Clear any existing interval first
            autoSlideInterval = setInterval(nextSlide, 5000);
        }
        
        // Stop auto sliding
        function stopAutoSlide() {
            if (autoSlideInterval) {
                clearInterval(autoSlideInterval);
            }
        }
        
        // Event listeners for navigation buttons
        if (nextButton) {
            nextButton.addEventListener('click', () => {
                nextSlide();
                stopAutoSlide();
                startAutoSlide(); // Reset the timer after manual navigation
            });
        }
        
        if (prevButton) {
            prevButton.addEventListener('click', () => {
                prevSlide();
                stopAutoSlide();
                startAutoSlide(); // Reset the timer after manual navigation
            });
        }
        
        // Event listeners for dot navigation
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                currentIndex = index;
                updateSlider();
                stopAutoSlide();
                startAutoSlide(); // Reset the timer after manual navigation
            });
        });
        
        // Pause auto-advance when user interacts with the slider
        testimonialSlider.addEventListener('mouseenter', stopAutoSlide);
        
        // Resume auto-advance when user leaves the slider
        testimonialSlider.addEventListener('mouseleave', startAutoSlide);
        
        // Start the auto slider
        startAutoSlide();
    }
    
    // Product Page Functions
    function initProductPage() {
        // Image Gallery
        function changeMainImage(src) {
            const mainImage = document.getElementById('mainImage');
            if (!mainImage) return;
            
            mainImage.src = src;
            document.querySelectorAll('.thumb-image').forEach(thumb => {
                thumb.classList.remove('active');
                if (thumb.querySelector('img').src === src) {
                    thumb.classList.add('active');
                }
            });
        }

        // Quantity Selector
        function updateQuantity(change) {
            const input = document.getElementById('quantity');
            if (!input) return;
            
            const currentValue = parseInt(input.value);
            const newValue = currentValue + change;
            
            if (newValue >= 1 && newValue <= 99) {
                input.value = newValue;
            }
        }

        // Initialize Color Selector
        const colorButtons = document.querySelectorAll('.color-btn');
        colorButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                colorButtons.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });

            // Add hover titles to color buttons
            if (!btn.title) {
                const color = btn.style.backgroundColor;
                btn.title = color.charAt(0).toUpperCase() + color.slice(1);
            }
        });

        // Add click handlers for quantity buttons
        const quantityButtons = document.querySelectorAll('.qty-btn');
        quantityButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                const change = this.textContent === '+' ? 1 : -1;
                updateQuantity(change);
            });
        });

        // Add click handlers for thumbnail images
        document.querySelectorAll('.thumb-image img').forEach(img => {
            img.addEventListener('click', function() {
                changeMainImage(this.src);
            });
        });
    }

    // Initialize product page if we're on a product page
    if (document.querySelector('.product-detail')) {
        initProductPage();
    }
    
    // Cart functionality
    function initializeCart() {
        const quantitySelectors = document.querySelectorAll('.quantity-selector');
        const removeButtons = document.querySelectorAll('.remove-item');
        
        // Handle quantity changes
        quantitySelectors.forEach(selector => {
            const input = selector.querySelector('.qty-input');
            const decreaseBtn = selector.querySelector('[data-action="decrease"]');
            const increaseBtn = selector.querySelector('[data-action="increase"]');
            
            decreaseBtn.addEventListener('click', () => {
                const currentValue = parseInt(input.value);
                if (currentValue > 1) {
                    input.value = currentValue - 1;
                    updateCartTotals();
                }
            });
            
            increaseBtn.addEventListener('click', () => {
                const currentValue = parseInt(input.value);
                if (currentValue < 99) {
                    input.value = currentValue + 1;
                    updateCartTotals();
                }
            });
            
            input.addEventListener('change', () => {
                let value = parseInt(input.value);
                if (isNaN(value) || value < 1) value = 1;
                if (value > 99) value = 99;
                input.value = value;
                updateCartTotals();
            });
        });
        
        // Handle remove item
        removeButtons.forEach(button => {
            button.addEventListener('click', () => {
                const cartItem = button.closest('.cart-item');
                cartItem.remove();
                updateCartTotals();
                updateCartCount();
            });
        });
        
        // Initialize cart totals
        updateCartTotals();
        updateCartCount();
    }
    
    function updateCartTotals() {
        const cartItems = document.querySelectorAll('.cart-item');
        let subtotal = 0;
        
        cartItems.forEach(item => {
            const price = parseFloat(item.querySelector('.item-price').textContent.replace('$', ''));
            const quantity = parseInt(item.querySelector('.qty-input').value);
            subtotal += price * quantity;
        });
        
        const shipping = 4.99;
        const total = subtotal + shipping;
        
        // Update summary values
        const summaryItems = document.querySelector('.summary-items');
        if (summaryItems) {
            const lines = summaryItems.querySelectorAll('.summary-line');
            lines[0].querySelector('span:last-child').textContent = `$${subtotal.toFixed(2)}`;
            lines[2].querySelector('span:last-child').textContent = `$${total.toFixed(2)}`;
        }
    }
    
    function updateCartCount() {
        const cartCount = document.querySelector('.cart-count');
        const itemCount = document.querySelectorAll('.cart-item').length;
        if (cartCount) {
            cartCount.textContent = `(${itemCount} ${itemCount === 1 ? 'item' : 'items'})`;
        }
        
        // Show/hide empty cart message
        const cartContent = document.querySelector('.cart-content');
        const cartHeader = document.querySelector('.cart-header');
        
        if (itemCount === 0 && cartContent && cartHeader) {
            cartContent.innerHTML = `
                <div class="empty-cart">
                    <p>Your cart is empty</p>
                    <a href="/catalog" class="btn">Start Shopping</a>
                </div>
            `;
            cartHeader.style.display = 'none';
        }
    }
    
    // Initialize cart if we're on the cart page
    if (document.querySelector('.cart-section')) {
        initializeCart();
    }
    
    // Catalog Page Functionality
    function initCatalog() {
        const searchInput = document.getElementById('searchInput');
        const sortSelect = document.getElementById('sortSelect');
        const filterInputs = document.querySelectorAll('.filter-options input');
        const clearFiltersBtn = document.querySelector('.btn-clear-filters');
        const priceRange = {
            min: document.getElementById('minPrice'),
            max: document.getElementById('maxPrice')
        };
        const btnApplyPrice = document.querySelector('.btn-apply');
        const productGrid = document.querySelector('.product-grid');
        const paginationBtns = document.querySelectorAll('.page-btn');

        // Mock product data (replace with actual data from backend)
        const products = [
            {
                id: 1,
                name: 'OnePlus 13t',
                price: 699,
                category: 'phones',
                brand: 'oneplus',
                condition: 'like-new',
                image: '/assets/images/products/oneplus-13t.jpg'
            },
            // Add more products here
        ];

        let currentFilters = {
            search: '',
            categories: [],
            brands: [],
            conditions: [],
            price: {
                min: null,
                max: null
            },
            sort: 'recommended',
            page: 1
        };

        // Filter products based on current filters
        function filterProducts() {
            let filtered = [...products];

            // Search filter
            if (currentFilters.search) {
                const searchTerm = currentFilters.search.toLowerCase();
                filtered = filtered.filter(product => 
                    product.name.toLowerCase().includes(searchTerm)
                );
            }

            // Category filter
            if (currentFilters.categories.length > 0) {
                filtered = filtered.filter(product => 
                    currentFilters.categories.includes(product.category)
                );
            }

            // Brand filter
            if (currentFilters.brands.length > 0) {
                filtered = filtered.filter(product => 
                    currentFilters.brands.includes(product.brand)
                );
            }

            // Condition filter
            if (currentFilters.conditions.length > 0) {
                filtered = filtered.filter(product => 
                    currentFilters.conditions.includes(product.condition)
                );
            }

            // Price filter
            if (currentFilters.price.min !== null) {
                filtered = filtered.filter(product => 
                    product.price >= currentFilters.price.min
                );
            }
            if (currentFilters.price.max !== null) {
                filtered = filtered.filter(product => 
                    product.price <= currentFilters.price.max
                );
            }

            // Sort products
            switch (currentFilters.sort) {
                case 'price-low':
                    filtered.sort((a, b) => a.price - b.price);
                    break;
                case 'price-high':
                    filtered.sort((a, b) => b.price - a.price);
                    break;
                case 'newest':
                    filtered.sort((a, b) => b.id - a.id);
                    break;
                // Add more sorting options as needed
            }

            return filtered;
        }

        // Render product cards
        function renderProducts(products) {
            productGrid.innerHTML = products.map(product => `
                <div class="product-card">
                    <div class="product-image">
                        <img src="${product.image}" alt="${product.name}">
                    </div>
                    <div class="product-info">
                        <h3 class="product-title">${product.name}</h3>
                        <div class="product-price">$${product.price}</div>
                        <div class="product-condition">${product.condition}</div>
                    </div>
                </div>
            `).join('');
        }

        // Update product count
        function updateProductCount(count) {
            document.getElementById('productCount').textContent = count;
        }

        // Event listeners
        searchInput.addEventListener('input', debounce(function() {
            currentFilters.search = this.value;
            currentFilters.page = 1;
            const filtered = filterProducts();
            renderProducts(filtered);
            updateProductCount(filtered.length);
        }, 300));

        sortSelect.addEventListener('change', function() {
            currentFilters.sort = this.value;
            const filtered = filterProducts();
            renderProducts(filtered);
        });

        filterInputs.forEach(input => {
            input.addEventListener('change', function() {
                const filterType = this.closest('.filter-group').querySelector('h3').textContent.toLowerCase();
                const value = this.value;

                switch(filterType) {
                    case 'categories':
                        currentFilters.categories = Array.from(
                            document.querySelectorAll('.filter-group:has(h3:contains("Categories")) input:checked')
                        ).map(input => input.value);
                        break;
                    case 'brand':
                        currentFilters.brands = Array.from(
                            document.querySelectorAll('.filter-group:has(h3:contains("Brand")) input:checked')
                        ).map(input => input.value);
                        break;
                    case 'condition':
                        currentFilters.conditions = Array.from(
                            document.querySelectorAll('.filter-group:has(h3:contains("Condition")) input:checked')
                        ).map(input => input.value);
                        break;
                }

                currentFilters.page = 1;
                const filtered = filterProducts();
                renderProducts(filtered);
                updateProductCount(filtered.length);
            });
        });

        btnApplyPrice.addEventListener('click', function() {
            currentFilters.price.min = priceRange.min.value ? Number(priceRange.min.value) : null;
            currentFilters.price.max = priceRange.max.value ? Number(priceRange.max.value) : null;
            currentFilters.page = 1;
            const filtered = filterProducts();
            renderProducts(filtered);
            updateProductCount(filtered.length);
        });

        clearFiltersBtn.addEventListener('click', function() {
            // Reset all filters
            currentFilters = {
                search: '',
                categories: [],
                brands: [],
                conditions: [],
                price: {
                    min: null,
                    max: null
                },
                sort: 'recommended',
                page: 1
            };

            // Reset UI
            searchInput.value = '';
            sortSelect.value = 'recommended';
            filterInputs.forEach(input => input.checked = false);
            priceRange.min.value = '';
            priceRange.max.value = '';

            // Update products
            const filtered = filterProducts();
            renderProducts(filtered);
            updateProductCount(filtered.length);
        });

        // Pagination
        paginationBtns.forEach(btn => {
            if (!btn.classList.contains('prev') && !btn.classList.contains('next')) {
                btn.addEventListener('click', function() {
                    document.querySelector('.page-btn.active').classList.remove('active');
                    this.classList.add('active');
                    currentFilters.page = Number(this.textContent);
                    const filtered = filterProducts();
                    renderProducts(filtered);
                });
            }
        });

        // Initialize products
        const initialProducts = filterProducts();
        renderProducts(initialProducts);
        updateProductCount(initialProducts.length);
    }

    // Helper function for debouncing
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func.apply(this, args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // Initialize catalog if we're on the catalog page
    if (document.querySelector('.catalog-section')) {
        initCatalog();
    }
});