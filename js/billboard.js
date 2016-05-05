function update_billboard()
{
    var request = $.ajax({
        url: 'php/get_config.php',
        type: 'GET',
        dataType: 'json'
    });

    request.success(function (data) {
        var banner = data['value'];

        set_billboard_image(banner);
        set_fish_banner(banner);
    });

    request.fail(function (jqXHR, textStatus) {
        alert("ERRO: Não foi possível carregar a configuração de raça.");
        console.log("Get fish error - cause: " + textStatus);
    });
}

function set_billboard_image(banner) {

    var path = 'img/billboard_' + banner + '.jpg';

    $('.billboard').css('background', 'url(' + path + ') no-repeat center center')
        .css('height', '100%')
        .css('width', '100%')
        .css('background-size', 'cover')
        .css('-webkit-background-size', 'cover')
        .css('-moz-background-size', 'cover')
        .css('-o-background-size', 'cover')
        .css('overflow', 'hidden');
}

function set_fish_banner(banner) {
    $("#fish-banner").text(banner.toUpperCase());
}

$(function() {

    update_billboard();
});
