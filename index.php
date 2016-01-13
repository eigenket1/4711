<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $position = (isset($_GET['board'])) ? $_GET['board'] : null;
            $squares = str_split($position); 
            function winner($token,$position){
                $won = false;
                if (($position[0] == $token) && 
                        ($position[1] == $token) && 
                        ($position[2] == $token)) {
                    $won = true;
                } else if (($position[3] == $token) && 
                        ($position[4] == $token) && 
                        ($position[5] == $token)){
                    $won = true;
                } else if (($position[6] == $token) && 
                        ($position[7] == $token) && 
                        ($position[8] == $token)){
                    $won = true;
                } else if (($position[0] == $token) && 
                        ($position[3] == $token) && 
                        ($position[6] == $token)){
                    $won = true;
                } else if (($position[1] == $token) && 
                        ($position[4] == $token) && 
                        ($position[7] == $token)){
                    $won = true;
                } else if (($position[2] == $token) && 
                        ($position[5] == $token) && 
                        ($position[8] == $token)){
                    $won = true;
                } else if (($position[0] == $token) && 
                        ($position[4] == $token) && 
                        ($position[8] == $token)){
                    $won = true;
                } else if (($position[2] == $token) && 
                        ($position[4] == $token) && 
                        ($position[6] == $token)){
                    $won = true;
                }
                return $won;
            }

        ?>
    </body>
</html>
