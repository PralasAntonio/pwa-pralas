<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $about = $_POST['about'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    
 
    $image = $_FILES['pphoto']['name'];
    $image_tmp = $_FILES['pphoto']['tmp_name'];
    move_uploaded_file($image_tmp, 'img/' . $image);
    

    $archive = isset($_POST['archive']) ? 'Da' : 'Ne';
    

    $html = '<section role="main">
    <div class="row">
    <p class="category">' . $category . '</p>
    <h1 class="title">' . $title . '</h1>
    <p>AUTOR:</p>
    <p>OBJAVLJENO:</p>
    </div>
    <section class="slika">
    <img src="img/' . $image . '">
    </section>
    <section class="about">
    <p>' . $about . '</p>
    </section>
    <section class="sadrzaj">
    <p>' . $content . '</p>
    </section>
    </section>';
    
  
    echo $html;
}
?>
