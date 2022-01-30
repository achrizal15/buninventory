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
      $message = strip_tags($message);
      switch ($type) {
         case 'warning':
            $data = '<div class="alert alert-warning alert-dismissible" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message . ' </div>';
            break;
         case 'error':
            $data = '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message . '</div>';
            break;

         default:
            $data = ' <div class="alert alert-success alert-dismissible" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> ' . $message . '</div>';
            break;
      }
      echo $data;
   }
}
if (!function_exists("is_login")) {
   function is_login($controller = "home")
   {
      $CI = &get_instance();
      $CI->load->library("session");
      $CI->load->model("roleaksesmodels", "rak");
      if (!$CI->session->has_userdata("id")) {
         redirect(base_url("authcontroller"));
      } else {
         $role_akses = $CI->rak->get_roles_akses($CI->session->userdata("role"), $controller);
         if (!$role_akses) {
            show_404();
         }
      }
   }
}
if (!function_exists("show_menu")) {
   function show_menu($menu)
   {
      $CI = &get_instance();
      $CI->load->library("session");
      $CI->load->model("roleaksesmodels", "rak");
      $role_akses = $CI->rak->get_roles_akses($CI->session->userdata("role"), $menu);
      return $role_akses ? "has" : null;
   }
}
