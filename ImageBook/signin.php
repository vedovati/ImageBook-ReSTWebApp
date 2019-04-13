<?php 
    require 'heder.php';
?>

<main>
    <?php

        session_start();

        include 'database.php';
        include 'user.php';

        $user = new User($conn);

        if (isset($_POST['name'])) {
            $user->username = $_POST['name'];
            $user->password = $_POST['passworda'];
            if(!$user->signup()) {
                echo "<p style='color: red'>error username already tooks</p>";
            } else {
                Header('Location: login.php');
                exit();
            }
        }
    ?>
    <script>
        function checkFiled() {
            let name = document.getElementById('name');
            let passworda = document.getElementById('passworda');
            let passwordb = document.getElementById('passwordb');

            if (name.value != '' && passworda.value != '' && passworda.value == passwordb.value) {
                document.getElementById('signin').submit();
            }
        }
    </script>
    <div class="small-container">
        <form action="" method="post" id="signin">
            &emsp;Username:<br>
            <input type="text" name="name" id="name" placeholder="Username"><br>
            &emsp;Password:<br>
            <input type="password" name="passworda" id="passworda" placeholder="Password"><br>
            <input type="password" name="passwordb" id="passwordb" placeholder="Conferma Password"><br>
        </form>
        <table>
            <tr>
                <td>
                    <input type="button" name="send" onclick="checkFiled()" value="signin" class="input-button">
                </td>
                <td>
                    <form action="login.php" method="post">
                        <input type="submit" name="login" value="login" class="input-button">
                    </form>
                </td>
            </tr>
        </table>
    </div>
</main>

<?php
    require 'footer.php'
?>