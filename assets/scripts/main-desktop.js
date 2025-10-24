/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/scripts/dropdown-navitem.js":
/*!*****************************************!*\
  !*** ./src/scripts/dropdown-navitem.js ***!
  \*****************************************/
/***/ (() => {

eval("{class SnapdragonDropdown {\r\n    constructor( e ) {\r\n        this.e          = e\r\n        this.toggle     = e.querySelector( '.toggle' )\r\n        this.icon       = e.querySelector( '.icon' )\r\n        this.content    = e.querySelector( '.content' )\r\n        \r\n        this.toggle.addEventListener( 'mouseover' , (e)=>this.activate(e) )\r\n        this.e.addEventListener( 'mouseleave' , (e)=>this.deactivate(e) )        \r\n    }\r\n    \r\n    activate(e) {\r\n        e.preventDefault();\r\n        this.icon.style.rotate = '-90deg';\r\n        this.e.classList.add( 'active' )\r\n        this.content.style.display = 'block';\r\n        setTimeout( ()=>{\r\n            this.content.style.translate = '0 0';\r\n            this.content.style.opacity = 1;\r\n        }, 50 );\r\n    }\r\n    \r\n    deactivate(e) {\r\n        e.preventDefault();\r\n        this.icon.style.rotate = '0deg';\r\n        this.e.classList.remove( 'active' );\r\n        this.content.style.translate = '0 calc(1/4*100%)';\r\n        this.content.style.opacity = 0;\r\n        setTimeout( ()=>{\r\n            this.content.style.display = 'none';\r\n            this.content.removeAttribute('style');\r\n        }, 250 );\r\n    }\r\n}\r\n\r\ndocument.addEventListener('DOMContentLoaded', function(){\r\n    document.snapdragonDropdown = {}\r\n    document.querySelectorAll('.dropdown').forEach((e) => {\r\n        return Object.assign(document.snapdragonDropdown,{ [e.getAttribute('id')] : new SnapdragonDropdown(e) });\r\n    });\r\n});\n\n//# sourceURL=webpack://snapdragon/./src/scripts/dropdown-navitem.js?\n}");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./src/scripts/dropdown-navitem.js"]();
/******/ 	
/******/ })()
;