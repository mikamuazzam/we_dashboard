
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
	//var bulan=$('#bulan').find('option:selected').val();function we_month_val(y)

	//var tahun=$('#tahun').find('option:selected').val();
    //var partner=$('#partner').find('option:selected').val();
    prediktif_now();
    prediktif_cb(1,'ChartIklan','Iklan');
    prediktif_cb(2,'ChartAward','Award');
    prediktif_cb(3,'ChartSeminar','Seminar');
    
}

function prediktif_now()
{
	// chart monthly
	$.ajax({
		
        url : base_url+"/prediktif/prediktif_now",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt_jum= [];
			const val_dt_pred= [];
		
            for (var dt of data) {
                var cb = dt.cb;
                labeldt.push(cb)

                var get_val= parseInt(dt.prediktif) || 0;
				
                val_dt_jum.push(get_val)

				var get_val_pred= parseInt(dt.revenue) || 0;
				
                val_dt_pred.push(get_val_pred)

            }
			
			var myData = {
				labels:labeldt,
                lineTension: 0,
				datasets: [{
					label: "Prediction (Juta)",
					fill: false,
					backgroundColor: '#98D1F3',
					data: val_dt_jum,
				},
				{
					label: "Actual (Juta)",
					fill: false,
					backgroundColor: '#31A6ED',
					data: val_dt_pred,
				}]
			};
	
			var myoption = {
				tooltips: {
					enabled: true
				},
                title: {
                    display: true,
                    text: 'This Month Prediction Vs Actual  by Core bisnis WE (Juta)'
                }
            ,
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
            document.getElementById("ChartAdsTigaContent").innerHTML = '&nbsp;';
            document.getElementById("ChartAdsTigaContent").innerHTML = '<canvas id="ChartAdsTiga" height="100px" ></canvas>';

           var ctx = document.getElementById('ChartAdsTiga').getContext('2d');
           var myChart = new Chart(ctx, {
                type: 'bar',        // Define chart type
                data: myData,    	// Chart data
                options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
            });
	}
	});

	

}
function prediktif_cb(corebisnis,idchart,cbname)
{
	// chart monthly
	$.ajax({
		data :{cb:corebisnis},
        url : base_url+"/prediktif/prediktif_cb",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt_pred= [];
			const val_dt_rev= [];
		    var avg_pred=0;
			var avg_rev=0;
            for (var dt of data) {
                var cb = dt.namabulan;
                labeldt.push(cb)

                var get_val= parseInt(dt.prediktif) || 0;
				
                val_dt_pred.push(get_val)

				var get_val_rev= parseInt(dt.revenue) || 0;
				
                val_dt_rev.push(get_val_rev);

				avg_pred=avg_pred +get_val;
				avg_rev=avg_rev +get_val_rev;
				
            }
			avg_pred= parseInt(avg_pred/3) || 0;
			avg_rev=parseInt(avg_rev/3) || 0;
			var myData = {
				labels:labeldt,
                lineTension: 0,
				datasets: [{
					label: "Avg Pred ("+avg_pred+")",
					fill: false,
					backgroundColor: '#98D1F3',
					data: val_dt_pred,
				},
				{
					label: "Avg Act ("+avg_rev+")",
					fill: false,
					backgroundColor: '#31A6ED',
					data: val_dt_rev,
				}]
			};
	
			var myoption = {
				tooltips: {
					enabled: true
				},
                title: {
                    display: true,
                    text: cbname 
                }
            ,
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
								}
			};
			// Code to draw Chart
        document.getElementById(idchart+"Content").innerHTML = '&nbsp;';
		document.getElementById(idchart+"Content").innerHTML = '<canvas id="'+idchart+'" height="250px" ></canvas>';
		
		  var ctx = document.getElementById(idchart).getContext("2d");
           var myChart = new Chart(ctx, {
                type: 'bar',        // Define chart type
                data: myData,    	// Chart data
                options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
            });
	}
	});

	

}


