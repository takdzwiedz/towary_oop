<?php
require_once 'config/Config.php';

/*

Author: @takdzwiedz;

*/

?>


<!DOCTYPE html>

<html>
    
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="css.css">
    <title>Nowy użytkownik</title>

</head>
    
<body>

    <?php

        //Warunek zapisania towaru

        if(isset($_POST['zapisz']) && !isset($_POST['id_towar'])) {

           $nazwa = trim($_POST['nazwa']);
           $opis = trim($_POST['opis']);
           $zdjecie = trim($_POST['zdjecie']);
           $cena = trim($_POST['cena']);

           $addTowar = new Towary();
           $addTowar->addTowar($nazwa, $opis, $zdjecie, $cena);

        }

        //Warunek usunięcia towaru

        if(isset($_GET['action']) && $_GET['action']=='del'){

            $id_towar = (int)$_GET['id_towar'];
            $usun_towar = new Towary();
            $usun_towar->delTowar($id_towar);

        }

        //Warunek zaznaczenie towaru

        if(isset($_GET['action']) && $_GET['action']=='modify' && !empty($_GET['id_towar'])){

            $id_towar = (int)$_GET['id_towar'];
            $do_modyfikacji = new Towary();
            $do_modyfikacji->displayTowar($id_towar);

        }

        //Warunek modyfikacji towaru

        if(isset($_POST['zapisz']) && isset($_POST['id_towar'])) {

            $id_towar = (int)$_GET['id_towar'];
            $nazwa = trim($_POST['nazwa']);
            $opis = trim($_POST['opis']);
            $zdjecie = trim($_POST['zdjecie']);
            $cena = trim($_POST['cena']);
            $modyfikuj = new Towary();
            $modyfikuj->modyfikujTowar($id_towar,$nazwa,$opis,$zdjecie,$cena);

        }

    ?>

    <fieldset>

        <legend>Nowy towar:</legend>

        <form method="post">

            Podaj nazwę 
            <input name="nazwa" value="<?php if(isset($do_modyfikacji->nazwa)){echo $do_modyfikacji->nazwa;}?>">

            Podaj opis 
            <input name="opis" value="<?php if(isset($do_modyfikacji->opis)){ echo $do_modyfikacji->opis; }?>">

            Dodaj link do zdjęcia
            <input name="zdjecie" value="<?php if(isset($do_modyfikacji->zdjecie)){echo $do_modyfikacji->zdjecie;}?>">

            Dodaj cenę
            <input name="cena" value="<?php if(isset($do_modyfikacji->cena)){echo $do_modyfikacji->cena;}?>">

            <?php if(isset($do_modyfikacji->nazwa)){echo "<input type=\"hidden\" name=\"id_towar\" value=\"$do_modyfikacji->id_towar\">";}?>

            <input type="submit" name="zapisz" value="Zapisz" style="margin: 1px;">

        </form>

    </fieldset>

    <fieldset>

        <legend>Lista towarów w bazie:</legend>

        <?php
        
        // UTworzenie obiektu Towary i wywołanie metody pokazującej ilość towarów

        $l_towarow = new Towary();
        $l_towarow->showNoOfTowar(); 
        
        // Utworzenie obietku Towary i wywołanie metody wymieniająćej wszystkie towary
        
        $showTowar = new Towary();
        $showTowar->showTowar();

        ?>

    </fieldset>

</body>

</html>

