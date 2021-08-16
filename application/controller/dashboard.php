<?php
class dashboard extends myFramework
{
    public static function profile()
    {
        echo $_SESSION['id'];
    }
}
?>