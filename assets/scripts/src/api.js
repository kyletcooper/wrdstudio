export const api = async function (endpoint, args = {}, method = "GET") {
	let url = new URL(`${window.wrd.home_url}/wp-json${endpoint}`);

	let opts = {
		method: method,
		headers: new Headers({
			'X-WP-Nonce': window.wrd.rest_nonce
		})
	}

	if (method == "GET") {
		for (const key in args) {
			url.searchParams.append(key, args[key]);
		}
	}
	else {
		if (args instanceof FormData) {
			opts.body = args;
		}
		else {
			opts.headers.append('Content-Type', 'application/json');
			opts.body = JSON.stringify(args);
		}
	}

	return await fetch(url.href, opts).then(res => res.json())
}