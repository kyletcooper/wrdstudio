import React from "react"

export default function IconButton({
	onClick = () => { },
	className = '',
	label = '',
	children
}) {

	return <button aria-label={label} title={label} onClick={onClick} type="button" className={"p-4 my-1 flex items-center justify-center hover:bg-gray-100 dark:hover:bg-gray-800 rounded-full transition-colors " + className}>
		{children}
	</button>
}