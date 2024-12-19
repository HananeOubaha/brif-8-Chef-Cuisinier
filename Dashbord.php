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
                <a href="index.html" class="text-white hover:text-red-600">Home</a>
                <a href="menu.html" class="text-white hover:text-red-600">Our Menus</a>
                <a href="Dashbord.html" class="text-white hover:text-red-600">Chef Dashboard</a>
                <a href="reservation.html" class="text-white hover:text-red-600">Reservation</a>
            </nav>
        </div>
    </header>

    <!-- Dashboard Content -->
    <main class="container mx-auto px-4 py-6">
        <!-- Add Menu Section -->
        <section class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Créer un Menu</h2>
            <form id="menu-form" class="space-y-4">
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
                        <input type="text" name="plat[]" placeholder="Nom du plat" class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-300" required>
                        <button type="button" class="remove-plat bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Supprimer</button>
                    </div>
                </div>
                <button type="button" id="add-plat-field" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Ajouter un Plat</button>
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

        <!-- Add Dish Section -->
        <section class="bg-white shadow-md rounded-lg p-6">
            <button id="addDishBtn" class="bg-blue-500 text-white px-4 py-2 rounded shadow">
                Ajouter un plat
            </button>

            <!-- Modal -->
            <div id="modal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
                <div class="bg-white rounded-lg p-6 w-96">
                    <h2 class="text-xl font-bold mb-4">Ajouter un plat</h2>
                    <form id="addDishForm">
                        <div class="mb-4">
                            <label for="dishTitle" class="block text-sm font-medium text-gray-700">Titre du plat</label>
                            <input type="text" id="dishTitle" name="dishTitle" class="mt-1 p-2 border rounded w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="dishIngredients" class="block text-sm font-medium text-gray-700">Ingrédients</label>
                            <textarea id="dishIngredients" name="dishIngredients" class="mt-1 p-2 border rounded w-full" rows="3" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="dishImage" class="block text-sm font-medium text-gray-700">Image</label>
                            <input type="file" id="dishImage" name="dishImage" class="mt-1 p-2 border rounded w-full" accept="image/*" required>
                        </div>
                        <div class="flex justify-end space-x-2">
                            <button type="button" id="closeModalBtn" class="bg-gray-300 px-4 py-2 rounded">Annuler</button>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Liste des plats -->
            <div id="dishList" class="mt-8 space-y-4">
                <!-- Les plats ajoutés seront affichés ici -->
            </div>
        </section>
    </main>

    <script>
        // Dynamically add and remove plat fields
        const platsContainer = document.getElementById('plats-container');
        const addPlatFieldButton = document.getElementById('add-plat-field');
        addPlatFieldButton.addEventListener('click', () => {
            const platItem = document.createElement('div');
            platItem.classList.add('plat-item', 'flex', 'space-x-4');
            platItem.innerHTML = `
                <input type="text" name="plat[]" placeholder="Nom du plat" class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-300" required>
                <button type="button" class="remove-plat bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Supprimer</button>
            `;
            platsContainer.appendChild(platItem);

            platItem.querySelector('.remove-plat').addEventListener('click', () => {
                platItem.remove();
            });
        });

        const menuForm = document.getElementById('menu-form');
        const menusList = document.getElementById('menus-list');
        menuForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const title = document.getElementById('menu-title').value;
            const description = document.getElementById('menu-description').value;
            const plats = Array.from(document.querySelectorAll('input[name="plat[]"]')).map(input => input.value);

            const menuItem = document.createElement('li');
            menuItem.classList.add('bg-gray-50', 'p-4', 'rounded-lg', 'shadow');
            menuItem.innerHTML = `
                <h3 class="text-lg font-semibold text-gray-700">${title}</h3>
                <p class="text-sm text-gray-500">${description}</p>
                <ul class="mt-2 space-y-1 text-gray-600">
                    ${plats.map(plat => `<li>• ${plat}</li>`).join('')}
                </ul>
            `;

            menusList.appendChild(menuItem);
            menuForm.reset();
            platsContainer.innerHTML = `
                <div class="plat-item flex space-x-4">
                    <input type="text" name="plat[]" placeholder="Nom du plat" class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-300" required>
                    <button type="button" class="remove-plat bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Supprimer</button>
                </div>
            `;
        });

      // Modal functionality
const addDishBtn = document.getElementById('addDishBtn');
const modal = document.getElementById('modal');
const closeModalBtn = document.getElementById('closeModalBtn');
const addDishForm = document.getElementById('addDishForm');
const dishList = document.getElementById('dishList');

// Open the modal
addDishBtn.addEventListener('click', () => {
    modal.classList.remove('hidden');
});

// Close the modal
closeModalBtn.addEventListener('click', () => {
    modal.classList.add('hidden');
});

