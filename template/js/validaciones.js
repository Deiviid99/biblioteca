$(document).ready(function () {
    /*------------------AGREGAR EDITORIAL-------------------*/
    $('#txtNombreEditorial').keyup(editorialNombreAgregar);
    /*------------------MODIFICAR EDITORIAL-------------------*/
    $('#txtNombreEditorialu').keyup(editorialNombreModificar);

    /*------------------AGREGAR AUTOR-------------------*/
    $('#txtNombreAutor').keyup(autorAgregar);
    $('#txtApellidoAutor').keyup(autorAgregar);
});

/*-----------------FUNCIONES VALIDAR-----------------*/

function editorialNombreAgregar() {
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

function editorialNombreModificar() {
    var nombre = $('#txtNombreEditorialu').val();
    var inputNombre = document.getElementById('txtNombreEditorialu');
    var mensaje = document.getElementById('mensajeEditorialu');
    var actualizar = document.getElementById('btnActualizarEditorial');
    if (nombre.length > 0) {
        if (nombre.trim() === "" || nombre.trim() === null) {
            actualizar.disabled = true;
            mensaje.hidden = false;
            inputNombre.style.border = '1px solid transparent';
            inputNombre.style.borderColor = '#DE0F0F';
            inputNombre.style.boxShadow = '0 0 5px 0 rgba(222, 15, 15, 0.5)';

            mensaje.innerHTML = "*Campo obligatorio";
        } else {
            inputNombre.style.border = '1px solid transparent';
            inputNombre.style.borderColor = '#1cc88a';
            inputNombre.style.boxShadow = '0 0 5px 0 rgba(28, 200, 138, 0.5)';
            mensaje.hidden = true;
            actualizar.disabled = false;
        }
    } else {
        inputNombre.style.border = '';
        inputNombre.style.borderColor = '';
        inputNombre.style.boxShadow = '';
        mensaje.hidden = true;
        actualizar.disabled = true;
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
