var request = $.ajax({
    url: 'php/get_sensor.php',
    type: 'GET',
    data: { sensor: 'ph' },
    dataType: 'json'
});

request.success(function(result) {
    var level = result['value'];
    $("#ph").html("<b>" + level + "</b>");
    console.log("Current ph level: " + level);
});

request.fail(function(jqXHR, textStatus) {
    console.log("Request failed: " + textStatus);
});