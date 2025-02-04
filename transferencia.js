new Cleave('.numero_cuenta', {
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
        background: '#e1e3e2',
        icon: {
            className: 'material-icons',
            tagName: 'i',
            text: 'check_circle',
        },
    },
    {
        type: 'error',
        background: '#3e3e40', 
        icon: {
            className: 'material-icons',
            tagName: 'i',
            text: 'error',
        },
    },
    {
        type: 'warning',
        background: '#6b7075', 
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

//Funcion para trasferencia
$(document).ready(function () {
    $(document).on("click", "#transferir", function () {

        var numero_transferir = $('#numero_transferir').val();
        var saldo_transferir = $('#saldo_transferir').val();
        var numero_cuenta = $('#numero_cuenta').val();
        var saldo = $('#saldo').val();

        if (!numero_transferir) {
            showNotification('warning', 'Por favor, rellena el campo "numero de cuenta a trasferir".');
        } else if(numero_transferir.length !== 19) {
            showNotification('warning', 'El numero de cuenta esta incompleto.');
        }  else if (!saldo_transferir) {
            showNotification('warning', 'Por favor, rellena el campo "saldo a transferir".');
        } else if (saldo < saldo_transferir) {
            showNotification('warning', 'Saldo insuficiente.');
        } else  {
            $.ajax({
                url: "transferir_action.php",
                type: "POST",
                data: {
                    numero_transferir: numero_transferir,
                    saldo_transferir: saldo_transferir,
                    numero_cuenta: numero_cuenta,
                    saldo: saldo
                },
                success: function (data) {
                    var response = data;

                    if (response.status === 'success') {
                        showNotification('success', response.message);
                        $('#numero_transferir').val('');
                        $('#saldo_transferir').val('');
                        $('#numero_cuenta').val('');
                        $('#saldo').val('');

                    } else {
                        showNotification('error', response.message);
                    }
                }
            });
        }
    });
});