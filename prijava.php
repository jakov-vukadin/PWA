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
            <div class="clear"></div>
            <main>
                <div class="cont">
                    
                    <section id="head_section">
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
                                <button type="reset" value="Poništi">Poništi</button> 
                                <button name="submit" type="submit">Prihvati</button> 
                            </div>
                        </form>
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