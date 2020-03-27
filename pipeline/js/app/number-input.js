

/*
 ** @author: Alisha Garric
 ** @description: Functions to change number input's values
 */

function initInputNumberIcons() {
    console.log("hey!");
    let inputDecrementClass = ".input-number-decrement";
    let inputIncrementClass = ".input-number-increment";
  
    const changeInputValue = e => {
        console.log( event );
        /*
      let inputDecrement = document.getElementsByClassName(
        inputDecrementClass
      )[0];
  
      if (newsletterOverlay.classList.contains("visible")) {
        document.body.classList.remove("scroll-lock");
        newsletterOverlay.classList.remove("visible");
      } else {
        document.body.classList.add("scroll-lock");
        newsletterOverlay.classList.add("visible");
      }
      */
  
      return;
    };
  
    document.addEventListener(
      "click",
      function(event) {
          console.log(event);
        // If the clicked element doesn't have the right selector, bail
        if (!(event.target.classList.contains(inputDecrementClass) || event.target.classList.contains(inputIncrementClass)) ) return;
            console.log("no cancel");
        // Log the clicked element in the console
        changeInputValue(event);
      },
      false
    );
  }
  
  initInputNumberIcons();
/*
  function decrement( input ) {
    var value = input[0].value;
    value--;
    if(!min || value >= min) {
      input[0].value = value;
    }
  }

  function increment( input ) {
    var value = input[0].value;
    value++;
    if(!max || value <= max) {
      input[0].value = value++;
    }
  }
  */
