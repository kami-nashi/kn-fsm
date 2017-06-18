<?php

echo '
               <div> <canvas id="pie-chart" width="300" height="300"></canvas></div>
                <script>
        new Chart(document.getElementById("pie-chart"), {
    type: "pie",
    data: { 
      labels: ["Equipment", "Maintenance", "Class Fees", "Performance", "Membership Fees", "Competition Fees", "Ice Time", "Coaching Cost"],
      datasets: [{
        label: "Totals",
backgroundColor: ["#3e95cd","#8e5ea2","#3cba9f","#e8c3b9","#c45850","#4cc5b7","#d816e0","#3d86e8"],';
print '       data: ['.$totals[0].','.$totals[1].','.$totals[2].','.$totals[3].','.$totals[4].','.$totals[5].','.$ice[0].','.$coach[0].']';
print '        
      }]
    },
    options: {
      title: {
        display: true,
        text: "Totals"
      },
     legend: {
        display: false,
        }
    }
});
</script>';

?>
