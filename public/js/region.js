function formatRupiah(angka) {
    if (angka == null) {
        return "Rp.-";
    }
    angka = parseInt(angka);
    angka = angka.toString();
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        let separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return "Rp. " + rupiah;
}

$(function () {
    // hideApiBank();

    $('input[name="payment"]').on("change", function () {
        $('input[name="payment"]').not(this).prop("checked", false);
    });

    var check_tunai;
    $("#payment_tunai").on("change", function () {
        check_tunai = $("#payment_tunai").prop("checked");
        if (check_tunai) {
            // alert("Checkbox is checked.");
            $("#pay-button").prop("disabled", false);
            $("#trf_bank").prop("indeterminate", false);
            hideApiBank();
            $("#payment_type").val("cash");
        } else {
            // alert("Checkbox is unchecked.");
            $("#pay-button").prop("disabled", true);
            $("#trf_bank").prop("indeterminate", false);
            hideApiBank();
            $("#payment_type").val("");
        }
    });

    var trf_bank;
    $("#trf_bank").on("change", function () {
        trf_bank = $("#trf_bank").prop("checked");
        if (trf_bank) {
            // alert("Checkbox is checked.");
            $("#pay-button").prop("disabled", true);
            $("#trf_bank").prop("indeterminate", true);
            callApiBank();
            $("#payment_type").val("bank");
            $("#id_rekening").val("");
        } else {
            // alert("Checkbox is unchecked.");
            $("#trf_bank").prop("indeterminate", false);
            $("#pay-button").prop("disabled", true);
            hideApiBank();
            $("#payment_type").val("");
            $("#id_rekening").val("");
        }
    });

    function hideApiBank() {
        $("#display-rekening").hide();
    }

    function callApiBank() {
        $("#display-rekening").show();
        $("#display-rekening").empty();
        $.ajax({
            type: "GET",
            url: "/api/rekening",
            success: function (data) {
                // the next thing you want to do
                console.log(data);
                var $display = $("#display-rekening");
                for (var i = 0; i < data.length; i++) {
                    $display.append(
                        "<div class='form-check'>" +
                            "<input class='form-check-input' type='checkbox' name='rekening' id='rekening" +
                            data[i].id +
                            "' value='" +
                            data[i].id +
                            "'>" +
                            "<div class='d-flex flex-column' for='rekening" +
                            data[i].id +
                            "'>" +
                            "<label class='form-check-label text-muted' for='rekening" +
                            data[i].id +
                            "'>" +
                            data[i].nama +
                            " - " +
                            "<label class='form-check-label text-muted font-weight-600' for='rekening" +
                            data[i].id +
                            "'>" +
                            data[i].no_rekening +
                            "</label>" +
                            "</label><label class='form-check-label text-muted' for='rekening" +
                            data[i].id +
                            "'>" +
                            "a/n " +
                            data[i].atas_nama +
                            "</label>" +
                            "</div>" +
                            "</div>"
                    );
                }
            },
        });
    }

    $(document).on("click", 'input[name="rekening"]', function () {
        $('input[name="rekening"]').not(this).prop("checked", false);
        var atLeastOneIsChecked =
            $('input[name="rekening"]:checked').length > 0;
        if (atLeastOneIsChecked) {
            $("#pay-button").prop("disabled", false);
            $("#trf_bank").prop("indeterminate", false);
            $("#payment_type").val("bank");
            $("#id_rekening").val(this.value);
        } else {
            $("#pay-button").prop("disabled", true);
            $("#trf_bank").prop("indeterminate", true);
            $("#id_rekening").val("");
        }
    });

    $(document).on("click", "#btn-edit-profile", function (event) {
        event.preventDefault();
        $("#exampleModal").modal("show");
    });

    $(document).on("click", "#btn-profile-close", function (event) {
        event.preventDefault();
        $("#exampleModal").modal("hide");
    });

    $.ajax({
        type: "GET",
        url: "http://dev.farizdotid.com/api/daerahindonesia/provinsi",
        success: function (data) {
            // the next thing you want to do
            console.log(data.provinsi);
            var $provinces = $("#provinces");
            for (var i = 0; i < data.provinsi.length; i++) {
                $provinces.append(
                    "<option id=" +
                        data.provinsi[i].id +
                        " value=" +
                        data.provinsi[i].id +
                        ">" +
                        data.provinsi[i].nama +
                        "</option>"
                );
            }
        },
    });

    $(document).on("change", "#provinces", function () {
        // alert("ea");
        var id = $(this).find(":selected")[0].value;
        $.ajax({
            type: "GET",
            url:
                "http://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=" +
                id,
            success: function (data) {
                // the next thing you want to do
                console.log(data.kota_kabupaten);
                var $regencies = $("#regencies");
                $regencies.empty();
                for (var i = 0; i < data.kota_kabupaten.length; i++) {
                    $regencies.append(
                        "<option id=" +
                            data.kota_kabupaten[i].id +
                            " value=" +
                            data.kota_kabupaten[i].id +
                            ">" +
                            data.kota_kabupaten[i].nama +
                            "</option>"
                    );
                }
            },
        });
    });

    $(document).on("change", "#date_start", function () {
        let date_start = $(this).val();
        let date_end = $("#date_end").val();
        const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
        const firstDate = new Date(date_start);
        const secondDate = new Date(date_end);

        let diffDays = Math.round((secondDate - firstDate) / oneDay);

        let actual = diffDays < 0 ? 0 : diffDays;

        var price = $("#price").val();
        var finalPrice = formatRupiah(Number(actual) * Number(price));
        $("#duration").val(actual);
        $("#total_price").val(finalPrice);
        $("#total-div").html(finalPrice);
    });

    $(document).on("change", "#date_end", function () {
        let date_start = $("#date_start").val();
        let date_end = $(this).val();
        const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
        const firstDate = new Date(date_start);
        const secondDate = new Date(date_end);

        let diffDays = Math.round((secondDate - firstDate) / oneDay);
        // diffDays = 0;

        let actual = diffDays < 0 ? 0 : diffDays;

        var price = $("#price").val();
        var finalPrice = formatRupiah(Number(actual) * Number(price));
        $("#duration").val(actual);
        $("#total_price").val(finalPrice);
        $("#total").val(Number(actual) * Number(price));
        $("#total-div").html(finalPrice);
    });

    $(document).on("click", "#btn_fill", function () {
        let user = $("#user_full").val();
        user = JSON.parse(user);
        $("#form_name").val(user.name);
        $("#form_email").val(user.email);
        $("#form_phone").val(user.phone);
    });

    $(".my-rating-r0").starRating({
        useFullStars: true,
        starShape: "rounded",
        starSize: 25,
        emptyColor: "lightgray",
        hoverColor: "#ff7f47",
        activeColor: "#ff7f47",
        useGradient: false,
        minRating: 1,
        callback: function (currentRating, $el) {
            $("#r0").val(currentRating);
        },
    });
    $(".my-rating-r1").starRating({
        useFullStars: true,
        starShape: "rounded",
        starSize: 25,
        emptyColor: "lightgray",
        hoverColor: "#ff7f47",
        activeColor: "#ff7f47",
        useGradient: false,
        minRating: 1,
        callback: function (currentRating, $el) {
            $("#r1").val(currentRating);
        },
    });
    $(".my-rating-r2").starRating({
        useFullStars: true,
        starShape: "rounded",
        starSize: 25,
        emptyColor: "lightgray",
        hoverColor: "#ff7f47",
        activeColor: "#ff7f47",
        useGradient: false,
        minRating: 1,
        callback: function (currentRating, $el) {
            $("#r2").val(currentRating);
        },
    });
    $(".my-rating-r3").starRating({
        useFullStars: true,
        starShape: "rounded",
        starSize: 25,
        emptyColor: "lightgray",
        hoverColor: "#ff7f47",
        activeColor: "#ff7f47",
        useGradient: false,
        minRating: 1,
        callback: function (currentRating, $el) {
            $("#r3").val(currentRating);
        },
    });
    $(".my-rating-r4").starRating({
        useFullStars: true,
        starShape: "rounded",
        starSize: 25,
        emptyColor: "lightgray",
        hoverColor: "#ff7f47",
        activeColor: "#ff7f47",
        useGradient: false,
        minRating: 1,
        callback: function (currentRating, $el) {
            $("#r4").val(currentRating);
        },
    });
});
