<?php
 if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require('database.php');
require('class.quiz.php');

/* 
echo "<pre>";
var_dump($_POST);
echo "</pre>";
die();
*/

$Database = new db();

if(!empty($_POST['form-token'])){
    if($_POST['form-token'] == 'user-login' && isset($_POST['user_name'])){
        $user = $Database->query('SELECT * FROM users WHERE name=?', strtolower($_POST['user_name']))->fetchArray();

        if(!empty($user)){
            $_SESSION['user']  = $user;
        }else{
            $_SESSION['error-message'] = 'User not found';
        }
        header('location: /');
        exit();
    }else if($_POST['form-token'] == 'submit-quiz'){
        $quiz_grade_array = array();
        $ignore_post = array('form-token', 'time_spent', 'Id_users');

        foreach($_POST as $name=>$value){
            if(!in_array($name, $ignore_post)){
                $quiz_grade_array[intval(str_replace('question_', '', $name))] = intval($value);
            }
        }

        $Quiz = new Quiz();
        $status = $Quiz->submitAndGrade($_POST['Id_users'], $_POST['time_spent'], $quiz_grade_array);

        if($status == false){
            $_SESSION['error-message'] = 'There was an issue submitting your quiz, please retake';
        }
        $user = $Database->query('SELECT * FROM users WHERE Id_users=?', strtolower($_POST['Id_users']))->fetchArray();
        
        $_SESSION['user'] = $user;

        header('location: /');
        exit();
    }
}else{
    $_SESSION['error-message'] = 'No Token Passed';
    header('location: /');
    exit();
}
