$(function() {

    $("#betta-config").click(function () {
        apply_config('betta');
    });

    $("#helostoma-config").click(function () {
        apply_config('helostoma');
    });

    $("#trichogaster-config").click(function () {
        apply_config('trichogaster');
    });

    $("#macropodus-config").click(function () {
        apply_config('macropodus');
    });

    function apply_config(config_value) {
        var request = $.ajax({
            url: 'php/set_config.php',
            type: 'GET',
            data: {value: config_value},
            dataType: 'json'
        });

        request.success(function () {
            update_billboard();
        });

        request.fail(function (jqXHR, textStatus) {
            console.log("Could not apply breed: " + textStatus);
            alert("ERRO: Não foi possível aplicar a configuração de raça.");
        });
    }

    function apply_breed_on_page(breed_name) {
        var request = $.ajax({
            url: 'php/get_breed.php',
            type: 'GET',
            data: {breed: breed_name},
            dataType: 'json'
        });

        request.success(function (data) {
            $('#' + breed_name + '-temperature').text(data['min_temperature'].toFixed(1) + 'ºC - ' + data['max_temperature'].toFixed(1) + 'ºC');
            $('#' + breed_name + '-ph').text(data['min_ph'].toFixed(1) + ' - ' + data['max_ph'].toFixed(1));
            $('#' + breed_name + '-light').text(data['min_light'] + '% - ' + data['max_light'] + '%');
        });

        request.fail(function (jqXHR, textStatus) {
            console.log("Could not get breed config: " + textStatus);
            alert("ERRO: Não foi possível recuperar a configuração da raça " + breed_name);
        });
    }

    apply_breed_on_page('betta');
    apply_breed_on_page('helostoma');
    apply_breed_on_page('trichogaster');
    apply_breed_on_page('macropodus');

});