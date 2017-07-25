<script>
$('ul.sortable').each(function() {
    $(this).find('li').sort(function(a, b) {
    	return $(a).text() < $(b).text() ? -1 : 1;
    }).appendTo(this);
})
</script>