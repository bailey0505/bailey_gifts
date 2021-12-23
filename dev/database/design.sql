/*
    Database Design For Bailey Gifts
*/


/* Create Database */
CREATE DATABASE bailey_gifts;



/* Table for holding our users */
CREATE TABLE users(
    `Id_users` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(64),
    `quiz_score` int(11),
    `time_spent` int(11),
    `picture_name` varchar(128),
    PRIMARY KEY(`Id_users`)
);

/* Table for holding our quiz answers for our users */
CREATE TABLE users_quiz_results(
    `Id_users_quiz_results` int(11) NOT NULL AUTO_INCREMENT,
    `users_Id` int(11) unsigned,
    `quiz_questions_Id` int(11) unsigned,
    `quiz_answers_Id` int(11) unsigned,
    PRIMARY KEY (`Id_users_quiz_results`)
);

/* Table for holding our quiz questions */
CREATE TABLE quiz_questions(
    `Id_quiz_questions` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `question_order` int(11),
    `question` varchar(255),
    `answer` int(11),
    PRIMARY KEY (`Id_quiz_questions`)
);

/* Table for holding our quiz answers */
CREATE TABLE quiz_answers(
    `Id_quiz_answers` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `quiz_questions_Id` int(11),
    `answer_text` varchar(128),
    PRIMARY KEY (`Id_quiz_answers`)
);


/* Insert for user table */
INSERT INTO users(name, picture_name) VALUES('luke', 'luke'), ('katie', 'katie'),('tony', 'tony'),('jon', 'jon'), ('kaden', 'kaden'),('kim', 'kim');

/* Insert Questions */
INSERT INTO quiz_questions(question_order, question) VALUES(1, 'The real St. Nicholas was born in what modern-day country?'), (2, 'Rudolph the Red-Nosed Reindeer was created as a promotion for what department store?'), (3, 'What song does Lucy ask Schroeder to play on his piano in "A Charlie Brown Christmas"?'), (4, 'Eggnog was first consumed in what U.S. city?'), (5, '"Do You Hear What I Hear?" was originally written in response to'), (6, 'Bailey awakes in the morning, what is the first thing he does'), (7, 'Baileys cats name'), (8, 'Baileys first programming language'), (9, 'Bailey is out all night, what drink does he order throughout the night'), (10, 'Bailey is downtown and needs lunch, where does he go');


/* Insert Answers */
INSERT INTO quiz_answers (quiz_questions_Id, answer_text) VALUES (1, 'Iraq'), (1, 'Turkey'), (1, 'Israel'), (1, 'Germany'), (2, 'Macys'), (2, 'Nordstrom'), (2, 'J.C. Penney'), (2, 'Montgomery Ward'), (3, 'Joy to the World'), (3, 'Silent Night'), (3, 'Jingle Bells'), (3, 'Frosty The Snowman'), (4, 'New York, New York'), (4, 'Provincetown, Massachusetts'), (4, 'Boston, Massachusetts'), (4, 'Jamestwon Virginia'), (5, 'Vietname War'), (5, 'Cuban Missle Crisis'), (5, 'Invasion of Kuwait'), (5, 'Syrian Refugee Crisis'), (6, 'Make the bed'), (6, 'Brush teeth'), (6, 'Push ups'), (6, 'Read'), (7, 'Ember'), (7, 'Safari'), (7, 'Hedwig'), (7, 'Mia'), (8, 'Java'), (8, 'PHP'), (8, 'Visual Basic'), (8, 'Javascript'), (9, 'Jack & Coke'), (9, 'Beer'), (9, 'Vodka Cranberry'), (9, 'Vodka Redbull'), (10, 'Moes'), (10, 'Chipotle'), (10, 'Subway'), (10, 'Bobs Subs');


/* Update Question answers */
UPDATE quiz_questions SET answer=2 WHERE Id_quiz_questions=1;
UPDATE quiz_questions SET answer=8 WHERE Id_quiz_questions=2;
UPDATE quiz_questions SET answer=11 WHERE Id_quiz_questions=3;
UPDATE quiz_questions SET answer=16 WHERE Id_quiz_questions=4;
UPDATE quiz_questions SET answer=18 WHERE Id_quiz_questions=5;
UPDATE quiz_questions SET answer=22 WHERE Id_quiz_questions=6;
UPDATE quiz_questions SET answer=25 WHERE Id_quiz_questions=7;
UPDATE quiz_questions SET answer=31 WHERE Id_quiz_questions=8;
UPDATE quiz_questions SET answer=36 WHERE Id_quiz_questions=9;
UPDATE quiz_questions SET answer=38 WHERE Id_quiz_questions=10;

