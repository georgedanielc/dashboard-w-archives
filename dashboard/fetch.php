
<?php

//fetch.php

$connect = new PDO("mysql:host=localhost;dbname=barangaymahabangparang", "root", "");

if($_POST["query"] != '')
{
 $search_array = explode(",", $_POST["query"]);
 $search_text = "'" . implode("', '", $search_array) . "'";
 $query = "
 SELECT * FROM audittrail 
 WHERE adminname IN (".$search_text.") 
 ORDER BY logno DESC
 ";
}
else
{
 $query = "SELECT * FROM audittrail ORDER BY logno DESC";
}

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '';

if($total_row > 0)
{
 foreach($result as $row)
 {
	 
  $output .= '
  <tr>
   <td>'.$row["adminname"].'</td>
   <td>'.$row["task"].'</td>
   <td>'.$row["action"].'</td>
   <td>'.$row["date"].'</td>

  </tr>
  ';
 }
}
else
{
 $output .= '
 <tr>
  <td colspan="5" align="center">No Data Found</td>
 </tr>
 ';
}

echo $output;


?>
