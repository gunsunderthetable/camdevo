<div id="navWrap">
    <div class="container">
        <div id="mainNav" class="twelve columns clearFix">
            <a href="$BaseHref" ><img class="desktopHeader" src="$ThemeDir/images/header_logo.png" /></a>
            <a href="$BaseHref"><img class="mobileHeader" src="$ThemeDir/images/logo.png" alt="logo" title="logo" /></a>

            <% if $HeaderLinks %> 
            <ul>
                <% loop $HeaderLinks %>
                <li>
                    <a href="$URL" title="$LinkText">$LinkText</a>        
                </li>
                <% end_loop %>
            </ul>
            <% end_if %>            
        </div>
        <div id="sb-search" class="sb-search">
            <form id="SearchForm_SearchForm" action="/home/SearchForm" method="get" enctype="application/x-www-form-urlencoded">
                <input class="sb-search-input text nolabel" placeholder="Enter your search term..." type="text" value="" name="Search" id="SearchForm_SearchForm_Search">
                <input class="action sb-search-submit" type="submit" value="Go" name="action_results" id="SearchForm_SearchForm_action_results">
                <span class="sb-icon-search"></span>
            </form>
        </div>
        <script src="mysite/javascript/uisearch.js"></script>
        <script>
            new UISearch( document.getElementById( 'sb-search' ) );
        </script>

    </div>
    <a class="menuButton mobileNav" id="sidr-menu" href="#sidr">Menu</a>

</div>




