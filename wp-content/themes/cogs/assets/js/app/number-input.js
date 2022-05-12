/*
 ** @author: Alisha Garric
 ** @description: Functions to change number input's values
 */

function initInputNumberIcons() {
    let inputDecrementClass = "input-number-decrement";
    let inputIncrementClass = "input-number-increment";
  
    const changeInputValue = e => {

      if (event.target.classList.contains(inputDecrementClass)) {
        let inputTag = event.target.nextSibling;
        decrement( inputTag);
      } else {
        let inputTag = event.target.previousSibling;
        increment( inputTag);
      }
  
      return;
    };
  
    document.addEventListener(
      "click",
      function(event) {

        // If the clicked element doesn't have the right selector, bail
        if (!(event.target.classList.contains(inputDecrementClass) || event.target.classList.contains(inputIncrementClass)) ) return;
        changeInputValue(event);
      },
      false
    );
  }
  
  initInputNumberIcons();


  function decrement( input ) {
    var value = input.value;
    var min = 0;
    value--;
    if( value >= min) {
      input.value = value;
    }
  }

  function increment( input ) {
    var value = input.value;
    value++;
    input.value = value++;
  }
