$(function() {
	$( "#cari" ).click(function() {
		load_chart();
	});
	$('#clear_web').click(function()
	{ 
		
		$("input[name='web_name[]']:checked").prop('checked', false);
		return false; 
	
	});
	$('#clear_param').click(function()
	{ 
		
		$("input[name='exp_name[]']:checked").prop('checked', false);
		return false; 
	
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
	//chart_re_v2(4,'ChartWEPr2','Programmatics WE',bulan,tahun,'#bd3758','#7d142e');
	
	chart_re(1,'ChartWEIklan','Iklan WE',bulan,tahun,'#bd3758','#7d142e');
	//chart_re_v2(1,'ChartWEIklan2','Iklan WE',bulan,tahun,'#bd3758','#7d142e');
	
	chart_re(2,'ChartWEAward','Award WE',bulan,tahun,'#bd3758','#7d142e');	
	//chart_re_v2(2,'ChartWEAward2','Award WE',bulan,tahun,'#bd3758','#7d142e');	
	chart_re(8,'ChartHSAward','Award WE',bulan,tahun,'#dea4be','#b3507d');
	chart_re(9,'ChartHSBanking','Seminar Banking WE',bulan,tahun,'#dea4be','#b3507d');

	chart_re(3,'ChartWEBanking','Seminar Banking WE',bulan,tahun,'#bd3758','#7d142e');	
	//chart_re_v2(3,'ChartWEBanking2','Seminar Banking WE',bulan,tahun,'#bd3758','#7d142e');	
	//HS
	chart_re(10,'ChartHSPr','Programmatics HS',bulan,tahun,'#dea4be','#b3507d');
	//chart_re_v2(10,'ChartHSPr2','Programmatics HS',bulan,tahun,'#dea4be','#b3507d');
	chart_re(7,'ChartHSIklan','Iklan HS',bulan,tahun,'#dea4be','#b3507d');	
	//chart_re_v2(7,'ChartHSIklan2','Iklan HS',bulan,tahun,'#dea4be','#b3507d');	

	chart_re(11,'ChartPPPr','Programmatics PP',bulan,tahun,'#59c984','#1a5e34'); //populis
	//chart_re_v2(11,'ChartPPPr2','Programmatics PP',bulan,tahun,'#59c984','#1a5e34'); //populis
	chart_re(16,'ChartKJPr','KJ Prog',bulan,tahun,'#BEF1BF','#38F13B');	//

	//chart_re_v2(16,'ChartKJPr2','KJ Progs',bulan,tahun,'#BEF1BF','#38F13B');	//
	
	chart_re(19,'ChartNWPr','Programmatics News Worthy',bulan,tahun,'#bd3758','#7d142e');
	//chart_re_v2(19,'ChartNWPr2','Programmatics News Worthy',bulan,tahun,'#bd3758','#7d142e');
	chart_re(18,'ChartTVPr','Programmatics WE Trivia',bulan,tahun,'#bd3758','#7d142e');
	//chart_re_v2(18,'ChartTVPr2','Programmatics WE Trivia',bulan,tahun,'#bd3758','#7d142e');

	//Q
	chart_re(12,'ChartQ1','Programmatics HS',bulan,tahun,'#DC7633','#F5B041');
	chart_re(13,'ChartQ1Rev','Iklan HS',bulan,tahun,'#DC7633','#F5B041');	

    
	
	var konten;
	
	$.each($("input[name='web_name[]']:checked"), function(){    
		if  ($(this).val() == 1) konten='ChartWEIklan2';
		if  ($(this).val() == 2) konten='ChartWEAward2';
		if  ($(this).val() == 3) konten='ChartWEBanking2';
		if  ($(this).val() == 7) konten='ChartHSIklan2';

		if  ($(this).val() == 4) konten='ChartWEPr2';
		if  ($(this).val() == 10) konten='ChartHSPr2';
		if  ($(this).val() == 11) konten='ChartPPPr2';
		if  ($(this).val() == 16) konten='ChartKJPr2';
		if  ($(this).val() == 19) konten='ChartNWPr2';
		if  ($(this).val() == 18) konten='ChartTVPr2';
		if  ($(this).val() == 8) konten='ChartHSAward2';
		if  ($(this).val() == 9) konten='ChartHSBanking2';
		
		
		chart_re_v2($(this).val(),konten,'Programmatics WE Trivia',bulan,tahun,'#0990ad','#9ee7f7');
	});
	
	
	

}

function chart_re_v2(cb_id,idchart,judul,bulan,tahun,warna1,warna2)
{

	var list_web = [];
	var list_exp = [];

	$.each($("input[name='web_name[]']:checked"), function(){                    
		list_web.push($(this).val());
	});
	$.each($("input[name='exp_name[]']:checked"), function(){                    
		list_exp.push($(this).val());
	});

	var lexString = JSON.stringify(list_exp);
	var webString = JSON.stringify(list_web);
	$.ajax({
		data :{cb_id:cb_id,bulan:bulan,tahun:tahun,list_web:webString,list_exp:lexString},
		url : base_url+"bispro_analisis/chart_re_v2",
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
			else warnalaba='#5490de';
			labeldt.push('margin');
			rankdt.push(rankdt[0]-rankdt[1]);
			listwarna.push(warna2,warna1,warnalaba);

			

			judullaba='Margin  ' + number_format(persenlaba,2) + '%';
			
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
		document.getElementById(idchart+"Content").innerHTML = '<canvas id="'+idchart+'" height="250px" ></canvas>';
		
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

function chart_re(cb_id,idchart,judul,bulan,tahun,warna1,warna2)
{

	
	$.ajax({
		data :{cb_id:cb_id,bulan:bulan,tahun:tahun},
		url : base_url+"bispro_analisis/chart_re",
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
			else warnalaba='#5490de';
			labeldt.push('margin');
			rankdt.push(rankdt[0]-rankdt[1]);
			listwarna.push(warna2,warna1,warnalaba);

			

			judullaba='Margin  ' + number_format(persenlaba,2) + '%';
			
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
		document.getElementById(idchart+"Content").innerHTML = '<canvas id="'+idchart+'" height="250px" ></canvas>';
		
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

