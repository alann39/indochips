<?php /** @var array $orders, $totalOrders, $totalRevenue, $completedOrders, $pendingOrders, $filterStatus, $search */ ?>
<div class="container" style="padding:2rem;">
    <h2>Admin Order Dashboard</h2>
    <div style="display:flex;gap:2rem;margin-bottom:2rem;">
        <div><b>Total Orders</b><br><?= $totalOrders ?></div>
        <div><b>Total Revenue</b><br>Rp <?= number_format($totalRevenue,0,',','.') ?></div>
        <div><b>Completed Orders</b><br><?= $completedOrders ?></div>
        <div><b>Pending Orders</b><br><?= $pendingOrders ?></div>
    </div>
    <form method="get" style="margin-bottom:1rem;display:flex;gap:1rem;align-items:center;">
        <input type="text" name="search" value="<?= esc($search) ?>" placeholder="Search username..."/>
        <select name="status">
            <option value="">All</option>
            <option value="Pending" <?= $filterStatus=='Pending'?'selected':'' ?>>Pending</option>
            <option value="Completed" <?= $filterStatus=='Completed'?'selected':'' ?>>Completed</option>
            <option value="Failed" <?= $filterStatus=='Failed'?'selected':'' ?>>Failed</option>
        </select>
        <button type="submit">Filter</button>
        <a href="<?= site_url('admin/orders/download') ?>" class="btn btn-success">Download Laporan</a>
    </form>
    <table border="1" cellpadding="8" cellspacing="0" style="width:100%;background:#fff;">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Alamat</th>
                <th>Total Harga</th>
                <th>Ongkir</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($orders as $i => $order): ?>
            <tr>
                <td><?= $i+1 ?></td>
                <td><?= esc($order['username']) ?></td>
                <td><?= esc($order['alamat']) ?></td>
                <td>Rp <?= number_format($order['total_harga'],0,',','.') ?></td>
                <td>Rp <?= number_format($order['ongkir'],0,',','.') ?></td>
                <td>
                    <form method="post" action="<?= site_url('admin/orders/update-status/'.$order['id']) ?>" style="display:inline;">
                        <?= csrf_field() ?>
                        <select name="status" onchange="this.form.submit()">
                            <option value="Pending" <?= $order['status']=='Pending'?'selected':'' ?>>Pending</option>
                            <option value="Completed" <?= $order['status']=='Completed'?'selected':'' ?>>Completed</option>
                            <option value="Failed" <?= $order['status']=='Failed'?'selected':'' ?>>Failed</option>
                        </select>
                    </form>
                </td>
                <td><?= date('d M Y - H:i', strtotime($order['created_at'])) ?></td>
                <td><!-- Action lain jika perlu --></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div> 