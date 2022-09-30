<?php
    $initialValues = [
        "firstName" => [
            "label" => "First Name",
            "placeholder" => "Your name goes here",
        ], 
        "lastName" => [
            "label" => "Last Name",
            "placeholder" => "Your last name goes here",
        ],
    ];
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

    //var_dump($_GET);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form live demo</title>
</head>
<body>
    <main>
        <?php if(empty($errors) && !empty($data)) : ?>
            <h1>Registration successfull!</h1>
        <?php else : ?>
            <form action="index.php">
                <?php foreach ($initialValues as $initialValue => $attributes) : ?>
                    <div class="inputDisplay">
                        <label for="<?= $initialValue ?>">
                            <?= $attributes["label"] ?>
                        </label>
                        <input 
                            id="<?= $initialValue ?>"
                            name="<?= $initialValue ?>"
                            type="text"
                            placeholder="<?= $attributes["placeholder"] ?>"
                            value="<?= $data[$initialValue] ? $data[$initialValue] : "" ?>"
                        >
                        <?php if($errors[$initialValue]) : ?>
                            <p><?= $errors[$initialValue] ?></p>
                        <?php endif ?>
                    </div>
                <?php endforeach?>
                <button type="submit">Send</button>
            </form>
        <?php endif ?>
    </main>
</body>
</html>