<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_produk"><i class="fas fa-plus fa-sm"></i> Add Product</button>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock</th>
            <th colspan="3">Action</th>
        </tr>

        <?php $no = 1;
        foreach ($produk as $pdk) : ?>

            <tr>
                <td><?= $no++ ?></td>
                <td><?= $pdk->nama_produk ?></td>
                <td><?= $pdk->keterangan ?></td>
                <td><?= $pdk->harga ?></td>
                <td><?= $pdk->stok ?></td>
                <!-- <td>
                    <div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>
                </td>
                -->
                <td>

                    <?= anchor('admin/edit/' . $pdk->id_produk, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?>

                </td>
                <td>
                    <!-- anchor(Controller/method/) -->
                    <?= anchor('admin/hapus/' . $pdk->id_produk, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>

                </td>
            </tr>

        <?php endforeach; ?>

    </table>


</div>

<!-- Modal -->
<div class="modal fade" id="tambah_produk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() . 'admin/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="nama_produk" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>About Product</label>
                        <input type="text" name="keterangan" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="harga" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Stock</label>
                        <input type="text" name="stok" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Product Image</label><br>
                        <input type="file" name="gambar" class="form-control">
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->