const apiURLLinkTag = document.querySelector("link[rel='https://api.w.org/']");
export const restURL = apiURLLinkTag?.href;

export const apiParseData = (data, callback) => {
	for (const key in data) {
		const value = data[key]

		if (Array.isArray(value)) {
			if (value.length > 0) {
				callback(key, value.join(','));
			}
			continue;
		}
		else if (typeof value === 'object') {
			if (Object.keys(value).length > 0) {
				callback(key, JSON.stringify(value));
			}
			continue;
		}
		else if (value !== null) {
			callback(key, value)
			continue;
		}
	}
}

export const apiRequestHeaders = async (url, opts) => {
	try {
		const defaultOpts = {
			data: {},
			method: 'GET',
			fetchOptions: {}
		}

		opts = { ...defaultOpts, ...opts }
		const endpoint = new URL(restURL + url)
		const method = opts.method.toUpperCase()

		if (Object.keys(opts.data).length) {
			if (method === "GET" || method === "HEAD") {
				apiParseData(opts.data, (key, value) => {
					endpoint.searchParams.set(key, value);
				})
			}
			else {
				opts.fetchOptions.data = {};

				apiParseData(opts.data, (key, value) => {
					opts.fetchOptions.data[key] = value;
				})
			}
		}

		const resp = await fetch(endpoint.href, {
			...opts.fetchOptions,
			method: method
		})
		const json = await resp.json()

		// console.log(resp)

		if (!resp.ok) {
			throw json.message
		}

		return {
			headers: resp.headers,
			data: json,
		}
	}
	catch (e) {
		console.error(e);
	}
}

export const apiRequest = async (url, opts) => {
	try {
		const { data } = await apiRequestHeaders(url, opts);
		return data;
	}
	catch (e) {
		console.error(e);
	}
}

window.wrd.apiRequestHeaders = apiRequestHeaders;
window.wrd.apiRequest = apiRequest;