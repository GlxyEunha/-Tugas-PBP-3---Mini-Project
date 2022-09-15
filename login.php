<?php

include_once("connect.php");
$penjual = mysqli_query($mysqli, "SELECT * FROM penjual");

$pembeli = mysqli_query($mysqli, "SELECT * FROM pembeli");

if (isset($_POST['submit'])) {

  $user_name = $_POST['user_name'];

  if($user_name == '') {
    $user_kosong = true;
  }

  if (isset($_POST['tipe_user'])) {

    if ($_POST['tipe_user'] == 'pembeli') {

      while ($arr_pembeli = mysqli_fetch_array($pembeli)) {

        if ($user_name == $arr_pembeli['user_name']) {

          $det_pembeli = $arr_pembeli['id_pembeli'];

          header("location:katalog.php?id_pembeli=$det_pembeli");
          exit;
        } else {
          $user_name_salah = true;
        }
      }
    } elseif ($_POST['tipe_user'] == 'penjual') {

      while ($arr_penjual = mysqli_fetch_array($penjual)) {

        if ($user_name == $arr_penjual['user_name']) {

          $det_penjual = $arr_penjual['id_penjual'];

          header("location:katalog.php?id_penjual=$det_penjual");
          exit;
        } else {
          $user_name_salah = true;
        }
      }
    }
  } else {
    $empty_tipe_penjual = true;
  }
} 



?>

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Document</title>

</head>

<body>

  <form action="" method="POST">

    <p>Masukkan username</p>
    <input type="text" name="user_name">
    <br>
    <p>Masuk sebagai</p>
    <input type="radio" name="tipe_user" value="penjual">penjual
    <input type="radio" name="tipe_user" value="pembeli">pembeli
    <br>
    <button type="submit" name="submit">Login</button>
    <button type="" name="daftar_login" formaction="registrasi.php">daftar</button>

    <br>
    <br>


    <?php

    if (isset($user_name_salah)) {
      echo "username salah!";
    } elseif (isset($user_kosong)) {
      echo "username belum diisi!";
    } elseif (isset($empty_tipe_penjual)) {
      echo "tipe data belum diisi!";
    } 

    ?>


  </form>




</body>

</html>
