<?php
$connection = new mysqli('localhost', 'root', '', 'bartol_kosovic');
if($connection === false){
  die("ERROR: Could not connect. " . mysqli_connect_error());
}
if($result = mysqli_query($connection, "SELECT * FROM ducan")){
  if(mysqli_num_rows($result) > 0){
    echo "<table>";
    echo "<tr>";
    echo "<th>idDucan</th>";
    echo "<th>ime</th>";
    echo "<th>cijena</th>";
    echo "<th>velicina</th>";
    echo "</tr>";
  }
}
while($row = mysqli_fetch_array($result)){
  echo "<tr>";
  echo "<td>" . $row['idDucan'] . "</td>";
  echo "<td>" . $row['ime'] . "</td>";
  echo "<td>" . $row['cijena'] . "</td>";
  echo "<td>" . $row['velicina'] . "</td>";
  echo "<tr>";
}
echo "</table>";
mysqli_free_result($result);

echo "<br>";

if($result = mysqli_query($connection, "SELECT * FROM lager")){
  if(mysqli_num_rows($result) > 0){
    echo "<table>";
    echo "<tr>";
    echo "<th>idLager</th>";
    echo "<th>idDucan</th>";
    echo "<th>kolicina</th>";
    echo "</tr>";
  }
}
while($row = mysqli_fetch_array($result)){
  echo "<tr>";
  echo "<td>" . $row['idLager'] . "</td>";
  echo "<td>" . $row['idDucan'] . "</td>";
  echo "<td>" . $row['kolicina'] . "</td>";
  echo "<tr>";
}
echo "</table>";
mysqli_free_result($result);
?>
