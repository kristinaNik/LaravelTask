$(document).ready(function () {

    $("#send").on('click', function (e) {

        e.preventDefault();

            var email = $("input[name=email]").val();
            var phone = $("input[name=phone]").val();

            $.ajax({
                type: 'POST',
                url: "api/send",
                data: {
                    email: email,
                    phone: phone,
                },
                success: function (data) {

                },
                error: function (data, err) {

                },
            });
        });

});
