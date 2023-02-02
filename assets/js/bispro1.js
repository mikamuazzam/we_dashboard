$(function() {
	$( "#cari" ).click(function() {
		load_chart();
	});

    load_chart();
	
// chart value	
});



function load_chart()
{
	var bulan=$('#bulan').find('option:selected').val();
	var tahun=$('#tahun').find('option:selected').val();
    chart_re(4,'ChartWE','WartaEkonomi',bulan,tahun);
    ChartWEYTD('ChartWEYTD',1,'#bd3758','#7d142e',bulan,tahun);
    ChartWEYTD('ChartHSYTD',2,'#dea4be','#b3507d',bulan,tahun);
    ChartWEMTD('ChartWEMTD',1,'#bd3758','#7d142e',bulan,tahun);
    ChartWEMTD('ChartHSMTD',2,'#dea4be','#b3507d',bulan,tahun);
    ChartAEYTD(bulan,tahun);
    ChartAEMTD(bulan,tahun);
}

function chart_re(cb_id,idchart,judul,bulan,tahun)
{

	$.ajax({
		data :{cb_id:cb_id,bulan:bulan,tahun:tahun},
		url : base_url+"bispro/chart_re",
		type : "GET",
		success : function(data){
			data = JSON.parse(data);
            const labeldt = [];
            const rankdt= [];
            const listwarna= [];
	
            for (var dt of data) {
                var lbl = dt.nama;
                labeldt.push(lbl)

                var get_we= parseInt(dt.jum) || 0;
                rankdt.push(get_we)

                var get_warna= dt.warna;
                listwarna.push(get_warna)

            }
		  	var chartdata = {
			labels: labeldt,
			datasets: [
                        {
                            label: judul,
                            fill: false,
                            backgroundColor: listwarna,
                            borderWidth: 1,
                            data: rankdt
                        }
			  
			]
		  };
		
		  var ctx = document.getElementById(idchart).getContext("2d");
		  var LineGraph = new Chart(ctx, {
			type: 'bar',
			data: chartdata,
			options: {
                
				legend: {
					display: false,
				},
				title: {
					display: true,
					text: judul
				  },
				scales: {
					yAxes: [{
						ticks: {
						  beginAtZero: true
						},
					  }],
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
								},
				  responsive: true,
				  maintainAspectRatio: false
			},
            
		  });
		},
		error : function(data) {
	
		}
	  }); 

}

