<?php
include 'connect.php';
?>

<!DOCTYPE html>
<head>
	<title>PWA projekt</title>

    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

    <style>
        body{background-color: rgb(226, 226, 226);}
        form{padding: 20px; text-align:left; width: 100%;}
        form .error{color: red; display: block; text-align: left; border-color: red;}
        input, textarea{text-align:left; padding: 5px;}
        button{padding: 1px 8px; border: 1px solid #595454;}
        .input-text{margin-left: -5px}
    </style>
</head>
<body>
    <script type="text/javascript">
        $(function() {
            $("form[name='forma']").validate({
            rules: {
                username: {
                    required: true,
                },
                password: {
                    required: true,
                },
                passwordConfirm:{
                    required: true,
                },
            },
            messages: {
                username: {
                    required: "Potrebno je upisati korisničko ime",
                },
                password: {
                    required: "Potrebno je upisati lozinku",
                },
                passwordConfirm: {
                    required: "Potrebno je ponoviti lozinku",
                },
            },
            submitHandler: function(form) {
                form.submit();
            }
            });
        });
    </script>

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

    <?php
    if (isset($_POST['prijava'])) {
        $prijavaImeKorisnika = $_POST['username'];
        $prijavaLozinkaKorisnika = $_POST['password'];
        $sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnik
        WHERE korisnicko_ime = ?";
        $stmt = mysqli_stmt_init($dbc);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
        }
        mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika, $levelKorisnika);
        mysqli_stmt_fetch($stmt);
        if (password_verify($_POST['password'], $lozinkaKorisnika) && mysqli_stmt_num_rows($stmt) > 0) {
            $uspjesnaPrijava = true;
            if($levelKorisnika == 1) {
                $admin = true;
                $_SESSION['$username'] = $imeKorisnika;
                $_SESSION['$level'] = $levelKorisnika;
                echo '
                <div id="gumbi" class="col-12 col-sm-12 col-md-12 col-lg-12 text-right">
                    <br />
                    <p class="col-12 col-sm-12 col-md-12 col-lg-12 text-center"><p>Dobrodošli <b>' . $_SESSION['$username'] . '</b> vaša razina je <b>' . $_SESSION['$level'] . '</b>, vi ste administrator!</p>
                    <button type="submit" name="unos" value="unos" class="col-12 col-sm-12 col-md-12 col-lg-5"><a href="unos.php">Unesite nove članke</a></button>
                    <br />
                    <button type="submit" name="unos" value="unos" class="col-12 col-sm-12 col-md-12 col-lg-5"><a href="skripta.php">Uredite članke</a></button>
                    <br />
                    <br />
                </div>';
                    
                    
                if (isset($_POST["submit"])) {
                    $title = $_POST["title"];
                    $about = $_POST["about"];
                    $content = $_POST["content"];
                    $picture = $_FILES["pphoto"]["name"];
                    $category = $_POST["category"];
                    if(isset($_POST["archive"])){
                        $archive=1;
                    }
                    else{
                        $archive=0;
                    }

                    $target_dir = "img/".$picture;
                    move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);

                    $query = "SELECT * FROM vijesti";
                    $result = mysqli_query($dbc, $query) or die("Error");

                    $sql = "INSERT INTO vijesti (title, about, content, photo, category, archive) VALUES (?,?,?,?,?,?);";

                    $stmt=mysqli_stmt_init($dbc);

                    if (mysqli_stmt_prepare($stmt, $sql)){
                        mysqli_stmt_bind_param($stmt, 'ssssss', $title, $about, $content, $picture, $category, $archive);
                        mysqli_stmt_execute($stmt);
                    }
                    
                echo "Vaši podaci su unešeni u sustav! <br /><br />";
                echo "</form>";
                }
            }

            elseif($levelKorisnika == 0) {
                $_SESSION['$username'] = $imeKorisnika;
                $_SESSION['$level'] = $levelKorisnika;
                $admin = false;
                echo '
                <div id="gumbi" class="col-12 col-sm-12 col-md-12 col-lg-12 text-right">
                    <br />
                    <p class="col-12 col-sm-12 col-md-12 col-lg-12 text-center"><p>Dobrodošli <b>' . $_SESSION['$username'] . '</b> vaša razina je <b>' . $_SESSION['$level'] . '</b>!</p>
                    <button type="submit" name="unos" value="unos" class="col-12 col-sm-12 col-md-12 col-lg-5"><a href="unos.php">Unesite nove članke</a></button>
                    <br />
                    <br />
                </div>';
                    
                if (isset($_POST["submit"])) {
                    $title = $_POST["title"];
                    $about = $_POST["about"];
                    $content = $_POST["content"];
                    $picture = $_FILES["pphoto"]["name"];
                    $category = $_POST["category"];
                    if(isset($_POST["archive"])){
                        $archive=1;
                    }
                    else{
                        $archive=0;
                    }

                    $target_dir = "img/".$picture;
                    move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);

                    $query = "SELECT * FROM vijesti";
                    $result = mysqli_query($dbc, $query) or die("Error");

                    $sql = "INSERT INTO vijesti (title, about, content, photo, category, archive) VALUES (?,?,?,?,?,?);";

                    $stmt=mysqli_stmt_init($dbc);

                    if (mysqli_stmt_prepare($stmt, $sql)){
                        mysqli_stmt_bind_param($stmt, 'ssssss', $title, $about, $content, $picture, $category, $archive);
                        mysqli_stmt_execute($stmt);
                    }
                echo "Vaši podaci su unešeni u sustav! <br /><br />";
                echo "</form>";
                }
            }
        }

            else {
                $uspjesnaPrijava = false;
                echo "<p style='padding: 183px 0px;'>Unijeli ste pogreško korisničko ime ili lozinku!</p>";
            }
    }
                   
    elseif (!isset($_POST['prijava'])){
        echo ' 
            <form name="forma" enctype="multipart/form-data" method="POST" action="">
                <label for="username">Korisničko ime</label>
                <br/>
                <input name="username" type="text" required class="col-12 col-sm-6 col-md-4 col-lg-5"/>
                <br/>

                <label for="password">Lozinka</label>
                <br/>
                <input name="password" type="password" required class="col-12 col-sm-6 col-md-4 col-lg-5"/>
                <br/>

                <label>Potvrda lozinke</label>
                <br />
                <input name="passwordConfirm" class="col-12 col-sm-6 col-md-4 col-lg-5" type="password"/>
                <br />
                <br />

                <button type="submit" name="prijava" value="Prihvati" class="col-12 col-sm-4 col-md-2 col-lg-3">Prijava</button>
                <br />
                <br />
                <p class="text-left">Kreirajte novi korisnički račun?</p>
                <button type="submit" name="registracija" value="Prihvati" class="col-12 col-sm-4 col-md-2 col-lg-3"><a href="registracija.php">Registracija</a></button>
            </form>';
        }

    mysqli_close($dbc);
    ?>
    </div>
    
    <footer>
        <p>Weitere Online-Angebote der Axel Springer SE:</p>
        <div></div>
    </footer>
</body>
</html>