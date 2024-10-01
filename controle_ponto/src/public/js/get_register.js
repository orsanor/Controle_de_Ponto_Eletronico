$(document).ready(() => {
	function getRegister() {
		$.ajax({
			url: "../config/db/get_register.php",
			type: "GET",
			success: (response) => {
				if (response.success) {
					let tabela = "";
					for (const registro of response.data) {
						tabela += `<tr style='text-align: center; color: #004c94; background-color: white'>
                <td class='date' scope='row'>${registro.data}</td>
                <td>${registro.entrada}</td>
                <td>${registro.saida}</td>
                <td>${registro.horas_trabalhadas}</td>
            </tr>`;
					}
					$("#registerTable tbody").html(tabela);
				}
			},
			error: () => {
				alert("Erro ao carregar o relatório.");
			},
		});
	}

	getRegister();
});
