$(document).ready(function () {
    /*------------------AGREGAR EDITORIAL-------------------*/
    $('#txtNombreEditorial').keyup(editorialAgregar);
    /*------------------MODIFICAR EDITORIAL-------------------*/
    $('#txtNombreEditorialu').keyup(editorialModificar);

    /*------------------AGREGAR AUTOR-------------------*/
    $('#txtNombreAutor').keyup(autorAgregar);
    $('#txtApellidoAutor').keyup(autorAgregar);
    /*------------------MODIFICAR AUTOR-------------------*/
    $('#txtNombreAutoru').keyup(autorModificar);
    $('#txtApellidoAutoru').keyup(autorModificar);

});

/*-----------------FUNCIONES VALIDAR-----------------*/

function editorialAgregar() {
    var nombre = $('#txtNombreEditorial').val();
    var inputNombre = document.getElementById('txtNombreEditorial');
    var mensaje = document.getElementById('mensajeEditorial');
    var guardar = document.getElementById('btnGuardarEditorial');
    var valor = false;
    guardar.disabled = true;

    if (nombre.trim() == "") {
        //INCORRECTO
        guardar.disabled = true;
        mensaje.hidden = false;
        inputNombre.style.border = '1px solid transparent';
        inputNombre.style.borderColor = '#DE0F0F';
        inputNombre.style.boxShadow = '0 0 5px 0 rgba(222, 15, 15, 0.5)';
        mensaje.innerHTML = "*Campo obligatorio";
        valor = false;
    } else {
        //CORRECTO
        inputNombre.style.border = '1px solid transparent';
        inputNombre.style.borderColor = '#1cc88a';
        inputNombre.style.boxShadow = '0 0 5px 0 rgba(28, 200, 138, 0.5)';
        mensaje.hidden = true;
        valor = true;
        if (nombre.length > 50) {
            //INCORRECTO
            guardar.disabled = true;
            mensaje.hidden = false;
            inputNombre.style.border = '1px solid transparent';
            inputNombre.style.borderColor = '#DE0F0F';
            inputNombre.style.boxShadow = '0 0 5px 0 rgba(222, 15, 15, 0.5)';
            mensaje.innerHTML = "El nombre es muy extenso (Máximo 50 caracteres)";
            valor = false;
        } else {
            //CORRECTO
            inputNombre.style.border = '1px solid transparent';
            inputNombre.style.borderColor = '#1cc88a';
            inputNombre.style.boxShadow = '0 0 5px 0 rgba(28, 200, 138, 0.5)';
            mensaje.hidden = true;
            valor = true;
        }
    }

    if (valor == true) {
        guardar.disabled = false;
    }

}

function editorialModificar() {
    var nombre = $('#txtNombreEditorialu').val();
    var inputNombre = document.getElementById('txtNombreEditorialu');
    var mensaje = document.getElementById('mensajeEditorialu');
    var actualizar = document.getElementById('btnActualizarEditorial');
    var valor = false;
    actualizar.disabled = true;

    if (nombre.trim() == "") {
        //INCORRECTO
        actualizar.disabled = true;
        mensaje.hidden = false;
        inputNombre.style.border = '1px solid transparent';
        inputNombre.style.borderColor = '#DE0F0F';
        inputNombre.style.boxShadow = '0 0 5px 0 rgba(222, 15, 15, 0.5)';
        mensaje.innerHTML = "*Campo obligatorio";
        valor = false;
    } else {
        //CORRECTO
        inputNombre.style.border = '1px solid transparent';
        inputNombre.style.borderColor = '#1cc88a';
        inputNombre.style.boxShadow = '0 0 5px 0 rgba(28, 200, 138, 0.5)';
        mensaje.hidden = true;
        valor = true;
        if (nombre.length > 50) {
            //INCORRECTO
            actualizar.disabled = true;
            mensaje.hidden = false;
            inputNombre.style.border = '1px solid transparent';
            inputNombre.style.borderColor = '#DE0F0F';
            inputNombre.style.boxShadow = '0 0 5px 0 rgba(222, 15, 15, 0.5)';
            mensaje.innerHTML = "El nombre es muy extenso (Máximo 50 caracteres)";
            valor = false;
        } else {
            //CORRECTO
            inputNombre.style.border = '1px solid transparent';
            inputNombre.style.borderColor = '#1cc88a';
            inputNombre.style.boxShadow = '0 0 5px 0 rgba(28, 200, 138, 0.5)';
            mensaje.hidden = true;
            valor = true;
        }
    }

    if (valor == true) {
        actualizar.disabled = false;
    }
}


