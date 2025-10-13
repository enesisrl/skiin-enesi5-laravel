<?php

return [

    // Self
    'self' => [
        'layout' => 'default', // blank, default
        'rtl' => false, // true, false
    ],

    // Base Layout
    'js' => [
        'breakpoints' => [
            'sm' => 576,
            'md' => 768,
            'lg' => 992,
            'xl' => 1200,
            'xxl' => 1200
        ],
        'colors' => [
            'theme' => [
                'base' => [
                    'white' => '#ffffff',
                    'primary' => '#6993FF',
                    'secondary' => '#E5EAEE',
                    'success' => '#1BC5BD',
                    'info' => '#8950FC',
                    'warning' => '#FFA800',
                    'danger' => '#F64E60',
                    'light' => '#F3F6F9',
                    'dark' => '#212121'
                ],
                'light' => [
                    'white' => '#ffffff',
                    'primary' => '#E1E9FF',
                    'secondary' => '#ECF0F3',
                    'success' => '#C9F7F5',
                    'info' => '#EEE5FF',
                    'warning' => '#FFF4DE',
                    'danger' => '#FFE2E5',
                    'light' => '#F3F6F9',
                    'dark' => '#D6D6E0'
                ],
                'inverse' => [
                    'white' => '#ffffff',
                    'primary' => '#ffffff',
                    'secondary' => '#212121',
                    'success' => '#ffffff',
                    'info' => '#ffffff',
                    'warning' => '#ffffff',
                    'danger' => '#ffffff',
                    'light' => '#464E5F',
                    'dark' => '#ffffff'
                ]
            ],
            'gray' => [
                'gray-100' => '#F3F6F9',
                'gray-200' => '#ECF0F3',
                'gray-300' => '#E5EAEE',
                'gray-400' => '#D6D6E0',
                'gray-500' => '#B5B5C3',
                'gray-600' => '#80808F',
                'gray-700' => '#464E5F',
                'gray-800' => '#1B283F',
                'gray-900' => '#212121'
            ]
        ],
        'font-family' => 'Poppins'
    ],

    // Page loader
    'page-loader' => [
        'type' => '' // default, spinner-message, spinner-logo
    ],

    // Header
    'header' => [
        'self' => [
            'display' => true,
            'width' => 'fluid', // fixed, fluid
            'theme' => 'light', // light, dark
            'fixed' => [
                'desktop' => true,
                'mobile' => true
            ]
        ],

        'menu' => [
            'self' => [
                'display' => false,
                'layout'  => 'default', // tab, default
                'root-arrow' => false, // true, false
            ],

            'desktop' => [
                'arrow' => true,
                'toggle' => 'click',
                'submenu' => [
                    'theme' => 'light',
                    'arrow' => true,
                ]
            ],

            'mobile' => [
                'submenu' => [
                    'theme' => 'dark',
                    'accordion' => true
                ],
            ],
        ]
    ],

    // Subheader
    'subheader' => [
        'display' => true,
        'displayDesc' => true,
        'fixed' => true,
        'width' => 'fluid', // fixed, fluid
        'clear' => false,
        'style' => 'solid' // transparent, solid. can be transparent only if 'fixed' => false
    ],

    // Content
    'content' => [
        'width' => 'fluid', // fluid, fixed
        'extended' => false, // true, false
    ],

    // Brand
    'brand' => [
        'self' => [
            'theme' => 'dark' // light, dark
        ]
    ],

    // Aside
    'aside' => [
        'self' => [
            'theme' => 'dark', // light, dark
            'display' => true,
            'fixed' => true,
            'minimize' => [
                'toggle' => true, // allow toggle
                'default' => false, // default state
                'hoverable' => true //allow hover
            ]
        ],

        'menu' => [
            'dropdown' => false, // ok
            'scroll' => false, // ok
            'submenu' => [
                'accordion' => true, // true, false
                'dropdown' => [
                    'arrow' => true,
                    'hover-timeout' => 500 // in milliseconds
                ]
            ]
        ]
    ],

    // Footer
    'footer' => [
        'width' => 'fluid', // fluid, fixed
        'fixed' => false
    ],

    // Demo Assets
    'resources' => [
        'cdn' => '//cdn.ene.si/master/20/',
        'favicon' => '//cdn.ene.si/master/20/media/img/logo/favicon.ico',
        'fonts' => [
            'google' => [
                'families' => [
                    'Poppins:300,400,500,600,700'
                ]
            ]
        ],
        'css' => [
            '//cdn.ene.si/master/20/plugins/global/plugins.bundle.css',
            '//cdn.ene.si/master/20/css/style.bundle.css',
            '//cdn.ene.si/master/20/css/themes/layout/header/base/common.css',
            '//cdn.ene.si/master/20/css/themes/layout/header/base/light.css',
            '//cdn.ene.si/master/20/css/themes/layout/header/menu/light.css',
            '//cdn.ene.si/master/20/css/themes/layout/aside/light.css',
            '//cdn.ene.si/master/20/css/themes/layout/brand/light.css',
            '//cdn.ene.si/master/20/plugins/custom/datatables/datatables.bundle.css',
            '//cdn.ene.si/master/20/plugins/custom/prismjs/prismjs.bundle.css',
            '//cdn.ene.si/master/20/plugins/custom/uppy/uppy.bundle.css',
            '//cdn.ene.si/jquery-multi-select/0.9.12/css/multi-select.css',
            '//cdn.ene.si/master/20/plugins/custom/cropper/cropper.bundle.css',
            '//cdn.ene.si/slick/1.8.1/slick.min.css',
            '//cdn.ene.si/bootstrap-colorpicker/2.5.2/css/bootstrap-colorpicker.min.css',
            '//unpkg.com/leaflet@1.9.4/dist/leaflet.css',
            '//cdn.ene.si/jquery.combobox/css/combobox.css',
            '/assets/master/css/custom.css',
            '/assets/master/css/pers.css'
        ],
        'js' => [
            '//cdn.ene.si/master/20/plugins/global/plugins.bundle.js',
            '//cdn.ene.si/master/20/js/scripts.bundle.js',
            '//cdn.ene.si/master/20/plugins/custom/datatables/datatables.bundle.js',
            '//cdn.ene.si/master/20/plugins/custom/draggable/draggable.bundle.js',
            '//cdn.ene.si/master/20/plugins/custom/prismjs/prismjs.bundle.js',
            '//cdn.ene.si/master/20/plugins/custom/uppy/uppy.bundle.js',
            '//cdn.ene.si/master/20/plugins/custom/uppy/locales/it_IT.min.js',
            '//cdn.ene.si/bootbox/5.4.0/bootbox.min.js',
            '//cdn.ene.si/jquery-multi-select/0.9.12/js/jquery.multi-select.js',
            '//cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js',
            '//cdn.ene.si/master/20/plugins/custom/cropper/cropper.bundle.js',
            '//cdn.ene.si/slick/1.8.1/slick.min.js',
            '//cdn.ene.si/bootstrap-colorpicker/2.5.2/js/bootstrap-colorpicker.min.js',
            '//cdn.ene.si/jquery.combobox/js/jquery.combobox.js',
            '//cdn.ene.si/imask/6.4.3/imask.min.js',
            '//unpkg.com/leaflet@1.9.4/dist/leaflet.js',
            '/assets/master/js/admin.js'
        ]
    ],

];
