$(document).ready(function () {
    $("#tenantForm").validate({
        rules: {
            tenant: {
                required: true,
            },
        },
        messages: {
            tenant: {
                required: "Informe o nome do cinema.",
            },
        },
        errorClass: "resetPasswordError"
    });
});
