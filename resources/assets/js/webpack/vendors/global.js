"use strict";

/**
 * Define the output of this file. The output of CSS and JS file will be auto detected.
 *
 * @output plugins/global/plugins.bundle
 */

//** Begin: Global mandatory plugins
window.jQuery = window.$ = require("jquery");
require("bootstrap");
require("morris.js");
require("block-ui");
require("autosize");
require("clipboard");
window.moment = require("moment");
window.Sticky = require("sticky-js");
window.Chart = require("chart.js");
window.Raphael = require("raphael");
window.Cookies = require("js-cookie");
window.Popper = require("popper.js");
require("jquery-form");

// Toastr
require("toastr/build/toastr.css");
window.toastr = require("toastr");

// Tooltips
import Tooltip from "tooltip.js";

window.Tooltip = Tooltip;

// Perfect-Scrollbar
require("perfect-scrollbar/css/perfect-scrollbar.css");
window.PerfectScrollbar = require("perfect-scrollbar/dist/perfect-scrollbar");
//** End: Globally mandatory plugins

//** Begin: Global optional plugins

// Datatables
require("datatables.net-bs4");
require("datatables.net-autofill");
require("datatables.net-autofill-bs4");
require("datatables.net-buttons-bs4");
require("datatables.net-buttons/js/buttons.print.js");
require("datatables.net-buttons/js/buttons.html5.js");
require("datatables.net-buttons/js/buttons.flash.js");
require("datatables.net-buttons/js/buttons.colVis.js");
require("datatables.net-colreorder-bs4");
require("datatables.net-fixedcolumns-bs4");
require("datatables.net-fixedheader-bs4");
require("datatables.net-keytable-bs4");
require("datatables.net-responsive-bs4");
require("datatables.net-rowgroup-bs4");
require("datatables.net-rowreorder-bs4");
require("datatables.net-scroller-bs4");
require("datatables.net-select-bs4");
require("jszip/dist/jszip.min.js");
require("pdfmake/build/pdfmake.min.js");
require("pdfmake/build/vfs_fonts.js");
window.JSZip = require('jszip');

// Daterangepicker
require("bootstrap-daterangepicker/daterangepicker.css");
require("bootstrap-daterangepicker");

// Bootstrap-Select
require("bootstrap-select/dist/css/bootstrap-select.css");
require("bootstrap-select");

// Bootstrap-Session-Timeout
require("../../../../assets/plugins/bootstrap-session-timeout/dist/bootstrap-session-timeout.js");

// Bootstrap-switch
require("bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css");
require("bootstrap-switch");
require("../../../../assets/js/global/integration/plugins/bootstrap-switch.init.js");

// Sweetalert2
require("sweetalert2/dist/sweetalert2.css");
// import swal from "sweetalert2/dist/sweetalert2";
import Swal from 'sweetalert2/dist/sweetalert2';
window.Swal = Swal;
require("es6-promise-polyfill/promise.min.js");
require("../../../../assets/js/global/integration/plugins/sweetalert2.init");

// Bootstrap-notify
require("bootstrap-notify");
require("../../../../assets/js/global/integration/plugins/bootstrap-notify.init.js");

// Bootstrap-datepicker
require("bootstrap-datepicker/dist/css/bootstrap-datepicker3.css");
require("bootstrap-datepicker");
require("../../../../assets/js/global/integration/plugins/bootstrap-datepicker.init");

// Bootstrap-datetime-picker
require("bootstrap-datetime-picker/css/bootstrap-datetimepicker.css");
require("bootstrap-datetime-picker");

// Select2
require("select2/dist/css/select2.css");
require("select2");

// Bootstrap-timepicker
require("bootstrap-timepicker/css/bootstrap-timepicker.css");
require("bootstrap-timepicker");
require("../../../../assets/js/global/integration/plugins/bootstrap-timepicker.init");

// Tagify
require("@yaireo/tagify/dist/tagify.css");
window.Tagify = require("@yaireo/tagify/dist/tagify");
require("@yaireo/tagify/dist/tagify.polyfills.min");

// Typeahead
window.Bloodhound = require("typeahead.js");
window.Handlebars = require("handlebars/dist/handlebars.js");

// Dropzone
require("dropzone/dist/dropzone.css");
window.Dropzone = require("dropzone");
require("../../../../assets/js/global/integration/plugins/dropzone.init");

// ClipboardJS
window.ClipboardJS = require("clipboard");

// Autosize
window.autosize = require("autosize");

// Summernote
require("summernote/dist/summernote.css");
require("summernote");

// Quill
require("quill/dist/quill.snow.css");
window.Quill = require("quill");

// Inputmask
require("inputmask/dist/jquery.inputmask");
require("inputmask/lib/extensions/inputmask.date.extensions");
require("inputmask/lib/extensions/inputmask.numeric.extensions");

// jQuery.repeater
require("jquery.repeater");

// Wnumb
window.wNumb = require("wnumb");

// jQuery-Validation
require("jquery-validation");
require("jquery-validation/dist/additional-methods.js");
require("../../../../assets/js/global/integration/plugins/jquery-validation.init");

// Bootstrap-Multiselectsplitter
require("../../../../assets/plugins/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js");

// Bootstrap-Maxlength
require("bootstrap-maxlength");

// Bootstrap-Touchspin
require("bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css");
require("bootstrap-touchspin");

// Bootstrap-Markdown
require("bootstrap-markdown/css/bootstrap-markdown.min.css");
require("bootstrap-markdown/js/bootstrap-markdown");
require("../../../../assets/js/global/integration/plugins/bootstrap-markdown.init");

// Animate.css
require("animate.css/animate.css");

// Dual-Listbox
import DualListbox from "dual-listbox";
window.DualListbox = DualListbox;
require("dual-listbox/dist/dual-listbox.css");

// Fonts Icons
require("../../../../assets/plugins/line-awesome/css/line-awesome.css");
require("../../../../assets/plugins/flaticon/flaticon.css");
require("../../../../assets/plugins/flaticon2/flaticon.css");
require("@fortawesome/fontawesome-free/css/all.min.css");
require("socicon");
//** End: Global optional plugins
