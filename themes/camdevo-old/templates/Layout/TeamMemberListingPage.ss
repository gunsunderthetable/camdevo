<div class="twelve columns">
        <div id="pagePanel" class="clearFix">
            $Breadcrumbs 

            <div class="pageContent members">
                <h1>$Title</h1>
                $Content

                <% if $Children %>
                <div id="memberListing">
                    <% loop Children %>
                    <div class="memberBox">
                        <a href="$Link"><img src="$Portrait.CroppedImage(300,360).URL" alt="$Title" title="$Title" />
                        <h2>$Title</h2></a>
                    </div>
                    <% end_loop %>
                </div>
                <div id="mobileLinks" class="mobile bottomed">
                    <div class="clearFix">
                        <h2>In this section</h2>
                        <p>
                            <% loop $Children %>
                            <a class="quickLinkPara $FirstLast" href="$Link" title="$Title">$Title</a>
                            <% end_loop %>
                        </p>
                    </div>
                </div>           
                <% end_if %>
                $Form
                $PageComments
            </div>
        </div>
</div>