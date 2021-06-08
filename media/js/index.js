	let tabs = document.querySelectorAll(".tab");
	let tabsItems = document.querySelectorAll(".text__info");

	tabs.forEach(onTabClick)



			function onTabClick (item) {
				item.addEventListener("click", function () {
				let tabId = item.getAttribute("data-tab");
				let currentTab = document.querySelector(tabId);

				if(!item.classList.contains("active")) {
					tabs.forEach(function (item) {
					item.classList.remove("active");
				})	

				tabsItems.forEach(function (item) {
					item.classList.remove("active");
				});

				if (!item.classList.contains("active2")) {
					tabs.forEach(function (item) {	
						item.classList.remove("active2");
					})	
				}	

				item.classList.add("active2");
				currentTab.classList.add("active");
				}
			});
		}
	




























