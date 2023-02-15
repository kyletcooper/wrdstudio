import React, { useContext } from "react";

import InputSchema from "./InputSchema";
import InputSelect from "./InputSelect";
import InputDefault from "./InputDefault";
import InputBoolean from "./InputBoolean";
import { isInputTypeSchema } from "./schema-helpers";

export default function Input(props) {
	if (isInputTypeSchema(props.type)) {
		return (<InputSchema {...props} />);
	}

	switch (props.type) {
		case 'select':
			return (<InputSelect {...props} />);

		case 'boolean':
			return (<InputBoolean {...props} />)

		default:
			return (<InputDefault {...props} />);
	}
}