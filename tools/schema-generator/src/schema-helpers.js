import schemaTypes from './schema-types.json'

export function getSchemaTypes() {
	return schemaTypes;
}

export function getGeneratableSchemaTypes() {
	return schemaTypes.types.filter(type => type.generatable);
}

export function isInputTypeSchema(inputType) {
	return inputType?.startsWith('Schema:');
}

export function getSchemaTypeFromInputType(inputType) {
	return schemaTypes.types.filter(schemaType => schemaType.type === inputType)[0];
}

const shouldIncludeInSchema = value => {
	if (typeof value === 'undefined' || value === null) {
		// Don't include not-included values
		return false;
	}

	if (typeof value === 'string' && value.trim() === '') {
		// Don't include empty values.
		return false;
	}

	if (Array.isArray(value)) {
		if (value.length === 0) {
			return false;
		}
	}

	if (typeof value === 'object' && !Array.isArray(value)) {
		const subOject = objectToSchemaObject(value);
		const subObjectKeys = Object.keys(subOject);

		if (subObjectKeys.length === 1 && subObjectKeys.includes('@type')) {
			// Sub object that only has a type and no other details.
			return false;
		}
	}

	return true;
}

export const objectToSchemaObject = (original) => {
	let newObject = {};

	Object.keys(original).map(key => {
		let value = original[key];

		if (Array.isArray(value)) {
			value = value.filter(shouldIncludeInSchema);
		}

		if (typeof value === 'object' && !Array.isArray(value)) {
			value = objectToSchemaObject(value);
		}

		if (shouldIncludeInSchema(value)) {
			newObject[key] = value;
		}
	})

	return newObject;
}

export const objectToSchemaMarkup = (original) => {
	return '<script type="application/ld+json">\n' + JSON.stringify(objectToSchemaObject(original), null, "\t") + '\n</script>';
}

export const getDefaultSchemaObject = (schemaType) => {
	const schemaTypeObject = getSchemaTypeFromInputType(schemaType);
	let defaultSchemaObject = { "@context": "https://schema.org", };

	// We don't currently go into sub-schema objects since they won't be included if the user doesn't provide any data on them.
	schemaTypeObject.properties.forEach(property => {
		if (property.hasOwnProperty('default')) {
			defaultSchemaObject[property.property] = property.default;
		}
	})

	return defaultSchemaObject
}