<?php

foreach (glob("../application/firstPage/*.php") as $filename)
{
    include $filename;
}

class profileController extends myFramework
{
    public function __construct()
    {
        parent::__construct();
        myFramework::model("userModel");
    }

    public static function index()
    {
        echo "index method";
    }

    public static function insert($table, $data = array())
    {
        return userModel::insertData($table, $data);
    }

    public static function myMethodNumberData()
    {
        echo userModel::fetchNrData("users");
    }

    public static function myMethodFetchData()
    {
        myFramework::view("userView", firstPage::getDataFirstPage("users"));
       // myFramework::validation();
    }

    public static function myMethodDeleteData()
    {
        $data = array("id" => 1);

        return userModel::deleteData("users", $data);
    }

    public static function myMethodUpdateData()
    {
        $data = array("id" => 2);
        $values = array("name" => "Dardan");

        return userModel::updateData("users", $data, $values);
    }

    public function submitForm()
    {
        /* echo $this->post('name');
        echo "<br>";
        echo $this->post('address');
        echo $this->uri("2");*/
        myFramework::validation('name', 'Full name', 'required|not_int');
        if (self::run())
        {
            echo self::post('name');
        }
        else
        {
            print_r(self::$error);
        }
       /*$post = $_POST;
       $data = array(
            'address' => $post['address'],
            'name' => $post['name']
        );

         return userModel::insertData('users', $data);*/
    }

    public function anchor()
    {
        echo "this is an anchor";
    }

}