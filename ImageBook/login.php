
<?php 
    require 'heder.php';
    session_start();
?>

<main>
    
    <?php

        include 'database.php';
        include 'user.php';

        $user = new User($conn);

        if (isset($_POST['name'])) {
            $user->username = $_POST['name'];
            $user->password = $_POST['password'];
            $uRet = $user->login();
            $data = $uRet->fetch(PDO::FETCH_ASSOC);
            if ($data == false) {
                echo "<p style='color: red'>error username or password don't match</p>";
            } else {
                $_SESSION['username'] = $data['username'];
                $_SESSION['id_user'] = $data['id'];

                Header('Location: main.php');
                exit();
            }
        }
    ?>
    <script>
        function checkFiled() {
            let name = document.getElementById('name');
            let password = document.getElementById('password');

            if (name.value != '' && password.value != '') {
                document.getElementById('login').submit();
            }
        }
    </script>
    <div class='small-container'>
        <form action="" method="post" id="login">
            &emsp;Username:<br>
            <input type="text" name="name" id="name" placeholder="Username"><br>
            &emsp;Password:<br>
            <input type="password" name="password" id="password" placeholder="Password"><br>
        </form>
        <table>
            <tr>
                <td>
                    <input type="button" name="send" onclick="checkFiled()" value="login" class="input-button">
                </td>
                <td>
                <form action="signin.php" method="post">
                    <input type="submit" name="signin" value="signin" class="input-button">
                </form>
                </td>
            </tr>
        </table>
        
        
    </div>
</main>

<?php
    require 'footer.php'
?>