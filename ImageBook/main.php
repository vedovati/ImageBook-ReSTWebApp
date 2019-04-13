<?php
    require 'heder.php';
    session_start();
    if (isset($_POST['loggingout'])) {
        session_unset(); 
        session_destroy(); 
    }
    if (!isset($_SESSION['id_user'])) {
        Header('Location: login.php');
    }
?>

<main>
    <table class="navbar">
        <tr>
            <td><div class="username-div"><?php echo $_SESSION['username'] ?>&emsp;<span class="logout" onclick="logout()">Logout</span></div></td>
            <td style="float:right">
                <form action="uploadImg.php" method="post">
                    <button style="margin-right: 20px;" class="input-button">Upload</button>
                </form>
            </td>
        </tr>
    </table>

    <script>
        function logout() {
            document.getElementById('logoutForm').submit()
        }
        // fun when clik like
        function likedImg(idImg) {
            let inputLike = document.getElementById('inputLike');
            let likeForm = document.getElementById('likeForm');

            inputLike.value = idImg;
            likeForm.submit();
        }
    </script>
    <!-- form for logout -->
    <form id="logoutForm" action="" method="post">
        <input type="hidden" value="0" name="loggingout" id="loggingout">
    </form>
    <!-- form for likes -->
    <form id="likeForm" action="" method="post">
        <input type="hidden" value="0" name="inputLike" id="inputLike">
    </form>
    <?php
        
        include 'database.php';

        // when clicked on like button
        if (isset($_POST['inputLike'])) {
            $idImg = (int)$_POST['inputLike'];
            if ($idImg > 0) {
                // increment like to the image
                $query = "UPDATE img
                          SET likes = likes + 1
                          WHERE id = ". $idImg .";";
                
                $conn->query($query);
            }
        }
        
        // take page from url
        $nPage = 1;
        if (isset($_GET['page'])) {
            if ($nPage > 0) {
                $nPage = $_GET['page'];
            }
        }

        // take images from database
        $query = "SELECT i.id, i.path, u.username, i.description, i.likes, i.time
                  FROM img as i
                  JOIN users as u on (i.id_user = u.id)
                  ORDER BY time DESC";
        
        
        $stmt = $conn->query($query);        

        // print images
        $i = 0;
        foreach ($stmt as $row) {
            if ($i >= ($nPage - 1) * 5 && $i < ($nPage) * 5) {
                echo ("
                    <br>
                    <div class='cont-img'>
                        <h3>&emsp;".  $row['username'] ."</h3>
                        <img src='". $row['path'] ."' class='img-in'>
                        <div style='margin-left: 10px; margin-right: 10px;'>
                        <span class='desc'>". $row['description'] ."</span>
                        <br><span class='date'>". $row['time'] ."</span>
                        <br><button class='likes' onclick='likedImg(". $row['id'] .")'>". $row['likes'] ." Likes</button>
                        </div>
                    </div>
                    <br>
                ");
            }
            $i++;
        }

        // navigatio buttons
        $n = (int)$nPage;
        $n -= 1;
        echo "<br><table style='margin: 0 auto;'><tr>";
        if ($nPage > 1) {
            $n = (int)$nPage;
            $n -= 1;
            echo "
                <td>
                    <form method='get'>
                        <button class='nav-btn' name='page' value=". $n.">&lt; Previous</button>
                    </form>
                </td>
            ";
        }
        if ($nPage * 5 <= $i) {
            $n = (int)$nPage;
            $n += 1;
            echo "
                <td>
                    <form method='get'>
                        <button class='nav-btn' name='page' value=". $n .">Next &gt;</button>
                    </form>
                </td>
            ";
        }
        echo "</tr></table><br>";

    ?>
</main>

<?php
    require 'footer.php'
?>