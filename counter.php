<?php


if(isset($_SESSION['count'])) {
    $count = $_SESSION['count'];
        $count = 1;
        
} else {
    $_SESSION['count'] = 1;
    $select = "SELECT * FROM counter";
    $res = mysqli_query($link, $select);
    
    if (mysqli_num_rows($res)) {
        while ($row = mysqli_fetch_object($res)) {
            $counter = $row->counter;
        }
        $newVal = intval($counter) + intval($_SESSION['count']);
        $insert = "UPDATE counter SET counter = '$newVal'";
        $sql = mysqli_query($link, $insert); 
            
    }
}

?>