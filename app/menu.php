<?php 

    $module = $app['routing']['default'];
    $menu = [];

    $menuSelect = "SELECT * FROM menu ORDER BY `order` ASC";
    $menuRes = mysqli_query($link, $menuSelect);

    if (mysqli_num_rows($menuRes)) {
        while ($row = mysqli_fetch_object($menuRes)) {
            $locations = explode(",",$row->location);

            for($i = 0; $i < count($locations); $i++) {
                $menu[$locations[$i]][$row->order] = $row;
            }

            if (substr($row->url,0,4) != 'http') {
                $moduleName = getModuleNameFromUrl($row->url);
                $app['routing'][$moduleName] = $row->module;
            }
        }
    }

    if (isset($_GET['q'])) {
        $moduleName = getModuleNameFromUrl($_GET['q']);

        if (isset($app['routing'][$moduleName])) {
            $module = $app['routing'][$moduleName];
        } else {
            header('Location: /');
            exit;
        }
    }

    function getModuleNameFromUrl($url) {
        list($moduleName) = explode("/",$url);

        return $moduleName;
    }

    function renderMenu($location) {
        global $menu;
        global $module;

        if (isset($menu[$location])) {
            foreach($menu[$location] as $menuItem) {

                $url = $menuItem->url;
                $ID = (int)$menuItem->id;
                $target = ' target="_blank"';
    
                if (substr($url,0,4) != 'http') {
                    $url = '/'. $url;
                    $target = '';
                }
                
    
                if (!isset($_GET['q'])) {
                    $_GET['q'] = '';
                }
                $style = "";
                
                if (isset($_SESSION['loginSucces'])) {
                    if ($ID === 8) {
                        if ($location === "main" && (int)$_COOKIE['sw'] > 991) {
                        $style = "padding-left:30px;border-left: 1px solid #b2b2b2;";
                        } else {
                            $style = "";
                        }
                    } else if ($ID === 10) {
                        continue;
                    }
                } else if (!isset($_SESSION['loginSucces'])) {
                    if ($ID === 10) {
                        if ($location === "main" && (int)$_COOKIE['sw'] > 991) {
                            $style = "padding-left:30px;border-left: 1px solid #b2b2b2;";
                        } else {
                            $style = "";
                        }
                       
                    } else if ($ID === 8) {
                        continue;
                    } else if ($ID === 12) {
                        continue;
                    } else if ($ID === 14) {
                        continue;
                    }
                }
                
    
                echo '<li '. (($_GET['q'] == $menuItem->url) ? 'class="active" style="' . $style . '"'  : 'style="' . $style . '"') .'><a href="'. $url .'"'. $target .'>'. $menuItem->title .'</a></li>';
            }
        }

    }

    