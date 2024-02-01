<?php $css = 'css.php'; ?>
<main class="flex-shrink-0">
    <div id="triggerClickTable"></div>
    <div class="container pt-4">
        <div class="d-flex flex-column flex-md-row px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
            <!-- judul halaman -->
            <div class="d-flex align-items-center me-md-auto">
                <i class="bi-mic-fill text-success me-3 fs-3"></i>
                <h1 class="h5 pt-2">Panggilan Antrian <span class="namaLoket"></span></h1>
            </div>
            <!-- breadcrumbs -->
            <div class="ms-5 ms-md-0 pt-md-3 pb-md-0">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/"><i class="bi-house-fill text-success"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Antrian</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <!-- menampilkan informasi jumlah antrian -->
            <div class="col-md-3 mb-4">
                <div class="card border-primary shadow-sm">
                    <div class="card-header">Jumlah Antrian</div>
                    <div class="card-body" id="jumlah-antrian-list"></div>
                </div>
            </div>
            <!-- menampilkan informasi nomor antrian yang sedang dipanggil -->
            <div class="col-md-3 mb-4">
                <div class="card border-info shadow-sm">
                    <div class="card-header">Antrian Sekarang</div>
                    <div class="card-body" id="antrian-sekarang-list"></div>
                </div>
            </div>
            <!-- menampilkan informasi nomor antrian yang akan dipanggil selanjutnya -->
            <div class="col-md-3 mb-4">
                <div class="card border-warning shadow-sm">
                    <div class="card-header">Antrian Selanjutnya</div>
                    <div class="card-body" id="antrian-selanjutnya-list"></div>
                </div>
            </div>
            <!-- menampilkan informasi jumlah antrian yang belum dipanggil -->
            <div class="col-md-3 mb-4">
                <div class="card border-danger shadow-sm">
                    <div class="card-header">Sisa Antrian</div>
                    <div class="card-body" id="sisa-antrian-list"></div>
                </div>
            </div>
        </div>

        <div class="row row-cols-3 justify-content-lg-center" id="table-panggilan"></div>
    </div>
</main>

<?php
$loket = json_decode($data['list_loket'], true);
$list = array();
if (count($loket) > 0) {
    foreach ($loket as $key_l => $val_l) {
        $list[$key_l]['no_loket'] = $val_l['no_loket'];
        $list[$key_l]['nama_loket'] = $val_l['nama_loket'];
        $list[$key_l]['handle_type_antrian'] = json_decode($val_l['handle_type_antrian']);
    }
}
?>

<script>
    var list_loket = '<?= json_encode($list); ?>';
    var list_type_antrian = '<?= $data['list_type_antrian'] ?>';
</script>
<?php $js = 'js.php'; ?>