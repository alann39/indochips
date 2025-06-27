<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Second Chance - Curated Pre-loved Products</title>    
    <link href="assets/images/Alann.works Logo.png" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
      <!-- Template CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/navbar.css">
    <link rel="stylesheet" href="/assets/css/mobile-menu.css">
</head>
<body>    <!-- Header Section -->
    <header>
        <div class="container">
            <nav class="navbar">
                <div class="d-flex align-items-center justify-content-between w-100">
                    <!-- Left side: Logo -->
                    <div class="d-flex align-items-center">
                        <a href="/" class="logo d-flex align-items-center gap-2">
                            <img src="/assets/images/logo-indochips.png" alt="SCND Logo" width="32">
                            <span>Indochips</span>
                        </a>
                    </div>
                    
                    <!-- Center: Navigation Links -->
                    <div class="nav-links d-none d-lg-flex align-items-center">
                        <a href="/" class="nav-link">Home</a>
                        <a href="/katalog" class="nav-link">Catalog</a>
                        <a href="#" class="nav-link">Category</a>
                    </div>
                    
                    <!-- Right side: Icons -->
                    <div class="nav-icons d-flex align-items-center">
                        <a href="/home" class="nav-icon" title="Search">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        <div class="dropdown">
                            <a href="#" class="nav-icon dropdown-toggle" data-bs-toggle="dropdown" title="Account">
                                <i class="fa-solid fa-user"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="/history">
                                    <i class="fa-solid fa-history me-2"></i>History
                                </a></li>
                                <li><a class="dropdown-item" href="/cart">
                                    <i class="fa-solid fa-shopping-cart me-2"></i>My Cart
                                </a></li>
                                <li><hr class="dropdown-divider"></li>
                                <?php if (session('isLoggedIn')): ?>
                                <li><a class="dropdown-item text-danger" href="/logout">
                                    <i class="fa-solid fa-sign-out-alt me-2"></i>Logout
                                </a></li>
                                <?php else: ?>
                                <li><a class="dropdown-item text-primary" href="/login">
                                    <i class="fa-solid fa-sign-in-alt me-2"></i>Login
                                </a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <a href="/cart" class="nav-icon position-relative" title="Cart">
                            <i class="fa-solid fa-shopping-cart"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger cart-count-badge" style="display: none;">
                                0
                            </span>
                        </a>
                        <!-- Mobile Menu Toggle -->
                        <button class="navbar-toggler d-lg-none ms-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
                            <i class="fa-solid fa-bars"></i>
                        </button>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Mobile Menu -->
        <div class="offcanvas offcanvas-end" id="mobileMenu">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <div class="mobile-nav-links">
                    <a href="/" class="nav-link">Home</a>
                    <a href="/catalog" class="nav-link">Catalog</a>
                    <a href="/cart" class="nav-link">Cart</a>
                    <a href="/product" class="nav-link">Product</a>
                    <a href="/profile" class="nav-link">Profile</a>
                    <?php if (!session('isLoggedIn')): ?>
                    <a href="/register" class="nav-link text-primary">Register</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Every product deserves a second chance.</h1>
            <p class="hero-description">Discover curated pre-loved pieces that combine quality, sustainability, and style—all at accessible prices.</p>
            <?php if (!session('isLoggedIn')): ?>
                <a href="/register" class="btn btn-primary btn-lg">Register</a>
            <?php else: ?>
                <a href="/katalog" class="btn btn-primary btn-lg">Explore Collection</a>
            <?php endif; ?>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="features">
        <div class="container">
            <h2 class="section-title">Featured Finds</h2>
            <div class="product-grid">
                <!-- Product 1 -->
                <div class="product-card" onclick="addToCart(1)">
                    <span class="product-tag">Just In</span>
                    <img src="https://images.unsplash.com/photo-1625591339971-4c9a87a66871?auto=format&fit=crop&w=600&q=80" alt="Vintage Leather Jacket" class="product-image">
                    <div class="product-info">
                        <h3 class="product-title">Vintage Leather Jacket</h3>
                        <div class="product-price">
                            <span>$120</span>
                            <span class="original-price">$300</span>
                        </div>
                    </div>
                </div>
                
                <!-- Product 2 -->
                <div class="product-card" onclick="addToCart(2)">
                    <span class="product-tag">Verified Quality</span>
                    <img src="https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&w=600&q=80" alt="Mid-Century Side Table" class="product-image">
                    <div class="product-info">
                        <h3 class="product-title">Mid-Century Side Table</h3>
                        <div class="product-price">
                            <span>$89</span>
                            <span class="original-price">$250</span>
                        </div>
                    </div>
                </div>
                
                <!-- Product 3 -->
                <div class="product-card" onclick="addToCart(3)">
                    <span class="product-tag">Loved Again</span>
                    <img src="https://images.unsplash.com/photo-1600003263720-95b45a4035d5?auto=format&fit=crop&w=600&q=80" alt="Refurbished iPad Pro" class="product-image">
                    <div class="product-info">
                        <h3 class="product-title">Refurbished iPad Pro</h3>
                        <div class="product-price">
                            <span>$399</span>
                            <span class="original-price">$799</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories">
        <div class="container">
            <h2 class="section-title">Shop By Category</h2>
            <div class="category-grid">
                <!-- Category 1 -->
                <div class="category-card">
                    <img src="https://images.unsplash.com/photo-1496747611176-843222e1e57c?auto=format&fit=crop&w=600&q=80" alt="Fashion" class="category-image">
                    <div class="category-title">
                        <h3>Fashion</h3>
                    </div>
                </div>
                
                <!-- Category 2 -->
                <div class="category-card">
                    <img src="https://images.unsplash.com/photo-1526738549149-8e07eca6c147?auto=format&fit=crop&w=600&q=80" alt="Electronics" class="category-image">
                    <div class="category-title">
                        <h3>Electronics</h3>
                    </div>
                </div>
                
                <!-- Category 3 -->
                <div class="category-card">
                    <img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=600&q=80" alt="Furniture" class="category-image">
                    <div class="category-title">
                        <h3>Furniture</h3>
                    </div>
                </div>
                
                <!-- Category 4 -->
                <div class="category-card">
                    <img src="https://images.unsplash.com/photo-1567225557594-88d73e55f2cb?auto=format&fit=crop&w=600&q=80" alt="Lifestyle" class="category-image">
                    <div class="category-title">
                        <h3>Lifestyle</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Section -->
    <section class="why-choose">
        <div class="container">
            <h2 class="section-title">Why Choose SCND</h2>
            <div class="values">
                <!-- Value 1 -->
                <div class="value-card">
                    <div class="value-icon"><i class="fa-solid fa-leaf"></i></div>
                    <h3>Sustainable Shopping</h3>
                    <p>Every purchase extends a product's lifecycle and reduces waste, making a positive environmental impact.</p>
                </div>
                
                <!-- Value 2 -->
                <div class="value-card">
                    <div class="value-icon"><i class="fa-solid fa-medal"></i></div>
                    <h3>Verified Quality</h3>
                    <p>All items undergo thorough inspection and cleaning before being added to our collection.</p>
                </div>
                
                <!-- Value 3 -->
                <div class="value-card">
                    <div class="value-icon"><i class="fa-solid fa-sack-dollar"></i></div>
                    <h3>Affordable Prices</h3>
                    <p>Access premium brands and products at a fraction of their original retail price.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- New Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <h2 class="testimonial-heading">Loved by Customers</h2>
            <p class="testimonial-subtitle">See what others are saying about our premium pre-loved products</p>
            
            <div class="testimonial-slider">
                <div class="quote-mark">
                    <i class="fa-solid fa-quote-left"></i>
                </div>
                
                <div class="testimonial-wrapper">
                    <!-- Testimonial 1 -->
                    <div class="testimonial-slide active" data-index="0">
                        <div class="testimonial-card">
                            <div class="testimonial-header">
                                <div class="user-info">
                                    <img src="https://i.pravatar.cc/60?img=3" alt="Sophia K." class="user-avatar">
                                    <div class="user-details">
                                        <h4 class="user-name">Sophia K.</h4>
                                        <p class="user-position">Fashion Designer, NYC</p>
                                    </div>
                                </div>
                                <div class="rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                            <p class="testimonial-text">"I found a designer jacket I've been eyeing for years at less than half the retail price. The condition is impeccable—you'd never know it wasn't brand new. Second Chance has completely changed how I shop for designer pieces!"</p>
                            <div class="testimonial-footer">
                                <span class="verified-badge">Verified Customer</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 2 -->
                    <div class="testimonial-slide" data-index="1">
                        <div class="testimonial-card">
                            <div class="testimonial-header">
                                <div class="user-info">
                                    <img src="https://i.pravatar.cc/60?img=11" alt="Marcus T." class="user-avatar">
                                    <div class="user-details">
                                        <h4 class="user-name">Marcus T.</h4>
                                        <p class="user-position">Interior Designer, Los Angeles</p>
                                    </div>
                                </div>
                                <div class="rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                            <p class="testimonial-text">"SCND has completely changed how I shop. I've furnished half my apartment with their finds and saved thousands while getting better quality than I could afford new. The mid-century pieces I found were in pristine condition and exactly as described."</p>
                            <div class="testimonial-footer">
                                <span class="verified-badge">Verified Customer</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 3 -->
                    <div class="testimonial-slide" data-index="2">
                        <div class="testimonial-card">
                            <div class="testimonial-header">
                                <div class="user-info">
                                    <img src="https://i.pravatar.cc/60?img=5" alt="Elena R." class="user-avatar">
                                    <div class="user-details">
                                        <h4 class="user-name">Elena R.</h4>
                                        <p class="user-position">Tech Blogger, Chicago</p>
                                    </div>
                                </div>
                                <div class="rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                            <p class="testimonial-text">"The verification process gives me peace of mind. I bought a refurbished laptop that works perfectly—and came with a 6-month warranty! The customer service team was incredibly helpful when I had questions about the product's history and condition."</p>
                            <div class="testimonial-footer">
                                <span class="verified-badge">Verified Customer</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 4 -->
                    <div class="testimonial-slide" data-index="3">
                        <div class="testimonial-card">
                            <div class="testimonial-header">
                                <div class="user-info">
                                    <img src="https://i.pravatar.cc/60?img=7" alt="James D." class="user-avatar">
                                    <div class="user-details">
                                        <h4 class="user-name">James D.</h4>
                                        <p class="user-position">Sustainability Consultant, Portland</p>
                                    </div>
                                </div>
                                <div class="rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                            <p class="testimonial-text">"As someone passionate about sustainable living, Second Chance aligns perfectly with my values. Not only am I extending the life of quality items, but I'm also reducing waste. The platform makes it easy to find eco-friendly alternatives to buying new, without sacrificing quality."</p>
                            <div class="testimonial-footer">
                                <span class="verified-badge">Verified Customer</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 5 -->
                    <div class="testimonial-slide" data-index="4">
                        <div class="testimonial-card">
                            <div class="testimonial-header">
                                <div class="user-info">
                                    <img src="https://i.pravatar.cc/60?img=9" alt="Olivia P." class="user-avatar">
                                    <div class="user-details">
                                        <h4 class="user-name">Olivia P.</h4>
                                        <p class="user-position">Student, Boston</p>
                                    </div>
                                </div>
                                <div class="rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                            <p class="testimonial-text">"As a student on a budget, SCND has been a game-changer for me. I've managed to furnish my entire apartment with quality pieces that will last for years, all while staying within my limited budget. The shipping was quick and everything arrived exactly as pictured."</p>
                            <div class="testimonial-footer">
                                <span class="verified-badge">Verified Customer</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-controls">
                    <button class="nav-button prev" aria-label="Previous testimonial">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <button class="nav-button next" aria-label="Next testimonial">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>
            </div>
            
            <div class="testimonial-dots">
                <button class="dot active" data-index="0" aria-label="Go to testimonial 1"></button>
                <button class="dot" data-index="1" aria-label="Go to testimonial 2"></button>
                <button class="dot" data-index="2" aria-label="Go to testimonial 3"></button>
                <button class="dot" data-index="3" aria-label="Go to testimonial 4"></button>
                <button class="dot" data-index="4" aria-label="Go to testimonial 5"></button>
            </div>
        </div>
    </section>

    <!-- Footer Section - New Design -->
    <footer class="footer-dark">
        <div class="footer-signup">
            <div class="footer-image">
                <img src="/assets/images/fear-cat.png" alt="Model with vintage fashion" />
            </div>
            <div class="footer-form">
                <h2>Hey! Interested in staying in the loop, sign-up for our updates. We won't spam you, pinky promise 👌</h2>
                <form class="signup-form">
                    <div class="form-group">
                        <input type="text" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" placeholder="Phone">
                    </div>
                    <div class="form-consent">
                        <label>
                            <input type="checkbox">
                            <span>I'd like to receive drop notifications and offers from Second Chance via email and/or occasional sms & consent to the privacy policy</span>
                        </label>
                    </div>
                    <button type="submit" class="btn-submit">Submit</button>
                </form>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="brand-wrapper">
                <div class="brand-logo">Scnd.</div>
                <div class="brand-avatars">
                    <img src="https://i.pravatar.cc/40?img=3" alt="Team avatar" class="avatar">
                    <img src="https://i.pravatar.cc/40?img=5" alt="Team avatar" class="avatar">
                </div>
            </div>
            
            <div class="footer-legal">
                <a href="/terms-of-service">Terms of services</a>
                <a href="/return-policy">Return policy</a>
                <a href="/terms-and-conditions">Terms and conditions</a>
                <a href="/privacy-policy">Privacy policy</a>
                <a href="/cookie-settings">Cookie Settings</a>
            </div>
            
            <div class="social-links">
                <a href="#" aria-label="Discord"><i class="fa-brands fa-discord"></i></a>
                <a href="#" aria-label="X"><i class="fa-brands fa-twitter"></i></a>
                <a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" aria-label="TikTok"><i class="fa-brands fa-tiktok"></i></a>
            </div>
            
            <div class="copyright">
                © 2025 Second Chance by Alann.
            </div>
        </div>
    </footer>
    
    <!-- JavaScript Files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/main.js"></script>
</body>
</html> 