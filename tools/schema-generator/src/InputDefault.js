import React, { useEffect } from "react"

export default function InputDefault({
	value = '',
	placeholder = '',
	type = '',
	onChange = () => { }
}) {
	return (
		<input
			{...{ type, value, placeholder }}
			className="w-full bg-transparent py-4 focus:ring-0 focus:outline-none"
			onChange={e => onChange(e.target.value)}
		/>
	)
}