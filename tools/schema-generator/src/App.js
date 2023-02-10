import React, { Fragment, useState } from "react"

import schema from './schemaTypes.json'
import SchemaTypePicker from "./schemaTypePicker";
import SchemaBuilder from "./SchemaBuilder";

export default function App() {
	const [schemaType, setSchemaType] = useState();

	const generatableSchemaTypes = schema.types.filter(type => type.generatable);

	return (
		<div className="bg-white border border-gray-300 shadow rounded-2xl p-8 lg:p-12 dark:bg-gray-900 dark:border-gray-800">
			{
				!schemaType ?
					<Fragment>
						<h2 className="text-4xl font-semibold mb-4">
							Choose a Structured Data Type
						</h2>

						<p className="text-gray-700 dark:text-gray-400 max-w-xl mb-12">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget consequat ante, sit amet laoreet lorem. Mauris mattis arcu sit amet elementum luctus. Donec rutrum volutpat nulla, id ultrices ligula congue non. Etiam cursus ex dolor, et auctor neque faucibus sit amet.
						</p>

						<SchemaTypePicker types={generatableSchemaTypes} onChange={setSchemaType} />
					</Fragment>
					:
					<SchemaBuilder {...{ schemaType, setSchemaType }}></SchemaBuilder>
			}
		</div>
	)
}