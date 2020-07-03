<html>
<body>

<form action="upload_file_v2.php" method="post"
enctype="multipart/form-data">
<select name="stuid">
    <option value="0">select number:</option>
    <option value="1">001</option>
    <option value="2">002</option>
    <option value="3">003</option>
    </select><br>
<label for="file">文件名1:</label><br>
<input type="file" name="file" id="file" /> <br>
<input type="date" name="date" />
<br />
<input type="submit" name="submit" value="Submit" />
</form>

</body>
</html>
