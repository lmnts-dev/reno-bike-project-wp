/*
 ** @author: Alisha Garric
 ** @description: Remove items from cart
 */

function initRemoveItem() {

    const removeItem = e => {
        var itemIndex = e.target.dataset.item;
        
        const state = {};
        const title = 'Update Cart';
        const url = '/cart/change?line=' + itemIndex + '&amp;quantity=0';
        
        window.location.href = url;

        return;
    };

    document.addEventListener(
        "click",
        function(event) {
          // If the clicked element doesn't have the right selector, bail
          if (!event.target.classList.contains("remove-item")) return;
    
          // Don't follow the link
          event.preventDefault();
    
          // Log the clicked element in the console
          removeItem(event);
        },
        false
    );
}
  
initRemoveItem();




/*
 ** Toggle Search Overlay
 **
 ** @author: Peter Laxalt
 ** @description: Functions to show/hide the newsletter overlay.
 */

function initSearchOverlay() {
    let searchToggleClass = "search-toggle";
    let newsletterOverlayClass = "search-overlay";
  
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
        if (!event.target.classList.contains(searchToggleClass)) return;
  
        // Don't follow the link
        event.preventDefault();
  
        // Log the clicked element in the console
        toggleNavOverlay(event);
      },
      false
    );
  }
  
  initSearchOverlay();
  