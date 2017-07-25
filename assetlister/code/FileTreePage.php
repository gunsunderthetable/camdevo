<?php


Class FileTreePage extends Page {
    
        public static $has_one = array(
                'Folder' => 'Folder',
        );

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();
            $fields->addFieldToTab('Root.Main', new TreeDropdownField('FolderID', 'Folder', 'Folder'),'Content');
            return $fields;
        }
        
        public function FilesForTree()
        {
            $results='';
            if($folderID = $this->FolderID)
            {
                $results=$this->BuildTree($folderID,$results);
            }                        
            return $results;
        }        
        
        public function BuildTree($folderID,$results) {
            
            $files = File::get()->filter(array('ParentID' => $folderID))->sort('LastEdited',DESC);
            
            //loop through making links to docs
            
            foreach ($files as $file) {
                // output each line
                $extension = pathinfo($file->Name, PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                // if the classname is image change it to File so the jquery can pick it up.
                $class=$file->ClassName;
                if ($class=='Image') {
                    $class='File';
                }
                
                if ($class=='File') {
                    // fill the string
                    $results .= '<li><span class="'.$class.' '.$extension.' image"><a href="'.$file->URL.'" target="_blank" />'.$file->Title.'</a><br><span class="greyed">'.$file->LastEdited.'</span></li>';
                } else {
                    // it is a folder
                    $results .= '<li class="closed"><span class="'.$class.'">'.$file->Title.'</span>';
                    
                    $results .= '<ul>';

                    //recurse
                    $folderID = $file->ID;
                    $results=$this->BuildTree($folderID,$results);
                    
                    $results .= '</li></ul>';                    
                }

                // if it's a folder the call the fuction again
                if ($class == 'Folder') {

                } 
                
            }
            
            //add to result array
            return $results; 
        }
        
        
}


Class FileTreePage_Controller extends Page_Controller {
        function init() {
            Requirements::clear();
            Requirements::javascript('mysite/javascript/jquery-1.11.0.min.js');
            Requirements::javascript('mysite/javascript/jquery.sidr.min.js');                
            Requirements::css("assetlister/css/assetlister.css");
            Requirements::css("assetlister/css/treeview.css");
            Requirements::javascript('assetlister/javascript/jquery.treeview.js');
            
            Requirements::javascript('assetlister/javascript/tree_init.js');
            Requirements::javascript('mysite/javascript/site.js');
            
            parent::init();
        }    
}


