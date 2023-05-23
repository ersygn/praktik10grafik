<?php
include('koneksi2.php');
$data = mysqli_query($koneksi2,"select * from covid19");
while($row = mysqli_fetch_array($data)){
$country_other[] = $row['country_other'];
$query = mysqli_query($koneksi2,"select total_cases from covid19 where id='".$row['id']."'");
$row = $query->fetch_array();
$total_cases[] = $row['total_cases'];
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Membuat Grafik Menggunakan Chart JS</title>
<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
<div style="width: 800px;height: 800px">
<canvas id="myChart"></canvas>
</div>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',
data: {
labels: <?php echo json_encode($country_other); ?>,
datasets: [{
label: 'Grafik Data 10 Negara Covid19',
data: <?php echo json_encode($total_cases);

?>,

backgroundColor: 'rgba(255, 99, 132, 0.2)',
borderColor: 'rgba(255,99,132,1)',
borderWidth: 1
}]
},
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero:true
}
}]
}
}
});
</script>
</body>

</html>