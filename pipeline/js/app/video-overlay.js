/*
 ** Toggle Video Overlay
 **
 ** @author: Peter Laxalt
 ** @description: Functions to show/hide the video overlay.
 */

function initVideoOverlay() {
  let videoToggleClass = "video-toggle";
  let videoOverlayClass = "video-overlay";

  const toggleVideoOverlay = e => {
    let videoOverlay = document.getElementsByClassName(videoOverlayClass)[0];

    if (videoOverlay.classList.contains("visible")) {
      document.body.classList.remove("scroll-lock");
      videoOverlay.classList.remove("visible");
    } else {
      document.body.classList.add("scroll-lock");
      videoOverlay.classList.add("visible");
    }

    return;
  };

  document.addEventListener(
    "click",
    function(event) {
      // If the clicked element doesn't have the right selector, bail
      if (!event.target.classList.contains(videoToggleClass)) return;

      // Don't follow the link
      event.preventDefault();

      // Log the clicked element in the console
      toggleVideoOverlay(event);
    },
    false
  );
}

initVideoOverlay();
