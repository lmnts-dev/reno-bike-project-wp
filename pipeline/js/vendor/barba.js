/**
 *
 * Barba.js settings
 * @author Peter Laxalt
 * @see https://barba.js.org/docs/userguide/markup/
 *
 */

// basic default transition (with no rules and minimal hooks)
barba.init({
  transitions: [
    {
      leave({ current, next, trigger }) {
        // do something with `current.container` for your leave transition
        // then return a promise or use `this.async()`
      },
      beforeEnter({ current, next, trigger }) {
        var lazyLoadInstance = new LazyLoad({
          elements_selector: ".lazy"
        });

        var rotated = document.getElementsByClassName("bike-wheel-el")[0];
        window.addEventListener(
          "mousemove",
          function(ev) {
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
          },
          false
        );
      }
    }
  ]
});

// // dummy example to illustrate rules and hooks
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
