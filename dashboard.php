<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="img/1.png">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Go Rent</title>
</head>

<body>
    <?php
    include 'config.php';
    ?>
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
            <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
                <div class="mx-auto max-w-3xl text-center">
                    <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">Go Rent - Your Gateway to Convenient Rentals</h2>
                    <p class="mt-4 text-gray-500 sm:text-xl">
                        Discover hassle-free rentals with Go Rent! From vehicles to equipment, find exactly what you need at affordable prices. Explore our user-friendly platform, compare options, and enjoy a seamless booking experience tailored to your needs.
                    </p>
                </div>

                <dl class="mt-6 grid grid-cols-1 gap-4 sm:mt-8 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="flex flex-col rounded-lg bg-blue-50 px-4 py-8 text-center">
                        <dt class="order-last text-lg font-medium text-gray-500">Total Sales</dt>
                        <dd class="text-4xl font-extrabold text-blue-600 md:text-5xl">$500k</dd>
                    </div>
                    <div class="flex flex-col rounded-lg bg-blue-50 px-4 py-8 text-center">
                        <dt class="order-last text-lg font-medium text-gray-500">Official Addons</dt>
                        <dd class="text-4xl font-extrabold text-blue-600 md:text-5xl">24</dd>
                    </div>
                    <div class="flex flex-col rounded-lg bg-blue-50 px-4 py-8 text-center">
                        <dt class="order-last text-lg font-medium text-gray-500">Total Rent</dt>
                        <dd class="text-4xl font-extrabold text-blue-600 md:text-5xl">86</dd>
                    </div>
                    <div class="flex flex-col rounded-lg bg-blue-50 px-4 py-8 text-center">
                        <dt class="order-last text-lg font-medium text-gray-500">Visits</dt>
                        <dd class="text-4xl font-extrabold text-blue-600 md:text-5xl">86k</dd>
                    </div>
                </dl>


                <div class="mt-8 space-y-4">
                    <a class="group flex items-center justify-between gap-4 rounded-lg border border-current px-5 py-3 text-indigo-600 transition-colors hover:bg-indigo-600 focus:outline-none focus:ring active:bg-indigo-500"
                        href="createUser.php">
                        <span class="font-medium transition-colors group-hover:text-white">Ajouter un Client.</span>
                        <span class="shrink-0 rounded-full border border-indigo-600 bg-white p-2 group-active:border-indigo-500">
                            <svg class="size-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </span>
                    </a>

                    <a class="group flex items-center justify-between gap-4 rounded-lg border border-current px-5 py-3 text-indigo-600 transition-colors hover:bg-indigo-600 focus:outline-none focus:ring active:bg-indigo-500"
                        href="createCars.php">
                        <span class="font-medium transition-colors group-hover:text-white">Ajouter un Voiture</span>
                        <span class="shrink-0 rounded-full border border-indigo-600 bg-white p-2 group-active:border-indigo-500">
                            <svg class="size-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </span>
                    </a>
                    <a class="group flex items-center justify-between gap-4 rounded-lg border border-current px-5 py-3 text-indigo-600 transition-colors hover:bg-indigo-600 focus:outline-none focus:ring active:bg-indigo-500"
                        href="createContract.php">
                        <span class="font-medium transition-colors group-hover:text-white">Ajouter un Contract</span>
                        <span class="shrink-0 rounded-full border border-indigo-600 bg-white p-2 group-active:border-indigo-500">
                            <svg class="size-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

</body>

</html>