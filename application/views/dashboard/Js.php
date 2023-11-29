<script type="text/javascript">
function grafikKategori(){
<?php
	foreach($kategori as $k){
		$ktgr[] = $k->kategori;
		$jmlK[] = $k->jml_kategori;
	}
?>
  var ctx = document.getElementById("grafikKategori");
  ctx.height = 100;
  var data = {
		labels: <?php echo json_encode($ktgr)?>,
		datasets: [{
		label: "Kategori",
		data: <?php echo json_encode($jmlK)?>,
		backgroundColor: ["#1d7af3","#f3545d","#fdaf4b","#59d05d","#00c0ef","#5f76e8","#3498db"]
		}]
	};
var options = {
    responsive: true,
    hover: {
      mode: 'label',
    },
    tooltips: {
      enabled: true,
      callbacks: {
        label: function(tooltipItem, data) {
          var label = 'Jumlah Item';
          var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
          return label + ' : ' + val;
        }
      }

    }
  };
  var myBarChart = new Chart(ctx, {
		type: 'bar',
		data: data,
		options: options,
	});
}


function grafikKas(){
<?php
	foreach($kas as $kas){
		$jenis[] = $kas->jenis;
		$jumlahKas[] = $kas->jumlah;
	}
?>
  var ctx = document.getElementById("grafikKas");
  ctx.height = 220;
  var data = {
		labels: <?php echo json_encode($jenis)?>,
		datasets: [{
		label: "Jenis",
		data: <?php echo json_encode($jumlahKas)?>,
		backgroundColor: ["#1d7af3","#f3545d","#fdaf4b",],
		}]
	};
var options = {
	legend: {
		position : 'bottom',
		labels : {
			fontColor: 'rgb(154, 154, 154)',
			fontSize: 11,
			usePointStyle : true,
			padding: 20
		}
	},
	pieceLabel: {
		render: 'percentage',
		fontColor: 'white',
		fontSize: 14,
	},
    responsive: true,
    hover: {
      mode: 'label',
    },
    tooltips: {
      enabled: true,
      callbacks: {
        label: function(tooltipItem, data) {
          var label = data.labels[tooltipItem.index];
          var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
          return label + ' : Rp. ' + number_format(val) +',-';
        }
      }

    }
  };
  var myBarChart = new Chart(ctx, {
		type: 'pie',
		data: data,
		options: options,
	});
}


function grafikPendapatan(){
<?php
	foreach($pendapatan as $pendapatan){
	$tgl[] = $pendapatan->tgl;
	$total[] = $pendapatan->total;
	}
?>

if ($('#grafikPendapatan').length ){	
			
		var ctx = document.getElementById("grafikPendapatan");
		var lineChart = new Chart(ctx, {
			type: 'line',
			data: {
			labels: <?php echo json_encode($tgl)?>,
			datasets: [{
				label: "Total",
				borderColor: "#1d7af3",
				pointBorderColor: "#FFF",
				pointBackgroundColor: "#1d7af3",
				pointBorderWidth: 2,
				pointHoverRadius: 4,
				pointHoverBorderWidth: 1,
				pointRadius: 4,
				backgroundColor: 'transparent',
				fill: true,
				borderWidth: 2,
				data: <?php echo json_encode($total)?>
			}]
			},
			options: {
				
				scales: {
					yAxes: [{
						ticks: {
							// Include a dollar sign in the ticks
							callback: function (value, index, values) {
								return 'Rp. ' + number_format(value);
							}
						},
						
					}],
				},
				legend: {
					display: false
				},
				tooltips: {
					callbacks: {
						label: function (tooltipItem, chart) {
							var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
							return datasetLabel + ': Rp. ' + number_format(tooltipItem.yLabel);
						}
					}
				}
			}
			
		});
		
	};

}

</script>