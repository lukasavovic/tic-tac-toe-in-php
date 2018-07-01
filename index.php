<?php
// all 9 fields of the tabel
$fields = array("","","","","","","","","");
// this variable will change if winning condition is met
$gameDone = '';

// first we check if user entered something, and populate the fileds with previous moves
if( isset( $_POST['submitbtn'] )){
    // first-row
    $fields[0] = $_POST['a1'];
    $fields[1] = $_POST['a2'];
    $fields[2] = $_POST['a3'];
    // second-row
    $fields[3] = $_POST['b1'];
    $fields[4] = $_POST['b2'];
    $fields[5] = $_POST['b3'];
    // third-row
    $fields[6] = $_POST['c1'];
    $fields[7] = $_POST['c2'];
    $fields[8] = $_POST['c3'];
}
// here we check if there are empty fields
$emptyField = false;

for($i=0;$i<8;$i+=1){
    if($fields[$i] === ''){
        $emptyField = true;
    }
};

// if there is empty field, rand() function will chose random nubmer to populate that field
// if that field is not empty we will generate another random nubmer
if($emptyField){
    $randomNumber = rand(0,8);
    
    while($fields[$randomNumber] != ''){
        $randomNumber = rand(0,8);
    }
    // then we will populate that field wiht O
    $fields[$randomNumber] = "O";

};
// we have 8 different winning options, 3 rows and 3 columns and 2 diagonals
// #1 a1-a2-a3
if($fields[0] == $fields[1] && $fields[1] == $fields[2] && $fields[0] != ''){
    $gameDone = "Game over. Winner is " . $fields[0];
}
// #2 b1-b2-b3
if($fields[3] == $fields[4] && $fields[4] == $fields[5] && $fields[3] != ''){
    $gameDone = "Game over. Winner is " . $fields[3];
}
// #3 c1-c2-c3
if($fields[6] == $fields[7] && $fields[7] == $fields[8] && $fields[8] != ''){
    $gameDone = "Game over. Winner is " . $fields[6];
}
// #4 a1-b1-c1
if($fields[0] == $fields[3] && $fields[3] == $fields[6] && $fields[0] != ''){
    $gameDone = "Game over. Winner is " . $fields[0];
}
// #5 a2-b2-c2
if($fields[1] == $fields[4] && $fields[4] == $fields[7] && $fields[1] != ''){
    $gameDone = "Game over. Winner is " . $fields[1];
}
// #6 a3-b3-c3
if($fields[2] == $fields[5] && $fields[5] == $fields[8] && $fields[8] != ''){
    $gameDone = "Game over. Winner is " . $fields[2];
}
// #7 a1-b2-c3
if($fields[0] == $fields[4] && $fields[4] == $fields[8] && $fields[8] != ''){
    $gameDone = "Game over. Winner is " . $fields[0];
}
// #8 a3-b2-c1
if($fields[2] == $fields[4] && $fields[4] == $fields[6] && $fields[6] != ''){
    $gameDone = "Game over. Winner is " . $fields[2];
}

// if there are there empty fields and none of the conditions up are met the game is draw
if($emptyField == false){
    $gameDone = "Game is done";
}

?><!doctype html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Welcome to my PHP game</h1>
<p>You play as X. Once you enter in one field press submit button.</p>
<p>Please enter only one X at the time, and then submit.</p>
<p>If you want to start again press the reset button</p>
<form action="" method="POST">
   
    <div class="row">
        <input type="text" name="a1" value="<?php  print($fields[0]); ?>" id="a1" class="field">
        <input type="text" name="a2" value="<?php  print($fields[1]); ?>" id="a2" class="field">
        <input type="text" name="a3" value="<?php  print($fields[2]); ?>" id="a3" class="field">
    </div>

    <div class="row">
        <input type="text" name="b1" value="<?php  print($fields[3]); ?>" id="b1" class="field">
        <input type="text" name="b2" value="<?php  print($fields[4]); ?>" id="b2" class="field">
        <input type="text" name="b3" value="<?php  print($fields[5]); ?>" id="b3" class="field">
    </div>
    
    <div class="row">
        <input type="text" name="c1" value="<?php  print($fields[6]); ?>" id="c1" class="field">
        <input type="text" name="c2" value="<?php  print($fields[7]); ?>" id="c2" class="field">
        <input type="text" name="c3" value="<?php  print($fields[8]); ?>" id="c3" class="field">
    </div>

    <input type="submit" name="submitbtn" value="SUBMIT" id="submit" class="play">
    <input type="submit" onclick="window.location.href=\'index.php'\" value="RESET" name="newGame" id="reset">
</form>

<h2><?= $gameDone ?></h2>

</body>
</html>



