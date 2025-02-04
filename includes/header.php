<header class="bg-dark text-white py-3">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <!-- Logo -->
            <a href="index.php" class="navbar-brand text-white fw-bold">
                <img src="https://www.officelovin.com/wp-content/uploads/2020/05/private-law-office-austin-8.jpg" alt="Muthomi Maru Firm Logo" class="me-2" style="height: 40px;">
                Muthomi Maru Firm
            </a>
            <nav class="d-none d-lg-block">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="about-us.php" class="nav-link text-white">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="services.php" class="nav-link text-white">Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="#testimonials" class="nav-link text-white">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.php" class="nav-link text-white">Contact</a>
                    </li>
                </ul>
            </nav>

            <!-- Call-to-Action Button -->
            <a href="#" class="btn btn-primary d-none d-lg-inline-block" data-bs-toggle="modal" data-bs-target="#loginModal">Login | Register</a>
        </div>
    </div>
</header>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-lock" viewBox="0 0 16 16">
                        <path d="M8 0a3 3 0 1 0 3 3 3 3 0 0 0-3-3ZM8 1a2 2 0 1 1 0 4 2 2 0 0 1 0-4ZM9 8H7v1h2V8zM7 9h2v1H7V9zM6 6v3h4V6H6zM4 5V4h8v1H4zM12 8v6h1V8h1V7H3v1h1v6h1V8h7z"/>
                    </svg> Login to Your Account
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="loginEmail" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="mb-3">
                        <label for="loginRole" class="form-label">Role</label>
                        <select class="form-control" id="loginRole" name="role" required>
                            <option value="admin">Admin</option>
                            <option value="lawyer">Lawyer</option>
                            <option value="client">Client</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
            <div class="modal-footer">
                <p class="text-center w-100">Don't have an account? <a href="#" id="toRegisterModal" class="text-primary">Register here</a></p>
                <!-- Forgot Password -->
                <p class="text-center w-100"><a href="#" id="toForgotPasswordModal" class="text-primary">Forgot Password?</a></p>
            </div>
        </div>
    </div>
</div>


<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                        <path d="M11 7V4h1a1 1 0 0 1 1 1v1h1a1 1 0 0 1 1 1v1h-1v1a1 1 0 0 1-1 1h-1v3H7v-3H6a1 1 0 0 1-1-1V8H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1V4a1 1 0 0 1 1-1h1V0h3v3h1a1 1 0 0 1 1 1v1h1a1 1 0 0 1 1 1v1h-1v1a1 1 0 0 1-1 1h-1V7h-1z"/>
                    </svg> Register for an Account
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="register.php" method="POST">
                    <div class="mb-3">
                        <label for="registerFullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="registerFullName" name="full_name" placeholder="Enter your full name" required>
                    </div>
                    <div class="mb-3">
                        <label for="registerEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="registerEmail" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="registerPhone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="registerPhone" name="phone" placeholder="Enter your phone number" required>
                    </div>
                    <div class="mb-3">
                        <label for="registerIdNumber" class="form-label">ID Number</label>
                        <input type="text" class="form-control" id="registerIdNumber" name="id_number" placeholder="Enter your ID number" required>
                    </div>
                    <div class="mb-3">
                        <label for="registerPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="registerPassword" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="mb-3">
                        <label for="registerConfirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="registerConfirmPassword" name="confirm_password" placeholder="Confirm your password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </form>
            </div>
            <div class="modal-footer">
                <p class="text-center w-100">Already have an account? <a href="#" id="toLoginModal" class="text-primary">Login here</a></p>
            </div>
        </div>
    </div>
</div>

<!-- Forgot Password Modal -->
<div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="forgotPasswordModalLabel">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                        <path d="M8 0a3 3 0 1 0 3 3 3 3 0 0 0-3-3ZM8 1a2 2 0 1 1 0 4 2 2 0 0 1 0-4ZM9 8H7v1h2V8zM7 9h2v1H7V9zM6 6v3h4V6H6zM4 5V4h8v1H4zM12 8v6h1V8h1V7H3v1h1v6h1V8h7z"/>
                    </svg> Forgot Password
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="forgot_password_process.php" method="POST">
                    <div class="mb-3">
                        <label for="forgotPasswordEmail" class="form-label">Enter Your Email</label>
                        <input type="email" class="form-control" id="forgotPasswordEmail" name="email" placeholder="Enter your registered email" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <p class="text-center w-100">Remembered your password? <a href="#" id="toLoginModalFromForgot" class="text-primary">Login here</a></p>
            </div>
        </div>
    </div>
</div>



<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.getElementById('toRegisterModal').addEventListener('click', function() {
        var loginModalEl = document.getElementById('loginModal');
        var loginModal = bootstrap.Modal.getInstance(loginModalEl);
        loginModal.hide();

        var registerModalEl = document.getElementById('registerModal');
        var registerModal = new bootstrap.Modal(registerModalEl);
        registerModal.show();
    });
        document.getElementById('toForgotPasswordModal').addEventListener('click', function() {
        var loginModalEl = document.getElementById('loginModal');
        var loginModal = bootstrap.Modal.getInstance(loginModalEl);
        loginModal.hide();

        var forgotPasswordModalEl = document.getElementById('forgotPasswordModal');
        var forgotPasswordModal = new bootstrap.Modal(forgotPasswordModalEl);
        forgotPasswordModal.show();
    });

    document.getElementById('toLoginModalFromForgot').addEventListener('click', function() {
        var forgotPasswordModalEl = document.getElementById('forgotPasswordModal');
        var forgotPasswordModal = bootstrap.Modal.getInstance(forgotPasswordModalEl);
        forgotPasswordModal.hide();

        var loginModalEl = document.getElementById('loginModal');
        var loginModal = new bootstrap.Modal(loginModalEl);
        loginModal.show();
    });
    document.getElementById('toLoginModal').addEventListener('click', function() {
        var registerModalEl = document.getElementById('registerModal');
        var registerModal = bootstrap.Modal.getInstance(registerModalEl);
        registerModal.hide();

        var loginModalEl = document.getElementById('loginModal');
        var loginModal = new bootstrap.Modal(loginModalEl);
        loginModal.show();
    });

    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
        modal.addEventListener('hidden.bs.modal', function() {
            document.body.classList.remove('modal-open');
            const backdrop = document.querySelector('.modal-backdrop');
            if (backdrop) backdrop.remove();
        });
    });
</script>
