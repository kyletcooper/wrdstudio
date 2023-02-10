import React from "react"
import { isInputTypeSchema, getSchemaTypeFromInputType } from "./InputHelpers";

export default function InputIcon({
	type = ''
}) {
	if (isInputTypeSchema(type)) {
		const schemaType = getSchemaTypeFromInputType(type);
		return (
			<div dangerouslySetInnerHTML={{ __html: schemaType?.icon }}></div>
		);
	}

	switch (type) {
		case 'text':
			return (
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
					<g>
						<rect width="24" height="24" fill="none" />
					</g>
					<g>
						<path d="M2.5,4V7h5V19h3V7h5V4Zm19,5h-9v3h3v7h3V12h3Z" fill="currentColor" />
					</g>
				</svg>
			);

		case 'datetime-local':
			return (
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
					<path d="M0,0H24V24H0Z" fill="none" />
					<path d="M17,12H12v5h5ZM16,1V3H8V1H6V3H5A1.991,1.991,0,0,0,3.01,5L3,19a2,2,0,0,0,2,2H19a2.006,2.006,0,0,0,2-2V5a2.006,2.006,0,0,0-2-2H18V1Zm3,18H5V8H19Z" fill="currentColor" />
				</svg>
			);

		case 'url':
			return (
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
					<path d="M0,0H24V24H0Z" fill="none" />
					<path d="M3.9,12A3.1,3.1,0,0,1,7,8.9h4V7H7A5,5,0,0,0,7,17h4V15.1H7A3.1,3.1,0,0,1,3.9,12ZM8,13h8V11H8Zm9-6H13V8.9h4a3.1,3.1,0,1,1,0,6.2H13V17h4A5,5,0,0,0,17,7Z" fill="currentColor" />
				</svg>
			);

		case 'select':
			return (
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
					<path d="M0,0H24V24H0Z" fill="none" />
					<path d="M3,13H5V11H3Zm0,4H5V15H3ZM3,9H5V7H3Zm4,4H21V11H7Zm0,4H21V15H7ZM7,7V9H21V7Z" fill="currentColor" />
				</svg>

			)
	}
}