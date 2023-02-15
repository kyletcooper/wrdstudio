import React from "react"

export default function LinkList({
	title = "",
	links = []
}) {
	if (links.length === 0) {
		return null
	}

	return (
		<div>
			<h2 className="text-lg font-semibold mb-2">{title}</h2>
			<ul className="flex flex-col gap-2">
				{links.map((link, index) =>
					<li key={index}>
						<a href={link.url} target="_blank" className="text-theme-500 text-medium">
							{link.label}
						</a>
					</li>
				)}
			</ul>
		</div>
	)
}