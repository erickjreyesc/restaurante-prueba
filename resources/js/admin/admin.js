require('../bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

require('./notifications');

require('./scripts');

require('./flatpickr');

require('./tagify'); 

require("../preloader");