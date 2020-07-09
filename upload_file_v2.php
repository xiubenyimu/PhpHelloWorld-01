<?php
/*if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 20000))
  *//*
if (($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
)
  {*/
  
    function post_files($url, $file, $remote_name) {
      $data=array();
      $data['file'] = base64_encode(file_get_contents($file));
      $data['remote_name'] = base64_encode($remote_name);

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($ch, CURLOPT_POST, true);

      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
      $response = curl_exec($ch);
      curl_close($ch);
      return $response;
  }

  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Date " . $_POST['date'] . "<br />";
    echo "ID " . $_POST['stuid'] . "<br />";
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo "Case 1:<br />";
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
         echo "Case 2:<br />";
         $uploadDir = 'upload/';
         $uploadFile = $uploadDir . basename($_FILES['file']['name']);
         $remote_name = $_FILES['file']['name'];
         //$remote_url = 'http://183.24.43.21:8080/upload';
         $remote_url = 'https://www.eleanpro.tk:8043/getit.php';
         echo "Path 1:<br />";
         echo "Info 1:". $_FILES['file']['tmp_name'] . "<br />";
         if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)){
            echo "Case 1:1<br />";
            echo "remote_url: " . $remote_url . "<br />";
            echo "uploadFile: " . $uploadFile . "<br />";
            echo "remote_name: " . $remote_name . "<br />";
            $response = post_files($remote_url, $uploadFile, $remote_name);
            echo $response;
         } else {
            echo "Failed";
         }
      }
    }
/*  }
else
  {
  echo "Invalid file";
  echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Stored in: " . $_FILES["file"]["tmp_name"];
  }*/
?>
