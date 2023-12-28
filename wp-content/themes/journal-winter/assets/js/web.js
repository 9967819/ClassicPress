const likeBtn = document.getElementById('likeBtn');
let count = document.getElementById("likes-count");

async function addVoteToPost(url) {
      let response = await fetch(url, {
		  method: "POST", 
		  credentials: "same-origin"})
		.then((response) => response.json())
		.then((data) => {
			if (data.code == 200) {
				likeBtn.classList.add('active');
				likeBtn.disabled = true;
				count.textContent = parseInt(data.count) + 1;
			} else {
				console.log('internal error');
			}
		});
}

likeBtn.addEventListener('click', (event) => {
    const articleid = event.currentTarget.getAttribute('data-article-id');
	const url = '/webhooks.php?id=' + articleid;
	let response = addVoteToPost(url);
	//console.log(response);
	if (response.code == 200) {
		likeBtn.classList.add('active');
		counter = counter + 1;
	} else {
		//Error or request forbidden
		console.log(response.code);
	}
});
