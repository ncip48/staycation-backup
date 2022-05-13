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
        $("#duration").val(diffDays);
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

        let actual = diffDays < 0 ? 0 : diffDays;

        var price = $("#price").val();
        var finalPrice = formatRupiah(Number(actual) * Number(price));
        $("#duration").val(diffDays);
        $("#total_price").val(finalPrice);
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
