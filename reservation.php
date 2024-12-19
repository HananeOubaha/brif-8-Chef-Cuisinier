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
                    <a href="reservation.php" class="text-white hover:text-red-600">reservation</a>
                </div>
            </nav>
        </div>
    </header>
    <section class="min-h-screen flex items-center justify-center p-6 bg-gray-100">
        <div class="bg-white shadow-lg rounded-lg flex flex-col lg:flex-row overflow-hidden max-w-4xl w-full">
            <!-- Image Section -->
            <div class="lg:w-1/2">
                <img src="img/book_left_image.jpg "alt="Gastronomic Experience" class="w-full h-full object-cover">
            </div>

            <!-- Form Section -->
            <div class="p-8 lg:w-1/2">
                <h2 class="text-3xl font-bold text-gray-800 text-center mb-6">Reserve Your Culinary Experience</h2>
                <form action="/reserve" method="POST" class="space-y-6">
                    <!-- Select Menu -->
                    <div>
                        <label for="menu" class="block text-sm font-medium text-gray-700">Select Menu</label>
                        <select 
                            id="menu" 
                            name="menu_id" 
                            required 
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="" disabled selected>Select a menu</option>
                            <option value="1">Menu 1: Gourmet Delights</option>
                            <option value="2">Menu 2: Chef's Special</option>
                            <option value="3">Menu 3: Vegan Feast</option>
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
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Time -->
                    <div>
                        <label for="time" class="block text-sm font-medium text-gray-700">Reservation Time</label>
                        <input 
                            type="time" 
                            id="time" 
                            name="time" 
                            required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
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
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button 
                            type="submit" 
                            class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
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
