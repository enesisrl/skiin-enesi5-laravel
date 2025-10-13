let submitting = false;
const submittin_delay = 300;

/* jQuery Init / Extend
------------------------------------------------------------ */

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$.extend({
    getQueryParameters: function (str) {
        return (str).replace(/(^\?)/, '').split("&").map(function (n) {
            return n = n.split("="), this[n[0]] = n[1], this;
        }.bind({}))[0];
    }
});


/* Laravel translations
------------------------------------------------------------ */

function __(key, replace = {}) {
    if(!window.translations){
        return '';
    }

    let translation = key.split('.').reduce((t, i) => (t ? t[i] : null) || null, window.translations);

    for (var placeholder in replace) {
        translation = translation.replace(`:${placeholder}`, replace[placeholder]);
    }

    return translation || '-';
}


/* Admin: Core
------------------------------------------------------------ */
var Datatables = [];
(function() {

    if (KTCookie.getCookie('kt_aside_toggle_state') === 'on'){
        $('body').addClass('kt-primary--minimize aside-minimize');
    }else{
        $('body').removeClass('kt-primary--minimize aside-minimize');
    }


    var Admin = {};
    Admin.load = function(context) {
        if(!context){
            context = window.document;
        }

        LoadPlugins(context);
        LoadServices(context);
    };


    /* Plugins */
    var Plugins = [];

    Admin.plug = function(name, callback) {
        Plugins.push({
            name: name,
            callback: callback
        });
    };

    function LoadPlugins(context) {
        $.each(Plugins, function(i, p){
            var id = 'admin-' + p.name;

            if(typeof p.callback === 'function'){
                var selector = '[data-' + id + ']';
                var dataId = id + '-domer';
                $(selector, context).each(function() {
                    var options = $(this).data(id);
                    if(!$(this).data(dataId)){
                        $(this).data(dataId, new p.callback($(this), options));
                    }
                });
            }
        });
    }


    /* Services */
    var Services = [];

    Admin.service = function(callback) {
        Services.push(callback);
    };

    function LoadServices(context){
        Services.forEach(function(callback){
            if(typeof callback === 'function'){
                callback(context || window.document);
            }
        });
    }


    /* Callbacks */
    var AdminCallbacks = {};
    Admin.on = function(event, callback) {
        if(!AdminCallbacks[event]){
            AdminCallbacks[event] = jQuery.Callbacks("unique");
        }

        AdminCallbacks[event].add(callback);
    };
    Admin.one = function(event, callback) {
        if(typeof callback === "function") {
            Admin.on(event, function one() {
                callback();
                Admin.off(event, one);
            });
        }
    };
    Admin.off = function(event, callback) {
        if(AdminCallbacks[event]){
            AdminCallbacks[event].remove(callback);
        }
    };
    Admin.trigger = function(event, args, context){
        if($.isArray(event)){
            var items = event;
            if(!args){
                args = {};
            }
            if(!context){
                context = window.document;
            }

            items.forEach(function(item){
                if(typeof item.event === 'undefined'){
                    item = {event: item[0], args: item[1], context: item[2]};
                }
                Admin.trigger(item.event, $.extend({}, args, item.args), item.context || context);
            });
            return;
        }

        if(!AdminCallbacks[event]){
            return;
        }
        AdminCallbacks[event].fireWith(context ? $(context) : document, [args]);
    };


    /* Ajax */
    Admin.ajax = function(options) {

        /*
        // Loader
        KTApp.blockPage({
            overlayColor: '#000000',
            state: 'primary',
            message: __('message.caricamento')
        });
        */
        // Imposto i valori di default e li estendo
        options = jQuery.extend({
            method: "post",
            dataType: "json"
        }, options);

        // Riscrivo i callbacks success ed error
        var rewriteCallbacks = {
            success: function (response) {
                if (typeof response.adminCallbacks !== 'undefined') {
                    Admin.trigger(response.adminCallbacks, options.adminCallbacksArgs || {}, options.adminCallbacksContext || false);
                }
            },
            error: function () {
                bootbox.dialog({
                    message: __('message.ajax_error')
                });
            },
            complete: function () {
                KTApp.unblockPage();
            }
        };
        jQuery.each(rewriteCallbacks, function (name, callback) {
            options[name] = options[name] !== undefined ? [options[name], callback] : callback;
        });



        return jQuery.ajax(options);
    };

    /*
    * Toastr Global Options
    * */

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    /* Boot */
    window.Admin = Admin;
    $(function(){
        Admin.load();
    });

})();


/* Admin: Default Callbacks
------------------------------------------------------------ */

(function() {

    Admin.on('bootboxAlert', function(options) {
        bootbox.alert($.extend({
            onShow: function() {
                Admin.load(this);
            }
        }, options));
    });

    Admin.on('bootboxDialog', function(options) {
        bootbox.dialog($.extend({
            onShown: function() {
                Admin.load(this);
            }
        }, options));
    });

    Admin.on('bootboxHideAll', function(options) {
        bootbox.hideAll();
    });

    Admin.on('bootboxHide', function(options) {
        $(this).modal("hide");
    });

    Admin.on('importNewItem', function(options) {
        importSelected(options.actionUrl,options.ids);
    });

    Admin.on('formValidatorErrors', function(options) {
        var form = this;

        // Reset errori
        $('[data-input-container] .is-invalid,:input.is-invalid').removeClass('is-invalid');
        $('.invalid-feedback', form).remove();

        var globalMessages = [];

        // Ciclo errori
        if(typeof options.messages !== 'undefined'){
            $.each(options.messages, function(name, messages) {
                var input = $('[name=' + name + ']', form);
                var inputContainer = input.closest('[data-input-container]');

                if($('.select2', inputContainer).length) {
                    $('.select2', inputContainer).addClass('is-invalid');
                } else if(input.length) {
                    input.addClass('is-invalid');
                }

                $.each(messages, function(i, message){
                    if(input.length) {
                        var errorMessage = '<div class="invalid-feedback">' + message + '</div>';
                        if($('[data-input-error]', inputContainer).length) {
                            $('[data-input-error]', inputContainer).append(errorMessage)
                        } else if (!input.hasClass('custom-file-input')) {
                            input.after(errorMessage);
                        } else {
                            globalMessages.push(message);
                        }
                    } else {
                        globalMessages.push(message);
                    }
                });
            });
            if (__("form.validation_errors_message")) {
                toastr.error(__("form.validation_errors_message"), __("form.validation_errors_title"));
            }
        }

        if(globalMessages.length){
            bootbox.alert({
                message: globalMessages.join('<br />')
            });
        }
    });

    Admin.on('location', function(options) {
        if (typeof options.location === 'undefined') {
            return;
        }

        if (typeof options.delay !== 'undefined') {
            setTimeout(function(){
                window.document.location = options.location;
            }, options.delay);
        } else {
            window.document.location = options.location;
        }
    });

    Admin.on('reload', function(options) {
        if (typeof options.delay !== 'undefined') {
            setTimeout(function(){
                window.document.location.reload();
            }, options.delay);
        } else {
            window.document.location.reload();
        }
    });

    Admin.on('toastrSuccess', function(options) {
        toastr.options.positionClass = 'toast-bottom-right';
        if (typeof options.delay !== 'undefined'){
            toastr.options.positionClass = options.positionClass;
        }
        toastr.success(options.message, options.title);
    });
    Admin.on('toastrWarning', function(options) {
        toastr.warning(options.message, options.title);
    });
    Admin.on('toastrError', function(options) {
        toastr.options.positionClass = 'toast-bottom-right';
        if (options.positionClass !== 'undefined'){
            toastr.options.positionClass = options.positionClass;
        }
        toastr.error(options.message, options.title);
    });

})();


/* Admin Plugins: Ajax Form
------------------------------------------------------------ */

(function() {


    Admin.plug('ajax-form', function(form, options) {
        form.on('submit', function (e) {
            e.preventDefault();
            if (submitting) {
                return;
            }
            submitting = true;
            KTApp.blockPage({
                overlayColor: '#000000',
                state: 'primary',
                message: __('message.caricamento')
            });
            var request = {
                adminCallbacksContext: form,
                method: form.attr('method'),
                url: form.attr('action'),
                complete: function () {
                    setTimeout(function () {
                        submitting = false;
                        KTApp.unblockPage();
                    }, submittin_delay);
                }
            };

            if (form.attr('enctype') === 'multipart/form-data') {
                request.data = new FormData(form);
                request.enctype = 'multipart/form-data';
                request.processData = false;
                request.contentType = false;
            } else {
                request.data = form.serialize();
            }

            Admin.ajax(request);
        });
    });

})();


/* Admin Plugins: Ajax Call
------------------------------------------------------------ */

(function() {


    Admin.plug('ajax-call', function(input, options) {
        input.on(options.event || 'click', function (e) {
            e.preventDefault();
            ajaxCall(input, options);
        });

    });

})();


/* Admin Plugins: Import in pages
------------------------------------------------------------ */

(function() {


    Admin.plug('open-import-search', function(input, options) {
        input.on(options.event || 'click', function (e) {
            e.preventDefault();
            if (submitting) {
                return;
            }
            submitting = true;

            var exclude_ids = [];
            input.closest("[data-admin-content]").find("[data-admin-import-search-exclude]").each(function(){
                exclude_ids.push($(this).val());
            });

            params = $.extend({
                exclude_ids: exclude_ids
            }, options.data || {});
            var request = {
                method: options.method || 'POST',
                url: options.action,
                data: params,
                complete: function () {
                    setTimeout(function () {
                        submitting = false;
                    }, submittin_delay);
                }
            };
            Admin.ajax(request);
        });
    });

})();

/* Admin Plugins: Slug generator
------------------------------------------------------------ */

(function() {

    Admin.plug('slug', function(input, options) {
        var form = input.closest("form");
        var input_src = form.find("[name='"+options.input_src+"']");
        var generaSlug = function(el){

            var postData = {};
            postData.url = el.val();
            postData.table = options.table;
            postData.id = options.id;
            postData.fk = options.fk;
            postData.lang = options.lang;

            var request = {
                method: 'POST',
                url: window.adminBaseUrl+"/services/generate_slug",
                data: postData,
                success: function (data) {
                    if (data.r){
                        input.val(data.v);
                    }

                }
            };
            Admin.ajax(request);
        }
        input.on("change", function(e){
            e.preventDefault();
            generaSlug($(this));
        });
        input_src.on("change", function(e){
            e.preventDefault();
            if (!input.val()) {
                generaSlug($(this));
            }
        });

    });

})();

