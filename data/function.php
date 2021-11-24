<?php
    include("./data.php");
    global $connect;
    

    function getNews(){
        $connect = mysqli_connect('localhost', 'root', '', 'seo-website');

        $query = "SELECT * FROM news";
        
        $result = mysqli_query($connect, $query);
        return $result;

    }

?>