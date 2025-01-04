<?php
include 'db.php'; // Inclure la connexion à la base de données

// Récupérer les titres des menus depuis la base de données
$sql = "SELECT id, title FROM menu";
$result = mysqli_query($conn, $sql);

$menus = [];
while ($row = mysqli_fetch_assoc($result)) {
    $menus[] = $row;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $menu_id = mysqli_real_escape_string($conn, $_POST['menu_id']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $number_of_people = mysqli_real_escape_string($conn, $_POST['number_of_people']);
    $user_id = 2; 

    // Vérifier si l'utilisateur existe
    $user_check_sql = "SELECT * FROM users WHERE id = $user_id";
    $user_check_result = mysqli_query($conn, $user_check_sql);

    if (mysqli_num_rows($user_check_result) == 0) {
        // Ajouter un utilisateur si nécessaire
        $add_user_sql = "INSERT INTO users (id, name, email, password, role_id) VALUES ($user_id, 'John Doe', 'johndoe@example.com', 'password123', 1)";
        if (!mysqli_query($conn, $add_user_sql)) {
            echo "Erreur lors de l'ajout de l'utilisateur : " . mysqli_error($conn);
            exit;
        }
    }

    // Insérer la réservation dans la base de données
    $sql = "INSERT INTO reservations (user_id, menu_id, date, time, number_of_people) 
            VALUES ($user_id, $menu_id, '$date', '$time', $number_of_people)";

    if (mysqli_query($conn, $sql)) {
        echo "Réservation ajoutée avec succès";
    } else {
        echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-roboto">
    <!-- Header -->
    <header class="bg-gray-800 shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-gray-800">Victory</a>
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
    <section class="min-h-screen flex items-center justify-center p-6 bg-gray-100">
        <div class="bg-white shadow-lg rounded-lg flex flex-col lg:flex-row overflow-hidden max-w-4xl w-full">
            <!-- Image Section -->
            <div class="lg:w-1/2">
                <img src="img/book_left_image.jpg" alt="Gastronomic Experience" class="w-full h-full object-cover">
            </div>

            <!-- Form Section -->
            <div class="p-8 lg:w-1/2">
                <h2 class="text-3xl font-bold text-gray-800 text-center mb-6">Reserve Your Culinary Experience</h2>
                <form action="reservation.php" method="POST" class="space-y-6">
                    <!-- Select Menu -->
                    <div>
                        <label for="menu" class="block text-sm font-medium text-gray-700">Select Menu</label>
                        <select 
                            id="menu" 
                            name="menu_id" 
                            required 
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm ">
                            <option value="" disabled selected>Select a menu</option>
                            <?php foreach ($menus as $menu): ?>
                                <option value="<?php echo $menu['id']; ?>"><?php echo $menu['title']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Date -->
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700">Reservation Date</label>
                        <input 
                            type="date" 
                            id="date" 
                            name="date" 
                            required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm ">
                    </div>

                    <!-- Time -->
                    <div>
                        <label for="time" class="block text-sm font-medium text-gray-700">Reservation Time</label>
                        <input 
                            type="time" 
                            id="time" 
                            name="time" 
                            required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm ">
                    </div>

                    <!-- Number of People -->
                    <div>
                        <label for="people" class="block text-sm font-medium text-gray-700">Number of People</label>
                        <input 
                            type="number" 
                            id="people" 
                            name="number_of_people" 
                            min="1" 
                            placeholder="Enter number of people" 
                            required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm ">
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button 
                            type="submit" 
                            class="w-full bg-red-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-orange-600 transition duration-300">
                            Reserve Now
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
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