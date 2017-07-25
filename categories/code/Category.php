<?php
class Category extends DataObject {
 
    private static $db = array(
      'Name' => 'Varchar'
    );

    private static $has_many = array(
       'BlogEntry' => 'BlogEntry',
       'CalendarEvent' => 'CalendarEvent'
    );

    static $searchable_fields = array(
      'Name'
    );

    static $summary_fields = array (
      'Name'
    );

    public function getCMSFields(){
        return new FieldList(
                new TextField('Name', 'Name')
        );
    }    
}