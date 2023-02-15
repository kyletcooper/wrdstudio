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
		return children;
	}

	return (
		<div className={"labelWrapper block " + className}>
			{label &&
				<div className="flex items-center gap-3 mb-2">
					<InputIcon type={type} title={type} className="text-gray-300 dark:text-gray-800" />

					<label className="font-medium text-sm">
						{label}
						{required && <span className="ml-1 text-red">*</span>}
					</label>

					{
						help &&
						<button className="text-gray-400 dark:text-gray-700 w-4 h-4 ml-auto transition-colors hover:text-theme-500" aria-label="Show help message" type="button" onClick={() => setIsShowHelp(!isShowHelp)}>
							<svg className="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
								<path d="M0,0H24V24H0Z" fill="none" />
								<path d="M12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm1,17H11V17h2Zm2.07-7.75-.9.92A3.4,3.4,0,0,0,13,15H11v-.5a4.025,4.025,0,0,1,1.17-2.83l1.24-1.26A1.955,1.955,0,0,0,14,9a2,2,0,0,0-4,0H8a4,4,0,0,1,8,0A3.182,3.182,0,0,1,15.07,11.25Z" fill="currentColor" />
							</svg>
						</button>
					}
				</div>
			}

			<div className="mb-3 font-medium rounded border bg-white border-gray-300 dark:bg-gray-900 dark:border-gray-800 focus-within:border-theme-500 ring-0 focus-within:ring-2 ring-theme-100 dark:ring-theme-900 transition-all">
				{children}
			</div>

			{
				isShowHelp &&
				<p className="text-sm text-gray-600 dark:text-gray-500">
					{help}
				</p>
			}
		</div>
	)
}