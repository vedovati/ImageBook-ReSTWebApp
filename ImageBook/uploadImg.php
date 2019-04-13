<?php
    require 'heder.php';
    session_start();
    if (!isset($_SESSION['id_user'])) {
        Header('Location: login.php');
    }
?>

<main>
    <table class="navbar">
        <tr>
            <td><div class="username-div"><?php echo $_SESSION['username'] ?></div></td>
            <td style="float:right">
                <form action="main.php" method="post">
                    <button style="margin-right: 20px;" class="input-button">back</button>
                </form>
            </td>
        </tr>
    </table>
    <div class='upload-container'>
        <form action="" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" class="inputfile">
            <br><br>DESCRIPTION:
            <input type="text" name="description">
            <input type="submit" value="Upload Image" name="submit_img" class="input-button">
        </form>

        <p style="color: red">
        <?php
            if(isset($_FILES["fileToUpload"])) {

                $target_dir = "img/";
                $target_file = $target_dir . $nFile = date("Ymdhisa") . "_" . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = true;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = false;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == false) {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                        include 'database.php';

                        $query = "INSERT INTO img (path, id_user, description)
                                VALUES (:path, :id_user, :description)";
                    
                        // prepare query
                        $stmt = $conn->prepare($query);
                    
                        // execute query
                        $stmt->execute(array(':path' => $target_file, ':id_user' => $_SESSION['id_user'], ':description' => $_POST["description"]));

                        Header("Location: main.php");
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
        ?>
        </p>
    </div>
</main>

<?php
    require 'footer.php'
?>