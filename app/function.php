<?php

    function webshopNumberFormat($number) {
        return number_format($number, 0, '.', ' ');
    }

    function groupBy($element) {
        $groupByArray = [
            'popularity' => 'sold DESC',
            'rating' => '(rating / countOfRatings) DESC',
            'newest' => 'id DESC',
            'cheap_exp' => 'price ASC',
            'exp_cheap' => 'price DESC',
        ];

        return $groupByArray[$element];
    }

    function getProductUrlName($name) {
        $from = [' ','á','ó','ü','ű','ő','ö','í','é','ú'];
        $to = ['-','a','o','u','u','o','o','i','e','u'];

        if ($name[-1] === ' ') {
            $name = substr($name, 0, strlen($name-1));
        }
        return strtolower(str_replace($from,$to,$name));
    }

    function DBproduct($link, $itemID = NULL, $filter = NULL, $filterValue = NULL, $columnFilter = NULL) {
        if (!isset($filterValue) && !isset($filter) && !isset($itemID) && !isset($columnFilter)) {
            $itemSelect = " SELECT * 
                            FROM product";

        } else if (isset($itemID) && !isset($filterValue) && !isset($filter) && !isset($columnFilter)) {
            $itemSelect = " SELECT * 
                            FROM product 
                            WHERE id = "
                             . intval($itemID);

        } else if (isset($columnFilter)) {
            $itemSelect = " SELECT
                          " . $columnFilter . 
                          " FROM product";

        } else {
            $itemSelect = " SELECT * 
                            FROM product 
                            WHERE id = " . $itemID . " 
                            AND $filter = "
                             . $filterValue;
            
        }
        $itemRes = mysqli_query($link, $itemSelect);
        return $itemRes;
    }

    function getRealName($val) {
        $from = ['man', 'women','bags', 'watches', 'shoes'];
        $to = ['Férfi','Női','Táskák','Órák','Cipők'];
        if (in_array($val, $from)) {
            
            $returnVal = str_replace($from,$to,$val);
            return htmlentities($returnVal, ENT_QUOTES, "UTF-8");
        } 
    
    }

    function getRealColor($color) {
        $colorArray = [
            'black' => 'Fekete',
            'white' => 'Fehér',
            'yellow' => 'Sárga',
            'grey' => 'Szürke',
            'red' => 'Piros',
            'blue' => 'Kék',
            'green' => 'Zöld',
            'orange' => 'Narancssárga',
        ];
    return $colorArray[$color];
}