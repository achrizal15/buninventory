<?php


class Main_libraries
{
        protected $CI;
        public function __construct()
        {
                $this->CI = &get_instance();
        }
        public function uploadImage($path = "")
        {
                $config['upload_path']          = './assets/' . $path;
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $this->CI->load->library('upload', $config);
        }
        public function innerview($view, $data = [], $blank = false)
        {
                $data["blank"]=$blank;
                $this->CI->load->view("templates/header", $data);
                $this->CI->load->view($view, $data);
                $this->CI->load->view("templates/footer", $data);
        }
}
