$(function() {

    function update_feeder_history() {

        var request = $.ajax({
            url: 'php/get_history.php',
            type: 'GET',
            data: {sensor: 'feeder'},
            dataType: 'json'
        });

        request.success(function (result) {
            var timestamps = [];

            for (var it in result) {
                timestamps.push(it.split(","));
            }

            history_feeder(timestamps);
        });

        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });

    }

    function history_feeder(timestamps) {
        $("#feeder_container").DataTable( {
            data: timestamps,
            columns: [
                { title: "Histórico do dispensador de ração" }
            ]
        });
    }

    update_feeder_history();

});