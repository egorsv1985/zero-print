jQuery(document).ready(function () {
	var e = document.querySelectorAll('.form-phone')
	jQuery(e).inputmask({
		mask: ['+7 (999)-999-99-99', '8 (999) 999 99 99'],
		placeholder: '_',
	})
})
