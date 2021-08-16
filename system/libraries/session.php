<?php
trait session
{
    public static function startSession()
    {
        session_start();
    }

    public static function setSession($name, $value)
    {
        if(!empty($name))
        {
            if(is_array($name) && empty($value))
            {
                foreach($name as $key => $sessionName)
                {
                    $_SESSION[$key] = $sessionName;
                }
            }
            else if(!is_array($name) && !empty($value))
            {
                $_SESSION[$name] = $value;
            }
        }
    }
}