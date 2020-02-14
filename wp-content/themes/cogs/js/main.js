window.onbeforeunload = function() {
    window.scrollTo(0, 0);
}

$(document).ready(function() {

    el = {
        document: $(document),
        window: $(window),
        html: $("html"),
        html_body: $("body"),
        body: $("body"),
        hero: $("#featured-stories"),
        main: $("main"),
        menu_toggle: $(".menu-toggle"),
        menu_item: $(".menu a"),
        menu_accordion_toggle: $(".menu-accordion-toggle"),
        header_section_placeholder: $("#section-placeholder"),
        back_to_top: $("#back-to-top"),
        footer: $("#footer")
    };

    el.html.addClass(bowser.name.toLowerCase());


    el.back_to_top.click(function(){
      $("html,body").animate({scrollTop:0}, 500, 'linear');
    });

    el.window.scroll(function() {
      if ($(this).scrollTop() > 1000) {
        el.back_to_top.addClass("active");
      } else {
        el.back_to_top.removeClass("active");
      }
    });



    // Menu
    el.menu_item.on("click", function(e) {

        e.preventDefault();

        $(".menu-toggle").trigger("click");

         //section_index = $(this).attr("data-section-index"),
        //var this_href = $(this).attr("href");

        //if($("#project-content").length && $(this).hasClass("anchor-link")) {
            //var anchor_hash = this_href;
        //jQuery().ajaxify(this_href);
            // if(section_index > 1) {
            //   el.body.attr("data-theme","dark");
            // }
        // if($("#project-content").length) {
        //
        // }
        //el.html.addClass("going-back");

        //} else {

            // if(!el.html.hasClass("is-mobile-tablet")) {
            //
            //       // Scroll next pane to top
            //       var $next_section = $(".panel-section").eq(parseInt(section_index) - 1),
            //           iscroll = $next_section.find('.fp-scrollable').data('iscrollInstance');
            //       if(iscroll && typeof iscroll !== undefined){
            //         iscroll.scrollTo(0, 0, 0);
            //       }
            //       // Timeout to scroll top all the next sections UX issue
            //       setTimeout(function() {
            //         $next_section.nextAll(".panel-section").each(function(){
            //           var iscroll = $(this).find('.fp-scrollable').data('iscrollInstance');
            //           if(iscroll && typeof iscroll !== undefined){
            //             iscroll.scrollTo(0, 0, 0);
            //           }
            //         });
            //       }, 1200);
            //
            // } else {
            //   // if($("#about").length) {
            //   //   var $panel_selector = $(".panel-section .active .panel-section-inner");
            //   // } else {
            //   var $panel_selector = $(".panel-slide").eq(parseInt(section_index) - 1).find(".panel-section-inner");
            //   // }
            //   $panel_selector.animate({scrollTop:0}, 300);
            //
            // }

            // setTimeout(function() {
            //   if ($("#project-content").length) {
            //       section_index = parseInt(section_index) + 1;
            //       // if(section_index > 2) {
            //       //     $(".project-header").fadeOut(400);
            //       // }
            //   }
            //   if(!el.html.hasClass("is-mobile-tablet")) {
            //     $.fn.fullpage.moveTo(section_index);
            //   } else {
            //     $.fn.fullpage.moveTo(1, parseInt(section_index) - 1);
            //   }
            //
            // }, 550);
        //}

    });

    el.menu_toggle.on("click", function(e) {
        el.body.toggleClass("menu-open");
        e.preventDefault();
        //$.fn.fullpage.setAllowScrolling(true);
    });

    el.menu_accordion_toggle.click(function(){
      $(".sub-menu").slideToggle(400);
      if(el.menu_accordion_toggle.text() == "+") {
        el.menu_accordion_toggle.text("-");
      } else {
        el.menu_accordion_toggle.text("+");
      }
    });

    // Fullpage
    //init_fullpage();

    // Init Animation
    el.body.imagesLoaded({
        background: true
    }, function() {
        // Temporary timeout for localhost simulation
        //setTimeout(function() {
            el.body.addClass("loaded");
            // Temporary timeout for localhost simulation
            //setTimeout(function() {
                el.body.removeClass("loading");
                setTimeout(function(){
                    $(".project-view-header").removeClass("project-view-header");
                },200);
                setTimeout(function(){
                  el.html.addClass("fully-loaded");
                }, 450);
                //check_params();
                $('[data-360-src]').each(function() {
                    var iframe = $(this);
                    iframe.attr('src', iframe.attr('data-360-src'));
                });
                // if(el.html.is('.edge, .ie')) {
                //   $.fn.fullpage.reBuild();
                // }
              // 500
            //}, 850);
        //}, 1000);
    });

    // Global Functions
    init_home();
    init_projects();

    // Ajax
    $('#main').ajaxify({
        selector : ".async",
        prefetch: false,
        refresh : true,
        scrolltop: false,
        requestDelay: 400
    });


    $(window).on('pronto.request', function(event, eventInfo) {

      jQuery.cache("f");
      el.body.addClass("init-loading");
      $link_element = $(eventInfo.currentTarget);

      $(document).off("click keydown keyup mouseenter mouseleave");
      //$(window).off("scroll");

      if((window.location.protocol + "//" + window.location.hostname) !== $link_element.attr("href")) {
        el.html.addClass("going-back");
      }

      $('.swiper-container').each(function(){
        if(this.swiper && typeof this.swiper !== undefined){
          this.swiper.destroy();
        }
      });



      // $(".fp-scrollable").each(function(){
      //   var iscroll = $(this).data('iscrollInstance')
      //   if(iscroll && typeof iscroll !== undefined){
      //     iscroll.destroy();
      //   }
      // });

      var $video_js_el = $(".video-js");

      if($video_js_el.length) {
          $video_js_el.each(function(){
            var old_player = document.getElementById(this.id);
            videojs(old_player).dispose();
          });
      }

      var data_theme = "light";

      if($link_element.hasClass("dark-theme-section")) {
        var data_theme = "dark";
      }
      //body_sub_theme = $link_element.attr("data-theme");

      // if(body_sub_theme == "") {
      //     body_sub_theme = "red";
      // }

      el.main.addClass("fade-out");
      el.body.attr("data-theme",data_theme).removeClass("loaded");

      setTimeout(function() {
          el.body.addClass("loading");
          el.window.scrollTop(0);
      }, 400);

      if($link_element.hasClass("thumb-toggle") && !el.html.hasClass("is-mobile-tablet")) {

        el.footer.addClass("is-loading thumb-expanded");

        var this_id = $link_element.attr("data-id"),
            $this_thumb = $("#" + this_id + " .index-thumb"),
            $cloned_thumb = $this_thumb.clone();

        $cloned_thumb.css("opacity","1").appendTo(".cloned-thumbs");

        $(".featured-project a").off("mouseenter mouseleave");

        // TweenMax.to($cloned_thumb, .55, {
        //     top: 0,
        //     left: 0,
        //     width: "100vw",
        //     //height: "100vh",
        //     ease: Power4.easeInOut
        // });
        setTimeout(function() {
            $(".cloned-thumbs .index-thumb").addClass("expand");
        }, 100);


      }

    });

    //$(window).on('pronto.load', function(event, eventInfo) {
         //$.fn.fullpage.destroy('all');
         //el.body.attr("data-sub-theme", "red");
    //});

    $(window).on('pronto.render', function(event, eventInfo) {

        //el.body.attr("data-sub-theme", body_sub_theme);

        //init_fullpage();
        init_home();
        init_projects();

        //$(".mobile-header em").text("");

        if(!$link_element.hasClass("thumb-toggle")) {
          el.body.addClass("loaded");
        }

        if(!$link_element.hasClass("thumb-toggle")) {
          var timeout_animation = 550;
        } else {
          var timeout_animation = 400;
        }

        setTimeout(function() {

          if(!$link_element.hasClass("thumb-toggle")) {
            el.main.removeClass("fade-out");
          } else {
            el.main.fadeTo(0, 1, function(){
              el.main.removeClass("fade-out").attr("style","");
            });
          }

          if(!$link_element.hasClass("thumb-toggle") || !$link_element.hasClass("project-toggle")) {
            el.html.removeClass("fully-loaded");
          } else {
            el.html.addClass("fully-loaded");
          }

          if($link_element.hasClass("thumb-toggle")) {
            el.body.addClass("loaded");
          }

          el.body.removeClass("loading init-loading");
          //$.fn.fullpage.reBuild();

          //$(".cloned-thumbs .index-thumb").fadeOut(400, function(){
                setTimeout(function() {
                  $(".project-view-header").removeClass("project-view-header");
                  el.footer.attr("class","");
                  $(".cloned-thumbs").empty();
                  el.html.removeClass("going-back");
                  $('[data-360-src]').each(function() {
                      var iframe = $(this);
                      iframe.attr('src', iframe.attr('data-360-src'));
                  });
                  // FIX
                  setTimeout(function() {
                    el.html.addClass("fully-loaded");
                  }, 1000);
                }, 500);
                //check_params();
          //});
          // 400
        }, timeout_animation);


    });


});

