(() => {

	const bookmarkButtons = document.querySelectorAll('[data-bookmark]');
	const shareButtons = document.querySelectorAll('[data-share]');

	shareButtons.forEach(btn => {
		btn.addEventListener('click', () => {
			url = new URL(location.origin + location.path);
			url.searchParams.set('utm_source', 'social');
			url.searchParams.set('utm_medium', 'share');
			url.searchParams.set('utm_campaign', 'share_button');

			navigator.share({
				url: url.href,
				text: document.title,
			});
		});
	});

	bookmarkButtons.forEach(btn => {
		btn.addEventListener('click', () => {
			if (window.sidebar && window.sidebar.addPanel) {
				// Firefox <23
				window.sidebar.addPanel(document.title, window.location.href, '');
			} else if (window.external && ('AddFavorite' in window.external)) {
				// Internet Explorer
				window.external.AddFavorite(location.href, document.title);
			} else if (window.opera && window.print || window.sidebar && !(window.sidebar instanceof Node)) { // Opera <15 and Firefox >23
				// Firefox <23, Opera <15 -- Use the link.
				return true;
			} else {
				alert('You can add this page to your bookmarks by pressing ' + (navigator.userAgent.toLowerCase().indexOf('mac') != - 1 ? 'Command/Cd' : 'CTRL') + ' + D on your keyboard.');
			}

			return false;
		})
	})

})();