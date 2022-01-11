
<?php


$roomname =$_GET['roomname'];
//Connecting database
include 'db.php';


// Execute SQL to check whwter room exists
$sql = "SELECT * FROM `rooms` WHERE roomname ='$roomname'";

$result = mysqli_query($connect, $sql);
if ($result) {
    // Check if room exists
    if (mysqli_num_rows($result)==0) {
        $message = "This room does not exist. Try creating a new one.";
        echo '<script language = "javascript">';
        // Change the url while deployment
        echo 'alert("'.$message.'");';
        echo 'window.location="'.$link.'/index.php";';
        echo '</script>';
    }
} else {
    echo "Error : ". mysqli_error($connect);
}
?>
<!-- Chatroom  HTML/CSS Code -->

<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <style>
    

  

    .cont {
        border: 2px solid #BCE6EB;
        background-color: #BCE6EB;
        border-radius: 20px;
        padding: 5px;
        margin: 10px auto;
        position: relative;
        word-wrap: break-word;
        color: #000C66;
        font-family: 'Inter', sans-serif;

    }

    .darker {
        border: 2px solid #F25287;
        background-color: #F25287;
        word-wrap: break-word;
        color: white;

    }

    .container::after {

        content: "";
        clear: both;
        display: table;

    }

   
    .scroll {

        height: 400px;
        overflow: auto;
        display: flex;
        flex-direction: column-reverse;

    }

    .time-right {
        float: right;
        color: #38555F;
    }

    .time-right2 {
        float: right;
        color: #ffff84;
    }
    </style>
   
</head>

<body>
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="http://localhost/chat">Chatroom</a>
        <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
        <span class="visually-hidden">Toggle navigation</span>
        <span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="http://localhost/chat">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="" style="color: rgba(0,0,0,0.55);font-weight: bold;">Github</a></li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">About Us</a>
                        <div class="dropdown-menu"><a class="dropdown-item" href="">Portfolio</a><a class="dropdown-item" href="">Blog</a></div>
                    </li>
                    <li class="nav-item"></li>
                </ul>
            </div>
        </div>
    </nav>

   
      
    <main class="page landing-page" style="filter: blur(0px);">
    
    <section class="clean-block clean-hero" style="color: rgba(9,162,255,0);background: url(&quot;assets/img/punchman.jpg&quot;), rgb(255,255,255);filter: blur(0px);opacity: 1;border-color: rgba(9,162,255,0);border-top-color: rgba(9,;border-right-color: 162,;border-bottom-color: 255,;border-left-color: 0.85);background-size: contain, auto;height: 327px;margin-top: -22px;">
        <div class="text" style="width: 698.163px;height: 497.6px;">
        <br>
    
    <br>
    <div class="scroll" style=" background-color: LightGray; color: black;">
        <div class="container" >


        </div>
    </div>
    <br>
    <br>
        
        <input type="text" class="form-control" name="usermsg" id="usermsg" style="width: 431.6px;margin: 73px;margin-right: 68px;margin-bottom: 16px;height: 43px;margin-top: 24px;"
            placeholder="Add message"><br>
        <button class="btn btn-outline-light btn-lg" name="submitmsg" id="submitmsg"
            style="background: var(--bs-dark);border-color: rgb(9,132,255);color: var(--bs-yellow);">Send</button>
       
    </div>
        
        
    </section>
   
</main>
        
 

    
    
    <footer class="page-footer dark">
        <div class="footer-copyright">
            <p>Made By Paritosh kumar</p>
        </div>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <script type="text/javascript">
    // Check for new messages every 0.5 millisecond
    setInterval(runFunction, 500);

    function runFunction() {
        $.post("htconnect.php", {
                room: '<?php echo $roomname ?>',  ip: '<?php echo $_SERVER['REMOTE_ADDR'] ?>'
            },
            function(data, status) {
                document.getElementsByClassName('scroll')[0].innerHTML = data;
            }
        )
    }


    // If form is submitted Using Enterkey
    var input = document.getElementById("usermsg");
    input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("submitmsg").click();
        }
    });


    $("#submitmsg").click(function() {
        var clientmsg = $("#usermsg").val();
        $.post("postmessage.php", {
            text: clientmsg,
            room: '<?php echo $roomname ?>',
            ip: '<?php echo $_SERVER['REMOTE_ADDR'] ?>'
        }, function(data, status) {
            document.getElementsByClassName('scroll')[0].innerHTML = data;
        });
        $("#usermsg").val("");
        return false;
    });

    
    </script>
</body>

</html>