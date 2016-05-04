$(function() {

    function update_billboard()
    {
        var request = $.ajax({
            url: 'php/get_config.php',
            type: 'GET',
            dataType: 'json'
        });

        request.success(function (data) {
            var banner = data['fish_banner'];
            var background = data['billboard'];

            set_billboard_image(background);
            set_fish_banner(banner);
        });

        request.fail(function () {
            alert("ERRO: Não foi possível carregar a configuração de raça.");
        });
    }

    function set_billboard_image(path) {
        $('.billboard').css('background', 'url(' + path + ') no-repeat center center')
            .css('height', '100%')
            .css('width', '100%')
            .css('background-size', 'cover')
            .css('-webkit-background-size', 'cover')
            .css('-moz-background-size', 'cover')
            .css('-o-background-size', 'cover')
            .css('overflow', 'hidden');
    }

    function set_fish_banner(name) {
        $("#fish-banner").text(name);
    }

    update_billboard();
});