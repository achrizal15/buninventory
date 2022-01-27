<?php 

if(!function_exists("active_sidebar")){
   function active_sidebar($params){
      $CI=& get_instance();
      if($params== $CI->uri->segment(1)){

         return "active";
      }
   }
}

?>