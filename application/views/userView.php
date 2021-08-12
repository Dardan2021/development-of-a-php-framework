<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php echo linkCss("css/style.css");?>
    <title>

    </title>

</head>
<body>
    <p>hmk</p>
    <?php
        if(isset($data))
        {
            foreach($data['values'] as $data)
            {
                echo $data['name']."<BR>";
                echo $data['teacher_age']."<BR>";
                echo $data['class_name']."<BR>";
            }
        }
    ?>

    <?php echo formOpen("profileController/submitForm","POST", array('class'=>'form', 'id'=>'formid'));?>
        <?php echo formInput(array(
            'type'        => 'password',
            'name'        => 'username',
            'id'          => 'inputId',
            'class'       => 'form-control',
            'placeholder' => 'enter password',
            'value'       => '')); ?>
        <br>
        <?php echo formInput(array(
            'type'        => 'email',
            'name'        => 'username',
            'id'          => 'inputId',
            'class'       => 'form-control',
            'placeholder' => 'enter name',
            'value'       => '')); ?>
        <br>
        <?php echo formInput(array(
            'type'        => 'text',
            'name'        => 'username',
            'id'          => 'inputId',
            'class'       => 'form-control',
            'placeholder' => 'enter email',
            'value'       => '')); ?>
        <br>
        <?php echo formInput(array(
            'type'  => 'file',
            'name'  => 'username',
            'id'    => 'inputId',
            'class' => 'form-control',
           )); ?>
        <br>
        <?php echo formInput(array(
            'type'  => 'submit',
            'name'  => 'login',
            'id'    => 'inputId',
            'class' => 'btn btn-default',
            'value' => 'dergo'
        )); ?>
        <br>
        <?php echo formInput(array(
            'name'  => 'login',
            'id'    => 'inputId',
            'value' => 'dergo',
            'class' => 'submit-button'
        )); ?>
    
    <?php echo formClose();?>
    <?php echo linkJs("js/app.js");?>
    <?php echo anchor("profileController/anchor", "Delete", array('class'=>'link'));?>

</body>
</html>