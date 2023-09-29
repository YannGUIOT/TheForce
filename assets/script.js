let totalDS;
let totalJ;
let total;

const fetchTotal = () => {
    fetch('http://localhost/TheForce/index.php?action=getTotal')
    .then(response => response.json())
    .then(data => {
        totalDS = parseInt(data.totalDS);
        totalJ = parseInt(data.totalJ);
        total = totalDS + totalJ;
        displayChart1();
        displayChart2();
        displayChart3();
    })
    .catch(error => {
        console.error('Erreur de récupération des données :', error);
    });
}
fetchTotal();


const displayChart1 = () => {
  Highcharts.chart('chart1', {
      chart: {
          type: 'bar'
      },
      title: {
          text: 'Dark-Side & Jedi'
      },
      xAxis: {
          categories: ['Dark-Side', 'Jedi']
      },
      yAxis: {
          title: {
              text: 'The Force'
          }
      },
      series: [{
          name: 'Dark-Side',
          data: [totalDS, 0]
      }, {
          name: 'Jedi',
          data: [0, totalJ]
      }]
  });
}



const displayChart2 = () => {
  Highcharts.chart('chart2', {

    title: {
        text: 'Dark-Side & Jedi'
    },

    xAxis: {
        tickInterval: 1,
        type: 'logarithmic',
        accessibility: {
            rangeDescription: 'Range: 1 to 10'
        }
    },

    yAxis: {
        type: 'logarithmic',
        minorTickInterval: 0.1,
        accessibility: {
            rangeDescription: 'Range: 0.1 to 1000'
        }
    },

    tooltip: {
        headerFormat: '<b>The Force</b><br />',
        pointFormat: 'DarkSide = {point.x}, Jedi = {point.y}'
    },

    series: [{
        data: [totalDS, totalJ],
        pointStart: 1
    }]
  });
}

const displayChart3 = () => {
  Highcharts.chart('chart3', {
    chart: {
        type: 'area'
    },
    accessibility: {
        description: ''
    },
    title: {
        text: 'Dark-Side & Jedi'
    },
    subtitle: {
        text: 'The Force'
    },
    xAxis: {
        allowDecimals: false,
        accessibility: {
            rangeDescription: 'Range:'
        }
    },
    yAxis: {
        title: {
            text: 'Force'
        }
    },
    tooltip: {
        pointFormat: ''
    },
    plotOptions: {
        area: {
            pointStart: 0,
            marker: {
                enabled: false,
                symbol: 'circle',
                radius: 2,
                states: {
                    hover: {
                        enabled: true
                    }
                }
            }
        }
    },
    series: [{
        name: 'Dark-Side',
        data: [totalJ, totalDS]
    }, {
        name: 'Jedi',
        data: [totalDS, totalJ]
    }]
  });
}


