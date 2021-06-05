<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Le Monde</title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <?php 
            include 'connect.php'; 
            define('UPLPATH', 'images/'); 
            $id=$_GET['id'];
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
                        <?php
                            $query = "SELECT * FROM `news` WHERE `id`=$id";
                            $result = mysqli_query($dbc, $query);
                            while($row=mysqli_fetch_array($result)){
                                echo '<h4>'.$row['category'].'</h4>';
                                echo '<h1>'.$row['title'].'</h1>';
                                echo '<p>'.$row['about_content'].'</p>';
                                echo '<article>';
                                echo '<figure>';
                                echo '<img src="'. UPLPATH . $row['photo'] .'">';
                                echo '<figcaption>'.$row['about_photo'].'</figcaption>';
                                echo '</figure>';
                                echo '<p>'.$row['content'].'</p>';
                                echo '</article>';
                            } 
                        ?>
                    </section>
                </div>
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
    </body>
</html>