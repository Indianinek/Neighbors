<html>
<head>

  <link href="https://fonts.googleapis.com/css?family=McLaren" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>

    </style>
</head>
<body>

  <div class='bg'>
  <div id='grid'>
<?php
include('db.php');

  $rulete=rand(1,20);
  include('user_sql.php');


        $penalty = $level * 30;

            if($level>200)
            {
              $penalty = $level * 500;
            }
            if($level>100)
            {
              $penalty = $level * 100;
            }

                if($noise > 60) // jesli halas jest wiekszy niz 60, nastepuje grzywna w zaleznosci od levela
                {
                  if($rulete==1)
                  {
                      echo "<div class='gameAlert'>Zostałeś ukarany grzywną od policji za hałasowanie! Ucisz imprezę do 60 dB!<br> -".$penalty."$</div>";
                      $query = mysqli_query($con,"UPDATE `user` SET pieniadze = pieniadze - $penalty");
                  }
                }

                if($beer>0)
                if($rulete==2) // jesli ruletka wylosuje 2, tłucze się połowa piw w lodowce.
                {
                  $beerLoss= $beer/2;
                    echo "<div class='gameAlert'>Twój ziomek własnie zbił połowe piw w lodówce! <br> -".intval($beerLoss)." browarów!</div>";
                    $query = mysqli_query($con,"UPDATE `user` SET browar = $beer / 2");
                }

        $orangeMinExp = 70;
        $orangeMediumExp = 150;
        $orangeMaxExp = 300;
        $redMinExp=100;
        $redMediumExp=250;
        $redMaxExp=400;
        $actualExp = 0;

        if($noise>600)
        {
         $redMaxExp*=2;
       }
        if($noise>2000)
       {
         $redMaxExp*=3;
       }


      $grid_query=mysqli_query($con,"SELECT * FROM `sasiedzi`;");
      if (mysqli_num_rows($grid_query) > 0) {
        while ($row = mysqli_fetch_assoc($grid_query)) {

          $family=$row['RODZINA'];


          $color= "img/green.png"; // System zmiany kolorów divow w zaleznosci od natężenia zmiennej halasu

          //if($row['RODZINA']=="Kowalscy") DZIAŁA DO ZMIANY IMG NA 8 INNYCH, ZROBIC W OSOBYN SKRYPCIE
        //  {
      //      $color= "img/green-kowalscy.png";
    //      }

          if($row['TYP']=="halas" || $row['TYP']=="muzyka")
          {
            if($noise  >= 30)
            {
              $color = "img/orange.png";
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
             $color = "img/red.png";
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
              }

          if($row['TYP']=="alkohol")
          {
            if($beer >= 3 && $noise > 40)
            {
              $color = "img/orange.png";
            }
            if ($beer >= 5 && $noise >= 70) {
             $color = "img/red.png";
            }
          }

          if($row['TYP']=="smieci")
          {
            if($garbage >= 3)
            {
              $color = "img/orange.png";
            }
            if ($garbage >= 6) {
             $color = "img/red.png";
            }
          }

          $typ=$row['TYP']; // poprawa działania polskich znaków w głównym zapytaniu
          if($row['TYP']=="halas")
          {
            $typ="hałas";
          }
          else if($row['TYP']=="muzyka") {
            $typ="muzykę";
          }

            echo "<div class='neigh' style='background-image: url(".$color.");'><div class='familyText'> Państwo ".$family."<br>
            są wrażliwi na ".$typ." </div></div>";

              if($row['RODZINA']=="Makulscy")
              {
                  echo "
                  <a href='User.php'</a>
                  <div class='player'><br>";

                  if($cash > 0){
                    echo "Gotówka:<div class='text-level' style='font-size:20px; color:#58cc06'>$cash$</div>";
                  }else{
                    echo "Gotówka:<div class='text-level' style='font-size:20px; color:#c91c1c'>$cash $</div>";
                  }

                  echo"
                  Browary: ".$beer."<br>
                  Znajomi: ".$friends."<br>
                  Ilość smieci:".$garbage."<br>
                  Poziom halasu:".$noise." db <br><br>
                  Twój poziom:

                <div class='text-level' style='font-size:30px; color:#2639ad'>$level</div>
                <div class='text-level' style='font-size:13px;'> Punkty doświadczenia:".$exp." XP</div>
                <div class='text-level' style='font-size:16px;'> Zdobyte PD w tej turze: +".$actualExp." XP </div>
                </div></a>";
              }
          }
      }

    echo "ver 1.1";
 ?>
</div>
  </div>
</html>
