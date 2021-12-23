<?php 
	if (session_status() === PHP_SESSION_NONE) {
    	session_start();
	}
    
    require_once($_SERVER['DOCUMENT_ROOT'] . '/framework/class.quiz.php');

    $Quiz = new Quiz();

    $quiz_questions = $Quiz->getQuizQuestions();

    /* 
    echo "<pre>";
    var_dump($quiz_questions);
    echo "</pre>";
    die();
    */
    $logged_in = true;
    if(!empty($_SESSION['user'])){
        $user = $_SESSION['user'];
        $quiz_completed = true;
        if(empty($user['quiz_score'])){
            $quiz_completed = false;

        }
    }else{
        $logged_in = false;
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Bailey Gifts</title>
        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="assets/css/mdb.min.css" rel="stylesheet">
        <!-- Add font awesome here -->

        <!-- Custom Styles -->
        <link rel='stylesheet' href='assets/custom/css/custom.css' /> 

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    </head>

    <body>
        <?php 
            echo '<div class="snowflakes" aria-hidden="true">';
            for ($i = 0; $i < 50; $i++){ 
                echo "<div class='snowflake'>❅</div>";
            }
            echo "</div>";
        ?>

        
        <?php if($logged_in){ ?>
            <div class='text-center mt-3'>
                <h1>Bailey Christmas Day Gift Special</h1>
            </div>
            <div class='text-center mt-3'>
                <img src='assets/images/<?php echo $user['picture_name']; ?>.png' class='top-profile-images' />
            </div>

            <?php if($quiz_completed == true){ ?>
                <div class='text-center mt-5 mb-4'>
                    <h3>You Have Completed The Quiz!</h3> <br />
                    <p>Please Direct your attention the tv for the results</p>
                </div>
            <?php }else{ ?>
                <div class='text-center mt-5 mb-4'>
                    Complete the quiz below to compete to compete for your gift picking order. <br />
                    Note that you are being timed and this will decide your placing in the event of a tie!
                </div>

                <form id='quiz_form' action='framework/post.php' method='POST'>
                    <div class='container'>
                        <?php foreach($quiz_questions as $Id=>$question){
                            echo "<div class='mb-3'>";
                                echo '<strong>' . $Id . ': ' . $question['question'] . '</strong><br /><br />';
                                foreach($question['answers'] as $answer){
                                    echo '<div class="form-check mb-2">';
                                        echo '<input type="radio" class="form-check-input" name="question_'. $Id .'" value="'. $answer['Id_quiz_answers'] .'" required>';
                                        echo '<label class="form-check-label" for="question_'. $Id .'">'.$answer['answer_text'] .'</label>'; 
                                    echo '</div>';
                                }
                            echo "</div>";
                        }
                        ?>
                        <div class='text-center'>
                            <input type='hidden' name='form-token' value='submit-quiz' />
                            <input type='hidden' name='time_spent' value='' />
                            <input type='hidden' name='Id_users' value='<?php echo $user['Id_users']; ?>' />
                            <a id='submit_quiz' class='btn btn-primary mt-3'>Submit</a>
                        </div>
                    </div>
                </form>

            <?php } ?>
        <?php }else{ ?>
            <div class='text-center mt-3'>
                <h1>Bailey Christmas Day Gift Special</h1>
            </div>
            
            <div class='row'>
                <marquee direction='right'>
                    <img src='assets/images/luke.png' class='top-profile-images' />
                    <img src='assets/images/kaden.png' class='top-profile-images' />
                    <img src='assets/images/jon.png' class='top-profile-images' />
                    <img src='assets/images/tony.png' class='top-profile-images' />
                    <img src='assets/images/katie.png' class='top-profile-images' />
                    <img src='assets/images/kim.png' class='top-profile-images' />
                </marquee>
            </div>
            <form id='log_in_form' action='framework/post.php' method='POST'>
                <input class='form-control' type='text' name='user_name' placeholder='Name' required>
                <input type='hidden' name='form-token' value='user-login' />
                <button class='btn btn-primary mt-3'>Log In</button>
            </form>



        <?php } ?>
        <script type="text/javascript" src="assets/jquery.js"></script>
	  	<!-- Bootstrap tooltips -->
	  	<script type="text/javascript " src="assets/js/popper.min.js"></script>
	  	<!-- Bootstrap core JavaScript -->
	  	<script type="text/javascript " src="assets/js/bootstrap.min.js"></script>
	  	<!-- MDB core JavaScript -->
	  	<script type="text/javascript " src="assets/js/mdb.min.js"></script>
	  	<!-- Custom js --> 
	  	<script type='text/javascript' src='assets/custom/js/custom.js'></script>

        <script type='text/javascript'>  
            $(document).ready(function(){
                <?php if($logged_in === true && empty($quiz_completed)){ ?>
                    window.time_spent = 0;

                    window.setInterval(addToTime, 1000);

                    function addToTime(){
                        window.time_spent++;
                        console.log(window.time_spent);
                    }

                    $('body').on('click', '#submit_quiz', function(e){
                        var valid_submit = true;
                        for(var i=1; i <=10; i++){
                            if ($("input[name='question_"+ i +"']:checked").length == 0) {
                                valid_submit = false;
                            }
                        }
                        if(valid_submit === true){
                            e.preventDefault();
                            $('input[name="time_spent"]').val(window.time_spent);
                            $('#quiz_form').submit();
                        }else{
                            alert('Please make sure all answers are submitted');
                        }
                    });
                <?php } ?>
            });
        </script>
    </body>
</html>