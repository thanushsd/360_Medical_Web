
<?php  

$conn=new mysqli("localhost","root","","360med");

$sql = "SELECT * FROM admit";  
           $result = mysqli_query($conn, $sql);  
           $json_array = array();  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $json_array[] = $row;  
           }  
           // echo '<pre>';  
           // print_r(json_encode($json_array));  
           // echo '</pre>';  
           echo json_encode($json_array);  
           ?>  

           ?>  

