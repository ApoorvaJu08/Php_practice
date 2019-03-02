<html>
    <body>
        <form method="post" action="">
            <input type="text" name="img_url" placeholder="Enter Image URL">
            <input type="submit" name="get_image" value="Submit">
        </form>
    </body>
</html>

<?php
if(isset($_POST['get_image']))
{
    $url=$_POST['img_url'];
    $data = file_get_contents($url);
    $new = 'blogMainImage.png';
    file_put_contents($new, $data);
    echo "<img src='blogMainImage.png'>";
}
?>
