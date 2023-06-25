<?php
include 'connect.php';

$error ="";

if($_SERVER["REQUEST_METHOD"] =="POST"){
$picture = $_FILES['pphoto']['name'];
$title = $_POST['title'];
$about = $_POST['about'];
$content = $_POST['content'];
$category = $_POST['category'];
$date = date('d.m.Y.');

if (isset($_POST['archive'])) {
    $archive = 1;
} else {
    $archive = 0;
}

$target_dir = 'img/' . $picture;
move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);

$query = "INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija, arhiva) 
          VALUES ('$date', '$title', '$about', '$content', '$picture', '$category', '$archive')";
$result = mysqli_query($dbc, $query) or die('Error querying database.');
}
?>



<!DOCTYPE html>
<html>

<head>
    <title>My Website</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="csspwa.css">
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="images/bbclogo.png" alt="Logo" width="50" height="50">
            </div>
            <nav>
                <ul>
                    <li><a href="druga.html">News</a></li>
                    <li><a href="druga.html">Sport</a></li>
                    <li><a href="#">Administracija</a></li>
   
                </ul>
            </nav>
        </header>

        <form action="skripta.php" method="POST">
 <div class="form-item">
 <label for="title">Naslov vijesti</label>
 <div class="form-field">
 <input type="text" name="title" class="form-field-textual">
 </div>
 </div>
 <div class="form-item">
 <label for="about">Kratki sadržaj vijesti (do 50 
znakova)</label>
 <div class="form-field">
 <textarea name="about" id="" cols="30" rows="10" class="formfield-textual"></textarea>
 </div>
 </div>
 <div class="form-item">
 <label for="content">Sadržaj vijesti</label>
 <div class="form-field">
 <textarea name="content" id="" cols="30" rows="10"
class="form-field-textual"></textarea>
 </div>
 </div>
 <div class="form-item">
 <label for="pphoto">Slika: </label>
 <div class="form-field">
 <input type="file" accept="image/jpg,image/gif"
class="input-text" name="pphoto"/>
 </div>
 </div>
 <div class="form-item">
 <label for="category">Kategorija vijesti</label>
<div class="form-field">
 <select name="category" id="" class="form-field-textual">
 <option value="sport">Sport</option>
 <option value="kultura">News</option>
 </select>
 </div>
 </div>
 <div class="form-item">
 <label>Spremiti u arhivu: 
 <div class="form-field">
 <input type="checkbox" name="archive">
 </div>
 </label>
 </div>
 <div class="form-item">
 <button type="reset" value="Poništi">Poništi</button>
 <button type="submit" value="Prihvati">Prihvati</button>
 </div>
 </form>
        <footer>
            <p>Copyright © 2019 BBC. The BBC is not responsible for the content of external sites. Read about our
                approach to external linking.</p>
        </footer>
</html>
