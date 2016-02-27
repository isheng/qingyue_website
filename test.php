<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
   </head>
<?php
    require_once "config.inc.php";
    $query="select client_names,date,machine_type,warranty_time from orders";
    $result=mysql_query($query,$hd);

    $i = 0;
    while ($row=mysql_fetch_row($result)) {
        if ( $i > 5)
            break;
        $i++;
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td> $value </td>";
        }
        echo "</tr>";
    }
?>

</html>