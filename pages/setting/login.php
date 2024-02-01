<?php
$username = "superadmin";
$password = "superadmin@123";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usernameInput = isset($_POST['username']) ? $_POST['username'] : '';
    $passwordInput = isset($_POST['password']) ? $_POST['password'] : '';

    // Check if the entered username exists in the array and the password is correct
    if (!empty($usernameInput) && !empty($passwordInput)) {
        if ($usernameInput == $username) {
            if ($passwordInput == $password) {
                // Authentication successful
                $_SESSION['username'] = $username;
                header("Refresh:0");
                exit;
            } else {
                echo "<script>alert('Password yang anda masukan salah')</script>";
                header("Refresh:0");
                exit;
            }
        } else {
            echo "<script>alert('Username yang anda masukan salah')</script>";
            header("Refresh:0");
            exit;
        }
    } else {
        echo "<script>alert('Username dan password tidak boleh kosong')</script>";
        header("Refresh:0");
        exit;
    }
}
?>
<div class="row">
    <div class="container pt-5">
        <div class="row justify-content-lg-center">
            <div class="col-lg-5 mb-4">
                <div class="px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
                    <div class="d-flex justify-content-center align-items-center me-md-auto">
                        <i class="bi-lock-fill text-success me-3 fs-5"></i>
                        <h1 class="h5 pt-2">Login Admin</h1>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-body d-grid p-5">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    </div>
                                    <!-- button pengambilan nomor antrian -->
                                    <button type="submit" class="btn btn-success btn-block">
                                        <i class="bi-unlock-fill me-2 fs-4"></i> Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>