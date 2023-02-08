const shouldIncludeInSchema = value => {
	if (typeof value === undefined || typeof value === null) {
		// Don't include not-included values
		return false;
	}

	if (typeof value === 'string' && value.trim() === '') {
		// Don't include empty values.
		return false;
	}

	if (typeof value === 'object') {
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

		if (typeof value === 'object') {
			value = objectToSchemaObject(value);
		}

		if (shouldIncludeInSchema(value)) {
			newObject[key] = value;
		}
	})

	return newObject;
}

export const objectToSchemaMarkup = (original) => {
	// console.log(original);
	return '<script type="application/ld+json">\n' + JSON.stringify(objectToSchemaObject(original), null, "\t") + '\n</script>';
}