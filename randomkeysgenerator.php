<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        function generateKey(){
            $keylength = 16;
            $sting = "1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
            $ranStr = substr(str_shuffle($str),0,$keylength);
            return $ranStr;
        }
        echo generateKey();
    ?>
</body>
</html>