// function getParameterByName(name, url) {
//     if (!url) url = window.location.href;
//     name = name.replace(/[\[\]]/g, "\\$&");
//     var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
//         results = regex.exec(url);
//     if (!results) return null;
//     if (!results[2]) return '';
//     return decodeURIComponent(results[2].replace(/\+/g, " "));
// }

// function check_params() {
//     var get_params = getParameterByName("s");
//     if(typeof get_params !== 'undefined') {
//       if(el.html.hasClass("is-mobile-tablet")) {
//         $.fn.fullpage.setScrollingSpeed(10);
//         if(get_params == "office") {
//             $.fn.fullpage.moveTo(1, 1);
//         } else if (get_params == "people") {
//             $.fn.fullpage.moveTo(1, 2);
//         } else if (get_params == "contact") {
//             $.fn.fullpage.moveTo(1, 3);
//         }
//         setTimeout(function() {
//           $.fn.fullpage.setScrollingSpeed(700);
//         }, 500);
//       } else {
//         $.fn.fullpage.setScrollingSpeed(10);
//         if(get_params == "office") {
//             $.fn.fullpage.moveTo(2);
//         } else if (get_params == "people") {
//             $.fn.fullpage.moveTo(3);
//         } else if (get_params == "contact") {
//             $.fn.fullpage.moveTo(4);
//         }
//         setTimeout(function() {
//           $.fn.fullpage.setScrollingSpeed(700);
//         }, 500);
//       }
//     }
// }

