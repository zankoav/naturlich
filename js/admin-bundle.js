var app =
/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports) {

/**
 * Created by alexandrzanko on 2/1/18.
 */
jQuery(document).ready(function ($) {
  $('.create-product').click(function () {
    var name = $.trim($("#product-name").val());

    if (name.length > 0) {
      $.ajax({
        type: 'POST',
        url: ajaxurl,
        data: $('#add-product-form').serialize(),
        dataType: 'json',
        beforeSend: function beforeSend() {
          hideMessageAddProduct();
          $('#spinner').css({
            opacity: 0,
            display: 'inline-block'
          }).animate({
            opacity: 1
          }, 600);
        },
        success: function success(data) {
          $('#spinner').fadeOut();
          showRequestAlert(data);

          if (data.status == 'success') {
            addProductOnScreen(data.product);
          }
        },
        error: function error() {
          $('#spinner').fadeOut();
          showRequestAlert(null);
        }
      });
    } else {
      showErrorAddProductAlert('Product name is require');
    }
  });
  /*
   * действие при нажатии на кнопку загрузки изображения
   * вы также можете привязать это действие к клику по самому изображению
   */

  $('.load-image').click(function () {
    var img = $('.product-image');

    wp.media.editor.send.attachment = function (props, attachment) {
      img.attr('src', attachment.url);
      $('.input-product-image').attr('value', attachment.url);
    };

    wp.media.editor.open($(this));
  });
  /*
   * удаляем значение произвольного поля
   * если быть точным, то мы просто удаляем value у input type="hidden"
   */

  $('.clear-image').click(function () {
    var img = $('.product-image');
    img.attr('src', img.attr('data-src'));
    $('.input-product-image').attr('value', '');
  });

  function showRequestAlert(data) {
    if (data) {
      var code = data.status;

      switch (code) {
        case 1:
          showErrorAddProductAlert('This name exist');
          break;

        case 'success':
          showSuccessAddProductAlert('Product add successful');
          break;

        default:
          showErrorAddProductAlert('Server error');
          break;
      }
    } else {
      showErrorAddProductAlert('Server error');
    }
  }

  function showSuccessAddProductAlert(message) {
    showMessageAddProduct(message, true);
  }

  function showErrorAddProductAlert(message) {
    showMessageAddProduct(message, false);
  }

  function showMessageAddProduct(message, isSuccess) {
    var alertClass = isSuccess ? 'col-8 mr-sm-auto alert alert-success rounded-0 mb-0' : 'col-8 mr-sm-auto alert alert-danger rounded-0 mb-0';
    $('#message-alert').attr('class', alertClass).html(message);
  }

  function hideMessageAddProduct() {
    $('#message-alert').attr('class', 'col-8 mr-sm-auto alert alert-danger invisible rounded-0 mb-0');
  }

  function addProductOnScreen(product) {
    if (product) {
      $("#products-table-body").prepend('<tr>' + "<td>".concat(product.name, "</td>") + "<td>".concat(product.description, "</td>") + "<td><img src=\"".concat(product.img_url, "\" width=\"100\" height=\"75\" alt=\"\"></td>") + '</tr>');
    }
  }
});

/***/ })
/******/ ]);
//# sourceMappingURL=admin-bundle.js.map