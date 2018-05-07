$(function () {

    var ctx = $('#areaChart').get(0).getContext('2d');
   
    var chartGrafico = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Jan", "Fev", "Mar", "Abr", "Maio", "Jun","Jul","Ago"],
            datasets: [{
                    label: "Evolução das Vendas",
                    data: [-11, 14, 16, 12, 11, -14,17,12],
                    backgroundColor: ["#00b894", "#6c5ce7", "#2d3436", "#2d3556", "#cd3436","#cd3739","#fff730"]
                }]
        },
        options: {
            legend: {position: 'bottom'},
            title: {display: false,text: 'Custom Chart Title'},
            responsive: true,
            maintainAspectRatio: false,
            scales:{
                xAxes:[{barPercentage: 0.5}]
            }

        }
    });
    

    var vendasItens = $("#areaChartItens")[0].getContext('2d');
    var graficoItens = new Chart(vendasItens, {
        type: 'line',
        data: {
            labels: ['Gol', 'Fiat', 'Kia', 'Gw'],
            datasets: [{
                    label: 'Veiculos por Tipo',
                    backgroundColor: ["#00b894", "#6c5ce7", "#2d3436", "#c56cf0"],
                    fill: false,
                    lineTension: 0,
                    data: [10, 30, 10, 20]
                }]
        },
        options: {
            legend: {position: 'bottom'},
            title: {display: false}
        }
    });
    var vendasPizza = $("#areaChartPizza")[0].getContext('2d');
    var graficoPizza = new Chart(vendasPizza, {
        type: 'pie',
        data: {
            labels: ['Gol', 'Fiat', 'Kia', 'Gw'],
            datasets: [{
                    label: 'Veiculos por Tipo',
                    backgroundColor: ["#00b894", "#6c5ce7", "#2d3436", "#c56cf0"],
                    data: [-10, 100, 105, 102]
                }]
        },
        options: {
            legend: {position: 'bottom'},
            title: {display: false}
        }
    });
    
    



});

