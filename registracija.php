<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Le Monde</title>
        <link rel="stylesheet" href="style.css" type="text/css">

        <?php 
            include 'connect.php';
            if(isset($_POST['submit'])){
                $ime=$_POST['ime'];
                $prezime=$_POST['prezime'];
                $username=$_POST['username'];
                $hashed_password=password_hash($_POST['password'], CRYPT_BLOWFISH);
                $level = 0;
                $registriranKorisnik = '';

                $sql = "SELECT `username` FROM `korisnik` WHERE `username` = ?"; 
                $stmt = mysqli_stmt_init($dbc); 
                if (mysqli_stmt_prepare($stmt, $sql)) { 
                    mysqli_stmt_bind_param($stmt, 's', $username); 
                    mysqli_stmt_execute($stmt); 
                    mysqli_stmt_store_result($stmt);
                }
                if(mysqli_stmt_num_rows($stmt) > 0){ 
                    echo 'Korisničko ime već postoji!'; 
                }else{
                    $sql = "INSERT INTO `korisnik` (`ime`, `prezime`,`username`, `password`, `level`)VALUES(?, ?, ?, ?, ?)"; 
                    $stmt = mysqli_stmt_init($dbc); 
                    if (mysqli_stmt_prepare($stmt, $sql)) { 
                        mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username, $hashed_password, $level); 
                        mysqli_stmt_execute($stmt); 
                        $registriranKorisnik = true;

                        echo "Uspješno ste registrirani!";
                    }
                }
            }
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
                        <h4>Registracija:</h4>
                        <form action="" method="POST" class="">
                          
                            <div class="form-item"> 
                                <label for="ime">Name:</label>
                                <div class="form-field"> 
                                    <input type="text" name="ime" class="form-field-textual" id="ime">
                                    <span id="ime_error" class="error"></span>
                                </div>
                            </div>

                            <div class="form-item"> 
                                <label for="prezime">Surname:</label>
                                <div class="form-field" > 
                                    <input type="text" name="prezime" class="form-field-textual" id="prezime">
                                    <span id="prezime_error" class="error"></span>
                                </div>
                            </div>

                            <div class="form-item"> 
                                <label for="username">Username:</label>
                                <div class="form-field"> 
                                    <input type="text" name="username" class="form-field-textual" id="username">
                                    <span id="username_error" class="error"></span>
                                </div>
                            </div>
                        
                            <div class="form-item"> 
                                <label for="password">Password:</label>
                                <div class="form-field"> 
                                    <input type="password" name="password" class="form-field-textual" id="password">
                                    <span id="password_error" class="error"></span>
                                </div>
                            </div>

                            <div class="form-item"> 
                                <label for="password2">Repeat password:</label>
                                <div class="form-field"> 
                                    <input type="password" name="password2" class="form-field-textual" id="password2">
                                    <span id="password2_error" class="error"></span>
                                </div>
                            </div>
                          
                          <div class="form-item"> 
                                <button type="reset" value="Poništi">Poništi</button> 
                                <button name="submit" type="submit" onclick="hehe()">Prihvati</button> 
                            </div>
                        </form>
                        <script type="text/javascript">
                            function hehe(){
                              
                                var form_submition = true;
                                var ime_p=document.getElementById('ime');
                                var ime=document.getElementById('ime').value;
                                var prezime_p=document.getElementById('prezime');
                                var prezime=document.getElementById('prezime').value;
                                var username_p=document.getElementById('username');
                                var username=document.getElementById('username').value;
                                var password_p=document.getElementById('password');
                                var password=document.getElementById('password').value;
                                var password2_p=document.getElementById('password2');
                                var password2=document.getElementById('password2').value;
                                
                                
                                if(ime == "" || ime == null){
                                    form_submition = false;
                                    ime_p.style.border="1px solid red";
                                    document.getElementById("ime_error").innerHTML = "Unesite ime!";
                                }
                                if(prezime == "" || prezime == null){
                                    form_submition = false;
                                    prezime_p.style.border="1px solid red";
                                    document.getElementById("prezime_error").innerHTML = "Unesite prezime!";
                                }
                                if(username == "" || username==null || username.length<1){
                                    form_submition = false;
                                    username_p.style.border="1px solid red"
                                    document.getElementById("username_error").innerHTML = "Unesite ime!";
                                }
                                
                                if(password == "" || password == null){
                                    form_submition = false;
                                    password_p.style.border="1px solid red";
                                    document.getElementById("password_error").innerHTML = "Unesite lozinku!";
                                }
                                if(password2 != password){
                                    form_submition = false;
                                    password2_p.style.border="1px solid red";
                                    document.getElementById("password2_error").innerHTML = "Lozinke moraju biti iste";
                                }
                                if (form_submition != true) {
                                    
                                    event.preventDefault()
                                 
                                }
                    
                            }
                        </script>
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