<?php
session_start();
$link = new mysqli('localhost', 'root', '', 'onlinevote');
if (!$link) {
    die("Connection failed");
}
//echo "<script>alert('".$_SESSION['voter_name']."')</script>";

if ($_SESSION['voter_id'] == '') {
    header("Location:Login_Page.html");
}
// 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome to main voting page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Labrada&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lustria&display=swap" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IM+Fell+Double+Pica&display=swap" rel="stylesheet">
    
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            width: 100%;
            margin: 0%;
            height: 0%;
            background-color: #FBF8BE;
            background-image: url('votingbg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .candidatebox {
            /* border: 2px solid red; */
            margin: auto;
            /* width:180vh; */
            height: 260px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: row;

        }

        .list {
            padding: 20px;
            margin: 35px;
            width: 120px;

        }

        .CNAME {
            font-family: 'Libre Baskerville', serif;
            font-size: 20px;
            color: black;
            font-weight: 900;
            text-align: center;

        }

        .CNAME:hover {
            text-decoration: underline;
        }

        .DETAILSSHOW {
            font-family: 'Labrada', serif;
            font-size: 22px;
            border: 1px double rgb(169, 169, 169);
            text-align: center;
            color: black;
        }

        .DETAILSSHOW:hover {
            background-color: rgb(240, 255, 240);
            font-weight: bolder;
            color: maroon;
        }

        .detailswindow {
            margin: auto;
            height: 400px;
        }


        .CDETAILS {
            font-family: 'Lustria', serif;
            font-weight: bold;
            color: navy;
            font-size: 20px;
            display: relative;
            margin: auto;
            left: 100px;
            text-align: center;
        }

        .confirmbutton {
            position: absolute;
            align-items: center;
            /* border: 2px solid white; */
            margin: auto;
            top: 685px;
            height: 70px;
            width: 200px;
            left: 570px;
            background-color: transparent;
            border: 1px solid #266DB6;
            box-sizing: border-box;
            color: #00132C;
            font-family: 'Libre Baskerville', serif;
            font-size: 20px;
            font-weight: 700;
            line-height: 24px;
            padding: 16px 10px;
            /* position: relative; */
            text-decoration: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .confirmbutton:hover,
        .confirmbutton:active {
            outline: 0;
        }

        .confirmbutton:hover {
            background-color: transparent;
            cursor: pointer;
            font-weight: bold;
        }

        .confirmbutton:before {
            background-color: #D5EDF6;
            content: "";
            height: calc(100% + 3px);
            position: absolute;
            right: -7px;
            top: -9px;
            transition: background-color 300ms ease-in;
            width: 100%;
            z-index: -1;
        }

        .confirmbutton:hover:before {
            background-color: #6DCFF6;
        }


        a {
            font-family: 'IM Fell Double Pica', serif;
            font-size: 25px;
            display: flex;
            justify-content: center;
            /* padding: 10px 10px;
            margin: 10px 10px; */
            color: black;
            /* border: 2px solid green; */
            text-decoration: none;
        }

    

        /* .imageshape {
            height: 100px;
            width: 100px;
        } */
        .left {
        /* border: 2px solid red; */
        width: 50%;
        position: absolute;
        margin: 5px 5px;
        padding: 10px 10px;
        left: 2px;
        top: 2px;

    }
    /* .container {
            width: 100%;
            height: 100vh;
            /* background: rgb(91, 39, 39); 
            display: flex;
            align-items: center;
            justify-content: center;
        } */

        .btn {
            padding: 10px 60px;
            background: #fff;
            border: 0;
            /* outline: none; */
            cursor: pointer;
            font-size: 22px;
            font-weight: 500;
            border-radius: 30px;
        }

        .image {
            height: 100px;
            width: 100px;
        }

        .popup {
            width: 400px;
            background-color: white;
            border-radius: 6px;
            position: absolute;
            top: 0;
            left: 35%;
            transform: translate(-50%, -50%) scale(0.1);
            text-align: center;
            padding: 0 30px 30px;
            color: #333;
            visibility: hidden;
            transition: transform 0.4s, top 0.4s;
        }

        .open-popup {
            visibility: visible;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(1);

        }

        .popup img {
            width: 100px;
            margin-top: -50px;
            border-radius: 50%;
            box-shadow: 0 2px 5px rgba(0, 0, blue, 0.2);
        }

        .popup h2 {
            font-size: 38px;
            font-weight: 500px;
            margin: 30px 0 10px;
        }

        .popup button {
            width: 100%;
            margin-top: 50px;
            padding: 10px 10px;
            background-color: #6fd649;
            color: #fff;
            border: 0;
            outline: none;
            font-size: 18px;
            border-radius: 4px;
            cursor: pointer;
            box-shadow: 0 5px 5px rgba(0, 0, blue, 0.2);
        }

    .left img {
        width: 30%;
        opacity: 0.5;
    }
    .middle{
        font-family: 'Cinzel Decorative', cursive;
        font-size: 20px;
        color: brown;
        text-decoration: underline;
        position: absolute;
        left: 500px;
        margin-bottom: 10px;
    }

    #timer{
        position:absolute;
        border-right: 3px solid blue;
        /*border:2px solid black;*/
        top: 670px;
        left: 1200px;
    }

    #timer1{
        font-family:'IM Fell Double Pica',serif;
        font-weight: bold;
        border-left: 3px solid blueviolet;
        font-size: 30px;
        position: absolute;
        top: 660px;
        left: 940px;
    }
    </style>
