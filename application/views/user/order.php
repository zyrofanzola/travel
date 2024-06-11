<!-- Page Heading -->

<!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- SLIDE INDICATOR PRODUK -->

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url('assets/img/banner/CV.KYUU (1).png') ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('assets/img/banner/CV.KYUU (3).png') ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('assets/img/banner/CV.KYUU (4).png') ?>" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- KONTEN PRODUK -->

    <div class="row text-center mt-3">
        <?php foreach ($produk as $pdk) : ?>

            <div class="card ml-5 mb-3" style="width: 16rem;">
                <img src="<?= base_url() . 'assets/img/produk/' . $pdk->gambar ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title mb-1"><?= $pdk->nama_produk; ?></h5>
                    <small><?= $pdk->keterangan; ?></small><br>
                    <span class="badge bg-info text-dark mb-3">Rp. <?= number_format($pdk->harga) ?></span><br>
                    <?= anchor('user/tambah_keranjang/' . $pdk->id_produk, '<div class="btn btn-sm btn-primary">Add to cart</div>') ?>
                    <?= anchor('user/detail/' . $pdk->id_produk, '<div class="btn btn-sm btn-success">Detail</div>') ?>

                </div>
            </div>

        <?php endforeach;  ?>

    </div>
    <br>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->