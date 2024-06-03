<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>Id Invoice</th>
            <th>Name</th>
            <th>Shipping Address</th>
            <th>Ordered Date</th>
            <th>Payment limit</th>
            <th>Action</th>
        </tr>
        <?php foreach ($invoice as $inv) : ?>
            <tr>
                <td><?= $inv->id; ?></td>
                <td><?= $inv->nama; ?></td>
                <td><?= $inv->alamat; ?></td>
                <td><?= $inv->tgl_pesan; ?></td>
                <td><?= $inv->batas_bayar; ?></td>
                <td>
                    <?= anchor('admin/detail/' . $inv->id, '<div class="btn btn-sm btn-primary">Detail</div>') ?>

                </td>
            </tr>

        <?php endforeach; ?>
    </table>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->