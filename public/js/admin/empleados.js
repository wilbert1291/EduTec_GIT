var tabla;
$(document).ready(function () {
    tabla = $('#tabla_empleados').DataTable({
        "destroy": true,
        "ajax": "empleados/cargar_tabla",
        "columns": [{
            "data": "clave_usuario",
            "visible": false
        }, {
            "data": "clave_estado",
            "visible": false
        }, {
            "data": "clave_municipio",
            "visible": false
        }, {
            "data": "clave_localidad",
            "visible": false
        }, {
            "data": "acceso",
            "visible": false
        }, {
            "data": "clave_sexo",
            "visible": false
        }, {
            "data": "nombre"
        }, {
            "data": "apellido_paterno"
        }, {
            "data": "apellido_materno"
        }, {
            "data": "correo"
        }, {
            "data": "telefono"
        }, {
            "data": "curp",
            "visible": false
        }, {
            "data": "calle",
            "visible": false
        }, {
            "data": "colonia",
            "visible": false
        }, {
            "data": "codigo_postal",
            "visible": false
        }, {
            "data": "contrasenia",
            "visible": false
        }, {
            "data": "pregunta_secreta",
            "visible": false
        }, {
            "data": "respuesta_secreta",
            "visible": false
        }, {
            "data": "fotografia",
            "visible": false
        }, {
            "data": "descripcion",
            "visible": false
        }, {
            "defaultContent": "<button class='btn btn-warning editar' data-toggle='modal' data-target='#modal_empleado'><i class='far fa-edit'></i></button><button class='btn btn-danger eliminar'><i class='far fa-trash-alt'></i></button>"
        }],
        "language": idioma
    });

    $('#tabla_empleados tbody').on("click", "button.editar", function () {
        var data = tabla.row($(this).parents("tr")).data();
        $('#btn_editar').show();
        $('#btn_guardar').hide();

        limpiar();
        llenar_campos(data);
    });

    $('#tabla_empleados tbody').on("click", "button.eliminar", function () {
        var data = tabla.row($(this).parents("tr")).data();
        var id = (data.clave_usuario);
        eliminar(id);
    });
});

var idioma = {
    "sProcessing": "Procesando...",
    "sLengthMenu": "Mostrar _MENU_ registros",
    "sZeroRecords": "No se encontraron resultados",
    "sEmptyTable": "Ningún dato disponible en esta tabla",
    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix": "",
    "sSearch": "Buscar:",
    "sUrl": "",
    "sInfoThousands": ",",
    "sLoadingRecords": "No hay resultados",
    "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}

function limpiar() {
    $('input[type="text"]').val('');
    $('input[type="email"]').val('');
    $('input[type="password"]').val('');
    $('#estado').val(0);
    $('#municipio').val(0);
    $('#localidad').val(0);
    $('#sexo').val(0);
    $('#acceso').val(0);
}

function llenar_campos(data) {
    $('#id_user').val(data.clave_usuario);
    $('#nombre').val(data.nombre);
    $('#ap').val(data.apellido_paterno);
    $('#am').val(data.apellido_materno);
    $('#correo').val(data.correo);
    $('#telefono').val(data.telefono);
    $('#curp').val(data.curp);
    $('#sexo').val(data.clave_sexo);
    $('#estado').val(data.clave_estado);
    cargar_municipios(data.clave_municipio);
    $('#municipio').val(data.clave_municipio);
    cargar_localidades(data.clave_municipio, data.clave_localidad);
    $('#localidad').val(data.clave_localidad);
    $('#calle').val(data.calle);
    $('#colonia').val(data.colonia);
    $('#codigo_postal').val(data.codigo_postal);
    $('#acceso').val(data.acceso);
    $('#password').val(data.contrasenia);
    $("#password").prop("disabled", true);
    $('#pregunta_secreta').val(data.pregunta_secreta);
    $('#respuesta').val(data.respuesta_secreta);
    $('#descripcion').val(data.descripcion);
}

function eliminar(id) {
    swal({
        title: "¿Estas seguro que deseas eliminarlo?",
        text: "No podras recuperar esta información",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "empleados/eliminar/" + id,
                    type: 'GET',
                    dataType: 'html',
                    success: function (result) {
                        console.log(result);
                        if (result.error) {
                            swal({
                                title: "Oh oh!",
                                text: result.mensaje,
                                icon: "error",
                                button: "Ok",
                            });
                        } else {
                            tabla.ajax.reload();
                            swal("Empleado eliminado correctamente!", {
                                icon: "success",
                            });
                        }
                    }
                });
            }
        });
}

$('#nuevo_empleado').click(function () {
    $('#btn_editar').hide();
    $('#btn_guardar').show();
    limpiar();
    $("#password").prop("disabled", false);
})

function cargar_municipios(id_municipio) {
    if ($('#estado').val() != 0) {
        $.ajax({
            url: "empleados/combo_municipios/" + $('#estado').val() + "/" + id_municipio,
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
            url: "empleados/combo_localidades/" + $('#estado').val() + "/" + id_municipio + "/" + id_localidad,
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

$('#formulario').submit(function (event) {
    event.preventDefault();
    if ($('#id_user').val() == "") {
        if(validar('guardar')) return false;
    } else {
        if(!validar('editar')) return false; 
    }

    $.ajax({
        method: "POST",
        url:$(this).attr('action'),
        enctype: 'multipart/form-data',
        dataType: 'html',
        data: $(this).serialize(),
        success: function (result) {
            if (result == true) {
                swal({
                    title: "Excelente!",
                    text: "Empleado registrado exitosamente!",
                    icon: "success",
                    button: "Continuar",
                });
                $('#modal_empleado').modal('hide');
                tabla.ajax.reload();
            } else {
                swal({
                    title: "Ohh ohh!",
                    text: result,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    })
})

function validar(form) {
    if (form == 'editar') {
        if ($('#id_user').val() == "") {
            swal({
                title: "Ohh ohh!",
                text: "Existen campos vacios",
                icon: "error",
                button: "Ok",
            });
            return false;
        }
    }

    if ($('#nombre').val() == "" || $('#ap').val() == "" || $('#am').val() == "" || $('#correo').val() == "" || $('#telefono').val() == "" || $('#curp').val() == "" || $('#calle').val() == "" || $('#colonia').val() == "" || $('#codigo_postal').val() == "" || $('#password').val() == "" || $('#pregunta_secreta').val() == "" || $('#respuesta').val() == "") {
        swal({
            title: "Ohh ohh!",
            text: "Existen campos vacios",
            icon: "error",
            button: "Ok",
        });
        return false;
    }

    if ($('#sexo').val() == 0 || $('#estado').val() == 0 || $('#municipio').val() == 0 || $('#localidad').val() == 0 || $('#acceso').val() == 0) {
        swal({
            title: "Ohh ohh!",
            text: "Tienes que seleccionar todos los campos",
            icon: "error",
            button: "Ok",
        });
        return false;
    }

    return true;
}

/*function previewFile(input) {
    var file = $('input[type=file]').get(0).files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function () {
            $('#previewImg').attr("src", reader.result);
        }

        reader.readAsDataURL(file);
    }
}*/