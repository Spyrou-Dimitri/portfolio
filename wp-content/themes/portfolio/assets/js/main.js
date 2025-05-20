/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./wp-content/themes/portfolio/resources/js/main.js":
/*!**********************************************************!*\
  !*** ./wp-content/themes/portfolio/resources/js/main.js ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _settings__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./settings */ "./wp-content/themes/portfolio/resources/js/settings.js");
/* harmony import */ var _observers__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./observers */ "./wp-content/themes/portfolio/resources/js/observers.js");


_observers__WEBPACK_IMPORTED_MODULE_1__.observers.init();

/***/ }),

/***/ "./wp-content/themes/portfolio/resources/js/observers.js":
/*!***************************************************************!*\
  !*** ./wp-content/themes/portfolio/resources/js/observers.js ***!
  \***************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   observers: () => (/* binding */ observers)
/* harmony export */ });
/* harmony import */ var _settings__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./settings */ "./wp-content/themes/portfolio/resources/js/settings.js");

var observers = {
  appearLeftElements: document.querySelectorAll("[data-animation='".concat(_settings__WEBPACK_IMPORTED_MODULE_0__.settings.appearLeftClass, "']")),
  appearElements: document.querySelectorAll("[data-animation='".concat(_settings__WEBPACK_IMPORTED_MODULE_0__.settings.appearClass, "']")),
  appearLeftBallElements: document.querySelectorAll("[data-animation='".concat(_settings__WEBPACK_IMPORTED_MODULE_0__.settings.appearLeftBallCLass, "']")),
  comingLeftBallsElement: document.querySelectorAll("[data-animation='".concat(_settings__WEBPACK_IMPORTED_MODULE_0__.settings.comingLeftBallsClass, "']")),
  comingRightBallsElement: document.querySelectorAll("[data-animation='".concat(_settings__WEBPACK_IMPORTED_MODULE_0__.settings.comingRightBallsClass, "']")),
  cueCareerReverseElement: document.querySelectorAll("[data-animation='".concat(_settings__WEBPACK_IMPORTED_MODULE_0__.settings.cueCareerReverse, "']")),
  cueCareerNormalElement: document.querySelectorAll("[data-animation='".concat(_settings__WEBPACK_IMPORTED_MODULE_0__.settings.cueCareerNormal, "']")),
  init: function init() {
    this.comingLeftBallsElement.forEach(function (element) {
      element.classList.add(_settings__WEBPACK_IMPORTED_MODULE_0__.settings.noOpacityClass);
    });
    this.comingRightBallsElement.forEach(function (element) {
      element.classList.add(_settings__WEBPACK_IMPORTED_MODULE_0__.settings.noOpacityClass);
    });
    this.appearElements.forEach(function (element) {
      element.classList.add(_settings__WEBPACK_IMPORTED_MODULE_0__.settings.noOpacityClass);
    });
    this.appearLeftElements.forEach(function (element) {
      element.classList.add(_settings__WEBPACK_IMPORTED_MODULE_0__.settings.noOpacityClass);
    });
    this.appearLeftBallElements.forEach(function (element) {
      element.classList.add(_settings__WEBPACK_IMPORTED_MODULE_0__.settings.noOpacityClass);
    });
    this.cueCareerReverseObserver = new IntersectionObserver(this.cueCareerReverseAnimate, {
      root: null,
      rootMargin: "-25% 0px -75% 0px",
      threshold: 0
    });
    this.cueCareerNormalObserver = new IntersectionObserver(this.cueCareerNormalAnimate, {
      root: null,
      rootMargin: "-25% 0px -75% 0px",
      threshold: 0
    });
    this.comingLeftBallsObserver = new IntersectionObserver(this.comingLeftBallsAnimate, {
      root: null,
      rootMargin: "-50% 0px -50% 0px",
      threshold: 0
    });
    this.leavingLeftBallsObserver = new IntersectionObserver(this.leavingLeftBallsAnimate, {
      root: null,
      rootMargin: "-25% 0px -75% 0px",
      threshold: 0
    });
    this.comingRightBallsObserver = new IntersectionObserver(this.comingRightBallsAnimate, {
      root: null,
      rootMargin: "-50% 0px -50% 0px",
      threshold: 0
    });
    this.leavingRightBallsObserver = new IntersectionObserver(this.leavingRightBallsAnimate, {
      root: null,
      rootMargin: "-25% 0px -75% 0px",
      threshold: 0
    });
    this.appearObserver = new IntersectionObserver(this.appearAnimate, {
      threshold: 0.5
    });
    this.appearLeftObserver = new IntersectionObserver(this.appearLeftAnimate, {
      threshold: 0.5
    });
    this.appearLeftBallObserver = new IntersectionObserver(this.appearLeftBallAnimate, {
      threshold: 0.5
    });
    this.observerAction();
  },
  appearLeftAnimate: function appearLeftAnimate(elements) {
    var visibleElements = elements.filter(function (el) {
      return el.isIntersecting;
    }).slice().reverse();
    visibleElements.forEach(function (element, index) {
      element.target.classList.add(_settings__WEBPACK_IMPORTED_MODULE_0__.settings.appearLeftClass);
      element.target.classList.remove(_settings__WEBPACK_IMPORTED_MODULE_0__.settings.noOpacityClass);
    });
  },
  comingLeftBallsAnimate: function comingLeftBallsAnimate(elements) {
    elements.forEach(function (element) {
      if (element.isIntersecting) {
        element.target.classList.add(_settings__WEBPACK_IMPORTED_MODULE_0__.settings.comingLeftBallsClass);
        element.target.classList.remove(_settings__WEBPACK_IMPORTED_MODULE_0__.settings.noOpacityClass);
      }
    });
  },
  leavingLeftBallsAnimate: function leavingLeftBallsAnimate(elements) {
    elements.forEach(function (element) {
      if (element.isIntersecting) {
        element.target.classList.remove(_settings__WEBPACK_IMPORTED_MODULE_0__.settings.comingLeftBallsClass);
        element.target.classList.add(_settings__WEBPACK_IMPORTED_MODULE_0__.settings.leavingLeftBallClass);
      }
    });
  },
  leavingRightBallsAnimate: function leavingRightBallsAnimate(elements) {
    elements.forEach(function (element) {
      if (element.isIntersecting) {
        element.target.classList.remove(_settings__WEBPACK_IMPORTED_MODULE_0__.settings.comingRightBallsClass);
        element.target.classList.add(_settings__WEBPACK_IMPORTED_MODULE_0__.settings.leavingRightBallClass);
      }
    });
  },
  comingRightBallsAnimate: function comingRightBallsAnimate(elements) {
    elements.forEach(function (element) {
      if (element.isIntersecting) {
        element.target.classList.add(_settings__WEBPACK_IMPORTED_MODULE_0__.settings.comingRightBallsClass);
        element.target.classList.remove(_settings__WEBPACK_IMPORTED_MODULE_0__.settings.noOpacityClass);
      }
    });
  },
  cueCareerReverseAnimate: function cueCareerReverseAnimate(elements) {
    elements.forEach(function (element) {
      if (element.isIntersecting) {
        element.target.classList.add(_settings__WEBPACK_IMPORTED_MODULE_0__.settings.cueCareerReverse);
      }
    });
  },
  cueCareerNormalAnimate: function cueCareerNormalAnimate(elements) {
    elements.forEach(function (element) {
      if (element.isIntersecting) {
        element.target.classList.add(_settings__WEBPACK_IMPORTED_MODULE_0__.settings.cueCareerNormal);
      }
    });
  },
  appearLeftBallAnimate: function appearLeftBallAnimate(elements) {
    elements.forEach(function (element) {
      if (element.isIntersecting) {
        element.target.classList.add(_settings__WEBPACK_IMPORTED_MODULE_0__.settings.appearLeftBallCLass);
        element.target.classList.remove(_settings__WEBPACK_IMPORTED_MODULE_0__.settings.noOpacityClass);
      }
    });
  },
  appearAnimate: function appearAnimate(elements) {
    var index = 0;
    elements.forEach(function (element) {
      if (element.isIntersecting) {
        setTimeout(function () {
          element.target.classList.add(_settings__WEBPACK_IMPORTED_MODULE_0__.settings.appearClass);
          element.target.classList.remove(_settings__WEBPACK_IMPORTED_MODULE_0__.settings.noOpacityClass);
        }, index * 200);
        index++;
      }
    });
  },
  observerAction: function observerAction() {
    var _this = this;
    this.cueCareerReverseElement.forEach(function (element) {
      _this.cueCareerReverseObserver.observe(element);
    });
    this.cueCareerNormalElement.forEach(function (element) {
      _this.cueCareerNormalObserver.observe(element);
    });
    this.comingLeftBallsElement.forEach(function (element) {
      _this.comingLeftBallsObserver.observe(element);
      _this.leavingLeftBallsObserver.observe(element);
    });
    this.comingRightBallsElement.forEach(function (element) {
      _this.comingRightBallsObserver.observe(element);
      _this.leavingRightBallsObserver.observe(element);
    });
    this.appearLeftBallElements.forEach(function (element) {
      _this.appearLeftBallObserver.observe(element);
    });
    this.appearElements.forEach(function (element) {
      _this.appearObserver.observe(element);
    });
    this.appearLeftElements.forEach(function (element) {
      _this.appearLeftObserver.observe(element);
    });
  }
};

