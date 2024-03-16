$(document).ready(function () {
    $("#userForm").validate({
        rules: {
            cpf: {
                required: true,
            },
            numberSeat: {
                required: true,
            },
        },
        messages: {
            cpf: {
                required: "Informe o cpf.",
            },
            numberSeat: {
                required: "Informe o número do assento.",
            },
        },
        errorClass: "resetPasswordError"
    });
});
