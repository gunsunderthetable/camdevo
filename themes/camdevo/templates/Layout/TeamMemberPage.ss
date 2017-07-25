<div class="twelve columns">
        <div id="pagePanel" class="clearFix">
            $Breadcrumbs 

            <div class="pageContent">
                <h1>$Title</h1>
                <div id="memberDetails" class="clearFix">
                    <div id ="memberText">
                        <% if $LocalAuthority || $Position || $Portfolio || $Telephone || $Email %>
                        <p class="memberSummary">
                            <% if $LocalAuthority %><strong>Local Authority: </strong>$LocalAuthority<br><% end_if %>
                            <% if $Organisation %><strong>Organisation: </strong>$Organisation<br><% end_if %>
                            <% if $Position %><strong>Position: </strong>$Position<br><% end_if %>
                            <% if $Portfolio %><strong>Portfolio: </strong>$Portfolio<br><% end_if %>
                            <% if $Telephone %><strong>Telephone: </strong>$Telephone<br><% end_if %>
                            <% if $Email %><strong>Email: </strong>$Email<br><% end_if %>
                        </p>
                        <% end_if %>
                        $Content
                    </div>
                    <img class="memberPortrait" src="$Portrait.CroppedImage(300,360).URL" alt="$Title" title="$Title" />

                </div>
                <% if $Children %>
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
            <div class="rightPanel">
                <% if $Links %>
                <h2>Links</h2>
                $Links
                <% end_if %>
                <% include SubNav %>
                $MyWidgetArea
                <% include ImageLinks %>
            </div>
        </div>
</div>