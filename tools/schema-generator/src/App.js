import React, { useState } from "react"
import ClipboardButton from "./ClipboardButton";

import Input from "./Input"
import InputWrapper from "./InputWrapper";
import schema from './schemas.json'
import { getSchemaTypeFromInputType } from "./InputHelpers";
import { objectToSchemaMarkup } from "./schemaValidator";

export default function App() {
	const defaultSchemaObject = { "@context": "https://schema.org", };
	const [schemaType, setSchemaType] = useState();
	const [formValues, setFormValues] = useState(defaultSchemaObject);

	const schemaTypeOptions = schema.types.filter(type => type.generatable).map(type => {
		return {
			label: type.label,
			value: "Schema:" + type.type,
		}
	})

	const schemaTypeObject = getSchemaTypeFromInputType(schemaType);
	const schemaMarkup = objectToSchemaMarkup(formValues);

	const resetSchema = (schemaType) => {
		setSchemaType(schemaType)
		setFormValues(defaultSchemaObject)
	}

	return (
		<div className="grid lg:grid-cols-2 gap-12">
			<fieldset>
				<InputWrapper label="Schema Type" type="select" help="Choose one of the structured data types that Google supports." required>
					<Input type="select" value={schemaType} options={schemaTypeOptions} onChange={resetSchema} placeholder='Choose a Schema Type...' />
				</InputWrapper>

				<hr className="my-12 border-gray-300" />

				{schemaType &&
					<Input
						value={formValues}
						onChange={setFormValues}
						type={schemaType}
						forceOpen
					/>
				}
			</fieldset>

			<div>
				<div className="sticky top-16 [.admin-bar_&]:top-24">
					<code className="block bg-gray-800 rounded-md text-white font-mono max-h-[50vh] overflow-x-hidden overflow-y-auto">
						<header className="bg-gray-900 text-sm py-2 px-6">
							<h2>Schema Output</h2>
						</header>

						<pre className="block p-6">{schemaMarkup}</pre>
					</code>

					<div className="grid gap-6 xl:grid-cols-2 mt-6">
						<div>
							<ClipboardButton content={schemaMarkup} />
						</div>

						{schemaTypeObject?.links?.length &&
							<div>
								<h2 className="text-lg font-semibold mb-2">Learn more about this schema type</h2>
								<ul class="flex flex-col gap-2">
									{schemaTypeObject?.links.map(link =>
										<li>
											<a href={link.href} target="_blank" className="text-theme-500 text-medium">
												{link.label}
											</a>
										</li>
									)}
								</ul>
							</div>
						}
					</div>
				</div>
			</div>
		</div>
	);
}