<main class="flex-shrink-0">
    <div class="container pt-4">
        <div class="d-flex flex-column flex-md-row px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
            <!-- judul halaman -->
            <div class="d-flex align-items-center me-md-auto">
                <i class="bi-gear-fill text-success me-3 fs-3"></i>
                <h1 class="h5 pt-2">Setting Aplikasi Antrian</h1>
            </div>
            <!-- breadcrumbs -->
            <div class="ms-5 ms-md-0 pt-md-3 pb-md-0">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/"><i class="bi-house-fill text-success"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Setting</li>
                    </ol>
                </nav>
            </div>
        </div>

        <?php if (!isset($_SESSION['username'])) : ?>
            <?php include 'login.php'; ?>
        <?php else : ?>
            <form action="" method="post" id="saveSetting">
                <input type="hidden" name="id" value="<?= $data['id'] ? $data['id'] : ''; ?>">
                <div class="row">
                    <div class="col-8">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header">Informasi Instansi</div>
                            <div class="card-body p-4">
                                <div class="mb-3">
                                    <label for="nama_instansi" class="form-label">Nama Instansi</label>
                                    <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" placeholder="Nama Instansi" value="<?= $data['nama_instansi'] ? $data['nama_instansi'] : ''; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat Lengkap</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat Lengkap" required><?= $data['alamat'] ? $data['alamat'] : ''; ?></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="telpon" class="form-label">Telpon</label>
                                            <input type="text" class="form-control" id="telpon" name="telpon" placeholder="Telpon" value="<?= $data['telpon'] ? $data['telpon'] : ''; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= $data['email'] ? $data['email'] : ''; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="running_text" class="form-label">Running Text</label>
                                    <textarea class="form-control" id="running_text" name="running_text" rows="3" placeholder="Running Text" required><?= $data['running_text'] ? $data['running_text'] : ''; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="youtube_id" class="form-label">YouTube ID</label>
                                    <input type="text" class="form-control" id="youtube_id" name="youtube_id" placeholder="YouTube ID in Url parameter v Exp. U7luoXkcXrg" value="<?= $data['youtube_id'] ? $data['youtube_id'] : ''; ?>" required>
                                </div>
                            </div>
                        </div>
                        <?php
                        $list_type_antrian = $data['list_type_antrian'] ? json_decode($data['list_type_antrian'], true) : [];
                        ?>
                        <div class="card border-0 shadow-sm mt-4">
                            <div class="card-header">Konfigurasi Tipe Antrian</div>
                            <div class="card-body">
                                <?php if (count($list_type_antrian) > 0) : ?>
                                    <?php foreach ($list_type_antrian as $key_lk => $val_lk) : ?>
                                        <div class="row block_row">
                                            <div class="col-11">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="mb-3">
                                                            <?php if ($key_lk == 0) : ?>
                                                                <label class="form-label">Tipe Antrian</label>
                                                            <?php endif ?>
                                                            <input type="text" class="form-control" name="type_antrian[]" placeholder="Type Antrian" value="<?= $val_lk['type_antrian'] ? $val_lk['type_antrian'] : ''; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="mb-3">
                                                            <?php if ($key_lk == 0) : ?>
                                                                <label class="form-label">Kode Antrian</label>
                                                            <?php endif ?>
                                                            <input type="text" class="form-control" name="code_antrian[]" placeholder="Kode Antrian" value="<?= $val_lk['code_antrian'] ? $val_lk['code_antrian'] : ''; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <?php if ($key_lk == 0) : ?>
                                                        <button type="button" class="btn btn-success btn-sm addType" style="margin-top: 35px;"><i class="bi-plus-lg text-white"></i></button>
                                                    <?php else : ?>
                                                        <button type="button" class="btn btn-danger btn-sm mt-1 deleteType"><i class="bi-trash text-white"></i></button>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <div class="row block_row">
                                        <div class="col-11">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">Tipe Antrian</label>
                                                        <input type="text" class="form-control" name="type_antrian[]" placeholder="Tipe Antrian" required>
                                                    </div>
                                                </div>
                                                <div class="col-9">
                                                    <div class="mb-3">
                                                        <label class="form-label">Kode Antrian</label>
                                                        <input type="text" class="form-control" name="code_antrian[]" placeholder="Kode Antrian" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <button type="button" class="btn btn-success btn-sm addType" style="margin-top: 35px;"><i class="bi-plus-lg text-white"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div id="blockType"></div>
                            </div>
                        </div>
                        <?php
                        $list_loket = $data['list_loket'] ? json_decode($data['list_loket'], true) : [];
                        ?>
                        <div class="card border-0 shadow-sm mt-4">
                            <div class="card-header">Konfigurasi Loket</div>
                            <div class="card-body">
                                <?php if (count($list_loket) > 0) : ?>
                                    <?php foreach ($list_loket as $key_lk => $val_lk) : ?>
                                        <div class="row block_row">
                                            <div class="col-11">
                                                <div class="row">
                                                    <div class="col-2">
                                                        <div class="mb-3">
                                                            <?php if ($key_lk == 0) : ?>
                                                                <label class="form-label">Nomor Loket</label>
                                                            <?php endif ?>
                                                            <input type="text" class="form-control form-control-lg" name="no_loket[]" placeholder="Nomor Loket" value="<?= $val_lk['no_loket'] ? $val_lk['no_loket'] : ''; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="mb-3">
                                                            <?php if ($key_lk == 0) : ?>
                                                                <label class="form-label">Nama Loket</label>
                                                            <?php endif ?>
                                                            <input type="text" class="form-control form-control-lg" name="nama_loket[]" placeholder="Nama Loket" value="<?= $val_lk['nama_loket'] ? $val_lk['nama_loket'] : ''; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <?php if ($key_lk == 0) : ?>
                                                                <label class="form-label">Handle Tipe Antrian</label>
                                                            <?php endif ?>
                                                            <select class="form-control form-control-sm handleTypeAntrian" data-selected="<?= str_replace('"', "'", $val_lk['handle_type_antrian']); ?>" name="handle_type_antrian[<?= $key_lk ?>][]" multiple="multiple">
                                                                <?php if (count($list_type_antrian) > 0) : ?>
                                                                    <?php foreach ($list_type_antrian as $lta) : ?>
                                                                        <option value="<?= $lta['code_antrian']; ?>"><?= $lta['type_antrian']; ?></option>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <?php if ($key_lk == 0) : ?>
                                                        <button type="button" class="btn btn-success btn-sm addLoket" data-total_loket="<?= count($list_loket) - 1; ?>" style="margin-top: 35px;"><i class="bi-plus-lg text-white"></i></button>
                                                    <?php else : ?>
                                                        <button type="button" class="btn btn-danger btn-sm mt-1 deleteLoket"><i class="bi-trash text-white"></i></button>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <div class="row block_row">
                                        <div class="col-11">
                                            <div class="row">
                                                <div class="col-2">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nomor Loket</label>
                                                        <input type="text" class="form-control form-control-lg" name="no_loket[]" placeholder="Nomor Loket" required>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nama Loket</label>
                                                        <input type="text" class="form-control form-control-lg" name="nama_loket[]" placeholder="Nama Loket" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Handle Tipe Antrian</label>
                                                        <select class="form-control form-control-sm handleTypeAntrian" data-selected="[]" name="handle_type_antrian[0][]" multiple="multiple">
                                                            <?php if (count($list_type_antrian) > 0) : ?>
                                                                <?php foreach ($list_type_antrian as $lta) : ?>
                                                                    <option value="<?= $lta['type_antrian']; ?>"><?= $lta['type_antrian']; ?></option>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <button type="button" class="btn btn-success btn-sm addLoket" style="margin-top: 35px;"><i class="bi-plus-lg text-white"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div id="blockLoket"></div>
                            </div>
                        </div>
                        <?php $printer = $data['printer'] ? json_decode($data['printer'], true) : []; ?>
                        <div class="card border-0 shadow-sm mt-4">
                            <div class="card-header">Konfigurasi Printer</div>
                            <div class="card-body">

                                <div class="row block_row mx-1 gap-2">
                                    <div class="col-12 border border-success">
                                        <div class="mb-3">
                                            <label class="form-label">Ip / Nama Komputer (Hostname) Printer</label>
                                            <input type="text" class="form-control" name="ip_komputer_printer" value="<?= (!empty($printer['ip_komputer_printer'])) ? $printer['ip_komputer_printer'] : ''; ?>" placeholder="Ip Komputer Printer" required>
                                        </div>
                                    </div>
                                    <div class="col-12 border border-success">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label">Nama Sharing Printer</label>
                                                <input type="text" class="form-control" name="nama_sharing_printer" value="<?= (!empty($printer['nama_sharing_printer'])) ? $printer['nama_sharing_printer'] : ''; ?>" placeholder="Nama Sharing Printer" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 border border-success">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label">Tipe Font No Antrian</label>
                                                        <select class="form-control" name="tipe_font_no_antrian" required>
                                                            <option <?= (!empty($printer['tipe_font_no_antrian']) && $printer['tipe_font_no_antrian'] == 'FONT_A') ? 'selected' : ''; ?> value="FONT_A">FONT_A</option>
                                                            <option <?= (!empty($printer['tipe_font_no_antrian']) && $printer['tipe_font_no_antrian'] == 'FONT_B') ? 'selected' : ''; ?> value="FONT_B">FONT_B</option>
                                                            <option <?= (!empty($printer['tipe_font_no_antrian']) && $printer['tipe_font_no_antrian'] == 'FONT_C') ? 'selected' : ''; ?> value="FONT_C">FONT_C</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label">Lebar Font No Antrian</label>
                                                        <input type="number" class="form-control" name="lebar_font_no_antrian" value="<?= (!empty($printer['lebar_font_no_antrian'])) ? $printer['lebar_font_no_antrian'] : ''; ?>" placeholder="Lebar Font No Antrian" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label">Tinggi Font No Antrian</label>
                                                        <input type="number" class="form-control" name="tinggi_font_no_antrian" value="<?= (!empty($printer['tinggi_font_no_antrian'])) ? $printer['tinggi_font_no_antrian'] : ''; ?>" placeholder="Tinggi Font No Antrian" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 border border-success">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label">Header Struk Antrian <br> <sub class="text-info">Gunakan <b>newLine</b> untuk membuat line baru pada struk</sub></label>
                                                <textarea class="form-control" name="header_struk" rows="2" placeholder="Header Struk Antrian" required><?= (!empty($printer['header_struk'])) ? $printer['header_struk'] : ''; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label"><sub>Tipe Font Header</sub></label>
                                                        <select class="form-control" name="tipe_font_header" required>
                                                            <option <?= (!empty($printer['tipe_font_header']) && $printer['tipe_font_header'] == 'FONT_A') ? 'selected' : ''; ?> value="FONT_A">FONT_A</option>
                                                            <option <?= (!empty($printer['tipe_font_header']) && $printer['tipe_font_header'] == 'FONT_B') ? 'selected' : ''; ?> value="FONT_B">FONT_B</option>
                                                            <option <?= (!empty($printer['tipe_font_header']) && $printer['tipe_font_header'] == 'FONT_C') ? 'selected' : ''; ?> value="FONT_C">FONT_C</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label"><sub>Lebar Font Header</sub></label>
                                                        <input type="number" class="form-control" name="lebar_font_header" value="<?= (!empty($printer['lebar_font_header'])) ? $printer['lebar_font_header'] : ''; ?>" placeholder="Lebar Font Header" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label"><sub>Tinggi Font Header</sub></label>
                                                        <input type="number" class="form-control" name="tinggi_font_header" value="<?= (!empty($printer['tinggi_font_header'])) ? $printer['tinggi_font_header'] : ''; ?>" placeholder="Tinggi Font Header" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 border border-success">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label">Alamat Struk Antrian <br> <sub class="text-info">Gunakan <b>newLine</b> untuk membuat line baru pada struk</sub></label>
                                                <textarea class="form-control" name="alamat_struk" rows="2" placeholder="Alamat Struk Antrian" required><?= (!empty($printer['alamat_struk'])) ? $printer['alamat_struk'] : ''; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label"><sub>Tipe Font Alamat</sub></label>
                                                        <select class="form-control" name="tipe_font_alamat" required>
                                                            <option <?= (!empty($printer['tipe_font_alamat']) && $printer['tipe_font_alamat'] == 'FONT_A') ? 'selected' : ''; ?> value="FONT_A">FONT_A</option>
                                                            <option <?= (!empty($printer['tipe_font_alamat']) && $printer['tipe_font_alamat'] == 'FONT_B') ? 'selected' : ''; ?> value="FONT_B">FONT_B</option>
                                                            <option <?= (!empty($printer['tipe_font_alamat']) && $printer['tipe_font_alamat'] == 'FONT_C') ? 'selected' : ''; ?> value="FONT_C">FONT_C</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label"><sub>Lebar Font Alamat</sub></label>
                                                        <input type="number" class="form-control" name="lebar_font_alamat" value="<?= (!empty($printer['lebar_font_alamat'])) ? $printer['lebar_font_alamat'] : ''; ?>" placeholder="Lebar Font Alamat" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label"><sub>Tinggi Font Alamat</sub></label>
                                                        <input type="number" class="form-control" name="tinggi_font_alamat" value="<?= (!empty($printer['tinggi_font_alamat'])) ? $printer['tinggi_font_alamat'] : ''; ?>" placeholder="Tinggi Font Alamat" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 border border-success">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label">Informasi Struk Antrian<br> <sub class="text-info">Gunakan <b>newLine</b> untuk membuat line baru pada struk</sub></label>
                                                <textarea class="form-control" name="informasi_struk" rows="2" placeholder="Informasi Struk Antrian" required><?= (!empty($printer['informasi_struk'])) ? $printer['informasi_struk'] : ''; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label"><sub>Tipe Font Informasi</sub></label>
                                                        <select class="form-control" name="tipe_font_informasi" required>
                                                            <option <?= (!empty($printer['tipe_font_informasi']) && $printer['tipe_font_informasi'] == 'FONT_A') ? 'selected' : ''; ?> value="FONT_A">FONT_A</option>
                                                            <option <?= (!empty($printer['tipe_font_informasi']) && $printer['tipe_font_informasi'] == 'FONT_B') ? 'selected' : ''; ?> value="FONT_B">FONT_B</option>
                                                            <option <?= (!empty($printer['tipe_font_informasi']) && $printer['tipe_font_informasi'] == 'FONT_C') ? 'selected' : ''; ?> value="FONT_C">FONT_C</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label"><sub>Lebar Font Informasi</sub></label>
                                                        <input type="number" class="form-control" name="lebar_font_informasi" value="<?= (!empty($printer['lebar_font_informasi'])) ? $printer['lebar_font_informasi'] : ''; ?>" placeholder="Lebar Font Informasi" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label"><sub>Tinggi Font Informasi</sub></label>
                                                        <input type="number" class="form-control" name="tinggi_font_informasi" value="<?= (!empty($printer['tinggi_font_informasi'])) ? $printer['tinggi_font_informasi'] : ''; ?>" placeholder="Tinggi Font Informasi" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 border border-success">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label">Footer Struk Antrian<br> <sub class="text-info">Gunakan <b>newLine</b> untuk membuat line baru pada struk</sub></label>
                                                <textarea class="form-control" name="footer_struk" rows="2" placeholder="Footer Struk Antrian" required><?= (!empty($printer['footer_struk'])) ? $printer['footer_struk'] : ''; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label"><sub>Tipe Font Footer</sub></label>
                                                        <select class="form-control" name="tipe_font_footer" required>
                                                            <option <?= (!empty($printer['tipe_font_footer']) && $printer['tipe_font_footer'] == 'FONT_A') ? 'selected' : ''; ?> value="FONT_A">FONT_A</option>
                                                            <option <?= (!empty($printer['tipe_font_footer']) && $printer['tipe_font_footer'] == 'FONT_B') ? 'selected' : ''; ?> value="FONT_B">FONT_B</option>
                                                            <option <?= (!empty($printer['tipe_font_footer']) && $printer['tipe_font_footer'] == 'FONT_C') ? 'selected' : ''; ?> value="FONT_C">FONT_C</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label"><sub>Lebar Font Footer</sub></label>
                                                        <input type="number" class="form-control" name="lebar_font_footer" value="<?= (!empty($printer['lebar_font_footer'])) ? $printer['lebar_font_footer'] : ''; ?>" placeholder="Lebar Font Footer" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label class="form-label"><sub>Tinggi Font Footer</sub></label>
                                                        <input type="number" class="form-control" name="tinggi_font_footer" value="<?= (!empty($printer['tinggi_font_footer'])) ? $printer['tinggi_font_footer'] : ''; ?>" placeholder="Tinggi Font Footer" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header">Styling Monitor</div>
                            <div class="card-body p-4">
                                <div class="row justify-content-center align-items-center">
                                    <img src="<?= $data['logo'] && file_exists('assets/img/' . $data['logo']) ? 'assets/img/' . $data['logo'] : 'assets/img/default.png'; ?>" class="rounded mx-auto d-block mb-3" alt="Logo" width="40px" height="400px">

                                    <div class="mb-3">
                                        <label for="logo" class="form-label">Pilih Logo</label>
                                        <input class="form-control" type="file" id="logo" name="logo">
                                        <input type="hidden" name="nama_logo" value="<?= $data['logo'] ? $data['logo'] : ''; ?>">
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="warna_primary" class="form-label">Warna Primary</label>
                                                <input type="color" class="form-control form-control-color" id="warna_primary" name="warna_primary" value="<?= $data['warna_primary'] ? $data['warna_primary'] : '#563d7c'; ?>" title="Warna Primary" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="warna_secondary" class="form-label">Warna Secondary</label>
                                                <input type="color" class="form-control form-control-color" id="warna_secondary" name="warna_secondary" value="<?= $data['warna_secondary'] ? $data['warna_secondary'] : '#563d7c'; ?>" title="Warna Secondary" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="warna_accent" class="form-label">Warna Accent</label>
                                                <input type="color" class="form-control form-control-color" id="warna_accent" name="warna_accent" value="<?= $data['warna_accent'] ? $data['warna_accent'] : '#563d7c'; ?>" title="Warna Accent" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="warna_background" class="form-label">Warna Background</label>
                                                <input type="color" class="form-control form-control-color" id="warna_background" name="warna_background" value="<?= $data['warna_background'] ? $data['warna_background'] : '#563d7c'; ?>" title="Warna Background" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="warna_text" class="form-label">Warna Text</label>
                                                <input type="color" class="form-control form-control-color" id="warna_text" name="warna_text" value="<?= $data['warna_text'] ? $data['warna_text'] : '#563d7c'; ?>" title="Warna Text" required>
                                            </div>
                                        </div>
                                        <div class="col-6"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center gap-2 mt-4">
                            <button type="submit" class="btn btn-success btn-lg"><i class="bi-save-fill text-white me-3"></i> Simpan</button>
                            <button type="button" id="logout" class="btn btn-danger btn-lg"><i class="bi-box-arrow-right text-white me-3"></i> Logout</button>
                        </div>
                    </div>
                </div>
            </form>
        <?php endif; ?>
    </div>
</main>
<script>
    var type_antrian = '<?= json_encode($list_type_antrian); ?>';
    var parseTypeAntrian = JSON.parse(type_antrian);
</script>

<?php $js = 'js.php'; ?>