
<% loop Events %>
	<div class="feature $FirstLast">
        <a href="$Link"><h3><% if Announcement %>$Title<% else %>$Event.Title<% end_if %></h3></a>
        <p class="dates">$DateRange <% if AllDay %><% _t('ALLDAY','All Day') %><% else %><% if StartTime %>$TimeRange<% end_if %><% end_if %> 
        <% if Announcement %>
            $Content
        <% end_if %>
        </p>
    </div>
<% end_loop %>