</head>

<body>
<div class="left">
        <img src="logo.png" alt="The Page is loading">
    </div>
    <div class="middle">
        <h2><i> Voting Ballot </i></h2>
    </div>
    <div class="container">
        <div class="candidatebox">
            <!-- CODE FOR GETTING THE NAMES OF CANDIDATE -->
            <?php
            $pin = $_SESSION['pin_code'];
            $sql = "select * from `candidatepin` where pin='$pin'";
            $pincheck = $link->query($sql);
            while ($row = mysqli_fetch_assoc($pincheck)) {
                $c = $row['CCode'];
                $sql1 = "select * from `candidate` where CANDIDATE_ID='$c'";
                $detail = $link->query($sql1);
                $canrow = mysqli_fetch_assoc($detail);
            ?>
                <div class="list" id="name1">
                    <p class="CNAME"> <?php echo $canrow['CANDIDATE_NAME']; ?> </p>
                    <a class="DETAILSSHOW" href="./voting_page.php?ccode=<?php echo $c ?>" class="btn"> Click for Details</a>
                </div>
            <?php
            }

            ?>
        </div>



        <div class="detailswindow">
            <?php
            if ($_GET['ccode'] != '') {
                $c = $_GET['ccode'];
                $sql3 = "select * from candidate where CANDIDATE_ID='$c'";
                $candetails = $link->query($sql3);
                $detailCan = mysqli_fetch_assoc($candetails);
            ?>

                <div class="CDETAILS">
                <?php
                $img = $detailCan['IMAGE'];
                $img1 = $detailCan['Candidate_photo'];
                echo "Symbol of Political Affiliation: ";
                echo "<br>";
                echo "<img src='./canimage/$img' height='100' width='150'>";
                echo "<br>";
                echo "<br>";
                echo "Candidate Photo: ";
                echo "<br>";
                echo "<img src='./canimage/$img1' height='100' width='150'>";
                echo "<br>";
                echo "Candidate ID: ";
                echo '<tr><td>' . $detailCan['CANDIDATE_ID'] . '</td></tr></table>';
                echo '<br>';
                echo "Candidate Name: ";
                echo '<tr><td>' . $detailCan['CANDIDATE_NAME'] . '</td></tr></table>';
                echo '<br>';
                echo "Political Affiliation: ";
                echo '<tr><td>' . $detailCan['POLITICAL_PARTY'] . '</td></tr></table>';
                echo '<br>';
                echo "Candidate Age: ";
                echo '<tr><td>' . $detailCan['AGE'] . '</td></tr></table>';
                echo '<br>';
                echo "Gender: ";
                echo '<tr><td>' . $detailCan['GEN'] . '</td></tr></table>';
            } else {
                echo "<center><b>Select a voter to show details</center></b>";
            }
                ?>
                </div>
        </div>

        <div class="timerbox">
            <h1 id="timer"></h1>
            <p id="timer1"> Time left for voting:</p>
        </div>
        


             <?php
            if ($_GET['ccode'] != '') {
                $c = $_GET['ccode'];
                echo "<div class='container'>
                <button class='confirmbutton' type='submit' class='btn' onclick='openPopup()'> Confirm Vote </button>
                <div class='popup' id='popup'>
                    <img class='image' src='tick.jpg'>
                    <h2> Thank You!!</h2>
                    <p> Your Vote has submitted Successfully. Check the results on specified date. You may now log out.</p>
                    <a href='./increment_vote.php?ccode=$c'><button type='button' onclick='closePopup()'> Proceed </button></a>
                </div>
            </div>
            <script>
                let popup = document.getElementById('popup');
                function openPopup() {
                    popup.classList.add('open-popup');
                }
                function closePopup() {
                    popup.classList.remove('open-popup');
                }
            </script>";
            }
            else {
                echo "<a href='#' class='button-arounder'>Select a voter first</a>";
            }
            ?>
            </div>
        

        <script>
            let redirect_Page = () => {
                let startTime = localStorage.getItem('startTime');
                let remainingTime = localStorage.getItem('remainingTime');

                if (!startTime) {
                    // If there is no start time stored, set it to the current time and the remaining time to the total time
                    startTime = Date.now().toString();
                    remainingTime = 60; 
                    localStorage.setItem('startTime', startTime);
                    localStorage.setItem('remainingTime', remainingTime);
                } else {
                    // If there is a start time stored, calculate the elapsed time and remaining time
                    const elapsedTime = Date.now() - parseInt(startTime);
                    const elapsedSeconds = Math.floor(elapsedTime / 1000);
                    remainingTime = Math.max(60, 60 - elapsedSeconds);
                    localStorage.setItem('remainingTime', remainingTime);
                }

                let iCnt = remainingTime; // set the initial count to the remaining time
                let iTimerId = setInterval(function() {
                    iCnt--; // decrease counter by 1.
                    document.querySelector("#timer").innerHTML = iCnt;
                    if (iCnt === 0) {
                        // now, redirect page.
                        window.location.href = './logout.php';
                        clearInterval(iTimerId); // clear time interval.
                        localStorage.removeItem('startTime'); // remove the stored start time and remaining time
                        localStorage.removeItem('remainingTime');
                    } else {
                        localStorage.setItem('remainingTime', iCnt); // store the updated remaining time
                    }
                }, 1000);
            }
            redirect_Page()
        </script>

</body>

</html>