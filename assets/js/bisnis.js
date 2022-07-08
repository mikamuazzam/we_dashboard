$(function() {

	$( "#cari" ).click(function() {
		load_chart();
	});

    load_chart();
	


	progmonth();
	progdiv();
	comp_list();
	
// chart value
	

	
	
});

function load_chart()
{
	var bulan=$('#bulan').find('option:selected').val();
	var tahun=$('#tahun').find('option:selected').val();
	nm_bulan= nama_bulan(bulan);
	$("#LabelAll").html(nm_bulan+" "+tahun);
	$("#calenderbulan").html(nm_bulan+" "+tahun);

	ae1_persentage(bulan,tahun);
	ae1_value(bulan,tahun);
	
    ae_persentage(bulan,tahun);
	ae_value(bulan,tahun);
	get_list_acara(bulan,tahun);

}
function get_list_acara(m,y)
{
	$("#weblist").DataTable({
		destroy: true,
		paging: false,
		info: false,
		searching: false,
		
		pageLength: 10,
		lengthMenu: [10, 25, 50, 75],
		// scrollX: true,
		// scrollCollapse: true,
		"createdRow": function( row, data, dataIndex){
		
				$(row).css({"background-color":data['warna'] })
			
		},
		columns: [
			{ data: "tanggal", title: "Date" },
			{ data: "start_time", title: "Start" },
			{ data: "finish_time", title: "Finish" },
			{ data: "acara", title: "Title" },
			{ data: "status", title: "Status" },
			{ data: "cost", title: "Cost" },
            { data: "revenue", title: "Revenue" },
            { data: "value", title: "value (%)" }
		],
		
		processing: true,
		serverSide: true,
		ajax: {
			data :{bulan:m,tahun:y},
			url: base_url+"bisnis/list_acara",
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
function ae1_persentage(m,y)
{
	nm_bulan= nama_bulan(m);
	$("#LabelAEPersen").html("New AE Performance (%) "+nm_bulan+" "+y);
	$.ajax({
		data :{bulan:m,tahun:y},
		url : base_url+"bisnis/ae_new_persen",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt= [];
			const val_warna=[];
            for (var dt of data) {
                var cb = dt.name;
                labeldt.push(cb)

                var get_val= parseInt(dt.jumlah) || 0;
                val_dt.push(get_val)

				var get_warna = dt.warna;
                val_warna.push(get_warna)
            }
			
			var myData = {
				labels:labeldt,
				datasets: [{
					label: "New AE Performance Target (%)",
					fill: false,
					backgroundColor: val_warna,
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
				scales: {
					yAxes: [{
						ticks: {
						stepSize: 50,
						beginAtZero: true
						},
					}],
					xAxes: [{
						barThickness :20
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
			// Code to draw Chart
			var ctx = document.getElementById('ChartAE1Persen').getContext('2d');
			
			Chart.pluginService.register({
				afterDraw: function(chart) {
					if (typeof chart.config.options.lineAt != 'undefined') {
						var lineAt = chart.config.options.lineAt;
						var ctxPlugin = chart.chart.ctx;
						var xAxe = chart.scales[chart.config.options.scales.xAxes[0].id];
						var yAxe = chart.scales[chart.config.options.scales.yAxes[0].id];
						ctxPlugin.strokeStyle = "Purple";
						ctxPlugin.beginPath();
						lineAt = yAxe.getPixelForValue(lineAt);
						ctxPlugin.moveTo(xAxe.left, lineAt);
						ctxPlugin.lineTo(xAxe.right, lineAt);
						ctxPlugin.stroke();
					}
				}
			});
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
		}
		});

}

function ae1_value(m,y)
{
    nm_bulan= nama_bulan(m);
    $("#LabelAEvalue").html("New AE Performance (value / juta) "+nm_bulan+" "+y);
	$.ajax({
		data :{bulan:m,tahun:y},
		url : base_url+"bisnis/ae_new_value",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt= [];
		
            for (var dt of data) {
                var cb = dt.name;
                labeldt.push(cb)

                var get_val= parseInt(dt.jumlah) || 0;
                val_dt.push(get_val)

            }
			
			var myData = {
				labels:labeldt,
				datasets: [{
					label: "New AE Performance Value Rp. (Juta)",
					fill: false,
					backgroundColor: 'rgba(54, 162, 235, 0.8)',
					data: val_dt,
				}]
			};
	
			var myoption = {
				tooltips: {
					enabled: true
				},
				legend: {
					display: false
				},
				scales: {
					yAxes: [{
						ticks: {
						max:200,
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
			var ctx = document.getElementById('ChartAE1Value').getContext('2d');
			
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
	}
	});

}
function ae_persentage(m,y)
{
	nm_bulan= nama_bulan(m);
	$("#LabelPersen").html("Senior AE Performance (%) "+nm_bulan+" "+y);
	$.ajax({
		data :{bulan:m,tahun:y},
		url : base_url+"bisnis/ae_persen",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt= [];
			const val_warna=[];
            for (var dt of data) {
                var cb = dt.name;
                labeldt.push(cb)

                var get_val= parseInt(dt.jumlah) || 0;
                val_dt.push(get_val)

				var get_warna = dt.warna;
                val_warna.push(get_warna)
            }
			
			var myData = {
				labels:labeldt,
				datasets: [{
					label: "New AE Performance Target (%)",
					fill: false,
					backgroundColor: val_warna,
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
				scales: {
					yAxes: [{
						ticks: {
						stepSize: 50,
						beginAtZero: true
						},
					}],
					xAxes: [{
						barThickness :20
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
			// Code to draw Chart
			var ctx = document.getElementById('ChartAEPersen').getContext('2d');
			
			Chart.pluginService.register({
				afterDraw: function(chart) {
					if (typeof chart.config.options.lineAt != 'undefined') {
						var lineAt = chart.config.options.lineAt;
						var ctxPlugin = chart.chart.ctx;
						var xAxe = chart.scales[chart.config.options.scales.xAxes[0].id];
						var yAxe = chart.scales[chart.config.options.scales.yAxes[0].id];
						ctxPlugin.strokeStyle = "Purple";
						ctxPlugin.beginPath();
						lineAt = yAxe.getPixelForValue(lineAt);
						ctxPlugin.moveTo(xAxe.left, lineAt);
						ctxPlugin.lineTo(xAxe.right, lineAt);
						ctxPlugin.stroke();
					}
				}
			});
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
		}
		});

}

function ae_value(m,y)
{
    nm_bulan= nama_bulan(m);
    $("#Labelvalue").html("Senior AE Performance (value / juta) "+nm_bulan+" "+y);
	$.ajax({
		data :{bulan:m,tahun:y},
		url : base_url+"bisnis/ae_value",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt= [];
		
            for (var dt of data) {
                var cb = dt.name;
                labeldt.push(cb)

                var get_val= parseInt(dt.jumlah) || 0;
                val_dt.push(get_val)

            }
			
			var myData = {
				labels:labeldt,
				datasets: [{
					label: "New AE Performance Value Rp. (Juta)",
					fill: false,
					backgroundColor: 'rgba(54, 162, 235, 0.8)',
					data: val_dt,
				}]
			};
	
			var myoption = {
				tooltips: {
					enabled: true
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
						barThickness :50
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
			var ctx = document.getElementById('ChartAEValue').getContext('2d');
			
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
	}
	});

}



function progmonth()
{
//chart 2
$.ajax({
	url : base_url+"bisnis/get_div_month",
	type : "GET",
	success : function(data){
		data = JSON.parse(data);
	   
		const labeldt2 = [];
		const val_dt2= [];
	
	
		for (var dt of data) {
			var cb = dt.bulan;
			labeldt2.push(cb)

			var get_val= parseInt(dt.jum) || 0;
			
			val_dt2.push(get_val)

			
		}
  	var myData = {
	labels:labeldt2,
	datasets: [{
		label: "Pencapaian perbulan Rp. (Juta)",
		fill: false,
		backgroundColor:
			'rgba(54, 162, 235, 0.2)',
			borderColor:
			'rgba(54, 162, 235, 1)',
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
			
			beginAtZero: true,
			max:10000
			},
		}],
		
			xAxes: [{
				barThickness :40
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
var ctx = document.getElementById('ProgChartMont').getContext('2d');
var myChart = new Chart(ctx, {
	type: 'bar',        // Define chart type
	data: myData,    	// Chart data
	options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
});
}
});
				
}

function progdiv()
{
	//chart 2
		$.ajax({
			url : base_url+"bisnis/get_div",
			type : "GET",
			success : function(data){
				data = JSON.parse(data);
			
				const labeldt2 = [];
				const val_dt2= [];
			
			
				for (var dt of data) {
					var cb = dt.divisi;
					labeldt2.push(cb)

					var get_val= parseInt(dt.jum) || 0;
					
					val_dt2.push(get_val)

					
				}
			var myData = {
			labels:labeldt2,
			datasets: [{
				label: "Ads Rp. (Juta)",
				fill: false,
				backgroundColor:
					['#b3507d','#1a5e34','#DC7633','#DC7633','#7d142e','#b3507d'],
					
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
					
					beginAtZero: true,
					max:15000
					},
				}],
				
					xAxes: [{
						barThickness :40
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
							ctx.fillText(data, bar._model.x, bar._model.y - 10);
						});
					});
				}
			}
		};
		// Code to draw Chart
		var ctx = document.getElementById('progChart').getContext('2d');
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
					
					beginAtZero: true,
					max:2000
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