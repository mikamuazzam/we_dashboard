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
 
  chart_inv();
 
  get_inv_list();
  tot_cashout(bulan,tahun);
  tot_cashin(bulan,tahun);
}


function tot_cashout(bulan,tahun)
{
    $.ajax({
        type: "POST",
        url: base_url+"finance/tot_cashout",
        data :{bulan:bulan,tahun:tahun},
        success: function(data) {
           $('#total_cashout').html('Cash Out  Rp. '+data);
        }
    });
}
function tot_cashin(bulan,tahun)
{
    $.ajax({
        type: "POST",
        url: base_url+"finance/tot_cashin",
        data :{bulan:bulan,tahun:tahun},
        success: function(data) {
           $('#total_cashin').html('Cash In  Rp. '+data);
        }
    });
}


function get_inv_list()
{
	$("#inv_list").DataTable({
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
      { data: "status_inv", title: "Status "},
			{ data: "company_name", title: "Name" },
			{ data: "productname", title: "Event" },
      { data: "amount_po",  render: $.fn.dataTable.render.number( '.', ',', 0 ),title: "Amount PO",className: "text-right"},
     
    
      { data: "inv_date", title: "Inv Date" },
      { data: "exp_inv_date", title: "Update date" },
      { data: "remarks", title: "Remarks "}

		],
		ajax: {
		
			url: base_url+"finance/inv_list",
			type: 'post',
			dataType: 'json',
			dataSrc:""
		},
	});
  

}

function chart_inv()
{

  $.ajax({
    url : base_url+"/finance/inv_pie",
    type : "GET",
    success : function(data){
      data = JSON.parse(data);
    
      const labeldt3 = [];
      const val_dt3= [];
    
    
      for (var dt of data) {
        var cb = dt.name;
        labeldt3.push(cb)

        var get_val= parseInt(dt.jum) || 0;
        val_dt3.push(get_val)

        
      }
    var data = [{
        data: val_dt3,
        backgroundColor: [
          "#4b77a9",
          "#5f255f",
          "#d21243",
          "#B27200"
        ],
        borderColor: "#fff"
      }];
      
      var options = {
        tooltips: {
          enabled: true
        },
        title: {
            display: true,
            text: 'Invoices Distribution (%)'
        }
        ,
        legend: {
            position: 'right'
        },
        plugins: {
          datalabels: {
            formatter: (value, dnct1) => {
                let sum = 0;
                let dataArr = dnct1.chart.data.datasets[0].data;
                dataArr.map(data => {
                    sum += data;
                });
                let percentage = (value*100 / sum).toFixed(2)+'%';
                return percentage;
            },
            color: '#ff3'
        }
        }
      };
      
      
      var ctx = document.getElementById("pie-chart").getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
        labels: labeldt3,
          datasets: data
        },
        options: options
      });
    }
  });
};
function chart_cash()
{

    var data = [{
        data: [50, 55],
        backgroundColor: 
          
          "#5f255f"
        
        ,
        borderColor: "#fff"
      }];
      
      var options = {
        tooltips: {
          enabled: true
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
        title: {
            display: true,
            text: 'Cash In / Cash Out'
        }
        ,
        legend: {
            position: 'top'
        },
        plugins: {
          datalabels: {
            display: true,
            align: 'top',
            anchor:'end'
          }
        }
      };
      
      
      var ctx = document.getElementById("ChartCash").getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
        labels: ['Cash In', 'Cash Out'],
          datasets: data
        },
        options: options
      });
};



  