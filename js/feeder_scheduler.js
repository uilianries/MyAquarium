$(function() {
    
    function update_feeder_scheduler_page() {
        var request = $.ajax({
            url: 'php/get_sensor.php',
            data: {sensor: 'scheduler'},
            type: 'GET',
            dataType: 'json'
        });

        request.success(function (result) {
            var interval = result['value'];
            var time = result['timestamp'];
            $("#sched_actual_interval").html(interval);
            $("#sched_actual_time").html(time);
            console.log("Scheduled feed - time: " + time + " - internal: " + interval);
        });

        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
            alert("Não foi possível recuperar o agendamento atual");
        });
    }
    
    function set_feeder_scheduler(time_to_dispense, time_interval) {
        var request = $.ajax({
            url: 'php/set_scheduler.php',
            data: {timestamp: time_to_dispense, value: time_interval},
            type: 'GET',
            dataType: 'json'
        });

        request.success(function () {
            update_feeder_scheduler_page();
        });

        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
            alert("Não foi possível atualizar o agendamento atual");
        });
    }
    
    $("#sched_button").click(function () {
        var time_interval = $("#sched_new_interval").val();
        var time_to_dispense = $("#sched_new_time").val();

        set_feeder_scheduler(time_to_dispense, time_interval);
    });

    update_feeder_scheduler_page();
});