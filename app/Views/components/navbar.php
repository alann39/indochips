<header>
        <div class="container">
            <nav class="navbar">
                <div class="d-flex align-items-center justify-content-between w-100">
                    <!-- Left side: Logo -->
                    <div class="d-flex align-items-center">
                        <a href="/" class="logo d-flex align-items-center gap-2">
                            <img src="/assets/images/logo.png" alt="SCND Logo" width="32">
                            <span>SCND</span>
                        </a>
                    </div>
                    
                    <!-- Center: Navigation Links -->
                    <div class="nav-links d-none d-lg-flex align-items-center">
                        <a href="/shop" class="nav-link">Shop</a>
                        <div class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                Categories
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/categories/men">Men</a></li>
                                <li><a class="dropdown-item" href="/categories/women">Women</a></li>
                                <li><a class="dropdown-item" href="/categories/accessories">Accessories</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/categories">View All</a></li>
                            </ul>
                        </div>
                        <a href="/about" class="nav-link">About</a>
                        <div class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                Docs
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/docs/guides">Guides</a></li>
                                <li><a class="dropdown-item" href="/docs/sizing">Sizing</a></li>
                                <li><a class="dropdown-item" href="/docs/shipping">Shipping</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/docs">All Docs</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Right side: Icons -->
                    <div class="nav-icons d-flex align-items-center">
                        <a href="/search" class="nav-icon" title="Search">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        <div class="dropdown">
                            <a href="#" class="nav-icon dropdown-toggle" data-bs-toggle="dropdown" title="Account">
                                <i class="fa-solid fa-user"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="/account/profile">
                                    <i class="fa-solid fa-user-circle me-2"></i>My Profile
                                </a></li>
                                <li><a class="dropdown-item" href="/account/orders">
                                    <i class="fa-solid fa-box me-2"></i>My Orders
                                </a></li>
                                <li><a class="dropdown-item" href="/account/wishlist">
                                    <i class="fa-solid fa-heart me-2"></i>Wishlist
                                </a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/account/settings">
                                    <i class="fa-solid fa-cog me-2"></i>Settings
                                </a></li>
                                <li><a class="dropdown-item text-danger" href="/logout">
                                    <i class="fa-solid fa-sign-out-alt me-2"></i>Logout
                                </a></li>
                            </ul>
                        </div>
                        <a href="/cart" class="nav-icon position-relative" title="Cart">
                            <i class="fa-solid fa-shopping-cart"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
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
                    <a href="/shop" class="nav-link">Shop</a>
                    <a href="/categories" class="nav-link">Categories</a>
                    <a href="/about" class="nav-link">About</a>
                    <a href="/docs" class="nav-link">Documentation</a>
                </div>
            </div>
        </div>
</header>
