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
        $dashboards = Models\DashboardModel::all();


        $data = [
            'dashboards' => $dashboards,
        ];

        $this->loadView('Home/Home', $data);  # path to view from views directory root

    }
}

?>