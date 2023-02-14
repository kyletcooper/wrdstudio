import React from "react"
import { isInputTypeSchema, getSchemaTypeFromInputType } from "./schema-helpers";

export default function InputIcon({
	type = '',
	title = '',
	className = ''
}) {
	if (isInputTypeSchema(type)) {
		if (Array.isArray(type)) {
			type = type[0];
		}

		const schemaType = getSchemaTypeFromInputType(type);
		return (
			<div title={title} className={className} dangerouslySetInnerHTML={{ __html: schemaType?.icon }}></div>
		);
	}

	switch (type) {
		case 'datetime-local':
			return (
				<div title={title} className={className}>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
						<path d="M0,0H24V24H0Z" fill="none" />
						<path d="M17,12H12v5h5ZM16,1V3H8V1H6V3H5A1.991,1.991,0,0,0,3.01,5L3,19a2,2,0,0,0,2,2H19a2.006,2.006,0,0,0,2-2V5a2.006,2.006,0,0,0-2-2H18V1Zm3,18H5V8H19Z" fill="currentColor" />
					</svg>
				</div>
			);

		case 'time':
			return (
				<div title={title} className={className}>
					<svg xmlns='http://www.w3.org/2000/svg' height='24px' viewBox='0 0 24 24' width='24px' fill='currentColor'><path d='M0 0h24v24H0z' fill='none' /><path d='M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z' /><path d='M12.5 7H11v6l5.25 3.15.75-1.23-4.5-2.67z' /></svg>
				</div>
			)

		case 'url':
			return (
				<div title={title} className={className}>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
						<path d="M0,0H24V24H0Z" fill="none" />
						<path d="M3.9,12A3.1,3.1,0,0,1,7,8.9h4V7H7A5,5,0,0,0,7,17h4V15.1H7A3.1,3.1,0,0,1,3.9,12ZM8,13h8V11H8Zm9-6H13V8.9h4a3.1,3.1,0,1,1,0,6.2H13V17h4A5,5,0,0,0,17,7Z" fill="currentColor" />
					</svg>
				</div>
			);

		case 'tel':
			return (
				<div title={title} className={className}>
					<svg xmlns='http://www.w3.org/2000/svg' height='24px' viewBox='0 0 24 24' width='24px' fill='currentColor'>
						<path d='M0 0h24v24H0z' fill='none' /><path d='M20.01 15.38c-1.23 0-2.42-.2-3.53-.56-.35-.12-.74-.03-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z' />
					</svg>
				</div>
			)

		case 'number':
			return (
				<div title={title} className={className}>
					<svg xmlns='http://www.w3.org/2000/svg' enable-background='new 0 0 24 24' height='24px' viewBox='0 0 24 24' width='24px' fill='currentColor'>
						<g>
							<rect fill='none' height='24' width='24' />
						</g>
						<g>
							<path d='M7,15H5.5v-4.5H4V9h3V15z M13.5,13.5h-3v-1h2c0.55,0,1-0.45,1-1V10c0-0.55-0.45-1-1-1H9v1.5h3v1h-2c-0.55,0-1,0.45-1,1V15 h4.5V13.5z M19.5,14v-4c0-0.55-0.45-1-1-1H15v1.5h3v1h-2v1h2v1h-3V15h3.5C19.05,15,19.5,14.55,19.5,14z' />
						</g>
					</svg>
				</div>
			)

		case 'select':
			return (
				<div title={title} className={className}>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
						<path d="M0,0H24V24H0Z" fill="none" />
						<path d="M3,13H5V11H3Zm0,4H5V15H3ZM3,9H5V7H3Zm4,4H21V11H7Zm0,4H21V15H7ZM7,7V9H21V7Z" fill="currentColor" />
					</svg>
				</div>
			)

		case 'text':
		default:
			return (
				<div title={title} className={className}>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
						<g>
							<rect width="24" height="24" fill="none" />
						</g>
						<g>
							<path d="M2.5,4V7h5V19h3V7h5V4Zm19,5h-9v3h3v7h3V12h3Z" fill="currentColor" />
						</g>
					</svg>
				</div>
			);
	}
}