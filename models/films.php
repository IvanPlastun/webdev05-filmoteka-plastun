<?php
    //Getting all films from DB
    function films_all($link) {
        $selectQuery = "SELECT * FROM `films`";
        $films = array();
        if($result = mysqli_query($link, $selectQuery)) { 
            while($row = mysqli_fetch_array($result)) {
                $films[] = $row;
            }
        }

        return $films;
    }

    
    function film_new($link, $title, $genre, $year, $description) {
        if(!empty($_FILES)) {
            if(isset($_FILES['photo']['name']) && $_FILES['photo']['tmp_name'] != "") {
                $fileName = $_FILES['photo']['name'];
                $fileTempLoc = $_FILES['photo']['tmp_name'];
                $fileType = $_FILES['photo']['type'];
                $fileSize = $_FILES['photo']['size'];
                $fileErrorMsg = $_FILES['photo']['error'];
                $kaboom = explode('.', $fileName);
                $fileExt = end($kaboom);

                list($width, $height) = getimagesize($fileTempLoc);

                if($width < 10 || $height < 10) {
                    $errors[] = 'That image has no dimensions';
                }
                
                $db_file_name = rand(100000000, 999999999) . "." . $fileExt;

                if($fileSize > 10485760) {
                    $errors[] = 'Your image file was larger then 10mb';
                } else if(!preg_match('/\.(gif|jpg|jpeg|png)$/i', $fileName)) {
                    $errors[] = 'Your image file was not jpg, jpeg, gif or png type';
                } else if($fileErrorMsg == 1) {
                    $errors[] = 'An unknown error occurred';
                }

                $photoFolderLocation = ROOT . 'data/films/full/';
                $photoFolderLocationMin = ROOT . 'data/films/min/';

                $uploadFile = $photoFolderLocation . $db_file_name;
                $moveResult = move_uploaded_file($fileTempLoc, $uploadFile);

                if($moveResult != true) {
                    $errors[] = 'File upload failed';
                }

                require_once(ROOT . "/functions/image_resize_imagick.php");
                $target_file = $photoFolderLocation . $db_file_name;
                $resized_file = $photoFolderLocationMin . $db_file_name;
                $wmax = 137;
                $hmax = 200;
                $img = createThumbnail($target_file, $wmax, $hmax);
                $img->writeImage($resized_file);
            }
        }
        $InsertQuery = "INSERT INTO `films` (`title`,`genre`, `description`, `photo`, `year`) VALUES (
            '".mysqli_real_escape_string($link, $title)."',
            '".mysqli_real_escape_string($link, $genre)."',
            '".mysqli_real_escape_string($link, $description)."',
            '".mysqli_real_escape_string($link, $db_file_name)."',
            '".mysqli_real_escape_string($link, $year)."'
        )";

        if(mysqli_query($link, $InsertQuery))
            $InsertResult = true;
        else
            $InsertResult = false;
        
        return $InsertResult;
    }


    function get_film($link, $id) {
        $selectQuery = "SELECT * FROM `films` WHERE id='". mysqli_real_escape_string($link, $id)."' LIMIT 1";
        if($result = mysqli_query($link, $selectQuery)) { 
            $film = mysqli_fetch_array($result);
        }

        return $film;
    }

    function film_update($link, $title, $genre, $year, $description, $id) {
        
        if(!empty($_FILES)) {
            if(isset($_FILES['photo']['name']) && $_FILES['photo']['tmp_name'] != "") {
                $fileName = $_FILES['photo']['name'];
                $fileTempLoc = $_FILES['photo']['tmp_name'];
                $fileType = $_FILES['photo']['type'];
                $fileSize = $_FILES['photo']['size'];
                $fileErrorMsg = $_FILES['photo']['error'];
                $kaboom = explode('.', $fileName);
                $fileExt = end($kaboom);

                list($width, $height) = getimagesize($fileTempLoc);

                if($width < 10 || $height < 10) {
                    $errors[] = 'That image has no dimensions';
                }
                
                $db_file_name = rand(100000000, 999999999) . "." . $fileExt;

                if($fileSize > 10485760) {
                    $errors[] = 'Your image file was larger then 10mb';
                } else if(!preg_match('/\.(gif|jpg|jpeg|png)$/i', $fileName)) {
                    $errors[] = 'Your image file was not jpg, jpeg, gif or png type';
                } else if($fileErrorMsg == 1) {
                    $errors[] = 'An unknown error occurred';
                }

                $photoFolderLocation = ROOT . 'data/films/full/';
                $photoFolderLocationMin = ROOT . 'data/films/min/';

                $uploadFile = $photoFolderLocation . $db_file_name;
                $moveResult = move_uploaded_file($fileTempLoc, $uploadFile);

                if($moveResult != true) {
                    $errors[] = 'File upload failed';
                }

                require_once(ROOT . "/functions/image_resize_imagick.php");
                $target_file = $photoFolderLocation . $db_file_name;
                $resized_file = $photoFolderLocationMin . $db_file_name;
                $wmax = 137;
                $hmax = 200;
                $img = createThumbnail($target_file, $wmax, $hmax);
                $img->writeImage($resized_file);
            }
        }

        $updateQuery = "UPDATE `films` SET 
            title='".mysqli_real_escape_string($link, $title)."',
            genre='".mysqli_real_escape_string($link, $genre)."',
            year='".mysqli_real_escape_string($link, $year)."',
            description='".mysqli_real_escape_string($link, $description)."',
            photo='".mysqli_real_escape_string($link, $db_file_name)."'
            WHERE id='".mysqli_real_escape_string($link, $id)."' LIMIT 1";

        if(mysqli_query($link, $updateQuery))
            $updateResult = true;
        else
            $updateResult = false;
        
        return $updateResult;
    }

    function film_delete($link, $id) {
        $deleteQuery = "DELETE FROM `films` WHERE id='". mysqli_real_escape_string($link, $id)."' LIMIT 1";
        mysqli_query($link, $deleteQuery);

        if(mysqli_affected_rows($link) > 0) {
            $deleteResult = true;
        } else {
            $deleteResult = false;
        }
        
        return $deleteResult;
    }


    function registration_user($link, $login, $password, $rank) {
        $addUserQuery = "INSERT INTO `users` (`login`, `password`, `rank`) VALUES (
            '".mysqli_real_escape_string($link, $login)."',
            '".mysqli_real_escape_string($link, $password)."',
            '".mysqli_real_escape_string($link, $rank)."'
        )";

        if(mysqli_query($link, $addUserQuery))
            $addResultUser = true;
        else 
            $addResultUser = false;

        return $addResultUser;
    }

    function check_logins($link, $login) {
        $selectUsers = "SELECT `login` FROM `users` WHERE login='".mysqli_real_escape_string($link, $login)."'";

        if($result = mysqli_query($link, $selectUsers) && mysqli_affected_rows($link) > 0) {
            $isLogin = true;
        } else {
            $isLogin = false;
        }

        return $isLogin;
    }

    function check_autorization_data($link, $login, $password) {
        $query = "SELECT * FROM `users` WHERE login='".mysqli_real_escape_string($link, $login)."' AND 
        password='".mysqli_real_escape_string($link, $password)."'";

        if(mysqli_query($link, $query) && mysqli_affected_rows($link) > 0) {
            $dataExist = true;
        } else {
            $dataExist = false;
        }

        return $dataExist;
    }

    function get_rank($link, $login) {
        $queryGetRank = "SELECT `rank` FROM `users` WHERE login='".mysqli_real_escape_string($link, $login)."'";
        if($result = mysqli_query($link, $queryGetRank))
            $rank = mysqli_fetch_array($result);
        
        return $rank;
    }


?>