function ChartWEYTD(canvasid,divisi,bg1,bg2,bulan,tahun)
{
	$.ajax({
		data :{divid:divisi,bulan:bulan,tahun:tahun},
		url : base_url+"/bispro/chart_we_ytd",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt_ytd= [];
			const val_dt_ly= [];
			
		
            for (var dt of data) {
                var cb = dt.nm;
                labeldt.push(cb)

				var judul = dt.title;
               

                var get_val= parseInt(dt.now) || 0;
                val_dt_ytd.push(get_val)

				var get_val_target= parseInt(dt.ly) || 0;
                val_dt_ly.push(get_val_target)

            }
			
			var myData = {
				labels:labeldt,
				datasets: [{
					label: "last Year",
					fill: false,
					backgroundColor: bg1,
					data: val_dt_ly,
				},
				{
					label: "Today",
					fill: false,
					backgroundColor: bg2,
					data: val_dt_ytd,
				}
				]
			};
	
			var myoption = {
				tooltips: {
					enabled: true
				},
				legend: {
					position: 'right'
				},
				title: {
					display: true,
					text: judul
				},
				scales: {
					yAxes: [{
						ticks: {
						
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
								}
			};
			// Code to draw Chart
			document.getElementById(canvasid+"Content").innerHTML = '&nbsp;';
			document.getElementById(canvasid+"Content").innerHTML = '<canvas id="'+canvasid+'" height="200px" ></canvas>';
			
			var ctx = document.getElementById(canvasid).getContext('2d');
			
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
	}
	});
}

function ChartWEMTD(canvasid,divisi,bg1,bg2,bulan,tahun)
{
	$.ajax({
		data :{divid:divisi,bulan:bulan,tahun:tahun},
		url : base_url+"/bispro/chart_we_mtd",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt_ytd= [];
			const val_dt_ly= [];
		
            for (var dt of data) {
                var cb = dt.nm;
                labeldt.push(cb)

                var get_val= parseInt(dt.now) || 0;
                val_dt_ytd.push(get_val)

				var get_val_target= parseInt(dt.lm) || 0;
                val_dt_ly.push(get_val_target)
				var judul = dt.title;
            }
			
			var myData = {
				labels:labeldt,
				datasets: [{
					label: "last Month",
					fill: false,
					backgroundColor: bg1,
					data: val_dt_ly,
				},
				{
					label: "Today",
					fill: false,
					backgroundColor: bg2,
					data: val_dt_ytd,
				}
				]
			};
	
			var myoption = {
				tooltips: {
					enabled: true
				},
				legend: {
					position: 'right'
				},
				
				title: {
					display: true,
					text: judul
				},
				scales: {
					yAxes: [{
						ticks: {
						
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
								}
			};
			// Code to draw Chart
			document.getElementById(canvasid+"Content").innerHTML = '&nbsp;';
			document.getElementById(canvasid+"Content").innerHTML = '<canvas id="'+canvasid+'" height="200px" ></canvas>';
			
			var ctx = document.getElementById(canvasid).getContext('2d');
			
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
	}
	});
}


function ChartAEYTD(bulan,tahun)
{
	$.ajax({
		data :{bulan:bulan,tahun:tahun},
		url : base_url+"/bispro/chart_ae_ytd",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt_ytd= [];
			const val_dt_ly= [];
		
            for (var dt of data) {
                var cb = dt.nm;
                labeldt.push(cb)

                var get_val= parseInt(dt.now) || 0;
                val_dt_ytd.push(get_val)

				var get_val_target= parseInt(dt.ly) || 0;
                val_dt_ly.push(get_val_target)
				var judul = dt.title;
            }
			
			var myData = {
				labels:labeldt,
				datasets: [{
					label: "last Year",
					fill: false,
					backgroundColor: '#ccd9ff',
					data: val_dt_ly,
				},
				{
					label: "Today",
					fill: false,
					backgroundColor: '#668cff',
					data: val_dt_ytd,
				}
				]
			};
	
			var myoption = {
				tooltips: {
					enabled: true
				},
				legend: {
					position: 'right'
				},
				title: {
					display: true,
					text: judul
				},
				scales: {
					yAxes: [{
						ticks: {
						
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
								}
			};
			// Code to draw Chart
			document.getElementById("ChartAEYTDContent").innerHTML = '&nbsp;';
			document.getElementById("ChartAEYTDContent").innerHTML = '<canvas id="ChartAEYTD" height="100px" ></canvas>';
			
			var ctx = document.getElementById('ChartAEYTD').getContext('2d');
			
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
	}
	});
}

function ChartAEMTD(bulan,tahun)
{
	$.ajax({
		data :{bulan:bulan,tahun:tahun},
		url : base_url+"/bispro/chart_ae_mtd",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt_ytd= [];
			const val_dt_ly= [];
		
            for (var dt of data) {
                var cb = dt.nm;
                labeldt.push(cb)

                var get_val= parseInt(dt.now) || 0;
                val_dt_ytd.push(get_val)

				var get_val_target= parseInt(dt.ly) || 0;
                val_dt_ly.push(get_val_target)
				var judul = dt.title;
            }	
			
			var myData = {
				labels:labeldt,
				datasets: [{
					label: "last Year",
					fill: false,
					backgroundColor: '#ccd9ff',
					data: val_dt_ly,
				},
				{
					label: "Today",
					fill: false,
					backgroundColor: '#668cff',
					data: val_dt_ytd,
				}
				]
			};
	
			var myoption = {
				tooltips: {
					enabled: true
				},
				legend: {
					position: 'right'
				},
				title: {
					display: true,
					text: judul
				},
				scales: {
					yAxes: [{
						ticks: {
						
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
								}
			};
			// Code to draw Chart
			document.getElementById("ChartAEMTDContent").innerHTML = '&nbsp;';
			document.getElementById("ChartAEMTDContent").innerHTML = '<canvas id="ChartAEMTD" height="100px" ></canvas>';
			
			var ctx = document.getElementById('ChartAEMTD').getContext('2d');
			
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
	}
	});
}