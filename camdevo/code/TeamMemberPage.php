<?php

class TeamMemberPage extends Page {
            public static $db = array(
                //'Name' => 'Varchar',
                'LocalAuthority' => 'Varchar',
                'Organisation' => 'Varchar',
                'Position' => 'Varchar',
                'Portfolio' => 'Varchar',
                'Telephone' => 'Varchar',
                'Email' => 'Varchar'
            );

            public static $has_one = array(
                'Portrait' => 'Image'
            );
            
            public function getCMSFields() {
                $fields = parent::getCMSFields();
                //$fields->addFieldToTab('Root.Main', new TextField("Name", "Name"), "Content");  
                $fields->addFieldToTab('Root.Main', new TextField("LocalAuthority", "LocalAuthority"), "Content");  
                $fields->addFieldToTab('Root.Main', new TextField("Organisation", "Organisation"), "Content");  
                $fields->addFieldToTab('Root.Main', new TextField("Position", "Position"), "Content");  
                $fields->addFieldToTab('Root.Main', new TextField("Portfolio", "Portfolio"), "Content");  
                $fields->addFieldToTab('Root.Main', new TextField("Telephone", "Telephone"), "Content");  
                $fields->addFieldToTab('Root.Main', new TextField("Email", "Email"), "Content"); 
                $fields->addFieldToTab('Root.Main', new UploadField("Portrait", "Portrait image"), "Content"); 

                return $fields; 
            }     	

}

class TeamMemberPage_Controller extends Page_Controller {

	
}
