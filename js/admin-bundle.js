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
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.createProduct = createProduct;
exports.editProduct = editProduct;
exports.confirmEditProduct = confirmEditProduct;
exports.removeProduct = removeProduct;
exports.confirmRemoveProduct = confirmRemoveProduct;

var _ProductHelper = __webpack_require__(7);

/**
 * Created by alexandrzanko on 2/1/18.
 */
var product;
jQuery(document).ready(function ($) {
  product = new _ProductHelper.ProductHelper();
});

function createProduct() {
  product.create();
}

function editProduct(element) {
  product.edit(element);
}

function confirmEditProduct(element) {
  product.confirmEdit(element);
}

function removeProduct(element) {
  product.remove(element);
}

function confirmRemoveProduct(element) {
  product.confirmRemove(element);
}

/***/ }),
/* 1 */,
/* 2 */,
/* 3 */,
/* 4 */,
/* 5 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.AjaxHelper = void 0;

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/**
 * Created by alexandrzanko on 2/7/18.
 */
var AjaxHelper =
/*#__PURE__*/
function () {
  function AjaxHelper() {
    _classCallCheck(this, AjaxHelper);
  }

  _createClass(AjaxHelper, [{
    key: "wp_post_data",
    value: function wp_post_data(action, data) {
      var beforeSend = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : function () {
        console.log('beforeSend');
      };
      var success = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : function (request) {
        console.log('success');
        console.log(request);
      };
      var error = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : function () {
        console.log('error');
      };
      $.ajax({
        type: 'POST',
        url: ajaxurl,
        data: {
          'action': action,
          data: data
        },
        dataType: 'json',
        beforeSend: beforeSend,
        success: success,
        error: error
      });
    }
  }]);

  return AjaxHelper;
}();

exports.AjaxHelper = AjaxHelper;

/***/ }),
/* 6 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.Routing = void 0;

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/**
 * Created by alexandrzanko on 2/7/18.
 */
var Routing =
/*#__PURE__*/
function () {
  function Routing() {
    _classCallCheck(this, Routing);
  }

  _createClass(Routing, [{
    key: "createProduct",
    value: function createProduct() {
      return 'create_product';
    }
  }, {
    key: "editProduct",
    value: function editProduct() {
      return 'edit_product';
    }
  }, {
    key: "getProductById",
    value: function getProductById() {
      return 'get_product_by_id';
    }
  }, {
    key: "removeProduct",
    value: function removeProduct() {
      return 'remove_product';
    }
  }]);

  return Routing;
}();

exports.Routing = Routing;

