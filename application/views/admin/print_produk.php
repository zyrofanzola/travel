<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Order Detail</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>

    <div class="container-fluid">

        <h4>
            <div class="btn btn-sm btn-success">No. Invoice: <?= $invoice->id ?></div>
        </h4>

        <table class="table table-bordered table-hover">

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

        <script type="text/javascript">
            window.print();
        </script>

</body>

</html>