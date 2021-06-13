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
        button{padding: 1px 8px; border: 1px solid #595454; margin-bottom:5px;}
        .input-text{margin-left: -5px}
    </style>

    <script type="text/javascript">
        $(function() {
            $("form[name='forma']").validate({
            rules: {
                ime: {
                    required: true,
                },
                prezime: {
                    required: true,
                },
                username: {
                    required: true,
                },
                password: {
                    required: true,
                },
                passwordConfirm:{
                    required: true,
                }
            },
            messages: {
                ime: {
                    required: "Potrebno je upisati ime",
                },
                prezime: {
                    required: "Potrebno je upisati korisničko prezime",
                },
                username: {
                    required: "Potrebno je upisati korisničko ime",
                },
                password: {
                    required: "Potrebno je upisati lozinku",
                },
                passwordConfirm: {
                    required: "Potrebno je ponoviti lozinku",
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
            });
        });
    </script>

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
        <div id="gumbi" class='col-12 col-sm-12 col-md-12 col-lg-12 text-right'>
        </div>

        <form name="forma" enctype="multipart/form-data" method="POST" action="">
            <label for="ime">Ime</label>
            <br/>
            <input class='col-12 col-sm-6 col-md-4 col-lg-5' name="ime" type="text"/>
            <br/>  

            <label for="prezime">Prezime</label>
            <br/>
            <input class='col-12 col-sm-6 col-md-4 col-lg-5' name="prezime" type="text"/>
            <br/>

            <label for="username">Korisničko ime</label>
            <br/>
            <input class='col-12 col-sm-6 col-md-4 col-lg-5' name="username" type="text"/>
            <br/>

            <label for="password">Lozinka</label>
            <br/>
            <input class='col-12 col-sm-6 col-md-4 col-lg-5' name="password" type="password"/>
            <br/>

            <label>Potvrda lozinke</label>
            <br />
            <input class='col-12 col-sm-6 col-md-4 col-lg-5' type="password" name="passwordConfirm" id="passwordConfirm"/>
            <br />
            <br />

            <button type="submit" name="submit" value="Prihvati" class='col-12 col-sm-4 col-md-2 col-lg-3'>Registracija</button>
            <br />
            <br />
            <p class='text-left'>Imate korisnički račun?</p>
            <button type="submit" name="submit" value="Prihvati" class='col-12 col-sm-4 col-md-2 col-lg-3'><a href="administracija.php">Prijava</a></button>
    </form>

    <?php
    if (isset($_POST["submit"])) {
        $firstname = $_POST["ime"];
        $lastname = $_POST["prezime"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $hashPassword = password_hash($password, CRYPT_BLOWFISH);
        $query = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = '$username';";
        $result = mysqli_query($dbc, $query) or die("Error");

        if (mysqli_num_rows($result) >= 1) {
            echo "<br />Korisničko ime se već koristi";
        }

        else {
            $sql = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka) VALUES (?,?,?,?);";

            $stmt=mysqli_stmt_init($dbc);

            if (mysqli_stmt_prepare($stmt, $sql)){
                mysqli_stmt_bind_param($stmt,'ssss',$firstname,$lastname,$username,$hashPassword);
                mysqli_stmt_execute($stmt);
            }
            
            echo "<br />Registracija je uspješna";
        }
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