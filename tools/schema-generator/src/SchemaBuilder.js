import React, { useState } from "react"

import Input from "./Input";
import Button from "./Button";
import ClipboardButton from "./ClipboardButton";
import LinkList from "./LinkList";
import SchemaPreview from "./SchemaPreview";
import { getDefaultSchemaObject, objectToSchemaMarkup, getSchemaTypeFromInputType } from "./schema-helpers";

export default function SchemaBuilder({
	schemaType = '',
	setSchemaType = () => { },
}) {
	const defaultSchemaObject = getDefaultSchemaObject(schemaType);
	const [userSchema, setUserSchema] = useState(defaultSchemaObject);

	const schemaTypeObject = getSchemaTypeFromInputType(schemaType);
	const schemaMarkup = objectToSchemaMarkup(userSchema);

	const resetSchema = () => {
		setSchemaType(undefined)
		setUserSchema(defaultSchemaObject)
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

				<div className="mt-10">
					{schemaType &&
						<Input
							value={userSchema}
							onChange={setUserSchema}
							type={schemaType}
							forceOpen
						/>
					}
				</div>
			</div>

			<div>
				<div className="sticky top-16 [.admin-bar_&]:top-24">
					<SchemaPreview markup={schemaMarkup} />

					<div className="grid gap-12 mt-6">
						<div>
							<ClipboardButton content={schemaMarkup} />
						</div>

						<LinkList title="Learn more about this Schema Type" links={schemaTypeObject?.links} />

						<LinkList title="Validate your Schema Markup" links={[
							{
								url: "https://validator.schema.org/",
								label: "Schema.org Markup Validator"
							},
							{
								url: "https://search.google.com/test/rich-results",
								label: "Google's Rich Results Test"
							}
						]} />
					</div>
				</div>
			</div>
		</div>
	)
}