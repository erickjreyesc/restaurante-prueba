import Swal from "sweetalert2";

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 5000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

window.addEventListener('alert', ({ detail: { type, message, redirect } }) => {
    Toast.fire({
        icon: type,
        title: message
    })
    if (redirect !== undefined) {
        window.setTimeout(function(){
            window.location.href = redirect;
        }, 1500);
    }
})

window.addEventListener('swal:confirm', event => {
    Swal.fire({
        title: event.detail.title,
        text: event.detail.text,
        icon: 'warning',
        buttons: true,
        dangerMode: true,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            window.livewire.emit('delete', event.detail.id)
        }
    })
});

var InactivityLog = function () {
    var t, closeInSeconds = 60;
    var finishTime = 900000; // time finish inactivity
    window.onload = restartTime;
    document.onmousemove = restartTime;
    document.onmousemove = restartTime;
    document.onmousedown = restartTime;
    document.ontouchstart = restartTime;
    document.onclick = restartTime;
    document.onscroll = restartTime;

    function ExcedeedTime() {
        Swal.fire({
            title: 'Sesión sin actividad',
            html: '<div id="swal-icloser"><p>¿Desea mantener su session activa?<br>Ésta ventana cerrará su sesión si no es confirmado en ' + closeInSeconds + ' segundos.</p></div>',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Cerrar sesión',
            cancelButtonText: 'Mantener sesión',
            timerProgressBar: true,
            timer: closeInSeconds * 1000,
            allowOutsideClick: false,
        }).then((result) => {
            if (result.isConfirmed) {
                logout();
            } else if (result.dismiss === Swal.DismissReason.timer) {
                logout();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                restartTime();
            }
        })
    }

    function restartTime() {
        clearTimeout(t);
        t = setTimeout(ExcedeedTime, finishTime)
    }

    function logout() {
        document.getElementById('logout-form').submit()
    }
};

InactivityLog();
