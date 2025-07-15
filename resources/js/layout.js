document.addEventListener('DOMContentLoaded', function () {
	const toggleBtn = document.getElementById('toggleDropdown');
	const dropdownMenu = document.getElementById('dropdownMenu');

	if (toggleBtn && dropdownMenu) {                                  
		toggleBtn.addEventListener('click', function (e) {
			e.stopPropagation();
			dropdownMenu.classList.toggle('hidden');
		});

		document.addEventListener('click', function () {
			dropdownMenu.classList.add('hidden');
		});
	}

	const userButton = document.getElementById('user-button');
	const userMenu = document.getElementById('user-menu');

	if (userButton && userMenu) {
		userButton.addEventListener('click', function (e) {
			e.stopPropagation();
			userMenu.classList.toggle('hidden');
		});

		document.addEventListener('click', function (event) {
			if (!userMenu.contains(event.target) && !userButton.contains(event.target)) {
				userMenu.classList.add('hidden');
			}
		});
	}
});