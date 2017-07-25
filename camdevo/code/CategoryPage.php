<?php

class CategoryPage extends ContentPage {

            static $icon = "mysite/images/page-gold-file.gif";

            public static $db = array(
                'LeadMember' => 'Varchar',
                'Contact' => 'Varchar',
                'Links' => 'HTMLText'
            ); 
            
            public static $has_one = array(
                'Category' => 'Category',
                'Folder' => 'Folder'
            );

            public function getCMSFields() {
                $fields = parent::getCMSFields();
                $fields->addFieldToTab('Root.SideBar', new TextField("LeadMember", "Lead member"));  
                $fields->addFieldToTab('Root.SideBar', new TextField("Contact", "Contact"));
                $fields->addFieldToTab('Root.SideBar', new HTMLEditorField("Links", "Links"));
                $categoryField=DropdownField::create('CategoryID', 'Category', Category::get()->map('ID', 'Name'));
                $categoryField->setEmptyString('Select a Category');
                $fields->addFieldToTab('Root.Main', $categoryField,'Content'); 
                $fields->addFieldToTab('Root.Main', new TreeDropdownField('FolderID', 'Folder', 'Folder'),'Content');
                return $fields; 
            }

            public function getBlogsByCategory() {
                $blogs = BlogEntry::get()->filter(array('CategoryID' => $this->CategoryID))->sort('Date',DESC);
                return $blogs;
            }

            public function getEventsByCategory() {
                $events = CalendarEvent::get()->filter(array('CategoryID' => $this->CategoryID));
                return $events;
            }

            public function getEventsByDateCategory() {
                $eventDates = CalendarDateTime::get()->sort('StartDate','DESC');
                $events = new ArrayList();

                foreach($eventDates as $eventDate) {
                    $event = CalendarEvent::get()->byID($eventDate->EventID);
                    if ($event->CategoryID==$this->CategoryID) {
                        $events->push($event);   
                    }
                }

                return $events;
            }
            
            public function getFilesForPage() {
                if($this->FolderID) {
                    $records = File::get()->filter(array(
                    'ParentID' => $this->FolderID
                    ))->sort('LastEdited','DESC');
                return $records;
            }                        
                        
        }

}

class CategoryPage_Controller extends Page_Controller {

	
}
