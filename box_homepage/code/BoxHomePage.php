<?php
class BoxHomePage extends HomePage {

    public static $db = array(
    );

    public static $has_many = array(
        "Boxes" => "Box"
    );  

    public function getCMSFields() {
      $fields = parent::getCMSFields();

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

        $gridField = new GridField("Boxes", "Content boxes:", $this->Boxes(), $gridFieldBoxConfig);
        $fields->addFieldToTab("Root.ContentBoxess", $gridField);                  
      

        return $fields;
        
        
    }
    

}

class BoxHomePage_Controller extends Page_Controller {
	
}
