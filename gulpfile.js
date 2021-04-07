const elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.sass('app.scss');
    // mix.copy('resources/assets/vendor/bootstrap/fonts', 'public/fonts');
    mix.copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts');
    mix.styles([
        // 'resources/assets/vendor/bootstrap/css/bootstrap.css',
        // 'resources/assets/vendor/datatables/css/datatables.min.css',
        // 'resources/assets/vendor/animate/animate.css',
        'node_modules/bootstrap/dist/css/bootstrap.css',
        'node_modules/@fortawesome/fontawesome-free/css/all.min.css',
        'node_modules/tailwindcss/dist/base.min.css',
        'node_modules/tailwindcss/dist/utilities.min.css',
        'node_modules/tailwindcss/dist/components.min.css',

        // 'node_modules/spectrum-colorpicker/spectrum.css',
        // 'node_modules/bootstrap-select/dist/css/bootstrap-select.min.css',
        // 'node_modules/dropzone/dist/dropzone.css',
        // 'node_modules/select2/dist/css/select2.css',
        // 'node_modules/sweetalert2/dist/sweetalert2.min.css',

        // 'resources/assets/vendor/toastr/toastr.min.css',
        // 'resources/assets/vendor/iCheck/custom.css',
        // 'resources/assets/vendor/clockpicker/clockpicker.css',
        // 'resources/assets/vendor/datepicker/datepicker3.css',
    ], 'public/css/vendor.css', './');
    mix.scripts([
        // 'resources/assets/vendor/jquery/jquery-3.1.1.min.js',
        // 'resources/assets/vendor/bootstrap/js/bootstrap.js',
        // 'resources/assets/vendor/metisMenu/jquery.metisMenu.js',
        // 'resources/assets/vendor/iCheck/icheck.min.js',
        // 'resources/assets/vendor/slimscroll/jquery.slimscroll.min.js',
        // 'resources/assets/vendor/pace/pace.min.js',
        // 'node_modules/spectrum-colorpicker/spectrum.js',
        // 'node_modules/bootstrap-select/dist/js/bootstrap-select.min.js',
        // 'node_modules/dropzone/dist/min/dropzone.min.js',
        // 'node_modules/select2/dist/js/select2.full.js',
        // 'node_modules/sweetalert2/dist/sweetalert2.min.js',

        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js',

        'resources/assets/js/app.js',
        // 'resources/assets/vendor/clockpicker/clockpicker.js',
        // 'resources/assets/vendor/datepicker/bootstrap-datepicker.js',
        // 'resources/assets/js/jquery-ui.min.js',
        // 'resources/assets/js/jquery-collision.min.js',
        // 'resources/assets/js/builder/helpers.js',
        // 'resources/assets/js/builder/elements/text.js',
        // 'resources/assets/js/builder/elements/image.js',
        // 'resources/assets/js/builder/components/control_panel.js',
        // 'resources/assets/js/builder/components/work_panel.js',
        // 'resources/assets/js/builder/components/layer.js',
        // 'resources/assets/js/builder/builder.js',
        // 'resources/assets/js/dm-components/upload_logos.js',
        // 'resources/assets/js/dm-components/manage_media.js',
        // 'resources/assets/js/dm-components/delete_button.js',
    ], 'public/js/app.js', './');

});
