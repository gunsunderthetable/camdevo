<?php
	class ImageGalleryLister extends Page{

		public static $db = array(

		);
		
		public static $has_one = array(
			'Folder' => 'Folder',
		);
		
		public function getCMSFields()
		{
            $fields = parent::getCMSFields();
			$fields->addFieldToTab('Root.Main', new TreeDropdownField('FolderID', 'Folder', 'Folder'),'Content');
   			return $fields;
		}
		
		public function getGalleryImages()
		{
            if($this->FolderID)
	        {
    			$images = File::get()->filter(array('ParentID' => $this->FolderID))->sort('LastEdited',DESC);
		        return $images;
            }                        
                        
		}
	}
        class ImageGalleryLister_Controller extends Page_Controller {
            function init() {
                Requirements::css("assetlister/css/assetlister.css");
                parent::init();
           }
        }