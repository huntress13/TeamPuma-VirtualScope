<?php

function displayImages($directory){
    $dir = $directory;
    $filenames = scandir($dir);
    $numOfFiles = sizeof($filenames);

    for($i = sizeof($filenames) -1; $i > 1; $i--){
            echo '
                <div class="col-sm-6 col-md-4">
                        <a href="'.$dir.'/'.$filenames[$i].'" target="_blank">
                            <img class="img-thumbnail img-fluid" src="'.$dir.'/'.$filenames[$i].'" style="width:100%">
                        </a>
                        <div>
                            <p>'.substr($filenames[$i], 0, strrpos($filenames[$i], ".")).'</p>
                        </div>
                </div>';
    }
}

function displayLatest($directory, $number){
    $dir = $directory;

    $filenames = scandir($dir);
    $numOfFiles = sizeof($filenames);
    $firstImage = $numOfFiles - $number;
    if($numOfFiles < 5){
        $firstImage = 2;
    }

    for($i = sizeof($filenames)-1; $i >= $firstImage; $i--){
        echo '
                    <a href="'.$dir.'/'.$filenames[$i].'" target="_blank">
                        <img class="img-thumbnail img-fluid" src="'.$dir.'/'.$filenames[$i].'" style="width:100%">
                    </a>';
    }
}

function getMyMicroscopeName($url){
    $array = explode("/", $url);
    $count = count($array); 
    return $array[$count-1];
}

function getMicroscopeInfo($microscopeName, $conn){
    $sql = "SELECT experiment_name, course_name, availability FROM microscopes WHERE microscope_name = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $microscopeName);
    mysqli_stmt_execute($stmt);
    if(mysqli_stmt_bind_result($stmt, $col1, $col2, $col3)){
            mysqli_stmt_fetch($stmt);
            $experimentName = $col1;
            $courseName = $col2;
            $availability = $col3;
            // Free result set
            mysqli_stmt_close($stmt);
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
    
    // Close connection
    mysqli_close($conn);
}

?>