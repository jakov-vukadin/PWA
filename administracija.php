<?php 
session_start(); 
include 'connect.php';
// Putanja do direktorija sa slikama 
define('UPLPATH', 'images/');
// Provjera da li je korisnik došao s login forme 
$uspjesnaPrijava='';
$no_user= false;
if(isset($_POST['reg'])){
    header("Location: registracija.php");
die();
}
if (isset($_POST['submit'])) { 
    // Provjera da li korisnik postoji u bazi uz zaštitu od SQL injectiona 
    $prijavaImeKorisnika = $_POST['username']; 
    $prijavaLozinkaKorisnika = $_POST['password']; 
    $sql = "SELECT `username`, `password`, `level` FROM `korisnik` WHERE `username` = ?"; 
    $stmt = mysqli_stmt_init($dbc); 
    if (mysqli_stmt_prepare($stmt, $sql)) { 
        mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika); 
        mysqli_stmt_execute($stmt); 
        mysqli_stmt_store_result($stmt); 
    } 
    mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika, $levelKorisnika);
    mysqli_stmt_fetch($stmt); 
    //Provjera lozinke
    if (password_verify($_POST['password'], $lozinkaKorisnika) && mysqli_stmt_num_rows($stmt) > 0) { 
        $uspjesnaPrijava = true;
        if($levelKorisnika == 1) { 
            $admin = true; 
        } else { 
            $admin = false; 
        } 
        //postavljanje session varijabli 
        $_SESSION['$username'] = $imeKorisnika; 
        $_SESSION['$level'] = $levelKorisnika; 
    } else {
        if(mysqli_stmt_num_rows($stmt) == 0){
            $no_user=true;
        }else 
            $uspjesnaPrijava = false; 
    } 
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Le Monde</title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <?php 
            include 'connect.php'; 
        ?>
    </head>
    <body class="subpage">
        <div id="page-cont">
            <header>                
                <div class="cont">
                    <a href="index.php"><img id="logo" src="images/Lemondelogo.png" alt=""></a>
                </div>
                <nav>
                    <div class="cont">
                        <ul>
                        <li><a href="index.php">HOME</a></li>
                            <li><a href="kategorija.php?id=sport">SPORT</a></li>
                            <li><a href="kategorija.php?id=politique">POLITIQUE</a></li>
                            <li><a href="administracija.php">ADMINISTRACIJA</a></li>
                            <li><a href="unos.html">UNOS</a></li>
                        </ul>
                    </div>
                </nav>
            </header>
            <main>
                <div class="cont">
                    <section>
                        <h4>ADMINISTRACIJA</h4>


