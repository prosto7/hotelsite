<h3 class="lead">Tours</h3>

<?php

$link = connect();
echo '<div class="form-inline">';
echo '<select name="countryid" id="countryid" onchange="showCities(this.value)">';
echo '<option value="0">Выберите страну</option>';
$res=mysqli_query($link, "SELECT * FROM countries");
while($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
  echo "<option value='$row[0]'>$row[1]</option>";
}
echo '</select>';
echo '<select name="cityid" id="cityid" onchange="showHotels(this.value)"></select>';
echo '</div>';

echo '<div id="hotels"></div>';



?>

<script>

function showCities(countryid) {
  const cityid = document.querySelector('#cityid');
  if(countryid === "0") cityid.innerHTML = '';
  let xhr = new XMLHttpRequest();
  xhr.open('GET', "pages/get_cities.php?coid="+countryid,true);
  xhr.send(null);

  // .onreadystatechange меняется без нашего ведома и при изменении вызывает ф-я
  xhr.onreadystatechange = function () {
    if(xhr.readyState === 4 && xhr.status === 200) {
      
      cityid.innerHTML = xhr.responseText;


    }
  }
}
</script>
<script>
 function showHotels(cityid){
  const hotels = document.querySelector('#hotels');
  if(cityid === "0") hotels.innerHTML = '';

  let xhr = new XMLHttpRequest();
  xhr.open('POST', "pages/get_hotels.php",true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.send('cityid='+cityid);

  // .onreadystatechange меняется без нашего ведома и при изменении вызывает ф-я
  xhr.onreadystatechange = function () {
    if(xhr.readyState === 4 && xhr.status === 200) {
      console.log('test');
      hotels.innerHTML = xhr.responseText;
    

    }
  }


}

</script>
