<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <% base_tag %>
        <title>$Title</title>
        <meta name="description" content="$SiteConfig.Title - $Title">
        <meta name="agency" content="Adrian Lynch">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">       
        <link rel="stylesheet" type="text/css" href="$ThemeDir/css/jquery.sidr.light.css">
        <link rel="stylesheet" type="text/css" href="$ThemeDir/css/hamburgers.css">
        <link rel="stylesheet" type="text/css" href="$ThemeDir/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="$ThemeDir/css/skeleton.css">
        <link rel="stylesheet" type="text/css" href="$ThemeDir/css/search.css">
        <link rel="stylesheet" type="text/css" href="$ThemeDir/css/site.css">



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
            jQuery(document).ready(function() {
                jQuery('#sidr-menu').sidr({
                    side: 'right',
                    displace : false,
                    onOpen : function() {jQuery("button.hamburger").addClass("is-active")},
                    onClose : function() {jQuery("button.hamburger").removeClass("is-active")},  
                });           
            });
        </script>        
    </body>

</html>