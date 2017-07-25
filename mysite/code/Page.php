<?php
class Page extends SiteTree {
    	private static $has_one = array(
            "MyWidgetArea" => "WidgetArea"
        );
        
        private static $has_many = array(
            "ImageLinks" => "ImageLink"
        );
        
        public function getCMSFields() {
            $fields = parent::getCMSFields();
            $gridFieldConfig = GridFieldConfig::create()->addComponents(
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

            $gridField = new GridField("ImageLinks", "ImageLinks", $this->ImageLinks(), $gridFieldConfig);
            $fields->addFieldToTab("Root.ImageLinks", $gridField);             
            //$fields->addFieldToTab('Root.Main', UploadField::create("MainImage", "Main page image"), "Content");    
            $fields->addFieldToTab("Root.Widgets", new WidgetAreaEditor("MyWidgetArea"));
            return $fields;
        }
        
        public function getTopLevelPage() {
            return $this->Level(1)->ClassName;
        }

        public function getThisHomePage() {
            if ($homePage = SiteTree::get()->filter(array(
                'ClassName' => 'HomePage'
            ))) {
                return $homePage;
            }
            
        }
        
        public function getNews($num=5) {
            $holder = BlogHolder::get()->First();
            return ($holder) ? BlogEntry::get()->filter('ParentID', $holder->ID)->limit($num) : false;
        }
        

        function getFooterLinks() {
            //return ContentController::current_site_config()->FooterLinks ? $this->parseRawLinks(ContentController::current_site_config()->FooterLinks) : '';
            $config = SiteConfig::current_site_config(); 
            if($footerLinks=$config->FooterLinks) {
                $set = new ArrayList();
                $f = explode("\n", $footerLinks);
                foreach ($f as $p) {
                    $firstSpace = strpos($p, " ");
                    $url = substr($p, 0, $firstSpace);
                    $linkText = substr($p, $firstSpace);

                    $data = new ArrayData(array(
                             'URL' => $url,
                             'LinkText' => htmlspecialchars($linkText)
                         )        
                    );        
                    $set->add($data);  
                }
                return $set;
            };
        } 
        
        function getHeaderLinks() {
            //return ContentController::current_site_config()->FooterLinks ? $this->parseRawLinks(ContentController::current_site_config()->FooterLinks) : '';
            $config = SiteConfig::current_site_config(); 
            if($headerLinks=$config->HeaderLinks) {
                $set = new ArrayList();
                $f = explode("\n", $headerLinks);
                foreach ($f as $p) {
                    $firstSpace = strpos($p, " ");
                    $url = substr($p, 0, $firstSpace);
                    $linkText = substr($p, $firstSpace);

                    $data = new ArrayData(array(
                             'URL' => $url,
                             'LinkText' => htmlspecialchars($linkText)
                         )        
                    );        
                    $set->add($data);  
                }
                return $set;
            };
        }          
  
        
}
class Page_Controller extends ContentController {

	private static $allowed_actions = array ();

	public function init() {
		parent::init();
        Requirements::javascript('mysite/javascript/jquery-1.11.0.min.js');
        Requirements::javascript('mysite/javascript/jquery.sidr.min.js');                
        Requirements::javascript('mysite/javascript/site.js');
        Requirements::javascript('mysite/javascript/masthead.js');
        Requirements::javascript('mysite/javascript/classie.js');
        Requirements::javascript('mysite/javascript/uisearch.js');
        // Requirements::customScript('
        //    jQuery(document).ready(function(){
        //         var biffo = 9;
        //         alert(biffo);
        //    });');
        if($this->hasMap()){
	       $this->MakeGoogleMap();
        }                
	}

	public function hasMap(){
		return ($this->Address || ($this->Latitudes && $this->Longitudes));
	}       
}
