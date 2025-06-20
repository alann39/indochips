<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<section class="product-detail">
    <div class="container">
        <div class="product-navigation">
            <a href="/catalog" class="back-link">
                <i class="fa-solid fa-arrow-left"></i>
                Back to Catalog
            </a>
        </div>
        
        <div class="product-content">
            <!-- Product Images Gallery -->
            <div class="product-gallery">
                <div class="main-image">
                    <img src="https://via.placeholder.com/600x800" alt="Product Name" id="mainImage">
                </div>
                <div class="thumbnail-gallery">
                    <button class="thumb-image active">
                        <img src="https://via.placeholder.com/150x200" alt="Thumbnail 1">
                    </button>
                    <button class="thumb-image">
                        <img src="https://via.placeholder.com/150x200" alt="Thumbnail 2">
                    </button>
                    <button class="thumb-image">
                        <img src="https://via.placeholder.com/150x200" alt="Thumbnail 3">
                    </button>
                    <button class="thumb-image">
                        <img src="https://via.placeholder.com/150x200" alt="Thumbnail 4">
                    </button>
                </div>
            </div>

            <!-- Product Information -->
            <div class="product-info">
                <div class="product-header">
                    <div class="product-badges">
                        <span class="badge brand-new">Brand New</span>
                        <span class="badge verified">Verified</span>
                    </div>
                    <span class="product-category">Electronics</span>
                    <h1 class="product-title">Premium Wireless Headphones</h1>
                    <div class="product-rating">
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <span class="rating-count">(24 reviews)</span>
                    </div>
                </div>

                <div class="product-pricing">
                    <div class="price-wrapper">
                        <span class="current-price">$249.99</span>
                        <span class="original-price">$299.99</span>
                        <span class="discount-badge">-17%</span>
                    </div>
                    <span class="stock-status in-stock">
                        <i class="fa-solid fa-check"></i> In Stock
                    </span>
                </div>

                <div class="product-description">
                    <p>Experience premium audio quality with these wireless headphones. Features include active noise cancellation, 
                    30-hour battery life, and premium build quality. Perfect for music enthusiasts and professionals alike.</p>
                    
                    <ul class="feature-list">
                        <li><i class="fa-solid fa-check"></i> Active Noise Cancellation</li>
                        <li><i class="fa-solid fa-check"></i> 30-hour Battery Life</li>
                        <li><i class="fa-solid fa-check"></i> Premium Build Quality</li>
                        <li><i class="fa-solid fa-check"></i> Bluetooth 5.0</li>
                    </ul>
                </div>

                <div class="product-options">
                    <div class="color-selector">
                        <label>Color</label>
                        <div class="color-buttons">
                            <button class="color-btn active" style="background-color: #000000" title="Black"></button>
                            <button class="color-btn" style="background-color: #FFFFFF" title="White"></button>
                            <button class="color-btn" style="background-color: #B76E79" title="Rose Gold"></button>
                        </div>
                    </div>

                    <div class="quantity-selector">
                        <label>Quantity</label>
                        <div class="quantity-wrapper">
                            <button class="qty-btn" onclick="updateQuantity(-1)">-</button>
                            <input type="number" value="1" min="1" max="99" id="quantity">
                            <button class="qty-btn" onclick="updateQuantity(1)">+</button>
                        </div>
                    </div>
                </div>

                <div class="product-actions">
                    <button class="btn add-to-cart">
                        <i class="fa-solid fa-shopping-cart"></i>
                        Add to Cart
                    </button>
                    <button class="btn btn-outline buy-now">
                        Buy Now
                    </button>
                    <button class="btn btn-outline wishlist-btn">
                        <i class="fa-regular fa-heart"></i>
                    </button>
                </div>

                <div class="product-meta">
                    <div class="meta-item">
                        <i class="fa-solid fa-truck"></i>
                        <span>Free shipping on orders over $50</span>
                    </div>
                    <div class="meta-item">
                        <i class="fa-solid fa-arrow-rotate-left"></i>
                        <span>30-day return policy</span>
                    </div>
                    <div class="meta-item">
                        <i class="fa-regular fa-credit-card"></i>
                        <span>Secure payment</span>
                    </div>
                    <div class="meta-item">
                        <i class="fa-solid fa-shield"></i>
                        <span>2-year warranty</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>