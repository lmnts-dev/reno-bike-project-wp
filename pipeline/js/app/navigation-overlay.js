/*
 ** @author: Peter Laxalt
 ** @description: Functions to show/hide the navigation overlay.
 */

const navigationBtnClass = "nav-overlay-toggle";
const navigationOverlayClass = "overlay-nav-container";
const navigationOverlay = document.getElementsByClassName(
  navigationOverlayClass
)[0];


function toggleNavOverlay(e) {
  if (navigationOverlay.classList.contains("visible")) {
    // console.log("CLOSE!");
    document.body.classList.remove("scroll-lock");
    navigationOverlay.classList.remove("visible");
    document.getElementsByTagName("header")[0].classList.remove("hidden");
  } else {
    // console.log("SHOW!");
    document.body.classList.add("scroll-lock");
    navigationOverlay.classList.add("visible");
    document.getElementsByTagName("header")[0].classList.add("hidden");
  }
}

function initNavOverlay() {
  console.log("init");
  document.addEventListener(
    "click",
    function(event) {
      // If the clicked element doesn't have the right selector, bail
      if (!event.target.classList.contains(navigationBtnClass)) {
        // console.log("WRONG TARGET");
        return;
      } else {
        // Don't follow the link
        event.preventDefault();

        // Log the clicked element in the console
        toggleNavOverlay(event);
      }
    },
    false
  );
}

initNavOverlay();