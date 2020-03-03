/*
 ** @author: Peter Laxalt
 ** @description: Functions to show/hide the newsletter overlay.
 */

let newsletterBtnClass = "btn-newsletter";
let newsletterOverlayClass = "newsletter-overlay";

const toggleNavOverlay = e => {
  let newsletterOverlay = document.getElementsByClassName(
    newsletterOverlayClass
  )[0];

  if (newsletterOverlay.classList.contains("visible")) {
    document.body.classList.remove("scroll-lock");
    newsletterOverlay.classList.remove("visible");
  } else {
    document.body.classList.add("scroll-lock");
    newsletterOverlay.classList.add("visible");
  }

  return;
};

document.addEventListener(
  "click",
  function(event) {
    // If the clicked element doesn't have the right selector, bail
    if (!event.target.classList.contains(newsletterBtnClass)) return;

    // Don't follow the link
    event.preventDefault();

    // Log the clicked element in the console
    toggleNavOverlay(event);
  },
  false
);
