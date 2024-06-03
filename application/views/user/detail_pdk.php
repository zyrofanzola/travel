<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            Product Detail
        </div>
        <div class="card-body">
            <?php foreach ($produk as $pdk) : ?>
                <div class="row">
                    <div class="col-md-4"><img src="<?= base_url() . '/assets/img/produk/' . $pdk->gambar ?>" class="card-img-top"></div>
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td>Product Name</td>
                                <td><strong><?= $pdk->nama_produk ?></strong></td>
                            </tr>
                            <tr>
                                <td>About this product</td>
                                <td><strong><?= $pdk->keterangan ?></strong></td>
                            </tr>
                            <tr>
                                <td>Stock</td>
                                <td><strong><?= $pdk->stok ?></strong></td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td><strong>
                                        <div class="btn btn-sm btn-success">Rp. <?= number_format($pdk->harga, 0, ',', '.') ?></div>
                                    </strong></td>
                            </tr>
                        </table>
                        <?= anchor('user/tambah_keranjang/' . $pdk->id_produk, '<div class="btn btn-sm btn-primary">Add to cart</div>') ?>
                        <?= anchor('user/order/', '<div class="btn btn-sm btn-danger">Go Back</div>') ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->