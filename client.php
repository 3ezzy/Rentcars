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
        <main class="sm:ml-64 p-4">
            <h1 class="flex items-center text-3xl font-extrabold text-blue-600 mb-2">
                <i class="fa-regular fa-user text-3xl mr-2"></i>
                List of Users
            </h1>


            <?php
            require_once 'config.php';
            $sql = "SELECT * FROM Clients";
            $result = $connection->query($sql);
            ?>

            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md table-auto">
                <thead class="text-white bg-blue-600">
                    <tr>
                        <th class="px-4 py-2 text-xs text-left">#</th>
                        <th class="px-4 py-2 text-xs text-left">Name</th>
                        <th class="px-4 py-2 text-xs text-left">Address</th>
                        <th class="px-4 py-2 text-xs text-left">Phone</th>

                        <th class="px-4 py-2 text-xs text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        $rows = $result->fetch_all(MYSQLI_ASSOC);
                        foreach ($rows as $row) {
                    ?>
                            <tr class="border-b hover:bg-gray-100">
                                <td class="px-4 py-2 text-xs"><?= $row['NumClient'] ?></td>
                                <td class="px-4 py-2 text-xs"><?= $row['Nom'] ?></td>
                                <td class="px-4 py-2 text-xs"><?= $row['adresse'] ?></td>
                                <td class="px-4 py-2 text-xs"><?= $row['numerotel'] ?></td>

                                <td class="px-2 py-2 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex items-center space-x-2">
                                        <a href=""
                                            data-drawer-target="drawer-update-product" data-drawer-show="drawer-update-product"
                                            aria-controls="drawer-update-product"
                                            class="flex items-center px-2 py-1 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" viewbox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Modifier
                                        </a>
                                        <button type="button" onclick=""
                                            
                                            class="flex items-center px-2 py-1 text-xs font-medium text-center text-red-700 border border-red-700 rounded-lg hover:text-white hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" viewbox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Supprimer
                                        </button>

                                    </div>
                                </td>
                            <?php
                        }
                    } else {
                            ?>
                            <tr>
                                <td colspan="7" class="text-center text-gray-500">Aucun clients trouvé.</td>
                            </tr>
                        <?php
                    }
                        ?>
                        </tr>

                </tbody>
            </table>
    </div>
            </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>