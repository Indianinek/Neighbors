<?php
              if($level >=30) { // bramka levelowa do 30 levela

                echo "<div class='item' style='height:175px; background-image:url(img/silver.jpg);' ><div class='text' style='height:100px'> <div class='legendary'style='color:#665f00;'><i>Mistrzowskie</i></div> Puść 'Baśka - Wilki' na caly regulator<br> <font color='#169600'>+300 dB <br>+1500 XP</font> <br> Cena: 8,000$</div> <form method='post'><input type='submit' name='wilki' class='button' value='Puść'></input></form></div>";
                echo "<div class='item' style='height:175px; background-color:#5998ff;' ><div class='text' style='height:100px'> <div class='legendary'><i>Legendarne</i></div>  Usłysz od sasiadów 'ZAMKNIJCIE RYJE'<br><font color='#169600'> +100 dB <br>+1500 XP </font><br> Cena: 7,000$ i 4 browary</div> <form method='post'><input type='submit' name='scream' class='button' value='Krzyknij'></input></form></div>";


                if (isset($_POST['wilki'])) { // submit odpowiedzialny za kupno wilkow
                  if($cash>=8000)
                  {
                    $query = mysqli_query($con,"UPDATE user SET pieniadze = $cash - 8000, naglosnienie = $noise + 300, exp = $exp + 1000");

                  }
                }


                if (isset($_POST['scream']) && $beer > 0) { // submit odpowiedzialny za krzykniecie zamknijcie ryje
                  if($cash>=7000)
                  {
                    $query = mysqli_query($con,"UPDATE user SET pieniadze = $cash - 7000, naglosnienie = $noise + 150, exp = $exp + 1500, browar = $beer - 4");
                  }
                }

                if($level < 50)
                echo "<div class='item_info' style='text-align:center'><br><br>Odblokuj więcej akcji uzyskując 50 level.</div>";
            }


            if ($level >= 50) // bramka levelowa do 50 levela
            {
              echo "<div class='item' style='height:220px;background-color:#5998ff;' ><div class='text' style='height:155px;'><div class='legendary'><i>Legendarne</i></div>Opluj plot sąsiadów bez koszulki i <br> zamów 3 pizze Lulu w cenie 4<br><font color='#169600'> + 4 śmieci <br> +5 znajomych <br> +400 dB <br> + 2,000 XP </font><br> Cena: 20,000$</div> <form method='post'><input type='submit' name='spit' class='button' value='Opluj'></input></form></div>";
              echo "<div class='item' style='height:220px; background-image:url(img/silver.jpg);' ><div class='text' style='height:155px'> <div class='legendary'style='color:#665f00;'><i>Mistrzowskie</i></div> Przychodzą wstawieni starzy Adama <br><font color='#169600'> + 10 browarów <br> + 1000 dB <br> +2 znajomych<br> + 3500 XP <br>+6 smieci</font> <br> Cena: 35,000$  </div> <form method='post'><input type='submit' name='starzy' class='button' value='Puść'></input></form></div>";


              if (isset($_POST['spit'])) { // submit odpowiedzialny za kupno wilkow
                if($cash>=20000)
                {
                  $query = mysqli_query($con,"UPDATE user SET pieniadze = $cash - 20000, naglosnienie = $noise + 400, exp = $exp + 2000, smieci = $garbage + 4, znajomi = $friends + 5");

                  }
                  else
                  {
                  echo "<div class='item_info' style='background-color:red; color:white;'> <center><br><br>Nie masz wystarczających środków: $cash$
                      <br> <a href='main_screen.php'>Wróć do gry</a></div>";
                    }
                }

                if (isset($_POST['starzy'])) { // submit odpowiedzialny za starych adama
                if($cash>=35000)
                {
                  $query = mysqli_query($con,"UPDATE user SET pieniadze = $cash - 35000, naglosnienie = $noise + 1000, exp = $exp + 3500, browar = $beer + 10, znajomi = $friends + 2, smieci = $garbage + 6");

                }
                else
                {
                  echo "<div class='item_info' style='background-color:red; color:white;'> <center><br><br>Nie masz wystarczających środków: $cash$
                      <br> <a href='main_screen.php'>Wróć do gry</a></div>";
                }
            }
            if($level < 100)
            echo "<div class='item_info' style='text-align:center'><br><br>Odblokuj więcej akcji uzyskując 100 level.</div>";
          }



          if ($level >= 100) // bramka levelowa do 100 levela
          {
            echo "<div class='item' style='height:220px;background-color:#5998ff;' ><div class='text' style='height:155px;'><div class='legendary'><i>Legendarne</i></div>Idź z ziomami na stacje po 23:00 <br><font color='#169600'> +10 śmieci <br> +20 znajomych <br> +1,000 dB <br> +10 browarów <br> +5,000 XP </font><br> Cena: 100,000$</div> <form method='post'><input type='submit' name='stacja' class='button' value='Idz'></input></form></div>";
            echo "<div class='item' style='height:220px; background-image:url(img/gold.jpg);'><div class='text' style='height:155px'> <div class='legendary'style='color:#665f00;'><i>Arcy-Mistrzowskie</i></div>Wrzuć 2 miesięczny szejker na posesje sąsiada<font color='#169600'><br>+1,000 smieci <br>+100 znajomych<br> +10,000 dB <br>+30,000 XP</font> <br> Cena: 1,000,000$</div> <form method='post'><input type='submit' name='wrzuc' class='button' value='Wrzuć'></input></form></div>";

            if (isset($_POST['stacja'])) { // submit odpowiedzialny za kupno wilkow
              if($cash>=100000)
              {
                $query = mysqli_query($con,"UPDATE user SET pieniadze = $cash - 100000, naglosnienie = $noise + 1000, exp = $exp + 5000, smieci = $garbage + 10, znajomi = $friends + 20, browar = $beer + 10");

                }
                else
                {
                echo "<div class='item_info' style='background-color:red; color:white;'> <center><br><br>Nie masz wystarczających środków: $cash$
                    <br> <a href='main_screen.php'>Wróć do gry</a></div>";
                  }
              }

              if (isset($_POST['wrzuc'])) { // submit odpowiedzialny za starych adama
              if($cash>=1000000)
              {
                $query = mysqli_query($con,"UPDATE user SET pieniadze = $cash - 1000000, naglosnienie = $noise + 10000, exp = $exp + 30000, znajomi = $friends + 100, smieci = $garbage + 1000");

              }
              else
              {
                echo "<div class='item_info' style='background-color:red; color:white;'> <center><br><br>Nie masz wystarczających środków: $cash$
                    <br> <a href='main_screen.php'>Wróć do gry</a></div>";
              }
          }
          if($level < 200)
          echo "<div class='item_info' style='text-align:center'><br><br>Odblokuj więcej akcji uzyskując 200 level.</div>";

        }


          if ($level >= 200) // bramka levelowa do 200 levela
          {
            echo "<div class='item' style='height:220px; background-image:url(img/gold.jpg);'><div class='text' style='height:155px'> <div class='legendary'style='color:#665f00;'><i>Arcy-Mistrzowskie</i></div>Przeskocz przez ognisko <br>puszczając Flume na pełny regulator <font color='#169600'><br>+50,0000 XP</font><br><font color='red'>-100% browarów</font> <br><br> Cena: 5,000,000$</div> <form method='post'><input type='submit' name='flume' class='button' value='Przeskocz'></input></form></div>";
            echo "<div class='item' style='height:220px; background-image:url(img/amethyst.png);'><div class='text' style='height:155px'> <div class='legendary'style='color:white;'><i>Arcy-Legendarne</i></div><font color='white'> Krzyknij do sasiadów 'NIENAWIDZE WAS!<font color='#169600'><br><br>+100,000 XP <br> +10,000 dB <br> + 5 znajomych </font> <br> Cena: 10,000,000$</font></div> <form method='post'><input type='submit' name='scream_arcy' class='button' value='Krzyknij'></input></form></div>";


          if (isset($_POST['flume'])) { // submit odpowiedzialny za przeskakiwanie pod muzyke flume
                if($cash>=5000000)
                  {
                    $query = mysqli_query($con,"UPDATE user SET pieniadze = $cash - 5000000, browar = 0, exp = $exp + 50000");

                    }
                    else
                    {
                    echo "<div class='item_info' style='background-color:red; color:white;'> <center><br><br>Nie masz wystarczających środków: $cash$
                        <br> <a href='main_screen.php'>Wróć do gry</a></div>";
                    }
                  }

                  if (isset($_POST['scream_arcy'])) { // submit odpowiedzialny za nienawidze was
                      if($cash>=10000000)
                      {
                        $query = mysqli_query($con,"UPDATE user SET pieniadze = $cash - 10000000, naglosnienie = $noise + 10000, exp = $exp + 100000, znajomi = $friends + 5");
                        }
                        else
                        {
                          echo "<div class='item_info' style='background-color:red; color:white;'> <center><br><br>Nie masz wystarczających środków: $cash$
                              <br> <a href='main_screen.php'>Wróć do gry</a></div>";
                        }
                    }
                    if($level < 400)
                    echo "<div class='item_info' style='text-align:center'><br><br>Odblokuj więcej akcji uzyskując 400 level.</div>";
                  }



?>
