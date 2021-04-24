<?php
$arrAllRecipes = array($corbaOdKoprive, $corbaOdKarfiola, $corbaOdMesa, $potazOdPovrca, $potazOdBudeve, $potazOdGraska, $potazOdBlitve, $juneCorba, $supaOdKostiju, $paradajzCorba, $minestroneSupa, $pasulj, $pasuljSaGovedomPrsutom, $pasuljSaPrazilukomISvežomPaprikom, $rizotoSaBrokolijem, $socivo, $rizotoSaTikvicama, $rizotoSaPovrcem, $rizotoSaMesom, $prosoSaPovrcem, $pradajzSaIntegralnimPirincem, $kinoaSaPovrcem, $spanacSaIntegralnimPirincem, $kinoaSaPovrcem );

$enteredIngredient = "";
$err = "";
$ingredientsDoNOTExistInrecipe = array();
$recipesAvailable = "";
$nonExistingIngredients = "";
$recipesWithSomeIngredients = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["sastojak"])) {
        $err = "Unesi sastojke";
      } else {
        $enteredIngredient = trim($_POST["sastojak"]);
        $ingredientsArr = explode(",", $enteredIngredient);
        $strAllrecipes = implode(" ", $arrAllRecipes);
        
        $ingredientsExistInrecipe = array();
        

        //it checks if the ingredient is existing in any of the recipes
        for($a = 0; $a < count($ingredientsArr); $a++) {
            if(str_contains($strAllrecipes, $ingredientsArr[$a])) {
                array_push($ingredientsExistInrecipe, $ingredientsArr[$a]); 
            }
            if(!str_contains($strAllrecipes, $ingredientsArr[$a])) {
                array_push($ingredientsDoNOTExistInrecipe, $ingredientsArr[$a]);
            }
        }
        
        //it checks if all the ingredients are existing in the recipe and singles out the recipes that have the following ingredients
        for($b = 0; $b < count($arrAllRecipes); $b++) {
            $counterExist = 0;
            $recipe = $arrAllRecipes[$b];

            for($c = 0; $c < count($ingredientsExistInrecipe); $c++) {
                if(str_contains($arrAllRecipes[$b], $ingredientsExistInrecipe[$c])) 
                    $counterExist++;

                if(str_contains($recipesWithSomeIngredients, $recipe)) {
                $recipesWithSomeIngredients .= $recipe . "<br><br>";
                }
                
                if($counterExist === count($ingredientsExistInrecipe)) 
                    $recipesAvailable .=  $recipe . "<br><br>";
  
            }
            
        }
        if($ingredientsDoNOTExistInrecipe) 
            $nonExistingIngredients = "<h3>Navedeni sastojci se ne nalaze ni u jednom receptu: " . "<span style=\" color: gray; \">" . implode(", " ,$ingredientsDoNOTExistInrecipe) . "</span></h3>";
        
    }
}

?>