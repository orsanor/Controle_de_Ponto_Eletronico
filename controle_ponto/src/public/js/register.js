$(document).ready(() => {
	$("#registrationForm").on("submit", function (e) {
		e.preventDefault();

		$.ajax({
			url: "../config/db/process_register.php",
			type: "POST",
			data: $(this).serialize(),
			success: (response) => {
				const data = response;

				if (data.success) {
					$("#message")
						.css("color", "green")
						.css("visibility", "visible")
						.html(data.message);
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
