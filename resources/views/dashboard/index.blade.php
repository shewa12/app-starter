@extends('/dashboard-layouts/master')

@section('content')

<!-- Content area -->
	@include('/components.boxes')

	@include('/components.pie_chart')
<!-- /content area -->

@endsection

@section('js')

<script src="{{url('public/assets/js/app.js')}}"></script>
<script src="{{url('public/js/chart.min.js')}}"></script>
<script src="{{url('public/js/utils.js')}}"></script>
<script type="text/javascript">
		const clients = '100';
		const feedbacks = '123';
		const forms = '45';

		var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};

		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
						clients,
						feedbacks,
						forms,

					],
					backgroundColor: [
						window.chartColors.green,
						window.chartColors.red,
						window.chartColors.blue,
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Clients',
					'Feedbacks',
					'Forms'
				]
			},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}

			config.data.datasets.push(newDataset);
			window.myPie.update();
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myPie.update();
		});
		
</script>
@endsection