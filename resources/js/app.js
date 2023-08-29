require('./bootstrap');

import 'bootstrap';

import Swal from 'sweetalert2'

window.swal = Swal.mixin({})

// jquery
window.$ = window.jQuery = require('jquery');

