<?php
$list_type_antrian = json_decode($data['list_type_antrian'], true);
?>
<main class="flex-shrink-0">
    <div class="col-md-12" style="background-color:<?= $data['warna_primary'] ? $data['warna_primary'] : '#6B5935' ?>;">
        <div class="row px-3 py-4" style="height: 100%;">
            <div class="col-2">
                <img class="img-fluid d-block mx-auto" src="<?= $data['logo'] && file_exists('assets/img/' . $data['logo']) ? 'assets/img/' . $data['logo'] : 'assets/img/default.png' ?>" alt="Image" class="mr-3" style="max-width: 70px;">
            </div>
            <div class="col-8 text-center text-white">
                <h4 class="card-title"><?= $data['nama_instansi'] ? $data['nama_instansi'] : ''; ?></h4>
                <h6 class="card-text"><?= $data['alamat'] ? $data['alamat'] : ''; ?></h6>
                <p class="card-text">Tlp. <?= $data['telpon'] ? $data['telpon'] : ''; ?>, Email. <?= $data['email'] ? $data['email'] : ''; ?></p>
            </div>
            <div class="col-2">
                <img class="img-fluid d-block mx-auto" src="<?= $data['logo'] && file_exists('assets/img/' . $data['logo']) ? 'assets/img/' . $data['logo'] : 'assets/img/default.png' ?>" alt="Image" class="mr-3" style="max-width: 70px;">
            </div>
        </div>
    </div>
    <div style="height: 5vh;"></div>
    <div class="container">
        <div class="row row-cols-3 justify-content-lg-center">
            <?php if (count($list_type_antrian) > 0) : ?>
                <?php foreach ($list_type_antrian as $lta) : ?>
                    <div class="col mb-4">
                        <div class="px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
                            <!-- judul halaman -->
                            <div class="d-flex align-items-center me-md-auto">
                                <i class="bi-people-fill text-success me-3 fs-3"></i>
                                <h1 class="h5 pt-2"><span class="fw-bold" style="font-size: 24px;">ANTRIAN <?= $lta['type_antrian']; ?></span></h1>
                            </div>
                        </div>

                        <div class="card border-0 shadow-sm">
                            <div class="card-body text-center d-grid p-5">
                                <div class="border border-success rounded-2 py-2 mb-5" style="min-height: 20vh;">
                                    <h3 class="pt-4">ANTRIAN</h3>
                                    <!-- menampilkan informasi jumlah antrian -->
                                    <h1 id="antrian-<?= $lta['code_antrian'] ?>" class="display-1 fw-bold text-success text-center lh-1 pb-2" style="font-family: Arial, Helvetica, sans-serif;"></h1>
                                </div>
                                <!-- button pengambilan nomor antrian -->
                                <a id="insert-<?= $lta['code_antrian'] ?>" data-code_antrian="<?= $lta['code_antrian']; ?>" href="javascript:void(0)" class="btn btn-success btn-block rounded-pill fs-5 px-5 py-4 mb-2">
                                    <i class="bi-person-plus fs-4 me-2"></i> Ambil
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <?php $js = 'js.php'; ?>