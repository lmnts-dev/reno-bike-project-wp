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
    enter: function enter(_ref2) {// do something with `next.container` for your enter transition
      // then return a promise or use `this.async()`

      var current = _ref2.current,
          next = _ref2.next,
          trigger = _ref2.trigger;
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
// Vendor Javascript File
"use strict";
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