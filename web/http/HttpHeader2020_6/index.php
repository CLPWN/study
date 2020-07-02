<?php
$dir = __DIR__;
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            if($file!=="."&&$file!==".."&&$file!==".git"&&$file!=="index.php"&&$file!==".composer"&&$file!=="vendor"&&$file!==".heroku"&&$file!==".profile.d"&&$file!=="composer.json"&&$file!=="Procfile"&&$file!=="README.md")
                echo "<a  href=\"$file\"> $file</a> " ."<br>";
        }
        closedir($dh);
    }
}
?>
