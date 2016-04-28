var request = $.ajax({
    url: 'php/get_sensor.php',
    type: 'GET',
    data: { sensor: 'temperature' },
    dataType: 'json'
});

request.success(function(result) {
    var level = result['value'];
    $("#temperature").html("<b>" + level + " ºC</b>");
    console.log("Current temperature level: " + level);
});

request.fail(function(jqXHR, textStatus) {
    console.log("Request failed: " + textStatus);
});