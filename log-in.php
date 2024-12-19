<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
     <!-- Header -->
     <header class="bg-gray-800 shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-gray-800">Victory</a>
            <nav>
                <div class="space-x-4">
                    <a href="index.php" class="text-white hover:text-red-600">Home</a>
                    <a href="menu.php" class="text-white hover:text-red-600">Our Menus</a>
                    <a href="Dashbord.php" class="text-white hover:text-red-600">Chef Dashboard</a>
                    <a href="reservation.php" class="text-white hover:text-red-600">reservation</a>
                </div>
            </nav>
        </div>
    </header>
    <section class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login to Your Account</h2>
            <form id="loginForm" method="POST" class="space-y-6">
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="Enter your email" 
                        required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    />
                    <p id="emailError" class="text-sm text-red-500 hidden">Please enter a valid email address.</p>
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
                    <p id="passwordError" class="text-sm text-red-500 hidden">Password must be at least 8 characters, include a number and a letter.</p>
                </div>
            
                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center text-sm text-gray-600">
                        <input 
                            type="checkbox" 
                            class="mr-2 text-blue-600 focus:ring-blue-500"
                        />
                        Remember Me
                    </label>
                    <a href="/forgot-password" class="text-sm text-blue-600 hover:underline">Forgot Password?</a>
                </div>
            
                <!-- Submit Button -->
                <div>
                    <button 
                        type="submit" 
                        class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                        Log In
                    </button>
                </div>
            </form>
            
            <p class="text-sm text-center text-gray-600 mt-4">
                Don't have an account? <a href="sign-up.html" class="text-blue-600 hover:underline">Sign Up</a>
            </p>
        </div>
    </section>
            <script>
                // Sélection du formulaire
                const loginForm = document.getElementById('loginForm');
                const emailInput = document.getElementById('email');
                const passwordInput = document.getElementById('password');
                const emailError = document.getElementById('emailError');
                const passwordError = document.getElementById('passwordError');
            
                // Fonction de validation
                function validateForm(event) {
                    let isValid = true;
            
                    // Regex pour email
                    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                    if (!emailRegex.test(emailInput.value)) {
                        emailError.classList.remove('hidden');
                        emailInput.classList.add('border-red-500');
                        isValid = false;
                    } else {
                        emailError.classList.add('hidden');
                        emailInput.classList.remove('border-red-500');
                    }
            
                    // Regex pour mot de passe
                    const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
                    if (!passwordRegex.test(passwordInput.value)) {
                        passwordError.classList.remove('hidden');
                        passwordInput.classList.add('border-red-500');
                        isValid = false;
                    } else {
                        passwordError.classList.add('hidden');
                        passwordInput.classList.remove('border-red-500');
                    }
            
                    // Si non valide, empêcher la soumission
                    if (!isValid) {
                        event.preventDefault();
                    }
                }
            
                // Ajouter l'événement de validation au formulaire
                loginForm.addEventListener('submit', validateForm);
            </script>
             <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 ">
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
