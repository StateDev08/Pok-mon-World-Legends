$(document).ready (function () {
 const tableLanguage = ['pt','de','en','pl','ru','zh'].includes(document.documentElement.lang) ? document.documentElement.lang : 'pt';
	$('[title]').tooltip({
		container: 'body',
		html: true
	});

	$('#example').dataTable({
		"bStateSave": true,
		"paging": false,
		"oLanguage": {
			"sUrl": 'public/translations/datatables-' + tableLanguage + '.json'
		},
		searching: false,
		ordering: true,
		info: false,
		"columnDefs": [{
			"targets": 'no-sort',
			"orderable": false,
		}]
	});
	
	$('#example2').dataTable({
		"bStateSave": true,
		"paging": true,
		"oLanguage": {
			"sUrl": 'public/translations/datatables-' + tableLanguage + '.json'
		}
	});
	
	$('#to_top').click(function () {
		$("html, body").animate({
			scrollTop: 0
		}, 600);
	});

	$('input[type="radio"]:visible').iCheck({
		radioClass: 'iradio_square-blue',
	});

	$(".colorbox-privacy").colorbox({
		width: "800",
		height: "600",
		iframe: true
	});

	$(".colorbox-rules").colorbox({
		width: "800",
		height: "600",
		iframe: true
	});

	$(".colorbox-terms").colorbox({
		width: "800",
		height: "600",
		iframe: true
	});

	if (window.history.replaceState) window.history.replaceState(null, null, window.location.href);

    refresh = setTimeout(function () { location.href = document.baseURI; }, 1200000);
});