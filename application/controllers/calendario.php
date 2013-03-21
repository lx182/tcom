<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Calendario extends CI_Controller {

    public function calendar(){
        
        $prefs = array (
               'show_next_prev'  => TRUE,
               'next_prev_url'   => 'http://example.com/index.php/calendar/show/'
                
             );
         $this->lang->load('calendar', 'spanish');
                $this->load->library('parser');
         $this->load->library('calendar',$prefs);

         echo $this->calendar->generate(2006,3);
    } 
}
?>
