// App Javascript File
"use strict";
"use strict";

/*
 ** @author: Peter Laxalt
 ** @description: Super simple custom cursor library.
 */
var cursor = document.querySelector(".cursor");
var cursorOutline = document.querySelector(".cursor-outline");

function setCursorPosition(e) {
  cursor.setAttribute("style", "opacity: 1; transform: translate(" + e.clientX + "px," + e.clientY + "px)");
  cursorOutline.setAttribute("style", "opacity: 1; transform: translate(" + e.clientX + "px," + e.clientY + "px)");
}

document.addEventListener("mousemove", setCursorPosition, false);