<?php   
    // Brisanje i promijena arhiviranosti 
    if (($uspjesnaPrijava == true && $admin == true) || (isset($_SESSION['$username'])) && $_SESSION['$level'] == 1) { 
        $query = "SELECT * FROM news";
        $result = mysqli_query($dbc, $query); 
        while($row = mysqli_fetch_array($result)) { 
            //forma za administraciju 
            echo '<form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-item"> 
                        <label for="title">Naslov vijesti</label>
                        <div class="form-field"> 
                            <input type="text" name="title" class="form-field-textual" value="'.$row['title'].'">
                        </div>
                    </div>

                    <div class="form-item"> 
                        <label for="about_content">Kratki sadržaj vijesti (do 50 znakova)</label>
                        <div class="form-field"> 
                            <textarea name="about_content" cols="60" rows="10" class="form-field-textual">'.$row['about_content'].'</textarea>
                        </div>
                    </div>

                    <div class="form-item"> 
                        <label for="content">Sadržaj vijesti</label>
                        <div class="form-field"> 
                            <textarea name="content" cols="60" rows="10" class="form-field-textual">'.$row['content'].'</textarea> 
                        </div>
                    </div>

                    <div class="form-item"> 
                        <label for="photo">Slika: </label>
                        <div class="form-field"> 
                            <input type="file" class="input-text" name="photo" value="'.$row['photo'].'"/>
                            <br>
                            <img src="'.UPLPATH.$row['photo'].'" width="25%"/>
                        </div>
                    </div>

                    <div class="form-item"> 
                        <label for="about_photo">Kratki opis slike (do 50 znakova)</label>
                        <div class="form-field"> 
                            <textarea name="about_photo" id="" cols="60" rows="2" class="form-field-textual">'.$row['about_photo'].'</textarea>
                        </div>
                    </div>

                    <div class="form-item"> 
                        <label for="category">Kategorija vijesti</label>
                        <div class="form-field"> 
                            <select name="category" class="form-field-textual" value="'.$row['category'].'">
                                <option value="Sport">Sport</option>
                                <option value="Politique">Politique</option>
                            </select> 
                        </div>
                    </div>

                    <div class="form-item"> 
                        <label>Arhiviraj: </label>
                        <div class="form-field">';
                        if($row['archive']==0){
                            echo '<input type="checkbox" name="archive"/>';
                        }else{
                            echo '<input type="checkbox" name="archive" checked/>';
                        }
                        echo '</div>  
                    </div>

                    <div class="form-item">
                        <input type="hidden" name="id" class="form-field-textual" value="'.$row['id'].'">
                        <button type="reset" value="Poništi">Poništi</button> 
                        <button type="submit" name="update" value="Izmjeni">Izmjeni</button>
                        <button type="submit" name="delete" value="Izbriši">Izbriši</button> 
                    </div>
                </form>';
        } 
        // Pokaži poruku da je korisnik uspješno prijavljen, ali nije administrator 
    } else if ($uspjesnaPrijava == true && $admin == false) { 
        echo '<p>Bok ' . $imeKorisnika . '! Uspješno ste prijavljeni, ali niste administrator.</p>'; 
    } else if (isset($_SESSION['$username']) && $_SESSION['$level'] == 0) {
        echo '<p>Bok ' . $_SESSION['$username'] . '! Uspješno ste prijavljeni, ali niste administrator.</p>'; 
    } else if ($no_user==true) {
        echo '<section id="head_section">';
        echo '<p>Uneseno korisničko ime ne postoji</p><br><a href="registracija.php"> Registriraj se!</a>';
        echo '</section>'; 
    } else if ($uspjesnaPrijava == false) { 
        echo '
        
            <h4>Prijava:</h4>
            <form action="administracija.php" method="POST" class="form-group">
              
                <div class="form-item"> 
                    <label for="username">Username:</label>
                    <div class="form-field"> 
                        <input type="text" name="username" class="form-field-textual">
                    </div>
                </div>
            
                <div class="form-item"> 
                    <label for="password">Password:</label>
                    <div class="form-field"> 
                        <input type="password" name="password" class="form-field-textual">
                    </div>
                </div>
              
              <div class="form-item">
                    <button name="submit" type="submit">Prijavi se</button>
                    <button name="reg" type="submit">Registriraj se</button> 
                </div>
            </form>
                    
         ';
        }
    
    ?>

                </section>
            </main>
            <div class="clear"></div>
            <footer>
                <div>
                    <div class="cont">
                        <p>SUIVEZ LE MONDE</p>
                    </div>
                </div>
            </footer>
        </div>
        <?php
            if(isset($_POST['delete'])){ 
                $id=$_POST['id']; 
                $query = "DELETE FROM `news` WHERE `id`=$id"; 
                $result = mysqli_query($dbc, $query); 
                
            }
            
             if(isset($_POST['update'])){
                 $title=$_POST['title']; 
                 $about_content=$_POST['about_content']; 
                 $content=$_POST['content'];
                 $photo = $_FILES['photo']['name'];
                 $about_photo = $_POST['about_photo'];
                 $news_category = $_POST['category'];  
                 if(isset($_POST['archive'])){ 
                     $archive=1; 
                 }else{ $archive=0; } 
          
                 $target_dir = 'images/'.$photo;
                 move_uploaded_file($_FILES['photo']['tmp_name'], $target_dir);

                 $querry="";
                 
                 $id=$_POST['id'];
                 if($_FILES['photo']['error'] == UPLOAD_ERR_OK && $_FILES['photo']['name'] != ""){
                    $query = "UPDATE news SET title='$title', about_content='$about_content', 
                                content='$content', photo ='$photo', about_photo='$about_photo', 
                                category='$news_category', archive='$archive' WHERE id=$id "; 
                 }else{
                    $query = "UPDATE news SET title='$title', about_content='$about_content', 
                    content='$content', about_photo='$about_photo', 
                    category='$news_category', archive='$archive' WHERE id=$id ";
                 }
                 
                 $result = mysqli_query($dbc, $query); }


                
                 mysqli_close($dbc);
            
        ?>  
    </body>
</html>