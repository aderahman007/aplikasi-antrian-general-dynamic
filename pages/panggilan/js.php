<!-- DataTables -->
<script src="assets/vendor/js/datatables.min.js" type="text/javascript"></script>
<!-- Responsivevoice -->

<script type="text/javascript">
    var table = {};
    $(document).ready(function() {
        var loket = JSON.parse(localStorage.getItem('_loket'));
        // Get type antrian pada loket
        let loketParse = JSON.parse(list_loket);
        let indexLoket = loketParse.map(object => object.no_loket).indexOf(loket.no_loket);
        let typeAntrian = loketParse[indexLoket].handle_type_antrian;

        let listTypeAntrian = JSON.parse(list_type_antrian);

        // Koneksi websocket
        var is_open = false;

        // Ubah alamat ip websocket
        var conn = new WebSocket('ws://' + '<?= getenv('IP_SERVER') ?>' + ':8081');
        conn.onopen = function(e) {
            console.log("Connection established!");
            is_open = true;
        };

        $(".namaLoket").html(loket.nama_loket);

        // Jumlah antrian
        let jumlahAntrianHtml = ``;
        typeAntrian.forEach(function(element, index) {
            let type = element.toLowerCase();
            let indexTypeAntrianByCode = listTypeAntrian.map(object => object.code_antrian).indexOf(element);
            jumlahAntrianHtml += `<div class="d-flex justify-content-between">
                            <p class="mb-0"> <i class="bi bi-check2-circle text-success"></i> Antrian ` + listTypeAntrian[indexTypeAntrianByCode].type_antrian + ` <span id="type-antrian-jumlah-` + type + `"></span></p>
                            <span id="jumlah-antrian-` + type + `" class="fs-9 text-primary fw-bold">-</span>
                        </div>`;
        });
        $('#jumlah-antrian-list').html(jumlahAntrianHtml);

        // Antrian sekarang
        let antrianSekarangHtml = ``;
        typeAntrian.forEach(function(element, index) {
            let type = element.toLowerCase();
            let indexTypeAntrianByCode = listTypeAntrian.map(object => object.code_antrian).indexOf(element);
            antrianSekarangHtml += `<div class="d-flex justify-content-between">
                                <p class="mb-0"> <i class="bi bi-check2-circle text-success"></i> Antrian ` + listTypeAntrian[indexTypeAntrianByCode].type_antrian + ` <span id="type-antrian-sekarang-` + type + `"></span></p>
                                <span id="antrian-sekarang-` + type + `" class="fs-9 text-info fw-bold">-</span>
                            </div>`;
        });
        $('#antrian-sekarang-list').html(antrianSekarangHtml);

        // Antrian selanjutnya
        let antrianSelanjutnyaHtml = ``;
        typeAntrian.forEach(function(element, index) {
            let type = element.toLowerCase();
            let indexTypeAntrianByCode = listTypeAntrian.map(object => object.code_antrian).indexOf(element);
            antrianSelanjutnyaHtml += `<div class="d-flex justify-content-between">
                                <p class="mb-0"> <i class="bi bi-check2-circle text-success"></i> Antrian ` + listTypeAntrian[indexTypeAntrianByCode].type_antrian + ` <span id="type-antrian-selanjutnya-` + type + `"></span></p>
                                <span id="antrian-selanjutnya-` + type + `" class="fs-9 text-warning fw-bold">-</span>
                            </div>`;
        });
        $('#antrian-selanjutnya-list').html(antrianSelanjutnyaHtml);

        // Sisa Antrian
        let sisaAntrianHtml = ``;
        typeAntrian.forEach(function(element, index) {
            let type = element.toLowerCase();
            let indexTypeAntrianByCode = listTypeAntrian.map(object => object.code_antrian).indexOf(element);
            sisaAntrianHtml += `<div class="d-flex justify-content-between">
                                <p class="mb-0"> <i class="bi bi-check2-circle text-success"></i> Antrian ` + listTypeAntrian[indexTypeAntrianByCode].type_antrian + ` <span id="type-sisa-antrian-` + type + `"></span></p>
                                <span id="sisa-antrian-` + type + `" class="fs-9 text-danger fw-bold">-</span>
                            </div>`;
        });
        $('#sisa-antrian-list').html(sisaAntrianHtml);

        // Table panggilan
        let tablePanggilanHtml = ``;
        typeAntrian.forEach(function(element, index) {
            let type = element.toLowerCase();
            let indexTypeAntrianByCode = listTypeAntrian.map(object => object.code_antrian).indexOf(element);
            tablePanggilanHtml += `<div class="col">
                <div class="card border-0 shadow-sm">
                    <div class="card-header text-center fw-bold">
                        <h4>` + listTypeAntrian[indexTypeAntrianByCode].type_antrian + `</h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table id="tabel-antrian-` + type + `" class="table table-bordered table-striped table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nomor Antrian</th>
                                        <th>Status</th>
                                        <th>Panggil</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>`;
        });
        $('#table-panggilan').html(tablePanggilanHtml);

        const get_actions = () => {
            // Get jumlah antrian
            $.ajax({
                url: 'pages/panggilan/action.php',
                method: 'GET',
                data: {
                    type: 'get_jumlah_antrian'
                },
                async: false,
                cache: false,
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        if (result.data.length > 0) {
                            result.data.forEach(function(element, index) {
                                $('#jumlah-antrian-' + element.code_antrian.toLowerCase()).html(element.jumlah);
                            });
                        }
                    }
                }
            });

            // Get antrian sekarang
            $.ajax({
                url: 'pages/panggilan/action.php',
                method: 'GET',
                data: {
                    type: 'get_antrian_sekarang'
                },
                async: false,
                cache: false,
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        if (result.data.length > 0) {
                            result.data.forEach(function(element, index) {
                                $('#antrian-sekarang-' + element.code_antrian.toLowerCase()).html(element.code_antrian + element.no_antrian);
                            });
                        }
                    }
                }
            });

            // Get antrian selanjutnya
            $.ajax({
                url: 'pages/panggilan/action.php',
                method: 'GET',
                data: {
                    type: 'get_antrian_selanjutnya'
                },
                async: false,
                cache: false,
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        if (result.data.length > 0) {
                            result.data.forEach(function(element, index) {
                                $('#antrian-selanjutnya-' + element.code_antrian.toLowerCase()).html(element.code_antrian + element.no_antrian);
                            });
                        }
                    }
                }
            });

            // Get sisa antrian
            $.ajax({
                url: 'pages/panggilan/action.php',
                method: 'GET',
                data: {
                    type: 'get_sisa_antrian'
                },
                async: false,
                cache: false,
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        if (result.data.length > 0) {
                            result.data.forEach(function(element, index) {
                                $('#sisa-antrian-' + element.code_antrian.toLowerCase()).html(element.jumlah);
                            });
                        }
                    }
                }
            });
        }

        // menampilkan data antrian menggunakan DataTables
        $(document).on('click', '#triggerClickTable', function(e) {
            typeAntrian.forEach(function(element, index) {
                table[element.toLowerCase()] = $('#tabel-antrian-' + element.toLowerCase()).DataTable({
                    "lengthChange": false, // non-aktifkan fitur "lengthChange"
                    "searching": false, // non-aktifkan fitur "Search"
                    "bInfo": false,
                    "ajax": "pages/panggilan/action.php?type=list_antrian&type_antrian=" + element, // url file proses tampil data dari database
                    // menampilkan data,
                    "columns": [{
                            "data": "no_antrian",
                            "width": '200px',
                            "orderable": false,
                            "searchable": false,
                            "className": 'text-center',
                            render: function(data) {
                                return '<b>' + data + '</b>'
                            }
                        },
                        {
                            "data": "status",
                            "visible": false
                        },
                        {
                            "data": null,
                            "orderable": false,
                            "searchable": false,
                            "width": '100px',
                            "className": 'text-center',
                            "render": function(data, type, row) {
                                // jika tidak ada data "status"
                                if (data["status"] === "") {
                                    // sembunyikan button panggil
                                    var btn = "-";
                                }
                                // jika data "status = 0"
                                else if (data["status"] === "0") {
                                    // tampilkan button panggil
                                    var btn = "<button class=\"btn btn-success btn-sm rounded-circle\"><i class=\"bi-mic-fill\"></i></button>";
                                }
                                // jika data "status = 1"
                                else if (data["status"] === "1") {
                                    // tampilkan button ulangi panggilan
                                    var btn = "<button class=\"btn btn-secondary btn-sm rounded-circle\"><i class=\"bi-mic-fill\"></i></button>";
                                };
                                return btn;
                            }
                        },
                    ],
                    "order": [
                        [0, "desc"] // urutkan data berdasarkan "no_antrian" secara descending
                    ],
                    "iDisplayLength": 10, // tampilkan 10 data per halaman
                });

                // panggilan antrian dan update data
                $('#tabel-antrian-' + element.toLowerCase() + ' tbody').on('click', 'button', function() {
                    // ambil data dari datatables 
                    var data = table[element.toLowerCase()].row($(this).parents('tr')).data();
                    // buat variabel untuk menampilkan data "id"
                    var id = data["id"];

                    if (is_open) {
                        conn.send(JSON.stringify({
                            no_antrian: data["no_antrian"],
                            loket: loket.nama_loket
                        }));
                    }

                    // proses update data
                    $.ajax({
                        url: "pages/panggilan/action.php", // url file proses update data
                        type: "GET", // mengirim data dengan method POST
                        // tentukan data yang dikirim
                        dataType: 'json',
                        data: {
                            type: 'update_antrian',
                            id: id
                        },
                        async: false,
                        cache: false,
                        success: function(data) {
                            console.log(data);
                        }
                    });
                });
            });
        });

        $('#triggerClickTable').trigger('click');

        get_actions();
        // auto reload data antrian setiap 1 detik untuk menampilkan data secara realtime
        setInterval(function() {
            get_actions();
            typeAntrian.forEach(function(element, index) {
                table[element.toLowerCase()].ajax.reload(null, false);
            });
        }, 1000);
    });
</script>