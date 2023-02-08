import schema from './schemas.json'

export function isInputTypeSchema(inputType) {
	return inputType?.startsWith('Schema:');
}

export function getSchemaTypeFromInputType(inputType) {
	inputType = inputType?.replace('Schema:', '');
	return schema.types.filter(schemaType => schemaType.type === inputType)[0];
}