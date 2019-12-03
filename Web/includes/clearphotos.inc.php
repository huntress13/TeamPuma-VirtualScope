<?php

    if(isset($_POST['microscope_name'])){
        $microscopeName = $_POST['microscope_name'];
        $files = glob('../microscopes/'.$microscopeName.'/images/*'); // get all file names
        foreach($files as $file){ // iterate files
           if(is_file($file))
           unlink($file); // delete file
        }
        exit();
    } else{

        exit();
    }
?>