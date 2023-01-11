
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
								backgroundColor: 'rgba(148, 1, 25, 0.88)',
								borderWidth: 1,
								data: we_dt
							},
							{
								label: "HS",
								fill: false,
								borderColor :'rgb(255, 128, 128)',
								backgroundColor: 'rgb(255, 128, 128)',
								borderWidth: 1,
								data: hs_dt
								},
							{
								label: "POPULIS",
								fill: false,
								borderColor:'rgba(36, 135, 58, 0.71)',
								backgroundColor: 'rgba(36, 135, 58, 0.71)',
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
	chart_medsos_ig(1,'ig_we','Follower Instagram','rgba(148, 1, 25, 0.88)');
	chart_medsos_tiktok(1,'tiktok_we','Follower Tiktok','rgba(148, 1, 25, 0.88)');
	chart_medsos_youtube(1,'yt_we','Subscriber Youtube','rgba(148, 1, 25, 0.88)');
}
function chart_hs()
{
	chart_medsos_ig(2,'ig_hs','Follower Instagram','rgb(255, 128, 128)');
	chart_medsos_youtube(2,'yt_hs','Subscriber Youtube','rgb(255, 128, 128)');
	chart_medsos_tiktok(2,'tiktok_hs','Follower Tiktok','rgb(255, 128, 128)');
}
function chart_pp()
{
	chart_medsos_ig(3,'ig_pp','Follower Instagram','rgba(36, 135, 58, 0.71)');
	chart_medsos_youtube(3,'yt_pp','Subscriber Youtube','rgba(36, 135, 58, 0.71)');
	chart_medsos_tiktok(3,'tiktok_pp','Follower Tiktok','rgba(36, 135, 58, 0.71)');
}
function chart_kj()
{
	chart_medsos_ig(4,'ig_kj','Follower Instagram','rgb(25, 77, 51)');
	chart_medsos_youtube(4,'yt_kj','Subscriber Youtube','rgb(25, 77, 51)');
	chart_medsos_tiktok(4,'tiktok_kj','Follower Tiktok','rgb(25, 77, 51)');
}
function chart_gs()
{
	chart_medsos_ig(9,'ig_gs','Follower Instagram','rgb(0, 51, 0)');
	chart_medsos_youtube(9,'yt_gs','Subscriber Youtube','rgb(0, 51, 0)');
	chart_medsos_tiktok(9,'tiktok_gs','Follower Tiktok','rgb(0, 51, 0)');
}
function chart_wea()
{
	chart_medsos_ig(10,'ig_wea','Follower Instagram','rgb(255, 51, 0)');
	chart_medsos_youtube(10,'yt_wea','Subscriber Youtube','rgb(255, 51, 0)');
	chart_medsos_tiktok(10,'tiktok_wea','Follower Tiktok','rgb(255, 51, 0)');
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
		  var minData=Math.min.apply(this, rankdt);
		  var maxData=Math.max.apply(this, rankdt);
		 
		  if (minData < 100) miny=minData - 10; else miny=minData -100 ;
		  if (maxData < 100) maxy=maxData + 100; else  maxy=maxData + 1000;

		  if(maxy < 200) step=50; else step=500;
		
		  var ctx = document.getElementById(idchart).getContext("2d");
		  var LineGraph = new Chart(ctx, {
			type: 'line',
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
						  min:miny,
						  max:maxy,
						  stepSize:step,
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
function chart_medsos_tiktok(web_id,idchart,judul,warna)
{

	$.ajax({
		data :{website:web_id},
		url : base_url+"dashboard/chart_list_tiktok",
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
		  var minData=Math.min.apply(this, rankdt);
		  var maxData=Math.max.apply(this, rankdt);
		 
		  if (minData < 100) miny=minData - 10; else miny=minData -100 ;
		  if (maxData < 100) maxy=maxData + 100; else  maxy=maxData + 1000;

		  if(maxy < 200) step=50; else step=500;

		  var ctx = document.getElementById(idchart).getContext("2d");
		  var LineGraph = new Chart(ctx, {
			type: 'line',
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
						  min:miny,
						  max:maxy,
						  stepSize:step,
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
function chart_medsos_youtube(web_id,idchart,judul,warna)
{

	$.ajax({
		data :{website:web_id},
		url : base_url+"dashboard/chart_list_youtube",
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
		  var minData=Math.min.apply(this, rankdt);
		  var maxData=Math.max.apply(this, rankdt);
		 
		  if (minData < 100) miny=minData - 10; else miny=minData -100 ;
		  if (maxData < 100) maxy=maxData + 100; else  maxy=maxData + 1000;

		  if(maxy < 200) step=50; else step=500;

		  var ctx = document.getElementById(idchart).getContext("2d");
		  var LineGraph = new Chart(ctx, {
			type: 'line',
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
							min:miny,
							max:maxy,
							stepSize:step,
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