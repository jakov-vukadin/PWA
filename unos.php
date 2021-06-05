
<?php 
        
    include 'connect.php';

       
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
    $query ="INSERT INTO `news` (`title`, `about_content`, `content`, `photo`, `about_photo`, `category`, `archive`) 
             VALUES ('$title', '$about_content', '$content', '$photo', '$about_photo', '$news_category', $archive)"; 
    $result = mysqli_query($dbc, $query) or die('Error querying databese.'); 
    mysqli_close($dbc);
            
?>
            

