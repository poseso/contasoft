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
  // var hash = window.location.hash;
  // hash && $('ul.nav a[href="' + hash + '"]').tab('show');
  //
  // $('.nav-tabs li > a').on('click', function (e) {
  //     $(this).tab('show');
  //     history.pushState(null,null, this.hash);
  // });

  var url = document.URL;
  var hash = url.substring(url.indexOf('#'));
  $(".nav-tabs").find("li a").each(function (key, val) {
    if (hash == $(val).attr('href')) {
      $(val).click();
    }

    $(val).click(function (ky, vl) {
      location.hash = $(this).attr('href');
    });
  });
  $('table').on('draw.dt', function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover({
      trigger: "hover"
    });
    KTApp.initTooltips();
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

/***/ 1:
/*!**************************************!*\
  !*** multi ./resources/js/custom.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Applications/MAMP/htdocs/contasoft/resources/js/custom.js */"./resources/js/custom.js");


/***/ })

},[[1,"/js/manifest"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvY3VzdG9tLmpzIl0sIm5hbWVzIjpbIiQiLCJhamF4U2V0dXAiLCJiZWZvcmVTZW5kIiwieGhyIiwidHlwZSIsImNyb3NzRG9tYWluIiwic2V0UmVxdWVzdEhlYWRlciIsImF0dHIiLCJjb21wbGV0ZSIsInJlc3BvbnNlIiwic3RhdHVzIiwiYWRkRGVsZXRlRm9ybXMiLCJhcHBlbmQiLCJmaW5kIiwibGVuZ3RoIiwic3VibWl0Iiwib24iLCJlIiwicHJldmVudERlZmF1bHQiLCJmb3JtIiwibGluayIsImNhbmNlbCIsImNvbmZpcm0iLCJ0aXRsZSIsIlN3YWwiLCJmaXJlIiwic2hvd0NhbmNlbEJ1dHRvbiIsImNvbmZpcm1CdXR0b25UZXh0IiwiY2FuY2VsQnV0dG9uVGV4dCIsImljb24iLCJ0aGVuIiwicmVzdWx0IiwidmFsdWUiLCJ3aW5kb3ciLCJsb2NhdGlvbiIsImFzc2lnbiIsInVybCIsImRvY3VtZW50IiwiVVJMIiwiaGFzaCIsInN1YnN0cmluZyIsImluZGV4T2YiLCJlYWNoIiwia2V5IiwidmFsIiwiY2xpY2siLCJreSIsInZsIiwidG9vbHRpcCIsInBvcG92ZXIiLCJ0cmlnZ2VyIiwiS1RBcHAiLCJpbml0VG9vbHRpcHMiLCJzZWxlY3QyIiwibGFuZ3VhZ2UiLCJub1Jlc3VsdHMiLCJwbGFjZWhvbGRlciIsImRhdGEiLCJpbml0RGVza3RvcFRvb2x0aXBzIiwiS1RVdGlsIiwiaXNJblJlc3BvbnNpdmVSYW5nZSIsImluaXRUb29sdGlwIiwiYWRkUmVzaXplSGFuZGxlciJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7O0FBQUE7OztBQUdBQSxDQUFDLENBQUNDLFNBQUYsQ0FBWTtBQUNSQyxZQUFVLEVBQUUsb0JBQVNDLEdBQVQsRUFBY0MsSUFBZCxFQUFvQjtBQUM1QixRQUFJLENBQUNBLElBQUksQ0FBQ0MsV0FBVixFQUF1QjtBQUNuQkYsU0FBRyxDQUFDRyxnQkFBSixDQUFxQixjQUFyQixFQUFxQ04s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TUFBTSxDQUFDQyxtQkFBUCxDQUEyQixTQUEzQixDQUFKLEVBQTJDO0FBQ3ZDNUQsS0FBQyxDQUFDLG9DQUFELENBQUQsQ0FBd0MwQyxJQUF4QyxDQUE2QyxZQUFXO0FBQ3BEUyxXQUFLLENBQUNVLFdBQU4sQ0FBa0I3RCxDQUFDLENBQUMsSUFBRCxDQUFuQjtBQUNILEtBRkQ7QUFHSCxHQUpELE1BSU87QUFDSEEsS0FBQyxDQUFDLG9DQUFELENBQUQsQ0FBd0MwQyxJQUF4QyxDQUE2QyxZQUFXO0FBQ3BEMUMsT0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRZ0QsT0FBUixDQUFnQixTQUFoQjtBQUNILEtBRkQ7QUFHSDtBQUNKLENBVkQ7O0FBWUFVLG1CQUFtQjtBQUNuQkMsTUFBTSxDQUFDRyxnQkFBUCxDQUF3QkosbUJBQXhCLEUiLCJmaWxlIjoiL2pzL2N1c3RvbS5idW5kbGUuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvKlxuICogUGxhY2UgdGhlIENTUkYgdG9rZW4gYXMgYSBoZWFkZXIgb24gYWxsIHBhZ2VzIGZvciBhY2Nlc3MgaW4gQUpBWCByZXF1ZXN0c1xuICovXG4kLmFqYXhTZXR1cCh7XG4gICAgYmVmb3JlU2VuZDogZnVuY3Rpb24oeGhyLCB0eXBlKSB7XG4gICAgICAgIGlmICghdHlwZS5jcm9zc0RvbWFpbikge1xuICAgICAgICAgICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoJ1gtQ1NSRi1Ub2tlbicsICQoJ21ldGFbbmFtZT1cImNzcmYtdG9rZW5cIl0nKS5hdHRyKCdjb250ZW50JykpO1xuICAgICAgICB9XG4gICAgfSxcbiAgICBjb21wbGV0ZTogZnVuY3Rpb24ocmVzcG9uc2UsIHN0YXR1cywgeGhyKXtcbiAgICAgICAgYWRkRGVsZXRlRm9ybXMoKTtcbiAgICB9XG59KTtcblxuLyoqXG4gKiBBbGxvd3MgeW91IHRvIGFkZCBkYXRhLW1ldGhvZD1cIk1FVEhPRCB0byBsaW5rcyB0byBhdXRvbWF0aWNhbGx5IGluamVjdCBhIGZvcm1cbiAqIHdpdGggdGhlIG1ldGhvZCBvbiBjbGlja1xuICpcbiAqIEV4YW1wbGU6IDxhIGhyZWY9XCJ7e3JvdXRlKCdjdXN0b21lcnMuZGVzdHJveScsICRjdXN0b21lci0+aWQpfX1cIlxuICogZGF0YS1tZXRob2Q9XCJkZWxldGVcIiBuYW1lPVwiZGVsZXRlX2l0ZW1cIj5EZWxldGU8L2E+XG4gKlxuICogSW5qZWN0cyBhIGZvcm0gd2l0aCB0aGF0J3MgZmlyZWQgb24gY2xpY2sgb2YgdGhlIGxpbmsgd2l0aCBhIERFTEVURSByZXF1ZXN0LlxuICogR29vZCBiZWNhdXNlIHlvdSBkb24ndCBoYXZlIHRvIGRpcnR5IHlvdXIgSFRNTCB3aXRoIGRlbGV0ZSBmb3JtcyBldmVyeXdoZXJlLlxuICovXG5mdW5jdGlvbiBhZGREZWxldGVGb3JtcygpIHtcbiAgICAkKCdbZGF0YS1tZXRob2RdJykuYXBwZW5kKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgaWYgKCEkKHRoaXMpLmZpbmQoJ2Zvcm0nKS5sZW5ndGggPiAwKSB7XG4gICAgICAgICAgICByZXR1cm4gXCJcXG48Zm9ybSBhY3Rpb249J1wiICsgJCh0aGlzKS5hdHRyKCdocmVmJykgKyBcIicgbWV0aG9kPSdQT1NUJyBuYW1lPSdkZWxldGVfaXRlbScgc3R5bGU9J2Rpc3BsYXk6bm9uZSc+XFxuXCIgK1xuICAgICAgICAgICAgICAgIFwiPGlucHV0IHR5cGU9J2hpZGRlbicgbmFtZT0nX21ldGhvZCcgdmFsdWU9J1wiICsgJCh0aGlzKS5hdHRyKCdkYXRhLW1ldGhvZCcpICsgXCInPlxcblwiICtcbiAgICAgICAgICAgICAgICBcIjxpbnB1dCB0eXBlPSdoaWRkZW4nIG5hbWU9J190b2tlbicgdmFsdWU9J1wiICsgJCgnbWV0YVtuYW1lPVwiY3NyZi10b2tlblwiXScpLmF0dHIoJ2NvbnRlbnQnKSArIFwiJz5cXG5cIiArXG4gICAgICAgICAgICAgICAgJzwvZm9ybT5cXG4nO1xuICAgICAgICB9IGVsc2UgeyByZXR1cm4gJyc7IH1cbiAgICB9KVxuICAgICAgICAuYXR0cignaHJlZicsICcjJylcbiAgICAgICAgLmF0dHIoJ3N0eWxlJywgJ2N1cnNvcjpwb2ludGVyOycpXG4gICAgICAgIC5hdHRyKCdvbmNsaWNrJywgJyQodGhpcykuZmluZChcImZvcm1cIikuc3VibWl0KCk7Jyk7XG59XG5cbi8qKlxuICogUGxhY2UgYW55IGpRdWVyeS9oZWxwZXIgcGx1Z2lucyBpbiBoZXJlLlxuICovXG4kKGZ1bmN0aW9uICgpIHtcbiAgICAvKipcbiAgICAgKiBBZGQgdGhlIGRhdGEtbWV0aG9kPVwiZGVsZXRlXCIgZm9ybXMgdG8gYWxsIGRlbGV0ZSBsaW5rc1xuICAgICAqL1xuICAgIGFkZERlbGV0ZUZvcm1zKCk7XG5cbiAgICAvKipcbiAgICAgKiBEaXNhYmxlIGFsbCBzdWJtaXQgYnV0dG9ucyBvbmNlIGNsaWNrZWRcbiAgICAgKi9cbiAgICAkKCdmb3JtJykuc3VibWl0KGZ1bmN0aW9uICgpIHtcbiAgICAgICAgJCh0aGlzKS5maW5kKCdpbnB1dFt0eXBlPVwic3VibWl0XCJdJykuYXR0cignZGlzYWJsZWQnLCB0cnVlKTtcbiAgICAgICAgJCh0aGlzKS5maW5kKCdidXR0b25bdHlwZT1cInN1Ym1pdFwiXScpLmF0dHIoJ2Rpc2FibGVkJywgdHJ1ZSk7XG4gICAgICAgIHJldHVybiB0cnVlO1xuICAgIH0pO1xuXG4gICAgLyoqXG4gICAgICogR2VuZXJpYyBjb25maXJtIGZvcm0gZGVsZXRlIHVzaW5nIFN3ZWV0IEFsZXJ0XG4gICAgICovXG4gICAgJCgnYm9keScpLm9uKCdzdWJtaXQnLCAnZm9ybVtuYW1lPWRlbGV0ZV9pdGVtXScsIGZ1bmN0aW9uIChlKSB7XG4gICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcblxuICAgICAgICBjb25zdCBmb3JtID0gdGhpcztcbiAgICAgICAgY29uc3QgbGluayA9ICQoJ2FbZGF0YS1tZXRob2Q9XCJkZWxldGVcIl0nKTtcbiAgICAgICAgY29uc3QgY2FuY2VsID0gKGxpbmsuYXR0cignZGF0YS10cmFucy1idXR0b24tY2FuY2VsJykpID8gbGluay5hdHRyKCdkYXRhLXRyYW5zLWJ1dHRvbi1jYW5jZWwnKSA6ICdDYW5jZWxhcic7XG4gICAgICAgIGNvbnN0IGNvbmZpcm0gPSAobGluay5hdHRyKCdkYXRhLXRyYW5zLWJ1dHRvbi1jb25maXJtJykpID8gbGluay5hdHRyKCdkYXRhLXRyYW5zLWJ1dHRvbi1jb25maXJtJykgOiAnRWxpbWluYXInO1xuICAgICAgICBjb25zdCB0aXRsZSA9IChsaW5rLmF0dHIoJ2RhdGEtdHJhbnMtdGl0bGUnKSkgPyBsaW5rLmF0dHIoJ2RhdGEtdHJhbnMtdGl0bGUnKSA6ICdFc3TDoSBzZWd1cm8gcXVlIGRlc2VhIGVsaW1pbmFybG8/JztcblxuICAgICAgICBTd2FsLmZpcmUoe1xuICAgICAgICAgICAgdGl0bGU6IHRpdGxlLFxuICAgICAgICAgICAgc2hvd0NhbmNlbEJ1dHRvbjogdHJ1ZSxcbiAgICAgICAgICAgIGNvbmZpcm1CdXR0b25UZXh0OiBjb25maXJtLFxuICAgICAgICAgICAgY2FuY2VsQnV0dG9uVGV4dDogY2FuY2VsLFxuICAgICAgICAgICAgaWNvbjogJ3dhcm5pbmcnXG4gICAgICAgIH0pLnRoZW4oKHJlc3VsdCkgPT4ge1xuICAgICAgICAgICAgcmVzdWx0LnZhbHVlICYmIGZvcm0uc3VibWl0KCk7XG4gICAgICAgIH0pO1xuICAgIH0pLm9uKCdjbGljaycsICdhW25hbWU9Y29uZmlybV9pdGVtXScsIGZ1bmN0aW9uIChlKSB7XG4gICAgICAgIC8qKlxuICAgICAgICAgKiBHZW5lcmljICdhcmUgeW91IHN1cmUnIGNvbmZpcm0gYm94XG4gICAgICAgICAqL1xuICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG5cbiAgICAgICAgY29uc3QgbGluayA9ICQodGhpcyk7XG4gICAgICAgIGNvbnN0IHRpdGxlID0gKGxpbmsuYXR0cignZGF0YS10cmFucy10aXRsZScpKSA/IGxpbmsuYXR0cignZGF0YS10cmFucy10aXRsZScpIDogJ0VzdMOhIHNlZ3VybyBxdWUgZGVzZWEgaGFjZXIgZXN0bz8nO1xuICAgICAgICBjb25zdCBjYW5jZWwgPSAobGluay5hdHRyKCdkYXRhLXRyYW5zLWJ1dHRvbi1jYW5jZWwnKSkgPyBsaW5rLmF0dHIoJ2RhdGEtdHJhbnMtYnV0dG9uLWNhbmNlbCcpIDogJ0NhbmNlbGFyJztcbiAgICAgICAgY29uc3QgY29uZmlybSA9IChsaW5rLmF0dHIoJ2RhdGEtdHJhbnMtYnV0dG9uLWNvbmZpcm0nKSkgPyBsaW5rLmF0dHIoJ2RhdGEtdHJhbnMtYnV0dG9uLWNvbmZpcm0nKSA6ICdDb250aW51YXInO1xuXG4gICAgICAgIFN3YWwuZmlyZSh7XG4gICAgICAgICAgICB0aXRsZTogdGl0bGUsXG4gICAgICAgICAgICBzaG93Q2FuY2VsQnV0dG9uOiB0cnVlLFxuICAgICAgICAgICAgY29uZmlybUJ1dHRvblRleHQ6IGNvbmZpcm0sXG4gICAgICAgICAgICBjYW5jZWxCdXR0b25UZXh0OiBjYW5jZWwsXG4gICAgICAgICAgICBpY29uOiAnaW5mbydcbiAgICAgICAgfSkudGhlbigocmVzdWx0KSA9PiB7XG4gICAgICAgICAgICByZXN1bHQudmFsdWUgJiYgd2luZG93LmxvY2F0aW9uLmFzc2lnbihsaW5rLmF0dHIoJ2hyZWYnKSk7XG4gICAgICAgIH0pO1xuICAgIH0pO1xuXG4gICAgLy8gQ2hhbmdlIFRhYiBvbiBsb2FkXG4gICAgLy8gdmFyIGhhc2ggPSB3aW5kb3cubG9jYXRpb24uaGFzaDtcbiAgICAvLyBoYXNoICYmICQoJ3VsLm5hdiBhW2hyZWY9XCInICsgaGFzaCArICdcIl0nKS50YWIoJ3Nob3cnKTtcbiAgICAvL1xuICAgIC8vICQoJy5uYXYtdGFicyBsaSA+IGEnKS5vbignY2xpY2snLCBmdW5jdGlvbiAoZSkge1xuICAgIC8vICAgICAkKHRoaXMpLnRhYignc2hvdycpO1xuICAgIC8vICAgICBoaXN0b3J5LnB1c2hTdGF0ZShudWxsLG51bGwsIHRoaXMuaGFzaCk7XG4gICAgLy8gfSk7XG5cbiAgICB2YXIgdXJsID0gZG9jdW1lbnQuVVJMO1xuICAgIHZhciBoYXNoID0gdXJsLnN1YnN0cmluZyh1cmwuaW5kZXhPZignIycpKTtcblxuICAgICQoXCIubmF2LXRhYnNcIikuZmluZChcImxpIGFcIikuZWFjaChmdW5jdGlvbihrZXksIHZhbCkge1xuICAgICAgICBpZiAoaGFzaCA9PSAkKHZhbCkuYXR0cignaHJlZicpKSB7XG4gICAgICAgICAgICAkKHZhbCkuY2xpY2soKTtcbiAgICAgICAgfVxuXG4gICAgICAgICQodmFsKS5jbGljayhmdW5jdGlvbihreSwgdmwpIHtcbiAgICAgICAgICAgIGxvY2F0aW9uLmhhc2ggPSAkKHRoaXMpLmF0dHIoJ2hyZWYnKTtcbiAgICAgICAgfSk7XG4gICAgfSk7XG5cbiAgICAkKCd0YWJsZScpLm9uKCdkcmF3LmR0JywgZnVuY3Rpb24oKSB7XG4gICAgICAgICQoJ1tkYXRhLXRvZ2dsZT1cInRvb2x0aXBcIl0nKS50b29sdGlwKCk7XG4gICAgICAgICQoJ1tkYXRhLXRvZ2dsZT1cInBvcG92ZXJcIl0nKS5wb3BvdmVyKHtcbiAgICAgICAgICAgIHRyaWdnZXI6IFwiaG92ZXJcIlxuICAgICAgICB9KTtcbiAgICAgICAgS1RBcHAuaW5pdFRvb2x0aXBzKCk7XG4gICAgfSk7XG5cbiAgICAkKCcuc2VsZWN0MicpLnNlbGVjdDIoe1xuICAgICAgICBsYW5ndWFnZToge1xuICAgICAgICAgICAgbm9SZXN1bHRzOiBmdW5jdGlvbigpIHtcbiAgICAgICAgICAgICAgICByZXR1cm4gJ0xvIHNlbnRpbW9zLCBubyBoYXkgcmVzdWx0YWRvcyEnO1xuICAgICAgICAgICAgfVxuICAgICAgICB9LFxuXG4gICAgICAgIHBsYWNlaG9sZGVyOiBmdW5jdGlvbigpe1xuICAgICAgICAgICAgJCh0aGlzKS5kYXRhKCdwbGFjZWhvbGRlcicpO1xuICAgICAgICB9XG4gICAgfSk7XG59KTtcblxuXG5sZXQgaW5pdERlc2t0b3BUb29sdGlwcyA9IGZ1bmN0aW9uKCkge1xuICAgIGlmIChLVFV0aWwuaXNJblJlc3BvbnNpdmVSYW5nZSgnZGVza3RvcCcpKSB7XG4gICAgICAgICQoJ1tkYXRhLXRvZ2dsZT1cImt0LXRvb2x0aXAtZGVza3RvcFwiXScpLmVhY2goZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICBLVEFwcC5pbml0VG9vbHRpcCgkKHRoaXMpKTtcbiAgICAgICAgfSk7XG4gICAgfSBlbHNlIHtcbiAgICAgICAgJCgnW2RhdGEtdG9nZ2xlPVwia3QtdG9vbHRpcC1kZXNrdG9wXCJdJykuZWFjaChmdW5jdGlvbigpIHtcbiAgICAgICAgICAgICQodGhpcykudG9vbHRpcCgnZGlzcG9zZScpO1xuICAgICAgICB9KTtcbiAgICB9XG59O1xuXG5pbml0RGVza3RvcFRvb2x0aXBzKCk7XG5LVFV0aWwuYWRkUmVzaXplSGFuZGxlcihpbml0RGVza3RvcFRvb2x0aXBzKTtcbiJdLCJzb3VyY2VSb290IjoiIn0=