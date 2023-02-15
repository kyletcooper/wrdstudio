import { useState, useEffect } from "react";

export default function useClickOff(ref) {
	const [isOpen, setIsOpen] = useState(false);

	useEffect(() => {
		const handleClickOutside = (event) => {
			if (ref.current && !ref.current.contains(event.target)) {
				setIsOpen(false);
			}
		};

		document.addEventListener('click', handleClickOutside, true);

		return () => {
			document.removeEventListener('click', handleClickOutside, true);
		};
	}, []);

	return [isOpen, setIsOpen];
}