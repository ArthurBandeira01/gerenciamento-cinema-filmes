$(document).ready(function () {
    $("#userForm").validate({
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
            },
            password: {
                required: true,
            },
        },
        messages: {
            name: {
                required: "Informe o nome do usuário.",
            },
            email: {
                required: "Informe o e-mail do usuário.",
            },
            password: {
                required: "Informe a senha do usuário.",
            },
        },
        errorClass: "resetPasswordError"
    });
});
