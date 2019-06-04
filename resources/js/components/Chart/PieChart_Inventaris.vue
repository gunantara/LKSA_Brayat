<script>
// CommitChart.js
import { Pie } from "vue-chartjs";

export default {
  extends: Pie,
  mounted() {
    // Overwriting base render method with actual data.
    let uri = "api/tampil_umur";
    let Years = new Array();
    let Labels = new Array();
    let Count = new Array();
    axios.get(uri).then(response => {
      let data = response.data.tampil_umur;
      if (data) {
        data.forEach(element => {
          Years.push(element.umur);
          Labels.push(element.name);
          Count.push(element.jumlah);
        });
        this.renderChart(
          {
            labels: Years,
            datasets: [
              {
                backgroundColor: [
                  "#f56954",
                  "#ffc107",
                  "#00a65a",
                  "#00c0ef",
                  "#3c8dbc"
                ],
                data: Count
              }
            ]
          },
          {
            responsive: true,
            maintainAspectRatio: false
          }
        );
      } else {
        console.log("No data");
      }
    });
  }
};
</script>
