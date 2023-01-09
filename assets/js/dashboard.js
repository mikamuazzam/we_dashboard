
$(function() {

	 //chart WE
	 $.ajax({
		
		url : base_url+"dashboard/chart_web_we",
		type : "GET",
		success : function(data){
			data = JSON.parse(data);
            const labeldt = [];
            const we_dt= [];
			const hs_dt= [];
			const populis_dt= [];
			const kj_dt= [];
            for (var dt of data) {
                var tanggal_rank = dt.tgl;
                labeldt.push(tanggal_rank)

                var get_we= parseInt(dt.we) || 0;
                we_dt.push(get_we)

				var get_hs= parseInt(dt.hs) || 0;
                hs_dt.push(get_hs)

				var get_populis= parseInt(dt.populis) || 0;
                populis_dt.push(get_populis)

				var get_kj= parseInt(dt.konten_jatim) || 0;
                kj_dt.push(get_kj)

            }
		  	var chartdata = {
			labels: labeldt,
			datasets: [
							{
								label: "WE",
								fill: false,
								borderColor: 'rgba(148, 1, 25, 0.88)',
								borderWidth: 1,
								data: we_dt
							},
							{
								label: "HS",
								fill: false,
								borderColor :'rgb(255, 128, 128)',
								borderWidth: 1,
								data: hs_dt
								},
							{
								label: "POPULIS",
								fill: false,
								borderColor:'rgba(36, 135, 58, 0.71)',
								borderWidth: 1,
								data:populis_dt
							}
			  
			]
		  };
	
		  var ctx = document.getElementById("myChartWE").getContext("2d");
		  
		  var LineGraph = new Chart(ctx, {
			type: 'line',
			data: chartdata,
			options: {
				scales: {
					yAxes: [{
						ticks: {
						  stepSize: 20,
						  beginAtZero: true,
						
						  reverse: true
						},
					  }],
				  },
				  responsive: true,
				  maintainAspectRatio: false
			}
		  });
		},
		error : function(data) {
	
		}
	  }); 

	  chart_we();
	  chart_hs();
	  chart_pp();
	  chart_kj();
	  chart_gs();
	  chart_wea();
});

function chart_we()
{
	chart_medsos_ig(1,'ig_we','WartaEkonomi','rgba(148, 1, 25, 0.88)');
}
function chart_hs()
{
	chart_medsos_ig(2,'ig_hs','Herstory','rgb(255, 128, 128)');
}
function chart_pp()
{
	chart_medsos_ig(3,'ig_pp','Populis','rgba(36, 135, 58, 0.71)');
}
function chart_kj()
{
	chart_medsos_ig(4,'ig_kj','Konten Jatim','rgb(25, 77, 51)');
}
function chart_gs()
{
	chart_medsos_ig(9,'ig_gs','Generasi Sawit','rgb(0, 51, 0)');
}
function chart_wea()
{
	chart_medsos_ig(10,'ig_wea','WE Academy','rgb(255, 51, 0)');
}
function chart_medsos_ig(web_id,idchart,judul,warna)
{

	$.ajax({
		data :{website:web_id},
		url : base_url+"dashboard/chart_list_medsos",
		type : "GET",
		success : function(data){
			data = JSON.parse(data);
            const labeldt = [];
            const rankdt= [];
	
            for (var dt of data) {
                var tanggal_rank = dt.tgl;
                labeldt.push(tanggal_rank)

                var get_we= parseInt(dt.rank) || 0;
                rankdt.push(get_we)

            }
		  	var chartdata = {
			labels: labeldt,
			datasets: [
							{
								label: judul,
								fill: false,
								borderColor: warna,
								borderWidth: 1,
								data: rankdt
							}
			  
			]
		  };
	
		  var ctx = document.getElementById(idchart).getContext("2d");
		  var LineGraph = new Chart(ctx, {
			type: 'line',
			data: chartdata,
			options: {
				scales: {
					yAxes: [{
						ticks: {
						 
						  beginAtZero: true
						},
					  }],
				  },
				  responsive: true,
				  maintainAspectRatio: false
			}
		  });
		},
		error : function(data) {
	
		}
	  }); 

}