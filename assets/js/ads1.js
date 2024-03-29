
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
    get_ads_list(bulan,tahun,partner);
    ads_view(bulan,tahun,partner);
    ads_revenue_idr(tahun);
    
    ads_balance();
    partner_monthly(bulan,tahun,partner);
    ads_monthly(bulan,tahun);
    ads_view_partner(bulan,tahun,partner);
    monthly_rupiah(bulan,tahun);
    total_perbulan();
    total_perbulan_partner();
    target_rev_partner(13,'liberte');
    target_rev_partner(14,'rumpita');
}

function target_rev_partner(partner_id,chartid)
{
        // chart monthly
        $.ajax({
            data :{partner_id:partner_id},
            url : base_url+"/ads/target_rev_partner",
            type : "GET",
            success : function(data)
            {
                data = JSON.parse(data);  
                const labeldt = [];
                const val_dt= [];
                const target_dt= [];
              
               
                for (var dt of data) {
                    var cb = dt.bulan;
                    labeldt.push(cb)

                    var get_data=  dt.pencapaian;
                    val_dt.push(get_data)  
                    
                    var get_target=  parseInt(dt.target) || 0;
                    target_dt.push(get_target)  
                }
                var myData = {
                    labels:labeldt,
                    datasets: [{
                       label:'Target ',
                        fill: false,
                        backgroundColor: '#F5B347',
                        data: target_dt,
                        lineTension: 0,
                        borderWidth: 1
                    },
                    {
                        label:'Pencapaian ',
                         fill: false,
                         backgroundColor: '#B9670A',
                         data: val_dt,
                         lineTension: 0,
                         borderWidth: 1
                     }]
                    
                };
        
                var myoption = {
                   
                    title: {
                            display: true,
                            text: 'Target Vs Rev (Juta) ' + chartid
                        }
                    ,
                    tooltips: {
                        enabled: true
                    },
                    legend: {
                        position: 'bottom'
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                            beginAtZero: true,
                            max:20
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
                
                document.getElementById(chartid+"Content").innerHTML = '&nbsp;';
                document.getElementById(chartid+"Content").innerHTML = '<canvas id="'+chartid+'" height="150px" ></canvas>';
                
                var ctx = document.getElementById(chartid).getContext('2d');
               var myChart = new Chart(ctx, {
                    type: 'bar',        // Define chart type
                    data: myData,    	// Chart data
                    options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
                });
        }
        });
}  
function total_perbulan_partner()
{
        // chart monthly
        $.ajax({
            url : base_url+"/ads/total_perbulan_partner",
            type : "GET",
            success : function(data)
            {
                data = JSON.parse(data);  
                const labeldt = [];
                const val_dt= [];
             
              
               
                for (var dt of data) {
                    var cb = dt.bulan;
                    labeldt.push(cb)

                    var get_data=  parseInt(dt.pencapaian) || 0;
                    val_dt.push(get_data)   
                }
                var myData = {
                    labels:labeldt,
                    datasets: [{
                       label:'Total ',
                        fill: false,
                        backgroundColor: '#F5B347',
                        data: val_dt,
                        lineTension: 0,
                        borderWidth: 1
                    }]
                    
                };
        
                var myoption = {
                   
                    title: {
                            display: true,
                            text: 'Revenue per last 3 Month (Juta)'
                        }
                    ,
                    tooltips: {
                        enabled: true
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
                
                document.getElementById("ChartAdsTigaPartnerContent").innerHTML = '&nbsp;';
		        document.getElementById("ChartAdsTigaPartnerContent").innerHTML = '<canvas id="ChartAdsTigaPartner" height="130px" ></canvas>';

                var ctx = document.getElementById('ChartAdsTigaPartner').getContext('2d');
               var myChart = new Chart(ctx, {
                    type: 'bar',        // Define chart type
                    data: myData,    	// Chart data
                    options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
                });
        }
        });
}   

function total_perbulan()
{
        // chart monthly
        $.ajax({
            url : base_url+"/ads/total_perbulan",
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
                            text: 'Total revenue per last 3 Month (Juta)'
                        }
                    ,
                    tooltips: {
                        enabled: true
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
		        document.getElementById("ChartAdsTigaContent").innerHTML = '<canvas id="ChartAdsTiga" height="130px" ></canvas>';

                var ctx = document.getElementById('ChartAdsTiga').getContext('2d');
               var myChart = new Chart(ctx, {
                    type: 'bar',        // Define chart type
                    data: myData,    	// Chart data
                    options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
                });
        }
        });
}   


function get_ads_list(bulan,tahun,partner)
{
	$("#ads-we-list").DataTable({
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
            { data: "website_name", title: "website"},
            { data: "name", title: "Partner"},
			{ data: "dataadd", title: "Date"},
			{ data: "clicks", title: "Clicks" ,className: "text-right"},
            { data: "ctr", title: "ctr" ,className: "text-right"},
            { data: "cpc", title: "cpc" ,className: "text-right"},
            { data: "cpm", title: "cpm" ,className: "text-right"},
            { data: "fillrate", title: "fillrate" ,className: "text-right"},
			{ data: "laba", title: "Revenue" ,className: "text-right"},
		],
		ajax: {
			data :{bulan:bulan,tahun:tahun,partner:partner},
			url: base_url+"ads/ads_list",
			type: 'post',
			dataType: 'json',
			dataSrc:""
		},
	});
}

function ads_monthly(bulan,tahun)
{
	$("#ads-monthly-list").DataTable({
		destroy: true,
		processing: true,
		serverSide: true,
		paging: false,
		info: false,
		searching: false,
		// scrollX: true,
		// scrollCollapse: true,
		"createdRow": function( row, data, dataIndex){
				$(row).css({"background-color":data['warna'] })
			
		},
		columns: [
            { data: "website_name", title: "website"},
			{ data: "bulan", title: "Month"},
            { data: "laba", title: "revenue" ,className: "text-right"}
		],
        columnDefs:
        [
            {
                targets: 2,
                render: $.fn.dataTable.render.number(',', '.', 0, '')
            }
        ],
		ajax: {
			data :{bulan:bulan,tahun:tahun},
			url: base_url+"ads/monthly_revenue",
			type: 'post',
			dataType: 'json',
			dataSrc:""
		},
	});
}
function partner_monthly(bulan,tahun,partner)
{
	$("#partner-monthly-list").DataTable({
		destroy: true,
		processing: true,
		serverSide: true,
		paging: false,
		info: false,
		searching: false,
		// scrollX: true,
		// scrollCollapse: true,
		"createdRow": function( row, data, dataIndex){
				$(row).css({"background-color":data['warna'] })
			
		},
		columns: [
            { data: "website_name", title: "partner"},
			{ data: "laba", title: "Revenue",className: "text-right"}
		],
        columnDefs:
        [
            {
                targets: 1,
                render: $.fn.dataTable.render.number(',', '.', 0, '')
            }
        ],
		ajax: {
			data :{bulan:bulan,tahun:tahun,partner:partner},
			url: base_url+"ads/partner_revenue",
			type: 'post',
			dataType: 'json',
			dataSrc:""
		}
	});
}

function monthly_rupiah(bulan,tahun)
{
    $.ajax({
        type: "POST",
        url: base_url+"ads/total_rupiah",
        data :{bulan:bulan,tahun:tahun},
        success: function(data) {
           $('#total1').html('Monhtly Total: '+data +" Rupiah");
        }
    });
}
function ads_view(bulan,tahun,partner)
{
        // chart monthly
        $.ajax({
            data :{bulan:bulan,tahun:tahun,partner:partner},
            url : base_url+"/ads/ads_view",
            type : "GET",
            success : function(data)
            {
                data = JSON.parse(data);  
                const labeldt = [];
                const val_dt_view_we= [];
                const val_dt_view_hs= [];
                const val_dt_view_pp= [];
                const val_dt_view_kj= [];
                const val_dt_view_nw= [];
                const val_dt_view_wf= [];
            
                for (var dt of data) {
                    var cb = dt.dataadd;
                    labeldt.push(cb)

                    var get_view_we= parseInt(dt.we) || 0;
                    val_dt_view_we.push(get_view_we)
    
                    var get_view_hs= parseInt(dt.hs) || 0;
                    val_dt_view_hs.push(get_view_hs)

                    var get_view_pp= parseInt(dt.pp) || 0;
                    val_dt_view_pp.push(get_view_pp)
                    
                    var get_view_kj= parseInt(dt.kj) || 0;
                    val_dt_view_kj.push(get_view_kj)

                    var get_view_wf= parseInt(dt.wf) || 0;
                    val_dt_view_wf.push(get_view_wf)

                    var get_view_nw= parseInt(dt.nw) || 0;
                    val_dt_view_nw.push(get_view_nw)
                }
                
                var myData = {
                    labels:labeldt,
                    datasets: [{
                        label: "WE",
                        fill: false,
                        borderColor:'#910410',
                        backgroundColor: '#910410',
                        data: val_dt_view_we,
                        lineTension: 0,
                        borderWidth: 1
                    },
                    {
                        label: "HS",
                        fill: false,
                        borderColor:'#f095c7',
                        backgroundColor: '#f095c7',
                        data: val_dt_view_hs,
                        borderWidth: 1,
                        lineTension: 0
                        
                    }
                    ,
                    {
                        label: "PP",
                        fill: false,
                        borderColor:'#053d14',
                        backgroundColor: '#053d14',
                        data: val_dt_view_pp,
                        borderWidth: 1,
                        lineTension: 0
                    },
                    {
                        label: "KJ",
                        fill: false,
                        borderColor:'#82f5b7',
                        backgroundColor: '#82f5b7',
                        data: val_dt_view_kj,
                        borderWidth: 1,
                        lineTension: 0
                    },
                    {
                        label: "NW",
                        fill: false,
                        borderColor:'#cc414b',
                        backgroundColor: '#cc414b',
                        data: val_dt_view_nw,
                        borderWidth: 1,
                        lineTension: 0
                    },
                    {
                        label: "WF",
                        fill: false,
                        borderColor:'#f5f542',
                        backgroundColor: '#f5f542',
                        data: val_dt_view_wf,
                        borderWidth: 1,
                        lineTension: 0
                    }]
                    
                };
        
                var myoption = {
                   
                    title: {
                            display: true,
                            text: 'Daily Website Revenue'
                        }
                    ,
                    tooltips: {
                        enabled: true
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
                            barThickness :10
                        }]
                        }
                };
                // Code to draw Chart
                document.getElementById("ChartAdsContent").innerHTML = '&nbsp;';
		        document.getElementById("ChartAdsContent").innerHTML = '<canvas id="ChartAds" height="100px" ></canvas>';

                var ctx = document.getElementById('ChartAds').getContext('2d');
                
                myChart= new Chart(ctx, {
                    type: 'line',        // Define chart type
                    data: myData,    	// Chart data
                    options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
                });
        }
        });
} 
function ads_view_partner(bulan,tahun,partner)
{
        // chart monthly
        $.ajax({
            data :{bulan:bulan,tahun:tahun,partner:partner},
            url : base_url+"/ads/partner_revenue",
            type : "GET",
            success : function(data)
            {
                data = JSON.parse(data);  
                const labeldt = [];
                const val_dt= [];
                const val_kurs= [];
               
                for (var dt of data) {
                    var cb = dt.website_name;
                    labeldt.push(cb)

                    var get_data=  parseInt(dt.laba) || 0;
                    val_dt.push(get_data)

                    var get_kurs= dt.kurs;
                  
    
                }
                
                var myData = {
                    labels:labeldt,
                    datasets: [{
                       label:' Revenue ' + get_kurs,
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
                            text: 'Monthly Website Revenue by Partner'
                        }
                    ,
                    tooltips: {
                        enabled: true
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
                            barThickness :10
                        }]
                        }
                };
                // Code to draw Chart
                
                document.getElementById("ChartAdsMonthContent").innerHTML = '&nbsp;';
		        document.getElementById("ChartAdsMonthContent").innerHTML = '<canvas id="ChartAdsMonth" height="100px" ></canvas>';

                var ctx = document.getElementById('ChartAdsMonth').getContext('2d');
               var myChart = new Chart(ctx, {
                    type: 'horizontalBar',        // Define chart type
                    data: myData,    	// Chart data
                    options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
                });
        }
        });
}   

