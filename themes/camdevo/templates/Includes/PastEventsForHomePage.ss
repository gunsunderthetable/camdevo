
<% loop PastEventsByDate %>
	<div class="feature $FirstLast">
   		<a href="$Link"><h3>$Title</h3></a>
    	<% if Event.Address %><div class="address">$Event.Address</div><% end_if %>
    	<p class="dates"><% with $ThisEventdate %>
    	$StartDate.Day $StartDate.Format(dS F Y) $StartTime.Format(h:ia)<% if $EndTime %> - $EndTime.Format(h:ia)<% end_if %><% end_with %></p> 
    	<% if Announcement %>
        	$Content
    	<% end_if %>
    </div>
<% end_loop %>



