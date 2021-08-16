<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">

    <?php echo linkCss("css/style.css");?>
    <title>

    </title>

</head>
<body>
    <p>hmk</p>
    <?php

    if(isset($data) && isset($data['error'])) {

        foreach ($data['error'] as $data)
        {
            if (isset($data['fullname']))
            {
                $nameError = $data['fullname'];
            }

            if (isset($data['confirmPassword']))
            {
                $passError = $data['confirmPassword'];
            }

            if (isset($data['number']))
            {
                $numError = $data['number'];
            }

            if (isset($data['image']))
            {
                $imageError = $data['image'];
            }

            if (isset($data['email']))
            {
                $emailError = $data['email'];
            }
        }

        if (isset($data['values']))
        {
            foreach ($data['values'] as $data) {
                echo $data['teacher_age'] . "<br>";
                echo $data['class_name'] . "<br>";
                echo $data['address'] . "<br>";
            }
        }

        if (isset($data['entity']))
        {
            foreach ($data['entity'] as $data) {
                echo $data['teacher_age'] . "<br>";
                echo $data['class_name'] . "<br>";
                echo $data['address'] . "<br>";
            }
        }
    }


    echo formOpen("profileController/submitForm/", "POST", array('class' => 'form', 'id' => 'formid'));

    echo formInput(array(
        'type' => 'text',
        'name' => 'number',
        'id' => 'inputId',
        'class' => 'form-control',
        'placeholder' => 'enter address',
        'value' => formValidation::setValue('number')));

    echo "<br>";

        if(!empty($numError))
        {
            echo $numError;
        }

    echo "<br>";

    echo formInput(array(
        'type' => 'text',
        'name' => 'fullName',
        'id' => 'inputId',
        'class' => 'form-control',
        'placeholder' => 'enter name',
        'value' => formValidation::setValue('fullname')));

    echo "<br>";

        if(!empty($nameError))
        {
            echo $nameError;
        }

    echo "<br>";

    echo formInput(array(
        'type' => 'password',
        'name' => 'password',
        'id' => 'inputId',
        'class' => 'form-control',
        'placeholder' => 'enter password',
        'value' => formValidation::setValue('password')));

    echo "<br>";

    echo formInput(array(
        'type' => 'password',
        'name' => 'confirmPassword',
        'id' => 'inputId',
        'class' => 'form-control',
        'placeholder' => 'enter password',
        'value' => ''));

    echo "<br>";

        if(!empty($passError))
        {
            echo $passError;
        }

    echo "<br>";

    echo formInput(array(
        'type' => 'email',
        'name' => 'email',
        'id' => 'inputId',
        'class' => 'form-control',
        'placeholder' => 'enter email',
        'value' => formValidation::setValue('email')));

    echo "<br>";

    if(!empty($emailError))
    {
        echo $emailError;
    }

    echo "<br>";

    echo formInput(array(
        'type' => 'file',
        'name' => 'image',
        'id' => 'inputId',
        'class' => 'form-control',
    ));
    echo "<br>";

    if(!empty($imageError))
    {
        echo $imageError;
    }

    echo "<br>";
    echo formInput(array(
        'type' => 'submit',
        'name' => 'login',
        'id' => 'inputId',
        'class' => 'btn btn-default',
        'value' => 'dergo'
    ));
    echo "<br>";

    echo formInput(array(
        'name' => 'login',
        'id' => 'inputId',
        'value' => 'dergo',
        'class' => 'submit-button'
    ));
    echo "<br>";

    echo formClose();
    echo linkJs("js/app.js");
    echo anchor("profileController/anchor", "Delete", array('class' => 'link'));

    ?>

</body>
</html>