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
                <h2>Congratulations</h2>
                <p>The server is running PHP version <?php echo phpversion(); ?>.</p>
            </div>
            <div class="hero-unit">
                <?php  
                $link = mysqli_connect("mysql-shopxx.czagvy5trygi.us-west-2.rds.amazonaws.com", "admin", "", "shopxx"); 
                
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
            function fibonacci_seq($n){
                if($n<1){
                    return -1;
                }
                $ret = array();
                $ret[1]=$ret[2]=1;
                for($i=3;$i<=$n;$i++){
                    $ret[$i]=$ret[$i-1]+$ret[$i-2];
                    print $ret[$i];
                    print "</br>";
                }
                return $ret[$n];
            }
            fibonacci_seq(100)
            ?>
            </div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </body>

</html>
