
$(function() {
    $( "#cari" ).click(function() {
		load_chart();
	});
    $( "#cari2" ).click(function() {
		load_chart();
	});
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
	var bulan=$('#bulan').find('option:selected').val();
	var tahun=$('#tahun').find('option:selected').val();
   
    get_list_acara(bulan,tahun);
    //get_list_event();
    
    
}



function get_list_acara(m,y)
{
	$("#weblist").DataTable({
		destroy: true,
		paging: false,
		info: false,
		searching: false,
		responsive: true,
		pageLength: 10,
		lengthMenu: [10, 25, 50, 75],
		ordering: true, // Set true agar bisa di sorting
		order: [[ 0, 'asc' ]], 
		// scrollX: true,
		// scrollCollapse: true,
		"createdRow": function( row, data, dataIndex){
		
				$(row).css({"background-color":data['warna'] })
			
		},
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
			{ data: "tanggal", title: "Date" },
			{ data: "start_time", title: "Start" },
			{ data: "finish_time", title: "Finish" },
			{ data: "acara", title: "Title" },
			{ data: "status", title: "Status" },
			{ data: "present", title: "Desc" }
		],
		
		processing: true,
		serverSide: true,
		ajax: {
			data :{bulan:m,tahun:y},
			url: base_url+"/event/list_acara",
			type: 'post',
			dataType: 'json',
			dataSrc:""
		},
	});


}

function get_list_acara_det(event_id,tema)
{
	$("#StatusTitle").text(tema);
	$("#eventlistdet").DataTable({
		destroy: true,
		paging: false,
		info: false,
		searching: false,
		responsive: true,
		pageLength: 10,
		lengthMenu: [10, 25, 50, 75],
		// scrollX: true,
		// scrollCollapse: true,
		
		columns: [
			{ data: "nama_workflow", title: "Workflow" },
			{ data: "bobot", title: "Progress" }
		],
		
		processing: true,
		serverSide: true,
		ajax: {
			data :{event_id:event_id},
			url: base_url+"/event/list_eventdet",
			type: 'post',
			dataType: 'json',
			dataSrc:""
		},
	});


}


function get_list_event()
{
	
	var table = $("#eventlist").DataTable({
		destroy: true,
		paging: false,
		info: false,
		searching: false,
		responsive: true,
		pageLength: 10,
		lengthMenu: [10, 25, 50, 75],
		// scrollX: true,
		// scrollCollapse: true,
		"createdRow": function( row, data, dataIndex){
		
				$(row).css({"background-color":data['warna'] })
			
		},
		columns: [
			{ data: "tipe_award", title: "Tipe" },
			{ data: "tema", title: "Tema" },
			{ data: "schedule", title: "Schedule" },
			{ data: "budget", title: "Budget" },
			{ data: "persen", title: "Progress",
            render: function (data, type, row, meta) {
                return type === 'display'
                    ? '<progress value="' + data + '" max="100"></progress>'
                    : data;
            } 
            },
            { data: "", title: "Persentase" },
		],
		columnDefs: [
            {
                targets: 5,
              
                defaultContent: '<button>click</button>',
            },
        ],
		processing: true,
		serverSide: true,
		ajax: {
			
			url: base_url+"/event/list_event",
			type: 'post',
			dataType: 'json',
			dataSrc:""
		},
	});

    $('#eventlist tbody').on('click', 'button', function () {
        var data = table.row($(this).parents('tr')).data();
        alert('ok');
    });


}


