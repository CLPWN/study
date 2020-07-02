<?php
print("<h1>view referer</h1> <br>\n");
echo "refere: ".htmlspecialchars($_SERVER['HTTP_REFERER'], ENT_QUOTES, 'UTF-8');
