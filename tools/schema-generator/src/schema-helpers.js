import schemaTypes from './schema-types.json'

export function getSchemaTypes() {
	return schemaTypes;
}

export function getGeneratableSchemaTypes() {
	return schemaTypes.types.filter(type => type.generatable);
}

export function isInputTypeSchema(inputType) {
	// We only allow multiple types if the types are all schemas.
	return Array.isArray(inputType) || inputType?.startsWith('Schema:');
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

	if (typeof value === 'object' && !Array.isArray(value)) {
		const subOject = objectToSchemaObject(value);
		const subObjectKeys = Object.keys(subOject);

		if (subObjectKeys.length === 0 || (subObjectKeys.length === 1 && subObjectKeys.includes('@type'))) {
			// Sub object that only has a type and no other details.
			return false;
		}
	}

	if (Array.isArray(value)) {
		value = arrayToSchemaArray(value);

		if (value.length === 0) {
			return false;
		}
	}

	return true;
}

export const arrayToSchemaArray = (original) => {
	return original.map(item => typeof item === 'object' && !Array.isArray(original) ? objectToSchemaObject(item) : item).filter(shouldIncludeInSchema);
}

export const objectToSchemaObject = (original) => {
	let newObject = {};

	if (typeof original === 'object' && original !== null && !Array.isArray(original)) {
		Object.keys(original).map(key => {
			let value = original[key];

			if (Array.isArray(value)) {
				value = arrayToSchemaArray(value);
			}

			if (typeof value === 'object' && !Array.isArray(value)) {
				value = objectToSchemaObject(value);
			}

			if (shouldIncludeInSchema(value)) {
				newObject[key] = value;
			}
		})
	}

	return newObject;
}

export const objectToSchemaMarkup = (original) => {
	const schemaObject = objectToSchemaObject(original);
	return '<script type="application/ld+json">\n' + JSON.stringify(schemaObject, null, "\t") + '\n</script>';
}

export const getDefaultSchemaObject = (schemaType, depth = 0) => {
	const schemaTypeObject = getSchemaTypeFromInputType(schemaType);
	let defaultSchemaObject = {};

	if (depth === 0) {
		defaultSchemaObject["@context"] = "https://schema.org"
	}

	if (!schemaTypeObject) {
		return defaultSchemaObject;
	}

	schemaTypeObject.properties.forEach(property => {
		let propertyDefault;

		// Recursively get sub-object defaults
		if (isInputTypeSchema(property.type)) {
			let type = property.type;

			// Sub-object may have multiple allowed types, default to the first
			if (Array.isArray(type)) {
				type = type[0];
			}

			propertyDefault = getDefaultSchemaObject(type, depth + 1)
		}
		else if (property.hasOwnProperty('default')) {
			propertyDefault = property.default;
		}

		if (property.repeatable) {
			propertyDefault = [propertyDefault]
		}

		defaultSchemaObject[property.property] = propertyDefault;
	})

	return defaultSchemaObject
}