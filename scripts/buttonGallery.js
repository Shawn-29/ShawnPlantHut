+function() {

	function ImgChange() {
		let newId = "largePhoto";
		let newSmallId = "smallPhoto";

		/* Append numeric identifier based on clicked button */
		switch (this.id) {
			case "smallPhoto2": newId = newId.concat("2"); newSmallId = newSmallId.concat("2"); break;
			case "smallPhoto3": newId = newId.concat("3"); newSmallId = newSmallId.concat("3"); break;
			case "smallPhoto4": newId = newId.concat("4"); newSmallId = newSmallId.concat("4"); break;
			default: newId = newId.concat("1"); newSmallId = newSmallId.concat("1");
		}

		/* Remove selection styling from previous image */
		document.getElementById(lastSmallId).style.outline = "2px dotted #f00";
		document.getElementById(lastSmallId).style.zIndex = "0";

		/* Hide previous gallery image */
		document.getElementById(lastLargeId).style.display = "none";

		/* Add selection styling to newly selected image */
		document.getElementById(newSmallId).style.outline = "2px solid #0f0";
		document.getElementById(newSmallId).style.zIndex = "1";

		/* Reveal new gallery image */
		document.getElementById(newId).style.display = "inline";

		/* Retain new selection and gallery image */
		lastLargeId = newId;
		lastSmallId = newSmallId;
	}

	/* Previously clicked button identifiers */
	let lastLargeId = "largePhoto1";
	let lastSmallId = "smallPhoto1";

	/* Make the photo gallery's thumbnails active */
	const photoGallery = document.getElementById('photo-gallery');

	if (photoGallery) {
		const smImages = photoGallery.getElementsByClassName('thumbnail');

		for (const image of smImages) {
			image.addEventListener('click', ImgChange.bind(image), false);
		}
	}
}();