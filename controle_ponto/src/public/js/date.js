function formatDate(date, locale = "pt-BR") {
	const options = { year: "numeric", month: "long", day: "numeric" };
	return new Intl.DateTimeFormat(locale, options).format(date);
}

function displayCurrentDate() {
	const today = new Date();
	const formattedDate = formatDate(today);
	const dateElement = document.getElementById("current-date");
	if (dateElement) {
		dateElement.textContent = formattedDate;
	}
}

function formatTime(date) {
	const hours = String(date.getHours()).padStart(2, "0");
	const minutes = String(date.getMinutes()).padStart(2, "0");
	return `${hours}:${minutes}`;
}

function updateClock() {
	const now = new Date();
	const clockElement = document.getElementById("clock");
	if (clockElement) {
		clockElement.textContent = formatTime(now);
	}
}

function initClock() {
	updateClock();
	setTimeout(
		() => {
			setInterval(updateClock, 60 * 1000);
		},
		(60 - new Date().getSeconds()) * 1000,
	);
}

displayCurrentDate();
initClock();