// function init_fullpage() {
//     if(el.html.hasClass("is-mobile-tablet")) {
//         var drag_scroll_setting = "panel-section-inner";
//         var css_transform = true;
//         var disable_drag_pointer = false;
//         var responsive_slideHeight = 1200;
//     } else {
//         var drag_scroll_setting = "none";
//         var css_transform = false;
//         var disable_drag_pointer = true;
//         var responsive_slides_setting = false;
//         var responsive_slideHeight = 0;
//     }
//
//     var window_height = $(window).height();
//
//     function get_scroll_y(){
//
//       var $project_header_el = $(".project-header"),
//           $back_to_top = $("#back-to-top");
//
//       if(Math.abs(this.y) - 170 >= el.window.height()) {
//         $project_header_el.addClass("trigger-entrance");
//         $back_to_top.addClass("active");
//         if($("#intro-video").length) {
//           $("#intro-video").get(0).pause();
//         }
//       } else {
//         $project_header_el.removeClass("trigger-entrance");
//         $back_to_top.removeClass("active");
//         if($("#intro-video").length) {
//           $("#intro-video").get(0).play();
//         }
//       }
//     }
//
//     $(".main section").fullpage({
//         sectionSelector: ".panel-section",
//         slideSelector: '.panel-slide',
//         scrollOverflow: true,
//         normalScrollElements: "#navigation",
//         responsiveHeight: responsive_slideHeight,
//         scrollOverflowOptions: {
//             //preventDefault: false,
//             disablePointer: disable_drag_pointer,
//             useTransition : css_transform,
//             useTransform : css_transform,
//             probeType: 3
//             //preventDefaultException: { className: "column" }
//         },
//         resize: true,
//         css3:css_transform,
//         easingcss3: "cubic-bezier(0.860, 0.000, 0.070, 1.000)",
//         loopHorizontal: false,
//         lazyLoading: true,
//         onSlideLeave: function(anchorLink, index, slideIndex, direction, nextSlideIndex) {
//
//           var $active_panel = $(".panel-slide").eq(nextSlideIndex);
//
//           var theme = $active_panel.data("theme"),
//               section_title = $active_panel.attr("data-panel-title");
//               el.body.attr("data-theme", theme),
//               $back_to_top = $("#back-to-top");
//
//           el.header_section_placeholder.html(section_title);
//
//           var next_slide_scroll_top = $(".panel-section-inner").eq(nextSlideIndex).scrollTop();
//
//           setTimeout(function() {
//             if(next_slide_scroll_top > 250) {
//               $("#back-to-top").addClass("active");
//             } else {
//               $("#back-to-top").removeClass("active");
//             }
//           }, 500);
//
//             // $(this).scroll(function(){
//             //   if($(this).scrollTop() > 250) {
//             //     $back_to_top.addClass("active");
//             //   } else {
//             //     $back_to_top.removeClass("active");
//             //   }
//             // });
//           //});
//         },
//         onLeave: function(index, nextIndex, direction){
//
//             var $active_panel = $(".panel-section").eq(nextIndex-1);
//
//             var theme = $active_panel.data("theme"),
//                 section_title = $active_panel.attr("data-panel-title");
//                 el.body.attr("data-theme", theme),
//                 $back_to_top = $("#back-to-top");
//
//             el.header_section_placeholder.html(section_title);
//
//             if(!el.html.hasClass("is-mobile-tablet")) {
//               if(nextIndex > 1) {
//                 $back_to_top.addClass("active");
//               } else {
//                 $back_to_top.removeClass("active");
//               }
//             }
//
//             //if($("#project-content").length) {
//                 // // if(nextIndex == 1) {
//                 //     // $(".project-header").removeClass("trigger-entrance");
//                 //     // if($("#intro-video").length) {
//                 //     //     document.getElementById('intro-video').play();
//                 //     // }
//                 // //}
//                 // if(nextIndex == 1) {
//                 //     //$(".project-header").addClass("trigger-entrance");
//                 //     setTimeout(function() {
//                 //         $(".intro-video-wrapper").show();
//                 //     }, 600);
//                 //
//                 // }
//                 // if(nextIndex >= 2) {
//                 //     $(".project-header").addClass("fade-out");
//                 //     $(".intro-video-wrapper").hide();
//                 // }
//                 // if(nextIndex == 1 && index >= 2) {
//                 //     $(".project-header").removeClass("fade-out");
//                 // }
//
//             //}
//         },
//         afterRender: function(){
//
//             if(el.html.hasClass("is-mobile-tablet") && !$("#project-content").length) {
//               var $active_panel = $(".panel-slide.active");
//
//               // $(".panel-section-inner").hammer().on("swipe", function(eventObject) {
//               //   console.log(eventObject);
//               //   eventObject.preventDefault();
//               //   var direction_angle = eventObject.gesture.angle;
//               //   if(eventObject.gesture.direction == 4) {
//               //     console.log("left");
//               //     $.fn.fullpage.moveSlideLeft();
//               //
//               //   } else if(eventObject.gesture.direction == 2) {
//               //       console.log("right");
//               //       $.fn.fullpage.moveSlideRight();
//               //   }
//               // });
//             } else {
//               var $active_panel = $(".panel-section.fp-completely");
//             }
//
//
//             var section_title = $active_panel.attr("data-panel-title");
//
//             el.header_section_placeholder.html(section_title);
//
//             if($("#project-content").length) {
//                 el.body.addClass("viewing-project");
//             } else {
//                 el.body.removeClass("viewing-project");
//             }
//
//             var iscroll = $('.project-panel').find('.fp-scrollable').data('iscrollInstance');
//
//             if(iscroll && typeof iscroll !== undefined){
//               iscroll.on('scroll', get_scroll_y);
//             }
//
//             // if(el.html.hasClass("is-mobile-tablet")) {
//             //   $(".arrow-down-trigger").click(function() {
//             //     $(".panel-section-inner").animate({
//             //       scrollTop: $(window).height()
//             //     }, 300);
//             //   });
//             // } else {
//             //   $(".arrow-down-trigger").click(function() {
//             //       iscroll.scrollTo(0, -el.window.height(), 500);
//             //   });
//             // }
//
//
//             // FIX console error .play()
//
//             // if(el.html.hasClass("is-mobile-tablet")) {
//             //   // $(window).bind("orientationchange", function () {
//             //   //   console.log("Entered in Orientation change");
//             //   //   $.fn.fullpage.reBuild();
//             //   // });
//             //   $(".video-parallax-effect").click(function(e){
//             //     if( e.target != this ) {
//             //       return false;
//             //     }
//             //
//             //     if($(".intro-video-wrapper").hasClass("is-playing")) {
//             //       document.getElementById('intro-video').pause();
//             //     } else {
//             //       document.getElementById('intro-video').play();
//             //     }
//             //
//             //     if(el.html.hasClass("is-tablet")) {
//             //       $(".intro-video-wrapper").toggleClass("is-playing");
//             //     }
//             //
//             //     if(!el.html.hasClass("is-tablet")) {
//             //       document.getElementById('intro-video').play();
//             //     }
//             //   });
//             // }
//
//
//         }
//     });
//     //$.fn.fullpage.setAllowScrolling(false);
//     //$.fn.fullpage.setAllowScrolling(false, 'right, left');
// }


