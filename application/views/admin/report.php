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


        </tr>
        <?php foreach ($invoice as $inv) : ?>
            <tr>
                <td><?= $inv->id; ?></td>
                <td><?= $inv->nama; ?></td>
                <td><?= $inv->alamat; ?></td>
                <td><?= $inv->tgl_pesan; ?></td>


            </tr>

        <?php endforeach; ?>
    </table>

    <a class="btn btn-sm btn-danger" href="<?= base_url('admin/print/') . $inv->id ?>" target="_blank"><i class="fa fa-print"></i>Print</a>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->