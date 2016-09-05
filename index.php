<?php
  if (isset($_GET['rowlen']) && $_GET['rowlen'] > 0) {
    $numbers_per_row = $_GET['rowlen'];
  }
  else {
    $numbers_per_row = 10;
  }
  $previous = 0;
  $current = 1;
  $new_line = false;
  echo "<html><body>";
  if (isset($_GET['num'])) {
    $length_of_series = $_GET['num'];
    if ($length_of_series < 1 || $length_of_series > 1477) {
      echo "Error: The length of the Fibonacci sequence must be greater than zero and less than 1478.<br>";
      echo "<a href=\"index.php\">Go Back</a>";
    }
    else {
      for ($x = 1; $x <= $length_of_series; $x++) {
        if ($x == 1) {
          echo "0";
        }
        else {
          if ($new_line == false) {
            echo ", ".$current;      
          }
          else {
            echo $current;
          }
          $new_current = $previous + $current;
          $previous = $current;
          $current = $new_current;
        }       
        if ($x % $numbers_per_row == 0) {
          echo "<br>";
          $new_line = true;
        }
        else {
          $new_line = false;
        }  
      }
      echo "<a href=\"index.php\">Go Back</a>";
    }
  }
  else {
    echo "Input number of Fibonacci numbers to print: ";
    echo "<form method=\"get\" action=\"index.php\"><input type=\"number\" name=\"num\"><br>";
    echo "<input type=\"submit\" value=\"Submit\"></form>";
  }
  echo "</body></html>";
?>
