<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login</title>
        <script src="./js/main.js" defer></script>
        <link rel="stylesheet" href="./css/style.css" />
    </head>
    <body>
        <div class="form-container">
            <form 
                onsubmit="validateLogin(event)"
                action="php/login.php" 
                class="main-form"
                method="POST"
            >
                <div class="input-container">
                    <label for="username">Username</label>
                    <input 
                        type="text" 
                        name="username" 
                        id="username" 
                        value="<?= isset($_GET['username']) ? htmlspecialchars(rtrim($_GET['username'], '/')) : '' ?>"
                        maxlength="12" 
                        pattern="[a-zA-Z0-9_]{1,12}" 
                        title="Username must only have letters and numbers"
                    />

                </div>
                <div class="input-container">
                    <label for="password">Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        minlength="8" 
                        maxlength="12"
                        pattern="^(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[$.,\-#])[A-Za-z0-9$.,\-#]{8,12}$" 
                        title="Incorrect password format"
                    />
                </div>
                <div class="button-container">
                    <button 
                        class="button"
                        type="submit"
                        id="submitButton"
                    >Login</button>
                    <button 
                        type="button" 
                        id="registerButton"
                        onclick="location.href = 'php/pages/register.php';"   
                    >Register</button>
                </div>
                <div id="errorField" class="error-field"></div>
            </form>
        </div>
    </body>
</html>
