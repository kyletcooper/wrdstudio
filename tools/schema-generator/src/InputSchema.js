import React, { useState, useRef, useEffect, Fragment } from "react"

import Input from "./Input";
import Label from "./Label";
import Button from "./Button";
import IconButton from "./IconButton";
import { getDefaultSchemaObject, getSchemaTypeFromInputType, isInputTypeSchema } from "./schema-helpers";

export default function InputSchema({
	type = 'Schema:Article',
	value = {},
	forceOpen = false,
	onChange = () => { },
}) {
	const [selectedTypeIndex, setSelectedTypeIndex] = useState(0);

	const schemaType = getSchemaTypeFromInputType(Array.isArray(type) ? type[selectedTypeIndex] : type);
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
		let defaultValue = property.default;

		if (isInputTypeSchema(property.type)) {
			defaultValue = getDefaultSchemaObject(Array.isArray(property.type) ? property.type[0] : property.type, 1);
		}

		propertyValue.push(defaultValue);

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

	const getTypeSwitchers = () => {
		if (!Array.isArray(type)) {
			if (forceOpen) return;

			const currentTypeObject = getSchemaTypeFromInputType(type)

			return (
				<div className="flex flex-wrap border-b border-gray-200 dark:border-gray-700">
					<div className="font-semibold py-4 px-6">
						{currentTypeObject?.label}
					</div>
				</div>
			)
		}

		return (
			<div className="flex flex-wrap border-b border-gray-200 dark:border-gray-700">
				{type.map((currentType, index) => {
					const currentTypeObject = getSchemaTypeFromInputType(currentType)

					return (
						<button
							className={"font-semibold py-4 px-6 " + (index === selectedTypeIndex ? "border-b-2 border-theme-500 translate-y-px" : null)}
							key={index}
							onClick={() => {
								onChange(getDefaultSchemaObject(currentType, 1))
								setSelectedTypeIndex(index)
							}}
						>
							{currentTypeObject?.label}
						</button>
					)
				})}
			</div>
		)
	}

	if (isOpen || forceOpen) {
		return (

			<fieldset ref={ref}>
				{getTypeSwitchers()}

				<div className={(forceOpen ? "" : "p-6") + " grid gap-8"}>
					{schemaType?.properties?.map((property, propertyIndex) => {
						if (property.repeatable) {
							return (
								<div key={propertyIndex}>
									{
										getPropertyValue(property).map((value, valueIndex) => (
											<Label {...{ ...property, label: valueIndex ? "" : property.label }} key={valueIndex}>
												<div className="relative">
													<Input
														{...property}
														value={value}
														onChange={newVal => setPropertyValue(property, newVal, valueIndex)}
													/>
													<IconButton label={"Remove " + property.label} className="absolute top-0 right-1 text-gray-500 hover:text-red" onClick={() => removeAdditionalProperty(property, valueIndex)}>
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
															<path d="M0,0H24V24H0Z" fill="none" />
															<path d="M19,13H5V11H19Z" fill="currentColor" />
														</svg>
													</IconButton>
												</div>
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
				</div>
			</fieldset>

		)
	}
	else {
		return (

			<button onClick={() => setIsOpen(!isOpen)} className="inputSchemaOpenButton h-16 w-full">
				<div className="flex items-center gap-2 p-4 max-w-sm overflow-clip">
					{schemaType?.properties?.filter(prop => prop.feature).map((property, index) => {
						let previewLabel = property.preview || value[property.property] || property.label;
						previewLabel = typeof previewLabel === 'object' ? property.preview || property.label : previewLabel;

						return (

							<span className={property.feature === 'strong' ? "font-medium whitespace-nowrap" : "font-regular opacity-50 truncate"} key={index}>
								{previewLabel}
							</span>

						)
					})}
				</div>
			</button>

		)
	}
}