// Submit the form
addDishForm.addEventListener('submit', (event) => {
    event.preventDefault();

    // Get form values
    const dishTitle = document.getElementById('dishTitle').value;
    const dishIngredients = document.getElementById('dishIngredients').value;
    const dishImage = document.getElementById('dishImage').files[0];

    // Create a new dish card element
    const dishCard = document.createElement('div');
    dishCard.className = 'bg-white rounded-lg shadow p-4 flex items-start space-x-4';

    // Read and display the image
    const reader = new FileReader();
    reader.onload = function (e) {
        dishCard.innerHTML = `
            <img src="${e.target.result}" alt="${dishTitle}" class="w-24 h-24 object-cover rounded">
            <div>
                <h3 class="text-lg font-bold">${dishTitle}</h3>
                <p class="text-sm text-gray-700">${dishIngredients}</p>
            </div>
            <button type="button" class="remove-dish bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Supprimer</button>
        `;

        // Add the new dish card to the dish list
        dishList.appendChild(dishCard);

        // Add functionality to remove the dish
        dishCard.querySelector('.remove-dish').addEventListener('click', () => {
            dishCard.remove();
        });
    };

    reader.readAsDataURL(dishImage);

    // Reset the form and close the modal
    addDishForm.reset();
    modal.classList.add('hidden');
});


</script>
</body>
</html> 









<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen"> -->
     <!-- Header -->
     <!-- <header class="bg-gray-800 shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-gray-800">Victory</a>
            <nav>
                <div class="space-x-4">
                    <a href="index.html" class="text-white hover:text-red-600">Home</a>
                    <a href="menu.html" class="text-white hover:text-red-600">Our Menus</a>
                    <a href="Dashbord.html" class="text-white hover:text-red-600">Chef Dashboard</a>
                    <a href="reservation.html" class="text-white hover:text-red-600">reservation</a>
                </div>
            </nav>
        </div>
    </header>
    <div class="container mx-auto px-4 bg-red-500">
        <h1 class="text-2xl font-bold">Chef Admin Dashboard</h1>
    </div>
    <main class="container mx-auto px-4 py-6"> -->
        <!-- Add Menu Section -->
        <!-- <section class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Créer un Menu</h2>
            <form id="menu-form" class="space-y-4">
                <div>
                    <label for="menu-title" class="block text-gray-600 font-medium">Titre du Menu</label>
                    <input type="text" id="menu-title" name="title" class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-300" required>
                </div>

                <div>
                    <label for="menu-description" class="block text-gray-600 font-medium">Description</label>
                    <textarea id="menu-description" name="description" class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-300" rows="4" required></textarea>
                </div>

                <div class="flex justify-end space-x-4">
                    <button type="button" id="add-plat-btn" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Ajouter un Plat</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Créer Menu</button>
                </div>
            </form>
        </section> -->

        <!-- Reservation Management Section -->
        <!-- <section class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Gestion des Réservations</h2>
            <ul id="reservation-list" class="space-y-4">
                Sample reservation item 
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
          </ul>  -->
        <!-- </section>  -->

        <!-- Statistics Section -->
        <!-- <section class="bg-white shadow-md rounded-lg p-6">
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
    </main> -->

    <!-- Modal for Adding Plat -->
    <!-- <div id="plat-modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white rounded-lg shadow-md p-6 w-11/12 max-w-lg">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Ajouter un Plat</h2>
            <form id="plat-form" class="space-y-4">
                <div>
                    <label for="plat-title" class="block text-gray-600 font-medium">Titre du Plat</label>
                    <input type="text" id="plat-title" name="title" class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-300" required>
                </div>
                <div>
                    <label for="plat-ingredients" class="block text-gray-600 font-medium">Ingrédients</label>
                    <textarea id="plat-ingredients" name="ingredients" class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-300" rows="4" required></textarea>
                </div>
                <div>
                    <label for="plat-image" class="block text-gray-600 font-medium">Image (URL)</label>
                    <input type="url" id="plat-image" name="image" class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-300" required>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" id="close-plat-modal" class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500">Annuler</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Ajouter Plat</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Handle modal for adding plats
        const addPlatBtn = document.getElementById('add-plat-btn');
        const platModal = document.getElementById('plat-modal');
        const closePlatModal = document.getElementById('close-plat-modal');

        addPlatBtn.addEventListener('click', () => {
            platModal.classList.remove('hidden');
        });

        closePlatModal.addEventListener('click', () => {
            platModal.classList.add('hidden');
        });

        // Handle menu form submission (dummy logic for now)
        document.getElementById('menu-form').addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Menu créé avec succès!');
        });

        // Handle plat form submission (dummy logic for now)
        document.getElementById('plat-form').addEventListener('submit', (e) => {
            e.preventDefault();
            platModal.classList.add('hidden');
            alert('Plat ajouté avec succès!');
        });
    </script>
</body>
</html> -->