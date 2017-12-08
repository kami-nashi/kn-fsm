<?php
$m_data = maintenance();

echo '

<div ><canvas id="doughnut-chart2" width="200" height="200"></canvas></div>
<script>
new Chart(document.getElementById("doughnut-chart2"), {
    type: "doughnut",
    data: {
      labels: ["Time On", "Time Remaining"],
      datasets: [
        {
          label: "Hours Overview",
          backgroundColor: ["#009900", "#70db70"],';
echo '    data: ['.$m_data[2].','.$m_data[3].']';
echo '
        }
      ]
    },
    options: {
      title: {
        display: false,
        text: "Hours Overview"
      }
    }
});
</script>
';

?>
