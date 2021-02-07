<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>


<?php

include_once("functions.php");
$link = connect();

$ct1 = 'CREATE TABLE countries(
  id int not null auto_increment primary key,
  country varchar(64) not null  unique,
  countryid int,
  foreign key(countryid) references countries(id) on delete cascade
  ) default charset="utf8"' 
  ;

  $ct2 = 'CREATE TABLE cities (
    id int not null auto_increment primary key,
    city varchar(64) not null,
    countryid int,
    foreign key(countryid) references countries(id)
    on delete cascade )
    default charset="utf8"';

$ct3 = 'CREATE TABLE hotels (
  id int not null auto_increment primary key,
  hotel varchar(64),
  cityid int,
  foreign key(cityid) references cities(id) on delete cascade,
  countryid int,
  foreign key(countryid) references countries(id) on delete cascade,
  stars int,
  cost int,
  info varchar(2048)
  ) default charset="utf8"';
 
$ct4 = 'CREATE TABLE images (
  id int not null auto_increment primary key,
  imagepath varchar(256),
  hotelid int,
  foreign key(hotelid) references hotels(id) on delete cascade 
  ) default charset="utf8"';

$ct5 = 'CREATE TABLE roles(
  id int not null auto_increment primary key,
  role varchar(16) 
  ) default charset="utf8"';
  
  
  $ct6 = 'CREATE TABLE users( 
    id int not null auto_increment primary key ,
    login varchar(32) unique,
    pass varchar(64) ,
    email varchar(64),
    discount int ,
    avatar mediumblob,
    roleid int,
    foreign key(roleid) references roles(id) on delete cascade
    ) default charset="utf8"';


error_reporting(E_ALL);


mysqli_query($link,$ct1);
   
$err = mysqli_errno($link);
$err2 =  mysqli_error($link);


if ($err) {

  echo "ERror code 1: $err" ;
  echo "ERror code 1: $err2" ;
  exit;
}

mysqli_query($link,$ct2);
   
$err = mysqli_errno($link);
$err2 =  mysqli_error($link);


if ($err) {

  echo "ERror code 1: $err" ;
  echo "ERror code 1: $err2" ;
  exit;
}

mysqli_query($link,$ct3);
   
$err = mysqli_errno($link);
$err2 =  mysqli_error($link);


if ($err) {

  echo "ERror code 1: $err" ;
  echo "ERror code 1: $err2" ;
  exit;
}

mysqli_query($link,$ct4);
   
$err = mysqli_errno($link);
$err2 =  mysqli_error($link);


if ($err) {

  echo "ERror code 1: $err" ;
  echo "ERror code 1: $err2" ;
  exit;
}

mysqli_query($link,$ct5);
   
$err = mysqli_errno($link);
$err2 =  mysqli_error($link);


if ($err) {

  echo "ERror code 1: $err" ;
  echo "ERror code 1: $err2" ;
  exit;
}

mysqli_query($link,$ct6);
   
$err = mysqli_errno($link);
$err2 =  mysqli_error($link);


if ($err) {

  echo "ERror code 1: $err" ;
  echo "ERror code 1: $err2" ;
  exit;
}

?>
</body>
</html>



