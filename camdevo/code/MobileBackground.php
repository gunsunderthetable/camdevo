<?php

	class MobileBackground extends DataObject{
		
		public static $db = array(
			'Title' => 'Varchar(200)',
			'Description' => 'Text',
			'SortOrder'=>'Int'                          
		);
		
		public static $has_one = array(
			'BackgroundImage' => 'Image',
			'SiteConfig' => 'SiteConfig'
		);
                
        public static $default_sort='SortOrder';		
                
		public function getCMSFields(){
			return new FieldList(
				new TextField('Title', 'Title'),
				new UploadField('BackgroundImage', 'Image')
			);
		}
		
	}