/* Admin Plugins: Coords Picker
------------------------------------------------------------ */

(function() {
    Admin.plug('coordspicker', function(obj, options) {

        obj.on("click",function(e){

            e.preventDefault();
            //console.log(options);

            var postData = {field_id: options.field_id, lat:0, lng:0, modal_id: options.modal_id, address_field: options.address_field};

            const $field_container = $("#"+options.field_id);
            if ($field_container.find("[data-coord-lat]").val()){
                postData.lat = $field_container.find("[data-coord-lat]").val();
            }
            if ($field_container.find("[data-coord-lng]").val()){
                postData.lng = $field_container.find("[data-coord-lng]").val();
            }

            let start_address = "";
            if ($("#"+options.address_field+"__toponym_field").length){
                if (start_address) start_address += ' ';
                start_address += $("#"+options.address_field+"__toponym_field").val();
            }
            if ($("#"+options.address_field+"__indirizzo_field").length){
                if (start_address) start_address += ' ';
                start_address += $("#"+options.address_field+"__indirizzo_field").val();
            }
            if ($("#"+options.address_field+"__civico_field").length){
                if (start_address) start_address += ', ';
                start_address += $("#"+options.address_field+"__civico_field").val();
            }
            if ($("#"+options.address_field+"__cap_field").length){
                if (start_address) start_address += ', ';
                start_address += $("#"+options.address_field+"__cap_field").val();
            }

            if ($("#"+options.address_field+"__country_id_field").val() == window.adminConstants.id_country_italia) {
                if ($("#"+options.address_field+"__comune_select_field").length){
                    if (start_address) start_address += ', ';
                    start_address += $("#"+options.address_field+"__comune_select_field").val();
                }
            }else{
                if ($("#"+options.address_field+"__comune_field").length){
                    if (start_address) start_address += ', ';
                    start_address += $("#"+options.address_field+"__comune_field").val();
                }

            }

            if ($("#"+options.address_field+"__comune_field").length){
                if (start_address) start_address += ', ';
                start_address += $("#"+options.address_field+"__comune_field").val();
            }
            if ($("#"+options.address_field+"__provincia_id_field").length){
                if (start_address) start_address += ', ';
                start_address += $("#"+options.address_field+"__provincia_id_field option:selected").html();
            }
            if ($("#"+options.address_field+"__country_id_field").length){
                if (start_address) start_address += ', ';
                start_address += $("#"+options.address_field+"__country_id_field option:selected").html();


            }
            postData.start_address = start_address;

            var modal_id = options.modal_id;

            if (!$("#"+modal_id).length){
                $("body").append('<div class="modal coords-modal fade" id="'+modal_id+'" tabindex="-1" role="basic" aria-labelledby="staticBackdrop" aria-hidden="true"></div>');
            }

            var request = {
                method: 'POST',
                url: window.adminBaseUrl+"/services/viewOnMap",
                data: postData,
                dataType: 'html',
                success: function (data) {
                    $("#"+modal_id).html(data);
                    $("#"+modal_id).modal({backdrop:'static',show:true});
                }
            };
            Admin.ajax(request);
        });


    });
})();





/* Admin Plugins: Color Picker
------------------------------------------------------------ */

(function() {


    Admin.plug('colorpicker', function(obj, options) {
        var $this_input = $(obj).parent().parent().find("input");
        var $this = $(obj);
        //console.log($this_input, $this);
        $this_input.inputmask({"mask": "######"});
        $this.colorpicker({
            customClass: 'colorpicker-2x',
            sliders: {
                saturation: {
                    maxLeft: 200,
                    maxTop: 200
                },
                hue: {
                    maxTop: 200
                },
                alpha: {
                    maxTop: 200
                }
            },
            color: "#"+$this_input.val(),
            format: 'hex',
            hexNumberSignPrefix: false
        });
        var startChange;
        $this.colorpicker().off('changeColor');
        $this.colorpicker().on('changeColor', function(e) {
            clearTimeout(startChange);
            startChange = setTimeout(function(){
                var color = $this.colorpicker('getValue', '000000');
                $this.css("background-color", "#" + color);
                $this_input.val(color);
                $this_input.trigger("change");
                /*
                var color = e.color;
                console.log(color,e);
                */
            },250);


        });
        var hex_color = $this_input.val();
        $this.css("background-color", "#" + hex_color);

    });

})();

/* Admin Plugins: Address Field
------------------------------------------------------------ */

(function() {


    Admin.plug('address-field', function(input, options) {

        const $country = $("#"+options+"__country_id_field");
        const $province = $("#"+options+"__provincia_id_field");
        const $city_select = $("#"+options+"__comune_select_field");

        // Bind onchange su select Comune per ricavare il CAP
        $city_select.change(function(){
            cityChange($(this).val(),options);
        });

        // Bind onchange su Province per caricare select comuni
        $province.change(function(){
            provinceChange($(this).val(),options);
        });

        provinceChange($province.find('option:selected').val(),options, true)

        // Bind onchange su Nazione per abilitare / disabilitare funzionalità specifiche per Italia
        $country.change(function(){
            countryChange($(this).val(),options);
        });

        countryChange($country.find('option:selected').val(),options, true)



    });

})();

/* Admin Plugins: Autocomplete
------------------------------------------------------------ */

(function() {

    Admin.plug('autocomplete', function(input, options) {
        const custom = new Bloodhound({

            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: options.url
        });

        input.typeahead(null, {
            name: options.name,
            source: custom
        });

    });

})();


/* Admin Plugins: Maxlengt
------------------------------------------------------------ */

(function() {


    Admin.plug('maxlength', function(input, options) {

        input.maxlength({
            warningClass: "label label-success label-inline",
            limitReachedClass: "label label-danger label-inline"
        });
    });

})();


/* Admin Plugins: Select2
------------------------------------------------------------ */

(function() {


    Admin.plug('select2', function(input, options) {

        input.select2({
            placeholder: input.data("select2-placeholder") ?? __("label.select_option"),
            allowClear: true
        });
    });

})();





/* Admin Plugins: Carousel
------------------------------------------------------------ */

(function() {
    if(typeof $.fn.slick === 'undefined') {
        return;
    }

    Admin.plug('carousel', function(context, options) {
        var carousel = $(context);

        var current = carousel.children().index(carousel.children('.slick-current'));
        options = $.extend({
            accessibility: false,
            dots: false,
            prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"><i class="fa fa-angle-left"></i></button>',
            nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"><i class="fa fa-angle-right"></i></button>',
            customPaging: function (slider, i) {
                return '<span></span>';
            }
        }, options || {});
        var slick = carousel.slick(options);
    });

})();

/* Admin Plugins: Currency
------------------------------------------------------------ */

(function() {

    Admin.plug('currency', function(input, options){

        options = jQuery.extend({
            mask: Number,  // enable number mask
            scale: 2,  // digits after point, 0 for integers
            signed: false,  // disallow negative
            thousandsSeparator: '',  // any single char
            padFractionalZeros: false,  // if true, then pads zeros at end to the length of scale
            normalizeZeros: true,  // appends or removes zeros at ends
            radix: '.',  // fractional delimiter
            mapToRadix: [',']
        }, options);


        IMask(input[0], options);
    });

})();


/* Admin Plugins: Change Language
------------------------------------------------------------ */

(function() {

    Admin.plug('change-language', function(el, options){
        el.on("click", function(e) {
            e.preventDefault();
            var actionUrl = $(this).data("href");
            Admin.ajax({
                url: actionUrl,
                data: {"language_id":$(this).data("language_id")},
                method: 'POST'
            });
        });
    });

})();


/* Admin Plugins: Change Profile
------------------------------------------------------------ */

(function() {

    Admin.plug('change-profile', function(el, options){
        el.on("click", function(e) {
            e.preventDefault();
            var actionUrl = $(this).data("href");
            Admin.ajax({
                url: actionUrl,
                data: {"website_id":$(this).data("website_id"),"role_id":$(this).data("role_id")},
                method: 'POST'
            });
        });
    });

})();


/* Admin Plugins: CheckAll
------------------------------------------------------------ */

(function() {

    Admin.plug('check-all', function(input, options){
        var isCheckbox = input.is('[type=checkbox]');
        var evt = isCheckbox ? 'change' : 'click';
        $('input[data-admin-check-all-target="' + options.target + '"]').hide();
        input.on(evt, function() {
            var check = isCheckbox ? input.is(':checked') : $('input[data-admin-check-all-target="' + options.target + '"]').length != $('input[data-admin-check-all-target="' + options.target + '"]:checked').length;
            $('input[data-admin-check-all-target="' + options.target + '"]').prop('checked', check).attr('checked', check ? 'checked' : '').change();
        });
    });

})();

/* Admin Plugins: Reset form
------------------------------------------------------------ */

(function() {

    Admin.plug('reset-form', function(el, options){
        el.on("click", function(e) {
            e.preventDefault();
            var $form = $(this).closest('form');
            $form.clearForm();
            $form.find("[data-admin-select2]").val(null).trigger('change');
        });
    });

})();

/* Admin Plugins: Datatable
------------------------------------------------------------ */

