import React, { useState } from "react"
import InputIcon from "./InputIcon";

export default function Label({
	label = '',
	type = '',
	className = '',
	help = '',
	required = false,
	children
}) {
	const [isShowHelp, setIsShowHelp] = useState(false);

	if (type === 'hidden') {
		return null;
	}

	return (
		<div className={"labelWrapper block " + className}>
			<div className="flex items-center justify-between">
				<label className="font-medium text-sm mb-2">
					{label}
					{required && <span className="ml-1 text-red">*</span>}
				</label>

				{
					help &&
					<button className="text-gray-400 dark:text-gray-700 w-4 h-4 transition-colors hover:text-theme-500" aria-label="Show help message" type="button" onClick={() => setIsShowHelp(!isShowHelp)}>
						<svg className="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
							<path d="M0,0H24V24H0Z" fill="none" />
							<path d="M12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm1,17H11V17h2Zm2.07-7.75-.9.92A3.4,3.4,0,0,0,13,15H11v-.5a4.025,4.025,0,0,1,1.17-2.83l1.24-1.26A1.955,1.955,0,0,0,14,9a2,2,0,0,0-4,0H8a4,4,0,0,1,8,0A3.182,3.182,0,0,1,15.07,11.25Z" fill="currentColor" />
						</svg>
					</button>
				}
			</div>

			<div className="group px-4 gap-3 flex flex-row-reverse font-medium rounded border bg-white border-gray-300 dark:bg-gray-900 dark:border-gray-800 focus-within:border-theme-500 ring-0 focus-within:ring-2 ring-theme-100 dark:ring-theme-900 transition-all [&:has(.inputSchemaOpenButton)]:cursor-pointer [&:has(.inputSchemaOpenButton)]:hover:bg-theme-50 [&:has(.inputSchemaOpenButton)]:hover:text-theme-500 [&:has(.inputSchemaOpenButton)]:hover:border-theme-500 dark:[&:has(.inputSchemaOpenButton)]:hover:bg-theme-900">
				<div className="grow peer flex">
					{children}
				</div>
				<div className="flex items-center justify-center py-4 text-gray-400 dark:text-gray-700 peer-focus-within:text-theme-500 transition-colors" title={type}>
					<InputIcon type={type} />
				</div>
			</div>

			{
				isShowHelp &&
				<p className="pt-3 text-sm text-gray-600 dark:text-gray-500">
					{help}
				</p>
			}
		</div>
	)
}