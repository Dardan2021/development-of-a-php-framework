<?php

    trait formValidation
    {
        public static $error = array();

        public static function validation($fieldName, $label, $rules)
        {
            if ($_SERVER['REQUEST_METHOD'] == 'post' || $_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $data = $_POST[$fieldName];
            }
            else
            {
                echo "sorry it is not found";
            }

            $pattren = "/^[a-zA-Z]+$/";
            $rules = explode("|", $rules);

            if(in_array("required", $rules))
            {
                if(empty($data))
                {
                    return self::$error[$fieldName] = $label. " is required";
                }
            }
            else if(in_array("not_int", $rules))
            {
                if(!preg_match($pattren, $data))
                {
                    return self::$error[$fieldName] = $label. " must have only alphabet";
                }
            }
        }

        public static function run()
        {
            if(empty(self::$error))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

?>