$(function() {

    function update_feeder() {
        var request = $.ajax({
            url: 'php/get_sensor.php',
            type: 'GET',
            data: {sensor: 'feeder'},
            dataType: 'json'
        });

        request.success(function (result) {
            var date = result['timestamp'];
            $("#food").html("<b>" + date + "</b>");
            console.log("Last feed: " + date);
        });

        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });

        request.always(function () {
            setTimeout(update_feeder, 10000);
        });
    }
    
    $("#dispense").click(function () {
        var request = $.ajax({
            url: 'php/feeder.php',
            type: 'GET'
        });

        request.success(function () {
            update_feeder();
        });

        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    });

    update_feeder();
});