import React, { useState } from "react"

import Button from "./Button";

export default function ClipboardButton({ content = '', className = '' }) {
	const [copied, setCopied] = useState(false);

	const copy = () => {
		navigator.clipboard.writeText(content)
		setCopied(true)

		setTimeout(() => {
			setCopied(false)
		}, 1500)
	}

	return (
		<Button onClick={copy} className={className + (copied ? " theme-green" : "")}>
			{
				copied ?
					<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
						<path d="M0 0h24v24H0z" fill="none" />
						<path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z" />
					</svg>
					:
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
						<path d="M0,0H24V24H0Z" fill="none" />
						<path d="M16,1H4A2.006,2.006,0,0,0,2,3V17H4V3H16Zm3,4H8A2.006,2.006,0,0,0,6,7V21a2.006,2.006,0,0,0,2,2H19a2.006,2.006,0,0,0,2-2V7A2.006,2.006,0,0,0,19,5Zm0,16H8V7H19Z" fill="currentColor" />
					</svg>
			}
			<span>
				{copied ? "Copied to Clipboard" : "Copy to Clipboard"}
			</span>
		</Button>
	)
}