/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ 53:
/***/ (function(__unused_webpack_module, exports, __webpack_require__) {



var __importDefault = this && this.__importDefault || function (mod) {
  return mod && mod.__esModule ? mod : {
    "default": mod
  };
};

Object.defineProperty(exports, "__esModule", ({
  value: true
}));

var choices_js_1 = __importDefault(__webpack_require__(61));

var jquery_1 = __importDefault(__webpack_require__(311));

console.log('READY');
var $fields = (0, jquery_1["default"])('select[data-provides="anomaly.field_type.select"][data-search]');
console.log('fields', $fields);
$fields.each(function (index, el) {
  console.log('field', index, el);
  var $el = (0, jquery_1["default"])(el);
  var choices = new choices_js_1["default"](el, {
    shouldSort: false,
    allowHTML: true
  });
  el['_choices'] = choices;
  $el.data('choices', choices);
  $el.removeAttr('data-provides');
  console.log('field choices', index, choices, $el, el);
});

/***/ }),

/***/ 61:
/***/ ((module) => {

module.exports = Choices;

/***/ }),

/***/ 311:
/***/ ((module) => {

module.exports = jQuery;

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module is referenced by other modules so it can't be inlined
/******/ 	var __webpack_exports__ = __webpack_require__(53);
/******/ 	
/******/ })()
;