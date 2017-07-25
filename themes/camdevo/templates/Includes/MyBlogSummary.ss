<div class="blogSummary clearFix">
    
    <div class="blogImageThumb">
    	<% if $BlogImage %>
            <% with BlogImage %>
            <img src="$CroppedImage(300,200).URL" alt="$Title" />
            <% end_with %>
        <% else %>
        	<img src="$ThemeDir/images/blog_logo.png" alt="news logo" />
	    <% end_if %> 
    </div>
	<div class="blogListing">    
		<h2 class="postTitle"><a href="$Link" title="<% _t('BlogSummary_ss.VIEWFULL', 'View full post titled -') %> '$Title'">$MenuTitle</a></h2>
		<p class="authorDate">$Date.Long</p>

		<% if BlogHolder.ShowFullEntry %>
			$Content
		<% else %> 
			<p>$Content.FirstSentence(html)</p>
		<% end_if %>
		
		<p class="blogVitals">
			<a href="$Link" class="readmore" title="Read Full Post">
				Read more
			</a>
		</p>
	</div>
</div>
