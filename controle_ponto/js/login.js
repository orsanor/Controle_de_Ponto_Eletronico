$(document).ready(() => {
	$("#loginForm").on("submit", function (e) {
		e.preventDefault();

		$.ajax({
			url: "db/process_login.php",
			type: "POST",
			data: $(this).serialize(),
			success: (response) => {
				const data = response;
				if (data.success) {
					window.location.href = "pages/record.php";
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
