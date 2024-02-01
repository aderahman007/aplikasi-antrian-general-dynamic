<script type="text/javascript">
    let optionLoket = ``;
    parseTypeAntrian.forEach(function(item, index) {
        optionLoket += `<option value="` + item.type_antrian + `">` + item.code_antrian + `</option>`;
    });

    var totalLoket = 0;

    const htmlType = `<div class="row block_row">
                        <div class="col-11">
                            <div class="row">
                                <div class="col-3">
                                    <div class="mb-3">
                                        <input type="text" class="form-control"  name="type_antrian[]" placeholder="Tipe Antrian" required>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="mb-3">
                                        <input type="text" class="form-control"  name="code_antrian[]" placeholder="Kode Antrian" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="d-flex justify-content-center align-items-center">
                                <button type="button" class="btn btn-danger btn-sm mt-1 deleteType"><i class="bi-trash text-white"></i></button>
                            </div>
                        </div>
                    </div>`;

    $(document).on("click", ".addLoket", function(e) {
        totalLoket = $(this).data('total_loket');
        $(this).data('total_loket', (totalLoket + 1));

        const htmlLoket = `<div class="row block_row">
                        <div class="col-11">
                            <div class="row">
                                <div class="col-2">
                                    <div class="mb-3">
                                        <input type="text" class="form-control"  name="no_loket[]" placeholder="Nomor Loket" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <input type="text" class="form-control"  name="nama_loket[]" placeholder="Nama Loket" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <select class="form-control form-control-sm handleTypeAntrian" data-selected="[]" name="handle_type_antrian[` + (totalLoket + 1) + `][]" multiple="multiple">
                                        ` + optionLoket + `
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="d-flex justify-content-center align-items-center">
                                <button type="button" class="btn btn-danger btn-sm mt-1 deleteLoket"><i class="bi-trash text-white"></i></button>
                            </div>
                        </div>
                    </div>`;
        $("#blockLoket").append(htmlLoket);
        $(".handleTypeAntrian").select2({
            theme: "bootstrap-5",
            placeholder: "Pilih Type Antrian"
        });
    });

    $(document).on("click", ".addType", function(e) {
        $("#blockType").append(htmlType);
    });

    $(document).on("click", ".deleteLoket", function(e) {
        $(this).parents(".block_row").remove();
    });

    $(document).on("click", ".deleteType", function(e) {
        $(this).parents(".block_row").remove();
    });

    $(".handleTypeAntrian").select2({
        theme: "bootstrap-5",
        placeholder: "Pilih Type Antrian"
    });

    $(".handleTypeAntrian").each(function(e) {
        let selected = $(this).data('selected');
        let parseSelected = (selected.length > 0) ? JSON.parse(selected.replaceAll("'", '"')) : [];
        $(this).val(parseSelected).trigger('change');
    })

    $(document).on("submit", "#saveSetting", function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('type', 'save');

        $.ajax({
            type: 'POST',
            url: 'pages/setting/action.php',
            dataType: 'JSON',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
                if (result.success === true) {
                    alert("Setting berhasil disimpan")
                    window.location.reload();
                } else {
                    alert(result.message);
                }
            },
        });
    });

    $(document).on("click", "#logout", function(e) {
        $.ajax({
            type: 'POST',
            url: 'pages/setting/action.php',
            data: {
                type: 'logout'
            },
            dataType: 'json',
            success: function(result) {
                if (result.success === true) {
                    window.location.reload();
                } else {
                    alert("Eits ada masalah nih, hubungi IT Support yaa!");
                }
            },
        });
    });
</script>