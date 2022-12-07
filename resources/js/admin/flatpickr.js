import flatpickr from "flatpickr";
import { Spanish } from "flatpickr/dist/l10n/es.js";

if (window.location.pathname == '/seguridad/logs') {
    var setInicio = document.getElementById("inicio").getAttribute("min");
}

// logs
flatpickr(".flatpickrlog", {
    "locale": Spanish,
    dateFormat: "Y-m-d H:i",
    enableTime: true,
    maxDate: "today",
    minDate: setInicio
});

flatpickr(".flatpickrnew", {
    "locale": Spanish,
    dateFormat: "Y-m-d H:i",
    enableTime: true,
    minDate: "today",
});
