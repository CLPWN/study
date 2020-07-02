<?php
print("<h1>view post parametar:post</h1>\n");
if(isset($_POST['post']))
    echo "post: ". htmlspecialchars($_POST['post'], ENT_QUOTES, 'UTF-8');
?>

<!DOCTYPE html>
<html lang="ja">
<head>

</head>
<body>
<form action="" method="post">
    <input type="text" name="post">
    <input type="submit" value="submit">
</form>
</body>
</html>
