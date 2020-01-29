<?php

        if(isset($_GET['rand'])){
                $url = "http://api.icndb.com/jokes/random";
                $url_json = file_get_contents($url);
                // echo $url_json;
        
                $url_array = json_decode($url_json,true);
                // var_dump($url_array);
        
                $joke = $url_array['value']['joke'];
        
                header("location: index.php?rand-joke=$joke#experience");
                exit();
        }

        // if(isset($_GET['specific'])){
        //         $url = "http://api.icndb.com/jokes/random/".$_GET['jokesNum']."?firstName=".$_GET['fname']."&lastName=".$_GET['lname'];

        //         $url_json = file_get_contents($url);
        //         echo $url_json;
        
        //         $url_array = json_decode($url_json,true);
        //         var_dump($url_array);
        
        //         $joke = $url_array['value'];
        
        //         header("location: index.php?spec-joke=$joke#education");
        //         exit();
        // }

?>


