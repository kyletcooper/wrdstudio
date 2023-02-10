import schema from './schemaTypes.json'

export function isInputTypeSchema(inputType) {
	return inputType?.startsWith('Schema:');
}

export function getSchemaTypeFromInputType(inputType) {
	return schema.types.filter(schemaType => schemaType.type === inputType)[0];
}