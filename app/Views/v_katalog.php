<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?php
if (session()->getFlashData('success')): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                html: '<?= session()->getFlashData('success') ?>',
                timer: 1800,
                showConfirmButton: false,
                toast: true,
                position: 'bottom-end',
                customClass: {
                    popup: 'swal2-simple-toast'
                }
            });
        });
    </script>
    <style>
        .swal2-simple-toast {
            min-width: 220px !important;
            max-width: 320px !important;
            font-size: 1rem !important;
            padding: 0.75em 1.2em !important;
        }
        .swal2-icon {
            margin: 0 0.5em 0 0 !important;
        }
        .swal2-html-container {
            margin: 0 !important;
        }
    </style>
<?php endif; ?>
<!-- Table with stripped rows -->
<div class="row">
    <?php foreach ($products as $key => $item) : ?>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <img src="<?php echo base_url() . "assets/images/" . $item['foto'] ?>" alt="..." width="300px">
                    <h5 class="card-title"><?php echo $item['nama'] ?><br><?php echo number_to_currency($item['harga'], 'IDR') ?></h5>
                    <button type="button" class="btn btn-info rounded-pill btn-add-to-cart"
                        data-id="<?= $item['id'] ?>"
                        data-nama="<?= $item['nama'] ?>"
                        data-harga="<?= $item['harga'] ?>"
                        data-foto="<?= $item['foto'] ?>">
                        Buy
                    </button>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
<!-- End Table with stripped rows -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).on('click', '.btn-add-to-cart', function() {
    $.post('/cart', {
        id: $(this).data('id'),
        nama: $(this).data('nama'),
        harga: $(this).data('harga'),
        foto: $(this).data('foto')
    }, function(response) {
        Swal.fire({
            icon: 'success',
            html: 'Product successfully added to cart! (<a href="/cart">View Cart</a>)',
            timer: 1800,
            showConfirmButton: false,
            toast: true,
            position: 'bottom-end',
            customClass: { popup: 'swal2-simple-toast' }
        });
        // Optionally update cart badge here
        if (typeof updateCartCount === 'function') {
            updateCartCount();
        }
    });
});
</script>
<style>
    .swal2-simple-toast {
        min-width: 220px !important;
        max-width: 320px !important;
        font-size: 1rem !important;
        padding: 0.75em 1.2em !important;
    }
    .swal2-icon {
        margin: 0 0.5em 0 0 !important;
    }
    .swal2-html-container {
        margin: 0 !important;
    }
</style>
<?= $this->endSection() ?>