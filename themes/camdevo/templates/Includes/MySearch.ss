        <div id="sb-search" class="sb-search">
                <form id="SearchForm_SearchForm" action="/camdevo/home/SearchForm" method="get" enctype="application/x-www-form-urlencoded">
                    <input class="sb-search-input text nolabel" placeholder="Enter your search term..." type="text" value="" name="Search" id="SearchForm_SearchForm_Search">
                    <input class="action sb-search-submit" type="submit" value="Go" name="action_results" id="SearchForm_SearchForm_action_results">
                    <span class="sb-icon-search"></span>
                </form>
            </div>
        <script src="mysite/javascript/uisearch.js"></script>
        <script>
            new UISearch( document.getElementById( 'sb-search' ) );
        </script>