(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/custom.bundle"],{

/***/ "./resources/js/custom.js":
/*!********************************!*\
  !*** ./resources/js/custom.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
 * Place the CSRF token as a header on all pages for access in AJAX requests
 */
$.ajaxSetup({
  beforeSend: function beforeSend(xhr, type) {
    if (!type.crossDomain) {
      xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
    }
  },
  complete: function complete(response, status, xhr) {
    addDeleteForms();
  }
});
/**
 * Allows you to add data-method="METHOD to links to automatically inject a form
 * with the method on click
 *
 * Example: <a href="{{route('customers.destroy', $customer->id)}}"
 * data-method="delete" name="delete_item">Delete</a>
 *
 * Injects a form with that's fired on click of the link with a DELETE request.
 * Good because you don't have to dirty your HTML with delete forms everywhere.
 */

function addDeleteForms() {
  $('[data-method]').append(function () {
    if (!$(this).find('form').length > 0) {
      return "\n<form action='" + $(this).attr('href') + "' method='POST' name='delete_item' style='display:none'>\n" + "<input type='hidden' name='_method' value='" + $(this).attr('data-method') + "'>\n" + "<input type='hidden' name='_token' value='" + $('meta[name="csrf-token"]').attr('content') + "'>\n" + '</form>\n';
    } else {
      return '';
    }
  }).attr('href', '#').attr('style', 'cursor:pointer;').attr('onclick', '$(this).find("form").submit();');
}
/**
 * Place any jQuery/helper plugins in here.
 */


$(function () {
  /**
   * Add the data-method="delete" forms to all delete links
   */
  addDeleteForms();
  /**
   * Disable all submit buttons once clicked
   */

  $('form').submit(function () {
    $(this).find('input[type="submit"]').attr('disabled', true);
    $(this).find('button[type="submit"]').attr('disabled', true);
    return true;
  });
  /**
   * Generic confirm form delete using Sweet Alert
   */

  $('body').on('submit', 'form[name=delete_item]', function (e) {
    e.preventDefault();
    var form = this;
    var link = $('a[data-method="delete"]');
    var cancel = link.attr('data-trans-button-cancel') ? link.attr('data-trans-button-cancel') : 'Cancelar';
    var confirm = link.attr('data-trans-button-confirm') ? link.attr('data-trans-button-confirm') : 'Eliminar';
    var title = link.attr('data-trans-title') ? link.attr('data-trans-title') : 'Está seguro que desea eliminarlo?';
    Swal.fire({
      title: title,
      showCancelButton: true,
      confirmButtonText: confirm,
      cancelButtonText: cancel,
      icon: 'warning'
    }).then(function (result) {
      result.value && form.submit();
    });
  }).on('click', 'a[name=confirm_item]', function (e) {
    /**
     * Generic 'are you sure' confirm box
     */
    e.preventDefault();
    var link = $(this);
    var title = link.attr('data-trans-title') ? link.attr('data-trans-title') : 'Está seguro que desea hacer esto?';
    var cancel = link.attr('data-trans-button-cancel') ? link.attr('data-trans-button-cancel') : 'Cancelar';
    var confirm = link.attr('data-trans-button-confirm') ? link.attr('data-trans-button-confirm') : 'Continuar';
    Swal.fire({
      title: title,
      showCancelButton: true,
      confirmButtonText: confirm,
      cancelButtonText: cancel,
      icon: 'info'
    }).then(function (result) {
      result.value && window.location.assign(link.attr('href'));
    });
  }); // Change Tab on load

  var hash = window.location.hash;
  hash && $('ul.nav a[href="' + hash + '"]').tab('show');
  $('.nav-tabs li > a').on('click', function (e) {
    $(this).tab('show');
    history.pushState(null, null, this.hash);
  });
  $(window).bind('hashchange', function () {
    $('ul.nav a[href^="' + document.location.hash + '"]').click();
  });

  if (document.location.hash.length) {
    $(window).trigger('hashchange');
  }

  $('table').on('draw.dt', function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover({
      trigger: "hover"
    });
    initDesktopTooltips();
  });
  $('.select2').select2({
    language: {
      noResults: function noResults() {
        return 'Lo sentimos, no hay resultados!';
      }
    },
    placeholder: function placeholder() {
      $(this).data('placeholder');
    }
  });
});

var initDesktopTooltips = function initDesktopTooltips() {
  if (KTUtil.isInResponsiveRange('desktop')) {
    $('[data-toggle="kt-tooltip-desktop"]').each(function () {
      KTApp.initTooltip($(this));
    });
  } else {
    $('[data-toggle="kt-tooltip-desktop"]').each(function () {
      $(this).tooltip('dispose');
    });
  }
};

