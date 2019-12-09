"use strict";

/**
 * Define the output of this file. The output of CSS and JS file will be auto detected.
 *
 * @output js/scripts.bundle
 */

// Core Plugins
window.KTAppOptions = {
    "colors": {
        "state": {
            "brand": "#2c77f4",
            "light": "#ffffff",
            "dark": "#282a3c",
            "primary": "#5867dd",
            "success": "#34bfa3",
            "info": "#36a3f7",
            "warning": "#ffb822",
            "danger": "#fd3995"
        },
        "base": {
            "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
            "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
        }
    }
};
window.KTUtil = require("../global/components/base/util");
window.KTApp = require("../global/components/base/app");
window.KTAvatar = require("../global/components/base/avatar");
window.KTDialog = require("../global/components/base/dialog");
window.KTHeader = require("../global/components/base/header");
window.KTMenu = require("../global/components/base/menu");
window.KTOffcanvas = require("../global/components/base/offcanvas");
window.KTPortlet = require("../global/components/base/portlet");
window.KTScrolltop = require("../global/components/base/scrolltop");
window.KTToggle = require("../global/components/base/toggle");
window.KTWizard = require("../global/components/base/wizard");
require("../global/components/base/datatable/core.datatable");
require("../global/components/base/datatable/datatable.checkbox");
require("../global/components/base/datatable/datatable.rtl");

// Layout Scripts
window.KTLayout = require("../global/layout/layout");
window.KTChat = require("../global/layout/chat");
require("../global/layout/demo-panel");
require("../global/layout/offcanvas-panel");
require("../global/layout/quick-panel");
require("../global/layout/quick-search");
