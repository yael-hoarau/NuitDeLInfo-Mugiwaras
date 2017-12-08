<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
    session_start();
    require ('bd.php');

    function verif_connexion(){
        if(isset($_POST['email']) && !empty($_POST['email']))
        {
            $query = 'SELECT email, password FROM user WHERE email = \'' . $_POST['email'] . '\'';
            $result = mysqli_query($GLOBALS['link'], $query);
            $_SESSION['test_co'] = true;

            if (!$result)
            {
                echo 'Impossible d\'exécuter la requête ', $query, ' : ', mysqli_error($GLOBALS['link']);
            }
            else
            {
                if (mysqli_num_rows($result) != 0 && $_SESSION['password'] == md5($_POST['password']))
                {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['pseudo'] = $row['pseudo'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['type'] = $row['type'];
                    return true;
                }
                else{
                    header('Location: connexion.php');
                }
            }
        }
        return false;
    }

    function verif_inscription(){
        if(isset($_POST['email']) && !empty($_POST['email'])){
            $query = 'SELECT email, password FROM user WHERE email = \'' . $_POST['email'] . '\'';
            $result = mysqli_query($GLOBALS['link'], $query);

            if(mysqli_num_rows($result) != 0 ){
                $_SESSION['alreadyIn'] = true;
                return false;
            }

            $query = 'INSERT INTO user VALUES (\'' . $_POST['pseudo'] .'\', \'' . md5($_POST['password'] .
                    '\', \'' . $_POST['email'] . '\', \'' . $_POST['type'] . '\'') ;
            $result = mysqli_query($GLOBALS['link'], $query);

            if (!$result)
                return false;
            return true;
        }
        return false;
    }