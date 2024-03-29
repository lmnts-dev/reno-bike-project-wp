/*
 ** Toggle Search Overlay
 **
 ** @author: Peter Laxalt
 ** @description: Functions to show/hide the newsletter overlay.
 */

function initSearchOverlay() {

  let searchToggleClass = "search-toggle";
  let searchOverlayClass = "search-overlay";

  const toggleSearchOverlay = e => {
    
    let newsletterOverlay = document.getElementsByClassName(
      searchOverlayClass
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
      if (!event.target.classList.contains(searchToggleClass)) return;
      
      // Don't follow the link
      event.preventDefault();

      // Log the clicked element in the console
      toggleSearchOverlay(event);
    },
    false
  );
}

initSearchOverlay();
