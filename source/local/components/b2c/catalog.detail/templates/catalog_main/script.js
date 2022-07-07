$.ajax({
	url: '/ajax/load-offers-filter.php',
	method: 'post',
	dataType: 'json',
	success: function (data) {
		$('#offers-filter').html(data.html);
		$('#offers-filter').fadeIn();
	}
});