function autorAgregar() {
    var nombre = $('#txtNombreAutor').val();
    var apellido = $('#txtApellidoAutor').val();
    var inputNombre = document.getElementById('txtNombreAutor');
    var inputApellido = document.getElementById('txtApellidoAutor');
    var mensajeNombre = document.getElementById('mensajeNombreAutor');
    var mensajeApellido = document.getElementById('mensajeApellidoAutor');
    var guardar = document.getElementById('btnGuardarAutor');
    var valorNombre = false;
    var valorApellido = false;

    guardar.disabled = true;

    if (nombre.trim() == "") {
        //INCORRECTO
        guardar.disabled = true;
        mensajeNombre.hidden = false;
        inputNombre.style.border = '1px solid transparent';
        inputNombre.style.borderColor = '#DE0F0F';
        inputNombre.style.boxShadow = '0 0 5px 0 rgba(222, 15, 15, 0.5)';
        mensajeNombre.innerHTML = "*Campo obligatorio";
        valorNombre = false;
    } else {
        //CORRECTO
        guardar.disabled = true;
        inputNombre.style.border = '1px solid transparent';
        inputNombre.style.borderColor = '#1cc88a';
        inputNombre.style.boxShadow = '0 0 5px 0 rgba(28, 200, 138, 0.5)';
        mensajeNombre.hidden = true;
        valorNombre = true;
        if (nombre.length > 50) {
            //INCORRECTO
            guardar.disabled = true;
            mensajeNombre.hidden = false;
            inputNombre.style.border = '1px solid transparent';
            inputNombre.style.borderColor = '#DE0F0F';
            inputNombre.style.boxShadow = '0 0 5px 0 rgba(222, 15, 15, 0.5)';
            mensajeNombre.innerHTML = "El nombre es muy extenso (Máximo 50 caracteres)";
            valorNombre = false;
        } else {
            //CORRECTO
            guardar.disabled = true;
            inputNombre.style.border = '1px solid transparent';
            inputNombre.style.borderColor = '#1cc88a';
            inputNombre.style.boxShadow = '0 0 5px 0 rgba(28, 200, 138, 0.5)';
            mensajeNombre.hidden = true;
            valorNombre = true;
        }
    }

    if (apellido.trim() == "") {
        //INCORRECTO
        guardar.disabled = true;
        mensajeApellido.hidden = false;
        inputApellido.style.border = '1px solid transparent';
        inputApellido.style.borderColor = '#DE0F0F';
        inputApellido.style.boxShadow = '0 0 5px 0 rgba(222, 15, 15, 0.5)';
        mensajeApellido.innerHTML = "*Campo obligatorio";
        valorApellido = false;
    } else {
        //CORRECTO
        guardar.disabled = true;
        inputApellido.style.border = '1px solid transparent';
        inputApellido.style.borderColor = '#1cc88a';
        inputApellido.style.boxShadow = '0 0 5px 0 rgba(28, 200, 138, 0.5)';
        mensajeApellido.hidden = true;
        valorApellido = true;
        if (apellido.length > 50) {
            //INCORRECTO
            guardar.disabled = true;
            mensajeApellido.hidden = false;
            inputApellido.style.border = '1px solid transparent';
            inputApellido.style.borderColor = '#DE0F0F';
            inputApellido.style.boxShadow = '0 0 5px 0 rgba(222, 15, 15, 0.5)';
            mensajeApellido.innerHTML = "El apellido es muy extenso (Máximo 50 caracteres)";
            valorApellido = false;
        } else {
            //CORRECTO
            guardar.disabled = true;
            inputApellido.style.border = '1px solid transparent';
            inputApellido.style.borderColor = '#1cc88a';
            inputApellido.style.boxShadow = '0 0 5px 0 rgba(28, 200, 138, 0.5)';
            mensajeApellido.hidden = true;
            valorApellido = true;
        }
    }

    if (valorNombre == true && valorApellido == true) {
        guardar.disabled = false;
    }

}

