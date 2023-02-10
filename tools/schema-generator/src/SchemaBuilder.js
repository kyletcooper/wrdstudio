import React, { useState } from "react"

import Input from "./InputWrapper"
import Button from "./Button";
import ClipboardButton from "./ClipboardButton"
import { getSchemaTypeFromInputType } from "./InputHelpers";
import { objectToSchemaMarkup } from "./schemaValidator";

export default function SchemaBuilder({
	schemaType = '',
	setSchemaType = () => { },
}) {
	const defaultSchemaObject = { "@context": "https://schema.org", };
	const [formValues, setFormValues] = useState(defaultSchemaObject);

	const schemaTypeObject = getSchemaTypeFromInputType(schemaType);
	const schemaMarkup = objectToSchemaMarkup(formValues);

	const resetSchema = () => {
		setSchemaType(undefined)
		setFormValues(defaultSchemaObject)
	}

	return (
		<div className="grid lg:grid-cols-2 gap-12">
			<div>
				<h2 className="text-4xl font-semibold mb-4">
					{schemaTypeObject.label} Schema Generator
				</h2>

				<Button onClick={resetSchema} appearance="link">
					<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><path d="M0 0h24v24H0z" fill="none" /><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z" /></svg>
					Choose new Schema Type
				</Button>

				<fieldset className="mt-10">
					{schemaType &&
						<Input
							value={formValues}
							onChange={setFormValues}
							type={schemaType}
							forceOpen
						/>
					}
				</fieldset>
			</div>

			<div>
				<div className="sticky top-16 [.admin-bar_&]:top-24">
					<code className="block bg-gray-800 dark:bg-gray-700 rounded-md text-white font-mono max-h-[50vh] overflow-y-auto">
						<header className="bg-gray-900 dark:bg-gray-800 text-sm py-2 px-6">
							<h2 className="font-semibold">Schema Output</h2>
						</header>

						<pre className="block p-6 whitespace-pre-wrap">{schemaMarkup}</pre>
					</code>

					<div className="grid gap-6 xl:grid-cols-2 mt-6">
						<div>
							<ClipboardButton content={schemaMarkup} />
						</div>

						{schemaTypeObject?.links?.length > 0 &&
							<div>
								<h2 className="text-lg font-semibold mb-2">Learn more about this schema type</h2>
								<ul className="flex flex-col gap-2">
									{schemaTypeObject?.links.map((link, index) =>
										<li key={index}>
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
	)
}