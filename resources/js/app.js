window.$ = window.jQuery = require('jquery');
require('./bootstrap');
// require('./quill.js');

window.Quill = require('Quill');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
