<?php
include 'db.php'; // Inclure la connexion à la base de données

$sql = "SELECT m.id AS menu_id, m.title AS menu_title, m.description AS menu_description, 
        p.title AS plat_title, p.ingredients AS plat_ingredients, p.image AS plat_image 
        FROM menu m 
        LEFT JOIN plats p ON m.id = p.menu_id 
        ORDER BY m.id, p.id";

$result = mysqli_query($conn, $sql);
$menus = [];

while ($row = mysqli_fetch_assoc($result)) {
    $menus[$row['menu_id']]['title'] = $row['menu_title'];
    $menus[$row['menu_id']]['description'] = $row['menu_description'];
    $menus[$row['menu_id']]['plats'][] = [
        'title' => $row['plat_title'],
        'ingredients' => $row['plat_ingredients'],
        'image' => $row['plat_image']
    ];
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Victory - Our Menus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Spectral:wght@200;300;400;500;600;700;800&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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

    <!-- Page Heading -->
    <section class="py-16 my-16 mx-16" style="background-image: url('img/signup-bg.jpg'); background-size: cover; background-position: center;">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold mb-4 text-white">Our Menus</h1>
            <p class="text-lg text-white max-w-2xl mx-auto">
                Curabitur at dolor sed felis lacinia ultricies sit amet vel sem. Vestibulum diam leo, sodales tempor lectus sed, varius gravida mi.
            </p>
        </div>
    </section>

    <!-- Menu Sections -->
    <section class="py-16">
        <div class="container mx-auto">
            <?php foreach ($menus as $menu): ?>
                <div class="mb-16">
                    <h2 class="text-3xl font-bold mb-8"><?php echo $menu['title']; ?></h2>
                    <p class="text-gray-600 mb-4"><?php echo $menu['description']; ?></p>
                    <div class="grid md:grid-cols-3 gap-8">
                        <?php foreach ($menu['plats'] as $plat): ?>
                            <div class="bg-white shadow-md rounded-lg p-4">
                                <img src="<?php echo $plat['image']; ?>" alt="<?php echo $plat['title']; ?>" class="w-full h-48 object-cover rounded-lg mb-4">
                                <h3 class="text-xl font-semibold"><?php echo $plat['title']; ?></h3>
                                <p class="text-gray-600 mt-2"><?php echo $plat['ingredients']; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto grid md:grid-cols-3 gap-4 text-center">
            <p>&copy; 2017 Victory Template</p>
            <div class="space-x-4 flex justify-center">
                <a href="#" class="text-white hover:text-gray-300"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-white hover:text-gray-300"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white hover:text-gray-300"><i class="fab fa-linkedin"></i></a>
                <a href="#" class="text-white hover:text-gray-300"><i class="fas fa-rss"></i></a>
                <a href="#" class="text-white hover:text-gray-300"><i class="fab fa-dribbble"></i></a>
            </div>
            <p>Designed by <em>Hanane Oubaha</em></p>
        </div>
    </footer>
</body>
</html>