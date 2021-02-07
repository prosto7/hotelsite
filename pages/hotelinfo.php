<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel info</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css?<?echo time();?>" >
    <!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/> -->
    <link rel="stylesheet" type="text/css" href="css/slick.css"/> 
    <link rel="stylesheet" type="text/css" href="css/slick-theme.css"/>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.1.0.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	
  </head>
<body>

<?php
include_once ('functions.php');
$link = connect();
if (isset($_GET['hotel'])) {
  $hotelid = $_GET['hotel']; 
  $res = mysqli_query($link, "SELECT * FROM hotels WHERE id=$hotelid");
  $row = mysqli_fetch_array($res, MYSQLI_NUM);
  $hname = $row[1];
  $hstars = $row[4];
  $hcost = $row[5];
  $hinfo = $row[6];
  mysqli_free_result($res);
  echo '<div class="container text-center">';
  echo "<h1 id='nem' class='lead mt-5'><strong>Отель $hname</strong></h1>";
  for($i=0;$i<$hstars;$i++){ 
  echo '<img src="../images/star.png" alt="star" draggable="false" style="width:50px;">';
}
echo '<hr>';
echo "<h2 class='lead'>Полная информация об отеле $hname</h2>";
echo "<h4 class='lead'>$hinfo</h4>";
echo '<hr>';
$res = mysqli_query($link, "SELECT imagepath FROM images
WHERE hotelid=$hotelid");

echo "<h2 class='lead'>Фотографии отеля $hname</h2>";

echo '<div class="carousel-container">';
while ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
echo "<img class='carousel-image' alt='Image Caption' src='../$row[0]' >";

}

// <div class='carousel-feature'><a class='slider-nav' href='#'>... <p>The background will expand up or down to fit the caption.</p></div> alt='photo'</a><div class='carousel-caption'
echo '</div>';
}
echo '</div>';
  ?>

<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    
<script>
    $(document).ready(function(){
        $('.carousel-container').slick({
            dots: true,
            centerMode: true,
            centerPadding: '60px',
            slidesToShow: 3,
            responsive: [
            {
            breakpoint: 768,
            settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 3
            }
            },
            {
            breakpoint: 480,
            settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 1
            }
            }
            ]
        });
    });
</script>

</body>


</html>