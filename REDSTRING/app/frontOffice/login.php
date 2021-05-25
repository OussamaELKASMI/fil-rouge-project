<?php include_once "./header.php" ?>

<div class="signupForm flex flex-fd-c flex-ai-c flex-jc-c">
    <h1>Log In</h1>
    <form action="includes/login.inc.php" method="post" class="flex flex-fd-c flex-ai-c">
        
        <div class="email">
            <input type="text" name="email" placeholder="Email...">
        </div>

        <div class="password">
            <input type="password" name="password" placeholder="Password...">
        </div>

        <div class="signUp">
            <button type="submit" name="logIn">Log In</button>
        </div>
    </form>

    <?php
        if(isset($_GET['error'])){
            if($_GET['error'] == "wronglogin"){
                echo "<p>Incorrect login information!</p>";
            }
        }
    ?>
</div>

<?php include_once "footer.php" ?>
