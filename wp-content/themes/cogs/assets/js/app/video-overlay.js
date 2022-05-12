/*
 ** Toggle Video Overlay
 **
 ** @author: Peter Laxalt
 ** @description: Functions to show/hide the video overlay.
 */

function initVideoOverlay() {
  let videoToggleClass = "video-toggle";
  let videoOverlayClass = "video-overlay";
  let videoOverlay = document.getElementsByClassName(videoOverlayClass)[0];

  if (videoOverlay) {
    const toggleVideoOverlay = (e) => {
      if (videoOverlay.classList.contains("visible")) {
        let src = videoOverlay.querySelector('iframe').src.replace("autoplay=1", "autoplay=0");
        videoOverlay.querySelector('iframe').src = src;
        document.body.classList.remove("scroll-lock");
        videoOverlay.classList.remove("visible");
      } else {
        let src = videoOverlay.querySelector('iframe').src.replace("autoplay=0", "autoplay=1");
        videoOverlay.querySelector('iframe').src = src;
        document.body.classList.add("scroll-lock");
        videoOverlay.classList.add("visible");
      }

      return;
    };

    document.addEventListener(
      "click",
      function (event) {
        // If the clicked element doesn't have the right selector, bail
        if (!event.target.classList.contains(videoToggleClass)) return;

        // Don't follow the link
        event.preventDefault();

        // Log the clicked element in the console
        toggleVideoOverlay(event);
      },
      false
    );
  } else {
    return;
  }
}

initVideoOverlay();
// __appFunctions.BEFORE_ENTER.push(initVideoOverlay);