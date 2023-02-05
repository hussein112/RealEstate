import { colors, currentTheme } from "./colors.js";

Chart.defaults.color = colors[currentTheme].secondary;
Chart.defaults.borderColor = colors[currentTheme].secondary;

const totalMarketing = document.getElementById('totalMarketing');
new Chart(totalMarketing, {
    type: 'line',
    data: {
      labels: ["5", "10", "15", "20", "25", "30"],
      datasets: [{
        label: '# of Customers / Jan',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1,
      }]
    },
    options: {
        plugins: {
            subtitle: {
                display: true,
                text: 'Total number of Customers',
            },
            legend: {
                display: true
            },
        },
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    }
});



const topProperties = document.getElementById('topProperties');
new Chart(topProperties, {
    type: 'bar',
    data: {
      labels: ["5", "10", "15", "20", "25", "30"],
      datasets: [{
        label: '# of Views / Month',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1,
      }]
    },
    options: {
        plugins: {
            subtitle: {
                display: true,
                text: 'Top Viewed Property/Month',
            },
            legend: {
                display: true
            },
        },
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    }
});