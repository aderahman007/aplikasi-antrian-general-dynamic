<script type="text/javascript">
    function extractword(str, start, end) {
        let string = str.substring(
            str.indexOf(start) + 1,
            str.lastIndexOf(end)
        );
        return string;
    }
    $(document).ready(function() {
        // tampilkan jumlah antrian
        $.ajax({
            url: 'pages/nomor/action.php',
            method: 'POST',
            data: {
                type: 'get_antrian'
            },
            async: false,
            cache: false,
            dataType: 'json',
            success: function(result) {
                if (result.success == true) {
                    if (result.data != null) {
                        $.each(result.data, function(index, value) {
                            $("#antrian-" + value.code_antrian).html(`${value.code_antrian}${value.no_antrian}`).fadeIn('slow')
                        });
                    }
                }
            }
        })

        $(document).delegate("a[id^='insert']", "click", function(e) {
            let code_antrian = $(this).data('code_antrian');

            $.ajax({
                url: 'pages/nomor/action.php',
                type: 'POST',
                data: {
                    type: 'create_antrian',
                    code_antrian: code_antrian
                },
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        $.ajax({
                            url: 'pages/nomor/action.php',
                            method: 'POST',
                            data: {
                                type: 'get_antrian'
                            },
                            async: false,
                            cache: false,
                            dataType: 'json',
                            success: function(result) {
                                $.each(result.data, function(index, value) {
                                    $("#antrian-" + value.code_antrian).html(`${value.code_antrian}${value.no_antrian}`).fadeIn('slow')
                                });
                            }
                        });
                    } else {
                        alert('Eits ada masalah nih, hubungi IT Support yaa!');
                    }
                },
                error: function(data) {
                    var loadExtractData = '{' + extractword(data.responseText, '{', '}') + '}';
                    var loadExtractDataParse = JSON.parse(loadExtractData);
                    if (loadExtractDataParse.success == true) {
                        $.ajax({
                            url: 'pages/nomor/action.php',
                            method: 'POST',
                            data: {
                                type: 'get_antrian'
                            },
                            async: false,
                            cache: false,
                            dataType: 'json',
                            success: function(result) {
                                $.each(result.data, function(index, value) {
                                    $("#antrian-" + value.code_antrian).html(`${value.code_antrian}${value.no_antrian}`).fadeIn('slow')
                                });
                                alert(`Antrian anda ${loadExtractDataParse.data.code_antrian}${loadExtractDataParse.data.no_antrian} berhasil diambil, tapi printer bermasalah!`);
                            }
                        });
                    }
                }
            });
        });

    });
</script>