/*
root: null,
            rootMargin: "-25% 0px -75% 0px",
 */

/***/ }),

/***/ "./wp-content/themes/portfolio/resources/js/settings.js":
/*!**************************************************************!*\
  !*** ./wp-content/themes/portfolio/resources/js/settings.js ***!
  \**************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   settings: () => (/* binding */ settings)
/* harmony export */ });
var settings = {
  appearClass: 'appear',
  appearLeftClass: 'appearLeft',
  noOpacityClass: 'opacity_none',
  appearLeftBallCLass: 'appearLeftBall',
  comingLeftBallsClass: 'comingLeftBalls',
  comingRightBallsClass: 'comingRightBalls',
  leavingLeftBallClass: 'leavingLeftBalls',
  leavingRightBallClass: 'leavingRightBalls',
  cueCareerNormal: 'cueCareerNormal',
  cueCareerReverse: 'cueCareerReverse'
};

/***/ }),

/***/ "./wp-content/themes/portfolio/resources/scss/main.scss":
/*!**************************************************************!*\
  !*** ./wp-content/themes/portfolio/resources/scss/main.scss ***!
  \**************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


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
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/wp-content/themes/portfolio/assets/js/main": 0,
/******/ 			"wp-content/themes/portfolio/assets/css/main": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunkportfolio"] = self["webpackChunkportfolio"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["wp-content/themes/portfolio/assets/css/main"], () => (__webpack_require__("./wp-content/themes/portfolio/resources/js/main.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["wp-content/themes/portfolio/assets/css/main"], () => (__webpack_require__("./wp-content/themes/portfolio/resources/scss/main.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;