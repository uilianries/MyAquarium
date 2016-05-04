$(function() {

    $("#betta-config").click(function () {
        apply_config(0);
    });

    $("#helostoma-config").click(function () {
        apply_config(1);
    });

    $("#trichogaster-config").click(function () {
        apply_config(2);
    });

    $("#macropodus-config").click(function () {
        apply_config(3);
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

});