function init_home() {
    $("img.lazy-load-img").Lazy({
      threshold: 1000
    });



    $(".lazy-bg").each(function(){
      var new_bg_img = $(this).attr("data-src");
      $(this).css("background-image", "url(" + new_bg_img + ")");
    });

    if($("#featured-stories").length) {
      el.body.addClass("is-home");
    } else {
      el.body.removeClass("is-home");
    }

    //if($(".mobile-project-list").length) {
      // $(".panel-section-inner").swipe( {
      //   swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
      //     if(direction == "left") {
      //       $.fn.fullpage.moveSlideRight();
      //     } else if (direction == "right") {
      //       $.fn.fullpage.moveSlideLeft();
      //     }
      //   }
      // });
      // var scale = 0.7; // initial-scale
      // var r = 0.10;
      //
      // $(document).on('gesturechange',function(event){
      //   console.log(event.originalEvent.scale);
      //     if(event.originalEvent.scale > 1) scale = scale < 1.2 ?  scale+r : 1.2 ;
      //     else scale = scale > 0.7 ? scale-r : 0.7 ;
      //
      //     $('meta[name=viewport]').attr('content', 'width=device-width, minimum-scale='+ scale.toFixed(2) +', maximum-scale='+ scale.toFixed(2) +', user-scalable=yes'); //
      //
      // });


      // $(window).on("gestureend", function(event) {
      //
      //   //console.log(event.originalEvent.scale);
      //   //
      //   // var scale = event;
      //   if(event.originalEvent.scale > 1) {
      //     $.fn.fullpage.setAllowScrolling(false);
      //     setTimeout(function() {
      //         $(".panel-slide.active input").focus();
      //         $(".panel-slide.active p").trigger("click");
      //     }, 250);
      //     //$('.panel-slide.active .panel-section-inner').trigger('touchmove');
      //   } else {
      //     setTimeout(function() {
      //         $.fn.fullpage.setAllowScrolling(true);
      //     }, 250);
      //
      //   }
      //
      // });

    //}

    if(el.html.hasClass("is-mobile-tablet")) {

      $("#about .team img").click(function(){
        $(this).hide().siblings("img").show();
      })

      // $(".panel-section-inner").each(function(){
      //   $(this).scroll(function(){
      //     //$.fn.fullpage.setAllowScrolling(false);
      //     if($(this).scrollTop() > 250) {
      //       $back_to_top.addClass("active");
      //     } else {
      //       $back_to_top.removeClass("active");
      //     }
      //   });
      // });

      // if($("#project-content").length && el.html.hasClass("is-tablet")) {
      //   var $project_header_el = $(".project-header");
      //   $(".project-panel .panel-section-inner").scroll(function(){
      //     if($(this).scrollTop() - 170 >= el.window.height()) {
      //       $project_header_el.addClass("trigger-entrance");
      //     } else {
      //       $project_header_el.removeClass("trigger-entrance");
      //     }
      //   });
      // }


    }


    //$("#back-to-top").click(function(){
      // if(!el.html.hasClass("is-mobile-tablet")) {
      //
      //   if(!$("#about").length) {
      //     var iscroll = $('.panel-section.active').find('.fp-scrollable').data('iscrollInstance');
      //     if(iscroll && typeof iscroll !== undefined){
      //       iscroll.scrollTo(0, 0, 400);
      //     }
      //   } else {
      //     $.fn.fullpage.moveTo(1);
      //     $('.panel-section').each(function(){
      //       var iscroll = $(this).find('.fp-scrollable').data('iscrollInstance');
      //       if(iscroll && typeof iscroll !== undefined){
      //         iscroll.scrollTo(0, 0, 0);
      //       }
      //     })
      //   }
      // } else {
      //   if($("#about").length) {
      //     var $panel_selector = $(".panel-section .active .panel-section-inner");
      //   } else {
      //     var $panel_selector = $(".panel-section.active .panel-section-inner");
      //   }
      //   $panel_selector.animate({scrollTop:0}, 300);
      //
      // }
    //});

    // if($(".thumb-container").length) {
    //
    //   var $panel = $('.index-content');
    //
    //   $(".featured-project a").on('mouseenter mouseleave', function(e) {
    //       return e.type=="mouseenter" ? panelOn(e) : panelOff() ;
    //   });
    //
    //   function panelOn(e) {
    //      $panel.data('wait', setTimeout(function(){
    //
    //        // var $this = $(e.currentTarget),
    //        //     $project_id = $this.attr("data-id"),
    //        //     $this_thumb = $("#" + $project_id + " .index-thumb");
    //
    //
    //
    //        if(typeof window.matchMedia != "undefined" || typeof window.msMatchMedia != "undefined") {
    //          if (window.matchMedia("(min-width: 2200px)").matches) {
    //            var cursor_offset = 537;
    //          } else if (window.matchMedia("(min-width: 1800px) and (max-width: 2199px)").matches) {
    //            var cursor_offset = 430;
    //          } else if (window.matchMedia("(min-width: 1200px) and (max-width: 1799px)").matches) {
    //            var cursor_offset = 331;
    //          } else if (window.matchMedia("(min-width: 992px) and (max-width: 1199px)").matches) {
    //            var cursor_offset = 285;
    //          } else {
    //            var cursor_offset = 235;
    //          }
    //        } else {
    //          var cursor_offset = 235;
    //        }
    //
    //        var $this = $(e.currentTarget),
    //            this_width = $this.width(),
    //            window_width = $(window).width() - (cursor_offset - 10),
    //            $project_id = $this.attr("data-id"),
    //            $this_thumb = $("#" + $project_id + " .index-thumb");
    //
    //
    //
    //         var parentOffset = $this.parent().offset();
    //         var relX = e.clientX - parentOffset.left;
    //         var pan_x_position = (relX*window_width)/this_width;
    //         $this_thumb.css({
    //           //'top': e.clientY - cursor_offset,
    //           'left': pan_x_position
    //         });
    //
    //         $this_thumb.addClass("visible").fadeIn(200);
    //
    //       el.document.on("mousemove", function(e) {
    //         var parentOffset = $this.parent().offset();
    //         var relX = e.clientX - parentOffset.left;
    //         var pan_x_position = (relX*window_width)/this_width;
    //         $this_thumb.css({
    //           //'top': e.clientY - cursor_offset,
    //           'left': pan_x_position
    //         });
    //       });
    //
    //     }, 200));
    //   }
    //
    //   function panelOff() {
    //     clearTimeout( $panel.data('wait') );
    //     $(".index-thumb.visible").fadeOut(200).removeClass("visible");
    //     el.document.off("mousemove");
    //   }




      $(".featured-project a").on({

          mouseenter: function() {

            if(typeof window.matchMedia != "undefined" || typeof window.msMatchMedia != "undefined") {
              if (window.matchMedia("(min-width: 2200px)").matches) {
                var cursor_offset = 537;
              } else if (window.matchMedia("(min-width: 1800px) and (max-width: 2199px)").matches) {
                var cursor_offset = 430;
              } else if (window.matchMedia("(min-width: 1200px) and (max-width: 1799px)").matches) {
                var cursor_offset = 331;
              } else if (window.matchMedia("(min-width: 992px) and (max-width: 1199px)").matches) {
                var cursor_offset = 285;
              } else {
                var cursor_offset = 235;
              }
            } else {
              var cursor_offset = 235;
            }

            var $this = $(this),
                this_width = $this.width(),
                window_width = $(window).width() - (cursor_offset - 10),
                $project_id = $this.attr("data-id"),
                $this_thumb = $("#" + $project_id + " .index-thumb");

            $this_thumb.addClass("visible");

            el.document.on("mousemove", function(e) {
                //current_y_offset = e.clientY;
                var parentOffset = $this.parent().offset();
                var relX = e.clientX - parentOffset.left;
                var pan_x_position = (relX*window_width)/this_width;
                $this_thumb.css({
                    //'top': e.clientY - cursor_offset,
                    //'left': e.clientX + 15
                    'left': pan_x_position
                });
            });

          },
          mouseleave: function() {
            $(".index-thumb.visible").removeClass("visible");
            el.document.off("mousemove");
          }
      });

    //}


    var $custom_slideshow = $(".index-content a[href*='.mp4']");

    if($custom_slideshow.length && !$(".slideshow-bg").length) {
        $("#main").append('<div class="slideshow-bg"></div>')
    }

    $custom_slideshow.each(function(i){

      var $this = $(this),
          this_video_url = $this.attr("href"),
          data_slideshow_id = "s-c"+i;

      $this.attr("data-slideshow","c"+i).addClass("custom-slideshow-trigger");

      var generate_lightbox = '<div id="'+data_slideshow_id+'" class="custom-slideshow slideshow-container-outer" data-type="video"><div class="slideshow-container"><div class="close-slideshow"><span></span></div><div class="slideshow-container-inner"><div class="swiper-container" ><div class="swiper-wrapper"><div class="swiper-slide"><div class="slide-content"><video id="v-c'+i+'" class="video-js vjs-default-skin" preload="none" controls><source src="'+this_video_url+'" type="video/mp4"></video></div></div></div></div></div></div></div>';

      $("#main").append(generate_lightbox);

    });

}




