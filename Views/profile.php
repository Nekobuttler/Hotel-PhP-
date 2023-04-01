<!DOCTYPE html>
<html>

<head>
    <title>User Profile</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/forProfile.css">
</head>

<body>
    <div class="container">
        <div class="profile card">
            <h1 class="card-header">User Profile</h1>
            <div class="card-body">
                <form>

                    <div class="">

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="Enter your email">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="email">Nombre:</label>
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="Enter your email">
                        </div>

                        <div class="form-group">
                            <label for="apellidos">Apellidos:</label>
                            <input type="text" id="apellidos" name="apellidos" class="form-control"
                                placeholder="Enter your lastname">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Tipo de Documento">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email">
                    </div>

                    <div class="form-group">
                        <label for="apellidos">Identidad:</label>
                        <input type="text" id="apellidos" name="apellidos" class="form-control"
                            placeholder="Enter your lastname">
                    </div>

                    <div class="form-group">
                        <label for="apellidos">Telefono:</label>
                        <input type="text" id="apellidos" name="apellidos" class="form-control"
                            placeholder="Enter your lastname">
                    </div>

                    <div class="form-group">
                        <label for="apellidos">Direccion:</label>
                        <input type="text" id="apellidos" name="apellidos" class="form-control"
                            placeholder="Enter your lastname">
                    </div>

                    <div class="form-group">
                        <label for="apellidos">Tipo de Usuario:</label>
                        <input type="text" id="apellidos" name="apellidos" class="form-control"
                            placeholder="Enter your lastname">
                    </div>

                    <div class="form-group">
                        <label for="apellidos">Fecha Nacimiento:</label>
                        <input type="text" id="apellidos" name="apellidos" class="form-control"
                            placeholder="Enter your lastname">
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" class="form-control"
                            placeholder="Enter your password">
                    </div>

                    
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
                <div class="delete mt-3">
                    <button id="delete-account" class="btn btn-danger">Delete Account</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>

</html>