(function() {

    var Presets = {
        'crud': function(table, options, datatable) {
            table.on("click", '[data-crud-destroy]',function(e){
                e.preventDefault();
                var actionUrl = $(this).attr("data-crud-destroy");
                bootbox.confirm({
                    message: __("message.confirm_deletion"),
                    buttons: {
                        confirm: {label: __("label.yes"), className: 'btn-danger'},
                        cancel: {label: __("label.no"), className: 'btn-light'}
                    },
                    callback: function (response) {
                        if (response){
                            Admin.ajax({
                                url: actionUrl,
                                method: 'DELETE',
                                adminCallbacksArgs: {
                                    datatable: datatable
                                }
                            });
                        }
                    }
                });
            });

            table.on("click", '[data-crud-restore]',function(e){
                e.preventDefault();
                var actionUrl = $(this).attr("data-crud-restore");
                bootbox.confirm({
                    message: __("message.confirm_restore"),
                    buttons: {
                        confirm: {label: __("label.yes"), className: 'btn-danger'},
                        cancel: {label: __("label.no"), className: 'btn-light'}
                    },
                    callback: function (response) {
                        if (response){
                            Admin.ajax({
                                url: actionUrl,
                                method: 'POST',
                                adminCallbacksArgs: {
                                    datatable: datatable
                                }
                            });
                        }
                    }
                });
            });


            if(typeof options.destroySelectedButton === 'string' || typeof options.importSelectedButton === 'string') {

                if ($(options.destroySelectedButton)) {
                    $(options.destroySelectedButton).on("click", function (e) {
                        e.preventDefault();
                        var selected = table.find('[data-admin-check-all-target]:checked');
                        if (!selected.length) {
                            bootbox.alert({
                                message: __("message.select_almost_one")
                            });
                        } else {
                            var actionUrl = $(this).attr("data-crud-destroy");

                            var ids = [];
                            selected.each(function () {
                                ids.push($(this).val());
                            });

                            bootbox.confirm({
                                message: __("message.confirm_deletion_selected"),
                                buttons: {
                                    confirm: {label: __("label.yes"), className: 'btn-danger'},
                                    cancel: {label: __("label.no"), className: 'btn-light'}
                                },
                                callback: function (response) {
                                    if (response) {
                                        Admin.ajax({
                                            url: actionUrl,
                                            data: {id: ids},
                                            method: 'DELETE',
                                            adminCallbacksArgs: {
                                                datatable: datatable
                                            }
                                        });
                                    }
                                }
                            });
                        }
                    });
                }
                //console.log(options.importSelectedButton,$(options.importSelectedButton))
                if ($(options.importSelectedButton)) {
                    $(options.importSelectedButton).on("click", function (e) {
                        e.preventDefault();
                        var selected = table.find('[data-admin-check-all-target]:checked');
                        if (!selected.length) {
                            bootbox.alert({
                                message: __("message.select_almost_one")
                            });
                        } else {
                            var actionUrl = $(this).attr("data-crud-import");

                            var ids = [];
                            selected.each(function () {
                                ids.push($(this).val());
                            });

                            bootbox.confirm({
                                message: __("message.confirm_import_selected"),
                                buttons: {
                                    confirm: {label: __("label.yes"), className: 'btn-success'},
                                    cancel: {label: __("label.no"), className: 'btn-light'}
                                },
                                callback: function (response) {
                                    if (response) {
                                        Admin.ajax({
                                            url: actionUrl,
                                            data: {id: ids},
                                            method: 'POST',
                                            adminCallbacksArgs: {
                                                datatable: datatable
                                            },
                                            success: function(data){
                                                if (typeof window.onDataCrudImportCallback === 'function'){
                                                    window.onDataCrudImportCallback(data.response);
                                                }
                                            }
                                        });
                                    }
                                }
                            });
                        }
                    });
                }

                // Abilitazione dinamica del pulsante
                table.on('change', '[data-admin-check-all-target]', function() {
                    var disabled = !$('[data-admin-check-all-target]:checked', table).length;
                    if ($(options.destroySelectedButton)) {
                        $(options.destroySelectedButton).prop('disabled', disabled).attr('disabled', disabled ? 'disabled' : null);
                        if (disabled) {
                            $(options.destroySelectedButton).addClass('btn-light').removeClass('btn-danger');
                        } else {
                            $(options.destroySelectedButton).addClass('btn-danger').removeClass('btn-light');
                        }
                    }

                    if ($(options.importSelectedButton)) {
                        $(options.importSelectedButton).prop('disabled', disabled).attr('disabled', disabled ? 'disabled' : null);
                        if (disabled) {
                            $(options.importSelectedButton).addClass('btn-light').removeClass('btn-info');
                        } else {
                            $(options.importSelectedButton).addClass('btn-info').removeClass('btn-light');
                        }
                    }


                });

                // Refresh stato checkbox checkAll
                table.on('draw.dt', function () {
                    $('[data-admin-check-all]', table).prop('checked', false).attr('checked', '').change();
                });
            }

        }
    };

    Admin.plug('datatable-inline', function(table, options) {


        // begin first table
        table.DataTable({
            // DOM Layout settings
            dom: `<'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            lengthMenu: [5, 10, 25, 50],
            pageLength: 50,
            language: {
                emptyTable: __('js.datatable.emptyTable'),
                info: __('js.datatable.info'),
                infoEmpty: __('js.datatable.infoEmpty'),
                infoFiltered: __('js.datatable.infoFiltered'),
                infoThousands: __('js.datatable.infoThousands'),
                lengthMenu: __('js.datatable.lengthMenu'),
                loadingRecords: __('js.datatable.loadingRecords'),
                processing: __('js.datatable.processing'),
                search: __('js.datatable.search'),
                zeroRecords: __('js.datatable.zeroRecords'),
                paginate: {
                    first: __('js.datatable.paginate.first'),
                    previous: __('js.datatable.paginate.previous'),
                    next: __('js.datatable.paginate.next'),
                    last: __('js.datatable.paginate.last')
                },
                aria: {
                    sortAscending: __('js.datatable.aria.sortAscending'),
                    sortDescending: __('js.datatable.aria.sortDescending')
                }
            },
            // Order settings
            order: [[0, 'asc']],
        });
    })

    Admin.plug('datatable', function(table, options) {
        let searchStored = "";
        let searchColumnsStored = [];
        // Datatable Settings
        const dataTableSettings = $.extend({
            language: {
                emptyTable: __('js.datatable.emptyTable'),
                info: __('js.datatable.info'),
                infoEmpty: __('js.datatable.infoEmpty'),
                infoFiltered: __('js.datatable.infoFiltered'),
                infoThousands: __('js.datatable.infoThousands'),
                lengthMenu: __('js.datatable.lengthMenu'),
                loadingRecords: __('js.datatable.loadingRecords'),
                processing: __('js.datatable.processing'),
                search: __('js.datatable.search'),
                zeroRecords: __('js.datatable.zeroRecords'),
                paginate: {
                    first: __('js.datatable.paginate.first'),
                    previous: __('js.datatable.paginate.previous'),
                    next: __('js.datatable.paginate.next'),
                    last: __('js.datatable.paginate.last')
                },
                aria: {
                    sortAscending: __('js.datatable.aria.sortAscending'),
                    sortDescending: __('js.datatable.aria.sortDescending')
                }
            },
            responsive: window.innerWidth > 767,
            scrollX: window.innerWidth <= 767,
            scrollCollapse: window.innerWidth <= 767,
            dom: `<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            lengthMenu: [25, 50, 100, 200],
            pageLength: 25,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            stateSave: true,
            stateSaveCallback: function (settings, data) {
                if (!options.discardStateSave) {
                    localStorage.setItem('DataTables_' + settings.sInstance + "_" + window.location.pathname, JSON.stringify(data))
                }
            },
            stateLoadCallback: function(settings) {
                if (!options.clearList) {
                    const localStorageState = JSON.parse(localStorage.getItem('DataTables_' + settings.sInstance + "_" + window.location.pathname));
                    if (localStorageState) {
                        searchStored = localStorageState.search.search;
                        localStorageState.columns.forEach((column, index) => {
                            if (column.search.search) {
                                searchColumnsStored[index] = column.search.search;
                            } else {
                                searchColumnsStored[index] = '';
                            }
                        });
                    }
                    return JSON.parse( localStorage.getItem( 'DataTables_' + settings.sInstance+"_"+window.location.pathname ) );
                }else{
                    return {};
                }
            },
            ajax: {
                url: options.ajaxUrl,
                type: "POST",
                data: function (data) {
                    /*
                    data['search']['value'] = '';
                    if ($(options.searchInput).val()) {
                        data['search']['value'] = $(options.searchInput).val();
                    }
                    */
                    if (options.post) {
                        $.each(options.post, function(key, val){
                            data[key] = val;
                        });
                    }
                    if (options.excludeIds){
                        if ($(options.excludeIds).length) {
                            var exclude_ids = [];
                            $(options.excludeIds).each(function(){
                                exclude_ids.push($(this).val());
                            });
                            data["exclude_ids"] = exclude_ids;
                        }
                    }
                    if (options.searchFormSelector){
                        if ($(options.searchFormSelector).length) {
                            data["customSearch"] = [];
                            $(options.searchFormSelector).find(":input").each(function(){
                                let item = {};
                                if ($(this).val()) {
                                    item.name = $(this).data("field-name") || $(this).attr("name");
                                    item.value = $(this).val();
                                    item.search_type = ($(this).data("admin-search-type")) ? $(this).data("admin-search-type") : null;
                                    item.value_type = ($(this).data("admin-value-type")) ? $(this).data("admin-value-type") : null;
                                    data["customSearch"].push(item);
                                }
                            });
                            //console.log(data["customSearch"]);

                        }
                    }
                    return data;
                }
            },
            columns: [],
            order: [],
            initComplete: function () {
                const api = this.api();

                // Controllo globale per evitare duplicazione dei filtri
                let filtersAdded = false;

                const addFilters = () => {
                    // Verifica se i filtri sono già stati aggiunti
                    if (filtersAdded || $(api.table().header()).find('tr.filter').length > 0) {
                        return;
                    }

                    filtersAdded = true;

                    // Aggiungi la riga dei filtri
                    const rowFilter = $('<tr class="filter"></tr>').appendTo($(api.table().header()));

                    dataTableSettings.columns.forEach((column, i) => {
                        let input;
                        let searchStored = ''; // Valore preimpostato dal salvataggio
                        if (searchColumnsStored[i]) {
                            searchStored = searchColumnsStored[i];
                        }

                        if (column.columnSearch) {
                            switch (column.columnType) {
                                default:
                                    // Campo di input per filtro con valore preimpostato
                                    input = $('<input type="text" class="form-control form-control-sm form-filter datatable-input" data-field-name="' + column.name + '" data-col-index="' + i + '" value="' + searchStored + '"/>');
                                    break;
                            }
                        } else {
                            input = $("<span>&nbsp;</span>");
                        }

                        $('<th>').append(input).appendTo(rowFilter);
                    });

                    // Evento su pressione di Invio nei filtri per colonna
                    $(rowFilter).find('.datatable-input').on('keyup', function (e) {
                        if (e.key === 'Enter') {
                            applyFilters();
                        }
                    });
                };

                const genericSearchInput = $(options.searchInput || '');

                // Evento globale per la pressione del tasto RETURN su tutti i filtri
                const applyFilters = () => {
                    const params = {};

                    // Raccogli i valori da tutti i filtri per colonna
                    if (filtersAdded) {
                        $(api.table().header()).find('.datatable-input').each(function () {
                            const colIndex = $(this).data('col-index');
                            params[colIndex] = $(this).val() || '';
                        });
                    }

                    // Applica la ricerca generica
                    if (genericSearchInput.length > 0) {
                        const genericSearchValue = genericSearchInput.val() || '';
                        api.search(genericSearchValue);
                    }

                    // Applica la ricerca su tutte le colonne
                    Object.entries(params).forEach(([i, val]) => {
                        api.column(i).search(val, false, false);
                    });

                    // Ridisegna la tabella
                    api.draw();
                };

                if (genericSearchInput.length > 0) {
                    // Evento su pressione di Invio nel campo di ricerca generico
                    genericSearchInput.on('keyup', function (e) {
                        if (e.key === 'Enter') {
                            applyFilters();
                        }
                    });
                }

                // Verifica se almeno una colonna ha il filtro attivo
                let hasColumnSearch = false;
                for (const i in dataTableSettings.columns) {
                    if (dataTableSettings.columns[i].columnSearch) {
                        hasColumnSearch = true;
                    }
                }
                if (hasColumnSearch) {
                    // Aggiungi i filtri una prima volta
                    addFilters();

                    // Aggiungi i filtri dopo ogni modifica dell'header
                    api.on('preDraw', function () {
                        addFilters();
                    });
                }
            }
        }, options.datatable || {});

        // Columns Options
        $('thead th', table).each(function (i) {
            const column_name = $(this).data("column-name") || false;
            const field_name = $(this).data("field-name") || column_name;
            const column_type = $(this).data("column-type") || false;
            const order = $(this).data("order") || false;
            const order_default = $(this).data("order-default") || false;
            const order_default_type = $(this).data("order-default-type");
            const className = $(this).data("column-classname");
            let columnSearch = $(this).data("column-searchable");
            let searchable = $(this).data("column-searchable");

            if (searchable == 'undefined'){
                searchable = 1;
            }
            if (columnSearch == 'undefined'){
                columnSearch = 0;
            }

            // COLUMN
            var column = {
                orderable: !!(order),
                searchable: true,
                data: column_name,
                name: field_name,
                className: className,
                columnSearch: columnSearch,
                columnType: column_type.trim()
            };

            if (column_type === 'actions') {
                column.searchable = false;
                column.render = function(data, type, full, meta){
                    return '<div>'+data+'</div>';
                };
            }

            // SORT
            if (order_default) {
                dataTableSettings.order.push([i, order_default_type]);
            }

            dataTableSettings.columns.push(column);
        });

        // Datatable Init
        const datatable = table.DataTable(dataTableSettings);

        // Preset Init
        if(typeof options.preset === 'string' && typeof Presets[options.preset] === 'function'){
            Presets[options.preset](table, options, datatable);
        }

        // External search
        if(typeof options.searchInput === 'string') {
            if (searchStored) {
                $(options.searchInput).val(searchStored);
            }
            if (options.searchKeyword){
                $(options.searchInput).val(options.searchKeyword);
            }
            $(options.searchInput).closest('[data-crud-form-input-search]').on('submit', function(e){
                e.preventDefault();
                datatable.search($(options.searchInput).val()).draw();
                $(options.searchInput).trigger('blur');
            });
        }

        // Form search

        if (options.searchFormSelector){
            if ($(options.searchFormSelector).length) {
                $(options.searchFormSelector).on("submit",function(e){
                    e.preventDefault();
                    datatable.draw();
                });
            }
        }

        // Events
        table.on('draw.dt', function () {
            Admin.load(table);
        });

        Datatables[table.attr('id')] = datatable;
        return {
            datatable: datatable
        };

    });

    Admin.on('datatableDraw', function(options) {
        var datatable;
        if(typeof options.datatable === 'string'){
            datatable = $(options.datatable).DataTable();
        } else if(typeof options.datatable !== 'undefined'){
            datatable = options.datatable;
        } else {
            return;
        }

        datatable.draw();
    });

})();


