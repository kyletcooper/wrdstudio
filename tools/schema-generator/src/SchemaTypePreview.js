import React from "react"

export default function SchemaTypePreview({
	type = [],
	onClick = () => { }
}) {
	return (
		<button className="group/preview flex flex-col text-left rounded-lg border border-gray-300 bg-white dark:bg-gray-900 dark:border-gray-800 p-6" onClick={onClick}>
			<div className="rounded-md border border-gray-300 dark:border-gray-800 w-full aspect-video relative overflow-hidden">
				<img className="bg-gray-50 dark:bg-gray-800 absolute inset-0 w-full h-full object-cover object-center group-hover/preview:scale-105 transition-transform" src={type.thumbnail} />
			</div>

			<h3 className="text-lg font-medium mt-4">
				{type.label}
			</h3>

			{type.description &&
				<p className="text-sm text-gray-600 dark:text-gray-400 mt-1">
					{type.description}
				</p>
			}
		</button>
	)
}