/*function ads_revenue_usd(tahun)
{
        // chart monthly
        $.ajax({
            data :{kurs:'usd',tahun:tahun},
            url : base_url+"/ads/ads_revenue",
            type : "GET",
            success : function(data)
            {
                data = JSON.parse(data);  
                const labeldt = [];
                const val_dt_view_we= [];
                const val_dt_view_hs= [];
                const val_dt_view_pp= [];
                const val_dt_view_kj= [];
                const val_dt_view_nw= [];
                const val_dt_view_wf= [];
            
                for (var dt of data) {
                    var cb = dt.bulan;
                    labeldt.push(cb)

                    var get_view_we= parseInt(dt.we) || 0;
                    val_dt_view_we.push(get_view_we)
    
                    var get_view_hs= parseInt(dt.hs) || 0;
                    val_dt_view_hs.push(get_view_hs)

                    var get_view_pp= parseInt(dt.pp) || 0;
                    val_dt_view_pp.push(get_view_pp)
                    
                    var get_view_kj= parseInt(dt.kj) || 0;
                    val_dt_view_kj.push(get_view_kj)

                    var get_view_wf= parseInt(dt.wf) || 0;
                    val_dt_view_wf.push(get_view_wf)

                    var get_view_nw= parseInt(dt.nw) || 0;
                    val_dt_view_nw.push(get_view_nw)
                }
                
                var myData = {
                    labels:labeldt,
                    datasets: [{
                        label: "WE",
                        fill: false,
                        borderColor:'#910410',
                        backgroundColor: '#910410',
                        data: val_dt_view_we,
                        lineTension: 0,
                        borderWidth: 1
                    },
                    {
                        label: "HS",
                        fill: false,
                        borderColor:'#f095c7',
                        backgroundColor: '#f095c7',
                        data: val_dt_view_hs,
                        borderWidth: 1,
                        lineTension: 0
                        
                    }
                    ,
                    {
                        label: "PP",
                        fill: false,
                        borderColor:'#053d14',
                        backgroundColor: '#053d14',
                        data: val_dt_view_pp,
                        borderWidth: 1,
                        lineTension: 0
                    },
                    {
                        label: "KJ",
                        fill: false,
                        borderColor:'#82f5b7',
                        backgroundColor: '#82f5b7',
                        data: val_dt_view_kj,
                        borderWidth: 1,
                        lineTension: 0
                    },
                    {
                        label: "NW",
                        fill: false,
                        borderColor:'#cc414b',
                        backgroundColor: '#cc414b',
                        data: val_dt_view_nw,
                        borderWidth: 1,
                        lineTension: 0
                    },
                    {
                        label: "WF",
                        fill: false,
                        borderColor:'#f5f542',
                        backgroundColor: '#f5f542',
                        data: val_dt_view_wf,
                        borderWidth: 1,
                        lineTension: 0
                    }]
                    
                };
        
                var myoption = {
            
                      title: {
                        display: true,
                        text: 'Programmatics Revenue (USD) by Website'
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
                            barThickness :10
                        }]
                        }
                };
                // Code to draw Chart
                var ctx1 = document.getElementById('ChartRevenueUSD').getContext('2d');
                
                var myChart = new Chart(ctx1, {
                    type: 'line',        // Define chart type
                    data: myData,    	// Chart data
                    options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
                });
        }
        });
}
*/
function ads_revenue_idr(tahun)
{
        // chart monthly
        $.ajax({
            data :{kurs:'idr',tahun:tahun},
            url : base_url+"/ads/ads_revenue",
            type : "GET",
            success : function(data)
            {
                data = JSON.parse(data);  
                const labeldt = [];
                const val_dt_view_we= [];
                const val_dt_view_hs= [];
                const val_dt_view_pp= [];
                const val_dt_view_kj= [];
                const val_dt_view_nw= [];
                const val_dt_view_wf= [];
            
                for (var dt of data) {
                    var cb = dt.bulan;
                    labeldt.push(cb)

                    var get_view_we= parseInt(dt.we) || 0;
                    val_dt_view_we.push(get_view_we)
    
                    var get_view_hs= parseInt(dt.hs) || 0;
                    val_dt_view_hs.push(get_view_hs)

                    var get_view_pp= parseInt(dt.pp) || 0;
                    val_dt_view_pp.push(get_view_pp)
                    
                    var get_view_kj= parseInt(dt.kj) || 0;
                    val_dt_view_kj.push(get_view_kj)

                    var get_view_wf= parseInt(dt.wf) || 0;
                    val_dt_view_wf.push(get_view_wf)

                    var get_view_nw= parseInt(dt.nw) || 0;
                    val_dt_view_nw.push(get_view_nw)
                }
                
                var myData = {
                    labels:labeldt,
                    datasets: [{
                        label: "WE",
                        fill: false,
                        borderColor:'#910410',
                        backgroundColor: '#910410',
                        data: val_dt_view_we,
                        lineTension: 0,
                        borderWidth: 1
                    },
                    {
                        label: "HS",
                        fill: false,
                        borderColor:'#f095c7',
                        backgroundColor: '#f095c7',
                        data: val_dt_view_hs,
                        borderWidth: 1,
                        lineTension: 0
                        
                    }
                    ,
                    {
                        label: "PP",
                        fill: false,
                        borderColor:'#053d14',
                        backgroundColor: '#053d14',
                        data: val_dt_view_pp,
                        borderWidth: 1,
                        lineTension: 0
                    },
                    {
                        label: "KJ",
                        fill: false,
                        borderColor:'#82f5b7',
                        backgroundColor: '#82f5b7',
                        data: val_dt_view_kj,
                        borderWidth: 1,
                        lineTension: 0
                    },
                    {
                        label: "NW",
                        fill: false,
                        borderColor:'#cc414b',
                        backgroundColor: '#cc414b',
                        data: val_dt_view_nw,
                        borderWidth: 1,
                        lineTension: 0
                    },
                    {
                        label: "WF",
                        fill: false,
                        borderColor:'#f5f542',
                        backgroundColor: '#f5f542',
                        data: val_dt_view_wf,
                        borderWidth: 1,
                        lineTension: 0
                    }]
                    
                };
        
                var myoption = {
            
                      title: {
                        display: true,
                        text: 'Programmatics Revenue (IDR) '
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
                            beginAtZero: true,
                            callback: function(value, index, values) {
                                if(parseInt(value) >= 1000){
                                  return  value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                } else {
                                  return  value;
                                }
                              }
                            },
                        }],
                        xAxes: [{
                            barThickness :10
                        }]
                        }
                };
                // Code to draw Chart

                // Code to draw Chart
                document.getElementById("ChartRevenueIDRContent").innerHTML = '&nbsp;';
                document.getElementById("ChartRevenueIDRContent").innerHTML = '<canvas id="ChartRevenueIDR" height="100px" ></canvas>';
                
                var ctx1 = document.getElementById('ChartRevenueIDR').getContext('2d');
                
                var myChart = new Chart(ctx1, {
                    type: 'line',        // Define chart type
                    data: myData,    	// Chart data
                    options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
                });
        }
        });
}

function ads_balance()
{
	// chart monthly
	$.ajax({
		url : base_url+"/ads/ads_balance",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt_deposit= [];
			const val_dt_balance= [];
		
            for (var dt of data) {
                var cb = dt.website_name;
                labeldt.push(cb)

                var get_deposit= parseInt(dt.deposit) || 0;
				
                val_dt_deposit.push(get_deposit)

				var get_revenue= parseInt(dt.revenue) || 0;
				
                val_dt_balance.push(get_revenue)

            }
			
			var myData = {
				labels:labeldt,
				datasets: [{
					label: "Deposit",
					fill: false,
					backgroundColor: '#78a2f0',
					data: val_dt_deposit,
				},
				{
					label: "Revenue",
					fill: false,
					backgroundColor: '#b1c8fa',
					data: val_dt_balance,
				}]
			};
	
			var myoption = {
				tooltips: {
					enabled: true
				},
                title: {
                    display: true,
                    text: 'Programmatics Deposit Vs Balance (USD)'
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
						barThickness :10
					}]
					}
			};
			// Code to draw Chart
			var ctx = document.getElementById('ChartBalance').getContext('2d');
			
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
	}
	});

	

}

