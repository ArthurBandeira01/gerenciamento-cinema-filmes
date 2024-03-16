$(document).ready(function () {
    $("#userForm").validate({
        rules: {
            movie: {
                required: true,
            },
            movieImage: {
                required: true,
            },
            numberSeats: {
                required: true,
            },
            priceTicket: {
                required: true,
            },
            sessionDate: {
                required: true,
            },
            sessionTime: {
                required: true,
            },
        },
        messages: {
            movie: {
                required: "Informe o nome do filme.",
            },
            movieImage: {
                required: "A imagem do filme é requerida.",
            },
            numberSeats: {
                required: "Informe o número de assentos.",
            },
            priceTicket: {
                required: "Informe o valor do ingresso.",
            },
            sessionDate: {
                required: "Informe a data da sessão.",
            },
            sessionTime: {
                required: "Informe o horário da sessão.",
            },
        },
        errorClass: "resetPasswordError"
    });
});
