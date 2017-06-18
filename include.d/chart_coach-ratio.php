<?php

$coach = add_COACHTIME2();
$no_coach = $ice[1] - $coach[1];
echo '

<div><canvas id="doughnut-chart" width="200" height="200"></canvas></div>
<script>
new Chart(document.getElementById("doughnut-chart"), {
    type: "doughnut",
    data: {
      labels: ["Coached", "Uncoached"],
      datasets: [
        {
          label: "Training Hours",
          backgroundColor: ["#3e95cd", "#8e5ea2"],';
echo '         data: ['.$coach[1].','.$no_coach.']';
echo '
        }
      ]
    },
    options: {
      title: {
        display: false,
        text: "Amount of hours coached vs uncoached"
      }
    }
});
</script>
';

?>
