function cargar_municipios(id_municipio) {
    if ($('#estado').val() != 0) {
        $.ajax({
            url: "inicio/combo_municipios/" + $('#estado').val() + "/" + id_municipio,
            type: 'GET',
            dataType: 'html',
            success: function (result) {
                $('#municipio').html('');
                $('#municipio').append("<option value='0'>-Selecciona-</option>");
                $('#municipio').append(result);
            }
        });
    } else {
        $('#municipio').html('');
        $('#municipio').append("<option value='0' selected>-Selecciona-</option>");
        $('#localidad').html('');
        $('#localidad').append("<option value='0' selected>-Selecciona-</option>");
    }
}

function cargar_localidades(id_municipio, id_localidad) {
    if ($('#municipio').val() != 0) {
        $.ajax({
            url: "inicio/combo_localidades/" + $('#estado').val() + "/" + id_municipio + "/" + id_localidad,
            type: 'GET',
            dataType: 'html',
            success: function (result) {
                $('#localidad').html('');
                $('#localidad').append("<option value='0' selected>-Selecciona-</option>");
                $('#localidad').append(result);
            }
        });
    } else {
        $('#localidad').html('');
        $('#localidad').append("<option value='0' selected>-Selecciona-</option>");
    }
}

$("#abrir_registro").click(function () {
    $('input[type="text"]').val('');
    $('input[type="password"]').val('');
    $('input[type="email"]').val('');
    $('select').val(0);
});

$("#abrir_login").click(function () {
    $('input[type="text"]').val('');
    $('input[type="password"]').val('');
});

function ir_a(campo) {
    var element_to_scroll_to = document.getElementById(campo);
    element_to_scroll_to.scrollIntoView({
        behavior: "smooth",
        block: "end",
        inline: "nearest"
    });
}


$('#top').click(function () {
    $("html, body").animate({
        scrollTop: 0
    }, "slow");
    return false;
})
