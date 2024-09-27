function formatDate(date) {
	const options = { year: "numeric", month: "long", day: "numeric" };
	return date.toLocaleDateString("pt-BR", options);
}

function displayCurrentDate() {
	const today = new Date();
	const formattedDate = formatDate(today);
	document.getElementById("current-date").innerText = formattedDate;
}

displayCurrentDate();

function updateClock() {
	const now = new Date();
	const hours = String(now.getHours()).padStart(2, "0");
	const minutes = String(now.getMinutes()).padStart(2, "0");
	document.getElementById("clock").textContent = `${hours}:${minutes}`;
}

setInterval(updateClock, 1000);
updateClock();