function autorModificar() {
    var nombre = $('#txtNombreAutoru').val();
    var apellido = $('#txtApellidoAutoru').val();
    var inputNombre = document.getElementById('txtNombreAutoru');
    var inputApellido = document.getElementById('txtApellidoAutoru');
    var mensajeNombre = document.getElementById('mensajeNombreAutoru');
    var mensajeApellido = document.getElementById('mensajeApellidoAutoru');
    var actualizar = document.getElementById('btnActualizarAutor');
    var valorNombre = false;
    var valorApellido = false;

    actualizar.disabled = true;

    if (nombre.trim() == "") {
        //INCORRECTO
        actualizar.disabled = true;
        mensajeNombre.hidden = false;
        inputNombre.style.border = '1px solid transparent';
        inputNombre.style.borderColor = '#DE0F0F';
        inputNombre.style.boxShadow = '0 0 5px 0 rgba(222, 15, 15, 0.5)';
        mensajeNombre.innerHTML = "*Campo obligatorio";
        valorNombre = false;
    } else {
        //CORRECTO
        actualizar.disabled = true;
        inputNombre.style.border = '1px solid transparent';
        inputNombre.style.borderColor = '#1cc88a';
        inputNombre.style.boxShadow = '0 0 5px 0 rgba(28, 200, 138, 0.5)';
        mensajeNombre.hidden = true;
        valorNombre = true;
        if (nombre.length > 50) {
            //INCORRECTO
            actualizar.disabled = true;
            mensajeNombre.hidden = false;
            inputNombre.style.border = '1px solid transparent';
            inputNombre.style.borderColor = '#DE0F0F';
            inputNombre.style.boxShadow = '0 0 5px 0 rgba(222, 15, 15, 0.5)';
            mensajeNombre.innerHTML = "El nombre es muy extenso (Máximo 50 caracteres)";
            valorNombre = false;
        } else {
            //CORRECTO
            actualizar.disabled = true;
            inputNombre.style.border = '1px solid transparent';
            inputNombre.style.borderColor = '#1cc88a';
            inputNombre.style.boxShadow = '0 0 5px 0 rgba(28, 200, 138, 0.5)';
            mensajeNombre.hidden = true;
            valorNombre = true;
        }
    }

    if (apellido.trim() == "") {
        //INCORRECTO
        actualizar.disabled = true;
        mensajeApellido.hidden = false;
        inputApellido.style.border = '1px solid transparent';
        inputApellido.style.borderColor = '#DE0F0F';
        inputApellido.style.boxShadow = '0 0 5px 0 rgba(222, 15, 15, 0.5)';
        mensajeApellido.innerHTML = "*Campo obligatorio";
        valorApellido = false;
    } else {
        //CORRECTO
        actualizar.disabled = true;
        inputApellido.style.border = '1px solid transparent';
        inputApellido.style.borderColor = '#1cc88a';
        inputApellido.style.boxShadow = '0 0 5px 0 rgba(28, 200, 138, 0.5)';
        mensajeApellido.hidden = true;
        valorApellido = true;
        if (apellido.length > 50) {
            //INCORRECTO
            actualizar.disabled = true;
            mensajeApellido.hidden = false;
            inputApellido.style.border = '1px solid transparent';
            inputApellido.style.borderColor = '#DE0F0F';
            inputApellido.style.boxShadow = '0 0 5px 0 rgba(222, 15, 15, 0.5)';
            mensajeApellido.innerHTML = "El apellido es muy extenso (Máximo 50 caracteres)";
            valorApellido = false;
        } else {
            //CORRECTO
            actualizar.disabled = true;
            inputApellido.style.border = '1px solid transparent';
            inputApellido.style.borderColor = '#1cc88a';
            inputApellido.style.boxShadow = '0 0 5px 0 rgba(28, 200, 138, 0.5)';
            mensajeApellido.hidden = true;
            valorApellido = true;
        }
    }

    if (valorNombre == true && valorApellido == true) {
        actualizar.disabled = false;
    }

}