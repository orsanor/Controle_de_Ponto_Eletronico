$(document).ready(() => {
	function getTotalHours() {
		$.ajax({
			url: "../config/db/get_total_hours.php",
			type: "GET",
			success: (response) => {
				if (response.success) {
					$(".saldo-valor").text(response.saldo_geral);

					if (response.ultimo_registro) {
						$(".ultimo-registro").text(
							`Último registro no dia ${response.ultimo_registro.data}, às ${response.ultimo_registro.hora}`,
						);
					} else {
						$(".ultimo-registro").text("Último registro não encontrado.");
					}
					if (response.saldo_mes) {
						$(".saldo-mes").text(response.saldo_mes);
					} else {
						$(".saldo-mes").text("+0h00min");
					}
				}
			},
			error: () => {
				alert("Erro ao carregar o saldo geral e o último registro.");
				$(".saldo-valor").text("+0h00min");
				$(".ultimo-registro").text("Erro ao carregar o último registro.");
				$(".saldo-mes").text("+0h00min"); 
			},
		});
	}

	getTotalHours();
});
