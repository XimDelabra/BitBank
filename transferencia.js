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
        background: '#9ed7ba',
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
        } else if (saldo_transferir<=0) {
            showNotification('warning', 'Cantidad no permitida.');
        } else if (numero_transferir==numero_cuenta) {
            showNotification('warning', 'Error, no te puedes transferir a ti mismo.');
        } else  {
            var $button = $(this);
            $button.prop('disabled', true).html(`
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Cargando...
        `);
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
                    console.log(response.status)

                    if (response.status === 'success') {
                        console.log(response.status)
                        showNotification('success', response.message);
                        $('#numero_transferir').val('');
                        $('#saldo_transferir').val('');
                        $('#numero_cuenta').val('');
                        $('#saldo').val('');

                    } else {
                        console.log(response.status)
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


const numberInput = document.getElementById('numero_transferir');
        const message = document.getElementById('error-message');
        const nombreTransferir = document.getElementById('nombre_tranferir');

        numberInput.addEventListener('input', () => {
            const value = numberInput.value;

            // Validar si contiene 16 dígitos
            if (value.length !== 19) {
                numberInput.classList.add('invalid');
                numberInput.classList.remove('valid');
                message.classList.add('visible');
            } else {
                numberInput.classList.remove('invalid');
                numberInput.classList.add('valid');
                message.classList.remove('visible');

                //Verificamos mediante php que el numero de cuenta exista
                verificarNumeroCuenta(value);
            }
        });

        function verificarNumeroCuenta(numero) {
            var numeroTransferir = numero
            $.ajax({
                url: "verificar_cuenta.php",
                type: "POST",
                data: {
                    numeroTransferir: numeroTransferir
                },
                success: function(data) {
                    var response = data;

                    if (response.status === 'success') {
                        console.log(response.status)
                        numberInput.classList.remove('invalid');
                        numberInput.classList.add('valid');
                        message.classList.remove('visible');

                        nombreTransferir.textContent = response.nombre;

                    } else if(response.message == 'mismo') {
                        console.log(response.status)
                        numberInput.classList.add('invalid');
                        numberInput.classList.remove('valid');
                        message.classList.remove('visible');
                        nombreTransferir.textContent = "No puedes transferirte a ti mismo";
                    } else {
                        console.log(response.status)
                        numberInput.classList.add('invalid');
                        numberInput.classList.remove('valid');
                        message.classList.remove('visible');
                        nombreTransferir.textContent = "Cuenta no encontrada";
                    }
                },

            });
        };