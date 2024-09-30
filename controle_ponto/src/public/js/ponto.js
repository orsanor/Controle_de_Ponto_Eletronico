$(document).ready(() => {
    $('#baterPonto').submit(function (e) {
        e.preventDefault();

        const usuario_id = $('#usuario_id').val();

        $.ajax({
            url: "../config/db/process_ponto.php",
            type: 'POST',
            data: { usuario_id: usuario_id },
            success: function (response) {
                const data = response;
                $("#message")
                    .css("color", "green")
                    .css("visibility", "visible")
                    .html(data.message);
            },
            error: function () {
                $("#message")
                    .css("color", "red")
                    .css("visibility", "visible")
                    .html('Erro ao bater ponto. Tente novamente.');
            }
        });
    });
});
