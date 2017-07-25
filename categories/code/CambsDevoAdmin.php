<?php

class CambsdevoAdmin extends ModelAdmin {
    
  public static $managed_models = array(   //since 2.3.2
      'Category'
   );
 
  static $url_segment = 'Cambsadmin'; // will be linked as /admin/party
  static $menu_title = 'Cambs Admin';
 
}

