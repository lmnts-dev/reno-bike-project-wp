/*
 ** Social Share Dialogs
 **
 ** @author: Peter Laxalt
 ** @description: Functions to initiate social sharing.
 */

function initSocialOverlay() {
  let socialShareLink = "social-share";

  const toggleSocialOverlay = e => {
    console.log(e);

    window.open(
      e.target.dataset.href,
      "Share",
      "left=20,top=20,width=500,height=500,toolbar=1,resizable=0"
    );
    return false;
  };

  document.addEventListener(
    "click",
    function(event) {
      // If the clicked element doesn't have the right selector, bail
      if (!event.target.classList.contains(socialShareLink)) return;

      // Log the clicked element in the console
      toggleSocialOverlay(event);
    },
    false
  );
}

initSocialOverlay();
