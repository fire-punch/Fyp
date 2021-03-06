<!DOCTYPE html>
<html lang="en">

<head>
    <title>seat</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://www.w3schools.com/w3css/4/w3.css">

    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link rel="stylesheet" href="css/seat_plan3.css">

</head>

<body class="w3-panel w3-black">



    <div class="show_screen" >
        <div class="screen">
            <p id="screen">screen</p>
        </div>
    </div>


    <div class="show_seat">

        <div class="seat_left">
            <script>
                var rows = "ABCDEFGHI";

                for (i = 0; i < rows.length; i++) {
                    // document.write('<div class="w3-center">');
                    for (j = 1; j <= 2; j++) {
                        document.write('<div class="seatbox" id="', rows.charAt(i), j, '"',
                            'onclick="toggle(this.id);"', '>',
                            rows.charAt(i), j, '</div>&nbsp&nbsp&nbsp');
                    }

                    // document.write('</div>');
                    document.write('<br>');
                }
            </script>
            
        </div>
        

        <div class="seat_left-1">
            <script>
                var rows = "ABCDEFGHI";

                for (i = 0; i < rows.length; i++) {
                    // document.write('<div class="w3-center">');
                    for (j = 3; j <= 6; j++) {
                        document.write('<div class="seatbox" id="', rows.charAt(i), j, '"',
                            'onclick="toggle(this.id);"', '>',
                            rows.charAt(i), j, '</div>&nbsp&nbsp&nbsp');
                    }

                    // document.write('</div>');
                    document.write('<br>');
                }
            </script>
        </div>

        



        <div class="seat_center">
            <script>
                var rows = "ABCDEFGHI";

                for (i = 0; i < rows.length; i++) {
                    // document.write('<div class="w3-center">');
                    for (j = 7; j <= 9; j++) {
                        document.write('<div class="seatbox" id="', rows.charAt(i), j, '"',
                            'onclick="toggle(this.id);"', '>',
                            rows.charAt(i), j, '</div>&nbsp&nbsp&nbsp');
                    }

                    // document.write('</div>');
                    // document.write('<br>');
                }
            </script>
       
        </div>
    </div>
    <hr style="width: 500px; margin:auto">
    <br>
    <div class="seat-status">
        <div class="status-1">
            <div class="sample-1"></div>
            <p>Available</p>
        </div>
        <div class="status-2">
            <div class="sample-2"></div>
            <p>Sold</p>
        </div>
        <div class="status-3">
            <div class="sample-3"></div>
            <p>Selected</p>
        </div>

    </div>
    <!-- action="change_seat.php" -->
    <!-- action="payment.php" -->

    <?php
            $movie = $_GET["movie"];
            $house = $_GET["house"];
            $seatID = $_GET["seatID"];
            $date = $_GET["date"];
            $startTime = $_GET["startTime"];
            $endTime = $_GET["endTime"];
            $branchSeatID = $_GET["branchSeatID"];
            $branchID = $_GET["branchID"];

    ?>
    <center>
        <form class="form1" id="form1" name="form1" method="post" action="payment.php" >
            <p>Selected seats : <span class="selectedSeatsID" id="selectedSeatsID"></span></p>
            <input type="" name="seatsInForm" id="seatsInForm" style="display: none;"><br><br>
            <!-- <input type="" id="result"><br><br> -->
            <input class="next-btn" type="submit" id="submit" value="Confirm">

            <div style="display: none;">
            <input type="text" name="movie" value="<?php echo $movie?>">
            <input type="text" name="house" value="<?php echo $house?>">
            <input type="text" name="seatID" value="<?php echo $seatID?>">
            <input type="text" name="date" value="<?php echo $date?>">
            <input type="text" name="startTime" value="<?php echo $startTime?>">
            <input type="text" name="endTime" value="<?php echo $endTime?>">
            <input type="text" name="branchSeatID" value="<?php echo $branchSeatID?>">
            <input type="text"  name="branchID" value="<?php echo $branchID?>">
            <br>
        </div>
        </form>
    </center>
    <!-- php -->
    <table border="1" id="seatTable">
        <tr>
            <th>Seat ID</th>
            <th>Status</th>

        </tr>
        <?php
            // var_dump($_GET);
            $movie = $_GET["movie"];
            $house = $_GET["house"];
            $seatID = $_GET["seatID"];
            $date = $_GET["date"];
            $startTime = $_GET["startTime"];
            $endTime = $_GET["endTime"];
            $branchSeatID = $_GET["branchSeatID"];
            $branchID = $_GET["branchID"];
            // echo $movie;

            $conn = mysqli_connect("127.0.0.1", "root", "", "fypdb")
            or die(mysqli_connect_error());
            $SQL = "SELECT seatID, position FROM house_record WHERE 
                        movie = '$movie' AND
                        house = '$house' AND
                        date = '$date' AND 
                        StartTime = '$startTime' AND 
                        branchID = '$branchID' ";

            $rs = mysqli_query($conn, $SQL);
            while ($rc = mysqli_fetch_assoc($rs)){
            extract($rc);
                echo "<tr>
                <td>$seatID</td>
                <td>$position</td>

            </tr>";
            }
            // var_dump($rc);
            mysqli_free_result($rs);
            mysqli_close($conn);
        ?>
    </table>
    <!-- click seat -->
    <script>
        var selectedseats = [];

        // function restoreColor(seatId) {
        //     var a = selectedseats.indexOf(seatId);
        //     if (a == -1)
        //         document.getElementById(seatId).style.backgroundColor = 'gray';
        //     else
        //         document.getElementById(seatId).style.backgroundColor = 'green';
        // }



        function toggle(seatId) {
            var a = selectedseats.indexOf(seatId);
            if (a == -1)
                add(seatId);
            else
                cancel(seatId);
        }

        function add(seatId) {
            if (selectedseats.length >= 4) {
                alert("You can not Select more than 4 seat !!!");
            }else{
                selectedseats.push(seatId);
                updateSelectedSeats();
                document.getElementById(seatId).style.color = 'black';
                document.getElementById(seatId).style.backgroundColor = 'rgb(102, 240, 84)';
            // document.getElementById(seatId).style.textDecoration = 'line-through';
            }
        }

        function cancel(seatId) {
            var a = selectedseats.indexOf(seatId);
            selectedseats.splice(a, 1);
            updateSelectedSeats();
            document.getElementById(seatId).style.color = 'white';
            document.getElementById(seatId).style.backgroundColor = 'gray';
            document.getElementById(seatId).style.textDecoration = '';
        }

        function updateSelectedSeats() {
            var s = "";
            selectedseats.sort();
            for (x of selectedseats) {
                s += x + ' ';
            }
            document.getElementById('selectedSeatsID').innerHTML = s;
            document.getElementById('seatsInForm').value = s;
        }

        $(document).ready(function () {
            $("#submit").click(function () {
                $.post($("#form1").attr("action"),
                    $('#seatsInForm').val(JSON.stringify(selectedseats)),
                    //$("#myForm :input").serializeArray(), 
                    function (info) {
                        $("#result").html(info);
                    });
            });

            $("#myForm").submit(function () {
                return false;
            });

        });
    </script>

    <!-- check seat -->
    <script>
        var seatRow = "ABC";
        var tableRow = document.getElementById("seatTable").rows.length;
        var countRecord = tableRow - 1; // document.getElementById("A1").innerHTML = countRecord;

        var seatRowA = "A";
        var seatRowB = "B";
        var seatRowC = "C";
        var seatRowD = "D";
        var seatRowE = "E";
        var seatRowF = "F";
        var seatRowG = "G";
        var seatRowH = "H";
        var seatRowI = "I";

        var countA = 1;
        var countB = 10;
        var countC = 19;
        var countD = 28;
        var countE = 37;
        var countF = 46;
        var countG = 55;
        var countH = 64;
        var countI = 73;

        window.onload = function check() {


            //A
            for (x = 1; x <= 9; x++) {
                if (document.getElementById("seatTable").rows[countA].cells[1].innerHTML == '') {

                    seatRowA = seatRowA + x;
                    document.getElementById(seatRowA).style.backgroundColor = 'gray';
                    document.getElementById(seatRowA).style.cursor = "pointer";
                    seatRowA = "A";
                    countA++;

                } else {
                    seatRowA = seatRowA + x;
                    // document.getElementById(seatRowA).style.backgroundColor = 'red';
                    document.getElementById(seatRowA).id = 'occupied';
                    seatRowA = "A";
                    countA++;
                }

            }

            // B
            for (y = 1; y <= 9; y++) {
                if (document.getElementById("seatTable").rows[countB].cells[1].innerHTML == '') {

                    seatRowB = seatRowB + y;
                    document.getElementById(seatRowB).style.backgroundColor = 'gray';
                    document.getElementById(seatRowB).style.cursor = "pointer";
                    seatRowB = "B";
                    countB++;

                } else {
                    seatRowB = seatRowB + y;
                    // document.getElementById(seatRowB).style.backgroundColor = 'red';
                    document.getElementById(seatRowB).id = 'occupied';
                    seatRowB = "B";
                    countB++;
                }

            }

            //C
            for (z = 1; z <= 9; z++) {
                if (document.getElementById("seatTable").rows[countC].cells[1].innerHTML == '') {

                    seatRowC = seatRowC + z;
                    document.getElementById(seatRowC).style.backgroundColor = 'gray';
                    document.getElementById(seatRowC).style.cursor = "pointer";
                    seatRowC = "C";
                    countC++;

                } else {
                    seatRowC = seatRowC + z;
                    // document.getElementById(seatRowC).style.backgroundColor = 'red';
                    document.getElementById(seatRowC).id = 'occupied';
                    seatRowC = "C";
                    countC++;
                }

            }

            //D
            for (z = 1; z <= 9; z++) {
                if (document.getElementById("seatTable").rows[countD].cells[1].innerHTML == '') {

                    seatRowD = seatRowD + z;
                    document.getElementById(seatRowD).style.backgroundColor = 'gray';
                    document.getElementById(seatRowD).style.cursor = "pointer";
                    seatRowD = "D";
                    countD++;

                } else {
                    seatRowD = seatRowD + z;
                    // document.getElementById(seatRowC).style.backgroundColor = 'red';
                    document.getElementById(seatRowD).id = 'occupied';
                    seatRowD = "D";
                    countD++;
                }

            }

            //E
            for (z = 1; z <= 9; z++) {
                if (document.getElementById("seatTable").rows[countE].cells[1].innerHTML == '') {

                    seatRowE = seatRowE + z;
                    document.getElementById(seatRowE).style.backgroundColor = 'gray';
                    document.getElementById(seatRowE).style.cursor = "pointer";
                    seatRowE = "E";
                    countE++;

                } else {
                    seatRowE = seatRowE + z;
                    // document.getElementById(seatRowC).style.backgroundColor = 'red';
                    document.getElementById(seatRowE).id = 'occupied';
                    seatRowE = "E";
                    countE++;
                }

            }

            //F
            for (z = 1; z <= 9; z++) {
                if (document.getElementById("seatTable").rows[countF].cells[1].innerHTML == '') {

                    seatRowF = seatRowF + z;
                    document.getElementById(seatRowF).style.backgroundColor = 'gray';
                    document.getElementById(seatRowF).style.cursor = "pointer";
                    seatRowF = "F";
                    countF++;

                } else {
                    seatRowF = seatRowF + z;
                    // document.getElementById(seatRowC).style.backgroundColor = 'red';
                    document.getElementById(seatRowF).id = 'occupied';
                    seatRowF = "F";
                    countF++;
                }

            }

            //G
            for (z = 1; z <= 9; z++) {
                if (document.getElementById("seatTable").rows[countG].cells[1].innerHTML == '') {

                    seatRowG = seatRowG + z;
                    document.getElementById(seatRowG).style.backgroundColor = 'gray';
                    document.getElementById(seatRowG).style.cursor = "pointer";
                    seatRowG = "G";
                    countG++;

                } else {
                    seatRowG = seatRowG + z;
                    // document.getElementById(seatRowC).style.backgroundColor = 'red';
                    document.getElementById(seatRowG).id = 'occupied';
                    seatRowG = "G";
                    countG++;
                }

            }

            //H
            for (z = 1; z <= 9; z++) {
                if (document.getElementById("seatTable").rows[countH].cells[1].innerHTML == '') {

                    seatRowH = seatRowH + z;
                    document.getElementById(seatRowH).style.backgroundColor = 'gray';
                    document.getElementById(seatRowH).style.cursor = "pointer";
                    seatRowH = "H";
                    countH++;

                } else {
                    seatRowH = seatRowH + z;
                    // document.getElementById(seatRowC).style.backgroundColor = 'red';
                    document.getElementById(seatRowH).id = 'occupied';
                    seatRowH = "H";
                    countH++;
                }

            }

            //I
            for (z = 1; z <= 9; z++) {
                if (document.getElementById("seatTable").rows[countI].cells[1].innerHTML == '') {

                    seatRowI = seatRowI + z;
                    document.getElementById(seatRowI).style.backgroundColor = 'gray';
                    document.getElementById(seatRowI).style.cursor = "pointer";
                    seatRowI = "I";
                    countI++;

                } else {
                    seatRowI = seatRowI + z;
                    // document.getElementById(seatRowC).style.backgroundColor = 'red';
                    document.getElementById(seatRowI).id = 'occupied';
                    seatRowI = "I";
                    countI++;
                }

            }

        }
    </script>


</body>

</html>