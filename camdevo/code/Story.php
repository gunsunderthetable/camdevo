<?php

	class Story extends DataObject{
		
		public static $db = array(
			'Title' => 'Varchar(200)',
			'Description' => 'HTMLText',
            'ExternalLink' => 'Text',
            'ShowLink' => 'Boolean',
            'SortOrder'=>'Int'                          
		);
		
		public static $has_one = array(
			'StoryImage' => 'Image',
			'HomePage' => 'HomePage',
			'Page' => 'SiteTree'
		);
                
        public static $default_sort='SortOrder';		
                
		public function getCMSFields(){
			return new FieldList(
				new TextField('Title', 'Slide title'),
				new HTMLEditorField('Description', 'Content'),
        		new TextField('ExternalLink', 'External link - needs to start with http:\\'),
				new TreeDropdownField('PageID', 'Select a page to link to from the image', 'SiteTree'),
				new UploadField('StoryImage', 'Image')
			);
		}
		
	}
