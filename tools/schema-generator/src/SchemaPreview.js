import React from "react"

export default function SchemaPreview({
	markup = ""
}) {
	return (
		<code className="block bg-gray-800 dark:bg-gray-700 rounded-md overflow-hidden text-white font-mono" style={{ colorScheme: 'dark' }}>
			<header className="bg-gray-900 dark:bg-gray-800 text-sm py-2 px-6">
				<h2 className="font-semibold">Schema Output</h2>
			</header>

			<pre className="block max-h-[50vh] overflow-y-auto p-6 whitespace-pre-wrap">{markup}</pre>
		</code>
	)
}