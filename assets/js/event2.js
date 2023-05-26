
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
	
	get_list_acara(1,'weblist1');
	get_list_acara(2,'weblist2');
	get_list_acara(3,'weblist3');
    //get_list_event();
    sum_event(1);
	sum_event(2);
	sum_event(3);

	sum_rev(1);
	sum_rev(2);
	sum_rev(3);
	//test_pie();
    
}



function get_list_acara(bulan,idtable)
{
	$("#"+idtable).DataTable({
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
			{ data: "acara", title: "Title" } 
		],
		
		processing: true,
		serverSide: true,
		ajax: {
			data :{bulan:bulan},
			url: base_url+"/event/list_acara",
			type: 'post',
			dataType: 'json',
			dataSrc:""
		},
	});


}

function get_list_acara_det(event_id,tema,bulanid)
{
	
	
	$("#detWorkflow").modal('show');
	$('#tabel_det').hide();
	$("#StatusTitle").text(tema);
	
	var table= $("#eventlistdet").DataTable({
		destroy: true,
		paging: false,
		info: false,
		searching: false,
		responsive: true,
		"createdRow": function( row, data, dataIndex){
		
			$(row).css({"background-color":data['warna'] })
		
		},
		
		columns: [
			
			{ data: "nama", title: "Name" },
			{ data: "bm", title: "BM" },
			{ data: "progress", title: "Progress" },
			{ data: "null", title: "" ,defaultContent: '<button>>></button>'}
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
    $('#eventlistdet').on('click', 'button', function () {
		$('#tabel_det').show();
        var data = table.row($(this).parents('tr')).data();
		if(data['progress'] != 0){
			
			var wfid=data['workflowid'];
			$("#StatusTitleDet").text(data['nama']);
			get_task_det(event_id,wfid);
		}
		else
		{
			//alert('No Progress');
			$('#tabel_det').hide();
			//get_task_det(0,0);
		}
		
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
}

function nl2br (str, is_xhtml) {
    if (typeof str === 'undefined' || str === null) {
        return '';
    }
    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
}
function get_task_det(event_id,workflowid)
{
	var table=$("#task_det").DataTable({
		destroy: true,
		paging: false,
		info: false,
		searching: false,
		responsive: true,
		ordering: true, // Set true agar bisa di sorting
		order: [[ 0, 'asc' ]], 
		columns: [
			{ data: "detail", title: "Task" },
			{ data: "stt", title: "Status" } ,
			
			{ data: "null", title: "" ,defaultContent: '<button>>></button>'}
		],
		
		processing: true,
		serverSide: true,
		ajax: {
			data :{workflowid:workflowid,event_id:event_id},
			url: base_url+"/event/list_task_det",
			type: 'post',
			dataType: 'json',
			dataSrc:""
		},
	});
	
	$('#task_det').on('click', 'button', function () {
        var data = table.row($(this).parents('tr')).data();
		$('#kegiatan').html(nl2br(data['kegiatan']));
		//$("#kegiatan").text(data['kegiatan']);
		$("#det_kegiatan").modal('show');
		
		//alert(data['kegiatan']);
    });


}

function sum_event(bulan)
{

	$.ajax({
		data :{bulan:bulan},
		url : base_url+"/event/sum_event",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt= [];
			const warna= [];
			
            for (var dt of data) {
                var cb = dt.nama;
                labeldt.push(cb)

				var color = dt.warna;
                warna.push(color)

                var get_val= parseInt(dt.jum) || 0;
                val_dt.push(get_val)

            }
			
			var myData = {
				labels:labeldt,
				datasets: [{
					fill: true,
					backgroundColor: warna,
					data: val_dt,
				}]
			};
	
			var myoption = {
					responsive: true, 
					maintainAspectRatio: false,
					legend: {
						position : 'bottom',
						labels : {
							fontColor: 'rgb(154, 154, 154)',
							fontSize: 10,
							usePointStyle : true,
							padding: 20
						}
					},
					pieceLabel: {
						render: 'value',
						fontColor: 'white',
						fontSize: 10,
					},
					tooltips: false,
					layout: {
						padding: {
							left: 20,
							right: 20,
							top: 20,
							bottom: 20
						}
					}
	
			};
			// Code to draw Chart
			var ctx = document.getElementById('event'+bulan).getContext('2d');
			
			
			var myChart = new Chart(ctx, {
				type: 'pie',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
		}
		});

}

function sum_rev(bulan)
{

	$.ajax({
		data :{bulan:bulan},
		url : base_url+"/event/sum_event",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt= [];
			var tot=0;
            for (var dt of data) {
                var cb = dt.nama;
                labeldt.push(cb)

                var get_val= parseInt(dt.rev) || 0;
                val_dt.push(get_val)

				tot=tot+get_val;

            }
			
			var myData = {
				labels:labeldt,
				datasets: [{
					fill: true,
					backgroundColor: ['#FAA491', '#91E8FA', '#AEFA91', '#F291FA'],
					data: val_dt,
				}]
			};
	
			var myoption = {
				tooltips: {
					enabled: true
				},
				title: {
					display: true,
					text: 'Total :'+number_format(tot, 0, ',', ' ')+' Juta'
					
				},
				hover: {
					animationDuration: 1
				},
				legend: {
					display: false
					
				},
				scales: {
					yAxes: [{
						ticks: {
						
						beginAtZero: true
						
						},
					}],
					
						xAxes: [{
							barThickness :30
						}]
					},
				animation: {
				duration: 1,
				onComplete: function () {
					var chartInstance = this.chart,
						ctx = chartInstance.ctx;
						ctx.textAlign = 'center';
						ctx.fillStyle = "rgba(0, 0, 0, 1)";
						ctx.textBaseline = 'bottom';
						// Loop through each data in the datasets
						this.data.datasets.forEach(function (dataset, i) {
							var meta = chartInstance.controller.getDatasetMeta(i);
							meta.data.forEach(function (bar, index) {
								var data = dataset.data[index];
								ctx.fillText(data, bar._model.x, bar._model.y -10);
							});
						});
					}
				}
			};
			// Code to draw Chart
			var ctx = document.getElementById('event_rev'+bulan).getContext('2d');
			
			
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
		}
		});
		
}



