<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
$link=new mysqli('localhost','root','','onlinevote');
if(!$link){
	die("Connection failed");
}
?>

<?php
function isDateInRange($startDate, $endDate) {
    // Convert dates to timestamps
    $dateToCheck=date("Y-m-d");
    #echo $dateToCheck;
    #echo $endDate;
    $startDateTS = strtotime($startDate);
    $endDateTS = strtotime($endDate);
    $dateToCheckTS = strtotime($dateToCheck);
    /* echo $startDateTS."__";
    echo $endDateTS."__";
    echo $dateToCheckTS;
    echo $dateToCheckTS-$startDateTS; */
    // Check if date to check falls between start and end dates
    if ($dateToCheckTS >= $endDateTS) {
        return false;
    } else {

        return true;
    }
}
$date='SELECT * FROM votedates';
$result=$link->query($date);
$result=mysqli_fetch_assoc($result);
$start=$result['startdate'];
$end=$result['enddate'];
$res=$result['resultdate'];
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cardo:wght@700&family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Donegal+One&display=swap" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>

    <title>
        results
    </title>
    <center>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                background-image: url('wp.webp');
                background-position: cover;
                background-repeat: no-repeat;

                /*background-color: rgba(241, 173, 227, 0.288);*/
                margin: 2%;
                justify-content: center;
                font-family: 'Donegal One', serif;
                font-size: 6;
                background-size: 100% 150%;
            }

            .results {
                padding: 1px;
                flex-grow: 10;
                display: flex;
                flex-direction: row;
                text-align: center;


            }

            .btn {
                font-family: 'Donegal One', serif;
                width: 200px;
                height: 30px;
                font-size: 22px;
                background-color: white;
                border-style: hidden;
                color: black;
                cursor: pointer;
            }
            .link{
                text-decoration: none;
                color: black;
            }
            .btn:hover {
              background-color: greenyellow;
              text-decoration: underline;
            }

            #chart-container {
                width: 100%;
                height: auto;
            }

            .left img {
                /* width: 300px;
        height: 100px; */
                position: absolute;
                top: 2px;
                left: 2px;
                size: 50%;
                opacity: 0.5;
                margin-bottom: 10px;
            }
        </style>
</head>

<body>
    <div class="left">
        <img src="logo.png" alt="The Page is loading">
    </div>
    <table border="1px" align="center" height="15px">


        <div class="results">
            <?php
            $pin = $_POST['pin'];
            //echo $pin;
            $link = new mysqli('localhost', 'root', '', 'onlinevote');
            if (!$link) {
                die("Connection failed");
            } else {

                $check = "select * from candidate,candidatepin where pin='$pin' and candidate_id=Ccode";
                $check1 = $link->query($check);
                $take = $check1->fetch_assoc();
                if ($check1->fetch_assoc() == '') {
                    echo "<SCRIPT>
				alert('Vote has not been conducted here.')
				window.location.replace('enter.php');
			</SCRIPT>";
                }
                if(isDateInRange($start,$res)){
                    echo "<script>alert('RESULT IS NOT OUT YET.');
                    window.location.replace('index.php');
                    </script>";
                }
                $check1 = $link->query($check);
                //echo "<table border=1>";
                echo "<br><br>";
                echo "<tr>";
                echo "<th>CANDIDATE ID";
                echo "<th>CANDIDATE NAME";
                echo "<th>POLITICAL PARTY";
                echo "<th>POLITICAL PARTY SYMBOL";
                echo "<th>TOTAL VOTES RECEIVED";
                echo "</tr>";
                while ($take = $check1->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $take["CANDIDATE_ID"];
                    echo "<td>" . $take["CANDIDATE_NAME"];
                    echo "<td>" . $take["POLITICAL_PARTY"];
                    $img1 = $take['IMAGE'];
                    echo "<td><img src='./voterpic/$img1' height='100' width='150'>";
                    echo "<td>" . $take["VOTES_RECEIVED"];
                    echo "</tr>";
                }
                echo "</table>";
            }
            ?>
        </div>


        


        <?php
        $maxivote = "select * from candidate,candidatepin where votes_received=(select max(votes_received) from candidate,candidatepin where pin='$pin' and ccode=candidate_id) and pin='$pin' and ccode=candidate_id";
        $max1 = $link->query($maxivote);
        echo "<br>";
        echo "<table>";
        while ($detailCan = $max1->fetch_assoc()) {

            $img = $detailCan['IMAGE'];
            $img1 = $detailCan['Candidate_photo'];
            //echo "THE WINNER OF THE ELECTION IS:- ";
            echo '<tr><td><b><u><i> THE WINNER OF THE ELECTION IS:- </b> ' . $detailCan['CANDIDATE_NAME'] . '</u></i></td></tr></table>';
            echo '<br>';
            echo "<b>POLITICAL AFFILIATION SYMBOL: </b>";
            echo "<br><br>";
            echo "<img src='./canimage/$img' height='100' width='150'>";
            echo "<br>";
            echo "<br>";
            echo "<b>CANDIDATE PHOTO: </b>";
            echo "<br><br>";
            echo "<img src='./canimage/$img1' height='100' width='150'>";
            echo "<br><br>";
            echo "<b>POLITICAL PARTY AFFILIATION: </b>";
            echo '<tr><td><u>' . $detailCan['POLITICAL_PARTY'] . '</u></td></tr></table>';
            echo '<br><br>';
            echo "<b>TOTAL NUMBER OF VOTES RECEIVED:-  </b>";
            echo '<tr><td>' . $detailCan['VOTES_RECEIVED'] . '</td></tr></table>';
            echo '<br>';
            echo '<br>';
            echo '<br>';
            echo '</table>';
        }
        ?>
        <button class="btn"> <a class="link" href="index.php"> Thank You </a></button>
</body>

</html>