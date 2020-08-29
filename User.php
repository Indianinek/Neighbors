<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=McLaren" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville" rel="stylesheet">
</head>
<body>
  <div id="item_grid">

<?php
include('db.php');


$pensja = 50;
$cheapestItem = 10;
$orangeMinExp = 70;
$orangeMediumExp = 150;
$orangeMaxExp = 300;
$redMinExp=100;
$redMediumExp=250;
$redMaxExp=400;
$actualExp = 0;

  include('user_sql.php');


          $penalty = $level * 30;
            $rulete=rand(1,4);
              if($level>200)
              {
                $penalty = $level * 500;
              }
              if($level>100)
              {
                $penalty = $level * 100;
              }



echo "<div class='item_info' style='text-align:center; height: 350px;'><br>Lista akcji <br>";
    if($cash > 0){
      echo "<div class='text-level' style='font-size:20px; color:#58cc06'>$cash $</div>";
    }else{
      echo "<div class='text-level' style='font-size:20px; color:#c91c1c'>$cash $</div>";
    }
    echo "<div class='user_info'>PIWO : $beer <br>  ZNAJOMI : $friends <br> SMIECI : $garbage <br> HAŁAS : $noise dB <br>PUNKTY DOŚWIADCZENIA: $exp</div> <div class='text-level' style='font-size:30px; color:#2639ad'>$level</div>";


    if($noise  >= 30)
    {
      $query = mysqli_query($con,"UPDATE `user` SET exp = $exp + $orangeMinExp");
      $actualExp=$orangeMinExp;

      if($beer >= 3 && $noise > 30)
      {
        $query = mysqli_query($con,"UPDATE `user` SET exp = $exp + $orangeMediumExp");
          $actualExp=$orangeMediumExp;
        if ($beer >= 5 && $noise >= 70 && $garbage >=3) {
           $query = mysqli_query($con,"UPDATE `user` SET exp = $exp + $orangeMaxExp");
           $actualExp=$orangeMaxExp;
         }
    }
    if ($noise >= 70) {
       $query = mysqli_query($con,"UPDATE `user` SET exp = $exp + $redMinExp ");
       $actualExp=$redMinExp;

       if ($beer >= 5 && $noise >= 70) {
          $query = mysqli_query($con,"UPDATE `user` SET exp = $exp + $redMediumExp ");
          $actualExp=$redMediumExp;

          if ($beer >= 5 && $noise >= 70 && $garbage >=6) {
             $query = mysqli_query($con,"UPDATE `user` SET exp = $exp + $redMaxExp");
             $actualExp=$redMaxExp;
              }
            }
          }
        }


    echo "<a href='main_screen.php'><div class='button'>Wróć do głównego panelu</div></a>";

                      if($noise > 60) // jesli halas jest wiekszy niz 60, nastepuje grzywna w zaleznosci od levela
                      {
                        if($rulete==1)
                        {
                            echo "<div class='gameAlert' style='width:700px; padding-left:5px;'> Zostałeś ukarany grzywną od policji za hałasowanie! Ucisz imprezę do 60 dB!<br> -".$penalty."$</div>";
                            $query = mysqli_query($con,"UPDATE `user` SET pieniadze = pieniadze - $penalty");
                        }
                      }

                      if($beer>0)
                      if($rulete==2) // jesli ruletka wylosuje 2, tłucze się połowa piw w lodowce.
                      {
                        $beerLoss= $beer/2;
                          echo "<div class='gameAlert' style='width:700px; padding-left:5px;'>Twój ziomek własnie zbił połowe piw w lodówce! <br> -".intval($beerLoss)." browarów!</div>";
                          $query = mysqli_query($con,"UPDATE `user` SET browar = $beer / 2");
                      }
                    echo "</div>";

    echo "<div class='item' style='height:160px'><br><div class='text' style='height:60px' >Kup Głośnik JGL:<br> <font color='#169600'> +50 dB </font> <br>Cena: 300$</div> <form method='post'><input type='submit' name='jgl'  class='button' value='Kup'></input></form></div>";
    echo "<div class='item' style='height:160px'><br><div class='text' style='height:75px'>Zaproś kumpla <br> <font color='#169600'>+(5 x Ilość kumpli) dB <br> + 2 smieci </font> <br>Cena: 1 browar</div> <form method='post'><input type='submit' name='friend' class='button' value='Zaproś'></input></form></div>";
    echo "<div class='item'><br><div class='text'>Kup browara<br>Cena: 10$ </div><form method='post'><input type='submit' name='beer' class='button' value='Kup'></input></form></div>";



            if($level<20)
            {
              $pensja += $level * ($level *0.8);
            }
            if($level > 20)
            {
              $pensja += $level * ($level *2);
            }
            if($level >80)
            {
              $pensja += $level * ($level *2.5);
            }
            if($level > 150)
            {
              $pensja += $level * ($level * 4);
            }
            if($level > 300)
            {
              $pensja += $level * ($level * 5);
            }

          echo "<div class='item' style='background-color:#ea8c8c'><br> Idz do roboty: +$pensja$<br><font color='#bc0025'> - 50% znajomych <br> -60% hałasu </font><form method='post'><input type='submit' name='praca' class='buttonRed' value='Praca'></input></form></div>";
          //echo i submit odpowiedzialne za pojscie do pracy

          if (isset($_POST['jgl']) && $cash >= 300) { // submit odpowiedzialny za kupno glosnika
          if($friends<0)
          {
            $query="UPDATE user SET naglosnienie = round($noise - ($noise * 0.4))";
          }

          $query = mysqli_query($con,"UPDATE user SET pieniadze = $cash - 300, naglosnienie = $noise + 50");
          //header("Location:main_screen.php");
          }


          if (isset($_POST['praca'])) { //submit odpowiedzialny za pojscie do pracy
          if($friends==0)
          {
            if($noise<=0)
              {
                $query = mysqli_query($con,"UPDATE `user` SET naglosnienie= 0, znajomi = 0, pieniadze = $cash + $pensja, smieci= round($garbage - ($garbage* 0.5))");
              }
              else {
                $query = mysqli_query($con,"UPDATE `user` SET naglosnienie= round($noise - ($noise * 0.6)), znajomi = 0, pieniadze = $cash + $pensja, smieci= round($garbage - ($garbage* 0.5))");
              }


              }else {
              $query = mysqli_query($con,"UPDATE `user` SET pieniadze = $cash + $pensja, znajomi =round($friends - ($friends * 0.5)), naglosnienie= round($noise - ($noise * 0.6)), smieci= round($garbage - ($garbage* 0.5))");
              }
            }


            if (isset($_POST['friend']) && $beer >= 1) { // submit odpowiedzialny za zaproszenie znajomego
            $query = mysqli_query($con,"UPDATE user SET znajomi = $friends + 1, browar = $beer - 1, naglosnienie = $noise + (5 * $friends), smieci = $garbage + 2");

            }


            if (isset($_POST['beer']) && $cash >= 10) { // submit odpowiedzialny za kupno piwa
            if($friends<0)
            {
              if($noise<=0)
              {
                $query = mysqli_query($con,"UPDATE `user` SET naglosnienie= 0, znajomi = 0, pieniadze = $cash - 10, browar = $beer + 1");
              }
              else {
              $query = mysqli_query($con,"UPDATE `user` SET znajomi = 0, pieniadze = $cash - 10, browar = $beer + 1");
              }
            }
            else {
            $query = mysqli_query($con,"UPDATE `user` SET pieniadze = $cash - 10, browar = $beer + 1,naglosnienie= round($noise - ($noise * 0.2))");
            }
            }



            if($level < 30)
            {
              echo "<div class='item_info' style='text-align:center'><br><br>Odblokuj więcej akcji uzyskując 30 level.</div>";
            }


            // RESZTA AKCJI ZNAJDUJE SIE W PLIKU ACTION-GATE.PHP
              include('action-gate.php');
            // RESZTA AKCJI

            if($cash<$cheapestItem)
            {
            echo "<div class='item_info' style='background-color:red; color:white'> <center><br><br>Nie masz wystarczających środków: $cash$
                <br> <a href='main_screen.php'>Wróć do gry</a></div>";
            }
            echo "ver 1.1";




?>
</div>
</body>
</html>
