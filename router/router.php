<?php

class router
{
    public $router = [];
    public $controller;

    public function __construct()
    {
        $this->controller = new UserController();
    }


    public function get($uri, $action)
    {
        $this->router[] = [
            'uri' => $uri,
            'action' => $action,
            'method' => 'GET',
        ];
        return $this;
    }
    public function post($uri, $action)
    {
        $this->router[] = [
            'uri' => $uri,
            'action' => $action,
            'method' => 'GET',
        ];
        return $this;
    }
    public function delete($uri, $action)
    {
        $this->router[] = [
            'uri' => $uri,
            'action' => $action,
            'method' => 'DELETE',
        ];
        return $this;
    }
    public function patch($uri, $action)
    {
        $this->router[] = [
            'uri' => $uri,
            'action' => $action,
            'method' => 'PATCH',
        ];
        return $this;
    }


    public function routing()
    {
        foreach ($this->router as $router) {
            if ($router['uri']==$_SERVER['REQUEST_URI']){
                if ($router['action']) {
                    switch ($router['action']) {
                        case 'create':
                            $this->controller->create_stock($_POST,$_FILES['image']);
                            break;
                        case 'edit':
                            $this->controller->edit_stock_details($_POST,$_FILES['image']);
                            break;
                        case 'delete':
                            $this->controller->delete_stock_From_database($_POST);
                            break;
                        case 'view':
                            $this->controller->view_one_stock($_POST['view']);
                            break;
                        default:
                            $this->controller->view_all_stock();
                    }

                } else {
                    $this->controller->view_all_stock();
                }

            }

        }

    }
}



