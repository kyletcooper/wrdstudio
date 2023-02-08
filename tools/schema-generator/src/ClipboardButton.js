import React from "react"

export default function ClipboardButton({ content = '', className = '' }) {
	const copy = () => {
		navigator.clipboard.writeText(content);
	}

	return (
		<button onClick={copy} className={className + " w-fit flex gap-3 py-3 px-6 bg-theme-500 rounded-md text-white hover:bg-theme-600 focus:ring-theme-500/25 focus:ring-4"} type="button">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
				<path d="M0,0H24V24H0Z" fill="none" />
				<path d="M16,1H4A2.006,2.006,0,0,0,2,3V17H4V3H16Zm3,4H8A2.006,2.006,0,0,0,6,7V21a2.006,2.006,0,0,0,2,2H19a2.006,2.006,0,0,0,2-2V7A2.006,2.006,0,0,0,19,5Zm0,16H8V7H19Z" fill="currentColor" />
			</svg>
			<span>
				Copy to Clipboard
			</span>
		</button>
	)
}