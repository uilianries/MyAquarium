$(function() {

    $("#betta-config").click(function () {
        alert("Foo");
    });

    $("#helostoma-config").click(function () {
        alert("Foo");
    });

    $("#trichogaster-config").click(function () {
        alert("Foo");
    });

    $("#macropodus-config").click(function () {
        alert("Foo");
    });

    function apply_config(config_name) {
        var request = $.ajax({
            url: 'php/apply_config.php',
            type: 'GET',
            data: {config: config_name},
            dataType: 'json'
        });

        request.success(function () {
            update_billboard();
        });

        request.fail(function () {
            alert("ERRO: Não foi possível aplicar a configuração de raça.");
        });
    }

});