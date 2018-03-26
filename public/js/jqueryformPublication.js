$(document).ready(function() {
    //jQuery time
    var current_fs, next_fs, previous_fs; //fieldsets
    var choice;
    var left, opacity, scale; //fieldset properties which we will animate
    var animating; //flag to prevent quick multi-click glitches
  
   // configure your validation
   $('select[name=type]').change(function() {
     switch ( $(this).val() ) {
  
       case 'conference' :
         choice = $('#conferenceFieldset');
         break;
       case 'editorship' :
         choice = $('#editorshipFieldset');
         break;
       }
     });
  
  
    $(".next").click(function() {
        if (animating) return false;
        animating = true;
  
        if(choice == null){
          choice = $('#journalFieldset');
        }
  
  
        current_fs = $(this).parent();
        next_fs = choice;
  
        //activate next step on progressbar using the index of next_fs
        $("#progressbar li").eq( 1 ).addClass("active");
  
  
  
  
        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale current_fs down to 80%
                scale = 1 - (1 - now) * 0.2;
                //2. bring next_fs from the right(50%)
                left = (now * 50) + "%";
                //3. increase opacity of next_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({
                    'transform': 'scale(' + scale + ')',
                    'display' : 'none'
  
                });
                next_fs.css({
                    'left': left,
                    'opacity': opacity
                });
            },
            duration: 800,
            complete: function() {
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
  
    });
  
  
    $(".previous").click(function() {
        if (animating) return false;
        animating = true;
  
        current_fs = $(this).parent();
        previous_fs = choice;
  
        //de-activate current step on progressbar
        $("#progressbar li").eq( 2 ).removeClass("active");
  
        //show the previous fieldset
        previous_fs.show();
        //hide the current fieldset with style
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale previous_fs from 80% to 100%
                scale = 0.8 + (1 - now) * 0.2;
                //2. take current_fs to the right(50%) - from 0%
                left = ((1 - now) * 50) + "%";
                //3. increase opacity of previous_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({
                    'left': left,
                    'display' : 'none'
                });
                previous_fs.css({
                    'transform': 'scale(' + scale + ')',
                    'opacity': opacity
                });
            },
            duration: 800,
            complete: function() {
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    });
  
    $("a:contains('Next')").click(function() {
        if (animating) return false;
        animating = true;
  
        current_fs = $(this).parent();
        next_fs = $('#media');
  
        console.log(current_fs);
        console.log(next_fs);
  
  
        //activate next step on progressbar using the index of next_fs
        $("#progressbar li").eq( 2 ).addClass("active");
        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale current_fs down to 80%
  
                //2. bring next_fs from the right(50%)
                left = (now * 50) + "%";
                //3. increase opacity of next_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({
                    'transform': 'scale(' + scale + ')',
                    'display' : 'none'
  
                });
                next_fs.css({
                    'left': left,
                    'opacity': opacity
                });
            },
            duration: 800,
            complete: function() {
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    });
  
    $("a:contains('Previous')").click(function() {
        if (animating) return false;
        animating = true;
  
        current_fs = $(this).parent();
        previous_fs = $('#primary');
  
        //de-activate current step on progressbar
        $("#progressbar li").eq( 1 ).removeClass("active");
  
        //show the previous fieldset
        previous_fs.show();
        //hide the current fieldset with style
        current_fs.animate({
            opacity: 0
  
        }, {
            step: function(now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale previous_fs from 80% to 100%
                scale = 0.8 + (1 - now) * 0.2;
                //2. take current_fs to the right(50%) - from 0%
                left = ((1 - now) * 50) + "%";
                //3. increase opacity of previous_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({
                    'left': left,
                    'display' : 'none'
                });
                previous_fs.css({
                    'transform': 'scale(' + scale + ')',
                    'opacity': opacity
                });
            },
            duration: 800,
            complete: function() {
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    });
  
  });
  