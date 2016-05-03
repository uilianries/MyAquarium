$(function() {

    function update_ph_sensor() {
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
            setTimeout(update_ph_sensor, 10000);
        });
    }
    
    $("#dispense").click(function () {
        var request = $.ajax({
            url: 'php/feeder.php',
            type: 'GET'
        });

        request.success(function () {
            update_ph_sensor();
        });

        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    });

    update_ph_sensor();
});