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
                    $('#success_message').append("Successfully send email " + email);
                    $("#client-form").reset();
                },
                error: function (data, err) {

                    $.each(data.responseJSON.errors, function( index, value ) {
                        $('#danger_message').append(value + "<br>");
                    });
                },
            });
        });

});
