window.Pikaday = require("pikaday");

import moment from 'moment';

let datenow = new Date;

let lang = {
    previousMonth: 'Anterior',
    nextMonth: 'Siguiente',
    months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    weekdays: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    weekdaysShort: ['D', 'L', 'M', 'X', 'J', 'V', 'S']
};

if (window.location.pathname === '/admin/seguridad/registros') {
    let startday = new Pikaday({
        field: document.getElementById('inicioInput'),
        i18n: lang,
        minDate: new Date(2022, 11, 7),
        maxDate: datenow,
        showTime: true,
        showMinutes: true,
        showSeconds: false,
        use24hour: false,
        incrementHourBy: 1,
        incrementMinuteBy: 1,
        incrementSecondBy: 1,
        autoClose: true,
        timeLabel: null,
    });

    new Pikaday({
        field: document.getElementById('finalInput'),
        i18n: lang,
        minDate: new Date(2022, 11, 7),
        maxDate: datenow,
    });
}