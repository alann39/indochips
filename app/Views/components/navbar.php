<header>
        <div class="container">
            <nav class="navbar">
                <div class="d-flex align-items-center justify-content-between w-100">
                    <!-- Left side: Logo -->
                    <div class="d-flex align-items-center">
                        <a href="/home" class="logo d-flex align-items-center gap-2">
                            <img src="/assets/images/Alann.works Logo.png" alt="SCND Logo" width="32">
                            <span>SCND</span>
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
