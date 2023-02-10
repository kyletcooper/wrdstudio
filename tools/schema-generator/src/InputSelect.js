import React, { useEffect } from "react"

export default function InputSelect({
	value = '',
	options = [],
	placeholder = '',
	onChange = () => { },
}) {
	useEffect(() => onChange(value), []);

	return (
		<select
			value={value}
			className="w-full bg-transparent py-4 focus:ring-0 focus:outline-none"
			onChange={e => onChange(e.target.value)}
		>
			<option value="" disabled={typeof value !== 'null' && typeof value !== 'undefined'}>
				{placeholder || 'Choose an option...'}
			</option>

			{options.map((option, index) =>
				<option value={option.value} key={index}>
					{option.label}
				</option>
			)}
		</select>
	)
}