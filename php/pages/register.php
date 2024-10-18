<!doctype html>
<html lang="es">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>REGISTRO</title>

        <!-- Bootstrap CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <script src="../../js/main.js" defer></script>
        <link rel="stylesheet" href="../../css/style.css" />
    </head>

    <body class="vh-100">
        <?php
        require('../utils/connection.php');
        $userTypeQuery = 'select * from type_user;';
        $mysqli = connectDb("user_db", "root");

        $userTypeResult = $mysqli->query($userTypeQuery);
        ?>
        <main class="d-flex h-100 flex-column align-items-center gap-5 p-1">
            <h2 class="mt-5 mb-5">User registration form</h2>
            <form
                onsubmit="validateRegister(event)"
                action="../insertUser.php"
                class="main-form bg-dark-subtle mt-3 w-50"
                method="POST">

                <div id="errorField" class="error-field">
                    <?php 
                    if(isset($_GET['error'])) {
                    $error = $_GET['error'];

                    switch ($error) {
                        case '1':
                            echo '<p>An unexpected error occured</p>';
                            break;

                        case '2':
                            echo '<p>That email is not authorized to register as an admin user</p>';
                        }
                    }
                    ?>
                </div>

                <div class="form-group mb-3 m-0 row">
                    <div class="col m-0">
                        <label for="nameInput" class="m-0 mb-2">Name</label>
                        <input 
                            type="text"
                            id="nameInput" 
                            name="name" 
                            class="form-control text-muted m-0"/>
                    </div>
                    <div class="col m-0">
                        <label for="userInput" class="m-0 mb-2">Username</label>
                        <input 
                            type="text" 
                            id="userInput" 
                            name="username"
                            class="form-control text-muted m-0"/>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="typeUser" class="m-0 mb-2">User Type</label>
                    <select 
                        name="type_user" 
                        id="typeUser"
                        class="form-select text-muted m-0">
                        <?php
                        while ($row = $userTypeResult->fetch_assoc()) {
                        if ($row['id'] === '0') {
                        echo '<option disabled selected hidden value="' . $row['id'] . '">Select an user type</option>';
                        } else {
                        echo '<option value="' . $row['id'] . '">' . $row['type_user'] . '</option>';

                        }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="emailInput" class="m-0 mb-2">Email</label>
                    <input 
                        type="email" 
                        id="emailInput" 
                        name="email"
                        class="form-control text-muted m-0"/>
                </div>
                <div class="form-group mb-3 m-0 row">
                    <div class="col m-0">
                        <label for="passwordInput" class="m-0 mb-2">Password</label>
                        <input
                            type="password"
                            id="passwordInput"
                            name="password"
                            data-password="main"
                            class="form-control text-muted m-0"/>
                    </div>
                    <div class="col m-0">
                        <label for="repeatPasswordInput" class="m-0 mb-2">Repeat password</label>
                        <input
                            type="password"
                            id="repeatPasswordInput"
                            data-password="secondary"
                            class="form-control text-muted m-0"/>
                    </div>
                </div>

                <div class="form-group mt-4 d-flex justify-content-between align-items-end mb-3">
                    <button class="btn btn-primary fs-4 m-0" type="submit" id="submitButton">Submit</button>
                    <div class="d-flex flex-column align-items-start">
                        <span class="m-0 mb-2">Already have an account?</span>
                        <button class="btn btn-secondary fs-4 m-0" type="button" id="loginButton" onclick="location.href = '../../index.php';">Login</button>
                    </div>
                </div>
            </form>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>

</html>
