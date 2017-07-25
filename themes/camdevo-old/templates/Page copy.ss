<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <% base_tag %>
        <title>$Title</title>
        <meta name="description" content="Cambridgeshire Devo">
        <meta name="agency" content="SuffolkCloud">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">        
        <link rel="stylesheet" type="text/css" media="screen" href="$ThemeDir/css/jquery.sidr.light.css">
        <link rel="stylesheet" type="text/css" media="screen" href="$ThemeDir/css/hamburgers.css">
        <link rel="stylesheet" type="text/css" media="screen" href="$ThemeDir/css/normalize.css">
        <link rel="stylesheet" type="text/css" media="screen" href="$ThemeDir/css/skeleton.css">
        <link rel="stylesheet" type="text/css" media="screen" href="$ThemeDir/css/site.css">
        <% include GoogleAnalytics %>
    </head>
    <body class="$ClassName">
        
        <div id="sidr">
            <% include MobileNav %>
        </div>      

        <% include Header %>
   
        <div class="container">
            $Layout
        </div>

        <% include Footer %>
        <script>
            $(".hamburger-box").click(function(){
                $("button.hamburger").toggleClass("is-active");
            });
        </script>
        <script>
            jQuery(document).ready(function() {
              jQuery('#sidr-menu').sidr({
                side: 'left',
                onOpen : function() {jQuery("a.menuButton.mobileNav").addClass("opened")},
                onClose : function() {jQuery("a.menuButton.mobileNav").removeClass("opened")},  
                    });           
            });
        </script>         
    </body>
</html>