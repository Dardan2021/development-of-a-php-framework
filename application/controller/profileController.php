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
        self::model("userModel");
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
        self::view("userView", firstPage::getDataFirstPage("users"));

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
        //myFramework::validation('number', 'Number', 'required|not_int');
       // myFramework::validation('number', 'Number', 'required|int|min|4');
        //self::validation('number', 'Number', 'required|int|min|4');
        //self::myMethodFetchData();
        self::validation('fullName', 'Full name', 'required|not_int');
        self::validation('number', 'Number', 'required|int|max|10');
        self::validation('confirmPassword', 'confirmPassword', 'confirm|password|required|not_int|max|10');
        self::validation('email', 'Email', 'unique|users|required');

      $dataFile = array(
            'fileName' => 'image',
            'allowedExtension' => 'jpg|png|JPG|PNG',
            'uploadPath' => 'images/',
            'label' => 'image'
        );

        self::file($dataFile);

        $dataArray = array();

        if (self::fileRun())
        {
            var_dump("no");
        }
        else
        {
            $dataArray[] = self::$error;
        }

        if (self::run())
        {
            echo self::post('confirmPassword');
        }
        else
        {
            $dataArray[] = self::$fileErrors;
        }

        if (self::run() && self::fileRun())
        {

            $sessionData = array(
                'id' => 4,
                'name' => self::post('fullName'),
                'email'=> self::post('email'),
            );

            self::setSession($sessionData, $values);
            self::setFlashMessage("accountSuccess", "your account was created with success");
            redirect("dashboard/profile");
        }


            $arrayDatas['error'] = json_decode(json_encode($dataArray), true);
            //$arrayDatas['values'] = $data['error'];



            $arrayDatas2 = firstPage::getDataFirstPage("users");
            $finalArray = array_merge($arrayDatas, $arrayDatas2);

            self::view('userView', $finalArray);
           /* $post = $_POST;
            $data = array(
                 'address' => $post['address'],
                 'name' => $post['name']
             );*/

           //   return userModel::insertData('users', $data);
    }


    public static function logout()
    {
        self::destroySession();
    }
    public function anchor()
    {
        echo "this is an anchor";
    }

}