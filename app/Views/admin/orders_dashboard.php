<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SCND - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <!-- Remixicon for clean minimal icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Google Fonts - Inter for Notion-like UI -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
      :root {
        --bg-color: #ffffff;
        --text-primary: #2d2d2d;
        --text-secondary: #6b7280;
        --accent-color: #6366f1;
        --border-color: #e5e7eb;
        --card-bg: #ffffff;
        --hover-bg: #f3f4f6;
        --success-bg: #ecfdf5;
        --success-text: #047857;
        --pending-bg: #fffbeb;
        --pending-text: #b45309;
        --failed-bg: #fef2f2;
        --failed-text: #b91c1c;
      }
      
      body {
        font-family: 'Inter', sans-serif;
        background-color: #f9fafb;
        color: var(--text-primary);
        line-height: 1.5;
        padding: 0;
        margin: 0;
      }
      
      .main-content {
        padding: 1.5rem;
        width: 100%;
      }
      
      .header {
        padding-bottom: 1.5rem;
        margin-bottom: 2rem;
        border-bottom: 1px solid var(--border-color);
      }
      
      .card {
        background-color: var(--card-bg);
        border-radius: 0.75rem;
        border: 1px solid var(--border-color);
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
        transition: all 0.2s ease;
      }
      
      .card:hover {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.08);
      }
      
      .metric-card {
        padding: 1.75rem;
        text-align: center;
      }
      
      .metric-value {
        font-size: 1.75rem;
        font-weight: 600;
        margin-top: 0.75rem;
        color: var(--accent-color);
      }
      
      .metric-label {
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--text-secondary);
        margin-top: 0.25rem;
      }
      
      .metric-icon {
        font-size: 2rem;
        color: var(--accent-color);
      }
      
      .status-badge {
        padding: 0.35rem 0.85rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        white-space: nowrap;
        min-width: 90px;
        justify-content: center;
        transition: all 0.2s ease;
        cursor: help;
        position: relative;
      }
      
      .status-badge:hover {
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }
      
      .status-success {
        background-color: var(--success-bg);
        color: var(--success-text);
        border: 1px solid #d1fae5;
      }
      
      .status-success:hover {
        background-color: #d1fae5;
        border-color: var(--success-text);
      }
      
      .status-pending {
        background-color: var(--pending-bg);
        color: var(--pending-text);
        border: 1px solid #fed7aa;
      }
      
      .status-pending:hover {
        background-color: #fed7aa;
        border-color: var(--pending-text);
      }
      
      .status-failed {
        background-color: var(--failed-bg);
        color: var(--failed-text);
        border: 1px solid #fecaca;
      }
      
      .status-failed:hover {
        background-color: #fecaca;
        border-color: var(--failed-text);
      }
      
      .table {
        border-collapse: separate;
        border-spacing: 0;
      }
      
      .table thead th {
        background-color: var(--bg-color);
        color: var(--text-secondary);
        font-weight: 500;
        font-size: 0.85rem;
        padding: 0.875rem 1rem;
        border-bottom: 1px solid var(--border-color);
        letter-spacing: 0.025em;
      }
      
      .table td {
        padding: 1rem;
        border-bottom: 1px solid var(--border-color);
        vertical-align: middle;
        font-size: 0.9rem;
      }
      
      .table tbody tr {
        transition: all 0.15s ease;
      }
      
      .table tbody tr:hover {
        background-color: var(--hover-bg);
      }
      
      .search-bar {
        display: flex;
        align-items: center;
        background-color: var(--bg-color);
        border: 1px solid var(--border-color);
        border-radius: 0.5rem;
        padding: 0.625rem 1rem;
        width: 250px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.02);
      }
      
      .search-bar input {
        border: none;
        background: transparent;
        width: 100%;
        outline: none;
        margin-left: 0.5rem;
        font-size: 0.875rem;
        color: var(--text-primary);
      }
      
      .search-bar input::placeholder {
        color: var(--text-secondary);
        opacity: 0.7;
      }
      
      .date-display {
        padding: 0.625rem 1rem;
        background-color: var(--bg-color);
        border-radius: 0.5rem;
        display: inline-flex;
        align-items: center;
        font-size: 0.875rem;
        color: var(--text-secondary);
        border: 1px solid var(--border-color);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.02);
      }
      
      .date-display i {
        margin-right: 0.5rem;
        color: var(--accent-color);
      }
      
      .filters {
        display: flex;
        gap: 0.5rem;
      }
      
      .filter-btn {
        background-color: var(--bg-color);
        border: 1px solid var(--border-color);
        border-radius: 0.5rem;
        padding: 0.625rem 1.25rem;
        font-size: 0.875rem;
        color: var(--text-secondary);
        cursor: pointer;
        transition: all 0.2s ease;
        font-weight: 500;
      }
      
      .filter-btn:hover {
        background-color: var(--hover-bg);
        color: var(--accent-color);
      }
      
      .filter-btn.active {
        background-color: var(--accent-color);
        color: white;
        border-color: var(--accent-color);
      }
      
      .refresh-btn, .download-btn {
        background-color: var(--bg-color);
        border: 1px solid var(--border-color);
        border-radius: 0.5rem;
        padding: 0.625rem;
        font-size: 1rem;
        color: var(--text-secondary);
        cursor: pointer;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
      }
      
      .refresh-btn:hover, .download-btn:hover {
        background-color: var(--hover-bg);
        color: var(--accent-color);
        text-decoration: none;
      }
      
      .download-btn:hover {
        color: #10b981; /* Green color for download */
      }
      
      .refresh-btn i, .download-btn i {
        font-size: 1rem;
      }
      
      .refresh-btn.loading i {
        animation: spin 1s linear infinite;
      }
      
      @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
      }
      
      /* Animations */
      .metric-card {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.4s ease;
      }
      
      .table-responsive {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.4s ease-out;
      }
      
      /* Hover effects */
      .metric-card:hover .metric-icon {
        transform: scale(1.1);
      }
      
      .metric-icon {
        transition: all 0.3s ease;
      }
      
      /* Scrollbar styling */
      ::-webkit-scrollbar {
        width: 6px;
        height: 6px;
      }
      
      ::-webkit-scrollbar-track {
        background: var(--bg-color);
      }
      
      ::-webkit-scrollbar-thumb {
        background: var(--border-color);
        border-radius: 3px;
      }
      
      ::-webkit-scrollbar-thumb:hover {
        background: var(--text-secondary);
      }
      
      /* Responsive */
      @media (max-width: 768px) {
        .main-content {
          padding: 1rem;
        }
        
        .top-bar {
          flex-direction: column;
          align-items: flex-start;
          gap: 1rem;
        }
        
        .date-display {
          margin-bottom: 0.5rem;
        }
        
        .d-flex.flex-wrap.justify-content-between {
          gap: 1rem;
        }
        
        .d-flex.flex-wrap.gap-2 {
          width: 100%;
          flex-direction: column;
          align-items: flex-start;
        }
        
        .search-bar {
          width: 100%;
          margin-right: 0 !important;
          margin-bottom: 0.5rem;
        }
        
        .filters {
          overflow-x: auto;
          padding-bottom: 0.5rem;
          width: 100%;
        }
        
        .filter-btn {
          white-space: nowrap;
        }
        
        .table-responsive {
          margin: 0 -1rem;
        }
        
        .d-flex.gap-3 {
          flex-direction: column;
          gap: 0.5rem !important;
        }
        
        .d-flex.gap-3 .status-badge {
          font-size: 0.65rem;
          padding: 0.15rem 0.4rem;
          min-width: auto;
        }
      }
      
      /* Toast Notification Styles */
      .toast-container {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
      }
      
      .toast {
        background-color: var(--bg-color);
        border: 1px solid var(--border-color);
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        padding: 1rem;
        margin-bottom: 0.5rem;
        min-width: 300px;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        animation: slideIn 0.3s ease-out;
      }
      
      .toast.success {
        border-left: 4px solid #10b981;
      }
      
      .toast.error {
        border-left: 4px solid #ef4444;
      }
      
      .toast-icon {
        font-size: 1.25rem;
      }
      
      .toast.success .toast-icon {
        color: #10b981;
      }
      
      .toast.error .toast-icon {
        color: #ef4444;
      }
      
      .toast-content {
        flex: 1;
      }
      
      .toast-title {
        font-weight: 600;
        font-size: 0.875rem;
        margin-bottom: 0.25rem;
      }
      
      .toast-message {
        font-size: 0.8rem;
        color: var(--text-secondary);
      }
      
      .toast-close {
        background: none;
        border: none;
        color: var(--text-secondary);
        cursor: pointer;
        font-size: 1rem;
        padding: 0;
        line-height: 1;
      }
      
      .status-column {
        min-width: 200px;
      }
      
      /* Action Buttons Styling */
      .action-buttons {
        display: flex;
        gap: 0.25rem;
        justify-content: center;
        align-items: center;
      }
      
      .action-buttons .btn {
        padding: 0.375rem 0.5rem;
        font-size: 0.8rem;
        border-radius: 0.375rem;
        transition: all 0.2s ease;
      }
      
      .action-buttons .btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }
      
      /* Dropdown Styling */
      .dropdown-menu {
        border: 1px solid var(--border-color);
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        padding: 0.5rem 0;
        min-width: 160px;
      }
      
      .dropdown-header {
        font-size: 0.75rem;
        font-weight: 600;
        color: var(--text-secondary);
        padding: 0.5rem 1rem;
        margin: 0;
      }
      
      .dropdown-item {
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
        color: var(--text-primary);
        transition: all 0.2s ease;
        border: none;
        background: none;
        width: 100%;
        text-align: left;
        display: flex;
        align-items: center;
      }
      
      .dropdown-item:hover {
        background-color: var(--hover-bg);
        color: var(--accent-color);
      }
      
      .dropdown-item.active {
        background-color: var(--accent-color);
        color: white;
      }
      
      .dropdown-item.active:hover {
        background-color: var(--accent-color);
        color: white;
      }
      
      .dropdown-divider {
        margin: 0.25rem 0;
        border-color: var(--border-color);
      }
      
      @keyframes slideIn {
        from {
          transform: translateX(100%);
          opacity: 0;
        }
        to {
          transform: translateX(0);
          opacity: 1;
        }
      }
      
      .d-flex.gap-3 .status-badge {
        font-size: 0.65rem;
        padding: 0.15rem 0.4rem;
        min-width: auto;
      }
      
      .action-buttons {
        flex-direction: column;
        gap: 0.5rem;
      }
      
      .action-buttons .btn {
        padding: 0.5rem;
        font-size: 0.9rem;
      }
    </style>
  </head>
  <body>
    <!-- Toast Container -->
    <div class="toast-container" id="toastContainer"></div>
    
    <!-- Main Content -->
    <div class="main-content">
        <div class="header mb-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="fw-bold mb-0">SCND Dashboard</h2>
                    <p class="text-muted mt-1">Overview of all orders</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="date-display">
                        <i class="ri-calendar-line"></i> <?= date("l, d M Y") ?> 
                        <span class="ms-3"><i class="ri-time-line"></i> <span id="jam"></span>:<span id="menit"></span>:<span id="detik"></span></span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Statistics Cards -->
        <div class="row g-4 mb-5">
            <div class="col-md-3 col-sm-6">
                <div class="card metric-card">
                    <div class="d-flex align-items-center justify-content-center" style="height: 60px;">
                        <i class="ri-shopping-cart-2-line metric-icon"></i>
                    </div>
                    <div class="metric-value"><?= $totalOrders ?></div>
                    <div class="metric-label">Total Orders</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card metric-card">
                    <div class="d-flex align-items-center justify-content-center" style="height: 60px;">
                        <i class="ri-money-dollar-circle-line metric-icon"></i>
                    </div>
                    <div class="metric-value">Rp <?= number_format($totalRevenue, 0, ',', '.') ?></div>
                    <div class="metric-label">Total Revenue</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card metric-card">
                    <div class="d-flex align-items-center justify-content-center" style="height: 60px;">
                        <i class="ri-checkbox-circle-line metric-icon"></i>
                    </div>
                    <div class="metric-value"><?= $completedOrders ?></div>
                    <div class="metric-label">Completed Orders</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card metric-card">
                    <div class="d-flex align-items-center justify-content-center" style="height: 60px;">
                        <i class="ri-time-line metric-icon"></i>
                    </div>
                    <div class="metric-value"><?= $pendingOrders ?></div>
                    <div class="metric-label">Pending Orders</div>
                </div>
            </div>
        </div>
        
        <!-- Orders Section Title and Filters -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <div>
                <h5 class="fw-semibold mb-0">Order List</h5>
                <div class="d-flex gap-3 mt-2">
                    <small class="text-muted">
                        <span class="status-badge status-pending" style="font-size: 0.7rem; padding: 0.2rem 0.5rem;">
                            <i class="ri-time-line"></i> Pending: <?= $pendingOrders ?>
                        </span>
                    </small>
                    <small class="text-muted">
                        <span class="status-badge status-success" style="font-size: 0.7rem; padding: 0.2rem 0.5rem;">
                            <i class="ri-checkbox-circle-line"></i> Completed: <?= $completedOrders ?>
                        </span>
                    </small>
                    <small class="text-muted">
                        <span class="status-badge status-failed" style="font-size: 0.7rem; padding: 0.2rem 0.5rem;">
                            <i class="ri-close-circle-line"></i> Failed: <?= $failedOrders ?>
                        </span>
                    </small>
                </div>
            </div>
            <div class="d-flex flex-wrap gap-2 align-items-center">
                <form method="get" class="d-flex gap-2 align-items-center">
                    <div class="search-bar me-2">
                        <i class="ri-search-line"></i>
                        <input type="text" name="search" value="<?= esc($search ?? '') ?>" placeholder="Search orders..." id="searchInput">
                    </div>
                    <div class="filters">
                        <button type="submit" class="filter-btn <?= empty($filterStatus) ? 'active' : '' ?>" name="status" value="">All</button>
                        <button type="submit" class="filter-btn <?= $filterStatus == 'Completed' ? 'active' : '' ?>" name="status" value="Completed">Completed</button>
                        <button type="submit" class="filter-btn <?= $filterStatus == 'Pending' ? 'active' : '' ?>" name="status" value="Pending">Pending</button>
                        <button type="submit" class="filter-btn <?= $filterStatus == 'Failed' ? 'active' : '' ?>" name="status" value="Failed">Failed</button>
                        <button type="button" class="refresh-btn" id="refreshButton" title="Refresh Data">
                            <i class="ri-refresh-line"></i>
                        </button>
                        <a href="<?= site_url('admin/orders/download') ?>" class="download-btn" title="Download as CSV">
                            <i class="ri-download-line"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Orders Table -->
        <div class="card">
            <div class="table-responsive p-3">
                <table class="table align-middle" id="ordersTable">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 5%;">No</th>
                            <th class="text-start" style="width: 15%;">Username</th>
                            <th class="text-start" style="width: 25%;">Alamat</th>
                            <th class="text-end" style="width: 12%;">Total Harga</th>
                            <th class="text-end" style="width: 10%;">Ongkir</th>
                            <th class="text-center" style="width: 10%;">Status</th>
                            <th class="text-center" style="width: 15%;">Date</th>
                            <th class="text-center" style="width: 12%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($orders) && count($orders) > 0): ?>
                            <?php foreach ($orders as $i => $order): ?>
                                <?php
                                // Mapping status numerik ke text dan class
                                $statusMapping = [
                                    0 => [
                                        'text' => 'Pending',
                                        'class' => 'status-pending',
                                        'icon' => 'ri-time-line'
                                    ],
                                    1 => [
                                        'text' => 'Completed',
                                        'class' => 'status-success',
                                        'icon' => 'ri-checkbox-circle-line'
                                    ],
                                    2 => [
                                        'text' => 'Failed',
                                        'class' => 'status-failed',
                                        'icon' => 'ri-close-circle-line'
                                    ]
                                ];
                                
                                $status = $order['status'] ?? 0;
                                $statusInfo = $statusMapping[$status] ?? $statusMapping[0];
                                
                                // Format date
                                $date = new DateTime($order['created_at']);
                                $formattedDate = $date->format('d M Y - H:i');
                                
                                // Format currency
                                $totalHarga = 'Rp ' . number_format($order['total_harga'], 0, ',', '.');
                                $ongkir = 'Rp ' . number_format($order['ongkir'], 0, ',', '.');
                                ?>
                                <tr data-status="<?= strtolower($statusInfo['text']) ?>">
                                    <td class="text-center"><?= $i + 1 ?></td>
                                    <td>
                                        <span class="fw-medium"><?= esc($order['username']) ?></span>
                                    </td>
                                    <td class="text-start">
                                        <?= esc($order['alamat']) ?>
                                    </td>
                                    <td class="text-end">
                                        <?= $totalHarga ?>
                                    </td>
                                    <td class="text-end">
                                        <?= $ongkir ?>
                                    </td>
                                    <td class="text-center">
                                        <span class="status-badge <?= $statusInfo['class'] ?>" 
                                              title="<?= $statusInfo['text'] ?> - <?= $status == 0 ? 'Menunggu proses' : ($status == 1 ? 'Pesanan selesai' : 'Pesanan gagal') ?>">
                                            <i class="<?= $statusInfo['icon'] ?>"></i> <?= $statusInfo['text'] ?>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <?= $formattedDate ?>
                                    </td>
                                    <td class="text-center">
                                        <div class="action-buttons">
                                            <!-- View Details Button -->
                                            <button class="btn btn-sm btn-outline-secondary view-details" 
                                                    data-username="<?= htmlspecialchars($order['username']) ?>"
                                                    data-alamat="<?= htmlspecialchars($order['alamat']) ?>"
                                                    data-total="<?= htmlspecialchars($totalHarga) ?>"
                                                    data-ongkir="<?= htmlspecialchars($ongkir) ?>"
                                                    data-status="<?= htmlspecialchars($statusInfo['text']) ?>"
                                                    data-date="<?= htmlspecialchars($formattedDate) ?>"
                                                    title="View Details">
                                                <i class="ri-eye-line"></i>
                                            </button>
                                            
                                            <!-- Update Status Dropdown -->
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" 
                                                        type="button" 
                                                        data-bs-toggle="dropdown" 
                                                        aria-expanded="false"
                                                        title="Update Status">
                                                    <i class="ri-edit-line"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><h6 class="dropdown-header">Update Status</h6></li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li>
                                                        <form method="post" action="<?= site_url('admin/orders/update-status/' . $order['id']) ?>" style="display: inline;">
                                                            <?= csrf_field() ?>
                                                            <button type="submit" name="status" value="Pending" class="dropdown-item <?= $status == 0 ? 'active' : '' ?>">
                                                                <i class="ri-time-line me-2"></i> Pending
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form method="post" action="<?= site_url('admin/orders/update-status/' . $order['id']) ?>" style="display: inline;">
                                                            <?= csrf_field() ?>
                                                            <button type="submit" name="status" value="Completed" class="dropdown-item <?= $status == 1 ? 'active' : '' ?>">
                                                                <i class="ri-checkbox-circle-line me-2"></i> Completed
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form method="post" action="<?= site_url('admin/orders/update-status/' . $order['id']) ?>" style="display: inline;">
                                                            <?= csrf_field() ?>
                                                            <button type="submit" name="status" value="Failed" class="dropdown-item <?= $status == 2 ? 'active' : '' ?>">
                                                                <i class="ri-close-circle-line me-2"></i> Failed
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center py-4">
                                    <div>
                                        <i class="ri-inbox-line" style="font-size: 3rem; color: var(--text-secondary);"></i>
                                        <p class="mt-2">No orders found</p>
                                    </div>
                                </td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Toast notification function
        function showToast(type, title, message) {
            const container = document.getElementById('toastContainer');
            const toast = document.createElement('div');
            toast.className = `toast ${type}`;
            
            toast.innerHTML = `
                <i class="ri-${type === 'success' ? 'check-line' : 'error-warning-line'} toast-icon"></i>
                <div class="toast-content">
                    <div class="toast-title">${title}</div>
                    <div class="toast-message">${message}</div>
                </div>
                <button class="toast-close" onclick="this.parentElement.remove()">
                    <i class="ri-close-line"></i>
                </button>
            `;
            
            container.appendChild(toast);
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                if (toast.parentElement) {
                    toast.remove();
                }
            }, 5000);
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            waktu();
            
            // Initialize Bootstrap tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
            
            // Check for session flash messages
            <?php if (session()->getFlashdata('success')): ?>
                showToast('success', 'Berhasil!', '<?= session()->getFlashdata('success') ?>');
            <?php endif; ?>
            
            <?php if (session()->getFlashdata('error')): ?>
                showToast('error', 'Error!', '<?= session()->getFlashdata('error') ?>');
            <?php endif; ?>
            
            const refreshButton = document.getElementById('refreshButton');
            refreshButton.addEventListener('click', function() {
                this.classList.add('loading');
                setTimeout(() => {
                    window.location.reload();
                }, 800);
            });
            
            document.querySelectorAll('.view-details').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const username = this.getAttribute('data-username') || 'Unknown';
                    const alamat = this.getAttribute('data-alamat') || 'Address not available';
                    const total = this.getAttribute('data-total') || 'Rp 0';
                    const ongkir = this.getAttribute('data-ongkir') || 'Rp 0';
                    const status = this.getAttribute('data-status') || 'pending';
                    const date = this.getAttribute('data-date') || 'Date not available';
                    
                    const usernameElement = document.getElementById('modal-username');
                    if (usernameElement) usernameElement.textContent = username;
                    
                    const alamatElement = document.getElementById('modal-alamat');
                    if (alamatElement) alamatElement.textContent = alamat;
                    
                    const totalElement = document.getElementById('modal-total');
                    if (totalElement) totalElement.textContent = total;
                    
                    const ongkirElement = document.getElementById('modal-ongkir');
                    if (ongkirElement) ongkirElement.textContent = ongkir;
                    
                    const dateElement = document.getElementById('modal-date');
                    if (dateElement) dateElement.textContent = date;
                    
                    const statusBadge = document.getElementById('modal-status');
                    if (statusBadge) {
                        statusBadge.textContent = status;
                        statusBadge.className = 'status-badge';
                    }
                    
                    if (statusBadge) {
                        const statusLower = status.toLowerCase();
                        if (statusLower === 'completed') {
                            statusBadge.classList.add('status-success');
                            statusBadge.innerHTML = '<i class="ri-checkbox-circle-line"></i> Completed';
                        } else if (statusLower === 'pending') {
                            statusBadge.classList.add('status-pending');
                            statusBadge.innerHTML = '<i class="ri-time-line"></i> Pending';
                        } else {
                            statusBadge.classList.add('status-failed');
                            statusBadge.innerHTML = '<i class="ri-close-circle-line"></i> Failed';
                        }
                    }
                    
                    const orderModal = document.getElementById('orderDetailModal');
                    const modal = new bootstrap.Modal(orderModal);
                    modal.show();
                });
            });
        });

        function waktu() {
            var waktu = new Date();
            setTimeout("waktu()", 1000);
            
            let hours = waktu.getHours().toString().padStart(2, '0');
            let minutes = waktu.getMinutes().toString().padStart(2, '0');
            let seconds = waktu.getSeconds().toString().padStart(2, '0');
            
            document.getElementById("jam").innerHTML = hours;
            document.getElementById("menit").innerHTML = minutes;
            document.getElementById("detik").innerHTML = seconds;
        }
        
        window.addEventListener('load', function() {
            const cards = document.querySelectorAll('.metric-card');
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });
            
            const table = document.querySelector('.table-responsive');
            setTimeout(() => {
                table.style.opacity = '1';
                table.style.transform = 'translateY(0)';
            }, 400);
        });
    </script>

    <!-- Order Detail Modal -->
    <div class="modal fade" id="orderDetailModal" tabindex="-1" aria-labelledby="orderDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0" style="border-radius: 0.75rem; overflow: hidden;">
                <div class="modal-header border-bottom-0 pb-0">
                    <h5 class="modal-title fw-bold" id="orderDetailModalLabel">Order Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-0">
                    <div class="pt-3">
                        <div class="mb-4 text-center">
                            <span class="d-inline-block bg-light rounded-circle p-3 mb-3">
                                <i class="ri-shopping-bag-3-line" style="font-size: 2rem; color: var(--accent-color);"></i>
                            </span>
                            <h6 class="fw-bold mb-0" id="modal-username">Username</h6>
                            <p class="text-muted small" id="modal-date">Date</p>
                        </div>

                        <div class="card border mb-3" style="border-radius: 0.5rem;">
                            <div class="card-body">
                                <h6 class="fw-semibold mb-3">Order Information</h6>
                                
                                <div class="row mb-2">
                                    <div class="col-5 text-muted">Status</div>
                                    <div class="col-7 text-end fw-medium">
                                        <span id="modal-status" class="status-badge"></span>
                                    </div>
                                </div>
                                
                                <div class="row mb-2">
                                    <div class="col-5 text-muted">Total Harga</div>
                                    <div class="col-7 text-end fw-medium" id="modal-total"></div>
                                </div>
                                
                                <div class="row mb-2">
                                    <div class="col-5 text-muted">Ongkir</div>
                                    <div class="col-7 text-end fw-medium" id="modal-ongkir"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <h6 class="fw-semibold mb-2">Alamat Pengiriman</h6>
                            <p class="mb-0 bg-light p-3 rounded" id="modal-alamat" style="font-size: 0.9rem;"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-0">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn" style="background-color: var(--accent-color); color: white;">Print Receipt</button>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html> 