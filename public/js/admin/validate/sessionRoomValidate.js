$(document).ready(function () {
    $("#sessionRoomForm").validate({
        rules: {
            room: {
                required: true,
            },
            movie: {
                required: true,
            },
            movieImage: {
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
            room: {
                required: "Informe a sala do filme.",
            },
            movie: {
                required: "Informe o nome do filme.",
            },
            movieImage: {
                required: "A imagem do filme é requerida.",
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
