$(document).ready(function(){
        $("#browser").treeview({
                toggle: function() {
                        console.log("%s was toggled.", $(this).find(">span").text());
                }
        });

        $("#add").click(function() {
                var branches = $("<li><span class='Folder'>New Sublist</span><ul>" +
                        "<li><span class='File'>Item1</span></li>" +
                        "<li><span class='File'>Item2</span></li></ul></li>").appendTo("#browser");
                $("#browser").treeview({
                        add: branches
                });
        });
});