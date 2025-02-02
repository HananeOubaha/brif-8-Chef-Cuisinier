<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mama Chef</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Spectral:wght@200;300;400;500;600;700;800&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
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
                    <a href="reservation.php" class="text-white hover:text-red-600">reservation</a>
                </div>
            </nav>
        </div>
    </header>

    <!-- Banner -->
    <section class="bg-cover bg-center h-[600px] flex items-center" style="background-image: url('img/cook_01.jpg')">
        <div class="container mx-auto text-center text-white bg-black bg-opacity-50 p-8 rounded-lg">
            <h4 class="text-xl mb-4 italic">"Savourez l'Excellence Culinaire à Domicile avec Notre Chef !"</h4>
            <h2 class="text-5xl font-bold mb-4">MAMA CHEF</h2>
            <p class="text-lg mb-6">"Vivez une expérience unique avec un chef de renommée mondiale : <br> menus exclusifs, cuisine raffinée et moments inoubliables, <br> directement à domicile."</p>
            <div class="flex justify-center gap-4">
                <a href="sign-up.php" class="bg-red-600 text-white px-6 py-3 rounded-full hover:bg-red-700 transition">sign up </a>
                <a href="log-in.php" class="bg-red-600 text-white px-6 py-3 rounded-full hover:bg-red-700 transition">log in </a>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="py-16">
        <div class="container mx-auto">
            <div class="grid grid-cols-4 gap-6">
                <div class="text-center">
                    <img src="img/cook_breakfast.png" alt="Breakfast" class="mx-auto mb-4 w-32 h-32">
                    <h4 class="text-xl font-semibold">Breakfast</h4>
                </div>
                <div class="text-center">
                    <img src="img/cook_lunch.png" alt="Lunch" class="mx-auto mb-4 w-32 h-32">
                    <h4 class="text-xl font-semibold">Lunch</h4>
                </div>
                <div class="text-center">
                    <img src="img/cook_dinner.png" alt="Dinner" class="mx-auto mb-4 w-32 h-32">
                    <h4 class="text-xl font-semibold">Dinner</h4>
                </div>
                <div class="text-center">
                    <img src="img/cook_dessert.png" alt="Desserts" class="mx-auto mb-4 w-32 h-32">
                    <h4 class="text-xl font-semibold">Desserts</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- Reservation -->
    <section id="book-table" class="bg-gray-100 py-16">
        <div class="container mx-auto">
            <h2 class="text-3xl text-center mb-12 font-bold">Book Your Table Now</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <div>
                    <img src="img/book_left_image.jpg" alt="Reservation" class="rounded-lg shadow-lg">
                </div>
                <div>
                    <form class="bg-white p-8 rounded-lg shadow-md">
                        <div class="grid md:grid-cols-2 gap-4">
                            <select class="w-full p-2 border rounded" required>
                                <option value="">Select day</option>
                                <option>Monday</option>
                                <option>Tuesday</option>
                                <option>Wednesday</option>
                                <option>Thursday</option>
                                <option>Friday</option>
                                <option>Saturday</option>
                                <option>Sunday</option>
                            </select>
                            <select class="w-full p-2 border rounded" required>
                                <option value="">Select hour</option>
                                <option>10:00</option>
                                <option>12:00</option>
                                <option>14:00</option>
                                <option>16:00</option>
                                <option>18:00</option>
                                <option>20:00</option>
                                <option>22:00</option>
                            </select>
                            <input type="text" placeholder="Full name" class="w-full p-2 border rounded" required>
                            <input type="tel" placeholder="Phone number" class="w-full p-2 border rounded" required>
                            <select class="w-full p-2 border rounded" required>
                                <option value="">How many persons?</option>
                                <option>1 Person</option>
                                <option>2 Persons</option>
                                <option>3 Persons</option>
                                <option>4 Persons</option>
                                <option>5 Persons</option>
                                <option>6 Persons</option>
                            </select>
                            <button type="submit" class="bg-red-600 text-white p-2 rounded hover:bg-red-700">Book Table</button>
                        </div>
                    </form>
                </div>
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

