$(document).ready(() => {
	$("#baterPonto").submit((e) => {
		e.preventDefault();

		const user_id = $("#user_id").val();

		$.ajax({
			url: "../config/db/process_ponto.php",
			type: "POST",
			data: { user_id: user_id },
			success: (response) => {
				const data = response;
				$("#message")
					.css("color", "green")
					.css("visibility", "visible")
					.html(data.message);
			},
			error: () => {
				$("#message")
					.css("color", "red")
					.css("visibility", "visible")
					.html("Erro ao bater ponto. Tente novamente.");
			},
		});
	});
});
