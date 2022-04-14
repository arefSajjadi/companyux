try {
    window.Popper = require('@popperjs/core');
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}
