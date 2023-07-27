
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
	$("#isian4").hide();
	detail_score('score1','Leadership Role');
	detail_score('score2','Need to Control Others');
	detail_score('score3','Ease in Decision Making');
	get_list_aspek('aspek1','Leadership Role');
	get_list_aspek('aspek2','Need to Control Others');
	get_list_aspek('aspek3','Ease in Decision Making');
	$('#det_list').val('LEADERSHIP');

	$('#det_list').on('change', function (e) {
		var isi=$('#det_list').find('option:selected').val();
		show_data(isi);
	
	});
}
function show_data(isi)
{
	$("#isian3").show();
	$("#isian4").hide();
	if(isi=='LEADERSHIP')
	{
		detail_score('score1','Leadership Role');
		detail_score('score2','Need to Control Others');
		detail_score('score3','Ease in Decision Making');
		get_list_aspek('aspek1','Leadership Role');
		get_list_aspek('aspek2','Need to Control Others');
		get_list_aspek('aspek3','Ease in Decision Making');
	}
	if(isi=='TEMPERAMENT')
	{
		detail_score('score1','Need for Change');
		detail_score('score2','Emotional Resistant');
		detail_score('score3','Need to be Forceful');
	
		get_list_aspek('aspek1','Need for Change');
		get_list_aspek('aspek2','Need to Control Others');
		get_list_aspek('aspek3','Need to be Forceful');
	}
	if(isi=='WORK STYLE')
	{
		detail_score('score1','Theoretical Type');
		detail_score('score2','Interest in Working With Details');
		detail_score('score3','Organized Type');
		get_list_aspek('aspek1','Theoretical Type');
		get_list_aspek('aspek2','Interest in Working With Details');
		get_list_aspek('aspek3','Organized Type');
	}
	if(isi=='WORK DIRECTION')
	{
		detail_score('score1','Need to Finish Task');
		detail_score('score2','Hard Intense Worked');
		detail_score('score3','Need To Achieve');
		get_list_aspek('aspek1','Need to Finish Task');
		get_list_aspek('aspek2','Hard Intense Worked');
		get_list_aspek('aspek3','Need To Achieve');
	}
	if(isi=='ACTIVITY')
	{
		detail_score('score1','Pace');
		detail_score('score2','Vigorous Type');
		
		get_list_aspek('aspek1','Pace');
		get_list_aspek('aspek2','Vigorous Type');
		
		$("#isian3").hide();
	}
	if(isi=='FELLOWERSHIP')
	{
		detail_score('score1','Need to Support Authority');
		detail_score('score2','Need for Rules and Supervision');
		
		get_list_aspek('aspek1','Need to Support Authority');
		get_list_aspek('aspek2','Need for Rules and Supervision');
		
		$("#isian3").hide();
		//document.getElementById("aspek3Content").innerHTML = '&nbsp;';
	}
	if(isi=='SOCIAL NATURE')
	{
		$("#isian4").show();
		detail_score('score1','Need to be Noticed');
		detail_score('score2','Social Extension');
		detail_score('score3','Need to Belong to Groups');
		detail_score('score4','Need for Closeness and Affection');
		get_list_aspek('aspek1','Need to be Noticed');
		get_list_aspek('aspek2','Social Extension');
		get_list_aspek('aspek3','Need to Belong to Groups');
		get_list_aspek('aspek4','Need for Closeness and Affection');
	}
}


function get_list_aspek(idtable,det)
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
		
		columns: [
			
			{ data: "score", title: "Score" },
			{ data: "deskripsi", title: "Deskripsi" } 
		],
		
		processing: true,
		serverSide: true,
		ajax: {
			data :{aspek:det},
			url: base_url+"/psikotes/list_aspek",
			type: 'get',
			dataType: 'json',
			dataSrc:""
		},
	});


}

function detail_score(idtable,det)
{

	$.ajax({
		data :{aspek:det},
		url : base_url+"/psikotes/list_detailscore",
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

                var get_val= parseInt(dt.score) || 0;
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
				tooltips: {
					enabled: true
				},
				
				hover: {
					animationDuration: 1
				},
				legend: {
					display: false
					
				},
                title: {
					display: true,
					text: det
					
				},
				scales: {
					yAxes: [{
						ticks: {
						
						beginAtZero: true,
						max:10,
						},
					}],
					
						xAxes: [{
							barThickness :25
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
												ctx.fillText(data, bar._model.x, bar._model.y - 5);
											});
										});
									}
								},lineAt : 100
				
			};
			document.getElementById(idtable+"Content").innerHTML = '&nbsp;';
			document.getElementById(idtable+"Content").innerHTML = '<canvas id="'+idtable+'" height="150px" ></canvas>';
	
			// Code to draw Chart
			var ctx = document.getElementById(idtable).getContext('2d');
			
			
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
		}
		});
		
}
