$(function() {

    function update_temperature_history() {

        var request_temperature = $.ajax({
            url: 'php/get_history.php',
            type: 'GET',
            data: {sensor: 'temperature'},
            dataType: 'json'
        });

        request_temperature.success(function (result) {
            var timestamps = [];
            var levels = [];

            for (var it in result) {
                timestamps.push(it);
                levels.push(result[it]);
            }

            history_temperature(timestamps, levels);
        });

        request_temperature.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }

    function history_temperature(timestamps, levels) {
        $('#container_temperature').highcharts({
            chart: {
                zoomType: 'x'
            },
            title: {
                text: 'Histórico do Sensor de Temperatura'
            },
            subtitle: {
                text: document.ontouchstart === undefined ?
                    'Clique e arraste no gráfico para aplicar o zoom' : 'Pinch the chart to zoom in'
            },
            xAxis: {
                categories: timestamps
            },
            yAxis: {
                title: {
                    text: 'Temperatura (°C)'
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                        stops: [
                            [0, Highcharts.getOptions().colors[0]],
                            [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                        ]
                    },
                    marker: {
                        radius: 2
                    },
                    lineWidth: 1,
                    states: {
                        hover: {
                            lineWidth: 1
                        }
                    },
                    threshold: null
                }
            },

            series: [{
                type: 'area',
                name: 'Nível de temperatura',
                data: levels
            }]
        });
    }

    update_temperature_history();

});