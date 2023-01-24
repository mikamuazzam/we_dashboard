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
    speedo();
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

function speedo()
{
    var opts = {
        angle: 0, // The span of the gauge arc
        lineWidth: 0.3, // The line thickness
        radiusScale: 0.9, // Relative radius
        pointer: {
          length: 0.42, // // Relative to gauge radius
          strokeWidth: 0.029, // The thickness
          color: '#000000' // Fill color
        },
        limitMax: true,     // If false, max value increases automatically if value > maxValue
        limitMin: true,     // If true, the min value of the gauge will be fixed
        colorStart: '#6F6EA0',   // Colors
        colorStop: '#C0C0DB',    // just experiment with them
        strokeColor: '#EEEEEE',  // to see which ones work best for you
        generateGradient: true,
        highDpiSupport: true,     // High resolution support
        // renderTicks is Optional
        // renderTicks: {
        //   divisions: 0,
        //   divWidth: 0.1,
        //   divLength: 0.41,
        //   divColor: '#333333',
        //   subDivisions: 0,
        //   subLength: 0.14,
        //   subWidth: 3.1,
        //   subColor: '#ffffff'
        // },
        staticZones: [
         {strokeStyle: "#F03E3E", min: 70, max: 80}, // Red from 70 to 80
         {strokeStyle: "#FFDD00", min: 80, max: 90}, // Yellow 80 to 90
         {strokeStyle: "#30B32D", min: 90, max: 100}, // Green 90 to 100
        ],
        staticLabels: {
        font: "10px sans-serif",  // Specifies font
        labels: [70, 80, 90, 100],  // Print labels at these values
        color: "#000000",  // Optional: Label text color
        fractionDigits: 0  // Optional: Numerical precision. 0=round off.
      },
        
      };
      var target = document.getElementById('foo'); // your canvas element
      var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
      gauge.maxValue = 100; // set max gauge value
      gauge.setMinValue(70);  // Prefer setter over gauge.minValue = 0
      gauge.animationSpeed = 10; // set animation speed (32 is default value)
      gauge.set(92); // set actual value
}
