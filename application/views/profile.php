<!DOCTYPE html>
<html>
<head>
    <style>
        .alert-success{
            border: 1px solid green;
            color: green;
            padding: 10px;
        }


    </style>
</head>
<body>

<h1>My First Heading</h1>
<p>My first paragraph.</p>
<?php

    echo session::flash("accountSuccess", "alert-success")."<br>";
    if(!empty(userModel::getSession('name')))
    {
        echo userModel::getSession('name')."<br>";
    }
    if(!empty(userModel::getSession('id')))
    {
        echo userModel::getSession('id')."<br>";
    }
    if(!empty(userModel::getSession('email')))
    {
        echo userModel::getSession('email')."<br>";
    }

?>

</body>
</html>