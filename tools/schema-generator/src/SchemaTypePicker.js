import React from "react"
import SchemaTypePreview from "./SchemaTypePreview"

export default function SchemaTypePicker({
	types = [],
	onChange = () => { }
}) {
	types.sort((a, b) => a.label.localeCompare(b.label))

	return (
		<div className="grid gap-8 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4">
			{
				types.map((type, index) => (
					<SchemaTypePreview type={type} onClick={() => onChange(type.type)} key={index} />
				))
			}
		</div>
	)
}