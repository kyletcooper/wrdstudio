import React from "react"

export default function Button({
	onClick = () => { },
	className = '',
	children = null,
	small = false,
	appearance = 'primary',
}) {
	let classes = " w-fit flex items-center gap-3 rounded-md font-medium transition-all focus:ring-theme-500/25 focus:ring-4";

	if (appearance !== 'link') {
		if (small) {
			classes += " py-2 px-4 text-sm";
		}
		else {
			classes += " py-3 px-6";
		}
	}

	if (appearance === 'primary') {
		classes += " bg-transparent-500 text-theme-500 border-2 border-theme-500 hover:text-theme-600 hover:border-theme-600";
	}
	else if (appearance === 'secondary') {
		classes += " bg-theme-500 text-white border-2 border-theme-500 hover:bg-theme-600 hover:border-theme-600";
	}
	else if (appearance === 'tertiary') {
		classes += " border border-gray-300 bg-white hover:text-theme-500 hover:border-theme-300 dark:bg-gray-900 dark:border-gray-800 dark:hover:border-theme-800";
	}
	else if (appearance === 'link') {
		classes += " text-theme-500 hover:text-theme-700 dark:hover:text-theme-300";
	}

	return <button onClick={onClick} type="button" className={classes + " " + className}>
		{children}
	</button>
}