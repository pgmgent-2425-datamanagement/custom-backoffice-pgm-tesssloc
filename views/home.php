<h2>Welcome admin</h2>

<?php 
$userLabels = [];
foreach ($users as $user) {
    $userLabels[] = $user->username;
}; 


$data = [];
foreach ($users as $user) {
    $data[] = $user->numberOfStories;
};

$amountOfStories = [];
foreach ($stories as $story) {
    $amountOfStories[] = $story->numberOfStories;
};

$days = [];
foreach ($stories as $story) {
    $days[] = $story->posting_date;
};

?>

<h3>Stories per user (top 10)</h3>

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
          beginAtZero: true,
          ticks: {
            stepSize: 1
          }
        }
      }
    }
  });
</script>

<h3>Stories posted per day (10 latest days on which stories were posted)</h3>

<div>
  <canvas id="chart2"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const chart = document.getElementById('chart2');

  new Chart(chart, {
    type: 'line',
    data: {
      labels: <?= json_encode($days) ?>,
      datasets: [{
        label: '# of Votes',
        data:  <?= json_encode($amountOfStories) ?>,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            stepSize: 1
          }
        }
      }
    }
  });
</script>
 