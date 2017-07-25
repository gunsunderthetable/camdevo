<?php
	class AssetLister extends Page{
        public static $db = array(
            "SortOrder" => "Boolean",
            "ShowInSideBar" => "Boolean"
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
		
		public function getFiles()
		{
			if($this->FolderID)
			{
                $records = File::get()->filter(array(
                    'ParentID' => $this->FolderID
                ))->sort('LastEdited','DESC');
                return $records;
			}                        
                        
		}
	}
    class AssetLister_Controller extends Page_Controller {
        function init() {
            Requirements::css("assetlister/css/assetlister.css");
            parent::init();
        } 
    }