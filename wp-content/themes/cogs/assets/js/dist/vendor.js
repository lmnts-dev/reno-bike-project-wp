"use strict";

/**
 *
 * Barba.js settings
 * @author Peter Laxalt
 * @see https://barba.js.org/docs/userguide/markup/
 *
 */
// basic default transition (with no rules and minimal hooks)
barba.init({
  transitions: [{
    leave: function leave(_ref) {// do something with `current.container` for your leave transition
      // then return a promise or use `this.async()`

      var current = _ref.current,
          next = _ref.next,
          trigger = _ref.trigger;
    },
    beforeEnter: function beforeEnter(_ref2) {
      var current = _ref2.current,
          next = _ref2.next,
          trigger = _ref2.trigger;
      // Scroll to top of page
      window.scrollTo(0, 0); // Re-init our Lazy Loading

      var lazyLoadInstance = new LazyLoad({
        elements_selector: ".lazy"
      }); // Re-init our bicycle wheel script.

      var rotated = document.getElementsByClassName("bike-wheel-el")[0];

      if (rotated != undefined) {
        window.addEventListener("mousemove", function (ev) {
          ev.preventDefault();
          ev.stopPropagation();
          var deltaX = ev.pageX - innerWidth / 2;
          var deltaY = ev.pageY - innerHeight / 2;
          var angle = Math.atan(deltaX / deltaY);

          if (deltaY < 0) {
            rotated.style.transform = "rotate(" + -angle + "rad)";
          } else {
            rotated.style.transform = "rotate(" + (Math.PI - angle) + "rad)";
          }
        }, false);
      }
    }
  }]
}); // // dummy example to illustrate rules and hooks
// barba.init({
//   transitions: [{
//     name: 'dummy-transition',
//     // apply only when leaving `[data-barba-namespace="home"]`
//     from: 'home',
//     // apply only when transitioning to `[data-barba-namespace="products | contact"]`
//     to: {
//       namespace: [
//         'products',
//         'contact'
//       ]
//     },
//     // apply only if clicked link contains `.cta`
//     custom: ({ current, next, trigger })
//       => trigger.classList && trigger.classList.contains('cta'),
//     // do leave and enter concurrently
//     sync: true,
//     // available hooks…
//     beforeOnce() {},
//     once() {},
//     afterOnce() {},
//     beforeLeave() {},
//     leave() {},
//     afterLeave() {},
//     beforeEnter() {},
//     enter() {},
//     afterEnter() {}
//   }]
// });
"use strict";

/**
 *
 * Lazyload.js settings
 * @author Peter Laxalt
 * @see https://www.andreaverlicchi.eu/lazyload/
 *
 */
var lazyLoadInstance = new LazyLoad({
  elements_selector: ".lazy"
});
// Vendor Javascript File
"use strict";