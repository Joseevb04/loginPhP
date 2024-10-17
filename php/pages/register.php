<!doctype html>
<html lang="es">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>REGISTRO</title>
        <script src="../../js/main.js" defer></script>
        <link rel="stylesheet" href="../../css/style.css" />
    </head>

    <body>
        <?php
        require('../utils/connection.php');
        $userTypeQuery = 'select * from type_user;';
        $mysqli = connectDb("user_db", "root");

        $userTypeResult = $mysqli->query($userTypeQuery);
        ?>
        <main>
            <h1>User registration form</h1>
            <div class="form-container">
                <form
                    onsubmit="validateRegister(event)"
                    action="../insertUser.php"
                    class="main-form"
                    method="POST">

            <div id="errorField" class="error_field"></div>
                    <div class="input-container">
                        <label for="nameInput">Name</label>
                        <input type="text" id="nameInput" name="name" />
                    </div>
                    <div class="input-container">
                        <label for="emailInput">Email</label>
                        <input type="email" id="emailInput" name="email" />

                    </div>
                    <div class="input-container">

                        <label for="typeUser">User Type</label>
                        <select name="type_user" id="typeUser">
                            <?php
                            while ($row = $userTypeResult->fetch_assoc()) {
                            echo '<option value="' . $row['id'] . '">' . $row['type_user'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-container">

                        <label for="userInput">Username</label>
                        <input type="text" id="userInput" name="username" />
                    </div>
                    <div class="input-container">

                        <label for="passwordInput">Password</label>
                        <input
                            type="password"
                            id="passwordInput"
                            name="password"
                            data-password="main" />
                    </div>
                    <div class="input-container">

                        <label for="repeatPasswordInput">Repeat password</label>
                        <input
                            type="password"
                            id="repeatPasswordInput"
                            data-password="secondary" />
                    </div>

                    <div class="button-container">
                        <button type="submit" id="submitButton">Submit</button>
                        <p>Already have an account?</p>
                        <button
                            type="button"
                            id="loginButton"
                            onclick="location.href = '../../index.php';">Login</button>
                    </div>
                </form>
            </div>
        </main>
    </body>

</html>
