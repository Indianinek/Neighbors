<?php
$user=mysqli_query($con,"SELECT * FROM `user`;"); // odczytanie zmiennych przypisanych do usera
  if (mysqli_num_rows($user) > 0) {
      while ($row = mysqli_fetch_assoc($user)) {
          $cash=$row['pieniadze'];
          $friends=$row['znajomi'];
          $beer=$row['browar'];
          $noise=$row['naglosnienie'];
          $exp=$row['exp'];
          $garbage=$row['smieci'];
          }
        }

        $level = 1;
        $multiplier = 1;
          for ($x = 0; $x < $exp; $x++) {
            $x=$x+(250*$multiplier);
            $level++;
            $multiplier++;
          }

?>
