  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?php echo (uri_string() == '') ? "" : "collapsed" ?>" href="/katalog">
          <i class="bi bi-grid"></i>
          <span>Catalog</span>
        </a>
      </li><!-- End Dashboard Nav -->

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
            <span>Product Setting</span>
          </a>
        </li><!-- End Product Nav -->
      <?php
      }
      ?>

      <li class="nav-item">
          <a class="nav-link <?php echo (uri_string() == 'history') ? "" : "collapsed" ?>" href="history">
              <i class="bi bi-clock"></i>
              <span>History</span>
          </a>
      </li><!-- End Profile Nav -->

    </ul>

  </aside><!-- End Sidebar-->