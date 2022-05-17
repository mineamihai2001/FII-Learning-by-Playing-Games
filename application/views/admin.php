<!DOCTYPE html>
<html lang="en">
<?php require_once './templates/header.php' ?>
<body>
    <img src = "/www/images/micro.svg" alt="micro"/>
    <h2>Admin CONSOLE</h2>

    <h1 id="lessonh1">Lessons</h1>
    <div class="lessons">
    <button  type="button" id="l1">Sub-lesson #1</button>
    <button  type="button" id="l2">Sub-lesson #2</button>
    <button  type="button" id="l3">Sub-lesson #3</button>
    <button  type="button" id="l4">Sub-lesson #4</button>
    <button  type="button" id="l5">Sub-lesson #5</button>
    <button  type="button" id="l6">Sub-lesson #6</button>
    <button  type="button" id="l7">Sub-lesson #7</button>
    </div>

    <div class="sectioncroll">
        <button type="button" id="lesson1"></button>
        <button type="button" id="dragndrop1"></button>
        <button type="button" id="dragndrop2"></button>
        <div class="border">
            <p id="dnd1">Drag lessons from the right or enter lesson ID:</p>
            <input type="text" id="id1" name="lname" placeholder="ID"><br>
            <button type="button" id="submit1" >Submit</button>
        </div>  
        <input type="text" id="lname" name="lname" placeholder="Lesson 1: Lorem ipsum dolor"><br>
        <button type="button" id="quizz1"></button>
        <button type="button" id="dragndrop3"></button>
        <button type="button" id="dragndrop4"></button>
        <input type="text" id="qname" name="qname" placeholder="Quizz 1: Lorem ipsum dolor"><br>
    </div>
    


    <h1 id="questionh1">Questions</h1>
    <div class="questions">
        <button  type="button" id="qb1">Question #1</button>
        <button  type="button" id="qb2">Question #2</button>
        <button  type="button" id="qb3">Question #3</button>
        <button  type="button" id="qb4">Question #4</button>
        <button  type="button" id="qb5">Question #5</button>
        <button  type="button" id="qb6">Question #6</button>
        <button  type="button" id="qb7">Question #7</button>
        <button  type="button" id="qb8">Question #8</button>
        <button  type="button" id="qb9">Question #9</button>
        <button  type="button" id="qb10">Question #10</button>
    </div>

    <button  type="button" id="c1">Chapter #1</button>
    <button  type="button" id="c2">Chapter #2</button>
    <button  type="button" id="c3">Chapter #3</button>
    <button  type="button" id="c4">Chapter #4</button>
    <button  type="button" id="c5">Chapter #5</button>
    <button  type="button" id="c6">Chapter #6</button>
    <button  type="button" id="c7">Chapter #7</button>
    <button  type="button" id="c8">Chapter #8</button>

    <script src="jscode.js"></script>
</body>
</html>