/***/ }),
/* 7 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.ProductHelper = void 0;

var _AjaxHelper = __webpack_require__(5);

var _Routing = __webpack_require__(6);

var _ProductTemplates = __webpack_require__(8);

var _Utils = __webpack_require__(9);

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var ProductHelper =
/*#__PURE__*/
function () {
  function ProductHelper() {
    _classCallCheck(this, ProductHelper);

    self = this;
    this.rout = new _Routing.Routing();
    this.ajax = new _AjaxHelper.AjaxHelper();
    $('.clear-image').click(this.clearImage);
    $('.load-image').click(this.getImage);
    $('#edit-clear-image').click(this.clearEditImage);
    $('#edit-load-image').click(this.getEditImage);
    $('#close-product').click(this.hideCollapseForm);
  }

  _createClass(ProductHelper, [{
    key: "edit",
    value: function edit(element) {
      var tr = $(element).parent().parent();
      var id = $(tr).attr('data-id');
      this.ajax.wp_post_data(this.rout.getProductById(), {
        'id': id
      }, this.beforeLoad, this.successLoad, this.errorLoad);
    }
  }, {
    key: "beforeLoad",
    value: function beforeLoad() {
      $('#edit-product-form').append(_ProductTemplates.ProductTemplates.loading());
    }
  }, {
    key: "successLoad",
    value: function successLoad(response) {
      setTimeout(function () {
        self.pullEditForm(response.product);
        $('#edit-product-form .loading').fadeOut();
      }, 200);
    }
  }, {
    key: "errorLoad",
    value: function errorLoad() {
      alert('error');
    }
  }, {
    key: "pullEditForm",
    value: function pullEditForm(product) {
      $('#edit-product-name').val(product.name);
      $('#edit-product-description').val(product.description);
      $('#edit-product-image-url').val(product.img_url);
      $('#edit-product-id').val(product.id);
      $('#edit-product-image').attr('src', product.img_url);
    }
  }, {
    key: "confirmEdit",
    value: function confirmEdit() {
      var name = $.trim($("#edit-product-name").val());

      if (name.length > 0) {
        this.ajax.wp_post_data(this.rout.editProduct(), _Utils.Utils.objectifyForm($('#edit-product-form').serializeArray()), this.beforeEdit, this.successEdit, this.errorEdit);
      } else {
        alert('Product name is require');
      }
    }
  }, {
    key: "beforeEdit",
    value: function beforeEdit() {
      $('#edit-product-form #spinner').css({
        opacity: 0,
        display: 'inline-block'
      }).animate({
        opacity: 1
      }, 600);
    }
  }, {
    key: "successEdit",
    value: function successEdit(response) {
      $('#edit-product-form #spinner').fadeOut(); // self.showRequestAlert(response);

      if (response.status == 'success') {
        self.updateProduct(response.product);
        alert('Successful');
      } else if (response.status == 1) {
        alert('Nothing edited');
      } else {
        alert('Server error');
      }
    }
  }, {
    key: "errorEdit",
    value: function errorEdit() {
      $('#edit-product-form #spinner').fadeOut();
      alert('Server error');
    }
  }, {
    key: "updateProduct",
    value: function updateProduct(product) {
      var tr = $("tr[data-id=".concat(product.id, "]"));
      tr.children('td').eq(0).html(product.name);
      tr.children('td').eq(1).html(product.description);
      tr.children('td').eq(2).children('img').attr('src', product.img_url);
    }
  }, {
    key: "create",
    value: function create() {
      var name = $.trim($("#product-name").val());

      if (name.length > 0) {
        this.ajax.wp_post_data(this.rout.createProduct(), _Utils.Utils.objectifyForm($('#add-product-form').serializeArray()), this.beforeCreating, this.successCreating, this.errorCreating);
      } else {
        $('#product-name').css({
          'border-color': '#f5c6cb',
          'background-color': '#f8d7da'
        });
        this.showErrorAddProductAlert('Product name is require');
      }
    }
  }, {
    key: "beforeCreating",
    value: function beforeCreating() {
      self.hideMessageAddProduct();
      $('#spinner').css({
        opacity: 0,
        display: 'inline-block'
      }).animate({
        opacity: 1
      }, 600);
    }
  }, {
    key: "successCreating",
    value: function successCreating(response) {
      $('#spinner').fadeOut();
      self.showRequestAlert(response);

      if (response.status == 'success') {
        self.addProductOnScreen(response.product);
        $('#add-product-form')[0].reset();
        $('#product-name').removeAttr('style');
        self.clearImage();
      }
    }
  }, {
    key: "errorCreating",
    value: function errorCreating() {
      $('#spinner').fadeOut();
      self.showRequestAlert(null);
    }
  }, {
    key: "hideCollapseForm",
    value: function hideCollapseForm() {
      $('#collapseExample').collapse('hide');
    }
  }, {
    key: "getImage",
    value: function getImage() {
      var img = $('.product-image');

      wp.media.editor.send.attachment = function (props, attachment) {
        img.attr('src', attachment.url);
        $('.input-product-image').attr('value', attachment.url);
      };

      wp.media.editor.open($(this));
    }
  }, {
    key: "getEditImage",
    value: function getEditImage() {
      var img = $('#edit-product-image');

      wp.media.editor.send.attachment = function (props, attachment) {
        img.attr('src', attachment.url);
        $('#edit-product-image-url').attr('value', attachment.url);
      };

      wp.media.editor.open($(this));
    }
  }, {
    key: "clearImage",
    value: function clearImage() {
      var img = $('.product-image');
      img.attr('src', img.attr('data-src'));
      $('.input-product-image').attr('value', '');
    }
  }, {
    key: "clearEditImage",
    value: function clearEditImage() {
      var img = $('#edit-product-image');
      img.attr('src', img.attr('data-src'));
      $('#edit-product-image-url').attr('value', '');
    }
  }, {
    key: "addProductOnScreen",
    value: function addProductOnScreen(product) {
      $("#products-table-body").prepend(_ProductTemplates.ProductTemplates.getProductTR(product));
    }
  }, {
    key: "hideEditModal",
    value: function hideEditModal() {}
  }, {
    key: "showRequestAlert",
    value: function showRequestAlert(data) {
      if (data) {
        var code = data.status;

        switch (code) {
          case 1:
            this.showErrorAddProductAlert('This name exist');
            break;

          case 'success':
            this.showSuccessAddProductAlert('Product add successful');
            break;

          default:
            this.showErrorAddProductAlert('Server error');
            break;
        }
      } else {
        this.showErrorAddProductAlert('Server error');
      }
    }
  }, {
    key: "showSuccessAddProductAlert",
    value: function showSuccessAddProductAlert(message) {
      this.showMessageAddProduct(message, true);
    }
  }, {
    key: "showErrorAddProductAlert",
    value: function showErrorAddProductAlert(message) {
      this.showMessageAddProduct(message, false);
    }
  }, {
    key: "showMessageAddProduct",
    value: function showMessageAddProduct(message, isSuccess) {
      var alertClass = isSuccess ? 'col-8 mr-sm-auto alert alert-success rounded-0 mb-0' : 'col-8 mr-sm-auto alert alert-danger rounded-0 mb-0';
      $('#message-alert').attr('class', alertClass).html(message);
    }
  }, {
    key: "hideMessageAddProduct",
    value: function hideMessageAddProduct() {
      $('#message-alert').attr('class', 'col-8 mr-sm-auto alert alert-danger invisible rounded-0 mb-0');
    }
  }, {
    key: "remove",
    value: function remove(element) {
      var tr = $(element).parent().parent();
      var id = $(tr).attr('data-id');
      var name = $(tr).attr('data-name');
      $('#removeProduct .modal-body strong').html(name);
      $('#removeProduct .confirm-remove-product').attr('data-remove-id', id);
    }
  }, {
    key: "confirmRemove",
    value: function confirmRemove(element) {
      var id = $(element).attr('data-remove-id');
      this.ajax.wp_post_data(this.rout.removeProduct(), {
        'id': id
      }, function () {
        $('#spinner-remove').css({
          opacity: 0,
          display: 'inline-block'
        }).animate({
          opacity: 1
        }, 600);
      }, function (response) {
        $('#spinner-remove').fadeOut();
        setTimeout(function () {
          $('.confirm-remove-product span').html('Removed');
          setTimeout(function () {
            $('#removeProduct').modal('hide');
            $('.confirm-remove-product span').html('Remove');
            $("tr[data-id=".concat(response.id, "]")).fadeOut();
          }, 600);
        }, 300);
      });
    }
  }]);

  return ProductHelper;
}();

