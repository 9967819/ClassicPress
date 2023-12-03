/* bootstrap/main.js and webhooks events for ahnjournal php frontend */

const quoteDiv = document.getElementById('quotewidget');
		
async function fetchQuote() {
	await fetch("/static/freethinking.md")
			.then(response=>response.text())
			.then(text => {
				let quotes = text.split(/\r?\n/);
				//console.log(quotes);
				let s =	quotes[Math.floor(Math.random()*quotes.length) - 1];
				quoteDiv.innerHTML = s;
			});
}

quoteDiv.addEventListener('click', (e) => {
	fetchQuote()
});
