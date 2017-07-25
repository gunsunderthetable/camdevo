<?php

	class Box extends DataObject{
		
		public static $db = array(
			'Title' => 'Varchar(200)',
			'Description' => 'Text',
            'ExternalLink' => 'Text',
            'HTMLSnippet' => 'HTMLText',
            'SortOrder'=>'Int'                          
		);
		
		public static $has_one = array(
			'BoxImage' => 'Image',
			'BoxHomePage' => 'BoxHomePage',
			'Page' => 'SiteTree'
		);
                
        public static $default_sort='SortOrder';		
                
		public function getCMSFields(){
			return new FieldList(
				new TextField('Title', 'Slide title'),
				new TextareaField('Description', 'Slide description'),
				new TextareaField('HTMLSnippet', 'HTML paste'),
                new TextField('ExternalLink', 'External link - needs to start with http:\\'),
				new TreeDropdownField('PageID', 'Select a page to link to from the image', 'SiteTree'),
				new UploadField('BoxImage', 'Image')
			);
		}
		
	}
