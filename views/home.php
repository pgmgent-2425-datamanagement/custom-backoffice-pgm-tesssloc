<h2>Welcome admin</h2>

<h3>Stories per user</h3>

<?php 
$userLabels = [];
foreach ($users as $user) {
    $userLabels[] = $user->username;
}; 


$data = [];
foreach ($users as $user) {
    $data[] = $user->numberOfStories;
}; 

?>

<div>
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?= json_encode($userLabels) ?>,
      datasets: [{
        label: 'Number of stories',
        data: <?= json_encode($data) ?>,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>


<div>
  <canvas id="chart2"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const chart = document.getElementById('chart2');

  new Chart(chart, {
    type: 'doughnut',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
 