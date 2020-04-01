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


