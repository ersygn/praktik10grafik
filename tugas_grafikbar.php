<?php
include('koneksi2.php');
$data = mysqli_query($koneksi2,"select * from covid19");
while($row = mysqli_fetch_array($data)){
$country_other[] = $row['country_other'];
$query = mysqli_query($koneksi2,"select total_deaths, total_cases, total_recovered, active_cases, total_test from covid19 where id='".$row['id']."'");
$row = $query->fetch_array();
$total_deaths[] = $row['total_deaths'];
$total_cases[] = $row['total_cases'];
$total_recovered[] = $row['total_recovered'];
$active_cases[] = $row['active_cases'];
$total_test[] = $row['total_test'];
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Membuat Grafik Menggunakan Chart JS</title>
<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
	<div style="width: 700px;height: 700px">
		<h4>Total Cases</h4>
		<canvas id="myChart"></canvas><br>
		<h4>Total Deaths</h4>
		<canvas id="myChart2"></canvas><br>
		<h4>Total Recovered</h4>
		<canvas id="myChart3"></canvas><br>
		<h4>Active Cases</h4>
		<canvas id="myChart4"></canvas><br>
		<h4>Total Test</h4>
		<canvas id="myChart5"></canvas>
	</div>

<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',
data: {
labels: <?php echo json_encode($country_other); ?>,
datasets: [{
label: 'Grafik Total Cases Data 10 Negara Covid19',
data: <?php echo json_encode($total_cases);

?>,

backgroundColor: 'rgba(75, 0, 130, 0.2)',
borderColor: 'rgba(75, 0, 130,1)',
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

var ctx = document.getElementById("myChart2").getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',
data: {
labels: <?php echo json_encode($country_other); ?>,
datasets: [{
label: 'Grafik Total Deaths Data 10 Negara Covid19',
data: <?php echo json_encode($total_deaths);

?>,

backgroundColor: 'rgba(165, 42, 42, 0.2)',
borderColor: 'rgba(165, 42, 42,1)',
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

var ctx = document.getElementById("myChart3").getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',
data: {
labels: <?php echo json_encode($country_other); ?>,
datasets: [{
label: 'Grafik Total Cases Data 10 Negara Covid19',
data: <?php echo json_encode($total_recovered);

?>,

backgroundColor: 'rgba(19, 100, 0, 0.2)',
borderColor: 'rgba(19, 100, 0,1)',
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

var ctx = document.getElementById("myChart4").getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',
data: {
labels: <?php echo json_encode($country_other); ?>,
datasets: [{
label: 'Grafik Active Cases Data 10 Negara Covid19',
data: <?php echo json_encode($active_cases);

?>,

backgroundColor: 'rgba(25, 25, 112, 0.2)',
borderColor: 'rgba(25, 25, 112,1)',
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

var ctx = document.getElementById("myChart5").getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',
data: {
labels: <?php echo json_encode($country_other); ?>,
datasets: [{
label: 'Grafik Total Test Data 10 Negara Covid19',
data: <?php echo json_encode($total_test);

?>,

backgroundColor: 'rgba(26, 128, 127, 0.2)',
borderColor: 'rgba(26, 128, 127,1)',
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