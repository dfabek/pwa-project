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
        form .error{color: red; display:grid; text-align: left; border-color: red;}
        input, textarea{text-align:left; padding: 5px;}
        button{padding: 1px 8px; border: 1px solid #595454; margin-bottom:5px;}
        .input-text{margin-left: -5px}
    </style>

    <script type="text/javascript">
        $(function() {
            $("form[name='forma']").validate({
            rules: {
                title: {
                    required: true,
                    minlength: 5,
                    maxlength: 30,
                },
                about: {
                    required: true,
                    minlength: 10,
                    maxlength: 100,
                },
                content: {
                    required: true,
                },
                pphoto: {
                    required: true,
                },
                category: {
                    required: true,
                }
            },
            messages: {
                title: {
                    required: "Naslov ne smije biti prazan",
                    minlength: "Naslov treba imati najmanje 5 znakova",
                    maxlength: "Naslov treba imati najviše 30 znakova",
                },
                about: {
                    required: "Kratki sadržaj ne smije biti prazan",
                    minlength: "Kratki sadržaj treba imati najmanje 10 znakova",
                    maxlength: "Kratki sadržaj treba imati najviše 100 znakova",
                },
                content: {
                    required: "Tekst vijesti ne smije biti prazan",
                },
                pphoto: {
                    required: "Slika mora biti odabrana",
                },
                category: {
                    required: "Kategorija mora biti odabrana",
                },
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
    <form name="forma" enctype="multipart/form-data" method="POST" action="">
        <label for="title">Naslov vijesti</label><br/>
        <input name="title" type="text" size="57" class="form-field-textual" required>
        <br/>
        <br/> 

        <label for="about">Kratki sadržaj vijesti</label><br/>
        <textarea name="about" id="" cols="60" rows="5" class="form-field-textual" required></textarea>
        <br/>
        <br/> 

        <label for="content">Sadržaj vijesti</label><br/>
        <textarea name="content" id="" cols="60" rows="10" class="form-field-textual" required></textarea><br/>
        <br/>

        <label for="pphoto">Slika: </label><br/>
        <input name="pphoto" id="pphoto" type="file" accept="image/png, image/jpeg" class="input-text" required><br/>
        <br/>

        <label for="category">Kategorija vijesti</label><br/>
        <select name="category" id="" class="form-field-textual">
            <option label=" " disabled selected></option>
            <option value="sport">Sport</option>
            <option value="kultura">Kultura</option>
        </select>
        <br/>
        <br/>

        <label>Spremiti u arhivu: 
            <input type="checkbox" name="archive">
        </label>
        
        <br/>
        <br/>

        <button type="reset" value="Poništi">Poništi</button>
        <button type="submit" name="submit" value="Prihvati">Prihvati</button>
        
        <?php

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
        
        echo " <br /><br />Vaši podaci su unešeni u sustav!";
        echo "</form>";
    }
    ?>         
    </form>


       

    </div>
    
    <footer>
        <p>Weitere Online-Angebote der Axel Springer SE:</p>
        <div></div>
    </footer>
</body>
</html>