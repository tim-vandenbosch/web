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

            $data['message'] = "Herstellingsdatum kan niet later dan de deadline zijn";
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
        $this -> form_validation -> set_rules('dherstellingsdatum','dherstellingsdatum','callback_date_compare');

    }

    /* @author = Daniela
     * Date = 22/05/2016
     * Bron = http://stackoverflow.com/questions/10601836/callback-validation-with-parameter-using-codeigniter-and-setting-rules-using-an
     * Deze functie controleert de herstellingsdatums met de deadline datum.
     * De hestellingsdatum moet voor de deadline zijn zoniet return deze false
     */
    public function date_compare($date2)
    {

        if ($date2 > $this->input -> post("ddeadline"))
        {
            $this-> form_validation -> set_message('date_compare', 'Herstellingsdatum kan niet later dan de deadline zijn');
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