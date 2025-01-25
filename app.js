new Cleave('.input-number', {
    blocks: [4, 4, 4, 4], // Cuatro bloques de 4 dígitos
    numericOnly: true
});

const notyf = new Notyf({
    duration: 5000,
    position: {
        x: 'right',
        y: 'top',
    },
    types: [{
        type: 'success',
        background: '#e1e3e2', //#618573
        icon: {
            className: 'material-icons',
            tagName: 'i',
            text: 'check_circle',
        },
    },
    {
        type: 'error',
        background: '#3e3e40', //#856161
        icon: {
            className: 'material-icons',
            tagName: 'i',
            text: 'error',
        },
    },
    {
        type: 'warning',
        background: '#6b7075', //#b8826b
        icon: {
            className: 'material-icons',
            tagName: 'i',
            text: 'warning',
        },
    },

    ],
});

// Función para mostrar la notificación
function showNotification(type, message) {
    if (['success', 'error', 'warning'].includes(type)) {
        notyf.open({
            type: type,
            message: message,
        });
    }
}

//Funcion para registro
$(document).ready(function () {
    $(document).on("click", "#submit", function () {

        var numero_cuenta = $('#numero_cuenta').val();
        var nombre_cliente = $('#nombre_cliente').val();
        var correo = $('#correo').val();
        var tipo_cuenta = $('#tipo_cuenta').val();

        if (!numero_cuenta) {
            showNotification('warning', 'Por favor, rellena el campo "numero de cuenta".');
        } else if (!nombre_cliente) {
            showNotification('warning', 'Por favor, rellena el campo "nombre de cliente".');
        } else if (!correo) {
            showNotification('warning', 'Por favor, rellena el campo "correo".');
        } else if (tipo_cuenta == 'Elija una opcion...') {
            showNotification('warning', 'Por favor, rellena el campo "tipo de cuenta".');
        } else {
            var $button = $(this);
            $button.prop('disabled', true).html(`
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Cargando...
        `);
            $.ajax({
                url: "registrar.php",
                type: "POST",
                data: {
                    numero_cuenta: numero_cuenta,
                    nombre_cliente: nombre_cliente,
                    correo: correo,
                    tipo_cuenta: tipo_cuenta
                },
                success: function (data) {
                    var response = data;

                    if (response.status === 'success') {
                        showNotification('success', response.message);
                        $('#numero_cuenta').val('');
                        $('#nombre_cliente').val('');
                        $('#correo').val('');
                        $('#tipo_cuenta').val('');

                    } else {
                        showNotification('error', response.message);
                    }
                },
                complete: function () {
                    $button.prop('disabled', false).html('Registrar');
                }

            });
        }
    });
});