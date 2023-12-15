/* bootstrap/main.js and webhooks events for ahnjournal php frontend */

const quoteDiv = document.getElementById('quotewidget');

// Like Button 
const likeBtn = document.querySelector('#likeBtn');
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

async function addVoteToPost(url) {
	const response = await fetch(url, {method: "POST", credentials: "same-origin"});
	return response.json();
}

quoteDiv.addEventListener('click', (e) => {
	fetchQuote()
});

// Responsive navigation menu 
// Credit: https://dev.to/david_bilsonn/learn-how-to-build-responsive-navigation-bar-with-html-css-javascript-4g5
let openHam = document.querySelector('#toggle-nav-menu');
let navigationItems = document.querySelector('#top-menu');
let menuOpen = false;

openHam.addEventListener('click', () => {
	if(!menuOpen){
		navigationItems.classList.toggle("top-menu-visible");
		menuOpen = true;
	} else {
		navigationItems.classList.remove('top-menu-visible');
		menuOpen = false;
	}
})


// webhook. (experimental)
likeBtn.addEventListener('click', () => {
	const u = '/webhooks.php?id=' + article.id;
	const result = addVoteToPost(u);
	if (result.code == 200) {
		likeBtn.classList.toggle('active');
		likeBtn.disabled = 'true';
	} else {
		//alert("thank you for voting!");
		alert('Error: Voting limit reached for this post!');
	}
});


// frontpage : make sure the backgrounds for each posts has a proper css/style
// using flexbox 