exports.ProductHelper = ProductHelper;

/***/ }),
/* 8 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.ProductTemplates = void 0;

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/**
 * Created by alexandrzanko on 2/7/18.
 */
var ProductTemplates =
/*#__PURE__*/
function () {
  function ProductTemplates() {
    _classCallCheck(this, ProductTemplates);
  }

  _createClass(ProductTemplates, null, [{
    key: "getProductTR",
    value: function getProductTR(product) {
      return "<tr data-id=\"".concat(product.id, "\" data-name=\"").concat(product.name, "\">\n                    <td>").concat(product.name, "</td>\n                    <td>").concat(product.description, "</td>\n                    <td><img src=\"").concat(product.img_url, "\" width=\"100\" height=\"75\" alt=\"\"></td>\n                    <td><button class=\"btn btn-warning rounded-0 text-white\"><i class=\"fas fa-edit\"></i></button></td>\n                    <td><button class=\"btn btn-danger rounded-0 text-white remove-product-button\"\n                        data-toggle=\"modal\"\n                        data-target=\"#removeProduct\"\n                        onclick=\"app.removeProduct(this);\"><i class=\"fas fa-trash-alt\"></i></button></td>\n                </tr>");
    }
  }, {
    key: "loading",
    value: function loading() {
      return "<div class=\"loading\">\n                      <i class=\"fas fa-sync fa-spin fa-3x text-secondary\"></i>\n                </div>";
    }
  }]);

  return ProductTemplates;
}();

exports.ProductTemplates = ProductTemplates;

/***/ }),
/* 9 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.Utils = void 0;

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/**
 * Created by alexandrzanko on 2/7/18.
 */
var Utils =
/*#__PURE__*/
function () {
  function Utils() {
    _classCallCheck(this, Utils);
  }

  _createClass(Utils, null, [{
    key: "objectifyForm",

    /**
     * formArray - $(form).serializeArray();
     * @param formArray
     * @returns {{}}
     */
    value: function objectifyForm(formArray) {
      //serialize data function
      var form = {};

      for (var i = 0; i < formArray.length; i++) {
        form[formArray[i]['name']] = formArray[i]['value'];
      }

      return form;
    }
  }]);

  return Utils;
}();

exports.Utils = Utils;

/***/ })
/******/ ]);
//# sourceMappingURL=admin-bundle.js.map