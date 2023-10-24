<?php
    
    $Title          = $_POST['Title'];
    $Author         = $_POST['Author'];
    $Description    = $_POST['Description'];
    $Video_Link     = $_POST['Video_Link'];
    $CreatedDateTime = date('Y-m-d H:i:s');
    $ModifiedDateTime = $CreatedDateTime;
    $sql = "INSERT INTO blogs VALUES
    (NULL, '$Title', '$Author', '$Description', '$Video_Link', '$CreatedDateTime', '$CreatedDateTime')";
    mysqli_query($connection, $sql);
    // Get the ID of the last inserted record
    $Blog_ID = mysqli_insert_id($connection);
    
   
        $fileCount = count($_FILES['Location']['name']);
        if($fileCount>0)
        {
            for($i=0; $i < $fileCount; $i++)
            {
                echo $i;
                $fileTmpName = $_FILES['Location']['tmp_name'][$i];
                $fileType = $_FILES['Location']['type'][$i];
                $guid = uniqid();
                $extension = pathinfo($_FILES['Location']['name'][$i], PATHINFO_EXTENSION);
                $FileLocation = $guid . '.' . $extension;
                $destination = 'images/blog_pictures/' . $FileLocation;
                $sql = "INSERT INTO blog_pictures VALUES
                (NULL, '$Blog_Id', '$Destination')";
                mysqli_query($connection, $sql);
                move_uploaded_file($fileTmpName, $destination);
            }
        }
    
    mysqli_close($connection);
    header("Location: admin_blogs.php");
?>
