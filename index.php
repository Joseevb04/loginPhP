<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login</title>

        <!-- Bootstrap CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <script src="./js/main.js" defer></script>
        <link rel="stylesheet" href="./css/style.css" />
    </head>
    <body>
        <div class="d-flex flex-column align-items-center justify-content-center p-1 bg-dark-subtle">
            <h2>Login User</h2>
            <form 
                onsubmit="validateLogin(event)"
                action="php/login.php" 
                class="main-form"
                method="POST"
            >
                <div class="form-group mb-3">
                    <label for="username" class="mb-2">Username</label>
                    <input 
                        type="text" 
                        name="username" 
                        class="form-control text-muted"
                        id="username" 
                        value="<?= isset($_GET['username']) ? htmlspecialchars(rtrim($_GET['username'], '/')) : '' ?>"
                        maxlength="12" 
                        pattern="[a-zA-Z0-9_]{1,12}" 
                        title="Username must only have letters and numbers"
                    />

                </div>
                <div class="form-group">
                    <label for="password" class="mb-2">Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        class="form-control text-muted"
                        id="password" 
                        minlength="8" 
                        maxlength="12"
                        pattern="^(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[$.,\-#])[A-Za-z0-9$.,\-#]{8,12}$" 
                        title="Incorrect password format"
                    />
                </div>
                <div class="form-group mt-5">
                    <button 
                        class="btn btn-primary"
                        type="submit"
                        id="submitButton"
                    >Login</button>
                    <button 
                        class="btn btn-secondary"
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
