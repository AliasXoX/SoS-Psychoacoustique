<?php
session_start();
if (!isset($_SESSION["numero"])){
    $numbers = range(2, 10);
    shuffle($numbers);
    array_unshift($numbers, 1);
    $_SESSION["ordre"] = $numbers;
    $_SESSION["numero"] = 1;
}
else{
    if (isset($_POST["next"])){
        $_SESSION["question".$_SESSION["ordre"][$_SESSION["numero"]-1]] = $_POST["reponse"];
        if ($_SESSION["numero"] < 10) {
            $_SESSION["numero"]++;
        }
    }
    elseif (isset($_POST["previous"])){
        $_SESSION["question".$_SESSION["ordre"][$_SESSION["numero"]-1]] = $_POST["reponse"];
        if ($_SESSION["numero"] > 1) {
            $_SESSION["numero"]--;    
        }
    }
    elseif (isset($_POST["send"])) {
        $_SESSION["question".$_SESSION["ordre"][$_SESSION["numero"]-1]] = $_POST["reponse"];
        try{
            $db = new PDO('mysql:host=Enterhost;dbname=enterdbname', 'user', 'password');

            $sql = $db->prepare('INSERT INTO `main`(`question1`, `question2`, `question3`, `question4`, `question5`, `question6`, `question7`, `question8`, `question9`, `question10`) VALUES (:question1,:question2,:question3,:question4,:question5,:question6,:question7,:question8,:question9,:question10)');
            $sql->execute(array(
            ":question1"=> ($_SESSION["question1"]),
            ":question2"=> ($_SESSION["question2"]),
            ":question3"=> ($_SESSION["question3"]),
            ":question4"=> ($_SESSION["question4"]),
            ":question5"=> ($_SESSION["question5"]),
            ":question6"=> ($_SESSION["question6"]),
            ":question7"=> ($_SESSION["question7"]),
            ":question8"=> ($_SESSION["question8"]),
            ":question9"=> ($_SESSION["question9"]),
            ":question10"=> ($_SESSION["question10"]),
        ));
        session_destroy();
        header('Location: end.php');
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }

        
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include("./head.php") ?>
    </head>
    <body>
        <main>
            <div class="container">
                <form method="POST" action = "./questionnaire.php">

                    <?php if ($_SESSION["ordre"][$_SESSION["numero"]-1]== 1): ?>
                        <h2>Qu'utilisez-vous pour écouter nos enregistrements ?</h2>
                            <input type="radio" id="headphone" name="reponse" value="headphone" required <?= (isset($_SESSION["question1"])&&$_SESSION["question1"]=="headphone") ? 'checked="true"' : "" ?>>
                            <label for="headphone">Écouteurs/Casques</label>
                            <br/>
                            <input type="radio" id="speaker" name="reponse" value="speaker" <?= (isset($_SESSION["question1"])&&$_SESSION["question1"]=="speaker") ? 'checked="true"' : "" ?>>
                            <label for="speaker">Haut-parleurs</label>
                            <br/>
                            <input type="radio" id="phonespeaker" name="reponse" value="phonespeaker" <?= (isset($_SESSION["question1"])&&$_SESSION["question1"]=="phonespeaker") ? 'checked="true"' : "" ?>>
                            <label for="phonespeaker">Haut-parleurs de téléphone/ordinateur</label>
                            <br/>
                    <?php endif ?>

                    <?php if ($_SESSION["ordre"][$_SESSION["numero"]-1]== 2): ?>
                        <h3>Parmi ces deux enregistrements, lequel utilise l'eau la plus chaude ?</h3>
                        <br/>
                        <div class="record">
                            <p> Enregistrement 1 : </p>
                            <input type="radio" id="audio2.1" name="reponse" value="audio2.1" required <?= (isset($_SESSION["question2"])&&$_SESSION["question2"]=="audio2.1") ? 'checked="true"' : "" ?> >
                            <audio controls src="./media/03.mp3"></audio>
                        </div>
                        <div class="record">
                            <p> Enregistrement 2 : </p>
                            <input type="radio" id="audio2.2" name="reponse" value="audio2.2" <?= (isset($_SESSION["question2"])&&$_SESSION["question2"]=="audio2.2") ? 'checked="true"' : "" ?> >
                            <audio controls src="./media/05.mp3"></audio>
                        </div>
                    <?php endif ?>

                    <?php if ($_SESSION["ordre"][$_SESSION["numero"]-1]== 3): ?>
                        <h3>Parmi ces deux enregistrements, lequel utilise l'eau la plus chaude ?</h3>
                        <br/>
                        <div class = "record">
                            <p> Enregistrement 1 :</p>
                            <input type="radio" id="audio3.1" name="reponse" value="audio3.1" required <?= (isset($_SESSION["question3"])&&$_SESSION["question3"]=="audio3.1") ? 'checked="true"' : "" ?> >
                            <audio controls src="./media/04.mp3"></audio>
                        </div>

                        <div class="record">
                            <p> Enregistrement 2 :</p>
                            <input type="radio" id="audio3.2" name="reponse" value="audio3.2" <?= (isset($_SESSION["question3"])&&$_SESSION["question3"]=="audio3.2") ? 'checked="true"' : "" ?> >
                            <audio controls src="./media/06.mp3"></audio>
                        </div>
                    <?php endif ?>

                    <?php if ($_SESSION["ordre"][$_SESSION["numero"]-1]== 4): ?>
                        <h3>Parmi ces deux enregistrements, lequel utilise l'eau la plus chaude ?</h3>
                        <br/>
                        <div class="record">
                            <p> Enregistrement 1 : </p>
                            <input type="radio" id="audio4.1" name="reponse" value="audio4.1" required <?= (isset($_SESSION["question4"])&&$_SESSION["question4"]=="audio4.1") ? 'checked="true"' : "" ?> >
                            <audio controls src="./media/03.mp3"></audio>
                        </div>

                        <div class="record">
                            <p> Enregistrement 2 : </p>
                            <input type="radio" id="audio4.2" name="reponse" value="audio4.2" <?= (isset($_SESSION["question4"])&&$_SESSION["question4"]=="audio4.2") ? 'checked="true"' : "" ?> >
                            <audio controls src="./media/08.mp3"></audio>
                        </div>
                    <?php endif ?>
                    
                    <?php if ($_SESSION["ordre"][$_SESSION["numero"]-1]== 5): ?>
                        <h3>Parmi ces deux enregistrements, lequel utilise l'eau la plus chaude ?</h3>
                        <br/>
                        <div class="record">
                            <p> Enregistrement 1 : </p>
                            <input type="radio" id="audio5.1" name="reponse" value="audio5.1" required <?= (isset($_SESSION["question5"])&&$_SESSION["question5"]=="audio5.1") ? "checked" : "" ?> >
                            <audio controls src="./media/07.mp3"></audio>
                        </div>
                        
                        <div class="record">
                            <p> Enregistrement 2 : </p>
                            <input type="radio" id="audio5.2" name="reponse" value="audio5.2" <?= (isset($_SESSION["question5"])&&$_SESSION["question5"]=="audio5.2") ? 'checked="true"' : "" ?>>
                            <audio controls src="./media/04.mp3"></audio>
                        </div>
                    <?php endif ?>

                    <?php if ($_SESSION["ordre"][$_SESSION["numero"]-1]== 6): ?>
                        <div>
                        <h3> Décrivez le son que vous entendez en utilisant vos mots </h3>
                        <span>(exemple : rond, coloré, épinglant, ...)</span>
                        </div>
                        <br/>
                        <br/>
                        <div class="record">
                            <audio controls src="./media/05.mp3"></audio>
                            <br/>
                            <br/>
                            <textarea id="audio6.1" name="reponse" placeholder="Rentrez votre réponse ici..." required ><?= (isset($_SESSION["question6"])) ? $_SESSION["question6"] : "" ?></textarea>
                        </div>
                    <?php endif ?>

                    <?php if ($_SESSION["ordre"][$_SESSION["numero"]-1]== 7): ?>
                        <div>
                        <h3> Décrivez le son que vous entendez en utilisant vos mots </h3>
                        <span>(exemple : rond, coloré, épinglant, ...)</span>
                        </div>
                        <br/>
                        <br/>
                        <div class="record">
                            <audio controls src="./media/03.mp3"></audio>
                            <br/>
                            <br/>
                            <textarea id="audio7.1" name="reponse" placeholder="Rentrez votre réponse ici..." required ><?= (isset($_SESSION["question7"])) ? $_SESSION["question7"] : "" ?></textarea>
                        </div>
                    <?php endif ?>

                    <?php if ($_SESSION["ordre"][$_SESSION["numero"]-1]== 8): ?>
                        <h3> Duquel des enregistrements 1 et 2 l'enregistrement témoin se rapproche-t-il le plus ? </h3>
                        <br/>
                        <div class="record">
                            <p> Enregistrement témoin : </p>
                            <audio controls src="./media/03.mp3"></audio>
                        </div>
                        <div class="record">
                            <p> Enregistrement 1 : </p>
                            <input type="radio" id="audio8.1" name="reponse" value="audio8.1" required <?= (isset($_SESSION["question8"])&&$_SESSION["question8"]=="audio8.1") ? 'checked="true"' : "" ?> >
                            <audio controls src="./media/02.mp3"></audio>
                        </div>

                        <div class="record">
                            <p> Enregistrement 2 : </p>
                            <input type="radio" id="audio8.2" name="reponse" value="audio8.2" <?= (isset($_SESSION["question8"])&&$_SESSION["question8"]=="audio8.2") ? 'checked="true"' : "" ?> >
                            <audio controls src="./media/04.mp3"></audio>
                        </div>
                    <?php endif ?>
                    
                    <?php if ($_SESSION["ordre"][$_SESSION["numero"]-1]== 9): ?>
                        <h3> Parmi les enregistrements 1 et 2 l'un utilise de l'eau à la même température que l'enregistrement témoin. Selon vous, lequel est-ce ? </h3>
                        <br/>
                        <div class="record">
                            <p> Enregistrement témoin :  </p>
                            <audio controls src="./media/05.mp3"></audio>
                        </div>
                        <div class="record">
                            <p> Enregistrement 1 : </p>
                            <input type="radio" id="audio9.1" name="reponse" value="audio9.1" required <?= (isset($_SESSION["question9"])&&$_SESSION["question9"]=="audio9.1") ? 'checked="true"' : "" ?> >
                            <audio controls src="./media/01.mp3"></audio>
                        </div>

                        <div class="record">
                            <p> Enregistrement 2 : </p>
                            <input type="radio" id="audio9.2" name="reponse" value="audio9.2" <?= (isset($_SESSION["question9"])&&$_SESSION["question9"]=="audio9.2") ? 'checked="true"' : "" ?> >
                            <audio controls src="./media/06.mp3"></audio>
                        </div>
                    <?php endif ?>
                    
                    <?php if ($_SESSION["ordre"][$_SESSION["numero"]-1]== 10): ?>
                        <h3>Parmi ces deux enregistrements, lequel utilise l'eau la plus chaude ?</h3>
                        <br/>
                        <div class="record">
                            <p> Enregistrement 1 : </p>
                            <input type="radio" id="audio10.1" name="reponse" value="audio10.1" required <?= (isset($_SESSION["question10"])&&$_SESSION["question10"]=="audio10.1") ? 'checked="true"' : "" ?> >
                            <audio controls src="./media/01.mp3"></audio>
                        </div>

                        <div class="record">
                            <p> Enregistrement 2 : </p>
                            <input type="radio" id="audio10.2" name="reponse" value="audio10.2" <?= (isset($_SESSION["question10"])&&$_SESSION["question10"]=="audio10.2") ? 'checked="true"' : "" ?> >
                            <audio controls src="./media/02.mp3"></audio>
                        </div>
                    <?php endif ?> 
                    <br/>
                    <div class="submit">
                    <?php if ($_SESSION["numero"] > 1): ?>
                        <input type="submit" class="button-6" id="previous" name="previous" value="Question précédente">
                    <?php endif ?>
                    <?php if ($_SESSION["numero"] < 10): ?>
                        <input type="submit" class="button-6" id="next" name="next" value="Prochaine question">
                    <?php endif ?>
                    <?php if ($_SESSION["numero"] == 10): ?>
                        <input type="submit" class="button-6" id="send" name="send" value="Terminer le questionnaire">
                    <?php endif ?>
                    </div>
                    <div class="numero">
                        <?= $_SESSION["numero"]."/10" ?>
                    </div>
                </form>
            </div>
        </main>
    </body>
</html>
