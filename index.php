<!DOCTYPE html>
<head>
	<title>PWA projekt</title>

    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <style>
        body{background-color: rgb(226, 226, 226);}
    </style>
</head>
<body>
    <header>
        <hr />
        <h1>B.Z.</h1>
        <nav>
            <ul>
                <a href="index.php"><li>HOME</li></a>
                <a href="sport.php"><li>BERLIN-SPORT</li></a>
                <a href="kultura.php"><li>KULTUR UND SHOW</li></a>
                <a href="administracija.php"><li>ADMINISTRACIJA</li></a>
            </ul>
        </nav>
    </header>
    
    <div class="centriranje">
        <section class="berlinSport">
            <div class="container">
                <div class="row">
                    <h2><a href="sport.php">BERLIN-SPORT &gt;</a></h2>
                    <?php
                    include 'connect.php';
                    define('UPLPATH', 'img/');

                    $query = "SELECT *
                    FROM vijesti
                    WHERE archive = 0 AND category='sport' LIMIT 3";
                    
                    $result = mysqli_query($dbc, $query) or die("Error querying database");
            
                    if ($result) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<article class='col-12 col-sm-12 col-md-12 col-lg-4 text-left'>";
                            echo "<img src='" . UPLPATH . $row["photo"] . "' alt='slika'>";
                            echo "<h5>";
                            echo "<a href='clanak.php?id=" . $row['id'] . "'>";
                            echo $row["title"];
                            echo "</h5>";
                            echo "<h3>" . $row["about"] . "</h3> <br />";
                            echo "</a>";
                            echo "</article>";
                        }
                    } 
                    else{
                        echo "Ne može se pristupiti podacima", mysqli_error($dbc);
                    }

                    ?>
                </div>
            </div>
        </section>

        <section class="kulturUndShow">
            <div class="container">
                <div class="row">
                    <h2><a href="kultura.php">KULTUR UND SHOW ></a></h2>
                    <?php
                    $query = "SELECT *
                    FROM vijesti
                    WHERE archive = 0 AND category='kultura' LIMIT 3";
                    
                    $result = mysqli_query($dbc, $query) or die("Error querying database");
            
                    if ($result) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<article class='col-12 col-sm-12 col-md-12 col-lg-4 text-left'>";
                            echo "<img src='" . UPLPATH . $row["photo"] . "' alt='slika'>";
                            echo "<h5>";
                            echo "<a href='clanak.php?id=" . $row['id'] . "'>";
                            echo $row["title"];
                            echo "</h5>";
                            echo "<h3>" . $row["about"] . "</h3> <br />";
                            echo "</a>";
                            echo "</article>";
                        }
                    } 
                    else{
                        echo "Ne može se pristupiti podacima", mysqli_error($dbc);
                    }
                ?>
                </div>
            </div>
        </section>
    </div>
    
    <footer>
        <p>Weitere Online-Angebote der Axel Springer SE:</p>
        <div></div>
    </footer>
</body>
</html>