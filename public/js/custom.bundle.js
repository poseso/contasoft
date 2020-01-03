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
  $.fn.selectpicker.Constructor.BootstrapVersion = '4';
  $('.kt-selectpicker').selectpicker({
    noneResultsText: 'No se encontraron resultados para: {0}'
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
var languages = {
  en: {
    path: '/custom/datatables/en'
  },
  es: {
    path: '/custom/datatables/es'
  }
};

function getLanguage() {
  var lang = $('html').attr('lang');
  var url = languages[lang].path + '.json';
  $.ajax({
    url: url
  }).done(function (obj) {
    var result = $.extend({}, obj, languages[lang]);

    (function ($, DataTable) {
      // Datatable global configuration
      $.extend(true, DataTable.defaults, {
        language: result
      });
    })(jQuery, jQuery.fn.dataTable);
  });
}

getLanguage();

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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvY3VzdG9tLmpzIl0sIm5hbWVzIjpbIiQiLCJhamF4U2V0dXAiLCJiZWZvcmVTZW5kIiwieGhyIiwidHlwZSIsImNyb3NzRG9tYWluIiwic2V0UmVxdWVzdEhlYWRlciIsImF0dHIiLCJjb21wbGV0ZSIsInJlc3BvbnNlIiwic3RhdHVzIiwiYWRkRGVsZXRlRm9ybXMiLCJhcHBlbmQiLCJmaW5kIiwibGVuZ3RoIiwic3VibWl0Iiwib24iLCJlIiwicHJldmVudERlZmF1bHQiLCJmb3JtIiwibGluayIsImNhbmNlbCIsImNvbmZpcm0iLCJ0aXRsZSIsIlN3YWwiLCJmaXJlIiwic2hvd0NhbmNlbEJ1dHRvbiIsImNvbmZpcm1CdXR0b25UZXh0IiwiY2FuY2VsQnV0dG9uVGV4dCIsImljb24iLCJ0aGVuIiwicmVzdWx0IiwidmFsdWUiLCJ3aW5kb3ciLCJsb2NhdGlvbiIsImFzc2lnbiIsImhhc2giLCJ0YWIiLCJoaXN0b3J5IiwicHVzaFN0YXRlIiwiYmluZCIsImRvY3VtZW50IiwiY2xpY2siLCJ0cmlnZ2VyIiwidG9vbHRpcCIsInBvcG92ZXIiLCJpbml0RGVza3RvcFRvb2x0aXBzIiwic2VsZWN0MiIsImxhbmd1YWdlIiwibm9SZXN1bHRzIiwicGxhY2Vob2xkZXIiLCJkYXRhIiwiZm4iLCJzZWxlY3RwaWNrZXIiLCJDb25zdHJ1Y3RvciIsIkJvb3RzdHJhcFZlcnNpb24iLCJub25lUmVzdWx0c1RleHQiLCJLVFV0aWwiLCJpc0luUmVzcG9uc2l2ZVJhbmdlIiwiZWFjaCIsIktUQXBwIiwiaW5pdFRvb2x0aXAiLCJhZGRSZXNpemVIYW5kbGVyIiwibGFuZ3VhZ2VzIiwiZW4iLCJwYXRoIiwiZXMiLCJnZXRMYW5ndWFnZSIsImxhbmciLCJ1cmwiLCJhamF4IiwiZG9uZSIsIm9iaiIsImV4dGVuZCIsIkRhdGFUYWJsZSIsImRlZmF1bHRzIiwialF1ZXJ5IiwiZGF0YVRhYmxlIl0sIm1hcHBpbmdzIjoiOzs7Ozs7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QUFELENBQUQsQ0FBVU8sSUFBVixDQUFlLE1BQWYsQ0FBWDtBQUNBLE1BQUk4RCxHQUFHLEdBQUdOLFNBQVMsQ0FBQ0ssSUFBRCxDQUFULENBQWdCSCxJQUFoQixHQUF1QixPQUFqQztBQUVBakUsR0FBQyxDQUFDc0UsSUFBRixDQUFPO0FBQ0hELE9BQUcsRUFBRUE7QUFERixHQUFQLEVBRUdFLElBRkgsQ0FFUSxVQUFVQyxHQUFWLEVBQWU7QUFDbkIsUUFBSXpDLE1BQU0sR0FBRy9CLENBQUMsQ0FBQ3lFLE1BQUYsQ0FBUyxFQUFULEVBQWFELEdBQWIsRUFBa0JULFNBQVMsQ0FBQ0ssSUFBRCxDQUEzQixDQUFiOztBQUNBLEtBQUMsVUFBVXBFLENBQVYsRUFBYTBFLFNBQWIsRUFBd0I7QUFDckI7QUFDQTFFLE9BQUMsQ0FBQ3lFLE1BQUYsQ0FBUyxJQUFULEVBQWVDLFNBQVMsQ0FBQ0MsUUFBekIsRUFBbUM7QUFDL0IzQixnQkFBUSxFQUFFakI7QUFEcUIsT0FBbkM7QUFHSCxLQUxELEVBS0c2QyxNQUxILEVBS1dBLE1BQU0sQ0FBQ3hCLEVBQVAsQ0FBVXlCLFNBTHJCO0FBTUgsR0FWRDtBQVdIOztBQUVEVixXQUFXLEciLCJmaWxlIjoiL2pzL2N1c3RvbS5idW5kbGUuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvKlxuICogUGxhY2UgdGhlIENTUkYgdG9rZW4gYXMgYSBoZWFkZXIgb24gYWxsIHBhZ2VzIGZvciBhY2Nlc3MgaW4gQUpBWCByZXF1ZXN0c1xuICovXG4kLmFqYXhTZXR1cCh7XG4gICAgYmVmb3JlU2VuZDogZnVuY3Rpb24oeGhyLCB0eXBlKSB7XG4gICAgICAgIGlmICghdHlwZS5jcm9zc0RvbWFpbikge1xuICAgICAgICAgICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoJ1gtQ1NSRi1Ub2tlbicsICQoJ21ldGFbbmFtZT1cImNzcmYtdG9rZW5cIl0nKS5hdHRyKCdjb250ZW50JykpO1xuICAgICAgICB9XG4gICAgfSxcbiAgICBjb21wbGV0ZTogZnVuY3Rpb24ocmVzcG9uc2UsIHN0YXR1cywgeGhyKXtcbiAgICAgICAgYWRkRGVsZXRlRm9ybXMoKTtcbiAgICB9XG59KTtcblxuLyoqXG4gKiBBbGxvd3MgeW91IHRvIGFkZCBkYXRhLW1ldGhvZD1cIk1FVEhPRCB0byBsaW5rcyB0byBhdXRvbWF0aWNhbGx5IGluamVjdCBhIGZvcm1cbiAqIHdpdGggdGhlIG1ldGhvZCBvbiBjbGlja1xuICpcbiAqIEV4YW1wbGU6IDxhIGhyZWY9XCJ7e3JvdXRlKCdjdXN0b21lcnMuZGVzdHJveScsICRjdXN0b21lci0+aWQpfX1cIlxuICogZGF0YS1tZXRob2Q9XCJkZWxldGVcIiBuYW1lPVwiZGVsZXRlX2l0ZW1cIj5EZWxldGU8L2E+XG4gKlxuICogSW5qZWN0cyBhIGZvcm0gd2l0aCB0aGF0J3MgZmlyZWQgb24gY2xpY2sgb2YgdGhlIGxpbmsgd2l0aCBhIERFTEVURSByZXF1ZXN0LlxuICogR29vZCBiZWNhdXNlIHlvdSBkb24ndCBoYXZlIHRvIGRpcnR5IHlvdXIgSFRNTCB3aXRoIGRlbGV0ZSBmb3JtcyBldmVyeXdoZXJlLlxuICovXG5mdW5jdGlvbiBhZGREZWxldGVGb3JtcygpIHtcbiAgICAkKCdbZGF0YS1tZXRob2RdJykuYXBwZW5kKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgaWYgKCEkKHRoaXMpLmZpbmQoJ2Zvcm0nKS5sZW5ndGggPiAwKSB7XG4gICAgICAgICAgICByZXR1cm4gXCJcXG48Zm9ybSBhY3Rpb249J1wiICsgJCh0aGlzKS5hdHRyKCdocmVmJykgKyBcIicgbWV0aG9kPSdQT1NUJyBuYW1lPSdkZWxldGVfaXRlbScgc3R5bGU9J2Rpc3BsYXk6bm9uZSc+XFxuXCIgK1xuICAgICAgICAgICAgICAgIFwiPGlucHV0IHR5cGU9J2hpZGRlbicgbmFtZT0nX21ldGhvZCcgdmFsdWU9J1wiICsgJCh0aGlzKS5hdHRyKCdkYXRhLW1ldGhvZCcpICsgXCInPlxcblwiICtcbiAgICAgICAgICAgICAgICBcIjxpbnB1dCB0eXBlPSdoaWRkZW4nIG5hbWU9J190b2tlbicgdmFsdWU9J1wiICsgJCgnbWV0YVtuYW1lPVwiY3NyZi10b2tlblwiXScpLmF0dHIoJ2NvbnRlbnQnKSArIFwiJz5cXG5cIiArXG4gICAgICAgICAgICAgICAgJzwvZm9ybT5cXG4nO1xuICAgICAgICB9IGVsc2UgeyByZXR1cm4gJyc7IH1cbiAgICB9KVxuICAgICAgICAuYXR0cignaHJlZicsICcjJylcbiAgICAgICAgLmF0dHIoJ3N0eWxlJywgJ2N1cnNvcjpwb2ludGVyOycpXG4gICAgICAgIC5hdHRyKCdvbmNsaWNrJywgJyQodGhpcykuZmluZChcImZvcm1cIikuc3VibWl0KCk7Jyk7XG59XG5cbi8qKlxuICogUGxhY2UgYW55IGpRdWVyeS9oZWxwZXIgcGx1Z2lucyBpbiBoZXJlLlxuICovXG4kKGZ1bmN0aW9uICgpIHtcbiAgICAvKipcbiAgICAgKiBBZGQgdGhlIGRhdGEtbWV0aG9kPVwiZGVsZXRlXCIgZm9ybXMgdG8gYWxsIGRlbGV0ZSBsaW5rc1xuICAgICAqL1xuICAgIGFkZERlbGV0ZUZvcm1zKCk7XG5cbiAgICAvKipcbiAgICAgKiBEaXNhYmxlIGFsbCBzdWJtaXQgYnV0dG9ucyBvbmNlIGNsaWNrZWRcbiAgICAgKi9cbiAgICAkKCdmb3JtJykuc3VibWl0KGZ1bmN0aW9uICgpIHtcbiAgICAgICAgJCh0aGlzKS5maW5kKCdpbnB1dFt0eXBlPVwic3VibWl0XCJdJykuYXR0cignZGlzYWJsZWQnLCB0cnVlKTtcbiAgICAgICAgJCh0aGlzKS5maW5kKCdidXR0b25bdHlwZT1cInN1Ym1pdFwiXScpLmF0dHIoJ2Rpc2FibGVkJywgdHJ1ZSk7XG4gICAgICAgIHJldHVybiB0cnVlO1xuICAgIH0pO1xuXG4gICAgLyoqXG4gICAgICogR2VuZXJpYyBjb25maXJtIGZvcm0gZGVsZXRlIHVzaW5nIFN3ZWV0IEFsZXJ0XG4gICAgICovXG4gICAgJCgnYm9keScpLm9uKCdzdWJtaXQnLCAnZm9ybVtuYW1lPWRlbGV0ZV9pdGVtXScsIGZ1bmN0aW9uIChlKSB7XG4gICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcblxuICAgICAgICBjb25zdCBmb3JtID0gdGhpcztcbiAgICAgICAgY29uc3QgbGluayA9ICQoJ2FbZGF0YS1tZXRob2Q9XCJkZWxldGVcIl0nKTtcbiAgICAgICAgY29uc3QgY2FuY2VsID0gKGxpbmsuYXR0cignZGF0YS10cmFucy1idXR0b24tY2FuY2VsJykpID8gbGluay5hdHRyKCdkYXRhLXRyYW5zLWJ1dHRvbi1jYW5jZWwnKSA6ICdDYW5jZWxhcic7XG4gICAgICAgIGNvbnN0IGNvbmZpcm0gPSAobGluay5hdHRyKCdkYXRhLXRyYW5zLWJ1dHRvbi1jb25maXJtJykpID8gbGluay5hdHRyKCdkYXRhLXRyYW5zLWJ1dHRvbi1jb25maXJtJykgOiAnRWxpbWluYXInO1xuICAgICAgICBjb25zdCB0aXRsZSA9IChsaW5rLmF0dHIoJ2RhdGEtdHJhbnMtdGl0bGUnKSkgPyBsaW5rLmF0dHIoJ2RhdGEtdHJhbnMtdGl0bGUnKSA6ICdFc3TDoSBzZWd1cm8gcXVlIGRlc2VhIGVsaW1pbmFybG8/JztcblxuICAgICAgICBTd2FsLmZpcmUoe1xuICAgICAgICAgICAgdGl0bGU6IHRpdGxlLFxuICAgICAgICAgICAgc2hvd0NhbmNlbEJ1dHRvbjogdHJ1ZSxcbiAgICAgICAgICAgIGNvbmZpcm1CdXR0b25UZXh0OiBjb25maXJtLFxuICAgICAgICAgICAgY2FuY2VsQnV0dG9uVGV4dDogY2FuY2VsLFxuICAgICAgICAgICAgaWNvbjogJ3dhcm5pbmcnXG4gICAgICAgIH0pLnRoZW4oKHJlc3VsdCkgPT4ge1xuICAgICAgICAgICAgcmVzdWx0LnZhbHVlICYmIGZvcm0uc3VibWl0KCk7XG4gICAgICAgIH0pO1xuICAgIH0pLm9uKCdjbGljaycsICdhW25hbWU9Y29uZmlybV9pdGVtXScsIGZ1bmN0aW9uIChlKSB7XG4gICAgICAgIC8qKlxuICAgICAgICAgKiBHZW5lcmljICdhcmUgeW91IHN1cmUnIGNvbmZpcm0gYm94XG4gICAgICAgICAqL1xuICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG5cbiAgICAgICAgY29uc3QgbGluayA9ICQodGhpcyk7XG4gICAgICAgIGNvbnN0IHRpdGxlID0gKGxpbmsuYXR0cignZGF0YS10cmFucy10aXRsZScpKSA/IGxpbmsuYXR0cignZGF0YS10cmFucy10aXRsZScpIDogJ0VzdMOhIHNlZ3VybyBxdWUgZGVzZWEgaGFjZXIgZXN0bz8nO1xuICAgICAgICBjb25zdCBjYW5jZWwgPSAobGluay5hdHRyKCdkYXRhLXRyYW5zLWJ1dHRvbi1jYW5jZWwnKSkgPyBsaW5rLmF0dHIoJ2RhdGEtdHJhbnMtYnV0dG9uLWNhbmNlbCcpIDogJ0NhbmNlbGFyJztcbiAgICAgICAgY29uc3QgY29uZmlybSA9IChsaW5rLmF0dHIoJ2RhdGEtdHJhbnMtYnV0dG9uLWNvbmZpcm0nKSkgPyBsaW5rLmF0dHIoJ2RhdGEtdHJhbnMtYnV0dG9uLWNvbmZpcm0nKSA6ICdDb250aW51YXInO1xuXG4gICAgICAgIFN3YWwuZmlyZSh7XG4gICAgICAgICAgICB0aXRsZTogdGl0bGUsXG4gICAgICAgICAgICBzaG93Q2FuY2VsQnV0dG9uOiB0cnVlLFxuICAgICAgICAgICAgY29uZmlybUJ1dHRvblRleHQ6IGNvbmZpcm0sXG4gICAgICAgICAgICBjYW5jZWxCdXR0b25UZXh0OiBjYW5jZWwsXG4gICAgICAgICAgICBpY29uOiAnaW5mbydcbiAgICAgICAgfSkudGhlbigocmVzdWx0KSA9PiB7XG4gICAgICAgICAgICByZXN1bHQudmFsdWUgJiYgd2luZG93LmxvY2F0aW9uLmFzc2lnbihsaW5rLmF0dHIoJ2hyZWYnKSk7XG4gICAgICAgIH0pO1xuICAgIH0pO1xuXG4gICAgLy8gQ2hhbmdlIFRhYiBvbiBsb2FkXG4gICAgdmFyIGhhc2ggPSB3aW5kb3cubG9jYXRpb24uaGFzaDtcbiAgICBoYXNoICYmICQoJ3VsLm5hdiBhW2hyZWY9XCInICsgaGFzaCArICdcIl0nKS50YWIoJ3Nob3cnKTtcblxuICAgICQoJy5uYXYtdGFicyBsaSA+IGEnKS5vbignY2xpY2snLCBmdW5jdGlvbiAoZSkge1xuICAgICAgICAkKHRoaXMpLnRhYignc2hvdycpO1xuICAgICAgICBoaXN0b3J5LnB1c2hTdGF0ZShudWxsLG51bGwsIHRoaXMuaGFzaCk7XG4gICAgfSk7XG5cbiAgICAkKHdpbmRvdykuYmluZCgnaGFzaGNoYW5nZScsIGZ1bmN0aW9uKCl7XG4gICAgICAgICQoJ3VsLm5hdiBhW2hyZWZePVwiJyArIGRvY3VtZW50LmxvY2F0aW9uLmhhc2ggKyAnXCJdJykuY2xpY2soKTtcbiAgICB9KTtcblxuICAgIGlmIChkb2N1bWVudC5sb2NhdGlvbi5oYXNoLmxlbmd0aCkge1xuICAgICAgICAkKHdpbmRvdykudHJpZ2dlcignaGFzaGNoYW5nZScpO1xuICAgIH1cblxuICAgICQoJ3RhYmxlJykub24oJ2RyYXcuZHQnLCBmdW5jdGlvbigpIHtcbiAgICAgICAgJCgnW2RhdGEtdG9nZ2xlPVwidG9vbHRpcFwiXScpLnRvb2x0aXAoKTtcbiAgICAgICAgJCgnW2RhdGEtdG9nZ2xlPVwicG9wb3ZlclwiXScpLnBvcG92ZXIoe1xuICAgICAgICAgICAgdHJpZ2dlcjogXCJob3ZlclwiXG4gICAgICAgIH0pO1xuXG4gICAgICAgIGluaXREZXNrdG9wVG9vbHRpcHMoKTtcbiAgICB9KTtcblxuICAgICQoJy5zZWxlY3QyJykuc2VsZWN0Mih7XG4gICAgICAgIGxhbmd1YWdlOiB7XG4gICAgICAgICAgICBub1Jlc3VsdHM6IGZ1bmN0aW9uKCkge1xuICAgICAgICAgICAgICAgIHJldHVybiAnTG8gc2VudGltb3MsIG5vIGhheSByZXN1bHRhZG9zISc7XG4gICAgICAgICAgICB9XG4gICAgICAgIH0sXG5cbiAgICAgICAgcGxhY2Vob2xkZXI6IGZ1bmN0aW9uKCl7XG4gICAgICAgICAgICAkKHRoaXMpLmRhdGEoJ3BsYWNlaG9sZGVyJyk7XG4gICAgICAgIH1cbiAgICB9KTtcblxuICAgICQuZm4uc2VsZWN0cGlja2VyLkNvbnN0cnVjdG9yLkJvb3RzdHJhcFZlcnNpb24gPSAnNCc7XG5cbiAgICAkKCcua3Qtc2VsZWN0cGlja2VyJykuc2VsZWN0cGlja2VyKHtcbiAgICAgICAgbm9uZVJlc3VsdHNUZXh0OiAnTm8gc2UgZW5jb250cmFyb24gcmVzdWx0YWRvcyBwYXJhOiB7MH0nXG4gICAgfSk7XG59KTtcblxubGV0IGluaXREZXNrdG9wVG9vbHRpcHMgPSBmdW5jdGlvbigpIHtcbiAgICBpZiAoS1RVdGlsLmlzSW5SZXNwb25zaXZlUmFuZ2UoJ2Rlc2t0b3AnKSkge1xuICAgICAgICAkKCdbZGF0YS10b2dnbGU9XCJrdC10b29sdGlwLWRlc2t0b3BcIl0nKS5lYWNoKGZ1bmN0aW9uKCkge1xuICAgICAgICAgICAgS1RBcHAuaW5pdFRvb2x0aXAoJCh0aGlzKSk7XG4gICAgICAgIH0pO1xuICAgIH0gZWxzZSB7XG4gICAgICAgICQoJ1tkYXRhLXRvZ2dsZT1cImt0LXRvb2x0aXAtZGVza3RvcFwiXScpLmVhY2goZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICAkKHRoaXMpLnRvb2x0aXAoJ2Rpc3Bvc2UnKTtcbiAgICAgICAgfSk7XG4gICAgfVxufTtcblxuaW5pdERlc2t0b3BUb29sdGlwcygpO1xuS1RVdGlsLmFkZFJlc2l6ZUhhbmRsZXIoaW5pdERlc2t0b3BUb29sdGlwcyk7XG5cbmxldCBsYW5ndWFnZXMgPSB7XG4gICAgZW46IHtcbiAgICAgICAgcGF0aDogJy9jdXN0b20vZGF0YXRhYmxlcy9lbidcbiAgICB9LFxuICAgIGVzOiB7XG4gICAgICAgIHBhdGg6ICcvY3VzdG9tL2RhdGF0YWJsZXMvZXMnXG4gICAgfVxufTtcblxuZnVuY3Rpb24gZ2V0TGFuZ3VhZ2UoKSB7XG4gICAgbGV0IGxhbmcgPSAkKCdodG1sJykuYXR0cignbGFuZycpO1xuICAgIGxldCB1cmwgPSBsYW5ndWFnZXNbbGFuZ10ucGF0aCArICcuanNvbic7XG5cbiAgICAkLmFqYXgoe1xuICAgICAgICB1cmw6IHVybCxcbiAgICB9KS5kb25lKGZ1bmN0aW9uIChvYmopIHtcbiAgICAgICAgbGV0IHJlc3VsdCA9ICQuZXh0ZW5kKHt9LCBvYmosIGxhbmd1YWdlc1tsYW5nXSk7XG4gICAgICAgIChmdW5jdGlvbiAoJCwgRGF0YVRhYmxlKSB7XG4gICAgICAgICAgICAvLyBEYXRhdGFibGUgZ2xvYmFsIGNvbmZpZ3VyYXRpb25cbiAgICAgICAgICAgICQuZXh0ZW5kKHRydWUsIERhdGFUYWJsZS5kZWZhdWx0cywge1xuICAgICAgICAgICAgICAgIGxhbmd1YWdlOiByZXN1bHRcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9KShqUXVlcnksIGpRdWVyeS5mbi5kYXRhVGFibGUpO1xuICAgIH0pO1xufVxuXG5nZXRMYW5ndWFnZSgpO1xuIl0sInNvdXJjZVJvb3QiOiIifQ==