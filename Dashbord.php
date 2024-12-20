<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Header -->
    <header class="bg-gray-800 shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-white">Victory</a>
            <nav class="space-x-4">
                <a href="index.php" class="text-white hover:text-red-600">Home</a>
                <a href="menu.php" class="text-white hover:text-red-600">Our Menus</a>
                <a href="Dashbord.php" class="text-white hover:text-red-600">Chef Dashboard</a>
                <a href="reservation.php" class="text-white hover:text-red-600">Reservation</a>
            </nav>
        </div>
    </header>

    <!-- Dashboard Content -->
<main class="container mx-auto px-4 py-6">
    <!-- Add Menu Section -->
    <section class="bg-white shadow-md rounded-lg p-6 mb-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Créer un Menu</h2>
        <form id="menu-form" class="space-y-4" action="Dashbord.php" method="POST" enctype="multipart/form-data">
            <div>
                <label for="menu-title" class="block text-gray-600 font-medium">Titre du Menu</label>
                <input type="text" id="menu-title" name="title" class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-300" required>
            </div>
            <div>
                <label for="menu-description" class="block text-gray-600 font-medium">Description</label>
                <textarea id="menu-description" name="description" class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-300" rows="3" required></textarea>
            </div>
            <div id="plats-container" class="space-y-4">
                <div class="plat-item flex space-x-4">
                    <button type="button" id="add-plat-field" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Ajouter un Plat</button>
                </div>
            </div>
            <div class="flex justify-end space-x-4 mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Créer Menu</button>
            </div>
        </form>
    </section>

    <!-- Display Added Menus -->
    <section class="bg-white shadow-md rounded-lg p-6 mb-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Menus Ajoutés</h2>
        <ul id="menus-list" class="space-y-4">
            <!-- Menus will be dynamically added here -->
        </ul>
    </section>
</main>

<!-- Modal for Adding Plat Details -->
<div id="plat-modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
        <h3 class="text-xl font-semibold mb-4">Ajouter un Plat</h3>
        <form id="plat-form" class="space-y-4" action="Dashbord.php" method="POST" enctype="multipart/form-data">
            <div>
                <label for="plat-name" class="block text-gray-600 font-medium">Nom du Plat</label>
                <input type="text" id="plat-name" class="w-full border rounded-lg px-4 py-2 " required>
            </div>
            <div>
                <label for="plat-ingredients" class="block text-gray-600 font-medium">Ingrédients</label>
                <textarea id="plat-ingredients" class="w-full border rounded-lg px-4 py-2 " rows="3" required></textarea>
            </div>
            <div>
                <label for="plat-image" class="block text-gray-600 font-medium">Image du Plat</label>
                <input type="file" id="plat-image" class="w-full border rounded-lg px-4 py-2 " accept="image/*" required>
            </div>
            <div class="flex justify-end space-x-4 mt-4">
                <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orang-600">Ajouter</button>
                <button type="button" id="close-modal" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Annuler</button>
            </div>
        </form>
    </div>
</div>

<script>
// Variables
const platsContainer = document.getElementById('plats-container');
const addPlatFieldButton = document.getElementById('add-plat-field');
const platModal = document.getElementById('plat-modal');
const closeModalButton = document.getElementById('close-modal');
const platForm = document.getElementById('plat-form');
const menuForm = document.getElementById('menu-form');
const menusList = document.getElementById('menus-list');
let platsData = []; // Array to store plat data

// Show the modal
addPlatFieldButton.addEventListener('click', () => {
    platModal.classList.remove('hidden');
});

// Close the modal
closeModalButton.addEventListener('click', () => {
    platModal.classList.add('hidden');
});

// Handle Plat Form Submission
platForm.addEventListener('submit', (e) => {
    e.preventDefault();

    const platName = document.getElementById('plat-name').value;
    const platIngredients = document.getElementById('plat-ingredients').value;
    const platImage = document.getElementById('plat-image').files[0];

    // Display the image as a preview
    const reader = new FileReader();
    reader.onload = function(event) {
        const plat = {
            name: platName,
            ingredients: platIngredients,
            image: event.target.result
        };
        platsData.push(plat);

        // Close the modal
        platModal.classList.add('hidden');

        // Reset form
        platForm.reset();
    };
    reader.readAsDataURL(platImage);
});

// Handle Menu Form Submission
menuForm.addEventListener('submit', (e) => {
    e.preventDefault();

    const title = document.getElementById('menu-title').value;
    const description = document.getElementById('menu-description').value;

    const menuItem = document.createElement('li');
    menuItem.classList.add('bg-gray-50', 'p-4', 'rounded-lg', 'shadow');
    menuItem.innerHTML = `
        <h3 class="text-lg font-semibold text-gray-700">${title}</h3>
        <p class="text-sm text-gray-500">${description}</p>
        <ul class="mt-2 space-y-2">
            ${platsData.map(plat => `
                <li class="flex space-x-4">
                    <img src="${plat.image}" alt="${plat.name}" class="w-16 h-16 object-cover rounded-lg">
                    <div>
                        <h4 class="font-semibold">${plat.name}</h4>
                        <p class="text-sm text-gray-600">${plat.ingredients}</p>
                    </div>
                </li>
            `).join('')}
        </ul>
    `;

    menusList.appendChild(menuItem);
    platsData = []; // Clear plats data after menu is added
    menuForm.reset();
});
</script>
</body>
</html> 
</script>
<!-- Reservation Management Section -->
<section class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Gestion des Réservations</h2>
            <ul id="reservation-list" class="space-y-4">
                <!-- Sample reservation item  -->
                 <li class="bg-gray-50 p-4 rounded-lg shadow flex justify-between items-center">
                    <div>
                        <p class="text-gray-700 font-medium">Client: John Doe</p>
                        <p class="text-gray-500 text-sm">Date: 17/12/2024</p>
                    </div>
                    <div class="space-x-2">
                        <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Accepter</button>
                        <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Refuser</button>
                    </div>
                </li>
          </ul>  
        </section> 

        <!-- Statistics Section -->
       <section class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Statistiques</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <div class="bg-blue-100 p-4 rounded-lg text-center">
                    <p class="text-gray-700 font-semibold text-lg">Demandes en attente</p>
                    <p id="pending-requests" class="text-blue-600 text-2xl font-bold">5</p>
                </div>
                <div class="bg-green-100 p-4 rounded-lg text-center">
                    <p class="text-gray-700 font-semibold text-lg">Demandes approuvées aujourd'hui</p>
                    <p id="approved-today" class="text-green-600 text-2xl font-bold">3</p>
                </div>
                <div class="bg-yellow-100 p-4 rounded-lg text-center">
                    <p class="text-gray-700 font-semibold text-lg">Demandes pour demain</p>
                    <p id="approved-tomorrow" class="text-yellow-600 text-2xl font-bold">2</p>
                </div>
                <div class="bg-purple-100 p-4 rounded-lg text-center">
                    <p class="text-gray-700 font-semibold text-lg">Clients inscrits</p>
                    <p id="total-clients" class="text-purple-600 text-2xl font-bold">12</p>
                </div>
            </div>
        </section>
    </main>