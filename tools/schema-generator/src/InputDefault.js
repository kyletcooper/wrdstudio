import React from "react"

export default function InputDefault({
	value = '',
	placeholder = '',
	type = '',
	onChange = () => { },
	onFocus = () => { },
}) {
	return (
		<input
			{...{ type, value, placeholder }}
			className="h-16 w-full bg-transparent p-4 focus:ring-0 focus:outline-none"
			onChange={e => onChange(e.target.value)}
			step={type == 'time' ? 1 : null}
		/>
	)
}