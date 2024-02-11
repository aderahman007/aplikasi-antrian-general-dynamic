<!-- Get API Key -> https://responsivevoice.org/ -->
<script src="assets/vendor/js/responsivevoice.js" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        // buat variabel untuk menampilkan audio bell antrian
        var bell = document.getElementById('tingtung');
        var queuePanggil = [];
        var currentPanggil = 0;
        var isPlay = false;

        // Get antrian sekarang
        const get_antrian = () => $.ajax({
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