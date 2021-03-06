<?php
    $hostname = "127.0.0.1";
    $username = "root";
    $pwd = "";
    $db = "fyp_ticket";

    function getDBconnection(){
        global $hostname, $username, $pwd, $db;
        $conn = mysqli_connect($hostname, $username, $pwd, $db) or die(mysqli_connect_error()) or die(mysqli_connect_error());
        return $conn;
    }

    function closeDBconnection($conn){
        mysqli_close($conn);
    }

    function getHouseInfo(){
        $conn =  getDBconnection();
        $sql = "SELECT DISTINCT `StartTime`,`branchSeatID` FROM `house_record` WHERE `seatID` = 'A1' 
                    ORDER BY `house_record`.`StartTime` ASC";

        $rs1 = mysqli_query($conn,$sql) or die ('<div>SQL command fail</br>' + mysqli_error($conn) +  '</div>');
        $num = mysqli_num_rows($rs1);
        if($num == 0){
            echo "Number of records selected = $num <br>";
        }else{
            closeDBconnection($conn);
            return $rs1;
        }
        return $rs1;
    } 
?>

