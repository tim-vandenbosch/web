<?php
/**
 * Created by PhpStorm.
 * User: Marnix_laptop
 * Date: 13/05/2016
 * Time: 13:18
 */
class newTicket_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('newTicketSucces_view', '', TRUE);


    }
}