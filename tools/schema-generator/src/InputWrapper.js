import React, { useState } from "react";

import InputSchema from "./InputSchema";
import InputSelect from "./InputSelect";
import InputDefault from "./InputDefault";
import { isInputTypeSchema } from "./InputHelpers";

export default function Input(props) {
	const handleChange = (value) => {
		if (typeof props.onChange === 'function') {
			props.onChange(value);
		}
	}

	if (isInputTypeSchema(props.type)) {
		return (<InputSchema {...props} onChange={handleChange} />);
	}

	switch (props.type) {
		case 'select':
			return (<InputSelect {...props} onChange={handleChange} />);

		default:
			return (<InputDefault {...props} onChange={handleChange} />);
	}
}