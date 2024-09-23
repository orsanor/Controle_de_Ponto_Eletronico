$(document).ready(() => {
	$("#loginForm").on("submit", function (e) {
		e.preventDefault();

		$.ajax({
			url: "../config/db/process_login.php",
			type: "POST",
			data: $(this).serialize(),
			success: (response) => {
				const data = response;
				if (data.success) {
					window.location.href = "/Projeto_Senac/controle_ponto/src/pages/record.php";
				} else {
					$("#message")
						.css("color", "red")
						.css("visibility", "visible")
						.html(data.message);
				}
			},
		});
	});
});
