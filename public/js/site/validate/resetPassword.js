$(document).ready(function () {
    $("#formResetPassword").validate({
        rules: {
            newPassword: {
                required: true,
                minlength: 6,
            },
            repeatNewPassword: {
                required: true,
                minlength: 6,
                equalTo: "#newPassword",
            },
        },
        messages: {
            newPassword: {
                required: "Por favor, informe sua nova senha.",
                minlength: "Insira ao menos 6 caracteres.",
            },
            repeatNewPassword: {
                required: "Por favor, informe sua nova senha.",
                minlength: "Insira ao menos 6 caracteres.",
                equalTo: "As senhas não coincidem.",
            },
        },
        errorClass: "resetPasswordError"
    });
});
