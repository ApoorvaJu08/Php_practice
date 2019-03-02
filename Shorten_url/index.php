<html>
<body>
    <form method="post" action="save_url.php">
      <input type="text" name="url_value" placeholder="Enter URL">
      <input type="submit" name="short_url">
    </form>
    
    <form method="post" action="">
        <input type="text" name="short_url_value" placeholder="Enter Short URL">
        <input type="submit" name="original_url">
    </form>
</body>
</html>

<?php
    define('DB_SERVER', "localhost");
    define('DB_USER', "root");
    define('DB_PASS', "");
    define('DB_DATABASE', "ieltsmedidb");
    $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
    
if(isset($_POST['short_url']))
{
    $url=$_POST["url_value"];
    $short_url=substr(md5($url.mt_rand()),0,8);
    mysqli_query($con,"INSERT INTO urls (url, short_url) VALUES ('$url','$short_url')");
    echo "Your New URL Is : http://abc.com/url.php?u=".$short_url."";
}

if(isset($_POST['original_url']))
{
    $url=$_POST["short_url_value"];
    $short_url=substr($url,25);

    $select = mysqli_query($con,"SELECT long_url FROM urls WHERE short_url = '$short_url'");

    while($row=mysqli_fetch_assoc($select))
    {
        echo $row['long_url'];	  
    }
}
?>
