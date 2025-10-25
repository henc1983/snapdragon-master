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

/***/ "./src/scripts/ajax-searchbar.js":
/*!***************************************!*\
  !*** ./src/scripts/ajax-searchbar.js ***!
  \***************************************/
/***/ (() => {

eval("{class SnapdragonAjaxSearch {\r\n    constructor(e) {\r\n        this.e = e;\r\n        this.input = e.querySelector( 'input[name=\"s\"]' );\r\n        this.content = e.querySelector( '.content' );\r\n        this.typingTimerMainInput;\r\n        this.typingInterval = 300;\r\n        this.opened = false;\r\n\r\n        this.input.addEventListener( 'input' , (e)=>this.onInput(e) );\r\n        this.input.addEventListener( 'keyup' , (e)=>this.onKeyUp(e) );\r\n        this.input.addEventListener( 'focus' , (e)=>this.onKeyUp(e) );\r\n        this.input.addEventListener( 'keydown' , (e)=>this.onKeyDown(e) );\r\n    }\r\n\r\n    doneTypingMainInput() {\r\n        if ( this.input.value.length > 2 && !this.content.querySelector('.spinner-animation') ) {\r\n            const spinnerTemplate = document.getElementById('loader-animation-template');\r\n            let spinner = spinnerTemplate.content.cloneNode(true);\r\n            this.content.appendChild(spinner)\r\n        }\r\n    }\r\n    \r\n    onInput(e) {\r\n        if( this.input.value.length > 2) {\r\n            this.content.style.setProperty( 'display' , 'block')\r\n            return;\r\n        } \r\n        \r\n        this.content.style.removeProperty( 'display' );\r\n        return;\r\n    }\r\n\r\n    onKeyUp(e) {\r\n        clearTimeout(this.typingTimerMainInput);\r\n        this.typingTimerMainInput = setTimeout(() => this.doneTypingMainInput(), this.typingInterval);\r\n    }\r\n\r\n    onKeyDown(e) {\r\n        clearTimeout(this.typingTimerMainInput);\r\n    }\r\n\r\n}\r\n\r\ndocument.addEventListener('DOMContentLoaded', function(){\r\n    document.snapdragonSearchbar = {}\r\n    document.querySelectorAll('.searchbar').forEach((e) => {\r\n        return Object.assign(document.snapdragonSearchbar,{ [e.getAttribute('id')] : new SnapdragonAjaxSearch(e) });\r\n    });\r\n});\n\n//# sourceURL=webpack://snapdragon/./src/scripts/ajax-searchbar.js?\n}");

/***/ }),

/***/ "./src/scripts/dropdown.js":
/*!*********************************!*\
  !*** ./src/scripts/dropdown.js ***!
  \*********************************/
/***/ (() => {

eval("{class SnapdragonDropdown {\r\n    constructor( e ) {\r\n        this.e          = e\r\n        this.toggle     = e.querySelector( '.toggle' )\r\n        this.icon       = e.querySelector( '.icon' )\r\n        this.content    = e.querySelector( '.content' )\r\n        \r\n        this.toggle.addEventListener( 'click' , (e)=>this.toggling(e) )\r\n        window.addEventListener( 'click' , (e)=>this.clickOnBody(e) )\r\n    }\r\n    \r\n    clickOnBody(e) {\r\n        if( !e.target.matches( `#${this.e.id}.dropdown, #${this.e.id}.dropdown *` ) ) {\r\n            this.deactivate()\r\n        }\r\n        \r\n    }\r\n\r\n    toggling(e) {\r\n        e.preventDefault();\r\n        this.e.classList.contains( 'active' ) ? this.deactivate(e) : this.activate(e);\r\n    }\r\n    \r\n    on(e) {\r\n        e.preventDefault();\r\n        this.activate(e);\r\n    }\r\n    \r\n    off(e) {\r\n        e.preventDefault();\r\n        this.deactivate();\r\n    }\r\n\r\n    activate() {\r\n        this.icon.style.rotate = '-180deg';\r\n        this.e.classList.add( 'active' )\r\n        this.content.style.display = 'block';\r\n        \r\n        setTimeout( ()=>{\r\n            this.content.style.translate = '0 0';\r\n            this.content.style.opacity = 1;\r\n        }, 50 );\r\n    }\r\n    \r\n    deactivate() {\r\n        this.icon.style.rotate = '0deg';\r\n        this.e.classList.remove( 'active' );\r\n        this.content.style.translate = '0 calc(1/4*100%)';\r\n        this.content.style.opacity = 0;\r\n        \r\n        setTimeout( ()=>{\r\n            this.content.removeAttribute('style');\r\n        }, 300 );\r\n    }\r\n}\r\n\r\ndocument.addEventListener('DOMContentLoaded', function(){\r\n    document.snapdragonDropdown = {}\r\n    document.querySelectorAll('.dropdown').forEach((e) => {\r\n        return Object.assign(document.snapdragonDropdown,{ [e.getAttribute('id')] : new SnapdragonDropdown(e) });\r\n    });\r\n});\n\n//# sourceURL=webpack://snapdragon/./src/scripts/dropdown.js?\n}");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	__webpack_modules__["./src/scripts/dropdown.js"]();
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./src/scripts/ajax-searchbar.js"]();
/******/ 	
/******/ })()
;