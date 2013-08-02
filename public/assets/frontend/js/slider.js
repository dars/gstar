/* =======================================================
 * Auto Slider
 * By David Blanco
 *
 * Contact: http://codecanyon.net/user/davidbo90
 *
 * Created: April 2, 2013
 *
 * Copyright (c) 2013, David Blanco. All rights reserved.
 * Released under CodeCanyon License http://codecanyon.net/
 *
 * ======================================================= */

(function($) {

    var AutoSlider = function(element, options){
        //FALLBACK FOR OLD BROWSERS LIKE IE8, IE7
        var fallback = false;
        var supports = (function() {
            var   div = document.createElement('div'),
              vendors = 'Khtml Ms O Moz Webkit'.split(' '),
                  len = vendors.length;

            return function(prop) {
              if ( prop in div.style ) return true;

              prop = prop.replace(/^[a-z]/, function(val) {
                 return val.toUpperCase();
              });

              while(len--) {
                 if ( vendors[len] + prop in div.style ) {
                    // browser supports box-shadow. Do what you need.
                    // Or use a bang (!) to test if the browser doesn't.
                    return true;
                 }
              }
              return false;
            };
        })();

        if ( !supports('transform') ) { //IF IT DOES NOT SUPPORT TRANSFORM
            fallback = true;
        }



        //Defaults are below
        var settings = $.extend({}, $.fn.autoSlider.defaults, options);

        var container = $(element).css('background','none'),
                 imgs = container.find('img').fadeTo( 'fast', 1),
                width = settings.width,
              current = 0,
               before = -1,
                ready = true,
                 play = settings.autoPlay,
          thumbNumber = -1;


        if(!settings.rightClickImages) {
            imgs.bind('contextmenu', function(e) {
                return false;
            });
        }

        //Useful variables. Play carefully.
        var vars = {
            interval: 'none'
        };

        var vars2 = {
            timer: 'none'
        };

        //If width is not set then get the width of the largest image
        if(width === 0 || width === '0'){
            imgs.each(function(){
                thisWidth = $(this).width();

                if(thisWidth > width){
                  width = thisWidth;
                }
            });
        }

        //add shadow
        if( settings.shadow == true ){
            container.addClass('as_slider_shadow');
        }

        //Set the same width to all the images
        imgs.css('width', width);
        container.css({
            'width': width,
            'height': imgs.first().height()
        });

        //Append timer
        if(settings.showTimer){

            if(settings.circularTimer == true){
                container.append('<div class="as_circularTimer as_fill"></div>');
            }else{
                container.append('<div class="as_timer"/>');
            }

        }

        //Append captions
        if(settings.captions){
            container.append('<div class="as_captions"/>');
        }


        //Create navigation arrows and control
        var arrows = $('<div class="as_prev" /><div class="as_next" />').css('background-image', 'url(assets/frontend/images/icons.png)');
        container.append(arrows);
        var playDiv = $('<div class="as_play"></div>').css('background-image', 'url(assets/frontend/images/icons.png)');
        container.append(playDiv);

        //Add themes
        container.addClass(settings.theme);

        if(settings.navBarNumeric){
            container.addClass("numeric");
        }
        //Create the navigation
        var btns = '';
        var numbers = 1;
        for(var i=0; i<imgs.length; i++){

            var str = "";
            if(settings.navBarNumeric){
                str = numbers;
            }

            var selected = "";
            if(i == 0)selected = "selected";
            btns+='<div class="as_navBtn '+selected+'" data-img="'+i+'">'+str+'</div>';

            numbers++;
        }

        var nav = $('<div class="as_navContainer"> '+btns+' </div>');
        container.append(nav);

        var as_prev = container.find('div.as_prev'),
            as_next = container.find('div.as_next'),
            as_play = container.find('div.as_play'),
    as_navContainer = container.find('div.as_navContainer'),
           as_timer = container.find('div.as_timer'),
        as_captions = container.find('div.as_captions');

        if(settings.navArrows == false){
            as_prev.hide().remove();
            as_next.hide().remove();
        }

        if(settings.playBtn == false){
            as_play.hide().remove();
        }

        if(settings.navBar == false){
            as_navContainer.hide().remove();
        }

        if(settings.autoHideNavArrows == false){
            as_prev.fadeTo('1','1');
            as_next.fadeTo('1','1');
        }

        if(settings.autoHidePlayBtn == false){
            as_play.fadeTo('1','1');
        }

        if(settings.autoHideNavBar == false){
            as_navContainer.fadeTo('1','1');
        }

        if(settings.autoHideCaptions == false){
            as_captions.fadeTo('1','1').hide();
        }
        //Responsive design
        var responsive = function(){

            imgs.css({
                'max-width' : container.width()
            });

            container.css({
                'height' : imgs.eq(current).height()
            });

            if(container.width() <= settings.hideTimerInWidth){
                as_timer.hide();
            }else{
                as_timer.show();
            }

            if(container.width() <= settings.hideIconsInWidth){
                as_prev.hide();
                as_next.hide();
                as_play.hide();
                as_navContainer.hide();
            }else{
                as_prev.show();
                as_next.show();
                as_play.show();
                as_navContainer.show();
            }

        };

        //Check for responsive design on load and on resize
        responsive();
        $(window).resize(function(){
            responsive();
        });

        //BOXES EFFECT
        //Random
        var range = function range( min, max, rand ) {
            var arr = jQuery.map(new Array( ++max - min ).join('.').split('.'), function(v,i) { return min + i } );

            if(rand == true){

                var arr2 = jQuery.map(arr, function( v ) { return [[ Math.random(), v ]] } ).sort();
                return jQuery.map(arr2, function( v ) { return v[ 1 ] });
            }else{
                return arr;
            }

        }

        var diagonalArray = function (nums, numRows, numCols) {
            var numRows = numRows,
                numCols = numCols,
                sq = numRows + numCols - 1,
                d, x, y,
                i = 1,
              arr = [];

            diagonalLoop:
            for (d = 0; d < sq; d++) {
                for (y = d, x = 0; y >= 0; y--, x++) {
                    if (x === numCols)
                        continue diagonalLoop;
                    if (y < numRows){
                        arr.push(nums[(x*numRows)+y]);
                        i++;
                    }

                }
            }

            return arr;
        }

        var boxes = function(currentImg, effect){
            var x = settings.x,
                y = settings.y,
           random = true;

            if(effect == 'boxes' || effect == 'boxes-openBookY' || effect == 'boxes-openBookX' || effect == 'boxes-zoomIn' || effect == 'boxes-zoomOut'){
                random = true;
            }else if(effect == 'boxesOrder' || effect == 'boxesOrder-openBookY' || effect == 'boxesOrder-openBookX' || effect == 'boxesOrder-zoomIn' || effect == 'boxesOrder-zoomOut'){
                random = false;
            }else if(effect == 'horizontalStripes' || effect == 'horizontalStripes-openBookY' || effect == 'horizontalStripes-openBookX' || effect == 'horizontalStripes-zoomIn' || effect == 'horizontalStripes-zoomOut'){
                random = false;
                x = 1;
            }else if(effect == 'verticalStripes' || effect == 'verticalStripes-openBookY' || effect == 'verticalStripes-openBookX' || effect == 'verticalStripes-zoomIn' || effect == 'verticalStripes-zoomOut'){
                random = false;
                y = 1;
            }else if(effect == 'boxesDiagonal' || effect == 'boxesDiagonal-openBookY' || effect == 'boxesDiagonal-openBookX' || effect == 'boxesDiagonal-zoomIn' || effect == 'boxesDiagonal-zoomOut'){
                random = false;
            }

            var width = currentImg.width(),
               height = currentImg.height(),
                 $img = currentImg,
              n_boxes = x * y,
                boxes = [], $boxesContainer, $boxes;

            for ( var i = 0; i < n_boxes; i++ ) {
                boxes.push('<div class="as_box"/>');
            }

            $boxesContainer = $( '<div class="as_boxesContainer" >'+boxes.join('')+'</div>' );

            // Hide original image and insert boxes in DOM
            $img.hide().after( $boxesContainer );

            $boxes = $boxesContainer.find('div');

            //Fix width that is not exact
            var widthEach = Math.floor(width/x);
            var widthCurrent = widthEach*x;
            if(width != widthCurrent){//If width doesn't fit perfect
                var diference = width - widthCurrent;

                var cont = 0;
                $boxes.each(function(){
                    $this = $(this);
                    cont++;

                    if(cont == x){
                        $this.css('width', widthEach+diference);

                        cont=0;
                    }else{
                        $this.css('width', widthEach);
                    }
                });

            }else{//If width fits perfect
                $boxes.css('width', width / x);
            }

            // Set background

            $boxes.css({
                //width: width / x,
                height: Math.ceil(height / y),
                'background-image': 'url('+ encodeURI($img.attr('src')) +')',
                'background-size': width+'px'+' '+height+'px',
                'background-repeat': 'no-repeat'
            });


            // Adjust position
            $boxes.each(function() {
                var pos = $(this).position();
                $(this).css( 'backgroundPosition', -pos.left +'px '+ -pos.top +'px' );
            });

            // Animate the party
            var boxesArr = range( 0, n_boxes-1, random ),
                boxSpeed = settings.transitionSpeed / n_boxes; // time to clear a single box

            if(effect == 'boxesDiagonal' || effect == 'boxesDiagonal-openBookY' || effect == 'boxesDiagonal-openBookX' || effect == 'boxesDiagonal-zoomIn' || effect == 'boxesDiagonal-zoomOut'){
                boxesArr = diagonalArray(boxesArr, x, y);
            }
            //boxesArr = [8, 1, 18, 11, 13, 10, 6, 21, 0, 4, 16, 23, 9, 14, 3, 15, 12, 7, 2, 5, 22, 19, 20, 17, 24];

            // FALLBACK FOR IE7, IE8
            if(fallback && (effect == 'boxes-openBookY' || effect == 'boxes-openBookX' ||  effect == 'boxesOrder-openBookY' || effect == 'boxesOrder-openBookX' || effect == 'horizontalStripes-openBookY' || effect == 'horizontalStripes-openBookX' || effect == 'verticalStripes-openBookY' || effect == 'verticalStripes-openBookX' || effect == 'boxesDiagonal-openBookY' || effect == 'boxesDiagonal-openBookX'
              ||  effect == 'boxes-zoomIn' || effect == 'boxes-zoomOut' || effect == 'boxesOrder-zoomIn' || effect == 'boxesOrder-zoomOut' || effect == 'horizontalStripes-zoomIn' || effect == 'horizontalStripes-zoomOut' || effect == 'verticalStripes-zoomIn' || effect == 'verticalStripes-zoomOut' || effect == 'boxesDiagonal-zoomIn' || effect == 'boxesDiagonal-zoomOut') ){
                effect = 'boxes';
            }

            //ANIMATIONS FOR FADE EFFECT
            if(effect == 'boxes' || effect == 'boxesDiagonal' || effect == 'boxesOrder' || effect == 'horizontalStripes' || effect == 'verticalStripes'){

                $.each(boxesArr, function( i, box ) {
                  setTimeout(function(){
                    $boxes.eq( box ).fadeTo( settings.boxSpeed, 1 , function(){
                        if(i == boxesArr.length-1){
                            endEffect();
                        }
                    });
                  }, i * boxSpeed );
                });

            }else if(effect == 'boxes-openBookY' || effect == 'boxes-openBookX' ||  effect == 'boxesOrder-openBookY' || effect == 'boxesOrder-openBookX' || effect == 'horizontalStripes-openBookY' || effect == 'horizontalStripes-openBookX' || effect == 'verticalStripes-openBookY' || effect == 'verticalStripes-openBookX' || effect == 'boxesDiagonal-openBookY' || effect == 'boxesDiagonal-openBookX'){

                //ANIMATIONS FOR ROTATION EFFECT
                var axis = 'Y';
                if(effect == 'boxes-openBookX' || effect == 'boxesOrder-openBookX' || effect == 'horizontalStripes-openBookX' || effect == 'verticalStripes-openBookX' || effect == 'boxesDiagonal-openBookX'){
                    axis = 'X';
                }

                $.each(boxesArr, function( i, box ) {
                  setTimeout(function(){
                    $boxes.eq( box ).data('axis', axis);
                    $boxes.eq( box ).fadeTo(0, 1).rotate('90').animate({
                                        rotate: '0'
                                    },settings.boxSpeed, function(){
                                        if(i == boxesArr.length-1){
                                            endEffect();
                                        }
                                    });
                  }, i * boxSpeed );
                });

            }else if(effect == 'boxes-zoomIn' || effect == 'boxes-zoomOut' || effect == 'boxesOrder-zoomIn' || effect == 'boxesOrder-zoomOut' || effect == 'horizontalStripes-zoomIn' || effect == 'horizontalStripes-zoomOut' || effect == 'verticalStripes-zoomIn' || effect == 'verticalStripes-zoomOut' || effect == 'boxesDiagonal-zoomIn' || effect == 'boxesDiagonal-zoomOut' ){

                //ANIMATIONS FOR SCALE (ZOOM) EFFECT
                var scale = '1.5';
                if(effect == 'boxes-zoomOut' || effect == 'boxesOrder-zoomOut' || effect == 'horizontalStripes-zoomOut' || effect == 'verticalStripes-zoomOut' || effect == 'boxesDiagonal-zoomOut'){
                    scale = '0';
                }

                $.each(boxesArr, function( i, box ) {
                  setTimeout(function(){
                    $boxes.eq( box ).fadeTo(0, 1).scale(scale).animate({
                                        scale: '1'
                                    },settings.boxSpeed, function(){
                                        //Just make sure the CSS3 transformations are gone!
                                         $boxes.eq( box ).css({
                                            '-webkit-transform' : 'none',
                                               '-moz-transform' : 'none',
                                                '-ms-transform' : 'none',
                                                 '-o-transform' : 'none',
                                                    'transform' : 'none'
                                         });

                                        if(i >= boxesArr.length-1){
                                            endEffect();
                                        }
                                    });


                  }, i * boxSpeed );
                });

            }



        };

        //END BOXES EFFECT

        var setImages = function(){
            var currentImg = imgs.eq(current);
            imgs.eq(before).css('zIndex',99).siblings('img').css('zIndex',50);
            currentImg.css({
                'zIndex' : 100
            });
        };

        //run effect
        var runEffect = function(){
            container.find('div.as_boxesContainer').remove();
            imgs.show();

            var currentImg = imgs.eq(current);
            container.animate({
                'height' : currentImg.height()
            }, 300);

            setImages();

            var effect = currentImg.data('effect');

            if(fallback && (effect == 'openBookY' || effect == 'openBookX' || effect == 'zoomIn' || effect == 'zoomOut') ){
               effect = 'fade';
            }

            //EFFECTS

            if(effect == 'fade'){

                currentImg.hide().fadeIn(settings.transitionSpeed, function(){
                    endEffect();
                });

            }else if(effect == 'slide'){

                currentImg.hide().slideDown(settings.transitionSpeed, function(){
                    endEffect();
                });

            }else if(effect == 'show'){

                currentImg.hide().show(settings.transitionSpeed, function(){
                    endEffect();
                });

            }else if(effect == 'fromTop'){

                currentImg.css({
                    'top': -currentImg.outerHeight()
                })
                .animate({
                    'top': '0px'
                },settings.transitionSpeed, function(){
                    endEffect();
                });

            }else if(effect == 'fromBottom'){

                currentImg.css({
                    'top': currentImg.outerHeight()
                })
                .animate({
                    'top': '0px'
                },settings.transitionSpeed, function(){
                    endEffect();
                });

            }else if(effect == 'fromRight'){

                currentImg.css({
                    'left': currentImg.outerWidth()
                })
                .animate({
                    'left': '0px'
                },settings.transitionSpeed, function(){
                    endEffect();
                });

            }else if(effect == 'fromLeft'){

                currentImg.css({
                    'left': -currentImg.outerWidth()
                })
                .animate({
                    'left': '0px'
                },settings.transitionSpeed, function(){
                    endEffect();
                });

            }else if(effect == 'fromTopRight'){

                currentImg.css({
                    'top': -currentImg.outerHeight(),
                    'left': currentImg.outerWidth()
                })
                .animate({
                    'top': '0px',
                    'left': '0px'
                },settings.transitionSpeed, function(){
                    endEffect();
                });

            }else if(effect == 'fromBottomRight'){

                currentImg.css({
                    'top': currentImg.outerHeight(),
                    'left': currentImg.outerWidth()
                })
                .animate({
                    'top': '0px',
                    'left': '0px'
                },settings.transitionSpeed, function(){
                    endEffect();
                });

            }else if(effect == 'fromTopLeft'){

                currentImg.css({
                    'top': -currentImg.outerHeight(),
                    'left': -currentImg.outerWidth()
                })
                .animate({
                    'top': '0px',
                    'left': '0px'
                },settings.transitionSpeed, function(){
                    endEffect();
                });

            }else if(effect == 'fromBottomLeft'){

                currentImg.css({
                    'top': currentImg.outerHeight(),
                    'left': -currentImg.outerWidth()
                })
                .animate({
                    'top': '0px',
                    'left': '0px'
                },settings.transitionSpeed, function(){
                    endEffect();
                });

            }else if(
                effect == 'boxes' || effect == 'boxes-openBookY' || effect == 'boxes-openBookX' || effect == 'boxes-zoomIn' || effect == 'boxes-zoomOut' ||
                effect == 'boxesOrder' || effect == 'boxesOrder-openBookY' || effect == 'boxesOrder-openBookX' || effect == 'boxesOrder-zoomIn' || effect == 'boxesOrder-zoomOut' ||
                effect == 'horizontalStripes' || effect == 'horizontalStripes-openBookY' || effect == 'horizontalStripes-openBookX' || effect == 'horizontalStripes-zoomIn' || effect == 'horizontalStripes-zoomOut' ||
                effect == 'verticalStripes' || effect == 'verticalStripes-openBookY' || effect == 'verticalStripes-openBookX' || effect == 'verticalStripes-zoomIn' || effect == 'verticalStripes-zoomOut' ||
                effect == 'boxesDiagonal' || effect == 'boxesDiagonal-openBookY' || effect == 'boxesDiagonal-openBookX' || effect == 'boxesDiagonal-zoomIn' || effect == 'boxesDiagonal-zoomOut'){

                    boxes(currentImg, effect);

            }else if(effect == 'openBookY'){
                currentImg.data('axis', 'Y');
                currentImg.rotate('90deg')
                .animate({
                    rotate: '0deg'
                },settings.transitionSpeed, function(){
                    endEffect();
                });
            }else if(effect == 'openBookX'){
                currentImg.data('axis', 'X');
                currentImg.rotate('90deg')
                .animate({
                    rotate: '0deg'
                },settings.transitionSpeed, function(){
                    endEffect();
                });
            }else if(effect == 'zoomIn'){
                currentImg.scale('2')
                .animate({
                    scale: '1'
                },settings.transitionSpeed, function(){
                    endEffect();
                });
            }else if(effect == 'zoomOut'){
                currentImg.scale('0')
                .animate({
                    scale: '1'
                },settings.transitionSpeed, function(){
                    endEffect();
                });
            }


        };

        var isReady = function(){
            var rtn = true;

            var currentImg = imgs.eq(current);
            var effect = currentImg.data('effect');

            if(!ready){
                rtn = false;
            }

            return rtn;
        }

        // ======== CIRCULAR TIMER ======== //

              //var timer;
              var as_circularTimer = container.find('div.as_circularTimer');
              var timerCurrent;
              var timerFinish;
              var timerSeconds = settings.playInterval/1000;
              var drawTimer = function(percent){
                  as_circularTimer.html('<div class="as_percent"></div><div id="as_peace"'+(percent > 50?' class="gt50"':'')+'><div class="as_pie"></div>'+(percent > 50?'<div class="as_pie as_fill"></div>':'')+'</div>');
                  var deg = 360/100*percent;
                  container.find('#as_peace .as_pie').css({
                    '-moz-transform':'rotate('+deg+'deg)',
                    '-webkit-transform':'rotate('+deg+'deg)',
                    '-o-transform':'rotate('+deg+'deg)',
                    'transform':'rotate('+deg+'deg)'
                  });
                  container.find('.as_percent').html(Math.round(percent)+'%');
                  //vars.timer = setInterval(stopWatch(), 50);
              }
              var stopWatch = function(){
                  var seconds = (timerFinish-(new Date().getTime()))/1000;

                  if(seconds <= 0){
                    drawTimer(100);
                    clearInterval(vars2.timer);
                    //alert('Finished counting down from '+timerSeconds);
                  }else{
                    var percent = 100-((seconds/timerSeconds)*100);
                    drawTimer(percent);
                  }
              }


              timerCurrent = 0;



        // ======== END CIRCULAR TIMER ======== //

        //update timer
        var updateTimer = function(){
            as_timer.animate( { width: '100%' }, settings.playInterval, 'linear' );

            //Circular Timer
            timerFinish = new Date().getTime()+(timerSeconds*1000);
            vars2.timer = window.setInterval(function(){
                stopWatch();
            }, 50);
        };

        //stop timer
        var stopTimer = function(){
            as_timer.stop( true ).width( 0 );

            //Circular Timer
            container.find('#as_peace .as_pie').css({
                '-moz-transform':'rotate(360deg)',
                '-webkit-transform':'rotate(360deg)',
                '-o-transform':'rotate(360deg)',
                'transform':'rotate(360deg)'
              });

            clearInterval(vars2.timer);

            as_circularTimer.html('');
        };

        var transitionReady = function(){

            container.find('.as_boxesContainer').remove();
            ready = true;

            if(play){

                clearTimeout(vars.interval);

                if(settings.loop == false && current == imgs.length-1){
                    settings.onSlideshowEnd();
                    return;
                }

                vars.interval = setTimeout(function(){
                    next();
                }, settings.playInterval);

                updateTimer();
            }
        }

        var caption = function(){

            if(settings.captions == false){
                return false;
            }

            var imgCurr = imgs.eq(current);

            //caption
            var caption = imgCurr.data('caption');
            if(caption != undefined){
                var span = $('<span/>').html(caption).fadeTo(1,1);

                var captionFx = imgCurr.data('captioneffect');
                if( captionFx == undefined ){
                    captionFx = 'fade';
                }

                /*
                as_captions.html(span)
                    .css('margin-left',-imgs.width())
                    .show()
                    .animate({
                        'margin-left':'0px'
                        },300, function(){
                            span.fadeTo(1,1);
                            transitionReady();
                        });
                */
                var bottom = as_captions.css('bottom');

                var direction = 'right';
                var sign = -1;
                var right = as_captions.css('right');
                if(right == 'auto'){
                    direction = 'left';
                    sign = 1;
                }

                if(captionFx == 'fade'){

                    as_captions.html(span).hide().fadeIn(settings.captionSpeed, function(){
                        //span.fadeTo(1,1);
                        transitionReady();
                    });

                }else if(captionFx == 'slide'){

                    as_captions.html(span).hide().slideDown(settings.captionSpeed, function(){
                        //span.fadeTo(1,1);
                        transitionReady();
                    });

                }else if(captionFx == 'show'){

                    as_captions.html(span).hide().show(settings.captionSpeed, function(){
                        //span.fadeTo(1,1);
                        transitionReady();
                    });

                }else if(captionFx == 'fromTop'){

                    as_captions.html(span).show().css({
                        'bottom': container.outerHeight()
                    })
                    .animate({
                        'bottom': bottom
                    },settings.captionSpeed, function(){
                        //span.fadeTo(1,1);
                        transitionReady();
                    });

                }else if(captionFx == 'fromBottom'){

                    as_captions.html(span).show().css({
                        'bottom': -as_captions.outerHeight()
                    })
                    .animate({
                        'bottom': bottom
                    },settings.captionSpeed, function(){
                        //span.fadeTo(1,1);
                        transitionReady();
                    });

                }else if(captionFx == 'fromRight'){
                    as_captions.html(span).show().css('margin-'+direction, (imgs.width()*sign) )
                    .animate({
                        'margin-left':'0px',
                        'margin-right':'0px'
                        }, settings.captionSpeed, function(){
                            //span.fadeTo(1,1);
                            transitionReady();
                        });

                }else if(captionFx == 'fromLeft'){
                    as_captions.html(span).show().css('margin-'+direction, (-imgs.width()*sign) )
                    .animate({
                        'margin-left' :'0px',
                        'margin-right' :'0px'
                        }, settings.captionSpeed, function(){
                            //span.fadeTo(1,1);
                            transitionReady();
                        });

                }else if(captionFx == 'openBookY'){
                    as_captions.html(span).show().data('axis', 'Y');
                    as_captions.rotate('90deg')
                    .animate({
                        rotate: '0deg'
                    },settings.captionSpeed, function(){
                        //span.fadeTo(1,1);
                        transitionReady();
                    });
                }else if(captionFx == 'openBookX'){
                    as_captions.html(span).show().data('axis', 'X');
                    as_captions.rotate('90deg')
                    .animate({
                        rotate: '0deg'
                    },settings.captionSpeed, function(){
                        //span.fadeTo(1,1);
                        transitionReady();
                    });
                }else if(captionFx == 'zoomIn'){
                    as_captions.html(span).show().scale('2')
                    .animate({
                        scale: '1'
                    },settings.captionSpeed, function(){
                        //span.fadeTo(1,1);
                        transitionReady();
                    });
                }else if(captionFx == 'zoomOut'){
                    as_captions.html(span).show().scale('0')
                    .animate({
                        scale: '1'
                    },settings.captionSpeed, function(){
                        //span.fadeTo(1,1);
                        transitionReady();
                    });
                }

                return true;
            }else{
                return false;
            }
        }

        //When the effect finish
        var endEffect = function(){
            //return;
            imgs.show();

            settings.afterTransition();

            if(!caption()){
                transitionReady();
            }

        };

        //update current to the next
        var next = function(){
            if(!isReady())return;
            ready = false;

            settings.beforeTransition();
            as_captions.hide();

            before = current;
            current++;
            if(current > imgs.length-1){
                current = 0;
            }

            showThumb();

            //Update the navigation bar
            as_navContainer.children('.as_navBtn').eq(current).addClass('selected').siblings('.as_navBtn').removeClass('selected');

            stopTimer();
            runEffect();
        };

        var prev = function(){
            if(!isReady())return;
            ready = false;

            settings.beforeTransition();
            as_captions.hide();

            before = current;
            current--;
            if(current < 0){
                current = imgs.length-1;
            }

            //Update the navigation bar
            as_navContainer.children('.as_navBtn').eq(current).addClass('selected').siblings('.as_navBtn').removeClass('selected');

            stopTimer();
            runEffect();
        };

        //next event
        as_next.on('click', function(){
            next();
        });

        //prev event
        as_prev.on('click', function(){
            prev();
        });

        //Keyboard navigation
        if(settings.keyboardNav){
            $(document).keydown(function(event){
                //prev keyCode
                if(event.keyCode == '37'){
                    prev();
                }
                //next keyCode
                if(event.keyCode == '39'){
                    next();
                }
            });
        }

        //Bar navigation
        as_navContainer.on('click', '.as_navBtn', function(){
            $this = $(this);

            //If user clicks on the option that is selected already then do nothing
            if($this.hasClass('selected'))return;

            //If the transition hasn't complete then do nothing as well
            if(!isReady())return;

            $this.addClass('selected').siblings('.as_navBtn').removeClass('selected');

            goTo($this.data('img'));

            showThumb();
        });

        var showThumb = function(){
            if(!settings.thumbnails)return;

            if(current == thumbNumber){
                as_tip.stop().hide();
                return;
            }

            if(thumbNumber == -1)return;

            var img = thumbs[thumbNumber];

            var width = $(imgs[thumbNumber]).width() * (settings.thumbnailSize/100);
            var height = $(imgs[thumbNumber]).height() * (settings.thumbnailSize/100);

            $(img).width(width).height(height);
            as_tip.width(width).height(height);

            var navBtnCurrent = as_navContainer.find('div.as_navBtn').eq(thumbNumber);

            var extra = 5;

            if(settings.navBarNumeric)extra = 0;

            as_tip.fadeIn(300).css({
                'top' : $this.offset().top - as_tip.outerHeight() - 10,
                'left' : $this.offset().left - as_tip.outerWidth()/2
            }).html(img+'<div class="as_arrow" style="left:'+(as_tip.outerWidth()/2-extra)+'px;"/>');
        }

        if(settings.thumbnails){
            //tip
            as_tip = $('<div class="as_tip" />');
            $('body').append(as_tip.hide());

            var thumbs = [];
            imgs.each(function(i){
                var src = $(this).attr('src');
                thumbs.push('<img src=\''+src+'\' />');
            });

            //Bar thumbnails
            as_navContainer.on('mouseover', '.as_navBtn', function(){
                $this = $(this);


                var imgNumber = $this.data('img');
                thumbNumber = imgNumber;

                showThumb();
            });

            as_navContainer.on('mouseout', '.as_navBtn', function(){
                as_tip.stop().hide();
                thumbNumber = -1;
            });
        }

        //go to the specify index
        var goTo = function(index){
            if(!isReady())return;
            ready = false;

            settings.beforeTransition();
            as_captions.hide();

            before = current;
            current = index;

            clearTimeout(vars.interval);
            stopTimer();

            runEffect();
        };


        var playEvt = function(){
            vars.interval = setTimeout(function(){
                next();
            }, settings.playInterval);

            as_play.addClass('as_pause');
            updateTimer();
        };

        //If autoPlay is on then go ahead and begin the party
        if(caption() && settings.autoPlay == true){
            as_play.addClass('as_pause');
        }else if(settings.autoPlay == true){
            playEvt();
        }

        //play button
        as_play.on('click', function(){
            $this = $(this);
            if($this.hasClass('as_pause')){
                $this.removeClass('as_pause');
                play = false;
                clearTimeout(vars.interval);
                stopTimer();
                settings.onPause();
            }else{
                play = true;
                $this.addClass('as_pause');
                playEvt();
                settings.onPlay();
            }

        });

        //swipe support

        //dont allow to drag the images with the mouse
        imgs.on('dragstart', function(event) {
            event.preventDefault();
        });

        imgs.touchSwipeLeft(function() {
            next();
        })
        .touchSwipeRight(function() {
            prev();
        });

        return this;

    };//END OF Auto Slider OBJECT










    $.fn.autoSlider = function(options) {

        return this.each(function(key, value){
            var element = $(this);
            // Return early if this element already has a plugin instance
            if (element.data('autoSlider')) return element.data('autoSlider');
            // Pass options to plugin constructor
            var autoSlider = new AutoSlider(this, options);
            // Store plugin object in this element's data
            element.data('autoSlider', autoSlider);
        });

    };

    //Default settings
    $.fn.autoSlider.defaults = {
        theme               : 'default', //The theme of the slider (default, theme1, theme2, theme3)
        width               : '100%', //The width of the slider, if it set to 0 it will take the width of the largest image
        autoPlay            : true, //auto play the images of the slider when is loaded
        rightClickImages    : false, //Enable right click on the images of the slider
        showTimer           : true, //show the timer line
        circularTimer       : false, //Circular Timer
        playInterval        : 4000, //Time between transitions when auto play is on
        playBtn             : true, //show play button
        loop                : true, //when play is on if is set to true start slideshow again when it finishes
        navArrows           : true, //show prev and next arrows
        navBar              : true, //show the navigation bar
        navBarNumeric       : false, //If the navigation bar will show the numbers of images
        autoHideNavArrows   : false, //if it set to true then show the prev and next arrow only when you do a mouseover
        autoHidePlayBtn     : true, //if it set to true then show the play button only when you do a mouseover
        autoHideNavBar      : false, //if it set to true then show the navigation bar only when you do a mouseover
        keyboardNav         : true, //navigation with arrows right and left of the keyboard
        transitionSpeed     : 1000, //原數值是700，The speed between transitions
        boxSpeed            : 750, //願數值是450，The animation speed of a single box (must be lower than transitionSpeed)
        captionSpeed        : 300, //The animation speed of the caption
        captions            : true, //Show captions of the images that have text to show
        autoHideCaptions    : false, //if it set to true then show the captions only when you do a mouseover
        thumbnails          : true, //Show thumbnails when hovering nav
        thumbnailSize       : 20, //Thumbnail size (percentage of the original image)
        x                   : 8, //when using boxes the x axis
        y                   : 4, //when using boxes the y axis
        hideIconsInWidth    : 500, //Hide the icons(arrows, plat btn, navbar) when the width is 500px or less for responsive design
        hideTimerInWidth    : 500, //Hide the timer when the width is 500px or less for responsive design
        shadow              : true, //A CSS3 shadow of the slider
        beforeTransition    : function(){}, //execute a function before right before the transition begins
        afterTransition     : function(){}, //execute a function after the transition completes
        onSlideshowEnd      : function() {}, // Runs when the slideshow finishes ( "loop" must be set to false )
        onPlay              : function() {}, // Runs when somebody click the button play
        onPause             : function() {} // Runs when somebody click the button pause
    };

    $.fn._reverse = [].reverse;

})(jQuery);
