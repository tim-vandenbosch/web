<?php
/* @author = Britt
 * Date = 15/05/2016
 */
class enquete_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this -> load -> model('enquete_model', '', TRUE);
    }

    function index()
    {
        $this -> checkSession();
        $session_data = $this -> session -> userdata('logged_in');
        $data['userID'] = $session_data['userID'];
        $userID = $session_data['userID'];
        $data = array('userID' => $session_data['userID'], 'vragen' => $this->enquete_model->get_vragen());

        $this -> load -> view('Layout/header');
        $this -> load -> view('Layout/navigation');
        $this -> load -> view('User/user_enquete_view', $data);
        $this -> load -> view('Layout/footer');
    }

    /* @author = Britt
     * Date = 20/05/2016
     * validatie functie
     */
    function  validatie()
    {
        $this -> form_validation -> set_rules('vraag1','Vraag1', 'required');
        $this -> form_validation -> set_rules('vraag2','Vraag2', 'required');
        $this -> form_validation -> set_rules('vraag3','Vraag3', 'required');
        $this -> form_validation -> set_message('Gelieve alles in te vullen');
    }

    /* @author = Britt
     * Date = 18/05/2016
     * De ingegeven gegevens verzenden naar de db
     */
    function verzenden()
    {
                $antw1 = $this -> input -> post('vraag1');
                $antw2 = $this -> input -> post('vraag2');
                $antw3 = $this -> input -> post('feedback');

            $ingevuld = array
            (
                "1" => $antw1,
                "2" => $antw2,
                "3" => $antw3
            );

            for ($i = 1; $i < 4; $i++) {
                $this -> enquete_model -> voeg_antwoord($i, $ingevuld[$i]);
            }
    }

    /* @author = Britt
     * Date = 18/05/2016
     * Als de enquete is ingevuld, db bool zetten naar 1 zodat de enquête voor deze docent nimmer terug komt
     */
    function enquete_ingevuld()
    {
        $bool = 1;
        $session_data = $this -> session -> userdata('logged_in');
        $data['userID'] = $session_data['userID'];
        $userID = $session_data['userID'];
        $this -> enquete_model ->  enquete_ingevuld($userID, $bool);
    }

    /* @author = Britt
     * Date = 18/05/2016
     * Het effectieve verzenden en afmelden docent
     */
    function afmelden()
    {
        $this->verzenden();
        $this ->enquete_ingevuld();
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('login', 'refresh');
    }

    /* @author = Marnix
     * Check of user nog in gelogd is, zoniet opnieuw inloggen
     */
    function checkSession()
    {
        if (!$this -> session -> userdata('logged_in')) {
            redirect('login', 'refresh');
        }
    }
}