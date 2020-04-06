<?php

class File_upload
{
    function __construct()
    {

    }
    
    // *** image upload for add new wine *** //
        function file_save($input)
        {
            $fileName = $_FILES[$input]['name'];
            $fileName = strtolower(str_replace(" ","_",$fileName));
            $name=explode('.', $fileName);
            $imageName=sha1($name[0].uniqid()).'.'.$name[1];
            $file_tmp = $_FILES[$input]["tmp_name"];
            $prepare_return = $imageName;
            if(empty($prepare_return['msg'])==true)
            {
               move_uploaded_file($file_tmp,'../images/upload_file/'.$imageName);
            }
            return $prepare_return;
        }
    // *** end image upload for add new wine *** //

}