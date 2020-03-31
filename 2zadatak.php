<?php
$link = mysqli_connect("localhost", "root", "", "classicmodels");
if($link === false){
  die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['queryTB']) && $_POST['queryTB'] != NULL){
  $insertedQuery = $_POST['queryTB'];
  $sql = $insertedQuery;
  if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      echo "<table>";echo "<tr>";
      echo "<th>customerNumber</th>";
      echo "<th>customerName</th>";
      echo "<th>contactLastName</th>";
      echo "<th>contactFirstName</th>";
      echo "</tr>";
      while($row = mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td>" . $row['customerNumber'] . "</td>";
        echo "<td>" . $row['customerName'] . "</td>";
        echo "<td>" . $row['contactLastName'] . "</td>";
        echo "<td>" . $row['contactFirstName'] . "</td>";
        echo "<tr>";
      }
      echo "</table>";
      mysqli_free_result($result);
    }
    else{
      echo "No records matching your query were found.";
    }
  }
    else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }
}