/* Admin Plugins: Datetimepicker
------------------------------------------------------------ */

(function() {

    Admin.plug('datetimepicker', function(input, options){

        options = jQuery.extend({
            locale: 'it'
        }, options);



        input.closest(".date").datetimepicker(options);

    });

})();

/* Admin Plugins: Timepicker
------------------------------------------------------------ */

(function() {

    Admin.plug('timepicker', function(input, options){

        options = jQuery.extend({
            minuteStep: 1,
            defaultTime: '',
            showSeconds: false,
            showMeridian: false,
            snapToStep: true
        }, options);
        input.timepicker(options);

    });

})();

/* Admin Plugins: DateRange
------------------------------------------------------------ */

(function() {

    Admin.plug('daterangepicker', function(input, options){
        var options = jQuery.extend({
            autoUpdateInput: false,
            buttonClasses: ' btn',
            applyClass: 'btn-primary',
            cancelClass: 'btn-secondary',
            locale: {
                "format": "DD-MM-YYYY",
                "separator": " - ",
                "applyLabel": __('daterangepicker.apply'),
                "cancelLabel": __('daterangepicker.cancel'),
                "fromLabel": __('daterangepicker.from'),
                "toLabel": __('daterangepicker.to'),
                "customRangeLabel": __('daterangepicker.custom'),
                "weekLabel": "W"
            },
            direction: KTUtil.isRTL()
        }, options);

        input.daterangepicker(options, function(start, end, label) {
            input.val( start.format(options.locale.format) + ' / ' + end.format(options.locale.format));
            input.parent().find('[data-daterange-from]').val(start.format('YYYY-MM-DD'));
            input.parent().find('[data-daterange-to]').val(end.format('YYYY-MM-DD'));
        });
        input.closest('.input-group').find('.calendar-icon').on('click', function() {
            input.focus();
        });
        input.closest('.input-group').find('.reset-icon').on('click', function() {
            console.log('click reset');
            input.val('');
            input.parent().find('[data-daterange-from]').val('');
            input.parent().find('[data-daterange-to]').val('');
        });
    });

})();

/* Admin Plugins: ComboBox
------------------------------------------------------------ */

(function() {

    Admin.plug('combobox', function(combobox, options){
        combobox.combobox({
            clearIfNoMatch:false,
            highlighter: function(item) {
                return "<div>" + item + "</div>"
            }
        });
    });

})();

/* Admin Plugins: Flash Callbacks
------------------------------------------------------------ */

(function() {

    Admin.service(function() {
        if(typeof window.adminCallbacks !== 'undefined' && window.adminCallbacks){
            Admin.trigger(window.adminCallbacks);
            delete window.adminCallbacks;
        }
    });

})();


/* Admin Plugins: add Content Block (pages, news, ecc.)
------------------------------------------------------------ */

(function() {

    var sortableContent = function(context) {
        var containers = $(".contents-container", context).get();
        if (containers.length === 0) {
            return false;
        }

        var sortable = new Sortable.default(containers, {
            draggable: '.draggableContent',
            handle: '.draggableContent .draggableContent-handle',
            mirror: {
                appendTo: 'body',
                constrainDimensions: true
            }
        });

        sortable.on('drag:stop', (event) => {
            setTimeout(function() {
                //console.log("drag:stop", context, $(".contentSequence",context));

                $(".contentSequence",context).each(function(i){
                    var j = i+1;
                    $(this).val((j*10));
                });
            }, 200);
        });
    };

    Admin.plug('content-management', function(el, options){
        sortableContent(el);
    });

    Admin.plug('remove-imported', function(el, options){

        el.on("click", function(e){
            e.preventDefault();
            var element = $(this).closest(".imported-item").slideUp("slow",function(){
                $(this).remove();
            });
        });
    });

    Admin.plug('add-content', function(el, options){

        var addContent = function(el){
            var cont = 1*$(".totalContents__"+options.lang).val() + 1;
            var postData = {};
            postData.type = options.type;
            postData.lang = options.lang;
            postData.model_id = options.model_id;
            postData.cont = cont;
            postData.moduleName = options.moduleName;
            postData.viewsModuleName = options.viewsModuleName;

            //console.log(options, postData);
            var request = {
                method: 'POST',
                url: window.adminBaseUrl+"/services/addContent",
                data: postData,
                dataType: 'html',
                success: function (data) {
                    elaborateResponse(data);
                    $(".totalContents__"+options.lang).val(cont);
                }
            };
            Admin.ajax(request);
        };

        var elaborateResponse = function(data){
            //console.log(jQuery.parseHTML(data));
            $element = jQuery.parseHTML(data);
            //console.log($element);
            var context = "#contents_"+options.lang+"_pane .contents-container";
            $(context).append(data);
            sortableContent(context);
            //var card = new KTCard($element.id, {});
            Admin.load(context);
            $("html,body").animate({scrollTop: $("#"+$element[0].id).offset().top}, 'slow');
            KTApp.initCards();
        };

        el.on("click", function(e){
            e.preventDefault();
            addContent($(this));
        });
    });

})();


/* Admin Plugins: Form Submit
------------------------------------------------------------ */

(function() {

    Admin.plug('form-submit', function(button, options) {
        button.on('click', function(e) {
            e.preventDefault();

            var form = $(options.selector);
            if(!form.length){
                return;
            }

            var onSaveInput = $('[data-admin-form-submit-onsave]', form);
            if(!onSaveInput.length){
                onSaveInput = $('<input data-admin-form-submit-onsave name="admin-form-submit-onsave" type="hidden" />').appendTo(form);
            }
            onSaveInput.val(options.onsave);

            $(options.selector).submit();
        });
    });

})();

