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
    <body class="main_page">
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
                            <li><a href="unos.html">SOUMETTRE</a></li>
                        </ul>
                    </div>
                </nav>
            </header>
            <div class="clear"></div>
            <main>
                <div class="cont">
                    <section id="head_section">
                    <h2><?php echo $id ?></h2>
                        <?php
                            $i=0;
                            $query = "SELECT * FROM `news` WHERE `category` LIKE '$id' AND `archive`=0";
                            $result = mysqli_query($dbc, $query);
                            while($row=mysqli_fetch_array($result)){
                                $i=$i+1;
                                if($i==2){
                                    echo '<a href="clanak.php?id='.$row['id'].'">';
                                    echo '<article class="mid_grid">';
                                    echo '<div class="images">';
                                    echo '<img src="'. UPLPATH . $row['photo'] . '" class="small_pic"/>';
                                    echo '<img src="'. UPLPATH . $row['photo'] . '" class="big_pic"/>';
                                    echo '</div>';
                                    echo '<p>'.$row['title'].'</p>';
                                    echo '</article>';
                                    echo '</a>';
                                    $i=-1;
                                }elseif($i<2){
                                    echo '<a href="clanak.php?id='.$row['id'].'">';
                                    echo '<article>';
                                    echo '<div class="images">';
                                    echo '<img src="'. UPLPATH . $row['photo'] . '" class="small_pic"/>';
                                    echo '<img src="'. UPLPATH . $row['photo'] . '" class="big_pic"/>';
                                    echo '</div>';
                                    echo '<p>'.$row['title'].'</p>';
                                    echo '</article>';
                                    echo '</a>';
                                }
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