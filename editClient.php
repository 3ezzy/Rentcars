<?php
if (isset($_POST['edit_user'])) {
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $numerotel = $_POST['numerotel'];
    $numClient = $_POST['NumClient'];
    try {
        if (!empty($nom) && !empty($adresse) && !empty($numerotel) && !empty($numClient)) {
            require_once "config.php";

            // Prepare the SQL statement with placeholders
            $stmt = $connection->prepare("UPDATE  clients set Nom=?, adresse=?,numerotel=? WHERE NumClient = ?");

            // Bind parameters with types (s = string)
            $stmt->bind_param("ssii", $nom, $adresse, $numerotel, $numClient);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Record updated successfully!";
                header('Location: client.php');
                exit;
            } else {
                echo "Error updating record:  " . $stmt->error;
            }
        } else {
            echo "Please fill in all fields.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Go Rent</title>
</head>

<body>

    <div class="relative min-h-screen">
        <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
        </button>
        <?php
        include "sidebar.php"
        ?>
        
        <?php
            require_once 'config.php';
            $NumClient = $_GET['NumClient'];
            // Préparer la requête SQL
            $stmt = $connection->prepare("SELECT * FROM clients WHERE NumClient = ?");

            // Vérifier si la requête a été préparée avec succès
            if (!$stmt) {
                die("Erreur lors de la préparation de la requête : " . $connection->error);
            }

            // Lier les paramètres
            $stmt->bind_param("i", $NumClient); // "i" signifie que le paramètre est un entier

            // Exécuter la requête
            $stmt->execute();

            // Obtenir le résultat
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
            }
            ?>
        <!-- Edit un Client -->
        <div class="w-full max-w-2xl mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800">
            <!-- Gradient Header with Rounded Top -->
            <div class="px-6 py-4 rounded-t-lg bg-gradient-to-r from-blue-600 to-blue-800">
                <h3 class="text-xl font-semibold text-white">Edit un Client</h3>
            </div>
            <div class="p-6">
                <form method="POST" class="space-y-4">
                    <input type="hidden" name="NumClient" value="<?= $user['NumClient']?>">
                    <!-- Nom -->
                    <div>
                        <label for="nom" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom du Client</label>
                        <input type="text" name="nom" id="nom" value="<?= $user['Nom']?>"
                            class="block w-full p-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                    </div>

                    <!-- Adresse -->
                    <div>
                        <label for="adresse" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Adresse</label>
                        <input type="text" name="adresse" id="adresse" value="<?= $user['adresse']?>"
                            class="block w-full p-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                    </div>

                    <!-- Numéro de Téléphone -->
                    <div>
                        <label for="numerotel" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Numéro de Téléphone</label>
                        <input type="tel" name="numerotel" id="numerotel" value="<?= $user['numerotel']?>"
                            class="block w-full p-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <input name="edit_user" type="submit" value="Update"
                            class="px-6 py-2 text-white bg-blue-700 rounded-lg hover:bg-blue-500 focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600">

                        </input>
                    </div>
                </form>
            </div>
        </div>




    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>