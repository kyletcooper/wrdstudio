import React, { useState, useRef, useEffect } from "react"

import Input from "./InputWrapper";
import Label from "./Label";
import Button from "./Button";
import IconButton from "./IconButton";
import { getSchemaTypeFromInputType } from "./InputHelpers";

export default function InputSchema({
	type = 'Schema:Article',
	value = {},
	forceOpen = false,
	onChange = () => { },
}) {
	const schemaType = getSchemaTypeFromInputType(type);
	const [isOpen, setIsOpen] = useState(false);
	const ref = useRef(null);

	// Click outside to close
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

	const getPropertyValue = (property) => {
		if (typeof value[property.property] === 'undefined') {
			if (property.repeatable) {
				return [property.default];
			}
			return property.default;
		}

		return value[property.property];
	}

	const setPropertyValue = (property, newValue, index) => {
		if (property.repeatable) {
			const currValue = getPropertyValue(property);
			currValue.splice(index, 1, newValue);
			onChange({ ...value, [property.property]: currValue })
		}
		else {
			onChange({ ...value, [property.property]: newValue })
		}
	}

	const addAdditionalPropertyValue = (property) => {
		let propertyValue = getPropertyValue(property);
		propertyValue.push(property.default);
		onChange({ ...value, [property.property]: propertyValue })
	}

	const removeAdditionalProperty = (property, index) => {
		const currValue = getPropertyValue(property);
		currValue.splice(index, 1);

		if (currValue.length === 0) {
			currValue.push(property.default);
		}

		onChange({ ...value, [property.property]: currValue })
	}

	if (isOpen || forceOpen) {
		return (

			<fieldset className={(forceOpen ? "" : "p-6") + " grid gap-10 w-full"} ref={ref}>
				{schemaType?.properties?.map((property, propertyIndex) => {
					if (property.repeatable) {
						return (
							<div key={propertyIndex}>
								{
									getPropertyValue(property).map((value, valueIndex) => (
										<Label {...{ ...property, label: valueIndex ? "" : property.label }} key={valueIndex}>
											<Input
												{...property}
												value={value}
												onChange={newVal => setPropertyValue(property, newVal, valueIndex)}
											/>
											<IconButton label={"Remove " + property.label} className="ml-auto" onClick={() => removeAdditionalProperty(property, valueIndex)}>
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
													<path d="M0,0H24V24H0Z" fill="none" />
													<path d="M19,13H5V11H19Z" fill="currentColor" />
												</svg>
											</IconButton>
										</Label>
									))
								}
								<Button className="mt-4" onClick={() => addAdditionalPropertyValue(property)} small secondary>
									Add additional {property.label}
								</Button>
							</div>
						);
					}
					else {
						return (

							<Label {...property} key={propertyIndex}>
								<Input
									{...property}
									value={getPropertyValue(property)}
									onChange={newVal => setPropertyValue(property, newVal)}
								/>
							</Label>

						);
					}
				})}
			</fieldset >

		)
	}
	else {
		return (

			<button onClick={() => setIsOpen(!isOpen)} className="inputSchemaOpenButton w-full">
				<div className="flex items-center gap-2 py-4 max-w-sm overflow-clip">
					{schemaType?.properties?.filter(prop => prop.feature).map((property, index) => (

						<span className={property.feature === 'strong' ? "font-medium whitespace-nowrap" : "font-regular opacity-50 truncate"} key={index}>
							{value[property.property] || property.label}
						</span>

					))}
				</div>
			</button>

		)
	}
}