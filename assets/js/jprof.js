$(function() {

	$( "#cari" ).click(function() {
		load_chart();
	});

    load_chart();
	comp_list();

	
});

function load_chart()
{
	var bulan=$('#bulan').find('option:selected').val();
	var tahun=$('#tahun').find('option:selected').val();
	nm_bulan= nama_bulan(bulan);
	$("#LabelAll").html(nm_bulan+" "+tahun);
	$("#calenderbulan").html(nm_bulan+" "+tahun);

	media_value(bulan,tahun);
	strategic_value(bulan,tahun);
    event_value(bulan,tahun);
	
	get_comp_list();

}
function get_comp_list()
{
	$("#complist").DataTable({
		destroy: true,
		processing: true,
		serverSide: true,
		paging: true,
		info: false,
		searching: true,
		
		pageLength: 10,
		lengthMenu: [10, 25, 50, 75],
		// scrollX: true,
		// scrollCollapse: true,
		"createdRow": function( row, data, dataIndex){
				$(row).css({"background-color":data['warna'] })
			
		},
		columns: [
			{ data: "name", title: "Company name" },
			{ data: "jumlah", title: "Revenue" ,className: "text-right"}
		],
		ajax: {
			
			url: base_url+"jprof/comp_list_tabel",
			type: 'post',
			dataType: 'json',
			dataSrc:""
		},
	});


}


function nama_bulan(m)
{
	var nm_bulan='january';
	if(m==1) nm_bulan='Jan';
	if(m==2) nm_bulan='Feb';
	if(m==3) nm_bulan='Mar';
	if(m==4) nm_bulan='Apr';
	if(m==5) nm_bulan='May';
	if(m==6) nm_bulan='Jun';
	if(m==7) nm_bulan='Jul';
	if(m==8) nm_bulan='Aug';
	if(m==9) nm_bulan='Sep';
	if(m==10) nm_bulan='Oct';
	if(m==11) nm_bulan='Nov';
	if(m==12) nm_bulan='Dec';
	return nm_bulan;


}

function media_value(m,y)
{
	
// chart value
$.ajax({
	data :{bulan:m,tahun:y,divisi:'1'},
	url : base_url+"jprof/chart_web_val",
	type : "GET",
	success : function(data)
	{
	
		data = JSON.parse(data);  
		
		const val_dt= [];
		const target_dt= [];
	
		for (var dt of data) {
			
			var get_val= parseInt(dt.jum) || 0;
			val_dt.push(get_val)

			var get_target= parseInt(dt.target) || 0;
			target_dt.push(get_target)

		}
		
		var myData = {
			
			datasets: [{
				label: "Value",
				fill: false,
				backgroundColor: '#dea4be',
				data: val_dt,
			},
			{
				label: "Target",
				fill: false,
				backgroundColor: '#b3507d',
				data: target_dt,
			}]
		};

		var myoption = {
			tooltips: {
				enabled: true
			},
			legend: {
				position: 'bottom'
			},
			responsive: true,
			scales: {
				yAxes: [{
					ticks: {
					stepSize: 100,
					beginAtZero: true
					},
				}],
				xAxes: [{
					barThickness :20
				}]
				}
				,
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
						}
		};
		// Code to draw Chart
		var ctx = document.getElementById('ChartMediaValue').getContext('2d');
		
		var myChart = new Chart(ctx, {
			type: 'bar',        // Define chart type
			data: myData,    	// Chart data
			options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
		});
}
});

}
function strategic_value(m,y)
{
	$.ajax({
		data :{bulan:m,tahun:y,divisi:'2'},
		url : base_url+"jprof/chart_web_val",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
          
            const val_dt= [];
			const val_dt_target = [];
		
            for (var dt of data) {
             
                var get_val= parseInt(dt.jum) || 0;
                val_dt.push(get_val)

				var get_val_trg= parseInt(dt.target) || 0;
                val_dt_target.push(get_val_trg)

            }
			
			var myData = {
				
				datasets: [{
					label: "Value",
					fill: false,
					backgroundColor: '#bd3758',
					data: val_dt,
				},
				{
					label: "Target",
					fill: false,
					backgroundColor: '#7d142e',
					data: val_dt_target,
				}]
			};
	
			var myoption = {
				tooltips: {
					enabled: true
				},
				legend: {
					position: 'bottom'
				},
				scales: {
					yAxes: [{
						ticks: {
						stepSize:100,
						beginAtZero: true
						},
					}],
					xAxes: [{
						barThickness :20
					}]
					}
					,
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
							}
			};
			// Code to draw Chart
			var ctx = document.getElementById('ChartStrategicValue').getContext('2d');
			
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
	}
	});

}

function event_value(m,y)
{
// chart value
$.ajax({
	data :{bulan:m,tahun:y,divisi:'3'},
	url : base_url+"jprof/chart_web_val",
	type : "GET",
	success : function(data)
	{
	
		data = JSON.parse(data);  
		
		const val_dt= [];
		const val_dt_target= [];
	
		for (var dt of data) {
			

			var get_val= parseInt(dt.jum) || 0;
			val_dt.push(get_val)

			var get_val_trgt= parseInt(dt.target) || 0;
			val_dt_target.push(get_val_trgt)


		}
		
		var myData = {
			
			datasets: [{
				label: "Val",
				fill: false,
				backgroundColor: '#F5B041',
				data: val_dt,
			},
			{
				label: "Target",
				fill: false,
				backgroundColor: '#DC7633',
				data: val_dt_target,
			}
			]
		};

		var myoption = {
			tooltips: {
				enabled: true
			},
			legend: {
				position: 'bottom'
			},
			scales: {
				yAxes: [{
					ticks: {
						stepSize:100,
					beginAtZero: true
					},
				}],
				xAxes: [{
					barThickness :20
				}]
				}
				,
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
						}
		};
		// Code to draw Chart
		var ctx = document.getElementById('ChartEventValue').getContext('2d');
		
		var myChart = new Chart(ctx, {
			type: 'bar',        // Define chart type
			data: myData,    	// Chart data
			options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
		});
	}
	});

}


function comp_list()
{
			//chart 3
		$.ajax({
			
			url : base_url+"bisnis/comp_list",
			type : "GET",
			success : function(data){
				data = JSON.parse(data);
			
				const labeldt2 = [];
				const val_dt2= [];
			
			
				for (var dt of data) {
					var cb = dt.name;
					labeldt2.push(cb)

					var get_val= parseInt(dt.jumlah) || 0;
					val_dt2.push(get_val)

					
				}

		
		var myData = {
			labels:labeldt2,
			
			datasets: [{
				label: "Top Companies Revenue Rp.(Juta)",
				fill: false,
				backgroundColor: 'rgba(54, 162, 235, 0.8)',
					borderWidth: 1,
				data: val_dt2,
				
			}]
		};
		// Options define for display value on top of bars
		var myoption = {
			tooltips: {
				enabled: true
			},
			hover: {
				animationDuration: 1
			},
			legend: {
				position: 'bottom'
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
							ctx.fillText(data, bar._model.x, bar._model.y - 5);
						});
					});
				}
			}
		};
		// Code to draw Chart
		var ctx = document.getElementById('topComp').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',        // Define chart type
			data: myData,    	// Chart data
			options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
		});
		}
		});


}
