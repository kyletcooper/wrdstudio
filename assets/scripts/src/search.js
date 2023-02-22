import { restURL } from "./restAPI";

(() => {
	const input = document.querySelector("[data-search-dialog-input]");
	const resultsContainer = document.querySelector("[data-search-dialog-results]");

	var abortController = null;
	var debounceTimer = null;

	const placeholder = () => {
		return `
			<li class="py-5 px-8">
				<div class="h-5 w-2/5 mb-2 bg-gray-100 dark:bg-gray-800 rounded-md animate-pulse"></div>
				<div class="h-7 w-4/5 bg-gray-100 dark:bg-gray-800 rounded-md animate-pulse"></div>
			</li>
		`;
	}

	const search = async (search) => {
		let results = [];

		resultsContainer.innerHTML = [1, 2, 3, 4].map(placeholder).join('');

		abortController?.abort(); // Cancel the previous request.

		if (search.length) {
			let url = new URL('wrd/v1/search', restURL);
			url.searchParams.set('search', search);

			try {
				abortController = new AbortController();

				const resp = await fetch(url.href, {
					signal: abortController.signal
				});

				const json = await resp.json();

				if (!resp.ok) {
					throw json.message;
				}

				results = json;
			}
			catch (e) {
				console.error(e);
			}
		}

		resultsContainer.innerHTML = results.map((post) => `<li><a class="block py-5 px-8 hover:bg-theme-50 hover:text-theme-500 dark:hover:bg-theme-900 focus:outline-none focus:bg-theme-50 focus:text-theme-500 dark:focus:bg-theme-900" href="${post.link}">${post.preview.small}</a></li>`).join('');
	};

	const debounce = (func, timeout = 250) => {
		clearTimeout(debounceTimer);
		debounceTimer = setTimeout(func, timeout);
	};

	input.addEventListener('input', () => {
		debounce(() => {
			search(input.value);
		});
	});

})();