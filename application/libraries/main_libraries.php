<?php


class Main_libraries {
public function innerview($view,$data=[]){
        $CI=& get_instance();
        $CI->load->view("templates/header",$data);
        $CI->load->view($view,$data);
        $CI->load->view("templates/footer",$data);
}

}