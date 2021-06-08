	//Slider
	let offSet = 0;
	const slider = document.querySelector(".banner_container");

	document.querySelector(".reviews__btn--next").addEventListener("click", function () {
		offSet = offSet + 650;
		if (offSet > 1000) {
			offSet = 0;
		}
		slider.style.left = -offSet + "px";
	});

	document.querySelector(".reviews__btn--prev").addEventListener("click", function () {
		offSet = offSet - 650;
		if (offSet < 0) {
			offSet = 650;
		}
		slider.style.left = -offSet + "px";
	});

	//filter
	let buttons = document.querySelectorAll(".buttons");
	const cards = document.querySelectorAll(".card");

	function filter(category, items) {
		items.forEach((item)=> {
			let isitem = !item.classList.contains(category);


			if (isitem) {
				item.classList.add("hide");
			} else {
				item.classList.remove("hide");
			}


		});
	}


	buttons.forEach((button)=> {
			button.addEventListener("click", function () {
			const currentCategory = button.dataset.filter;
			filter(currentCategory, cards);
		});
	});

	//pagination

	let pagination = document.querySelectorAll(".number");

	pagination.forEach(function (item) {
		item.addEventListener("click", function () {	

				if(!item.classList.contains("add")) {
					pagination.forEach(function (item) {
					item.classList.remove("add");
				})	

				item.classList.add("add");
				}
		});
	});


























