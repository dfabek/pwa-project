<!DOCTYPE html>
<head>
	<title>PWA projekt</title>

    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <style>
        body{background-color: rgb(226, 226, 226);}
        form{padding: 20px; text-align:left; width: 100%;}
        input, textarea{text-align:left; padding: 5px;}
        button{padding: 1px 8px; border: 1px solid #595454;}
        .input-text{margin-left: -5px}
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
        <div id="gumbi" class='col-12 col-sm-12 col-md-12 col-lg-12 text-right'>
            <button type='submit' name='unos' value='unos' class='col-12 col-sm-12 col-md-12 col-lg-3'><a href='administracija.php'>Unesite novi članak</a></button>
        </div>
    <?php
            include 'connect.php';
            $query = "SELECT * FROM vijesti";
            $result = mysqli_query($dbc, $query);
            while($row = mysqli_fetch_array($result)) {
                echo '
                <form enctype="multipart/form-data" action="" method="POST">
                    <label for="title">Naslov vijesti</label><br/>
                    <input name="title" type="text" size="57" class="form-field-textual" value="' . $row['title'] . '">
                    <br/>
                    <br/> 
                    <label for="about">Kratki sadržaj vijesti (do 50 znakova)</label><br/>
                    <textarea name="about" id="" cols="60" rows="5" max="50" class="form-field-textual">' . $row['about'] . '</textarea>
                    <br/>
                    <br/> 
                    <label for="content">Sadržaj vijesti</label><br/>
                    <textarea name="content" id="" cols="60" rows="10" class="form-field-textual">' . $row['content'] . '</textarea><br/>
                    <br/>
                    <label for="pphoto">Slika: </label><br/>
                    <input name="pphoto" id="pphoto" type="file" accept="image/png, image/jpeg" class="input-text"> <img src="img/' . $row['photo'] . '" width=100px><br/>
                    <br/>
                    <label for="category">Kategorija vijesti</label><br/>
                    <select name="category" id="" value="' . $row['category'] . '">
                        <option value="" disabled selected>Odabir kategorije</option>
                        <option value="sport">Sport</option>
                        <option value="kultura">Kultura</option>
                    </select>
                    <br/>
                    <br/>
                    <label>Spremiti u arhivu: '; 
                        if($row['archive'] == 0) {
                        echo '<input type="checkbox" name="archive" id="archive"/>';
                        } else {
                        echo '<input type="checkbox" name="archive" id="archive" 
                        checked/>';
                        }
                    echo '
                    </label>
                    <br/>
                    <br/>
                    <input type="hidden" name="id" class="form-field-textual" value="' . $row['id'] . '">
                    <button type="reset" value="Poništi">Poništi</button>
                    <button type="submit" name="update" value="Prihvati">Izmjeni</button>
                    <button type="submit" name="delete" value="Izbriši"> Izbriši</button>
                    
                    <hr />
                </form>';
            }

            if(isset($_POST['delete'])){
                $id=$_POST['id'];
                $query = "DELETE FROM vijesti WHERE id=$id ";
                $result = mysqli_query($dbc, $query);
            }
                
            if(isset($_POST['update'])){
                $picture = $_FILES['pphoto']['name'];
                $title=$_POST['title'];
                $about=$_POST['about'];
                $content=$_POST['content'];
                $category=$_POST['category'];

                if(isset($_POST['archive'])){
                    $archive=1;
                }
                else{
                    $archive=0;
                }

                $target_dir = 'img/'.$picture;
                move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
                $id = $_POST['id'];
                
                if ($_FILES['pphoto']['size'] > 0 && $_FILES['pphoto']['error'] == 0){
                    $query = "UPDATE vijesti SET title='$title', about='$about', content='$content', 
                    photo='$picture', category='$category', archive='$archive' WHERE id=$id ";
                    $result = mysqli_query($dbc, $query);
                }
                else{
                    $query = "UPDATE vijesti SET title='$title', about='$about', content='$content',
                        category='$category', archive='$archive' WHERE id=$id ";
                    $result = mysqli_query($dbc, $query);
                }
            }
        ?>
  
    </div>
    
    <footer>
        <p>Weitere Online-Angebote der Axel Springer SE:</p>
        <div></div>
    </footer>
</body>
</html>