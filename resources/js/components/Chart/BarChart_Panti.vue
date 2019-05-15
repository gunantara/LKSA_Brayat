<script>
// CommitChart.js
import { Bar } from "vue-chartjs";

export default {
  extends: Bar,
  mounted() {
    // Overwriting base render method with actual data.
    let uri = "api/tampil_anak";
    let Years = new Array();
    let Labels = new Array();
    let Count = new Array();
    axios.get(uri).then(response => {
      let data = response.data.anak_panti;
      if (data) {
        data.forEach(element => {
          Years.push(element.year);
          Labels.push(element.name);
          Count.push(element.count);
        });
        this.renderChart(
          {
            labels: Years,
            datasets: [
              {
                label: "Anak Panti",
                backgroundColor: "#00a65a",
                data: Count
              }
            ]
          },
          {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              yAxes: [
                {
                  ticks: {
                    stepSize: 1,
                    maxTicksLimit: 3,
                    beginAtZero: true
                  }
                }
              ]
            }
          }
        );
      } else {
        console.log("No data");
      }
    });
  }
};
</script>
