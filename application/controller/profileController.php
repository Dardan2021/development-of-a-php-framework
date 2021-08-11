<?php
class profileController extends Lightweight
{
    public function __construct()
    {

    }

    public function index()
    {
        echo "index method";
    }

    public function insert($table, $data = array())
    {
       $storeModel = $this->model('userModel');

       return $storeModel->insertData($table, $data);
    }

    public function myMethodNumberData()
    {
        $storeModel = $this->model("userModel");
        echo $storeModel->fetchNrData("users");
    }

    public function myMethodFetchData()
    {
        $storeModel = $this->model("userModel");
        $datas = $storeModel->fetchAllData("users", array("id" => 2));
        $dataArray['values'] = json_decode(json_encode($datas), true);

        $this->view("userView", $dataArray);
    }

    public function myMethodDeleteData()
    {
        $storeModel = $this->model('userModel');
        $data = array("id" => 1);

        return $storeModel->deleteData("users", $data);
    }

    public function myMethodUpdateData()
    {
        $storeModel = $this->model('userModel');
        $data = array("id" => 2);
        $values= array("name" => "Dardan");

        return $storeModel->updateData("users", $data, $values);
    }

}