/* Admin Plugins: Inputmask
------------------------------------------------------------ */

(function() {

    Admin.plug('inputmask', function(input, settings){
        var options = jQuery.extend({
            autoUnmask: false
        }, settings.options);

        input.inputmask(settings.mask, options);

        /*
        input.inputmask("99-99-9999", {
            "placeholder": "dd-mm-yyyy",
            autoUnmask: false
        });

        input.closest(".date").datetimepicker(options);
        */
    });

})();

/* Admin Plugins: NumbersOnly
------------------------------------------------------------ */

(function() {

    Admin.plug('numbersonly', function(input, settings){
        input.keyup(function () {
            var initial_value = this.value;
            this.value = initial_value.replace(/[^\d]/g, '');
        });

    });
})();

/* Admin Plugins: Touchspin
------------------------------------------------------------ */

(function() {

    Admin.plug('touchspin', function(input, settings){
        const options = jQuery.extend({
            buttondown_class: 'btn btn-secondary',
            buttonup_class: 'btn btn-secondary'
        }, settings);

        input.TouchSpin(options);

    });
})();

/* Admin Plugins: Media Library
------------------------------------------------------------ */

(function() {

    var Action = {
        'show-directory': function(options){
            var id;
            if(options && typeof options.id !== 'undefined'){
                id = options.id;
            }
            if(!id){
                id = Tool.getCurrentDirectory().id || false;
            }
            if(!id){
                return;
            }

            Admin.ajax({
                url: window.adminBaseUrl+'/medialibrary/directory/' + id + '/content',
                method: 'GET',
                dataType: 'html',
                success: function(result){
                    $('[data-admin-media-library-directory]').replaceWith(result);
                    Admin.load('[data-admin-media-library-directory]');
                }
            });
        },
        'create-directory': function(options) {
            let dialog = bootbox.dialog({
                title: __('MediaLibraryModule.add_directory'),
                message: '<input data-description type="text" name="description" class="form-control" placeholder="' + __('MediaLibraryModule.directory_name') + '..." />',
                buttons: {
                    confirm: {label: __('label.save'), className: 'btn-primary', callback: function() {
                            Admin.ajax({
                                adminCallbacksContext: dialog,
                                url: window.adminBaseUrl+'/medialibrary/directory/create',
                                method: 'POST',
                                data: {
                                    parentId: Tool.getCurrentDirectory().id || false,
                                    description: $('[data-description]', this).val()
                                }
                            });
                            return false;
                        }},
                    cancel: {label: __('label.cancel'), className: 'btn-light'}
                }
            });
        },
        'rename-directory': function(options) {
            let dialog = bootbox.dialog({
                title: __('MediaLibraryModule.rename'),
                message: '<input data-description type="text" name="description" class="form-control" placeholder="' + __('MediaLibraryModule.directory_name') + '..." value="' + options.description + '" />',
                buttons: {
                    confirm: {label: __('label.save'), className: 'btn-primary', callback: function() {
                            Admin.ajax({
                                adminCallbacksContext: dialog,
                                url: window.adminBaseUrl+'/medialibrary/directory/' + options.id + '/rename',
                                method: 'POST',
                                data: {
                                    description: $('[data-description]', this).val()
                                }
                            });
                            return false;
                        }},
                    cancel: {label: __('label.cancel'), className: 'btn-light'}
                }
            });
        },
        'move-directory': function(options) {
            Tool.move('directory', options.id);
        },
        'destroy-directory': function(options) {
            let dialog = bootbox.confirm({
                message: __('MediaLibraryModule.confirm_directory_destroy') + ' <strong>' + options.description + '</strong>?',
                buttons: {
                    confirm: {label: __("label.yes"), className: 'btn-danger'},
                    cancel: {label: __("label.no"), className: 'btn-light'}
                },
                callback: function (response) {
                    if (response){
                        Admin.ajax({
                            adminCallbacksContext: dialog,
                            url: window.adminBaseUrl+'/medialibrary/directory/' + options.id,
                            method: 'DELETE'
                        });
                        return false;
                    }
                }
            });
        },
        'show-file-details': function(options) {
            Admin.ajax({
                url: window.adminBaseUrl+'/medialibrary/file/' + options.id + '/details',
                method: 'GET'
            });
        },
        'rename-file': function(options) {
            let dialog = bootbox.dialog({
                title: __('MediaLibraryModule.rename'),
                message: '<input data-description type="text" name="description" class="form-control" placeholder="' + __('MediaLibraryModule.file_name') + '..." value="' + options.description + '" />',
                buttons: {
                    confirm: {label: __('label.save'), className: 'btn-primary', callback: function() {
                            Admin.ajax({
                                adminCallbacksContext: dialog,
                                url: window.adminBaseUrl+'/medialibrary/file/' + options.id + '/rename',
                                method: 'POST',
                                data: {
                                    description: $('[data-description]', this).val()
                                }
                            });
                            return false;
                        }},
                    cancel: {label: __('label.cancel'), className: 'btn-light'}
                }
            });
        },
        'move-file': function(options) {
            Tool.move('file', options.id);
        },
        'rotate-file': function(options) {
            Admin.ajax({
                url: window.adminBaseUrl+'/medialibrary/file/' + options.id + '/rotate',
                method: 'POST',
                data: options.data || {}
            });
        },
        'destroy-file': function(options) {
            let dialog = bootbox.confirm({
                message: __('MediaLibraryModule.confirm_file_destroy') + (options.description ? ' <strong>' + options.description + '</strong>' : '')  + '?',
                buttons: {
                    confirm: {label: __("label.yes"), className: 'btn-danger'},
                    cancel: {label: __("label.no"), className: 'btn-light'}
                },
                callback: function (response) {
                    if (response){
                        Admin.ajax({
                            adminCallbacksContext: dialog,
                            url: window.adminBaseUrl+'/medialibrary/file/' + options.id,
                            method: 'DELETE',
                            data: options.data || {}
                        });
                        return false;
                    }
                }
            });
        },
        'order-file': function(ids) {
            Admin.ajax({
                url: window.adminBaseUrl+'/medialibrary/file/order',
                method: 'POST',
                data: {
                    ids: ids
                }
            });
        },
    };

    var Tool =  {
        getCurrentDirectory: function() {
            return $('[data-admin-media-library-directory]').data('admin-media-library-directory');
        },
        move:function(type, id){
            Admin.ajax({
                url: window.adminBaseUrl+'/medialibrary/directory/move-dialog',
                data: {
                    type: type,
                    id: id
                },
                method: 'POST',
                success: function(r) {
                    if(r.s !== true){
                        return;
                    }

                    var dialog = bootbox.dialog({
                        title: r.title,
                        message: r.content,
                        buttons: {
                            confirm: {label: __('label.save'), className: 'btn-primary', callback: function() {
                                    Admin.ajax({
                                        adminCallbacksContext: dialog,
                                        url: r.action,
                                        method: 'POST',
                                        data: {
                                            directory_id: $('[name="directory_id"]', this).val()
                                        }
                                    });
                                    return false;
                                }},
                            cancel: {label: __('label.cancel'), className: 'btn-light'}
                        }
                    });
                }
            });
        },
        attachUppy: function(element, options) {
            let uppyLocale = Uppy.locales.en_US;
            const customLocale = eval('Uppy.locales.'+window.currentLocaleCode);
            if (customLocale){
                uppyLocale = customLocale;
            }

            var uppyOptions = {
                locale: uppyLocale,
                autoProceed: true,
                allowMultipleUploads: true,
                restrictions: {
                    maxFileSize: 100000000, // 1mb
                    minNumberOfFiles: 1,
                    maxNumberOfFiles: 20
                },
                meta: {
                    data: JSON.stringify(options || {})
                }
            };

            if(options){
                if(options.maxFileSize){
                    uppyOptions.restrictions.maxFileSize = options.maxFileSize;
                }

                if(options.maxNumberOfFiles){
                    uppyOptions.restrictions.maxNumberOfFiles = options.maxNumberOfFiles;
                    if(options.maxNumberOfFiles < 2) {
                        uppyOptions.allowMultipleUploads = false;
                    }
                }

                if(options.allowedFileTypes){
                    let exts = [];
                    for(let z in options.allowedFileTypes){
                        if (!options.allowedFileTypes[z].startsWith('.')) {
                            exts[z] = '.' + options.allowedFileTypes[z];
                        }
                    }
                    uppyOptions.restrictions.allowedFileTypes = exts;
                }

                if(options.allowedFileTypesField){
                    let exts = $('[name="'+options.allowedFileTypesField+'"]').val().split(',');
                    for(let z in exts){
                        if (!exts[z].startsWith('.')) {
                            exts[z] = '.' + exts[z];
                        }
                    }

                    uppyOptions.restrictions.allowedFileTypes = exts;
                }
            }
            //console.log(uppyOptions);
            var uppy = new Uppy.Core(uppyOptions);

            uppy.use(Uppy.Dashboard, {
                id: 'Dashboard',
                trigger: $(element).get(0),
                showLinkToFileUploadResult: false,
                closeAfterFinish: true,
                proudlyDisplayPoweredByUppy: false
            });

            uppy.use(Uppy.XHRUpload, {
                endpoint: window.adminBaseUrl+'/medialibrary/file/upload',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                formData: true,
                fieldName: 'file'
            });

            uppy.on('complete', (result) => {
                uppy.reset();

                Admin.trigger('mediaLibrary.refreshInput', options);

                if(typeof result.successful[0].response.body.adminCallbacks !== 'undefined'){
                    Admin.trigger(result.successful[0].response.body.adminCallbacks);
                } else {
                    bootbox.dialog({
                        message: __('message.ajax_error')
                    });
                }
            });
        },
        attachSortable: function(context) {
            var containers = $('.media-library-items', context).get();
            if (containers.length === 0) {
                return false;
            }

            var sortable = new Sortable.default(containers, {
                draggable: '.media-library-item',
                handle: '.media-library-item [data-action="order"]',
                mirror: {
                    appendTo: 'body',
                    constrainDimensions: true
                }
            });

            sortable.on('drag:stop', (event) => {
                setTimeout(function() {
                    var ids = [];
                    $('.media-library-item', context).each(function() {
                        ids.push($(this).attr('data-id'));
                    });

                    Action['order-file'](ids);
                }, 200);
            });
        }
    };

    Admin.plug('media-library', function(context, options){
        if(typeof options.action == 'undefined'){
            return;
        }

        // Upload File
        if(options.action == 'upload-file'){
            Tool.attachUppy(context, {
                directoryId: Tool.getCurrentDirectory().id
            });
        }

        // Action
        if(typeof Action[options.action] !== 'undefined'){
            $(context).on('click', function(e) {
                e.preventDefault();
                Action[options.action](options);
            });
        }
    });

    Admin.plug('media-library-input', function(context, options){

        // Action > Upload
        $('[data-action="upload"]', context).each(function(i, item) {
            Tool.attachUppy(this, options);
        });

        // Action > Import
        $('[data-action="import"]', context).on('click', function() {
            // @todok da integrare
        });

        // Action > Edit
        $('[data-action="edit"]', context).on('click', function() {
            // @todok da integrare
            Admin.ajax({
                url: window.adminBaseUrl+'/medialibrary/file/'+$(this).data('id')+'/edit-image',
                method: 'POST',
                data: {'media_collection':$(this).data('collection')}
            })
        });

        // Action > Rotate
        $('[data-action="rotate"]', context).on('click', function() {
            Action['rotate-file']({
                id: $(this).attr('data-id'),
                data: options
            });
        });

        // Action > Destroy
        $('[data-action="destroy"]', context).on('click', function() {
            Action['destroy-file']({
                id: $(this).attr('data-id'),
                data: options
            });
        });

        // Sortable
        Tool.attachSortable(context);

    });

    Admin.on('mediaLibrary.showDirectory', function(options) {
        Action['show-directory'](options);
    });

    Admin.on('mediaLibrary.refreshInput', function(options) {
        Admin.ajax({
            url: window.adminBaseUrl+'/medialibrary/file/refresh',
            method: 'POST',
            data: options
        });
    });

    Admin.on('mediaLibrary.refreshInput.apply', function(options) {
        //console.log('apply', options);
        $('[data-admin-media-library-input]').each(function() {
            var inputOptions = $(this).data('admin-media-library-input');
            if(options.model == inputOptions.model && options.model_id == inputOptions.model_id && options.name == inputOptions.name){
                var parent = $(this).parent();
                $(this).replaceWith(options.content);
                Admin.load(parent);
            }
        });
    });

})();


