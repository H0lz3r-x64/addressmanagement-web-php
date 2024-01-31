<?php
namespace Controllers;

use Backend\Core\Controller;


class NotFoundController extends Controller
{
    public function index($params = [])
    {
        $this->loadView('NotFound', []);  # path to view from views directory root

    }
}

