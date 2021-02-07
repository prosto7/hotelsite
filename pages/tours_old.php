<h3 class="lead">Tours</h3>

<?php
$link = connect();
echo '<br>ruser ' . $_SESSION['ruser'];
echo '<br>radmin ' . $_SESSION['radmin'];
echo '<form action="index.php?page=1" method="post">';
$res = mysqli_query($link, "SELECT * FROM countries ORDER BY country");
echo '<select name="countryid">';
while($row=mysqli_fetch_array($res, MYSQLI_NUM)) {
  echo "<option value='$row[0]'>$row[1]</option>";
}
echo '</select>';
mysqli_free_result($res);
echo '<input type="submit" name="selcountry" value="Выбор страны" class="btn-primary btn-sm">';

// обработчик вывода городов
if (isset($_POST['selcountry'])) {
  $countryid = $_POST['countryid'];
  if(!$countryid) exit;
  $res = mysqli_query($link, "SELECT * FROM cities WHERE countryid=$countryid ORDER BY city");
  echo '<select name="cityid">';
while($row=mysqli_fetch_array($res, MYSQLI_NUM)) {
  echo "<option value='$row[0]'>$row[1]</option>";
}
echo '</select>';
mysqli_free_result($res);
echo '<input type="submit" name="selcity" value="Выбор города" class="btn btn-info btn-sm">';
}


echo '</form>';

// обработчик вывода отелей
if(isset($_POST['selcity'])) {
  $cityid = $_POST['cityid'];
  $sel = "SELECT ho.hotel, ho.stars, ho.cost, ho.id, co.country, ci.city
          FROM hotels ho, countries co, cities ci 
          WHERE ho.cityid = $cityid AND ho.countryid = co.id AND ci.countryid = co.id";
  $res = mysqli_query($link, $sel);
  echo '<table class="table table-striped text-center">';
  echo '<tr><th>Название</th><th>Звезды</th><th>Цена</th><th>Страна</th><th>Город</th><th>Информация</th></tr>';
  while($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
      echo "<tr>";
      echo "<td>$row[0]</td>";
      echo "<td>$row[1]</td>";
      echo "<td>$row[2]</td>";
      echo "<td>$row[4]</td>";
      echo "<td>$row[5]</td>";
      echo "<td><a href='pages/hotelinfo.php?hotel=$row[3]' target='_blank'>подробнее...</a></td>";
      echo "</tr>";
  }
  echo '</table>';
}
