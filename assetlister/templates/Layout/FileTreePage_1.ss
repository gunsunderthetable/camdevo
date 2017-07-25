<div class="twelve columns">
    <div class="row">
     $Breadcrumbs 
    </div>
    <div class="row">
    
        <div id="standardPage">
            <div class="pageContent">
                <h1>$Title</h1>
                $Content
                <div class="imageGallerytLister">
                    <ul>
                        <% loop GalleryImages %>
                        <li>
                            $Title
                        </li>
                        <% end_loop %>
                    </ul>
                </div>                
                $Form
                $PageComments
            </div>
            <div class="rightPanel">
                <% include SubNav %>
                $MyWidgetArea
            </div>
        </div>
            
    </div>
        
</div>



<div class="twelve columns">
    <div class="row">
     $Breadcrumbs 
    </div>
    <div class="row">
    
        <div id="standardPage">
            <div class="pageContent">
                <ul id="browser" class="filetree treeview-famfamfam">
                    <li><span class="folder">Folder 1</span>
                        <ul>
                            <li><span class="folder">Item 1.1</span>
                                <ul>
                                    <li><span class="file">Item 1.1.1</span></li>
                                </ul>
                            </li>

                            <li class="closed"><span class="folder">Folder 3 (closed at start)</span>
                                <ul>
                                    <li><span class="file">File 3.1</span></li>
                                </ul>
                            </li>
                            <li><span class="file">File 4</span></li>
                        </ul>
                    </li>
                </ul>                
                <h1>It's the file Tree Page</h1>
                $Content
                <ul>
                $FilesForTree
                </ul>
            </div>
            <div class="rightPanel">
                <% include SubNav %>
                $MyWidgetArea
            </div>
        </div>
            
    </div>
        
</div>