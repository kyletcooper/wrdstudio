(() => {

	const megamenuButtons = document.querySelectorAll("[data-megamenu-open]");

	const megamenuGetOpen = () => {
		return document.querySelectorAll(`[data-megamenu][open]`);
	}

	const megamenuCloseOpen = () => {
		megamenuGetOpen().forEach(megamenu => megamenu.close());
	}

	const megamenuGetAnchor = (id) => {
		return document.querySelector(`[data-megamenu-open="${id}"]`);
	}

	const megamenuPosition = id => {
		const megamenu = document.querySelector(`[data-megamenu="${id}"]`);
		const megamenuWidth  = megamenu.offsetWidth;

		const anchor = megamenuGetAnchor(id);
		const anchorRect = anchor.getBoundingClientRect();
		const anchorWidth  = anchor.offsetWidth;
		const anchorHeight  = anchor.offsetHeight;
		const anchorPadding = 20;

		const screenWidth = document.body.clientWidth;
		const screenPadding = 20;

		let left = anchorRect.left + ( 0.5 * anchorWidth ) - ( 0.5 * megamenuWidth);
		const dstOffScreenRight = screenWidth - ( left + megamenuWidth + screenPadding );

		left = Math.max(screenPadding, left);
		if (dstOffScreenRight < 0) {
            left -= Math.abs(dstOffScreenRight);
        }

		const arrowLeft = anchorRect.left - left;

		let top = anchorRect.bottom + anchorHeight + anchorPadding;

        megamenu.style.left = left + "px";
        megamenu.style.top = top + "px";
		megamenu.style.setProperty("--arrow-left", arrowLeft + "px");
	}

	const megamenuPositionAll = () => {
		document.querySelectorAll("[data-megamenu]").forEach(megamenu => {
			megamenuPosition(megamenu.dataset.megamenu);
		});
	}

	const megamenuOpen = id => {
		const megamenu = document.querySelector(`[data-megamenu="${id}"]`);

		megamenuCloseOpen();
		megamenu.show();

        megamenuPosition(id);
	}

	megamenuButtons.forEach(btn => {
		btn.addEventListener('mouseenter', () => {
			megamenuOpen( btn.dataset.megamenuOpen );
		});

		btn.addEventListener('focusin', () => {
			megamenuCloseOpen();
		});
	});

	document.addEventListener('keydown', e => {
		if(e.key == "ArrowDown" && document.activeElement.matches("[data-megamenu-open]")){
			// Enter modal
			megamenuOpen( document.activeElement.dataset.megamenuOpen );
			e.preventDefault();
		}
	});

	document.addEventListener('click', e => {
		if(!e.target.closest('[data-megamenu]')){
			// Click off modal.
			megamenuCloseOpen();
		}
	});

	window.addEventListener('resize', () => {
		megamenuPositionAll();
	});

	window.addEventListener('scroll', () => {
		megamenuCloseOpen();
	});

	megamenuPositionAll();

})();