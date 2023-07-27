
$(function() {
   
    load_chart();
	
});

function number_format(number, decimals, dec_point, thousands_sep) {
	// *     example: number_format(1234.56, 2, ',', ' ');
	// *     return: '1 234,56'
		number = (number + '').replace(',', '').replace(' ', '');
		var n = !isFinite(+number) ? 0 : +number,
				prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
				sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
				dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
				s = '',
				toFixedFix = function (n, prec) {
					var k = Math.pow(10, prec);
					return '' + Math.round(n * k) / k;
				};
		// Fix for IE parseFloat(0.55).toFixed(0) = 0;
		s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
		if (s[0].length > 3) {
			s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
		}
		if ((s[1] || '').length < prec) {
			s[1] = s[1] || '';
			s[1] += new Array(prec - s[1].length + 1).join('0');
		}
		return s.join(dec);
}

function load_chart()
{
	get_list_acara();

}



function get_list_acara()
{
	$("#listevent").DataTable({
		destroy: true,
		paging: false,
		info: false,
		searching: false,
		responsive: true,
		pageLength: 10,
		lengthMenu: [10, 25, 50, 75],
		ordering: true, // Set true agar bisa di sorting
		order: [[ 0, 'asc' ]],
		columns: [
			{  
				"data": null,
				"class": "align-top",
				"orderable": false,
				"searchable": false,
				"render": function (data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				}  
			},
			{ data: "tema", title: "Title" } ,
			{ data: "schedule", title: "Schedule" } 
		],
		
		processing: true,
		serverSide: true,
		ajax: {
			url: base_url+"/income/list_event",
			type: 'post',
			dataType: 'json',
			dataSrc:""
		},
	});


}


