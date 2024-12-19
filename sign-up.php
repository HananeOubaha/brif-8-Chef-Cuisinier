<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-gray-800 shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-white">Victory</a>
            <nav>
                <div class="space-x-4">
                    <a href="index.php" class="text-white hover:text-red-600">Home</a>
                    <a href="menu.php" class="text-white hover:text-red-600">Our Menus</a>
                    <a href="Dashbord.php" class="text-white hover:text-red-600">Chef Dashboard</a>
                    <a href="reservation.php" class="text-white hover:text-red-600">Reservation</a>
                </div>
            </nav>
        </div>
    </header>

    <!-- Sign Up Section -->
    <section class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Create Your Account</h2>
            <form id="registrationForm" action="" method="POST" class="space-y-6">
                <!-- Full Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        placeholder="John Doe" 
                        required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="johndoe@example.com" 
                        required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="••••••••" 
                        required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>

                <!-- Role -->
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select 
                        id="role" 
                        name="role_id" 
                        required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    >
                        <option value="2">Utilisateur</option>
                        <option value="1">Chef</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div>
                    <button 
                        type="submit" 
                        class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                        Create Account
                    </button>
                </div>
            </form>
            <p class="text-sm text-center text-gray-600 mt-4">
                Already have an account? <a href="log-in.php" class="text-blue-600 hover:underline">Log in</a>
            </p>
        </div>
    </section>

<script>
    // Regex patterns
    const namePattern = /^[a-zA-Z\s]+$/; // Only letters and spaces
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Basic email pattern
    const passwordPattern = /^.{8,}$/; // At least 8 characters

    // Form element
    const form = document.getElementById('registrationForm');

    form.addEventListener('submit', function (e) {
        // Get input values
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        // Validation checks
        const isNameValid = namePattern.test(name);
        const isEmailValid = emailPattern.test(email);
        const isPasswordValid = passwordPattern.test(password);

        // Block submission if any validation fails
        if (!isNameValid || !isEmailValid || !isPasswordValid) {
            e.preventDefault(); // Prevent form submission
            // Optionally, you can add a visual cue like a border color change
            if (!isNameValid) {
                document.getElementById('name').classList.add('border-red-500');
            } else {
                document.getElementById('name').classList.remove('border-red-500');
            }

            if (!isEmailValid) {
                document.getElementById('email').classList.add('border-red-500');
            } else {
                document.getElementById('email').classList.remove('border-red-500');
            }

            if (!isPasswordValid) {
                document.getElementById('password').classList.add('border-red-500');
            } else {
                document.getElementById('password').classList.remove('border-red-500');
            }
        }
    });
</script>

     <!-- Footer -->
     <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto grid md:grid-cols-3 gap-4 text-center">
            <p>&copy; 2024-2026 chef-me</p>
            <div class="space-x-4">
                <a href="#" class="hover:text-gray-300">Facebook</a>
                <a href="#" class="hover:text-gray-300">Twitter</a>
                <a href="#" class="hover:text-gray-300">LinkedIn</a>
            </div>
            <p>Designed by <em>Hanane Oubaha</em></p>
        </div>
    </footer>
</body>
</html>
<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $role_id = intval($_POST['role_id']);

    // Vérifier si l'utilisateur existe déjà
    $checkUser = "SELECT * FROM users WHERE email = ?";
    $stmtCheck = mysqli_prepare($conn, $checkUser);

    if ($stmtCheck) {
        mysqli_stmt_bind_param($stmtCheck, "s", $email);
        mysqli_stmt_execute($stmtCheck);
        $result = mysqli_stmt_get_result($stmtCheck);

        if (mysqli_num_rows($result) > 0) {
            echo "Cet email est déjà enregistré.";
        } else {
            // Hasher le mot de passe
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insérer un nouvel utilisateur
            $query = "INSERT INTO users (name, email, password, role_id) VALUES (?, ?, ?, ?)";
            $stmtInsert = mysqli_prepare($conn, $query);

            if ($stmtInsert) {
                mysqli_stmt_bind_param($stmtInsert, "sssi", $name, $email, $hashedPassword, $role_id);

                if (mysqli_stmt_execute($stmtInsert)) {
                    echo "Inscription réussie. Vous pouvez maintenant vous connecter.";
                } else {
                    echo "<p class='text-red-500 text-center'>Erreur lors de l'inscription : " . mysqli_error($conn) . "</p>";
                }
                mysqli_stmt_close($stmtInsert);
            } else {
                echo "<p class='text-red-500 text-center'>Erreur lors de la préparation de la requête : " . mysqli_error($conn) . "</p>";
            }
        }

        mysqli_stmt_close($stmtCheck);
    } else {
        echo "<p class='text-red-500 text-center'>Erreur lors de la préparation de la requête : " . mysqli_error($conn) . "</p>";
    }
}

mysqli_close($conn);
?>
