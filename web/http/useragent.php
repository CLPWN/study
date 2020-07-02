<?php
print("<h1>view get useragent </h1><br>\n");
echo "useragent: ".htmlspecialchars($_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8');