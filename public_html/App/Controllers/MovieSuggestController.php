<?php

namespace App\Controllers;

use App\Views\SuggesterEmailView;
use App\Views\SuggestionForEventHostEmailView;
use App\Views\MovieSuggestSuccessView;

class MovieSuggestController extends Controller
{

    private $moviesuggest = [];

    public function __construct()
    {
        $this->moviesuggest = [
            'errors' => []
        ];
    }

    private function resetSessionFormData()
    {
        $_SESSION['moviesuggest'] = null;
    }


    private function getFormData()
    {
        $expectedVariables = ['title', 'email', 'newsletter'];

        foreach ($expectedVariables as $variable) {
            // assume no errors
            $this->moviesuggest['errors'][$variable] = "";

            if (isset($_POST[$variable])) {
                $this->moviesuggest[$variable] = $_POST[$variable];
            } else {
                $this->moviesuggest[$variable] = "";
            }
        }
    }

    private function isFormDataValid()
    {
        $valid = true;

        if (strlen($this->moviesuggest['title']) == 0) {
            $this->moviesuggest['errors']['title'] = "A movie title is required.";
            $valid = false;
        }
        if (! filter_var($this->moviesuggest['email'], FILTER_VALIDATE_EMAIL)) {
            $this->moviesuggest['errors']['email'] = "A valid email address required.";
            $valid = false;
        }
        return $valid;
    }
    
    public function show()
    {

        $this->resetSessionFormData();
        
        // capture suggestion data
        $this->getFormData();

        // validate suggestion data

        if (! $this->isFormDataValid()) {
            $_SESSION['moviesuggest'] = $this->moviesuggest;
            header("Location: ./#moviesuggest");
            return;
        }


        // send email to suggester
        $suggesterEmail = new SuggesterEmailView($this->moviesuggest);

        // send email to event host
        $eventHostEmail = new SuggestionForEventHostEmailView($this->moviesuggest);
        
        // form is valid, redirect user to success page
        $view = new MovieSuggestSuccessView();
        $view->render();

        $suggesterEmail->render();
        $eventHostEmail->render();

    }
}
