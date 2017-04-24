<?php

/*

Author: @takdzwiedz;

*/

class Towary extends DbConect {
    
    function addTowar($nazwa,$opis,$zdjecie,$cena){
        
        $laduj = "INSERT INTO `towary`(`id_towar`, `nazwa`, `opis`, `zdjecie`, `cena`) VALUES (NULL,'$nazwa','$opis','$zdjecie','$cena')";
        $ognia = $this->db->query($laduj);
        header('Location:index.php');
        exit();

    }
    
    function delTowar($id_towar){
        $komenda = "DELETE FROM `towary` WHERE `id_towar` = '$id_towar'";
        $ognia = $this->db->query($komenda);
        header('Location:index.php');
    }
    
    function showNoOfTowar(){
        
        $zapytanie = "select count(id_towar) as zapytanie_do_bazy_o_liste from towary";
        $wyslij = $this->db->query($zapytanie);
        $odpowiedz = $wyslij->fetch_object();
        echo "Liczba towarów w bazie : $odpowiedz->zapytanie_do_bazy_o_liste<hr>";
    }
   
    function showTowar(){
        
        $lista_towarow = "SELECT * FROM towary order by nazwa asc";
        $zapytanie_do_bazy_o_liste = $this->db->query($lista_towarow);
            while ($wiersz = $zapytanie_do_bazy_o_liste->fetch_object()){
                echo "<strong> Nazwa towaru: $wiersz->nazwa </strong>| <em> Opis: $wiersz->opis </em> | Zdjęcie: $wiersz->zdjecie | <span style=\"color:green\">Cena: $wiersz->cena </span><br>";
                echo "[ <a href=\"?action=del&id_towar=$wiersz->id_towar\" onclick=\"return confirm ('Czy usunąć?')\"> USUŃ </a> ]";
                echo "[ <a href=\"?action=modify&id_towar=$wiersz->id_towar\"> ZMIEŃ </a> ]<hr>";
            }
    }
    
    function displayTowar($id_towar){
        
        $laduj = "SELECT * FROM towary WHERE `id_towar`=$id_towar";
        $ognia = $this->db->query($laduj);
        $odbior = $ognia->fetch_object();
        $this->id_towar = $odbior->id_towar;
        $this->nazwa = $odbior->nazwa;
        $this->opis = $odbior->opis;
        $this->zdjecie = $odbior->zdjecie;
        $this->cena = $odbior->cena;
        
    }
    
    function modyfikujTowar($id_towar,$nazwa,$opis,$zdjecie,$cena){
        
        $laduj = "UPDATE `towary` SET `nazwa`='$nazwa',`opis`='$opis',`zdjecie`='$zdjecie',`cena`='$cena' WHERE id_towar=$id_towar";
        $ognia = $this->db->query($laduj);
        header('Location:index.php');
        exit();
        
    }
    
}