<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Le Monde</title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <?php 
            include 'connect.php'; 
            define('UPLPATH', 'images/'); 
        ?>
    </head>
    <body class="subpage">
        <div id="page-cont">
            <header>                
                <div class="cont">
                    <img id="logo" src="images/Lemondelogo.png" alt="">
                </div>
                <nav>
                    <div class="cont">
                        <ul>
                        <li><a href="index.php">HOME</a></li>
                            <li><a href="kategorija.php?id=sport">SPORT</a></li>
                            <li><a href="kategorija.php?id=politique">POLITIQUE</a></li>
                            <li><a href="administracija.php">ADMINISTRACIJA</a></li>
                            <li><a href="unos.html">SOUMETTRE</a></li>
                        </ul>
                    </div>
                </nav>
            </header>
           
            <main>
                <div class="cont">
                    <section>
                        <h4>ADMINISTRACIJA</h4>
                        <?php
                            $query = "SELECT * FROM `news`";
                            $result = mysqli_query($dbc, $query);
                            while($row=mysqli_fetch_array($result)){
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
                                        <br><img src="'.UPLPATH.$row['photo'].'" width="25%"/>
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

                 
                 $id=$_POST['id']; 
                 $query = "UPDATE news SET title='$title', about_content='$about_content', 
                 content='$content', photo ='$photo', about_photo='$about_photo', category='$news_category', archive='$archive' WHERE id=$id "; 
                 $result = mysqli_query($dbc, $query); }


                 $result = mysqli_query($dbc, $query) or die('Error querying databese.'); 
                 mysqli_close($dbc);
            
        ?>  
    </body>
</html>