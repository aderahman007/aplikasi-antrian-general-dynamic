<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Antrian General Static</title>
    <!-- Favicon icon -->
    <link href="../../assets/img/favicon.ico" type="image/x-icon" rel="shortcut icon">

    <!-- Favicon icon -->
    <link href="../../assets/img/favicon.ico" type="image/x-icon" rel="shortcut icon">

    <!-- Bootstrap CSS -->
    <link href="../../assets/vendor/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="../../assets/vendor/css/bootstrap-icons.css" rel="stylesheet">

    <!-- Font -->
    <link href="../../assets/vendor/css/swap.css" rel="stylesheet">

    <!-- Custom Style -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <style>
        body {
            overflow: hidden;
            font-family: Arial, Helvetica, sans-serif;
        }

        .card-blur {
            background-color: #fdfeff47;
            -webkit-backdrop-filter: blur(5px);
            backdrop-filter: blur(5px);
            border-radius: 10px;
        }

        .row {
            margin: 0px;
        }

        .card {
            border-radius: 0.2rem;
        }

        .card-header {
            background-color: rgba(0, 0, 0, .0) !important;
        }

        .card-footer {
            background-color: rgba(0, 0, 0, .0) !important;
        }

        h5.nama-instansi {
            margin-bottom: 0.1rem;
        }
    </style>
</head>

<?php
$hariIni = new DateTime();
function hariIndo($hariInggris)
{
    switch ($hariInggris) {
        case 'Sunday':
            return 'Minggu';
        case 'Monday':
            return 'Senin';
        case 'Tuesday':
            return 'Selasa';
        case 'Wednesday':
            return 'Rabu';
        case 'Thursday':
            return 'Kamis';
        case 'Friday':
            return 'Jumat';
        case 'Saturday':
            return 'Sabtu';
        default:
            return 'hari tidak valid';
    }
}

require_once "../../config/query.php";
require "../../config/env.php";
$action = new config\query;

$query = $action->getSetting();
// ambil jumlah baris data hasil query
$rows = mysqli_num_rows($query);

if ($rows <> 0) {
    $data = mysqli_fetch_assoc($query);
} else {
    $data = [];
}

$list_type_antrian = (!empty($data['list_type_antrian'])) ? json_decode($data['list_type_antrian'], true) : [];
?>