initDesktopTooltips();
KTUtil.addResizeHandler(initDesktopTooltips);

/***/ }),

/***/ 3:
/*!**************************************!*\
  !*** multi ./resources/js/custom.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Applications/MAMP/htdocs/contasoft/resources/js/custom.js */"./resources/js/custom.js");


/***/ })

},[[3,"/js/manifest"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvY3VzdG9tLmpzIl0sIm5hbWVzIjpbIiQiLCJhamF4U2V0dXAiLCJiZWZvcmVTZW5kIiwieGhyIiwidHlwZSIsImNyb3NzRG9tYWluIiwic2V0UmVxdWVzdEhlYWRlciIsImF0dHIiLCJjb21wbGV0ZSIsInJlc3BvbnNlIiwic3RhdHVzIiwiYWRkRGVsZXRlRm9ybXMiLCJhcHBlbmQiLCJmaW5kIiwibGVuZ3RoIiwic3VibWl0Iiwib24iLCJlIiwicHJldmVudERlZmF1bHQiLCJmb3JtIiwibGluayIsImNhbmNlbCIsImNvbmZpcm0iLCJ0aXRsZSIsIlN3YWwiLCJmaXJlIiwic2hvd0NhbmNlbEJ1dHRvbiIsImNvbmZpcm1CdXR0b25UZXh0IiwiY2FuY2VsQnV0dG9uVGV4dCIsImljb24iLCJ0aGVuIiwicmVzdWx0IiwidmFsdWUiLCJ3aW5kb3ciLCJsb2NhdGlvbiIsImFzc2lnbiIsImhhc2giLCJ0YWIiLCJoaXN0b3J5IiwicHVzaFN0YXRlIiwiYmluZCIsImRvY3VtZW50IiwiY2xpY2siLCJ0cmlnZ2VyIiwidG9vbHRpcCIsInBvcG92ZXIiLCJpbml0RGVza3RvcFRvb2x0aXBzIiwic2VsZWN0MiIsImxhbmd1YWdlIiwibm9SZXN1bHRzIiwicGxhY2Vob2xkZXIiLCJkYXRhIiwiS1RVdGlsIiwiaXNJblJlc3BvbnNpdmVSYW5nZSIsImVhY2giLCJLVEFwcCIsImluaXRUb29sdGlwIiwiYWRkUmVzaXplSGFuZGxlciJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7O0FBQUE7OztBQUdBQSxDQUFDLENBQUNDLFNBQUYsQ0FBWTtBQUNSQyxZQUFVLEVBQUUsb0JBQVNDLEdBQVQsRUFBY0MsSUFBZCxFQUFvQjtBQUM1QixRQUFJLENBQUNBLElBQUksQ0FBQ0MsV0FBVixFQUF1QjtBQUNuQkYsU0FBRyxDQUFDRyxnQkFBSixDQUFxQixjQUFyQixFQUFxQ04sQ0FBQyxDQUFDLHlCQUFELENBQUQsQ0FBNkJPLElBQTdCLENBQWtDLFNBQWxDLENBQXJDO0FBQ0g7QUFDSixHQUxPO0FBTVJDLFVBQVEsRUFBRSxrQkFBU0MsUUFBVCxFQUFtQkMsTUFBbkIsRUFBMkJQLEdBQTNCLEVBQStCO0FBQ3JDUSxrQkFBYztBQUNqQjtBQVJPLENBQVo7QUFXQTs7Ozs7Ozs7Ozs7QUFVQSxTQUFTQSxjQUFULEdBQTBCO0FBQ3RCWCxHQUFDLENBQUMsZUFBRCxDQUFELENBQW1CWSxNQUFuQixDQUEwQixZQUFZO0FBQ2xDLFFBQUksQ0FBQ1osQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRYSxJQUFSLENBQWEsTUFBYixFQUFxQkMsTUFBdEIsR0FBK0IsQ0FBbkMsRUFBc0M7QUFDbEMsYUFBTyxxQkFBcUJkLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUU8sSUFBUixDQUFhLE1BQWIsQ0FBckIsR0FBNEMsNERBQTVDLEdBQ0gsNkNBREcsR0FDNkNQLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUU8sSUFBUixDQUFhLGFBQWIsQ0FEN0MsR0FDMkUsTUFEM0UsR0FFSCw0Q0FGRyxHQUU0Q1AsQ0FBQyxDQUFDLHlCQUFELENBQUQsQ0FBNkJPLElBQTdCLENBQWtDLFNBQWxDLENBRjVDLEdBRTJGLE1BRjNGLEdBR0gsV0FISjtBQUlILEtBTEQsTUFLTztBQUFFLGFBQU8sRUFBUDtBQUFZO0FBQ3hCLEdBUEQsRUFRS0EsSUFSTCxDQVFVLE1BUlYsRUFRa0IsR0FSbEIsRUFTS0EsSUFUTCxDQVNVLE9BVFYsRUFTbUIsaUJBVG5CLEVBVUtBLElBVkwsQ0FVVSxTQVZWLEVBVXFCLGdDQVZyQjtBQVdIO0FBRUQ7Ozs7O0FBR0FQLENBQUMsQ0FBQyxZQUFZO0FBQ1Y7OztBQUdBVyxnQkFBYztBQUVkOzs7O0FBR0FYLEdBQUMsQ0FBQyxNQUFELENBQUQsQ0FBVWUsTUFBVixDQUFpQixZQUFZO0FBQ3pCZixLQUFDLENBQUMsSUFBRCxDQUFELENBQVFhLElBQVIsQ0FBYSxzQkFBYixFQUFxQ04sSUFBckMsQ0FBMEMsVUFBMUMsRUFBc0QsSUFBdEQ7QUFDQVAsS0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRYSxJQUFSLENBQWEsdUJBQWIsRUFBc0NOLElBQXRDLENBQTJDLFVBQTNDLEVBQXVELElBQXZEO0FBQ0EsV0FBTyxJQUFQO0FBQ0gsR0FKRDtBQU1BOzs7O0FBR0FQLEdBQUMsQ0FBQyxNQUFELENBQUQsQ0FBVWdCLEVBQVYsQ0FBYSxRQUFiLEVBQXVCLHdCQUF2QixFQUFpRCxVQUFVQyxDQUFWLEVBQWE7QUFDMURBLEtBQUMsQ0FBQ0MsY0FBRjtBQUVBLFFBQU1DLElBQUksR0FBRyxJQUFiO0FBQ0EsUUFBTUMsSUFBSSxHQUFHcEIsQ0FBQyxDQUFDLHlCQUFELENBQWQ7QUFDQSxRQUFNcUIsTUFBTSxHQUFJRCxJQUFJLENBQUNiLElBQUwsQ0FBVSwwQkFBVixDQUFELEdBQTBDYSxJQUFJLENBQUNiLElBQUwsQ0FBVSwwQkFBVixDQUExQyxHQUFrRixVQUFqRztBQUNBLFFBQU1lLE9BQU8sR0FBSUYsSUFBSSxDQUFDYixJQUFMLENBQVUsMkJBQVYsQ0FBRCxHQUEyQ2EsSUFBSSxDQUFDYixJQUFMLENBQVUsMkJBQVYsQ0FBM0MsR0FBb0YsVUFBcEc7QUFDQSxRQUFNZ0IsS0FBSyxHQUFJSCxJQUFJLENBQUNiLElBQUwsQ0FBVSxrQkFBVixDQUFELEdBQWtDYSxJQUFJLENBQUNiLElBQUwsQ0FBVSxrQkFBVixDQUFsQyxHQUFrRSxtQ0FBaEY7QUFFQWlCLFFBQUksQ0FBQ0MsSUFBTCxDQUFVO0FBQ05GLFdBQUssRUFBRUEsS0FERDtBQUVORyxzQkFBZ0IsRUFBRSxJQUZaO0FBR05DLHVCQUFpQixFQUFFTCxPQUhiO0FBSU5NLHNCQUFnQixFQUFFUCxNQUpaO0FBS05RLFVBQUksRUFBRTtBQUxBLEtBQVYsRUFNR0MsSUFOSCxDQU1RLFVBQUNDLE1BQUQsRUFBWTtBQUNoQkEsWUFBTSxDQUFDQyxLQUFQLElBQWdCYixJQUFJLENBQUNKLE1BQUwsRUFBaEI7QUFDSCxLQVJEO0FBU0gsR0FsQkQsRUFrQkdDLEVBbEJILENBa0JNLE9BbEJOLEVBa0JlLHNCQWxCZixFQWtCdUMsVUFBVUMsQ0FBVixFQUFhO0FBQ2hEOzs7QUFHQUEsS0FBQyxDQUFDQyxjQUFGO0FBRUEsUUFBTUUsSUFBSSxHQUFHcEIsQ0FBQyxDQUFDLElBQUQsQ0FBZDtBQUNBLFFBQU11QixLQUFLLEdBQUlILElBQUksQ0FBQ2IsSUFBTCxDQUFVLGtCQUFWLENBQUQsR0FBa0NhLElBQUksQ0FBQ2IsSUFBTCxDQUFVLGtCQUFWLENBQWxDLEdBQWtFLG1DQUFoRjtBQUNBLFFBQU1jLE1BQU0sR0FBSUQsSUFBSSxDQUFDYixJQUFMLENBQVUsMEJBQVYsQ0FBRCxHQUEwQ2EsSUFBSSxDQUFDYixJQUFMLENBQVUsMEJBQVYsQ0FBMUMsR0FBa0YsVUFBakc7QUFDQSxRQUFNZSxPQUFPLEdBQUlGLElBQUksQ0FBQ2IsSUFBTCxDQUFVLDJCQUFWLENBQUQsR0FBMkNhLElBQUksQ0FBQ2IsSUFBTCxDQUFVLDJCQUFWLENBQTNDLEdBQW9GLFdBQXBHO0FBRUFpQixRQUFJLENBQUNDLElBQUwsQ0FBVTtBQUNORixXQUFLLEVBQUVBLEtBREQ7QUFFTkcsc0JBQWdCLEVBQUUsSUFGWjtBQUdOQyx1QkFBaUIsRUFBRUwsT0FIYjtBQUlOTSxzQkFBZ0IsRUFBRVAsTUFKWjtBQUtOUSxVQUFJLEVBQUU7QUFMQSxLQUFWLEVBTUdDLElBTkgsQ0FNUSxVQUFDQyxNQUFELEVBQVk7QUFDaEJBLFlBQU0sQ0FBQ0MsS0FBUCxJQUFnQkMsTUFBTSxDQUFDQyxRQUFQLENBQWdCQyxNQUFoQixDQUF1QmYsSUFBSSxDQUFDYixJQUFMLENBQVUsTUFBVixDQUF2QixDQUFoQjtBQUNILEtBUkQ7QUFTSCxHQXRDRCxFQWxCVSxDQTBEVjs7QUFDQSxNQUFJNkIsSUFBSSxHQUFHSCxNQUFNLENBQUNDLFFBQVAsQ0FBZ0JFLElBQTNCO0FBQ0FBLE1BQUksSUFBSXBDLENBQUMsQ0FBQyxvQkFBb0JvQyxJQUFwQixHQUEyQixJQUE1QixDQUFELENBQW1DQyxHQUFuQyxDQUF1QyxNQUF2QyxDQUFSO0FBRUFyQyxHQUFDLENBQUMsa0JBQUQsQ0FBRCxDQUFzQmdCLEVBQXRCLENBQXlCLE9BQXpCLEVBQWtDLFVBQVVDLENBQVYsRUFBYTtBQUMzQ2pCLEtBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUXFDLEdBQVIsQ0FBWSxNQUFaO0FBQ0FDLFdBQU8sQ0FBQ0MsU0FBUixDQUFrQixJQUFsQixFQUF1QixJQUF2QixFQUE2QixLQUFLSCxJQUFsQztBQUNILEdBSEQ7QUFLQXBDLEdBQUMsQ0FBQ2lDLE1BQUQsQ0FBRCxDQUFVTyxJQUFWLENBQWUsWUFBZixFQUE2QixZQUFVO0FBQ25DeEMsS0FBQyxDQUFDLHFCQUFxQnlDLFFBQVEsQ0FBQ1AsUUFBVCxDQUFrQkUsSUFBdkMsR0FBOEMsSUFBL0MsQ0FBRCxDQUFzRE0sS0FBdEQ7QUFDSCxHQUZEOztBQUlBLE1BQUlELFFBQVEsQ0FBQ1AsUUFBVCxDQUFrQkUsSUFBbEIsQ0FBdUJ0QixNQUEzQixFQUFtQztBQUMvQmQsS0FBQyxDQUFDaUMsTUFBRCxDQUFELENBQVVVLE9BQVYsQ0FBa0IsWUFBbEI7QUFDSDs7QUFFRDNDLEdBQUMsQ0FBQyxPQUFELENBQUQsQ0FBV2dCLEVBQVgsQ0FBYyxTQUFkLEVBQXlCLFlBQVc7QUFDaENoQixLQUFDLENBQUMseUJBQUQsQ0FBRCxDQUE2QjRDLE9BQTdCO0FBQ0E1QyxLQUFDLENBQUMseUJBQUQsQ0FBRCxDQUE2QjZDLE9BQTdCLENBQXFDO0FBQ2pDRixhQUFPLEVBQUU7QUFEd0IsS0FBckM7QUFJQUcsdUJBQW1CO0FBQ3RCLEdBUEQ7QUFTQTlDLEdBQUMsQ0FBQyxVQUFELENBQUQsQ0FBYytDLE9BQWQsQ0FBc0I7QUFDbEJDLFlBQVEsRUFBRTtBQUNOQyxlQUFTLEVBQUUscUJBQVc7QUFDbEIsZUFBTyxpQ0FBUDtBQUNIO0FBSEssS0FEUTtBQU9sQkMsZUFBVyxFQUFFLHVCQUFVO0FBQ25CbEQsT0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRbUQsSUFBUixDQUFhLGFBQWI7QUFDSDtBQVRpQixHQUF0QjtBQVdILENBL0ZBLENBQUQ7O0FBaUdBLElBQUlMLG1CQUFtQixHQUFHLFNBQXRCQSxtQkFBc0IsR0FBVztBQUNqQyxNQUFJTSxNQUFNLENBQUNDLG1CQUFQLENBQTJCLFNBQTNCLENBQUosRUFBMkM7QUFDdkNyRCxLQUFDLENBQUMsb0NBQUQsQ0FBRCxDQUF3Q3NELElBQXhDLENBQTZDLFlBQVc7QUFDcERDLFdBQUssQ0FBQ0MsV0FBTixDQUFrQnhELENBQUMsQ0FBQyxJQUFELENBQW5CO0FBQ0gsS0FGRDtBQUdILEdBSkQsTUFJTztBQUNIQSxLQUFDLENBQUMsb0NBQUQsQ0FBRCxDQUF3Q3NELElBQXhDLENBQTZDLFlBQVc7QUFDcER0RCxPQUFDLENBQUMsSUFBRCxDQUFELENBQVE0QyxPQUFSLENBQWdCLFNBQWhCO0FBQ0gsS0FGRDtBQUdIO0FBQ0osQ0FWRDs7QUFZQUUsbUJBQW1CO0FBQ25CTSxNQUFNLENBQUNLLGdCQUFQLENBQXdCWCxtQkFBeEIsRSIsImZpbGUiOiIvanMvY3VzdG9tLmJ1bmRsZS5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8qXG4gKiBQbGFjZSB0aGUgQ1NSRiB0b2tlbiBhcyBhIGhlYWRlciBvbiBhbGwgcGFnZXMgZm9yIGFjY2VzcyBpbiBBSkFYIHJlcXVlc3RzXG4gKi9cbiQuYWpheFNldHVwKHtcbiAgICBiZWZvcmVTZW5kOiBmdW5jdGlvbih4aHIsIHR5cGUpIHtcbiAgICAgICAgaWYgKCF0eXBlLmNyb3NzRG9tYWluKSB7XG4gICAgICAgICAgICB4aHIuc2V0UmVxdWVzdEhlYWRlcignWC1DU1JGLVRva2VuJywgJCgnbWV0YVtuYW1lPVwiY3NyZi10b2tlblwiXScpLmF0dHIoJ2NvbnRlbnQnKSk7XG4gICAgICAgIH1cbiAgICB9LFxuICAgIGNvbXBsZXRlOiBmdW5jdGlvbihyZXNwb25zZSwgc3RhdHVzLCB4aHIpe1xuICAgICAgICBhZGREZWxldGVGb3JtcygpO1xuICAgIH1cbn0pO1xuXG4vKipcbiAqIEFsbG93cyB5b3UgdG8gYWRkIGRhdGEtbWV0aG9kPVwiTUVUSE9EIHRvIGxpbmtzIHRvIGF1dG9tYXRpY2FsbHkgaW5qZWN0IGEgZm9ybVxuICogd2l0aCB0aGUgbWV0aG9kIG9uIGNsaWNrXG4gKlxuICogRXhhbXBsZTogPGEgaHJlZj1cInt7cm91dGUoJ2N1c3RvbWVycy5kZXN0cm95JywgJGN1c3RvbWVyLT5pZCl9fVwiXG4gKiBkYXRhLW1ldGhvZD1cImRlbGV0ZVwiIG5hbWU9XCJkZWxldGVfaXRlbVwiPkRlbGV0ZTwvYT5cbiAqXG4gKiBJbmplY3RzIGEgZm9ybSB3aXRoIHRoYXQncyBmaXJlZCBvbiBjbGljayBvZiB0aGUgbGluayB3aXRoIGEgREVMRVRFIHJlcXVlc3QuXG4gKiBHb29kIGJlY2F1c2UgeW91IGRvbid0IGhhdmUgdG8gZGlydHkgeW91ciBIVE1MIHdpdGggZGVsZXRlIGZvcm1zIGV2ZXJ5d2hlcmUuXG4gKi9cbmZ1bmN0aW9uIGFkZERlbGV0ZUZvcm1zKCkge1xuICAgICQoJ1tkYXRhLW1ldGhvZF0nKS5hcHBlbmQoZnVuY3Rpb24gKCkge1xuICAgICAgICBpZiAoISQodGhpcykuZmluZCgnZm9ybScpLmxlbmd0aCA+IDApIHtcbiAgICAgICAgICAgIHJldHVybiBcIlxcbjxmb3JtIGFjdGlvbj0nXCIgKyAkKHRoaXMpLmF0dHIoJ2hyZWYnKSArIFwiJyBtZXRob2Q9J1BPU1QnIG5hbWU9J2RlbGV0ZV9pdGVtJyBzdHlsZT0nZGlzcGxheTpub25lJz5cXG5cIiArXG4gICAgICAgICAgICAgICAgXCI8aW5wdXQgdHlwZT0naGlkZGVuJyBuYW1lPSdfbWV0aG9kJyB2YWx1ZT0nXCIgKyAkKHRoaXMpLmF0dHIoJ2RhdGEtbWV0aG9kJykgKyBcIic+XFxuXCIgK1xuICAgICAgICAgICAgICAgIFwiPGlucHV0IHR5cGU9J2hpZGRlbicgbmFtZT0nX3Rva2VuJyB2YWx1ZT0nXCIgKyAkKCdtZXRhW25hbWU9XCJjc3JmLXRva2VuXCJdJykuYXR0cignY29udGVudCcpICsgXCInPlxcblwiICtcbiAgICAgICAgICAgICAgICAnPC9mb3JtPlxcbic7XG4gICAgICAgIH0gZWxzZSB7IHJldHVybiAnJzsgfVxuICAgIH0pXG4gICAgICAgIC5hdHRyKCdocmVmJywgJyMnKVxuICAgICAgICAuYXR0cignc3R5bGUnLCAnY3Vyc29yOnBvaW50ZXI7JylcbiAgICAgICAgLmF0dHIoJ29uY2xpY2snLCAnJCh0aGlzKS5maW5kKFwiZm9ybVwiKS5zdWJtaXQoKTsnKTtcbn1cblxuLyoqXG4gKiBQbGFjZSBhbnkgalF1ZXJ5L2hlbHBlciBwbHVnaW5zIGluIGhlcmUuXG4gKi9cbiQoZnVuY3Rpb24gKCkge1xuICAgIC8qKlxuICAgICAqIEFkZCB0aGUgZGF0YS1tZXRob2Q9XCJkZWxldGVcIiBmb3JtcyB0byBhbGwgZGVsZXRlIGxpbmtzXG4gICAgICovXG4gICAgYWRkRGVsZXRlRm9ybXMoKTtcblxuICAgIC8qKlxuICAgICAqIERpc2FibGUgYWxsIHN1Ym1pdCBidXR0b25zIG9uY2UgY2xpY2tlZFxuICAgICAqL1xuICAgICQoJ2Zvcm0nKS5zdWJtaXQoZnVuY3Rpb24gKCkge1xuICAgICAgICAkKHRoaXMpLmZpbmQoJ2lucHV0W3R5cGU9XCJzdWJtaXRcIl0nKS5hdHRyKCdkaXNhYmxlZCcsIHRydWUpO1xuICAgICAgICAkKHRoaXMpLmZpbmQoJ2J1dHRvblt0eXBlPVwic3VibWl0XCJdJykuYXR0cignZGlzYWJsZWQnLCB0cnVlKTtcbiAgICAgICAgcmV0dXJuIHRydWU7XG4gICAgfSk7XG5cbiAgICAvKipcbiAgICAgKiBHZW5lcmljIGNvbmZpcm0gZm9ybSBkZWxldGUgdXNpbmcgU3dlZXQgQWxlcnRcbiAgICAgKi9cbiAgICAkKCdib2R5Jykub24oJ3N1Ym1pdCcsICdmb3JtW25hbWU9ZGVsZXRlX2l0ZW1dJywgZnVuY3Rpb24gKGUpIHtcbiAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuXG4gICAgICAgIGNvbnN0IGZvcm0gPSB0aGlzO1xuICAgICAgICBjb25zdCBsaW5rID0gJCgnYVtkYXRhLW1ldGhvZD1cImRlbGV0ZVwiXScpO1xuICAgICAgICBjb25zdCBjYW5jZWwgPSAobGluay5hdHRyKCdkYXRhLXRyYW5zLWJ1dHRvbi1jYW5jZWwnKSkgPyBsaW5rLmF0dHIoJ2RhdGEtdHJhbnMtYnV0dG9uLWNhbmNlbCcpIDogJ0NhbmNlbGFyJztcbiAgICAgICAgY29uc3QgY29uZmlybSA9IChsaW5rLmF0dHIoJ2RhdGEtdHJhbnMtYnV0dG9uLWNvbmZpcm0nKSkgPyBsaW5rLmF0dHIoJ2RhdGEtdHJhbnMtYnV0dG9uLWNvbmZpcm0nKSA6ICdFbGltaW5hcic7XG4gICAgICAgIGNvbnN0IHRpdGxlID0gKGxpbmsuYXR0cignZGF0YS10cmFucy10aXRsZScpKSA/IGxpbmsuYXR0cignZGF0YS10cmFucy10aXRsZScpIDogJ0VzdMOhIHNlZ3VybyBxdWUgZGVzZWEgZWxpbWluYXJsbz8nO1xuXG4gICAgICAgIFN3YWwuZmlyZSh7XG4gICAgICAgICAgICB0aXRsZTogdGl0bGUsXG4gICAgICAgICAgICBzaG93Q2FuY2VsQnV0dG9uOiB0cnVlLFxuICAgICAgICAgICAgY29uZmlybUJ1dHRvblRleHQ6IGNvbmZpcm0sXG4gICAgICAgICAgICBjYW5jZWxCdXR0b25UZXh0OiBjYW5jZWwsXG4gICAgICAgICAgICBpY29uOiAnd2FybmluZydcbiAgICAgICAgfSkudGhlbigocmVzdWx0KSA9PiB7XG4gICAgICAgICAgICByZXN1bHQudmFsdWUgJiYgZm9ybS5zdWJtaXQoKTtcbiAgICAgICAgfSk7XG4gICAgfSkub24oJ2NsaWNrJywgJ2FbbmFtZT1jb25maXJtX2l0ZW1dJywgZnVuY3Rpb24gKGUpIHtcbiAgICAgICAgLyoqXG4gICAgICAgICAqIEdlbmVyaWMgJ2FyZSB5b3Ugc3VyZScgY29uZmlybSBib3hcbiAgICAgICAgICovXG4gICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcblxuICAgICAgICBjb25zdCBsaW5rID0gJCh0aGlzKTtcbiAgICAgICAgY29uc3QgdGl0bGUgPSAobGluay5hdHRyKCdkYXRhLXRyYW5zLXRpdGxlJykpID8gbGluay5hdHRyKCdkYXRhLXRyYW5zLXRpdGxlJykgOiAnRXN0w6Egc2VndXJvIHF1ZSBkZXNlYSBoYWNlciBlc3RvPyc7XG4gICAgICAgIGNvbnN0IGNhbmNlbCA9IChsaW5rLmF0dHIoJ2RhdGEtdHJhbnMtYnV0dG9uLWNhbmNlbCcpKSA/IGxpbmsuYXR0cignZGF0YS10cmFucy1idXR0b24tY2FuY2VsJykgOiAnQ2FuY2VsYXInO1xuICAgICAgICBjb25zdCBjb25maXJtID0gKGxpbmsuYXR0cignZGF0YS10cmFucy1idXR0b24tY29uZmlybScpKSA/IGxpbmsuYXR0cignZGF0YS10cmFucy1idXR0b24tY29uZmlybScpIDogJ0NvbnRpbnVhcic7XG5cbiAgICAgICAgU3dhbC5maXJlKHtcbiAgICAgICAgICAgIHRpdGxlOiB0aXRsZSxcbiAgICAgICAgICAgIHNob3dDYW5jZWxCdXR0b246IHRydWUsXG4gICAgICAgICAgICBjb25maXJtQnV0dG9uVGV4dDogY29uZmlybSxcbiAgICAgICAgICAgIGNhbmNlbEJ1dHRvblRleHQ6IGNhbmNlbCxcbiAgICAgICAgICAgIGljb246ICdpbmZvJ1xuICAgICAgICB9KS50aGVuKChyZXN1bHQpID0+IHtcbiAgICAgICAgICAgIHJlc3VsdC52YWx1ZSAmJiB3aW5kb3cubG9jYXRpb24uYXNzaWduKGxpbmsuYXR0cignaHJlZicpKTtcbiAgICAgICAgfSk7XG4gICAgfSk7XG5cbiAgICAvLyBDaGFuZ2UgVGFiIG9uIGxvYWRcbiAgICB2YXIgaGFzaCA9IHdpbmRvdy5sb2NhdGlvbi5oYXNoO1xuICAgIGhhc2ggJiYgJCgndWwubmF2IGFbaHJlZj1cIicgKyBoYXNoICsgJ1wiXScpLnRhYignc2hvdycpO1xuXG4gICAgJCgnLm5hdi10YWJzIGxpID4gYScpLm9uKCdjbGljaycsIGZ1bmN0aW9uIChlKSB7XG4gICAgICAgICQodGhpcykudGFiKCdzaG93Jyk7XG4gICAgICAgIGhpc3RvcnkucHVzaFN0YXRlKG51bGwsbnVsbCwgdGhpcy5oYXNoKTtcbiAgICB9KTtcblxuICAgICQod2luZG93KS5iaW5kKCdoYXNoY2hhbmdlJywgZnVuY3Rpb24oKXtcbiAgICAgICAgJCgndWwubmF2IGFbaHJlZl49XCInICsgZG9jdW1lbnQubG9jYXRpb24uaGFzaCArICdcIl0nKS5jbGljaygpO1xuICAgIH0pO1xuXG4gICAgaWYgKGRvY3VtZW50LmxvY2F0aW9uLmhhc2gubGVuZ3RoKSB7XG4gICAgICAgICQod2luZG93KS50cmlnZ2VyKCdoYXNoY2hhbmdlJyk7XG4gICAgfVxuXG4gICAgJCgndGFibGUnKS5vbignZHJhdy5kdCcsIGZ1bmN0aW9uKCkge1xuICAgICAgICAkKCdbZGF0YS10b2dnbGU9XCJ0b29sdGlwXCJdJykudG9vbHRpcCgpO1xuICAgICAgICAkKCdbZGF0YS10b2dnbGU9XCJwb3BvdmVyXCJdJykucG9wb3Zlcih7XG4gICAgICAgICAgICB0cmlnZ2VyOiBcImhvdmVyXCJcbiAgICAgICAgfSk7XG5cbiAgICAgICAgaW5pdERlc2t0b3BUb29sdGlwcygpO1xuICAgIH0pO1xuXG4gICAgJCgnLnNlbGVjdDInKS5zZWxlY3QyKHtcbiAgICAgICAgbGFuZ3VhZ2U6IHtcbiAgICAgICAgICAgIG5vUmVzdWx0czogZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICAgICAgcmV0dXJuICdMbyBzZW50aW1vcywgbm8gaGF5IHJlc3VsdGFkb3MhJztcbiAgICAgICAgICAgIH1cbiAgICAgICAgfSxcblxuICAgICAgICBwbGFjZWhvbGRlcjogZnVuY3Rpb24oKXtcbiAgICAgICAgICAgICQodGhpcykuZGF0YSgncGxhY2Vob2xkZXInKTtcbiAgICAgICAgfVxuICAgIH0pO1xufSk7XG5cbmxldCBpbml0RGVza3RvcFRvb2x0aXBzID0gZnVuY3Rpb24oKSB7XG4gICAgaWYgKEtUVXRpbC5pc0luUmVzcG9uc2l2ZVJhbmdlKCdkZXNrdG9wJykpIHtcbiAgICAgICAgJCgnW2RhdGEtdG9nZ2xlPVwia3QtdG9vbHRpcC1kZXNrdG9wXCJdJykuZWFjaChmdW5jdGlvbigpIHtcbiAgICAgICAgICAgIEtUQXBwLmluaXRUb29sdGlwKCQodGhpcykpO1xuICAgICAgICB9KTtcbiAgICB9IGVsc2Uge1xuICAgICAgICAkKCdbZGF0YS10b2dnbGU9XCJrdC10b29sdGlwLWRlc2t0b3BcIl0nKS5lYWNoKGZ1bmN0aW9uKCkge1xuICAgICAgICAgICAgJCh0aGlzKS50b29sdGlwKCdkaXNwb3NlJyk7XG4gICAgICAgIH0pO1xuICAgIH1cbn07XG5cbmluaXREZXNrdG9wVG9vbHRpcHMoKTtcbktUVXRpbC5hZGRSZXNpemVIYW5kbGVyKGluaXREZXNrdG9wVG9vbHRpcHMpO1xuIl0sInNvdXJjZVJvb3QiOiIifQ==