/* Admin Plugins: Multi Select
------------------------------------------------------------ */

(function() {

    Admin.plug('multiselect', function(input, options){
        input.multiSelect();
    });

})();

/* Admin Plugins: Toggle Boolean Field
------------------------------------------------------------ */

(function() {

    Admin.plug('toggle-data-table-boolean-field', function(input, options){
        input.on("click",function(e){
            e.preventDefault();
            //console.log(options);
            var url = input.attr("href");

            Admin.ajax({
                url: url,
                data: options,
                method: 'POST',
                success: function(result){
                    if (result.status){
                        input.html(result.html);
                    }
                }
            });
        });
    });

})();

/* Admin Plugins: Password reveal
------------------------------------------------------------ */

(function() {

    Admin.plug('password-reveal', function(element, options){
        element.on("click",function(e){
            e.preventDefault();
            const icon_show = element.find("[data-password-show]");
            const icon_hide = element.find("[data-password-hide]");
            const input = element.closest(".form-group").find("input");
            if (input.is(":password")){
                input.attr("type","text");
                icon_hide.removeClass("d-none");
                icon_show.addClass("d-none");
            }else{
                input.attr("type","password");
                icon_show.removeClass("d-none");
                icon_hide.addClass("d-none");
            }
        });
    });

})();

/* Admin Plugins: Tagify
------------------------------------------------------------ */

(function() {

    Admin.plug('tagify', function(input, options){
        //input.get(0)
        var tagify = new Tagify(input.get(0), options);
        /*
        tagify.on('add', onAddTag)
            .on('remove', onRemoveTag)
            .on('input', onInput)
            .on('edit', onTagEdit)
            .on('invalid', onInvalidTag)
            .on('click', onTagClick)
            .on('dropdown:show', onDropdownShow)
            .on('dropdown:hide', onDropdownHide)
            */
    });

})();


/* Admin Plugins: Text Editor Summernote
------------------------------------------------------------ */

(function() {

    Admin.plug('text-editor-summernote', function(input, options){
        options = jQuery.extend({
            height: 150,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['style','bold', 'italic', 'underline', 'clear']],
                //['fontsize', ['fontsize']],
                ['para', ['ul', 'ol', 'paragraph']],
                //['insert', ['link', 'picture', 'video']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            styleTags: [
                'p',
               //{title: 'Citazione', tag: 'blockquote', className: 'editor-blockquote', value: 'blockquote'},
                'h1', 'h2', 'h3'
            ],
            callbacks: {
                onPaste: function (e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                    e.preventDefault();
                    document.execCommand('insertText', false, bufferText);
                }
            }
        }, options);

        input.summernote(options);
    });

})();


/* Admin Plugins: Image Crop Field
------------------------------------------------------------ */

