  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?php echo (uri_string() == '') ? "" : "collapsed" ?>" href="/">
          <i class="bi bi-grid"></i>
          <span>Home</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link <?php echo (uri_string() == 'catalog') ? "" : "collapsed" ?>" href="/catalog">
          <i class="bi bi-card-list"></i>
          <span>Catalog</span>
        </a>
        
      </li><!-- End Catalog Nav -->

      <li class="nav-item">
        <a class="nav-link <?php echo (uri_string() == 'cart') ? "" : "collapsed" ?>" href="/cart">
          <i class="bi bi-cart"></i>
          <span>Cart</span>
        </a>
      </li><!-- End Cart Nav -->
      
      <?php 
      if (session()->get('role') == 'admin') {
      ?>
        <li class="nav-item">
          <a class="nav-link <?php echo (uri_string() == 'product') ? "" : "collapsed" ?>" href="/product">
            <i class="bi bi-box"></i>
            <span>Product</span>
          </a>
        </li><!-- End Product Nav -->
      <?php
      }
      ?>

    </ul>

  </aside><!-- End Sidebar-->