import React from "react"

export default function IconButton({
	onClick = () => { },
	className = '',
	label = '',
	children
}) {

	return <button aria-label={label} title={label} onClick={onClick} type="button" className={"w-12 h-12 flex items-center justify-center self-center p-4 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-full " + className}>
		{children}
	</button>
}