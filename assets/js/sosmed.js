
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
    var partner=$('#partner').find('option:selected').val();
    total_perbulan();
    
}



function total_perbulan()
{
        // chart monthly
        $.ajax({
            url : base_url+"/sosmed/total_perbulan",
            type : "GET",
            success : function(data)
            {
                data = JSON.parse(data);  
                const labeldt = [];
                const val_dt= [];
              
               
                for (var dt of data) {
                    var cb = dt.bulan;
                    labeldt.push(cb)

                    var get_data=  parseInt(dt.laba) || 0;
                    val_dt.push(get_data)

                }
                
                var myData = {
                    labels:labeldt,
                    datasets: [{
                       label:'Total ',
                        fill: false,
                        borderColor:'#6095eb',
                        backgroundColor: '#6095eb',
                        data: val_dt,
                        lineTension: 0,
                        borderWidth: 1
                    }]
                    
                };
        
                var myoption = {
                   
                    title: {
                            display: true,
                            text: 'Total revenue per last 3 Month '
                        }
                    ,
                    tooltips: {
                        enabled: true,
                        callbacks: {
                            label: function(tooltipItem, data) {
                                return Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                                    return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                                });
                            }
                        }
                        
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


