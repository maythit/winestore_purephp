<?php

require_once '../model/category_model.php';

class CategoryController
{
    function __construct()
    {

    }

    // *** for add new wine page select box *** //
        function select($id)
        {
            $category_select = new Category();
            $cate = $category_select->select($id);
            return $cate;
        }
    // *** for add new wine page select box *** //

    

}

?>