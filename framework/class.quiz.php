<?php 


/* 

    Class For Interacting with our Quiz Models

    By: Bailey Rotellini

*/



class Quiz{
    private $db;

    
    ///   
    // Construct function for class
    ///
    function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'] . '/framework/database.php');
        $this->db = new db();
    }

    ///
    //  Funtion for getting quiz questions and answers
    ///
    public function getQuizQuestions(){
        $results = $this->db->query('SELECT qq.Id_quiz_questions, qq.question, qa.Id_quiz_answers, qa.answer_text FROM quiz_questions qq LEFT JOIN quiz_answers qa ON qa.quiz_questions_Id=qq.Id_quiz_questions ORDER BY qq.question_order ASC')->fetchAll();

        $quiz_array = array();
        if(!empty($results)){
            foreach($results as $result){
                if(!array_key_exists($result['Id_quiz_questions'], $quiz_array)){
                    $quiz_array[$result['Id_quiz_questions']] = array();
                    $quiz_array[$result['Id_quiz_questions']]['question'] = $result['question'];
                    $quiz_array[$result['Id_quiz_questions']]['answers'] = array();
                }

                $tmp = array();
                $tmp['Id_quiz_answers'] = $result['Id_quiz_answers'];
                $tmp['answer_text'] = $result['answer_text'];

                array_push($quiz_array[$result['Id_quiz_questions']]['answers'], $tmp);
            }
        }
        return $quiz_array;
    }

    ///
    //  Function for submitting quiz and grading
    ///
    public function submitAndGrade($Id_users, $time_spent, $quiz){
        $answers = $this->db->query('SELECT qq.Id_quiz_questions, qa.Id_quiz_answers FROM quiz_questions qq LEFT JOIN quiz_answers qa ON qa.Id_quiz_answers=qq.answer')->fetchAll();

        $score = 0;

        $real_answers = array();
        foreach($answers as $answer){
            $real_answers[$answer['Id_quiz_questions']] = $answer['Id_quiz_answers'];
        }
        foreach($quiz as $question_Id=>$answer){
            if($real_answers[$question_Id] == $answer){
                $score++;
            }
        }
        
        $update = $this->db->query('UPDATE users SET quiz_score=?, time_spent=? WHERE Id_users=?', array($score, intval($time_spent), intval($Id_users)))->affectedRows();

        return true;
    }

}