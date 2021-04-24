<?php
require 'supeICorbe.php';
require 'kuvanaJela.php';
require 'meso.php';
require 'recipeGenerator.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recepti-pocetna</title>
    <?php
     $cssFile = "style.css";
     echo "<link rel='stylesheet' href='" . $cssFile . "'>";
    ?>
    
   
</head>

<body>
    <header>
        <h1>
            <a href="index.php">
                Moji recepti
            </a>
        </h1>
        <ul>
            <li>
                <a href="supe-i-corbe.html">Supe i corbe</a>
            </li>
            <li>
                <a href="kuvana-jela.html">Kuvana jela</a>
            </li>
            <li>
                <a href="meso.html">Meso</a>
            </li>
        </ul>
        <hr>
    </header>
    <main>
        <article class="photos">
            <img src="photos/1.jpg" alt="photo1">
            <img src="photos/2.jpg" alt="photo2">
            <img src="photos/3.jpg" alt="photo3">
            <img src="photos/4.jpg" alt="photo4">
        </article>
        <form action="index.php" method="post">
            <div id="center">
                <div id="text">U polju ispod mozete uneti sastojke koje imate kod kuce i na osnovu njih videti izbor recepata koje mozete spremiti za svoj obrok, <br>sastojke odvajajte zarezom</div>
                <label for="inputName">Uneti Sastojke: </label>
                <input type="text" name="sastojak" id="sastojciImena"><br>
                <div id="er"><?= $err?></div>
                <input type="submit" value="Submit">
            </div>
        </form>
        <div id="generate">
            <?php
            if (!empty($_POST["sastojak"])) {
                echo "<h3>Uneti sastojci su: " . "<i style=\" color: gray; \">". $enteredIngredient . "</i><br></h3>";

            }
            echo $nonExistingIngredients . "<br>";
            if(!empty($recipesAvailable) && !empty($ingredientsDoNOTExistInrecipe)) {
            echo "<h3>Dostupni recepti koji sadrze sve navedene sastojke osim sastojaka koji nisu ni u jednom receptu: <br> </h3>" . $recipesAvailable;
            }

            if(!empty($recipesAvailable) && empty($ingredientsDoNOTExistInrecipe)) {
                echo "<h2>Dostupni recepti koji sadrze sve navedene sastojke u ispod izlistanim receptima: <br> </h2>" . $recipesAvailable;
                }

            if(!empty($recipesWithSomeIngredients)) {
                echo "<h2>Dostupni recepti koji sadrze neke od navedenih sastojaka: <br> </h2>" . $recipesWithSomeIngredients;
            }
            ?>
             
        </div>
    </main>
    

    

</body>

</html>