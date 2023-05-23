<?php
include('koneksi2.php');
$data = mysqli_query($koneksi2, "select * from covid19");
while ($row = mysqli_fetch_array($data)) {
    $country_other[] = $row['country_other'];
    $total_cases[] = $row['total_cases'];

}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Pie Chart</title>
    <script type="text/javascript" src="Chart.js"></script>
</head>

<body>
    <div id="canvas-holder" style="width:45%">
        <canvas id="chart-area"></canvas>
    </div>
    <script>
        var config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: <?php echo json_encode($total_cases);

                    ?>,

                    backgroundColor: [
                        'rgb(253, 215, 3)',
                        'rgb(188, 143, 142)',
                        'rgb(135, 206, 250)',
                        'rgb(240, 128, 128)',
                        'rgb(144, 238, 144)',
                        'rgb(119, 136, 153)',
                        'rgb(25, 25, 112)',
                        'rgb(219, 112, 147)',
                        'rgb(188, 143, 142)',
                        'rgb(250, 99, 71)'
                    ],
                    borderColor: [
                        'rgb(253, 215, 3)',
                        'rgb(188, 143, 142)',
                        'rgb(135, 206, 250)',
                        'rgb(240, 128, 128)',
                        'rgb(144, 238, 144)',
                        'rgb(119, 136, 153)',
                        'rgb(25, 25, 112)',
                        'rgb(219, 112, 147)',
                        'rgb(188, 143, 142)',
                        'rgb(250, 99, 71)'
                    ],
                    label: 'Presentase Data Covid19 Di 10 Negara'
                }],
                labels: <?php echo json_encode($country_other); ?>
            },
            options: {
                responsive: true
            }
        };
        window.onload = function () {

            var ctx = document.getElementById('chart-area').getContext('2d');

            window.myPie = new Chart(ctx, config);
        };
        document.getElementById('randomizeData').addEventListener('click',
            function () {

                config.data.datasets.forEach(function (dataset) {
                    dataset.data = dataset.data.map(function () {
                        return randomScalingFactor();
                    });
                });
                window.myPie.update();
            });
        var colorNames = Object.keys(window.chartColors);
        document.getElementById('addDataset').addEventListener('click',

            function () {

                var newDataset = {
                    backgroundColor: [],
                    data: [],
                    label: 'New dataset ' +

                        config.data.datasets.length,

                };
                for (var index = 0; index < config.data.labels.length;

                    ++index) {

                    newDataset.data.push(randomScalingFactor());
                    var colorName = colorNames[index %

                        colorNames.length];

                    var newColor = window.chartColors[colorName];
                    newDataset.backgroundColor.push(newColor);
                }
                config.data.datasets.push(newDataset);
                window.myPie.update();
            });
        document.getElementById('removeDataset').addEventListener('click',
            function () {

                config.data.datasets.splice(0, 1);
                window.myPie.update();
            });
    </script>
</body>

</html>