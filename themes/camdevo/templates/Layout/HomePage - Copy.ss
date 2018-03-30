    <div id="pagePanel" class="home clearFix <% if $Announcement %> hasAnnouncement<% end_if %>">
        <div id="homePageContent">
            $Content
        </div>  

        <% if $Stories %>
        <div id="mobileStories" class="clearFix">
        <% loop $Stories %>
            <div class="mobileStory $FirstLast">
                <div class="mobileStoryInner">
                <h2>$Title</h2>
                <% if $StoryImageID %><img src="$StoryImage.CroppedImage(600,320).URL" alt="$Title" title="$Title" /><% end_if %>
                $Description
                <% if $PageID || $ExternalLink %>
                    <% if $PageID %>
                        <% with $Page %><a class="readMore" href="$Link">Read more</a><% end_with %>
                    <% else %>
                        <a class="readMore" href="$ExternalLink" target="_blank">Read more</a>
                    <% end_if %>
                <% end_if %>
                </div>
            </div>
        <% end_loop %>
        </div>
        <% end_if %> 
        <div id="newsEventsWrap" class="clearFix">
            <div id="news">
                <h2 class="clearFix">NEWS</h2>
                <% loop $News %>
                <div class="feature $FirstLast">
                    <a href="$Link"><h3>$Title</h3></a>
                </div>
                <% end_loop %>
                <a class="clearFix readMore" href="$NewsHolder.Link">See all news</a>
            </div>
            <div id="events">
                <div class="tabs">
                    <ul class="tab-links">
                        <li class="active"><a href="#futuretab">MEETINGS</a></li>
                        <li><a href="#pasttab">RECENT MEETINGS</a></li>
                    </ul>
                     
                    <div class="tab-content">
                        <div id="futuretab" class="tab active">
                            <% include EventListForHomePage %>
                            <a class="clearFix readMore" href="$EventsHolder.Link">See all meetings</a>
                        </div>
                     
                        <div id="pasttab" class="tab">
                            <% include PastEventsForHomePage %>
                            <a class="clearFix readMore" href="$EventsHolder.Link">See all meetings</a>
                        </div>
                    </div>
                </div>                
            </div>
        </div>

    </div>

<% require css("mysite/css/tabs.css") %>
<% require javascript("mysite/javascript/tabs.js") %>


