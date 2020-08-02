<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Simple PHP App</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <style>body {margin-top: 40px; background-color: #333; background-image: url('assets/img/wallhaven-76r359.jpg')}</style>
        <link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet">
        <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    </head>

    <body>
        <div class="container">
            <div class="hero-unit">
                <h1>Simple PHP App</h1>
                <h2>Congratulations, code pipeline works!</h2>
                <?php
                    $dnsname = file_get_contents("http://169.254.169.254/latest/meta-data/public-hostname");
                    print "This page is served by: ";
                    print $dnsname;
                    print "</br>";                
                ?>
                <p>The server is running PHP version <?php echo phpversion(); ?>.</p>
            </div>
            <div class="hero-unit">
                <?php
                $ini= parse_ini_file("../shopxx.ini");
                $link = mysqli_connect($ini["db_host"],
                                       $ini["db_user"],
                                       $ini["db_pass"],
                                       "shopxx");
                
                if ($link == false) { 
                    die("ERROR: Could not connect. ".mysqli_connect_error()); 
                } 
                
                $sql = "SELECT * FROM customer"; 
                if ($res = mysqli_query($link, $sql)) { 
                    if (mysqli_num_rows($res) > 0) { 
                        echo "<table class='table'>"; 
                        echo "<tr>"; 
                        echo "<th>Firstname</th>"; 
                        echo "<th>Lastname</th>"; 
                        echo "<th>email</th>"; 
                        echo "<th>gender</th>"; 
                        echo "<th>status</th>"; 
                        echo "</tr>"; 
                        while ($row = mysqli_fetch_array($res)) { 
                            echo "<tr>"; 
                            echo "<td>".$row['first_name']."</td>"; 
                            echo "<td>".$row['last_name']."</td>"; 
                            echo "<td>".$row['email']."</td>"; 
                            echo "<td>".$row['gender']."</td>"; 
                            echo "<td>".$row['status']."</td>"; 
                            echo "</tr>"; 
                        }
                        echo "</table>"; 
                        mysqli_free_result($res); 
                    } 
                    else { 
                        echo "No matching records are found."; 
                    } 
                } 
                else { 
                    echo "ERROR: Could not able to execute $sql. ".mysqli_error($link); 
                } 
                mysqli_close($link); 
                ?> 
            </div>
            <div class="hero-unit">
            <?php
            function monte_carlo_pi($n){
                $m=0;
                for($i=0;$i<$n;$i++){
                    $x = mt_rand() / mt_getrandmax();
                    $y = mt_rand() / mt_getrandmax();
                    if(pow($x, 2) + pow($y, 2) <= 1){
                        $m = $m +1;
                    }
                }
                return 4 * $m/$n;
            }
            print "Pi from 10000 tries: ";
            print monte_carlo_pi(10000);
            print "</br>";
            print "Pi from 1000000 tries: ";
            print monte_carlo_pi(1000000);
            print "</br>";
            ?>
            </div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </body>

</html>
