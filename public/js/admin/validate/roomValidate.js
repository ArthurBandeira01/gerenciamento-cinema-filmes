$(document).ready(function () {
    $("#roomForm").validate({
        rules: {
            name: {
                required: true,
            },
            seats: {
                required: true,
            },
        },
        messages: {
            name: {
                required: "Informe o nome da sala.",
            },
            seats: {
                required: "Informe o número de assentos.",
            },
        },
        errorClass: "resetPasswordError"
    });
});
