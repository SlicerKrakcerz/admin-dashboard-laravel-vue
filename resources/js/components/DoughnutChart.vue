<template>
  <div>
    <canvas id="doughnutChart"></canvas>
  </div>
</template>

<script>
import { Doughnut } from 'vue-chartjs';

export default {
  extends: Doughnut,
  props: ['data'],
  mounted() {
    this.renderChart(doughnutChartData, {
      responsive: true,
      maintainAspectRatio: false,
    });
  },
};

export const doughnutChartData = {
  labels: ['Label 1', 'Label 2', 'Label 3'],
  datasets: [
    {
      data: [30, 40, 30],
      backgroundColor: ['rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)', 'rgba(255, 206, 86, 0.6)'],
    },
  ],
};
</script>