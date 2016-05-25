<?php

/* @author = Daniela Carmelina
 * Date = 10/05/2016
 */
class Dispatcher  extends CI_Controller
{

    /* @author = Nida
     * Date = datum
     * Bron =
     * Uitleg functie
     */
    function __construct() {
        parent::__construct();
        $this -> checkSession();
        $this -> load -> model('ticket_model');
        $this -> load -> model('user_model');
    }


    /* @author = Daniela
     * Date = 12/05/2016
     * Bron =
     * Uitleg functie
     */
    public function details($ticketID,$k)
    {
        $data['message'] = "";

        $data['query'] = $this -> ticket_model -> getdetailsTicket($ticketID);
        $data['werkmannen'] = $this -> user_model -> getWerkmannen();

        $data['werkmanEmail'] = $this ->  ticket_model -> getWerkman($ticketID);

        $data['stat'] = $this -> ticket_model -> getEnums("'status'");
        $data['prio'] = $this -> ticket_model -> getEnums("'prioriteit'");

        if($k == "update")
        {
            $data['message'] = "Ticket update is geslaagd";
        }elseif($k =="fout"){

            $data['message'] = "Er ging iets mis, controleer je datums";
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
                'ticketId'=>            $ticketID,
                'prioriteit' =>         $this -> input -> post('dprioriteit'),
                'herstellingDatum' =>   $this -> input -> post('dherstellingsdatum'),
                'deadline' =>           $this -> input -> post('ddeadline'),
                'hersteller' =>         $this -> input -> post('dwerkman'),
                'status' =>             $this -> input -> post('dstatus')
            );

            $this -> ticket_model -> updateTicket($data);
            $this -> details($ticketID,"update");
        }

    }

    /* @author = Daniela
     * Date = 22/05/2016
     * Bron = https://ellislab.com/codeigniter/user-guide/libraries/form_validation.html
     * Deze functie stelt de regels in voor herstellingsdatum & deadline.
     */
    function formRules()
    {
        $this -> form_validation -> set_rules('dherstellingsdatum','Herstellingsdatum','required|callback_herstelling_check');
        $this -> form_validation -> set_rules('ddeadline','Deadline','required|callback_deadline_check');
    }

    /* @author = Daniela
     * Date = 22/05/2016
     * Bronnen = http://stackoverflow.com/questions/3727615/adding-days-to-date-in-php
     *  http://stackoverflow.com/questions/6238992/converting-string-to-date-and-datetime
     *Deze functie controleert de deadline met de meldingsdatum en prioriteit.
     * De deadline moet vòòr de prioriteit zijn en na de meldingsdatum zoniet return deze false
     */
    public function deadline_check($ddeadline,$ticketID)
    {
        $allPrioriteiten = $this -> ticket_model -> getEnums("'prioriteit'");
        $prioriteit =  $this-> input -> post("dprioriteit");
       $maxdag = $this-> input -> post("dmeldingsdatum");
//     $maxdag = $this -> ticket_model ->getdatum($ticketID);
//echo $prioriteit;
     echo $maxdag;

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
        $melddateone = strtotime($this -> input -> post('dmeldingsdatum'));
//        $melddateone  = strtotime($this -> ticket_model ->getdatum($ticketID));

        $melddate = date('Y-m-d', $melddateone);

        if (date('Y-m-d',strtotime($ddeadline)) < $melddate||date('Y-m-d',strtotime($ddeadline)) > $maxdag)
        {
            $this-> form_validation -> set_message('deadline_check', 'Foute ingave voor deadline. Deze mag niet eerder dan de meldingdatum en niet later dan de prioriteit zijn.');
            return false;
        }
        else
        {
            return true;
        }

    }

    /* @author = Daniela
     * Date = 22/05/2016
     * Bronnen = http://stackoverflow.com/questions/10601836/callback-validation-with-parameter-using-codeigniter-and-setting-rules-using-an
     * http://stackoverflow.com/questions/6238992/converting-string-to-date-and-datetime
     * Deze functie controleert de herstellingsdatums met de deadline en meldingsdatum.
     * De hestellingsdatum moet vòòr de deadline zijn en na de meldingsdatum zoniet return deze false
     *
     */
    public function herstelling_check($date)
    {
        //string naar date omzetten
        $hdateone =         strtotime($date);
        $melddateone =      strtotime($this -> input -> post('dmeldingsdatum'));
//        $melddateone =      strtotime( $this -> ticket_model ->getdatum($ticketID));
        $deadlinedateone =  strtotime($this -> input -> post("ddeadline"));
        //juiste formaat meegeven
        $hdate =        date('Y-m-d', $hdateone);
        $melddate =     date('Y-m-d', $melddateone);
        $deadlinedate = date('Y-m-d', $deadlinedateone);

        //echo $melddate;// deze echo is om die datum effe te testen

        if ($hdate < $melddate || $hdate > $deadlinedate  )
        {
            $this-> form_validation -> set_message('herstelling_check', 'Foute ingave voor herstellingsdatum. Deze mag niet later dan de deadline of eerder dan de meldingdatum zijn');
            return false;
        }
        else
        {
            return true;
        }

    }

    /* @author = Marnix
     * Date = datum
     * Bron =
     * Check of user nog in gelogd is, zoniet opnieuw inloggen
     */
    function checkSession()
    {
        if (!$this -> session -> userdata('logged_in')) {
            redirect('login', 'refresh');
        }
    }
}