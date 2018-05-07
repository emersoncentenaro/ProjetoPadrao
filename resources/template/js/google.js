// Carrega a API da biblioteca Visualization e add os nomes dos pacotes.
google.load('visualization', '1', {'packages': ['corechart']});

// seta a função de callback
google.setOnLoadCallback(criarGrafico);

// função de callback
function criarGrafico() {
    var dataTable = new google.visualization.DataTable();
    dataTable.addColumn('string', 'Profissionais TI 2015');
    dataTable.addColumn('number', 'Média Mínima');
    dataTable.addColumn('number', 'Média Máxima');

    dataTable.addRows([
        ['Designer', {v: 1500, f: 'R$ 1500,00'}, {v: 2000, f: 'R$ 2000,00'}],
        ['Programador', {v: 2500, f: 'R$ 2500,00'}, {v: 3500, f: 'R$ 3500,00'}],
        ['Arquiteto de Software', {v: 4750, f: 'R$ 4750,00'}, {v: 5680, f: 'R$ 5680,00'}],
        ['Gerente de Projetos', {v: 7500, f: 'R$ 7500,00'}, {v: 9600, f: 'R$ 9600,00'}],
    ]);

    var options = {
        width:$("#chart").width() - 15,
        height: 450,
        legend: {position: 'top', maxLines: 3},
        title: 'Média de Salários em TI/Aprovação',
        hAxis: {
            title: 'Profissional'
        },
        vAxis: {
            title: 'Salários'
        },
        bar: {groupWidth: "50%"}
    };

    var chart = new google.visualization.ColumnChart(
            document.getElementById('chart'));

    chart.draw(dataTable, options);
}