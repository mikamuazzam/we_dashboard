$(function() {
	$( "#cari" ).click(function() {
		load_chart();
	});

    load_chart();
	
// chart value	
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
    chart_re(4,'ChartWEPr','Programmatics WE',bulan,tahun,'#bd3758','#7d142e');
	chart_re(1,'ChartWEIklan','Iklan WE',bulan,tahun,'#bd3758','#7d142e');
	chart_re(2,'ChartWEAward','Award WE',bulan,tahun,'#bd3758','#7d142e');	
	chart_re(3,'ChartWEBanking','Seminar Banking WE',bulan,tahun,'#bd3758','#7d142e');	
	//HS
	chart_re(10,'ChartHSPr','Programmatics HS',bulan,tahun,'#dea4be','#b3507d');
	chart_re(7,'ChartHSIklan','Iklan HS',bulan,tahun,'#dea4be','#b3507d');	

	chart_re(11,'ChartPPPr','Programmatics HS',bulan,tahun,'#59c984','#1a5e34'); //populis
	chart_re(16,'ChartKJPr','Iklan HS',bulan,tahun,'#BEF1BF','#38F13B');	//kj

	//Q
	chart_re(12,'ChartQ1','Programmatics HS',bulan,tahun,'#DC7633','#F5B041');
	chart_re(13,'ChartQ1Rev','Iklan HS',bulan,tahun,'#DC7633','#F5B041');	

    ChartWEYTD('ChartWEYTD',1,'#bd3758','#7d142e',bulan,tahun);
    ChartWEYTD('ChartHSYTD',2,'#dea4be','#b3507d',bulan,tahun);
    ChartWEMTD('ChartWEMTD',1,'#bd3758','#7d142e',bulan,tahun);
    ChartWEMTD('ChartHSMTD',2,'#dea4be','#b3507d',bulan,tahun);
    ChartAEYTD(bulan,tahun);
    ChartAEMTD(bulan,tahun);
}

function chart_re(cb_id,idchart,judul,bulan,tahun,warna1,warna2)
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

            }
			var laba = rankdt[0]-rankdt[1] ;
			var persenlaba=laba/rankdt[1] *100 ;

			if (persenlaba <= 30)warnalaba='red';
			else if (persenlaba >=30 && persenlaba <=80) warnalaba='green';
			else warnalaba='blue';
			labeldt.push('profit');
			rankdt.push(rankdt[0]-rankdt[1]);
			listwarna.push(warna2,warna1,warnalaba);

			

			judullaba='Profit  ' + number_format(persenlaba,2) + '%';
			
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
		  // Code to draw Chart
		document.getElementById(idchart+"Content").innerHTML = '&nbsp;';
		document.getElementById(idchart+"Content").innerHTML = '<canvas id="'+idchart+'" height="300px" ></canvas>';
		
		  var ctx = document.getElementById(idchart).getContext("2d");
		  var LineGraph = new Chart(ctx, {
			type: 'bar',
			data: chartdata,
			options: {
				
				legend: {
					display: false,
				},
				title:{
					display:true,
					text: judullaba,  
					fontColor: warnalaba,
					
					padding: 20,
					margin: 4,
					
				  },
				scales: {
					yAxes: [{
						ticks: {
						  	callback: function(value, index, values) {
							return  number_format(value);
							},
							stepSize: 100
						},
					  }],
				  },
				  tooltips: {
					callbacks: {
						label: function(tooltipItem, chart){
							var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
							return datasetLabel +'-'+ number_format(tooltipItem.yLabel, 2);
						}
					}
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
												var data = number_format(dataset.data[index]);
												ctx.fillText(data, bar._model.x, bar._model.y -1);
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
					label: "last Month",
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