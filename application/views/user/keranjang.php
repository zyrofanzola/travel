<div class="container-fluid">
    <h4>Shopping cart</h4>

    <table class="table table-bordered table-stiped table-hover">
        <tr align="center">
            <th>No</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Sub-Total</th>
        </tr>

        <?php $no = 1;
        foreach ($this->cart->contents() as $items) : ?>

            <tr>
                <td><?= $no++ ?></td>
                <td><?= $items['name'] ?></td>
                <td><?= $items['qty'] ?></td>
                <td align="right">Rp. <?= number_format($items['price'], 0, ',', '.') ?></td>
                <td align="right">Rp. <?= number_format($items['subtotal'], 0, ',', '.') ?></td>
            </tr>

        <?php endforeach; ?>

        <tr>
            <td colspan="4"></td>
            <td align="right">Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?></td>
        </tr>

    </table>

    <!-- TOMBOL PADA KERANJANG -->
    <div align="right">
        <a href="<?= base_url('user/hapus_keranjang') ?>">
            <div class="btn btn-sm btn-danger">Delete cart</div>

            <a href="<?= base_url('user/order') ?>">
                <div class="btn btn-sm btn-primary">Continue shopping</div>
            </a>

            <a href="<?= base_url('user/pembayaran') ?>">
                <div class="btn btn-sm btn-success">Pay out</div>
            </a>

        </a>
    </div>


</div>
</div>