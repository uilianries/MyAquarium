var request = $.ajax({
    url: 'php/get_sensor.php',
    type: 'GET',
    data: { sensor: 'light' },
    dataType: 'json'
});

request.success(function(result) {
    var level = result['value'];
    $("#light").html("<b>" + level + " %</b>");
    console.log("Current light level: " + level);
});

request.fail(function(jqXHR, textStatus) {
    console.log("Request failed: " + textStatus);
});