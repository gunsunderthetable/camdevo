<?php
class HomePage extends Page {

    public static $db = array(
        "NumberOfNews" => "Text",
        "NumberOfEvents" => "Text",
        "HideNews" => "Boolean",
        "HideEvents" => "Boolean",
        "QuickLinksHeader" => "Text",
        "Announcement" => "Text",
        "AnnouncementExternalLink" => "Text"
    );

    public static $has_one = array(
        "AnnouncementLink" => "SiteTree",
        'MyBlogHolder' => 'BlogHolder'
    );

    public static $has_many = array(
        "Links" => "Link",
        "Slides" => "Slide",
        "Stories" => "Story"
    );  

    public function getCMSFields() {
      $fields = parent::getCMSFields();
      $fields->removeFieldFromTab('Root','Widgets');
      $fields->removeFieldFromTab('Root','ImageLinks');
      $fields->removeFieldFromTab('Root','Map');
      $fields->addFieldsToTab('Root.Main',new TextField("Announcement","Announcement"),'Content');
      $fields->addFieldsToTab('Root.Main',new TextField("AnnouncementExternalLink","Announcement external link - include http:\\ "),'Content');
      

      
      $fields->addFieldsToTab('Root.Main',new TreeDropdownField('AnnouncementLinkID', 'Select a page to link to from the announcement bar', 'SiteTree'),'Content');

      $gridFieldBoxConfig = GridFieldConfig::create()->addComponents(
          new GridFieldSortableRows('SortOrder'),                         
          new GridFieldToolbarHeader(),
          new GridFieldAddNewButton('toolbar-header-right'),
          new GridFieldSortableHeader(),
          new GridFieldDataColumns(),
          new GridFieldPaginator(10),
          new GridFieldEditButton(),
          new GridFieldDeleteAction(),
          new GridFieldDetailForm()
      );

      $gridField = new GridField("Stories", "Stories", $this->Stories(), $gridFieldBoxConfig);
      $fields->addFieldToTab("Root.Stories", $gridField);  

      $gridFieldBoxConfig = GridFieldConfig::create()->addComponents(
          new GridFieldSortableRows('SortOrder'),                         
          new GridFieldToolbarHeader(),
          new GridFieldAddNewButton('toolbar-header-right'),
          new GridFieldSortableHeader(),
          new GridFieldDataColumns(),
          new GridFieldPaginator(10),
          new GridFieldEditButton(),
          new GridFieldDeleteAction(),
          new GridFieldDetailForm()
      );

      $gridField = new GridField("Slides", "Slides", $this->Slides(), $gridFieldBoxConfig);
      $fields->addFieldToTab("Root.Backgrounds", $gridField);

      $fields->addFieldToTab('Root.Main', new TreeDropdownField('MyBlogHolderID', 'Chose a blog holder containing news for the homepage listing', 'SiteTree'),'Content');

      return $fields;
        
        
    }
    
    public function getBlogHoldersForDropdown() {

    }
    public function getNews($num=3) {
        $num=$this->NumberOfNews;      
        if ($holder=BlogHolder::get()->byID($this->MyBlogHolderID)) {
            return ($holder) ? BlogEntry::get()->filter('ParentID', $holder->ID)->sort('Date', 'DESC')->limit(3) : false;
        }
    }

    public function getNewsHolder() {
        if ($holder=BlogHolder::get()->byID($this->MyBlogHolderID)) {
             return $holder;
        }
    }        

    public function getEvents() {
        $num=$this->NumberOfEvents;      

        // uses the Calendar function
        if ($calendar = Calendar::get()->First()) {
            return $calendar->UpcomingEvents(3);

        }
    }

    public function getPastEvents() {
        //THE OLD EVENT FUNC
        //echo 'getting past events...<br><br><br><br><br>';
        $num=$this->NumberOfEvents;      
        if ($calendar = Calendar::get()->First()) {
            //echo '<hr>returning events...<br><br><br><br><br>';
            $events=$calendar->RecentEvents(6);
            //var_dump($events);
            return $events;
        } 
    }

    public function getEventsHolder() {
        if ($holder = Calendar::get()->First()) {
            return $holder;
        }
    }

    public function getPastEventsByDate() {
      if ($eventDates = CalendarDateTime::get()->where("StartDate < CURDATE()")->sort('StartDate','DESC')->limit(5)) {
          $events = new ArrayList();

          foreach($eventDates as $eventDate) {
              if($event = CalendarEvent::get()->byID($eventDate->EventID)) {
                $events->push($event);   
              }
          }
          if ($events) {
            return $events;        
          }
      }

    }
   

}

class HomePage_Controller extends Page_Controller {
	
}
