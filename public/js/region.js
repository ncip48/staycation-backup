$(function () {
    console.log("asdf");
    $(document).on("change", "#provinces", function () {
        // alert("ea");
        var id = $(this).find(":selected")[0].value;
        $.ajax({
            type: "GET",
            url: "/api/regency/" + id,
            success: function (data) {
                // the next thing you want to do
                console.log(data.data.provinces);
                var $regencies = $("#regencies");
                $regencies.empty();
                for (var i = 0; i < data.data.provinces.length; i++) {
                    $regencies.append(
                        "<option id=" +
                            data.data.provinces[i].id +
                            " value=" +
                            data.data.provinces[i].id +
                            ">" +
                            data.data.provinces[i].name +
                            "</option>"
                    );
                }
            },
        });
    });
});
