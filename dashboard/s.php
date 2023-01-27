 <?php  
 $connect = mysqli_connect("localhost", "root", "", "barangaymahabangparang");  
 $query ="SELECT * FROM resident ORDER BY resident_id DESC";  
 $result = mysqli_query($connect, $query);  
 ?>  