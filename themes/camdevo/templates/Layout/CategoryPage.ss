<div class="twelve columns">
        <div id="pagePanel" class="clearFix">
            $Breadcrumbs 

            <div class="pageContent">

                <div id="categoryMedia" class="tabs">
                    <ul class="tab-links">
                        <li class="active first"><a href="#contentTab">ABOUT</a></li>
                        <li><a href="#newsTab">NEWS</a></li>
                        <li><a href="#eventsTab">MEETINGS</a></li>
                        <li><a href="#filesTab">DOCUMENTS</a></li>
                    </ul>
                     
                    <div class="tab-content">
                        <div id="contentTab" class="tab active">
                            <h1>$Title</h1>
                            $Content
                            $Form
                            $PageComments
                        </div>
                        <div id="newsTab" class="tab">
                            <% loop $BlogsByCategory %>
                                <div class="feature $FirstLast">
                                    <h3><a href="$Link" alt="$Title">$Title</a></h3>
                                    <p>$Date.DayOfMonth $Date.Month $Date.Year<br>$Content.FirstSentence</p>
                                </div>
                            <% end_loop %>
                        </div>
                     
                        <div id="eventsTab" class="tab">
                            <% loop $EventsByDateCategory %>
                                <div class="feature $FirstLast">
                                    <h3><a href="$Link" alt="$Title">$Title</a></h3>
                                    <% loop $DateTimes %>$StartDate.DayOfMonth $StartDate.Month $StartDate.Year<% end_loop %><p> $Content.FirstSentence</p>
                                </div>
                            <% end_loop %>
                        </div>

                        <div id="filesTab" class="tab">
                            <div class="assetLister">
                                <ul>
                                    <% loop FilesForPage %>
                                    <% if IsSupportedFile %>
                                    <li class="$CSSClass">
                                       <a href="$URL" alt=$Title title=$Title target="_blank">$Title</a>
                                        <br>
                                        <span class="size">uploaded on $Created.Nice</span>
                                    </li>
                                    <% end_if %>
                                    <% end_loop %>
                                </ul>
                        </div> 
                        </div>
                    </div>
                </div> 
            </div>
            <div class="rightPanel">
                <% if $LeadMember %><h2>Lead Member</h2><p>$LeadMember</p><% end_if %>
                <% if $Contact %><h2>Contact</h2><p>$Contact</p><% end_if %>
                <% if $Links %>
                <h2>Links</h2>
                $Links
                <% end_if %>
                $MyWidgetArea
                <% include ImageLinks %>
            </div>
        </div>
</div>
<% require css("mysite/css/tabs.css") %>
<% require javascript("mysite/javascript/tabs.js") %>