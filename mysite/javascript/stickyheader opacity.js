       /*---------------- check fixed menu position-------------------------*/
        jQuery(window).scroll(function() {    
            var scroll = $(window).scrollTop();

             
            if (scroll >= 200) {
                //clearHeader, not clearheader - caps H
                jQuery("#navWrap").addClass("lessOpaque");
            } else {
                jQuery("#navWrap").removeClass("lessOpaque");
            }
        }); 