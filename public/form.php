<?php
// Retrieve all datas
//I check the possible errors on the forms,
//If there's some I'll display them
//Else I will display the data with a success message
$data = [];
$errors = [];
foreach($_GET as $key => $value){
    //Clean the  value : 
    $checkedValue = htmlentities(trim($value));
    //Prepare Data
    $data[$key] = $checkedValue;

    //Make all checks
    if(!$checkedValue){
        $errors[$key] = "Please fill you name.";
    } elseif(strlen($checkedValue) > 50){
            $errors[$key] = "Your name is too long, use a nickName.";
        } elseif(strlen($checkedValue) < 2){
            $errors[$key] = "Your name must be longer than 1 character.";
        } else {
            null;
    }
}

//var_dump($data);
//var_dump($errors);
//For every keys I display or the error key if there are errors or else I display the data

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>successfull registration</title>
</head>
<body>
    <main>
        <ul>
            <?php foreach($_GET as $key => $values) : ?>
                <?php if($errors[$key]) : ?>
                    <li><?= $errors[$key] ?></li>
                <?php else : ?>
                    <li><?= $data[$key] ?></li>
                <?php endif ?>
            <?php endforeach ?>
        </ul>
    </main>
</body>
</html>