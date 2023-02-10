import React from "react"

import Button from "./Button";

export default function ClipboardButton({ content = '', className = '' }) {
	const copy = () => {
		navigator.clipboard.writeText(content);
	}

	return (
		<Button onClick={copy} className={className}>
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
				<path d="M0,0H24V24H0Z" fill="none" />
				<path d="M16,1H4A2.006,2.006,0,0,0,2,3V17H4V3H16Zm3,4H8A2.006,2.006,0,0,0,6,7V21a2.006,2.006,0,0,0,2,2H19a2.006,2.006,0,0,0,2-2V7A2.006,2.006,0,0,0,19,5Zm0,16H8V7H19Z" fill="currentColor" />
			</svg>
			<span>
				Copy to Clipboard
			</span>
		</Button>
	)
}