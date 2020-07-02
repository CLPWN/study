<?php
echo "<h1>view GET parametar:get </h1>\n";
if(isset($_GET['get'])) 
    echo "get: ".htmlspecialchars($_GET['get'], ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="ja">
<head>

</head>
<body>
<form action="" method="get">
    <input type="text" name="get">
    <input type="submit" value="submit">
</form>
</body>
</html>
