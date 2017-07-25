<div id="subNav" class="sidrNav">
	<div id="menuImages">
		<a href="$BaseHref" ><img class="menuLogo" src="themes/camdevo/images/menu_logo.png" alt="menu logo" /></a>
		<a id="sidr-menu-close" href="#"><img src="themes/camdevo/images/sidr_close.png" alt="close side menu"></a>
	</div>
    <ul>
        <% loop Menu(1) %>
        <li>
            <a href="$Link" title="$Title" class="$LinkingMode">$MenuTitle</a>
            <% if $ClassName == "BlogHolder" || $ClassName == "Calendar" || $ClassName == "TeamMemberListingPage" %>
            <% else %>
            <% if $Children %>
                <ul class="mobileChildren">

                <% loop $Children %>
                    <li><a href="$Link" title="$Title" class="$LinkingMode">$MenuTitle</a></li>
                <% end_loop %>
                </ul>
            <% end_if %>
            <% end_if %>
        </li>
        <% end_loop %>
    </ul>
</div>