<body style="background-color:<?= $data['warna_background'] ? $data['warna_background'] : '#6B5935' ?>;">
    <div class="d-flex justify-content-between align-items-center px-3" style="height: 10vh; background-color:<?= $data['warna_primary'] ? $data['warna_primary'] : '#6B5935' ?>;">
        <img class="img-fluid d-block" src="<?= $data['logo'] && file_exists('../../assets/img/' . $data['logo']) ? '../../assets/img/' . $data['logo'] : '../../assets/img/default.png' ?>" alt="Image" class="mr-3" style="max-width: 50px;">
        <div class="text-white text-center">
            <h5 class="nama-instansi"><?= $data['nama_instansi'] ? $data['nama_instansi'] : ''; ?></h5>
            <small>
                Tlp. <?= $data['telpon'] ? $data['telpon'] : ''; ?>, Email. <?= $data['email'] ? $data['email'] : ''; ?>
            </small>
        </div>
        <div style="color:<?= $data['warna_text'] ? $data['warna_text'] : '#fff' ?> ">
            <i class="bi bi-calendar2-check"></i>
            <span id="date"><?= hariIndo(date('l')) . ", " . strftime('%d %B %Y', $hariIni->getTimestamp()); ?></span>
            <br>
            <i class="bi bi-clock-history"></i>
            <span id="time"></span>
        </div>
    </div>
    <div class="d-flex justify-content-between mx-1">
        <div class="col-md-7 p-1">
            <iframe class="rounded embed-responsive-item" width="100%" height="380px" allow="autoplay" src="https://www.youtube.com/embed/<?= $data['youtube_id'] ? $data['youtube_id'] : ''; ?>?rel=0&modestbranding=1&autohide=1&mute=0&showinfo=0&controls=1&loop=1&autoplay=1&playlist=<?= $data['youtube_id'] ? $data['youtube_id'] : ''; ?>">
            </iframe>
        </div>
        <div class="col-md-5 p-1" style="color:<?= $data['warna_text'] ? $data['warna_text'] : '#fff' ?>;">
            <div class="card text-center text-white bg-info" style="height: 380px;">
                <h5 class="card-header">NOMOR ANTRIAN SEKARANG</h5>
                <div class="card-body text-center d-flex justify-content-center align-items-center">
                    <h1 id="antrian-sekarang" class="text-center fw-bold py-0" style="font-size: 140px;">-</h1>
                </div>
                <h5 class="card-footer text-bold namaLoketMonitor fw-bold">-</h5>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center px-1 mb-2">
        <?php
        $bg_color = [
            'bg-primary',
            'bg-warning',
            'bg-success',
            'bg-secondary',
            'bg-danger'
        ];
        $key_bg = 0;
        ?>
        <?php if (count($list_type_antrian) > 0) : ?>
            <?php foreach ($list_type_antrian as $key_lta => $val_lta) : ?>
                <?php
                if ($key_bg != count($bg_color)) {
                    $bg = $bg_color[$key_bg];
                } else {
                    $key_bg = 0;
                    $bg = $bg_color[$key_bg];
                }
                ?>
                <div class="card text-center text-white mx-1 <?= $bg; ?>" style="width: 100%; height: 220px;">
                    <h5 class="card-header"><span class="fw-bold"><?= $val_lta['type_antrian']; ?></span></h5>
                    <div class="card-body">
                        <h1 id="code-antrian-<?= strtolower($val_lta['code_antrian']) ?>" class="text-center fw-bold p-0" style="font-size: 105px;">-</h1>
                    </div>
                </div>
                <?php $key_bg++; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <nav class="navbar" style="height: 10vh; background-color: <?= $data['warna_accent'] ? $data['warna_accent'] : '#fff' ?>;color:<?= $data['warna_text'] ? $data['warna_text'] : '#fff' ?>;font-size:0.7rem;">
        <div class="container-fluid">
            <div class="row" style="width: 100vw;">
                <div class="col-12">
                    <h5 class="scroll-horizontal">
                        <marquee behavior="left" direction="left"><b><?= $data['running_text'] ? $data['running_text'] : ''; ?></b></marquee>
                    </h5>
                </div>
                <div class="col-12">
                    <div class="text-center">
                        Copyright &copy; <?= date('Y') ?> by Paperless Hospital
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- load file audio bell antrian -->
    <audio id="tingtung" src="../../assets/audio/tingtung.mp3"></audio>

    <!-- jQuery Core -->
    <script src="../../assets/vendor/js/jquery-3.6.0.min.js" type="text/javascript"></script>
    <!-- Popper and Bootstrap JS -->
    <script src="../../assets/vendor/js/popper.min.js" type="text/javascript"></script>
    <!-- Bootstrap JS -->
    <script src="../../assets/vendor/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- Get API Key -> https://responsivevoice.org/ -->
    <script src="../../assets/vendor/js/responsivevoice.js" type="text/javascript"></script>

    <script>
        $(document).ready(function() {
            // buat variabel untuk menampilkan audio bell antrian
            var bell = document.getElementById('tingtung');
            var queuePanggil = [];
            var currentPanggil = 0;
            var isPlay = false;

            // Get antrian sekarang
            const get_antrian = () => $.ajax({
                url: '../panggilan/action.php',
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
                                $('#code-antrian-' + element.code_antrian.toLowerCase()).html(element.code_antrian + element.no_antrian).fadeIn('slow');
                            });
                        }
                    }
                }
            });
            get_antrian();
            // auto reload data antrian setiap 1 detik untuk menampilkan data secara realtime
            setInterval(function() {
                get_antrian();
            }, 1000);

            // Ubah alamat ip websocket
            var conn = new WebSocket('ws://' + '<?= getenv('IP_SERVER') ?>' + ':8081');
            conn.onopen = function(e) {
                console.log("Connection established!");
            };

            conn.onmessage = function(e) {
                let panggil = JSON.parse(e.data);
                queuePanggil.push(panggil);
                console.log(queuePanggil);
                if (!isPlay) {
                    panggilAntrian();
                }
            };

            function panggilAntrian() {
                if (queuePanggil.length > 0) {
                    queuePanggil.forEach((value, index) => {
                        if (!isPlay) {
                            isPlay = true;
                            $("#antrian-sekarang").html(value.no_antrian);
                            $(".namaLoketMonitor").html(value.loket);
                            // mainkan suara bell antrian
                            bell.currentTime = 0;
                            bell.pause();
                            bell.play();

                            // set delay antara suara bell dengan suara nomor antrian
                            durasi_bell = bell.duration * 770;

                            // mainkan suara nomor antrian
                            setTimeout(function() {
                                let no_antrian = value.no_antrian
                                let format_no_antrian = no_antrian[0] + ", " + no_antrian.slice(1)
                                responsiveVoice.speak("Nomor Antrian, " + format_no_antrian + ", menuju, " + value.loket, "Indonesian Female", {
                                    rate: 0.9,
                                    pitch: 1,
                                    volume: 1,
                                    onend: () => {
                                        queuePanggil.splice(index, 1);
                                        isPlay = false;
                                        if (queuePanggil.length > 0) {
                                            panggilAntrian();
                                        }
                                    }
                                });
                            }, durasi_bell);
                        }
                    });
                }
            }
        });
    </script>

    <script>
        jam();

        function jam() {
            var e = document.getElementById("time"),
                d = new Date(),
                h,
                m,
                s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());

            e.innerHTML = h + ":" + m + ":" + s;

            setTimeout("jam()", 1000);
        }

        function set(e) {
            e = e < 10 ? "0" + e : e;
            return e;
        }
    </script>
</body>

</html>