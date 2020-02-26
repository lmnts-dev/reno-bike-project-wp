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
"use strict";

/*
 ** @author: Peter Laxalt
 ** @description: Super simple script for the Bike Wheel SVG to
 ** follow the mouse position.
 */
var rotated = document.getElementsByClassName("bike-wheel-el")[0];
window.addEventListener("mousemove", function (ev) {
  ev.preventDefault();
  ev.stopPropagation();
  var deltaX = ev.pageX - innerWidth / 2;
  var deltaY = ev.pageY - innerHeight / 2;
  var angle = Math.atan(deltaX / deltaY);

  if (deltaY < 0) {
    rotated.style.transform = "rotate(" + -angle + "rad)";
  } else {
    rotated.style.transform = "rotate(" + (Math.PI - angle) + "rad)";
  }
}, false);