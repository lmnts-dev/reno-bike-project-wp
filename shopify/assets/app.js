"use strict";

/*
 ** @author: Peter Laxalt
 ** @description: Super simple custom cursor library.
 */
function initCursor() {
  var cursor = document.querySelector(".cursor");
  var cursorOutline = document.querySelector(".cursor-outline");

  function setCursorPosition(e) {
    cursor.setAttribute("style", "opacity: 1; transform: translate(" + e.clientX + "px," + e.clientY + "px)");
    cursorOutline.setAttribute("style", "opacity: 1; transform: translate(" + e.clientX + "px," + e.clientY + "px)");
  }

  document.addEventListener("mousemove", setCursorPosition, false);
}

initCursor();
// App Javascript File
"use strict";
"use strict";

/*
 ** @author: Peter Laxalt
 ** @description: Functions to show/hide the newsletter overlay.
 */
function initNewsletter() {
  var newsletterBtnClass = "btn-newsletter";
  var newsletterOverlayClass = "newsletter-overlay";

  var toggleNavOverlay = function toggleNavOverlay(e) {
    var newsletterOverlay = document.getElementsByClassName(newsletterOverlayClass)[0];

    if (newsletterOverlay.classList.contains("visible")) {
      document.body.classList.remove("scroll-lock");
      newsletterOverlay.classList.remove("visible");
    } else {
      document.body.classList.add("scroll-lock");
      newsletterOverlay.classList.add("visible");
    }

    return;
  };

  document.addEventListener("click", function (event) {
    // If the clicked element doesn't have the right selector, bail
    if (!event.target.classList.contains(newsletterBtnClass)) return; // Don't follow the link

    event.preventDefault(); // Log the clicked element in the console

    toggleNavOverlay(event);
  }, false);
}

initNewsletter();
"use strict";

/*
 ** @author: Peter Laxalt
 ** @description: Super simple script for the Bike Wheel SVG to
 ** follow the mouse position.
 */
function initBikeWheel() {
  var rotated = document.getElementsByClassName("bike-wheel-el")[0];

  if (rotated != undefined) {
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
  }
}

initBikeWheel();
"use strict";

/*
 ** Toggle Search Overlay
 **
 ** @author: Peter Laxalt
 ** @description: Functions to show/hide the newsletter overlay.
 */
function initSearchOverlay() {
  var searchToggleClass = "search-toggle";
  var newsletterOverlayClass = "search-overlay";

  var toggleNavOverlay = function toggleNavOverlay(e) {
    var newsletterOverlay = document.getElementsByClassName(newsletterOverlayClass)[0];

    if (newsletterOverlay.classList.contains("visible")) {
      document.body.classList.remove("scroll-lock");
      newsletterOverlay.classList.remove("visible");
    } else {
      document.body.classList.add("scroll-lock");
      newsletterOverlay.classList.add("visible");
    }

    return;
  };

  document.addEventListener("click", function (event) {
    // If the clicked element doesn't have the right selector, bail
    if (!event.target.classList.contains(searchToggleClass)) return; // Don't follow the link

    event.preventDefault(); // Log the clicked element in the console

    toggleNavOverlay(event);
  }, false);
}

initSearchOverlay();