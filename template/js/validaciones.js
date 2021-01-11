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

    /*------------------AGREGAR LIBRO-------------------*/
    $('#cmbEditorial').change(libroAgregar);
    $('#txtIsbn').keyup(libroAgregar);
    $('#txtTitulo').keyup(libroAgregar);
    $('#txtAnio').keyup(libroAgregar);
    $('#txtPrecioVenta').keyup(libroAgregar);
    $('#cmbAutores').change(libroAgregar);

    /*------------------MODIFICAR LIBRO-------------------*/

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


function libroAgregar() {
    var editorial = $('#cmbEditorial').val();
    var isbn = $('#txtIsbn').val();
    var titulo = $('#txtTitulo').val();
    var anio = $('#txtAnio').val();
    var precioventa = $('#txtPrecioVenta').val();
    var autor = $('#cmbAutores').val();
    var inputEditorial = document.getElementById('cmbEditorial');
    var inputIsbn = document.getElementById('txtIsbn');
    var inputTitulo = document.getElementById('txtTitulo');
    var inputAnio = document.getElementById('txtAnio');
    var inputPrecioventa = document.getElementById('txtPrecioVenta');
    var inputAutor = document.getElementById('cmbAutores');
    var mensajeEditorial = document.getElementById('mensajeEditorialLibro');
    var mensajeIsbn = document.getElementById('mensajeIsbn');
    var mensajeTitulo = document.getElementById('mensajeTitulo');
    var mensajeAnio = document.getElementById('mensajeAnio');
    var mensajePVP = document.getElementById('mensajePVP');
    var mensajeAutor = document.getElementById('mensajeAutor');
    var guardar = document.getElementById('btnGuardarLibro');
    var valorEditorial = false;
    var valorIsbn = false;
    var valorTitulo = false;
    var valorAnio = false;
    var valorPrecioventa = false;
    var valorAutor = false;
    var expresionPVP = /(?=[^\0])(?=^([0-9]+){0,1}(\.[0-9]{1,2}){0,1}$)/;

    guardar.disabled = true;

    if (editorial == 0 || editorial == null) {
        //INCORRECTO
        guardar.disabled = true;
        mensajeEditorial.hidden = false;
        inputEditorial.style.border = '1px solid transparent';
        inputEditorial.style.borderColor = '#DE0F0F';
        inputEditorial.style.boxShadow = '0 0 5px 0 rgba(222, 15, 15, 0.5)';
        mensajeEditorial.innerHTML = "*Campo obligatorio";
        valorEditorial = false;
    } else {
        //CORRECTO
        guardar.disabled = true;
        inputEditorial.style.border = '1px solid transparent';
        inputEditorial.style.borderColor = '#1cc88a';
        inputEditorial.style.boxShadow = '0 0 5px 0 rgba(28, 200, 138, 0.5)';
        mensajeEditorial.hidden = true;
        valorEditorial = true;

    }

    if (isbn.trim() == "") {
        //INCORRECTO
        guardar.disabled = true;
        mensajeIsbn.hidden = false;
        inputIsbn.style.border = '1px solid transparent';
        inputIsbn.style.borderColor = '#DE0F0F';
        inputIsbn.style.boxShadow = '0 0 5px 0 rgba(222, 15, 15, 0.5)';
        mensajeIsbn.innerHTML = "*Campo obligatorio";
        valorIsbn = false;
    } else {
        //CORRECTO
        guardar.disabled = true;
        inputIsbn.style.border = '1px solid transparent';
        inputIsbn.style.borderColor = '#1cc88a';
        inputIsbn.style.boxShadow = '0 0 5px 0 rgba(28, 200, 138, 0.5)';
        mensajeIsbn.hidden = true;
        valorIsbn = true;
        if (isbn.length > 16) {
            //INCORRECTO
            guardar.disabled = true;
            mensajeIsbn.hidden = false;
            inputIsbn.style.border = '1px solid transparent';
            inputIsbn.style.borderColor = '#DE0F0F';
            inputIsbn.style.boxShadow = '0 0 5px 0 rgba(222, 15, 15, 0.5)';
            mensajeIsbn.innerHTML = "El isbn es muy extenso (Máximo 16 caracteres)";
            valorIsbn = false;
        } else {
            //CORRECTO
            guardar.disabled = true;
            inputIsbn.style.border = '1px solid transparent';
            inputIsbn.style.borderColor = '#1cc88a';
            inputIsbn.style.boxShadow = '0 0 5px 0 rgba(28, 200, 138, 0.5)';
            mensajeIsbn.hidden = true;
            valorIsbn = true;
        }
    }

    if (titulo.trim() == "") {
        //INCORRECTO
        guardar.disabled = true;
        mensajeTitulo.hidden = false;
        inputTitulo.style.border = '1px solid transparent';
        inputTitulo.style.borderColor = '#DE0F0F';
        inputTitulo.style.boxShadow = '0 0 5px 0 rgba(222, 15, 15, 0.5)';
        mensajeTitulo.innerHTML = "*Campo obligatorio";
        valorTitulo = false;
    } else {
        //CORRECTO
        guardar.disabled = true;
        inputTitulo.style.border = '1px solid transparent';
        inputTitulo.style.borderColor = '#1cc88a';
        inputTitulo.style.boxShadow = '0 0 5px 0 rgba(28, 200, 138, 0.5)';
        mensajeTitulo.hidden = true;
        valorTitulo = true;
        if (titulo.length > 80) {
            //INCORRECTO
            guardar.disabled = true;
            mensajeTitulo.hidden = false;
            inputTitulo.style.border = '1px solid transparent';
            inputTitulo.style.borderColor = '#DE0F0F';
            inputTitulo.style.boxShadow = '0 0 5px 0 rgba(222, 15, 15, 0.5)';
            mensajeTitulo.innerHTML = "El título es muy extenso (Máximo 80 caracteres)";
            valorTitulo = false;
        } else {
            //CORRECTO
            guardar.disabled = true;
            inputTitulo.style.border = '1px solid transparent';
            inputTitulo.style.borderColor = '#1cc88a';
            inputTitulo.style.boxShadow = '0 0 5px 0 rgba(28, 200, 138, 0.5)';
            mensajeTitulo.hidden = true;
            valorTitulo = true;
        }
    }

    if (anio.trim() == "") {
        //INCORRECTO
        guardar.disabled = true;
        mensajeAnio.hidden = false;
        inputAnio.style.border = '1px solid transparent';
        inputAnio.style.borderColor = '#DE0F0F';
        inputAnio.style.boxShadow = '0 0 5px 0 rgba(222, 15, 15, 0.5)';
        mensajeAnio.innerHTML = "*Campo obligatorio";
        valorAnio = false;
    } else {
        //CORRECTO
        guardar.disabled = true;
        inputAnio.style.border = '1px solid transparent';
        inputAnio.style.borderColor = '#1cc88a';
        inputAnio.style.boxShadow = '0 0 5px 0 rgba(28, 200, 138, 0.5)';
        mensajeAnio.hidden = true;
        valorAnio = true;
        if (anio.length > 4) {
            //INCORRECTO
            guardar.disabled = true;
            mensajeAnio.hidden = false;
            inputAnio.style.border = '1px solid transparent';
            inputAnio.style.borderColor = '#DE0F0F';
            inputAnio.style.boxShadow = '0 0 5px 0 rgba(222, 15, 15, 0.5)';
            mensajeAnio.innerHTML = "El año tiene que ser (Máximo 4 caracteres)";
            valorAnio = false;
        } else {
            //CORRECTO
            guardar.disabled = true;
            inputAnio.style.border = '1px solid transparent';
            inputAnio.style.borderColor = '#1cc88a';
            inputAnio.style.boxShadow = '0 0 5px 0 rgba(28, 200, 138, 0.5)';
            mensajeAnio.hidden = true;
            valorAnio = true;
        }
    }

    if (precioventa.trim() == "") {
        //INCORRECTO
        guardar.disabled = true;
        mensajePVP.hidden = false;
        inputPrecioventa.style.border = '1px solid transparent';
        inputPrecioventa.style.borderColor = '#DE0F0F';
        inputPrecioventa.style.boxShadow = '0 0 5px 0 rgba(222, 15, 15, 0.5)';
        mensajePVP.innerHTML = "*Campo obligatorio";
        valorPrecioventa = false;
    } else {
        //CORRECTO
        guardar.disabled = true;
        inputPrecioventa.style.border = '1px solid transparent';
        inputPrecioventa.style.borderColor = '#1cc88a';
        inputPrecioventa.style.boxShadow = '0 0 5px 0 rgba(28, 200, 138, 0.5)';
        mensajePVP.hidden = true;
        valorPrecioventa = true;
        if (!expresionPVP.test(precioventa)) {
            //INCORRECTO
            guardar.disabled = true;
            mensajePVP.hidden = false;
            inputPrecioventa.style.border = '1px solid transparent';
            inputPrecioventa.style.borderColor = '#DE0F0F';
            inputPrecioventa.style.boxShadow = '0 0 5px 0 rgba(222, 15, 15, 0.5)';
            mensajePVP.innerHTML = "El P.V.P tiene que ser un número, mayor a 0 (Máximo 2 decimales)";
            valorPrecioventa = false;
        } else {
            //CORRECTO
            guardar.disabled = true;
            inputPrecioventa.style.border = '1px solid transparent';
            inputPrecioventa.style.borderColor = '#1cc88a';
            inputPrecioventa.style.boxShadow = '0 0 5px 0 rgba(28, 200, 138, 0.5)';
            mensajePVP.hidden = true;
            valorPrecioventa = true;
        }
    }

    if (autor == 0 || autor == null) {
        //INCORRECTO
        guardar.disabled = true;
        mensajeAutor.hidden = false;
        inputAutor.style.border = '1px solid transparent';
        inputAutor.style.borderColor = '#DE0F0F';
        inputAutor.style.boxShadow = '0 0 5px 0 rgba(222, 15, 15, 0.5)';
        mensajeAutor.innerHTML = "*Campo obligatorio";
        valorAutor = false;
    } else {
        //CORRECTO
        guardar.disabled = true;
        inputAutor.style.border = '1px solid transparent';
        inputAutor.style.borderColor = '#1cc88a';
        inputAutor.style.boxShadow = '0 0 5px 0 rgba(28, 200, 138, 0.5)';
        mensajeAutor.hidden = true;
        valorAutor = true;
    }

    if (valorEditorial == true && valorIsbn == true && valorTitulo == true && valorAnio == true && valorPrecioventa == true && valorAutor == true) {
        guardar.disabled = false;
    }



}