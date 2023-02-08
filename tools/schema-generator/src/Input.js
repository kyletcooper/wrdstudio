import React, { useState, useRef, useEffect } from "react"
import { isInputTypeSchema, getSchemaTypeFromInputType } from "./InputHelpers";
import InputWrapper from "./InputWrapper";

export default function Input({
	name = '',
	type = 'text',
	value = '',
	options = [],
	forceOpen = false,
	placeholder = '',
	onChange = () => { },
}) {
	if (isInputTypeSchema(type)) {
		const schemaType = getSchemaTypeFromInputType(type);
		const [isOpen, setIsOpen] = useState(false);
		const ref = useRef(null);

		useEffect(() => {
			const handleClickOutside = (event) => {
				if (ref.current && !ref.current.contains(event.target)) {
					setIsOpen(false);
				}
			};

			document.addEventListener('click', handleClickOutside, true);

			return () => {
				document.removeEventListener('click', handleClickOutside, true);
			};
		}, []);

		if (isOpen || forceOpen) {
			return (
				<fieldset className={(forceOpen ? "" : "p-8") + " grid gap-8 w-full"} ref={ref}>
					{schemaType?.properties?.map((property, index) => (
						<InputWrapper label={property.label} type={property.type} required={property.required} key={index}>
							<Input
								{...property}
								value={typeof value[property.property] === 'undefined' ? property.default : value[property.property]}
								onChange={newVal => onChange({ ...value, [property.property]: newVal })}
							/>
						</InputWrapper>
					))}
				</fieldset>
			)
		}
		else {
			return (
				<button onClick={() => setIsOpen(!isOpen)} className="flex items-center w-full gap-2 py-4 max-w-sm overflow-clip">
					{schemaType?.properties?.filter(prop => prop.feature).map((property, index) => (
						<span className={property.feature === 'strong' ? "font-medium whitespace-nowrap" : "font-regular opacity-50 truncate"} key={index}>
							{value[property.property] || property.label}
						</span>
					))}
				</button>
			)
		}
	}

	switch (type) {
		case 'select':
			useEffect(() => onChange(value), []);

			return (
				<select
					{...{ name, type, value }}
					className="w-full bg-transparent py-4 focus:ring-0 focus:outline-none"
					onChange={e => onChange(e.target.value)}
				>
					<option value="" disabled={typeof value !== 'null' && typeof value !== 'undefined'}>{placeholder || 'Choose an option...'}</option>

					{options.map((option, index) =>
						<option value={option.value} key={index}>
							{option.label}
						</option>
					)}
				</select>
			)

		case 'datetime':
			type = 'datetime-local'
		default:
			return (
				<input
					{...{ name, type, value, placeholder }}
					className="w-full bg-transparent py-4 focus:ring-0 focus:outline-none"
					onChange={e => onChange(e.target.value)}
				/>
			)
	}
}