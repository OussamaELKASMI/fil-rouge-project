<?php include_once "./header.php" ?>

<div class="signupForm flex flex-fd-c flex-ai-c flex-jc-c">
    <h1>Sign Up</h1>
    <form action="includes/signup.inc.php" method="post" class="flex flex-fd-c flex-ai-c">
        <div class="name">
            <input type="text" name="name" placeholder="Name...">
        </div>

        <div class="prename">
            <input type="text" name="prename" placeholder="Preame...">
        </div>

        <div class="birthday">
            <input type="date" name="birthday" placeholder="Birthday...">
        </div>

        <div class="gender">
            <input type="radio" name="gender" value="male">Male
            <input type="radio" name="gender">Female
        </div>

        <div class="adress">
            <input type="text" name="adress" placeholder="Adress...">
        </div>

        <div class="phone">
            <input type="text" name="phone" placeholder="Phone number...">
        </div>

        <div class="email">
            <input type="text" name="email" placeholder="Email...">
        </div>

        <div class="password">
            <input type="password" name="password" placeholder="Password...">
        </div>

        <div class="repeatPassword">
            <input type="password" name="rpassword" placeholder="Repeat password...">
        </div>

        <div class="signUp">
            <button type="submit" name="signUp">Sign Up</button>
        </div>
    </form>

    <?php
        if(isset($_GET['error'])){
            if($_GET['error'] == "emptyinput"){
                echo "<p>Fill in all fields!</p>";
            }
            else if($_GET['error'] == "invalidemail"){
                echo "<p>Invalid email!</p>";
            }
            else if($_GET['error'] == "unmachedpassword"){
                echo "<p>Passwords are not identical!</p>";
            }
            else if($_GET['error'] == "emailtaken"){
                echo "<p>An acount already exits with that email!</p>";
            }
            else if($_GET['error'] == "stmtfailed"){
                echo "<p>Something went wrong please try again!</p>";
            }
            else if($_GET['error'] == "none"){
                echo "<p>You have signed up!</p>";
                header("Location: ./login.php");
            }
        }
    ?>
</div>

<?php include_once "footer.php" ?>
