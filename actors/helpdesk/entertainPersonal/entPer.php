<?php

    $cars = array("Volvo", "BMW", "Toyota");
    $i = 1;

    // session_start();
    // $user_id = $_SESSION['user_id'];
    $servername = 'localhost';
    $username = 'root';
    $password = "";
    $dbname = "demo_db";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if($conn == false){
        echo "CONN FAILED";
    }

    $sql = "SELECT * FROM change_requests";
    $result = mysqli_query($conn, $sql);

    if(mysqli_query($conn, $sql)){
        echo "Entertain Personal Information Change Requests";
    } else{
        echo "Query Failed";
    }

?>

<html>


<head>
    <title>Entertain Personal Information Change Requests</title>
</head>

<body>
    <table>
        <tr>
            
            <th>Student ID</th>
            <!-- 1 is for address, 2 is for contact -->
            <th>Request Type</th> 
            <th>Data</th>
            <th>Process</th>
        </tr>

        <?php 
            while($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td > <?php echo $row['student_id']; ?> </td>
                    <td > 
                        <?php 
                            if($row['reference_no'] == '1' ){ echo "Address";} 
                            else {echo "Contact";}   
                        ?> 
                    </td>
                    <td > <?php echo $row['info']; ?> </td>

                    <td>
                    
                        <form id = "accept" action="action.php" method = "POST">
                            <input type="submit"  value = "Accept"> 
                            <input type="hidden" name = "student_ID" value = "<?php echo $row['student_id']; ?>" >
                            <input type="hidden" name = "reference_no" value = "<?php echo $row['reference_no']; ?>">
                            <input type="hidden" name = "info" value = "<?php echo $row['info']; ?>" >
                        </form>

                    </td>
                </tr>  
                  
        <?php } ?>
    </table>
</body>
</html>




