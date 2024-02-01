<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
require_once "config/query.php";
session_start();
?>
<!doctype html>
<html lang="en" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aplikasi Antrian General Static">
    <meta name="author" content="Ade Rahman">

    <!-- Title -->
    <title>Aplikasi Antrian General Static</title>

    <!-- Favicon icon -->
    <link href="assets/img/favicon.ico" type="image/x-icon" rel="shortcut icon">

    <!-- Bootstrap CSS -->
    <link href="assets/vendor/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="assets/vendor/css/bootstrap-icons.css" rel="stylesheet">

    <!-- Font -->
    <link href="assets/vendor/css/swap.css" rel="stylesheet">

    <!-- Select2 -->
    <link href="assets/vendor/select2/select2.min.css" rel="stylesheet">
    <link href="assets/vendor/select2/select2-bootstrap-5-theme.min.css" rel="stylesheet">

    <!-- Custom Style -->
    <link rel="stylesheet" href="assets/css/style.css">

    <?php
    if (isset($css)) {
        include 'pages/' . $url . '/css.php';
    }
    ?>
</head>

<body class="d-flex flex-column h-100">
    <?php
    $action = new config\query;
    $query = $action->getSetting();
    // ambil jumlah baris data hasil query
    $rows = mysqli_num_rows($query);

    if ($rows <> 0) {
        $data = mysqli_fetch_assoc($query);
    } else {
        $data = [];
    }
    if (isset($_GET['pages'])) {
        $url = $_GET['pages'];

        switch ($url) {
            case "setting":
                include 'pages/setting/index.php';
                break;
            case "nomor":
                include 'pages/nomor/index.php';
                break;
            case "panggilan":
                include 'pages/panggilan/index.php';
                break;
            case "monitor":
                header('Location: pages/monitor/index.php');
                break;
            default:
                include 'main.php';
                break;
        }
    } else {
        include 'main.php';
    }
    ?>


    <!-- Footer -->
    <footer class="footer mt-auto py-4">
        <div class="container">
            <!-- copyright -->
            <div class="copyright text-center mb-2 mb-md-0">&copy; <?= date('Y') ?> - <a href="https://paperlesshospital.id" target="_blank" class="text-brand text-decoration-none">paperlesshospital.id</a>. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- jQuery Core -->
    <script src="assets/vendor/js/jquery-3.6.0.min.js" type="text/javascript"></script>

    <!-- Popper and Bootstrap JS -->
    <script src="assets/vendor/js/popper.min.js" type="text/javascript"></script>

    <!-- Bootstrap JS -->
    <script src="assets/vendor/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- Select2 JS -->
    <script src="assets/vendor/select2/select2.min.js" type="text/javascript"></script>

    <script>
        $('.tampilAntrian').click(function(data) {
            let localLoket = localStorage.getItem("_loket");

            if (localLoket != null) {
                localStorage.removeItem("_loket");
            }

            let loket = $('#loketAntrian').find(':selected').val();
            let namaLoket = $('#loketAntrian').find(':selected').text();
            if (loket != '' && namaLoket != '') {
                let str = JSON.stringify({
                    "no_loket": loket,
                    nama_loket: namaLoket
                });
                localStorage.setItem("_loket", str);
                window.location.href = "index.php?pages=panggilan"
            } else {
                alert("Silahkan pilih loket terlebih dahulu");
            }
        });
    </script>

    <?php
    if (isset($js)) {
        include 'pages/' . $url . '/js.php';
    }
    ?>

</body>

</html>