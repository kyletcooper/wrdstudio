import React, { useState } from "react"
import IconButton from "./IconButton";

export default function InputBoolean({
	value = null,
	onChange = () => { },
}) {
	const [checked, setChecked] = useState(value);

	return (
		<div className='flex items-center justify-between gap-3 pr-1'>
			<button
				type="button"
				className="h-16 w-full text-left p-4"
				onClick={() => {
					onChange(!checked);
					setChecked(!checked);
				}}
			>
				{
					checked === null ?
						(
							<div className='flex items-center gap-3'>
								<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><g><rect fill="none" height="24" width="24" /></g><g><g><g><path d="M19,3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.1,3,19,3z M17,13H7v-2h10V13z" /></g></g></g></svg>
								Indeterminate
							</div>
						)
						:
						checked ?
							(
								<div className='flex items-center gap-3'>
									<svg xmlns='http://www.w3.org/2000/svg' height='24px' viewBox='0 0 24 24' width='24px' fill='currentColor'><path d='M0 0h24v24H0z' fill='none' /><path d='M19 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.11 0 2-.9 2-2V5c0-1.1-.89-2-2-2zm-9 14l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z' /></svg>
									True
								</div>
							) :
							(
								<div className='flex items-center gap-3'>
									<svg xmlns='http://www.w3.org/2000/svg' height='24px' viewBox='0 0 24 24' width='24px' fill='currentColor'><path d='M0 0h24v24H0z' fill='none' /><path d='M19 5v14H5V5h14m0-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z' /></svg>
									False
								</div>
							)
				}
			</button>

			<IconButton title="Reset" onClick={() => {
				onChange(null);
				setChecked(null);
			}}>
				<svg xmlns='http://www.w3.org/2000/svg' height='24px' viewBox='0 0 24 24' width='24px' fill='currentColor'><path d='M0 0h24v24H0z' fill='none' /><path d='M12.5 8c-2.65 0-5.05.99-6.9 2.6L2 7v9h9l-3.62-3.62c1.39-1.16 3.16-1.88 5.12-1.88 3.54 0 6.55 2.31 7.6 5.5l2.37-.78C21.08 11.03 17.15 8 12.5 8z' /></svg>
			</IconButton>
		</div>
	)
}