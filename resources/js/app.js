require('./bootstrap');

require('../../node_modules/startbootstrap-sb-admin-2/js/sb-admin-2.js');
require('../../node_modules/inputmask/dist/inputmask/jquery.inputmask');


$(document).ready(function(){
    $(":input").inputmask();
});