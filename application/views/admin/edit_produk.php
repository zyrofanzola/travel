<!-- Begin Page Content -->
<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>Edit data produk</h3>

    <?php foreach ($produk as $pdk) : ?>

        <form method="post" action="<?= base_url() . 'admin/update' ?>">

            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="nama_produk" class="form-control" value="<?= $pdk->nama_produk ?>">
            </div>

            <div class="form-group">
                <label>Description</label>
                <input type="hidden" name="id_produk" class="form-control" value="<?= $pdk->id_produk ?>">
                <input type="text" name="keterangan" class="form-control" value="<?= $pdk->keterangan ?>">
            </div>

            <div class="form-group">
                <label>Price</label>
                <input type="text" name="harga" class="form-control" value="<?= $pdk->harga ?>">
            </div>

            <div class="form-group">
                <label>Stock</label>
                <input type="text" name="stok" class="form-control" value="<?= $pdk->stok ?>">
            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-3">Save</button>


        </form>

    <?php endforeach; ?>

</div>
<!-- End of Main Content -->