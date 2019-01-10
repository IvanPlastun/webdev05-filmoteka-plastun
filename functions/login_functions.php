<?php
    function isAdmin() {
        if(isset($_SESSION['administrator'])) {
            if($_SESSION['administrator']['rank'] == 100) { 
                $result = true;
            } else {
                $result = false;
            }
        } else {
            $result = false;
        }

        return $result;
    }

    function isUser() {
        if(isset($_SESSION['administrator'])) {
            if($_SESSION['user']['rank'] == 1) { 
                $rankUser = true;
            } else {
                $rankUser = false;
            }
        } else {
            $rankUser = false;
        }

        return $rankUser;
    }
?>