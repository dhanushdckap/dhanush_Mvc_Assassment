<?php

class database
{
    public $db;
    public function __construct(){
        try {
            $this->db= new PDO
            ("mysql:host=localhost;dbname=stock_info",
                "root",
                "welcome");

        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}

class UserModel extends database {
    // Database connection and other necessary properties

    public function Insertdata($products,$files)
    {
        // Perform database insert operation using $data

//        var_dump($products);

        move_uploaded_file($files["tmp_name"],"upload/" .$files["name"]);
        $imagePath= "upload/".$files["name"];
        $products_name =$products['product_name'];
        $price =$products['price'];
        $sku =$products['sku'];
        $brands =$products['brands'];
        $manufactured =$products['manufactured'];
        $avl_stock =$products['stock'];

      $this->db ->query( "Insert into products (product_name,price,image,sku,brand,manufactured,availabe_stock) values ('$products_name','$price','$imagePath','$sku','$brands','$manufactured','$avl_stock')");
//         header("location:/");
    }
    public function Read($id) {
        // Perform database select operation based on $id

        $query =$this->db->query("select * from products where id = $id");
        $datas=$query->fetchAll(PDO::FETCH_OBJ);
        return $datas;

    }

    public function Update($products,$files) {
        // Perform database update operation based on $id and $data

        move_uploaded_file($files["tmp_name"],"upload/" .$files["name"]);
        $imagePath= "upload/".$files["name"];

        $products_name =$products['product_name'];
        $price =$products['price'];
        $sku =$products['sku'];
        $brands =$products['brands'];
        $manufactured =$products['manufactured'];
        $avl_stock =$products['stock'];
        $id =$products['id'];
            $this->db ->query("Update products set product_name ='$products_name',                                     price='$price',image='$imagePath',sku='$sku',brand='$brands',                                    manufactured=$manufactured,availabe_stock=$avl_stock where id='$id'");
        header("location:/");

    }

    public function delete_Stock($id) {
        $this->db ->query( "DELETE FROM Products WHERE id = '$id'");
        header("location:/");

        // Perform database delete operation based on $id
    }

    public function ViewfromDatabase() {
       $query =$this->db->query("select * from products");
       $query->execute();
       $datas=$query->fetchAll(PDO::FETCH_OBJ);
       return $datas;

        // Retrieve all users from the database
    }
}