<?php

function displayImages($directory){
    $dir = $directory;
    $filenames = scandir($dir);
    $numOfFiles = sizeof($filenames);

    for($i = 0; $i < sizeof($filenames)-2; $i++){
            echo '
                <div class="col-sm-6 col-md-4">
                        <a href="'.$dir.'/'.$filenames[$i+2].'" target="_blank">
                            <img class="img-thumbnail img-fluid" src="'.$dir.'/'.$filenames[$i+2].'" style="width:100%">
                        </a>
                        <div>
                            <p>'.$filenames[$i+2].'</p>
                        </div>
                </div>';
    }
}

function displayLatest($directory, $number){
    $dir = $directory;

    $filenames = scandir($dir);
    $numOfFiles = sizeof($filenames); 
    $firstImage = $numOfFiles - $number;

    for($i = $firstImage; $i < sizeof($filenames); $i++){
        echo '
                    <a href="'.$dir.'/'.$filenames[$i].'" target="_blank">
                        <img class="img-thumbnail img-fluid" src="'.$dir.'/'.$filenames[$i].'" style="width:100%">
                    </a>';
}


}

?>