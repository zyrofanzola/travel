<!-- Begin Page Content -->
<div class="container-fluid">

    <h4>
        Order Detail <div class="btn btn-sm btn-success">No. Invoice: <?= $invoice->id ?></div>
    </h4>

    <table class="table table-bordered table-hover table-striped">

        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Order quantity</th>
            <th>Price</th>
            <th>Sub-Total</th>
        </tr>

        <?php
        $total = 0;
        foreach ($pesanan as $psn) :
            $subtotal = $psn->jumlah * $psn->harga;
            $total += $subtotal;
        ?>

            <tr>
                <td><?= $psn->id_brg ?></td>
                <td><?= $psn->nama_brg ?></td>
                <td><?= $psn->jumlah ?></td>
                <td><?= number_format($psn->harga, 0, ',', '.') ?></td>
                <td><?= number_format($subtotal, 0, ',', '.') ?></td>
            </tr>

        <?php endforeach; ?>

        <tr>
            <td colspan="4" align="right">Grand Total</td>
            <td align="right">Rp. <?= number_format($total, 0, ',', '.') ?></td>
        </tr>

    </table>

    <a href="<?= base_url('admin/datapesanan') ?>" class="href">
        <div class="btn btn-sm btn-primary">Go Back</div>
    </a>

    <a class="btn btn-sm btn-danger" href="<?= base_url('admin/print/') . $invoice->id ?>" target="_blank"><i class="fa fa-print"></i>Print</a>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->