(function() {


    Admin.plug('image-crop-field', function(input, options) {
        const $elements = $(input);

        if (!$elements.length) {
            return false;
        }
        const imageCropFieldStd = function(context){
            const $t = $(context);
            // IMAGE DATA
            const data = {};

            // ELEMENTS
            const el = {
                mod: '[data-ci="mod"]', // Azione: modifica
                del: '[data-ci="del"]', // Azione: elimina
                open: '[data-ci="open"]', // Azione: carica
                img: '[data-ci="img"]', // Elemento: ontenitore thumb
                input: '[data-ci="input"]', // Elemento: Input
                file: '[data-ci="file"]',    // Elemento: Id thumb sa salvare
                name: '[data-ci="name"]'    // Elemento: Id thumb sa salvare
            };
            // OPTIONS
            let options = {
                id: $t.data('id'),
                model_type: $t.data('model-type'),
                model_id: $t.closest('form').find("input:hidden[name='"+$t.data('model-id-field')+"']").val(),
                media_collection: $t.data('model-media-collection'),
                imageFieldType: $t.data('image-field-type'),
                width: $t.data('width'),
                height: $t.data('height'),
                exts: $t.data('extensions').split(','),
                postaction: $t.data('post-action'),
                rotation: 0,
                manipulation_type: $t.data("manipulation-type"),
                crop: {
                    active: ($t.data("crop") == "Y") ? true : false,
                    maxWidth: $t.data('width'),
                    maxHeight: $t.data('height')
                }
            };

            if ($t.data('width-field')){
                options.width = $("[name='"+$t.data('width-field')+"']").val();
            }
            if ($t.data('height-field')){
                options.height = $("[name='"+$t.data('height-field')+"']").val();
            }
            if ($t.data('extensions-field')){
                options.exts = $("[name='"+$t.data('extensions-field')+"']").val().split(',');
            }
            const fns = {

                /* INIZIALIZZAZIONE
                -------------------------------------------------- */
                init: function () {
                    $t.off('click', el.mod, this.events.onMod);
                    $t.on('click', el.mod, this.events.onMod);
                    $t.off('change', el.input, this.events.onChange);
                    $t.on('change', el.input, this.events.onChange);
                    $t.off('click', el.del, this.events.onDel);
                    $t.on('click', el.del, this.events.onDel);
                    $t.off('click', el.open, this.events.open);
                    $t.on('click', el.open, this.events.open);
                },
                /* EVENTI
                 -------------------------------------------------- */
                events: {
                    // Explorer per il caricamento dell'immagine
                    open: function (e) {
                        e.preventDefault();
                        $(el.input, $t).click();
                    },

                    // Lettura dell'immagine
                    onChange: function (e) {
                        e.preventDefault();
                        fns.tool.read($(this)[0].files[0]);
                    },
                    onMod: function (e) {
                        e.preventDefault();
                        fns.crop.init('edit');
                    },
                    // Eliminazione dell'immagine caricata
                    onDel: function (e) {
                        e.preventDefault();
                        fns.tool.reset();
                    }
                },
                /* UTILITY
                -------------------------------------------------- */
                tool: {
                    // Lettura dell'immagine
                    read: function (file) {
                        KTApp.blockPage({
                            overlayColor: '#000000',
                            state: 'primary',
                            message: __('message.caricamento')
                        });

                        // Verifica dell'estensione
                        if (!fns.tool.checkExt(file)) {
                            fns.tool.reset();
                            KTApp.unblockPage();
                            return false;
                        }

                        fns.tool.checkOrientation(file, function (type) {
                            var lastW = options.width;
                            var lastH = options.height;

                            switch (type) {
                                // ##
                                // #
                                // #
                                case 1:

                                // ##
                                //  #
                                //  #
                                case 2:
                                    options.rotation = 0;
                                    break;

                                //  #
                                //  #
                                // ##
                                case 3:

                                // #
                                // #
                                // ##
                                case 4:
                                    options.rotation = 180;
                                    break;

                                // ###
                                // #
                                case 5:

                                // #
                                // ###
                                case 6:
                                    options.width = lastH;
                                    options.height = lastW;
                                    options.rotation = 90;
                                    break;

                                //   #
                                // ###
                                case 7:

                                // ###
                                //   #
                                case 8:
                                    options.width = lastH;
                                    options.height = lastW;
                                    options.rotation = 270;
                                    break;
                            }

                            fns.tool.readImage(file);
                        });
                    },

                    readImage: function (file) {

                        const fext = file.name.substr((~-file.name.lastIndexOf(".") >>> 0) + 2).toLowerCase();
                        if (fext == 'gif'){
                            const reader = new FileReader();
                            reader.onloadend = function () {
                                data.img = {
                                    name: file.name,
                                    src: reader.result
                                };
                                fns.tool.elaborate();
                            };
                            reader.readAsDataURL(file);
                        }else {
                            const reader = new FileReader();
                            reader.onloadend = function () {
                                const image = new Image();
                                image.onload = function () {

                                    // Verifica delle dimensioni
                                    if (!fns.tool.checkSizes(this)) {
                                        fns.tool.reset();
                                        KTApp.unblockPage();
                                        return;
                                    }

                                    // Salvataggio dei dati necessari all'elaborazione
                                    data.img = {
                                        name: file.name,
                                        src: this.src
                                    };

                                    // STOP LOADING
                                    KTApp.unblockPage();

                                    // Inizializzazione del crop
                                    if (options.crop.active === true && 0) {
                                        fns.crop.init(this, file);
                                    }

                                    // Elaborazione e salvataggio
                                    else {
                                        fns.tool.elaborate();
                                    }
                                };
                                image.src = reader.result;
                            };
                            reader.readAsDataURL(file);
                        }
                    },

                    // Verifica dell'estensione
                    checkExt: function (file) {
                        if (file) {
                            const fext = file.name.substr((~-file.name.lastIndexOf(".") >>> 0) + 2).toLowerCase();
                            if ($.inArray(fext, options.exts) > -1) {
                                return true;
                            }
                            bootbox.dialog({
                                message: __('message.extension_not_allowed')
                            });
                        }
                        return false;
                    },

                    // Verifica dell'orientamento
                    checkOrientation: function (file, callback) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            const view = new DataView(e.target.result);

                            // Not jpeg
                            if (view.getUint16(0, false) != 0xFFD8) {
                                return callback(-2);
                            }

                            let length = view.byteLength, offset = 2;
                            while (offset < length) {
                                const marker = view.getUint16(offset, false);
                                offset += 2;

                                if (marker == 0xFFE1) {
                                    if (view.getUint32(offset += 2, false) != 0x45786966) {
                                        callback(-1);
                                    }

                                    const little = view.getUint16(offset += 6, false) == 0x4949;
                                    offset += view.getUint32(offset + 4, little);

                                    const tags = view.getUint16(offset, little);
                                    offset += 2;

                                    for (let i = 0; i < tags; i++) {
                                        if (view.getUint16(offset + (i * 12), little) == 0x0112) {
                                            return callback(view.getUint16(offset + (i * 12) + 8, little));
                                        }
                                    }
                                } else if ((marker & 0xFF00) != 0xFF00) {
                                    break;
                                } else {
                                    offset += view.getUint16(offset, false);
                                }
                            }

                            return callback(-1);
                        };
                        reader.readAsArrayBuffer(file.slice(0, 64 * 1024));
                    },

                    // Verifica delle dimensioni
                    checkSizes: function (img) {
                        return true;
                    },

                    // Elaborazione
                    elaborate: function (postDataIn) {
                        KTApp.blockPage({
                            overlayColor: '#000000',
                            state: 'primary',
                            message: __('message.caricamento')
                        });

                        var postData = $.extend({
                            options: options,
                            img: data.img,
                            rotation: options.rotation
                        }, postDataIn || {});

                        $.ajax({
                            type: 'POST',
                            url: window.adminBaseUrl+'/services/imageField',
                            data: postData,
                            dataType: 'json',
                            success: function (response) {
                                if (response.filename) {
                                    fns.tool.save(response);
                                }else{
                                    if (typeof response.adminCallbacks !== 'undefined') {
                                        Admin.trigger(response.adminCallbacks, options.adminCallbacksArgs || {}, options.adminCallbacksContext || false);
                                    }
                                }
                            },
                            complete: function () {
                                KTApp.unblockPage();
                            }
                        });
                    },

                    // Salvataggio e visualizzazione
                    save: function (result) {
                        $(el.img, $t).html('<img src="' + result.thumb_public_name + '" alt="' + result.thumb_name + '" />');
                        $(el.file, $t).val(result.public_name);
                        $(el.name, $t).val(result.filename);
                        $('.ci-img', $t).show(0);
                        $('.ci-input', $t).hide(0);
                    },

                    // Reset
                    reset: function () {
                        // IMG
                        $('.ci-img', $t).hide();
                        $(el.mod, $t).remove();
                        $(el.img, $t).empty();

                        // FILE
                        $(el.file, $t).val('');
                        $(el.name, $t).val('');
                        const $input = $(el.input, $t);
                        $input.val('');
                        $input.replaceWith($input.clone());
                        $('.ci-input', $t).show();

                        // STOP LOADING
                        KTApp.unblockPage();
                    }
                },

                /* CROP
                -------------------------------------------------- */
                crop: {
                    el: false,

                    init: function (img, file) {
                        if (file){
                            bootbox.dialog({
                                message: this.create.content(img, file),
                                title: __('message.crop_uploaded_image'),
                                size: 'large',
                                buttons: {
                                    success: {
                                        label: __('label.button_salva'),
                                        className: "btn-success",
                                        callback: function () {
                                            fns.crop.save();
                                        }
                                    },
                                    undo: {
                                        label: __('label.button_reset'),
                                        className: "btn-default",
                                        callback: function () {
                                            fns.tool.reset();
                                        }
                                    }
                                }
                            });
                        }else {
                            Admin.ajax({
                                url: window.adminBaseUrl + '/medialibrary/file/' + options.id + '/edit-image',
                                method: 'POST',
                                data: {
                                    'media_collection': options.media_collection,
                                    'imageFieldType': options.imageFieldType
                                },
                            })
                        }
                        /*

                         */
                    },
                    create: {
                        content: function (img, file) {
                            // Image
                            const $img = this.img(img, file);
                            const $imgWrapper = $('<div />');
                            $imgWrapper.attr('data-ci-crop-img');
                            $imgWrapper.addClass('ci-crop-img');
                            $imgWrapper.css('width', data.img.wrapperWidth);
                            $imgWrapper.css('height', data.img.wrapperHeight);
                            $imgWrapper.append($img);

                            // Controls
                            const $controls = this.controls();
                            const $controlsWrapper = $('<div />');
                            $controlsWrapper.attr('data-ci-crop-controls');
                            $controlsWrapper.addClass('ci-crop-controls');
                            $controlsWrapper.append($controls);

                            // Content
                            const $content = $('<div />');
                            $content.attr('data-ci-crop');
                            $content.addClass('campo-immagine-crop');
                            $content.append($imgWrapper);
                            $content.append($controlsWrapper);

                            // Cropper
                            this.cropper($content, $img);

                            return $content;
                        },

                        img: function (img, file) {
                            //console.log(options,data.img);
                            // Wrapper sizes
                            let wrapperWidth = options.width;
                            let wrapperHeight = options.height;

                            if (wrapperWidth > options.crop.maxWidth) {
                                wrapperWidth = options.crop.maxWidth;
                                wrapperHeight = options.crop.maxWidth * options.height / options.width;
                            }
                            if (wrapperHeight > options.crop.maxHeight) {
                                wrapperWidth = options.crop.maxHeight * options.width / options.height;
                                wrapperHeight = options.crop.maxHeight;
                            }

                            // Create image
                            const $img = $('<img />');
                            $img.attr('src', img.src);

                            // Store image data
                            data.img.wrapperWidth = wrapperWidth;
                            data.img.wrapperHeight = wrapperHeight;

                            return $img;
                        },

                        controls: function () {
                            let controls_html = '';
                            controls_html += "<div class='guillotine-controls'>";
                            controls_html += "<a href='#' data-ci-crop-control='rotateLeft' class='btn rotate_left bg-info' title='Ruota a sinistra'><i class='fa fa-rotate-left'></i></a>";
                            controls_html += "<a href='#' data-ci-crop-control='rotateRight' class='btn rotate_right bg-info' title='Ruota a destra'><i class='fa fa-rotate-right'></i></a>";
                            controls_html += "<a href='#' data-ci-crop-control='zoomIn' class='btn zoom_in bg-info' title='Zoom in'><i class='fa fa-search-plus'></i></a>";
                            controls_html += "<a href='#' data-ci-crop-control='zoomOut' class='btn zoom_out bg-info' title='Zoom out'><i class='fa fa-search-minus'></i></a>";
                            controls_html += "<a href='#' data-ci-crop-control='fit' class='btn fit bg-info' title='Fit image'><i class='fa fa-arrows-alt'></i></a>";
                            controls_html += "</div>";
                            return $(controls_html);
                        },

                        cropper: function ($content, $img) {
                            fns.crop.el = $img;
                            /*
                            // Cropper
                            $img.guillotine({
                                eventOnChange: 'cropchange',
                                width: data.img.wrapperWidth,
                                height: data.img.wrapperHeight
                            });

                            // Rotazione
                            if (options.rotation > 0) {
                                var angle = options.rotation / 90;
                                for (var i = 0; i < angle; i++) {
                                    $img.guillotine('rotateRight');
                                }
                                options.rotation = 0;
                            }

                            // Fit
                            $img.guillotine('fit');

                            // Cropper controls
                            $('[data-ci-crop-control]', $content).on('click', function () {
                                var control = $(this).data('ci-crop-control');
                                $img.guillotine(control);
                            });
                             */
                        }
                    },

                    save: function () {
                        var cropData = fns.crop.el.guillotine('getData');
                        fns.tool.elaborate({
                            rotation: cropData.angle || 0,
                            crop: {
                                scale: cropData.scale,
                                x: cropData.x,
                                y: cropData.y,
                                w: cropData.w,
                                h: cropData.h
                            }
                        });
                    }
                }
            };

            // INIT
            fns.init();
        }

        $elements.each(function () {
            if (($(this).data('admin-image-crop-field-std') || false) === false) {
                $(this).data('admin-image-crop-field-std', new imageCropFieldStd(this));
            }
        });

    });

})();

function callAction(obj){

    if (submitting) {
        return;
    }
    submitting = true;

    var options = $(obj).data("call-action");

    var request = {
        method: options.method || 'POST',
        url: options.action,
        data: options.data || {},
        complete: function () {
            setTimeout(function () {
                submitting = false;
            }, submittin_delay);
        }
    };
    Admin.ajax(request);
}

function importSelected(actionUrl, ids){
    Admin.ajax({
        url: actionUrl,
        data: {id: ids},
        method: 'POST',
        success: function(data){
            if (typeof window.onDataCrudImportCallback === 'function'){
                window.onDataCrudImportCallback(data.response);
            }
        }
    });
}

