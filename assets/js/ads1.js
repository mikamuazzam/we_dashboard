
$(function() {
    $( "#cari" ).click(function() {
		load_chart();
	});
    load_chart();
});

function load_chart()
{
	var bulan=$('#bulan').find('option:selected').val();
	var tahun=$('#tahun').find('option:selected').val();
    get_ads_list(bulan,tahun);
    ads_view(bulan,tahun);
    ads_revenue(bulan,tahun);
    ads_balance();
    ads_monthly(bulan,tahun);

}
function get_ads_list(bulan,tahun)
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
			{ data: "dataadd", title: "Date"},
            { data: "views", title: "Views" ,className: "text-right"},
			{ data: "clicks", title: "Clicks" ,className: "text-right"},
            { data: "ctr", title: "CTR" ,className: "text-right"},
			{ data: "cpc", title: "CPC" ,className: "text-right"},
            { data: "cpm", title: "CPM" ,className: "text-right"},
			{ data: "laba", title: "Revenue" ,className: "text-right"},
		],
		ajax: {
			data :{bulan:bulan,tahun:tahun,website:'1'},
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
		ajax: {
			data :{bulan:bulan,tahun:tahun},
			url: base_url+"ads/monthly_revenue",
			type: 'post',
			dataType: 'json',
			dataSrc:""
		},
	});
}


function ads_view(bulan,tahun)
{
        // chart monthly
        $.ajax({
            data :{bulan:bulan,tahun:tahun,website:'1'},
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
                        borderColor:'#e32239',
                        backgroundColor: '#e32239',
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
                        borderColor:'#38060a',
                        backgroundColor: '#38060a',
                        data: val_dt_view_wf,
                        borderWidth: 1,
                        lineTension: 0
                    }]
                    
                };
        
                var myoption = {
                   
                    title: {
                            display: true,
                            text: 'Daily Website Revenue (USD)'
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
                var ctx = document.getElementById('ChartAds').getContext('2d');
                
                var myChart = new Chart(ctx, {
                    type: 'line',        // Define chart type
                    data: myData,    	// Chart data
                    options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
                });
        }
        });
}   

function ads_revenue(bulan,tahun)
{
        // chart monthly
        $.ajax({
            data :{bulan:bulan,tahun:tahun},
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
                        borderColor:'#e32239',
                        backgroundColor: '#e32239',
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
                        borderColor:'#38060a',
                        backgroundColor: '#38060a',
                        data: val_dt_view_wf,
                        borderWidth: 1,
                        lineTension: 0
                    }]
                    
                };
        
                var myoption = {
            
                      title: {
                        display: true,
                        text: 'Programmatics Monthly Revenue (USD)'
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
                var ctx1 = document.getElementById('ChartRevenue').getContext('2d');
                
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