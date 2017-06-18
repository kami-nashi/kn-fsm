<?php

echo '

<div><canvas id="line" width="400" height="225"></canvas><?div>
<script>
new Chart(document.getElementById("line"), {
  type: "line",
  data: {
    labels: [5,6,7,8,9,10,11,12],
    datasets: [{ 
        data: [1,1.5,1,1.5,2.5,0.25,0,1],
        label: "Skate Time",
        borderColor: "#8e5ea2",
        fill: true
      }, { 
        data: [0,1,0,0,0,0,0,0],
        label: "Coach Time",
        borderColor: "#3e95cd",
        fill: true
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: "Skate time (last 9 days)"
    }
  }
});
</script>
';
?>
