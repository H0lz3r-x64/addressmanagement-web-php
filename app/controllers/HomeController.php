<?php
namespace Controllers;

use Backend\Core\Controller;
use Models;


class HomeController extends Controller
{
    /**
     * The index function loads a view called "Home/Home" and passes the name variable as the
     * value of the user's name.
     */
    function index($params = [])
    {
        global $api_service;


        $data = [
        ];

        $this->loadView('Home.index', $data);  # path to view from views directory root

    }
}
