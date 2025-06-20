<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<body>
    <section class="catalog-section">
        <div class="container">
            <div class="catalog-header">
                <h1>Browse Products</h1>
                <div class="catalog-controls">
                    <div class="search-box">
                        <input type="text" id="searchInput" placeholder="Search products...">
                        <button class="search-btn"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>

            <div class="catalog-layout">
                <!-- Filters Sidebar -->
                <aside class="catalog-filters">
                    <div class="filter-group">
                        <h3>Categories</h3>
                        <div class="filter-options">
                            <label><input type="checkbox" value="phones"> Phones</label>
                            <label><input type="checkbox" value="laptops"> Laptops</label>
                            <label><input type="checkbox" value="tablets"> Tablets</label>
                            <label><input type="checkbox" value="accessories"> Accessories</label>
                        </div>
                    </div>

                    <div class="filter-group">
                        <h3>Price Range</h3>
                        <div class="price-range">
                            <input type="number" id="minPrice" placeholder="Min">
                            <span>-</span>
                            <input type="number" id="maxPrice" placeholder="Max">
                            <button class="btn-apply">Apply</button>
                        </div>
                    </div>

                    <div class="filter-group">
                        <h3>Brand</h3>
                        <div class="filter-options">
                            <label><input type="checkbox" value="apple"> Apple</label>
                            <label><input type="checkbox" value="samsung"> Samsung</label>
                            <label><input type="checkbox" value="oneplus"> OnePlus</label>
                            <label><input type="checkbox" value="google"> Google</label>
                        </div>
                    </div>

                    <div class="filter-group">
                        <h3>Condition</h3>
                        <div class="filter-options">
                            <label><input type="checkbox" value="like-new"> Like New</label>
                            <label><input type="checkbox" value="excellent"> Excellent</label>
                            <label><input type="checkbox" value="good"> Good</label>
                            <label><input type="checkbox" value="fair"> Fair</label>
                        </div>
                    </div>

                    <button class="btn-clear-filters">Clear All Filters</button>
                </aside>

                <!-- Products Grid -->
                <div class="catalog-content">
                    <div class="catalog-topbar">
                        <div class="results-count">
                            Showing <span id="productCount">24</span> results
                        </div>
                        <div class="sort-options">
                            <select id="sortSelect">
                                <option value="recommended">Recommended</option>
                                <option value="price-low">Price: Low to High</option>
                                <option value="price-high">Price: High to Low</option>
                                <option value="newest">Newest First</option>
                            </select>
                        </div>
                    </div>

                    <div class="product-grid">
                        <!-- Product cards will be dynamically populated here -->
                    </div>

                    <div class="pagination">
                        <button class="page-btn prev" disabled><i class="fas fa-chevron-left"></i></button>
                        <div class="page-numbers">
                            <button class="page-btn active">1</button>
                            <button class="page-btn">2</button>
                            <button class="page-btn">3</button>
                            <span class="page-dots">...</span>
                            <button class="page-btn">10</button>
                        </div>
                        <button class="page-btn next"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="/assets/js/main.js"></script>
    <script src="https://kit.fontawesome.com/your-code.js" crossorigin="anonymous"></script>
</body>
<?= $this->endSection() ?>

