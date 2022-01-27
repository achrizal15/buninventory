<?php

if (!function_exists("active_sidebar")) {
   function active_sidebar($params)
   {
      $CI = &get_instance();
      if ($params == $CI->uri->segment(1)) {

         return "active";
      }
   }
}
if (!function_exists("custom_alert_messages")) {
   function custom_alert_messages($type, $message)
   {
      switch ($type) {
         case 'warning':
            $data = '<div class="alert alert-warning alert-dismissible" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message . ' </div>';
            break;
         case 'error':
            $data = '<div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$message.'</div>';
            break;

         default:
         $data = ' <div class="alert alert-success alert-dismissible" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$message.'</div>';
            break;
      }
      echo $data;
   }
}
