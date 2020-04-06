<?php

require_once '../model/user_model.php';

class UserController
{
    function __construct()
    {

    }

    // *** for add new wine page created by select box *** //
        function select($id)
        {
            $user_select = new User();
            $user = $user_select->select($id);
            return $user;
        }
    // *** for add new wine page created by select box *** //
}

?>