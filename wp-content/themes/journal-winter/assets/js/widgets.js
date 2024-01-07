const quoteDiv = document.getElementById('quotewidget');
const article = document.querySelector('article');

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

// Responsive navigation menu 
// Credit: https://dev.to/david_bilsonn/learn-how-to-build-responsive-navigation-bar-with-html-css-javascript-4g5
const openHam = document.querySelector('#toggle-nav-menu');
const navigationItems = document.querySelector('#top-menu');
let menuOpen = false;


openHam.addEventListener('click', () => {
	if(!menuOpen){
		navigationItems.classList.toggle("visible");
		//navigationItems.toggleAttribute("aria-activedescendant", true);
		menuOpen = true;
	} else {
		navigationItems.classList.remove('visible');
		menuOpen = false;
	}
});