function createAndSelect(module, query_string){
    bootbox.hideAll();
    Admin.ajax({
        url: window.adminBaseUrl+'/services/getModuleUrl',
        data: {"module": module, "routeName":"create", "queryString":query_string},
        method: 'POST',
        success: function(data){
            const request = {
                method: 'POST',
                url: data.url,
                complete: function () {
                }
            };
            Admin.ajax(request);

        }
    });
}

function ajaxCall(input, options){

    if (submitting) {
        return;
    }
    submitting = true;

    const request = {
        method: options.method || 'POST',
        url: options.action,
        data: options.data || {},
        complete: function () {
            setTimeout(function () {
                submitting = false;
            }, submittin_delay);
        }
    };
    Admin.ajax(request);


}

function adminAjaxCall(obj){

    const input = $(obj);
    const options = JSON.parse(input.attr('data-ajax-call'));
    //console.log(input, options);
    ajaxCall(input, options);
}

function cropper(index){

    $("#conversion-info-"+index).fadeOut(function(){
        $("#conversion-crop-"+index).fadeIn(function(){
            const image = document.getElementById('image-to-crop-'+index);
            const $container = $("#conversion-crop-"+index);
            /*
            const options = {
                scalable: true,
                zoomable: true,
                movable: false,
                responsive: true,
            }
            */
            const options = {
                dragMode: 'move',
                viewMode: 1,
                aspectRatio: $(image).data('crop-width') / $(image).data('crop-height'),
                data: {
                    width: $(image).data('crop-width'),
                    height: $(image).data('crop-height')
                },
                minContainerWidth: $(image).data('crop-width'),
                minContainerHeight: $(image).data('crop-height'),
                minCropBoxWidth: $(image).data('crop-width'),
                minCropBoxHeight: $(image).data('crop-height'),
                maxCropBoxWidth: $(image).data('crop-width'),
                maxCropBoxHeight: $(image).data('crop-height'),

                autoCropArea: 1,
                restore: true,
                guides: true,
                center: true,
                highlight: true,
                cropBoxMovable: false,
                cropBoxResizable: false,
                toggleDragModeOnDblclick: false,
                zoomOnWheel: false,
                crop: function(event) {
                    $container.find('.dataX').val(Math.round(event.detail.x));
                    $container.find('.dataY').val(Math.round(event.detail.y));
                    $container.find('.dataWidth').val(Math.round(event.detail.width));
                    $container.find('.dataHeight').val(Math.round(event.detail.height));
                    $container.find('.dataRotate').val(Math.round(event.detail.rotate));
                    //$container.find('.dataZoom').val(event.detail.ratio);
                },
                zoom: function(event) {
                    // Questo darà il valore corretto dello zoom
                    $container.find('.dataZoom').val(event.detail.ratio);
                },
                ready: function () {

                    // Centra il riquadro di ritaglio dopo l'inizializzazione
                    const containerData = cropper.getContainerData();
                    const cropBoxData = cropper.getCropBoxData();

                    // Calcola le coordinate per centrare il riquadro
                    const left = (containerData.width - cropBoxData.width) / 2;
                    const top = 0;

                    // Applica le coordinate centrate
                    cropper.setCropBoxData({
                        left: left,
                        top: top
                    });


                    cropper['zoom'](0.1);
                    cropper['zoom'](-0.1);
                }



            };

            let cropper = new Cropper(image, options);

            // Imposta il valore iniziale del campo .dataZoom
            const initialData = cropper.getData();

            //console.log('Valore iniziale:', initialData);


            //console.log('cropper', cropper, options);

            const buttons = document.getElementById('cropper-buttons');
            const methods = buttons.querySelectorAll('[data-method]');

            methods.forEach(function(button) {
                button.addEventListener('click', function(e) {
                    const method = button.getAttribute('data-method');
                    let option = button.getAttribute('data-option');
                    const option2 = button.getAttribute('data-second-option');

                    try {
                        option = JSON.parse(option);
                    }
                    catch (e) {
                    }

                    if (method == 'save') {
                        // Ottieni i dati del crop dall'immagine ridimensionata
                        const croppedData = cropper.getData(); // Coordinate e dimensioni (dell'immagine visualizzata)

                        const index = option;

                        const x = $("[name='dataX_"+index+"']").val();
                        const y = $("[name='dataY_"+index+"']").val();
                        const rotate = $("[name='dataRotate_"+index+"']").val();
                        const media_id = $("[name='media_id_"+index+"']").val();
                        const conversion_name = $("[name='conversion_name_"+index+"']").val();
                        const conversion_width = $("[name='conversion_width_"+index+"']").val();
                        const conversion_height = $("[name='conversion_height_"+index+"']").val();
                        const zoom = $("[name='zoom_"+index+"']").val();
                        const multiplier = $("[name='multiplier_"+index+"']").val();

                        const postData = {
                            "media_id":media_id,
                            "conversion_name":conversion_name,
                            "x":x,
                            "y":y,
                            "rotate":rotate,
                            "width":conversion_width,
                            "height":conversion_height,
                            "zoom":zoom,
                            "multiplier":multiplier,
                            "cropData": croppedData
                        };

                        Admin.ajax({
                            url: window.adminBaseUrl+'/medialibrary/file/'+media_id+'/edit-image',
                            method: 'patch',
                            data: postData,
                            success: function(result){
                                cancelCropper(index);
                                $("#thumb-viewer-"+index).css('background-image',"url('"+result.thumb+"')");
                            }
                        });

                        return true;
                    }

                    let result;
                    if (!option2) {
                        result = cropper[method](option, option2);
                    }
                    else if (option) {
                        result = cropper[method](option);
                    }
                    else {
                        result = cropper[method]();
                    }
                });
            });
        })
    })
}

function cancelCropper(index){
    $("#conversion-crop-"+index).fadeOut(function(){
        $("#conversion-info-"+index).fadeIn(function(){
        });
    })
}

function saveCrop(index){
    const x = $("[name='dataX_"+index+"']").val();
    const y = $("[name='dataY_"+index+"']").val();
    const rotate = $("[name='dataRotate_"+index+"']").val();
    const media_id = $("[name='media_id_"+index+"']").val();
    const conversion_name = $("[name='conversion_name_"+index+"']").val();
    const conversion_width = $("[name='conversion_width_"+index+"']").val();
    const conversion_height = $("[name='conversion_height_"+index+"']").val();
    const zoom = $("[name='zoom_"+index+"']").val();
    const multiplier = $("[name='multiplier_"+index+"']").val();

    const postData = {
        "media_id":media_id,
        "conversion_name":conversion_name,
        "x":x,
        "y":y,
        "rotate":rotate,
        "width":conversion_width,
        "height":conversion_height,
        "zoom":zoom,
        "multiplier":multiplier
    };

    //console.log(postData);

    Admin.ajax({
        url: window.adminBaseUrl+'/medialibrary/file/'+media_id+'/edit-image',
        method: 'patch',
        data: postData,
        success: function(result){
            cancelCropper(index);
            $("#thumb-viewer-"+index).css('background-image',"url('"+result.thumb+"')");
        }
    });
}

function closeEditImage(index){
    const imageFieldType = $("[name='image_field_type_"+index+"']").val();


    if (imageFieldType == 'media-library') {
        $(".media-library-item-wrapper").each(function (i) {
            const backgroundImage = $(this).css('background-image');
            const urlImage = backgroundImage.match(/url\(['"]?(.*?)['"]?\)/)[1];
            const urlComponents = new URL(urlImage);
            urlComponents.searchParams.set("v", new Date().getTime());
            $(this).css('background-image', "url('" + urlComponents.href + "')");
        });
        bootbox.hideAll();
    }else{
        const fieldId = $("[name='media_id_"+index+"']").val();
        const $field = $("[data-admin-image-crop-field][data-id='"+fieldId+"']").find('.image-field-img');
        const image = $field.attr('src');


        if (image){
            try {
                // Crea l'URL completo usando window.location.origin
                const fullUrl = new URL(window.location.origin + image);
                // Aggiorna il parametro 'v'
                fullUrl.searchParams.set("v", new Date().getTime());
                // Ricostruisci l'URL relativo
                const newRelativeUrl = fullUrl.pathname + fullUrl.search;

                $field.attr('src', newRelativeUrl);
            } catch (error) {
                console.error("Non è stato possibile aggiornare l'immagine:", error);
            }

        }

        // Eventualmente chiudi la modale
        $(".edit-image-modal").modal('hide');

    }
}

function countryChange(country, prefix, onload){
    const $province = $("#"+prefix+"__provincia_id_field");
    const $city_input = $("#"+prefix+"__comune_field");
    const $city_select = $("#"+prefix+"__comune_select_field");
    if (country == window.adminConstants.id_country_italia){
        $province.closest('.form-group').show();
        $city_input.attr('name',prefix+"__comune_input").closest('.form-group').parent().hide();
        $city_select.attr('name',prefix+"__comune").closest('.form-group').parent().show();
    }else{
        $city_select.attr('name',prefix+"__comune_select").closest('.form-group').parent().hide();
        $city_input.attr('name',prefix+"__comune").closest('.form-group').parent().show();
        $province.closest('.form-group').hide();
    }
    if (!onload){
        if (country == window.adminConstants.id_country_italia){
            $city_input.val('');
            $province.val('');
        }else{
            $city_select.val('');
        }
    }
}

function provinceChange(province, prefix, onload){
    const $city_select = $("#"+prefix+"__comune_select_field");
    const $city_input = $("#"+prefix+"__comune_field");
    Admin.ajax({
        url: window.adminBaseUrl+'/comuni/getComuni',
        data: {provincia_id: province,'selected_value':$city_input.val()},
        method: 'GET',
        dataType: 'html',
        async: true,
        success: function(data){
            if (data){
                $city_select.html(data);
            }
        }
    });
}

function cityChange(city, prefix){
    const $cap = $("#"+prefix+"__cap_field");
    if (!$cap.val()) {
        Admin.ajax({
            url: window.adminBaseUrl + '/comuni/getCap',
            data: {'selected': city},
            method: 'GET',
            dataType: 'html',
            async: true,
            success: function (data) {
                $cap.val(data);
            }
        });
    }
}
