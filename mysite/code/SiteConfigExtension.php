<?php

class SiteConfigExtension extends DataExtension {
    private static $db = array(
        'FooterLinks' => 'Text',
        'HeaderLinks' => 'Text',
        'TwitterLink' => 'Text',
        'FacebookLink' => 'Text',
        'GoogleAnalytics' => 'Varchar(20)',
        'HeaderSize' => 'Varchar(20)',
        'HeaderColour' => 'Varchar(20)',
        'HeaderDropShadow' => 'Boolean',
        'HeaderBackground' => 'Boolean',
        'SiteColour' => 'Text',
        'HeaderFont' => 'Text',
        'BodyFont' => 'Text',
        'HeaderDepth' => 'Text',
        'HideHeaderText' => 'Text',
        'HideSearch' => 'Boolean'
    );
    
    private static $has_one = array(
        'Favicon' => 'Image',
        'Masthead' => 'Image',
        'Logo' => 'Image'
    );

    private static $has_many = array(
        'Backgrounds' => 'Background',
        'MobileBackgrounds' => 'MobileBackground'
    );

    public function updateCMSFields(FieldList $fields)  {  
        $fields->addFieldToTab('Root.Main', new TextField('GoogleAnalytics', 'Google analytics ID'));
        $fields->addFieldToTab('Root.SocialMedia', new TextField('TwitterLink', 'link to Twitter (include http)'));
        $fields->addFieldToTab('Root.SocialMedia', new TextField('FacebookLink', 'link to Facebook (include http)'));
        $fields->addFieldToTab('Root.Footer', new TextareaField('FooterLinks', 'Footer links - one link per line. The format is: Page or external web address&lt;space&gt;Text to use as the link<br>For example - /about-us About our company <br>or http://www.google.co.uk Google'));
        $fields->addFieldToTab('Root.Header', new TextareaField('HeaderLinks', 'Header links - one link per line. The format is: Page or external web address&lt;space&gt;Text to use as the link<br>For example - /about-us About our company <br>or http://www.google.co.uk Google'));
        $mastheadField=UploadField::create('Masthead', 'Your masthead')->setDescription('The CMS will resize your image to 1580 by 400 pixels when you upload it.');
        $fields->addFieldToTab('Root.HeaderImages', $mastheadField);
        $logoField=UploadField::create('Logo', 'Your logo')->setDescription('Your organisation logo if you have one.');
        $fields->addFieldToTab('Root.HeaderImages', $logoField);
        $faviconField=UploadField::create('Favicon', 'Your Favicon')->setDescription("Your Favicon is a small image that will be displayed in a user's browser tab. You can leave this blank if you don't have one.");
        $fields->addFieldToTab('Root.HeaderImages', $faviconField);
        
        $backgroundconfig = GridFieldConfig::create()->addComponents(
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

        $gridField = new GridField("Backgrounds", "Backgrounds", $this->owner->Backgrounds(), $backgroundconfig);
        $fields->addFieldToTab("Root.Backgrounds", $gridField); 


        $mobilebackgroundconfig = GridFieldConfig::create()->addComponents(
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

        $gridField = new GridField("MobileBackgrounds", "MobileBackgrounds", $this->owner->MobileBackgrounds(), $mobilebackgroundconfig);
        $fields->addFieldToTab("Root.MobileBackgrounds", $gridField); 


    }
    
    public function getSiteFonts() {
        if ($this->owner->BodyFont || $this->owner->HeaderFont) {
            $fontString = $this->owner->BodyFont.'|'.$this->owner->HeaderFont;
        } else {
            $fontString = 'Open Sans|Roboto Slab:400,700';
        }
        return $fontString;
    }
    
    public function getFontCss() {
        $headerWeight = '';
        if ($header = $this->owner->HeaderFont) {
            if ($header == 'Baloo Bhaina' || $header == 'Passion One' || $header == 'Acme' || $header == 'Luckiest Guy' || $header == 'Paytone One' || $header == 'Hammersmith One') {
                $headerWeight = 'font-weight:normal;padding-top:4px;letter-spacing:0.3px';
            }
            return '<style>body{font-family:"'.$this->owner->BodyFont.'", arial, sans-serif;} h1,h2,h3,h4,h5,h6 {font-family:"'.$this->owner->HeaderFont.'", arial, sans-serif;'.$headerWeight.'}</style>';            
        } else {
            return '<style>body{font-family:"Open Sans", arial, sans-serif;} h1,h2,h3,h4,h5,h6 {font-family:"Roboto Slab", arial, sans-serif;'.$headerWeight.'}</style>';            
            
        }

    }

}