function init_projects() {

    var $text_accordion = $(".accordion-container"),
        $object_fit_images = $(".project-thumb-cover img"),
        $project_header_el = $(".project-header"),
        window_height = el.window.height();


    if($("#intro-video").length) {

      $(window).on("scroll", function(){
        var panel_offset = Math.abs($(".panel-section-inner").offset().top - $(window).scrollTop());
        console.log();
        if(panel_offset >= $(window).height() / 2) {
          $(".video-controls").css({'position':"fixed", 'top' : $(window).height() / 2 - 95});
        } else {
          $(".video-controls").css({'position':"absolute", 'top' : ''});
        }
      });

      // $('#intro-video')[0].onplay = function () {
      //     console.log("abc");
      // };
      //
      // $('#intro-video')[0].onwaiting = function(){
      //     console.log("buffer");
      // };

      var $hero_video = $("#intro-video")[0];

      $(".icon.play").click(function(){
        var $this = $(this);
        if($this.hasClass("is-playing")) {
          $this.removeClass("is-playing").addClass("is-paused");
          $hero_video.pause();
        } else {
          $this.removeClass("is-paused").addClass("is-playing");
          $hero_video.play();
        }
      });

      $(".icon.sound").click(function(){
        var $this = $(this);
        if($this.hasClass("is-muted")) {
          $this.removeClass("is-muted").addClass("is-unmuted");
          $("#intro-video").prop('muted', false);
          // console.log("1");
        } else {
          $this.removeClass("is-unmuted").addClass("is-muted");
          $("#intro-video").prop('muted', true);
        }
      });

    }

    // if(el.html.hasClass("explorer")) {
    //   $(".project-thumb-cover .lazy-load-img").each(function(){
    //     var img_src = $(this).attr("src");
    //     $(this).css("background-image","url("+img_src+")").addClass("avbc");
    //   })
    // }
    //objectFitImages($object_fit_images);

    el.window.scroll(function() {
      if ($(this).scrollTop() > window_height) {
        $project_header_el.addClass("trigger-entrance");
      } else {
        $project_header_el.removeClass("trigger-entrance");
      }
    });

    $text_accordion.each(function(){

      var $this = $(this),
          $text_accordion_divider = $("hr", this),
          $text_accordion_toggle =  $(".read-more-toggle", this);

      if($text_accordion_divider.length) {
          $text_accordion_divider.nextUntil(".read-more-toggle").wrapAll("<div class='text-accordion'></div>");
          $text_accordion_toggle.on("click",function(){
              $(this).html($(this).html() == '+ <span>read more</span>' ? '– <span>read less</span>' : '+ <span>read more</span>');
              $(this).prev(".text-accordion").slideToggle(500);
              // $(this).prev(".text-accordion").slideToggle(500, function(){
              //     $.fn.fullpage.reBuild();
              // });

          });
      } else {
          $text_accordion_toggle.remove();
      }

    });

    var $close_slideshow = $(".close-slideshow"),
        $slideshow_bg = $(".slideshow-bg");

    var add_visibility_toggle;

    $(".slide-info-title").click(function(){
        $(this).toggleClass("opened");
        $(this).next().slideToggle(400);
    });

    slideshows = [];

    $(".project-thumb, .custom-slideshow-trigger").click(function(e){

        e.preventDefault();

        //$.fn.fullpage.setAllowScrolling(false);

        var slideshow_id = $(this).attr("data-slideshow");
        var $active_slideshow = $(".slideshow-container-outer#s-"+slideshow_id);
        var slideshow_type = $active_slideshow.attr("data-type");
        var $close_slideshow = $(".slideshow-container-outer#s-"+slideshow_id).find(".close-slideshow");

        // $(".slideshow-bg").addClass("is-visible");
        // $active_slideshow.addClass("opened");
        $(".slideshow-bg").fadeTo(200,.85);
        $active_slideshow.addClass("opened").fadeIn(200);

        //el.html_body.addClass('overflow-hidden');
        el.body.addClass("slideshow-is-opened");

        var swiper_container = $active_slideshow.find('.swiper-container');
        if(!swiper_container.hasClass('swiper-container-horizontal')) {
            init_slideshow(swiper_container);
        }

        // if($('html').hasClass('is-mobile')) {
        //     setTimeout(function() {
        //         $('#main-section, .intro-video-wrapper').hide();
        //     }, 300);
        // }

        if(slideshow_type == "video") {
          var this_video = $active_slideshow.find(".video-js");
          this_video[0].player.play();
        }

        $(document).one("keyup", function(e) {
          if (e.keyCode == 27) {
              $close_slideshow.trigger("click");
            }
        });

        add_close_toggle = setTimeout(function() {
          $slideshow_bg.one("click",function(){
              $close_slideshow.trigger("click");
          });
        }, 500);

        add_visibility_toggle = setTimeout(function() {
             $active_slideshow.addClass("is-visible");
        }, 3000);

        $(window).on('gestureend', function(e){
          if (e.originalEvent.scale <= 1.0) {
            console.log("a");
            $.each( slideshows, function( i ) {
              slideshows[i].allowTouchMove = true;
            });
          } else if (e.originalEvent.scale > 1.0) {
            console.log("a");

            $.each( slideshows, function( i ) {
              slideshows[i].allowTouchMove = false;
            });
          }
        });

        $(window).on('dbltap',function (e,data){
          $.each( slideshows, function( i ) {
            slideshows[i].allowTouchMove = true;
          });
        });

    });


    $(document).on("click", ".close-slideshow",function(){
        $(window).off('gestureend');
        //$('#main-section, .intro-video-wrapper').show();

        // $(".slideshow-bg").fadeTo(300,0);
        // $(".slideshow-container-outer.opened").fadeTo(300,0);
        $(".slideshow-bg").fadeOut(200);
        $(".slideshow-container-outer.opened").fadeOut(200);

        el.body.removeClass("slideshow-is-opened");
        //$.fn.fullpage.setAllowScrolling(true);
        $(".video-js").each(function (index) {
            this.player.pause();
        });
        clearTimeout(add_visibility_toggle);
        clearTimeout(add_close_toggle);
        setTimeout(function() {
            //el.html_body.removeClass('overflow-hidden');
            $.each( slideshows, function( i ) {
              slideshows[i].allowTouchMove = true;
            });
        }, 350);
    });

    if($("#intro-video").length && !el.html.hasClass("is-mobile-tablet")) {
      var intro_video = document.getElementById('intro-video');
      var isPlaying = intro_video.currentTime > 0 && !intro_video.paused && !intro_video.ended && intro_video.readyState > 2;
      if (!isPlaying) {
        intro_video.play();
      }
      // setTimeout(function() {
      //   intro_video.volume = 0;
      //   console.log($("#intro-video").prop('muted'));
      //   $("#intro-video").prop('muted',false);
      // }, 1000);

      //document.getElementById('intro-video').play();
    }

    $(".video-js").each(function(){
        var player = videojs(this.id, {
            inactivityTimeout:0
            // controlBar: {
            //     fullscreenToggle: false
            // }
        });
    });



    slideshow_index = 0;

    function init_slideshow(swiper_container) {

        var parent_container = swiper_container.parents('.slideshow-container'),
            $this = swiper_container,
            $swiperContainer = $this,
            $next = $this.find('.slideshow-next'),
            $prev = $this.find('.slideshow-prev'),
            $slideshowContainer = $swiperContainer.closest('.slideshow-container'),
            media_type = $this.closest("slideshow-container-outer").attr("data-type"),
            slides_num = $swiperContainer.find(".swiper-slide").length;

        if(slides_num == 1) {
          $next.addClass("swiper-button-disabled");
        }
        if(media_type == "images") {
            touch_drag_setting = true;
        } else {
            touch_drag_setting = false;
        }

        if(el.html.hasClass("is-mobile-tablet")) {
          var touchmove_setting = true;
        } else {
          var touchmove_setting = false;
        }

        var swiper = new Swiper($swiperContainer, {
            slidesPerView: "auto",
            // zoom: true,
            // centeredSlides: true,
            // setWrapperSize: false,
            // freeMode: true,
            navigation: {
                nextEl: $next,
                prevEl: $prev,
            },
            pagination: {
              el: '.swiper-pagination',
              type: 'fraction',
            },
            observer: true,
            observeParents: true,
            //virtualTranslate:true,
            effect: "fade",
            fadeEffect: {
                crossFade: false
            },
            allowTouchMove: touchmove_setting,
            speed: 0,
            simulateTouch: touch_drag_setting,
            spaceBetween: 0,
            preloadImages: true,
            lazy: {
                loadPrevNext: true,
                loadPrevNextAmount: 40,
                preloaderClass: "preloader"
            },
            breakpoints: {
              1024: {
                navigation: {
                  nextEl: $(this).find('.swiper-slide .slide-content')
                }
              },
            },
            on: {
                 init: function (swiper) {
            //         //setThumbnails($slideshowContainer, slideshow_index);
            //         // $swiperContainer.find(".swiper-slide").each(function(){
            //         //   var img_width = $(this).find("img").width();
            //         //   //console.log(img_width);
            //         //   $this.width(img_width);
            //         // });
            //
            //         parent_container.imagesLoaded(function() {
            //           var init_width = swiper_container.find(".swiper-slide:first-child img").width();
            //
            //           parent_container.width(init_width);
            //           swiper_container.find(".swiper-slide:first-child").width(init_width);
            //         });
            //
            //           // var totalWidth = 0;
            //           //
            //           // parent_container.find('.thumbnails-wrapper ul li').each(function(index) {
            //           //   totalWidth += parseInt($(this).width());
            //           // });
            //           //
            //           // parent_container.find('.thumbnails-wrapper ul').css('width', (totalWidth+5) + 'px');
            //           //
            //           // parent_container.find('.thumbnails-wrapper ul li').each(function() {
            //           //     $(this).bind('click', function(e) {
            //           //         var index = $(this).index();
            //           //         swiper.slideTo(index, 0);
            //           //     });
            //           // });
            //         //});
            //
            //          //&& window.matchMedia("(max-width: 380px)").matches
                    if(el.html.hasClass("is-mobile-tablet")) {
                      console.log("true mobile");
                  		$(document).on("click", ".swiper-slide-active img", function(e){
                        console.log("click!");
                        console.log(slideshow_index);
                  			slideshows[slideshow_index-1].slideNext(300);
                        e.stopImmediatePropagation();
                  		});
                  	}
            //
            //
            //
            //
                 },
            //     lazyImageReady: function(slideEl, imageEl) {
            //       console.log($(imageEl).width());
            //       $(imageEl).parent().width($(imageEl).width());
            //         // setTimeout(function(){
            //         //     var img_width = $(slideEl).find("img").width();
            //         //     $(slide).width(img_width);
            //         //     console.log($(slide));
            //         // }, 300);
            //     },
            //     transitionStart: function(){
            //       var slide_width = $slideshowContainer.find(".swiper-slide img").eq(swiper.activeIndex).width();
            //       console.log(slide_width);
            //       $slideshowContainer.width(slide_width);
            //       //swiper_container.width(slide_width);
            //     }
             }

        });
        slideshow_index++;
        slideshows.push(swiper);
    };
    // $(window).resizestart(function() {
	  //    // execute callback...
    //    $('.slideshow-container-outer[data-type="images"] .slide-content').css("width","");
    //    $('.slideshow-container-outer[data-type="images"] .slideshow-container').css("width","");
    //    console.log("a");
    // });
    // $(window).on("resizeend", function(){
    //   $('.slideshow-container-outer[data-type="images"] .swiper-container-horizontal .swiper-slide-content').css("width","");
    //   $('.slideshow-container-outer[data-type="images"] .swiper-container-horizontal.slideshow-container').css("width","");
    //   $('.slideshow-container-outer[data-type="images"] .swiper-container-horizontal .slide-content').each(function(){
    //       var slide_width = $(this).find("img").width();
    //       console.log(slide_width);
    //       $(this).width(slide_width);
    //
    //   });
    //
    //   $('.slideshow-container-outer[data-type="images"] .swiper-container-horizontal.slideshow-container').each(function(){
    //     var current_active_slide_width = $(this).find(".swiper-slide-active img").width();
    //     $(this).closest('slideshow-container').width(current_active_slide_width);
    //   });
    //
    //   console.log("b");
    // });


    // initialize thumbnails on swiper.onInit()
    // function setThumbnails($slideshowContainer, slideshow_index) {
    //     console.log($slideshowContainer);
    //     var thumbnailWidth = $slideshowContainer.find('.thumbnails-wrapper ul li').width(),
    //         totalThumbnails = $slideshowContainer.find('.thumbnails-wrapper ul li').length;
    //
    //     // set width for thumbnails container
    //     $slideshowContainer.find('.thumbnails-wrapper ul').css('width', thumbnailWidth * totalThumbnails + 'px');
    //
    //     // bind click event to each thumbnails
    //     $slideshowContainer.find('.thumbnails-wrapper ul li').each(function() {
    //         $(this).bind('click', function(e) {
    //             var index = $(this).index();
    //             slideshows[slideshow_index].slideTo(index, 0);
    //         });
    //     });
    // }

    // Pan thumbnails on mousemove
    // $(".thumbnails-wrapper").each(function(){
    //   $(this).mousemove(function(e) {
    //       var elem = $(this);
    //       var parentOffset = $(this).parent().offset();
    //       var relX = e.clientX - parentOffset.left;
    //       moveThumbnails(relX, elem);
    //   });
    // })
    //
    // function moveThumbnails(t, elem) {
    //
    //     var thumbnailsContainer = elem.find('ul');
    //     var e = thumbnailsContainer.width();
    //     var slideshowWidth = $(elem).closest(".slideshow-container").width();
    //
    //     if (e > slideshowWidth && $(window).width() >= 600) {
    //         var i = mapRange([0, slideshowWidth], [0, e - slideshowWidth], t);
    //         TweenMax.to(thumbnailsContainer, 1, {
    //             x: -1 * Math.min(Math.max(parseInt(i), 0), e - slideshowWidth),
    //             ease: Power2.easeOut
    //         })
    //     } else if ($(window).width() < 600) {
    //         TweenMax.to(thumbnailsContainer, 1, {
    //             x: 0
    //         })
    //     } else {
    //         TweenMax.to(thumbnailsContainer, 1, {
    //             x: 0
    //         })
    //     }
    // }
    //
    // function mapRange(t, e, i) {
    //     return e[0] + (i - t[0]) * (e[1] - e[0]) / (t[1] - t[0])
    // }
}
