(function(jQuery) {
    jQuery(window).load(function() {

        // clear search on click
        jQuery("input#SearchForm_SearchForm_Search.text.nolabel")
        .val("Search")
        .css("color", "#ccc")
        .focus(function(){
            $(this).css("color", "black");
            if ($(this).val()=="Search") {
                $(this).val("");
            }
        })
        .blur(function(){
            $(this).css("color", "#ccc");
            if ($(this).val()=="") {
                $(this).val("Search");
            }
        });


 /*-------------------------sidr closing button-----------------------------*/
       jQuery('a#sidr-menu-close').click (function(){
           jQuery.sidr('close', 'sidr');   
           preventDefaultEvents: false
       });
       jQuery('body').click (function(){
           jQuery.sidr('close', 'sidr');   
           preventDefaultEvents: false
       });
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
    
   });
})(jQuery);

