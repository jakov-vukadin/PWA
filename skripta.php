<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Le Monde</title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <?php
            include 'unos.php'
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
                            <li><a href="unos.html">SOUMETTRE</a></li>
                        </ul>
                    </div>
                </nav>
            </header>
            
            <main>
                <div class="cont">
                    <section>
                        <h4><?php echo $news_category ?></h4>
                        <h1><?php echo $title ?></h1>
                        <p><?php echo $about_content ?></p>
                        <article>
                            <figure>
                                <img src=<?php echo "images/$photo"?> alt="">
                                <figcaption><?php echo $about_photo ?></figcaption>
                            </figure>
                            <p><?php echo $content ?></p>
                        </article>
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