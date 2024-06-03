<div class="container-fluid">
    <div class="row">
        <div class="col-md2"></div>
        <div class="col-md8">
            <div class="btn btn-sm btn-success">
                <?php $grand_total = 0;
                if ($keranjang = $this->cart->contents()) {
                    foreach ($keranjang as $item) {
                        $grand_total = $grand_total + $item['subtotal'];
                    }

                    echo "<h5>Total Shopping: Rp. " . number_format($grand_total, 0, ',', '.');
                ?>
            </div><br><br>
            <h3>Enter your shipping address and payment</h3>

            <form method="post" action="<?= base_url('user/proses_pesanan') ?>">

                <div class="form-group">
                    <label>Full name</label>
                    <input type="text" name="nama" placeholder="Your full name" class="form-control">
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="alamat" placeholder="Your address" class="form-control">
                </div>

                <div class="form-group">
                    <label>Phone number</label>
                    <input type="text" name="no_telp" placeholder="Your phone number" class="form-control">
                </div>

                <div class="form-group">
                    <label>Select payment method</label>
                    <select class="form-control">
                        <option>BCA - XXXXX XXXXX</option>
                        <option>BNI - XXXXX XXXXX</option>
                        <option>OVO</option>
                        <option>DANA</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-sm btn-primary">Order</button>

            </form>

        <?php

                } else {
                    echo "<h3>Your shopping cart is empty";
                } ?>

        </div>

        <div class="col-md2"></div>
    </div>

</div>
</div>