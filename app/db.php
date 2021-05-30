<?php

    $link = mysqli_connect($app['db']['host'], $app['db']['user'], $app['db']['dbpass'], $app['db']['dbname'], $app['db']['port']);

    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        exit;
    }
    
    /*echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
    echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;*/
   

    function dbInsert($table,$fields) {
        global $link;

        $fieldNames = array_keys($fields);
        $fieldValues = array_values($fields);
        $insert = "INSERT INTO ". $table 
            ." (`". implode("`,`",$fieldNames) ."`) 
            VALUE 
            ('". implode("','",$fieldValues) ."')";

        return mysqli_query($link,$insert);
    }

    function dbUpdate($table,$fields,$id) {
        global $link;

        $sqlFields = [];
        foreach($fields as $fieldName => $fieldValue) {
            $sqlFields[] = "`".$fieldName."`='".$fieldValue."'";
        }

        $update = "UPDATE ". $table ." SET ". implode(",",$sqlFields) ." WHERE id=".$id;
       
        return mysqli_query($link,$update);
    }