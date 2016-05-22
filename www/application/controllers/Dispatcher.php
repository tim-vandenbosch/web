<?php

/* @author = Daniela Carmelina
 * Date = 10/05/2016
 */
class Dispatcher  extends CI_Controller
{

    /* @author =  Nida
     */
    function __construct() {
        parent::__construct();
        $this -> checkSession();
        $this -> load -> model('ticket_model');
        $this -> load -> model('user_model');
    }


    /* @author =  Daniela
     */
    public function details($ticketID,$k)
    {
        $data['message'] = "";
        // $this -> db ->join('campus'sen,'tickets.campusID=campussen.campusName');
        $data['query'] = $this -> ticket_model -> getdetailsTicket($ticketID);
        $data['werkmannen'] = $this -> user_model -> getWerkmannen();

        $data['werkmanEmail'] = $this ->  ticket_model -> getWerkman($ticketID);

        $data['stat'] = $this -> ticket_model -> getEnums("'status'");
        $data['prio'] = $this -> ticket_model -> getEnums("'prioriteit'");

        if($k == "update")
        {
            $data['message'] = "Ticket update is geslaagd";
        }elseif($k =="fout"){

            $data['message'] = "Er ging iets mis";
        }
        $this -> load -> view('Layout/header');
        $this -> load -> view('Layout/navigation');
        $this -> load -> view('Dispatcher/details',$data);
        $this -> load -> view('Layout/footer');
    }



    /* @author = Daniela
     * Date = datum
     * Bronnen = https://www.formget.com/update-data-in-database-using-codeigniter/
     * https://ellislab.com/codeigniter/user-guide/libraries/form_validation.html
     * Update de ticket op basis van de ticketID. De dispatcher stelt de status, prioriteit en datums in en kies een werkman.
     * De veranderingen worden doorgestuurd naar de database.
     */
    function update($ticketID){
        $this -> formRules();

        if ($this -> form_validation -> run() == false)
        {
            $this -> details($ticketID,"fout");

        }
        else
        {
            $data = array(
                // 'ticketId'=>$this -> input -> post('ticketID'),
                'ticketId'=> $ticketID,
                'prioriteit' => $this -> input -> post('dprioriteit'),
                'herstellingDatum' => $this -> input -> post('dherstellingsdatum'),
                'deadline' => $this -> input -> post('ddeadline'),
                'hersteller' => $this -> input -> post('dwerkman'),
                'status' => $this -> input -> post('dstatus')
            );

            $this -> ticket_model -> updateTicket($data);
            $this -> details($ticketID,"update");
        }

    }

    /* @author = Daniela
     * Date = 22/05/2016
     * Bron = https://ellislab.com/codeigniter/user-guide/libraries/form_validation.html
     * Deze functie zet de regel voor herstellingsdatum. Deze mag niet kleiner zijn dan de deadline
     */
    function formRules()
    {
        $this -> form_validation -> set_rules('dherstellingsdatum','dherstellingsdatum','required|callback_date_compare');
        $this -> form_validation -> set_rules('ddeadline','ddeadline','required|callback_deadline_check');

    }

    public function deadline_check($ddeadline)
    {
        $allPrioriteiten = $this -> ticket_model -> getEnums("'prioriteit'");
        $prioriteit =  $this->input -> post("dprioriteit");
        $maxdag = $this->input -> post("dmeldingsdatum");
        switch ($prioriteit)
        {
            case $allPrioriteiten[0]:
                $maxdag = date('Y-m-d', strtotime($maxdag. ' + 1 days'));
                break;
            case $allPrioriteiten[1]:
                $maxdag = date('Y-m-d', strtotime($maxdag. ' + 2 days'));
                break;
            case $allPrioriteiten[2]:
                $maxdag = date('Y-m-d', strtotime($maxdag. ' + 3 days'));
                break;
            case $allPrioriteiten[3]:
                $maxdag = date('Y-m-d', strtotime($maxdag. ' + 7 days'));
                break;
            case $allPrioriteiten[4]:
                $maxdag = date('Y-m-d', strtotime($maxdag. ' + 14 days'));
                break;
        }
        if ($ddeadline < $this->input -> post("dmeldingsdatum"))
        {
            $this-> form_validation -> set_message('date_compare', 'Fout bij datums');
            return false;
        }
        else
        {
            return true;
        }
        echo $maxdag;


    }

    /* @author = Daniela
     * Date = 22/05/2016
     * Bron = http://stackoverflow.com/questions/10601836/callback-validation-with-parameter-using-codeigniter-and-setting-rules-using-an
     * http://stackoverflow.com/questions/3727615/adding-days-to-date-in-php
     * Deze functie controleert de herstellingsdatums met de deadline datum.
     * De hestellingsdatum moet voor de deadline zijn zoniet return deze false
     */
    public function date_compare($dherstellingsdatum)
    {
        if ($dherstellingsdatum >= $this->input -> post("ddeadline"))
        {
            $this-> form_validation -> set_message('date_compare', 'Fout bij datums');
            return false;
        }
        else
        {
            return true;
        }

    }

    /* @author = Marnix
     * Check of user nog in gelogd is, zoniet opnieuw inloggen
     */
    function checkSession()
    {
        if (!$this -> session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
    }
}