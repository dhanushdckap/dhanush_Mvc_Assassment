<?php
require_once "models/UserModel.php";

class UserController {
    private $userModel;

    public function __construct() {


        $this->userModel = new UserModel();
    }

    public function create_stock($products,$files) {
        // Handle form submission for creating a new products
//       var_dump( "$user");

        if($products && $files){
            $this->userModel->Insertdata($products,$files);
//            var_dump($files);

            header("location:/");
        }else{
            require "views/products/create_stock.view.php";
        }

    }

    public function edit_stock_details($product,$files) {
//        var_dump($product);
var_dump($files);
        $this->userModel->Update($product,$files);
        require 'views/products/edit_stock.view.php';

        // Handle form submission for updating an existing user
    }
//
    public function delete_stock_From_database($id) {
        $this->userModel->delete_Stock($id);

        // Handle user deletion
    }

    public function view_all_stock() {
        // Retrieve all users from the UserModel and load the index view

        $allproducts=$this->userModel->ViewfromDatabase();
        require 'views/products/view_all_stock.view.php';
    }
//
    public function view_one_stock($id) {
        $particularProduct=$this->userModel->Read("$id");
        require 'views/products/edit_stock.view.php';


        // Retrieve a specific user from the UserModel and load the view view
    }
}
