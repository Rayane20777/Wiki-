<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <!-- This is an example component -->
    <div class="mx-auto mt-5">

        <nav class="border-gray-200 px-2 mb-10">
            <div class="container mx-auto flex flex-wrap items-center justify-between">
                <a href="#" class="flex">
                    <img class="h-10 mr-3" width="51" height="80" viewBox="0 0 51 70" fill="none"
                        src="https://en.wikipedia.org/static/images/icons/wikipedia.png" alt=""> <span
                        class="self-center text-lg font-semibold whitespace-nowrap">Wiki</span>
                </a>

                <div class="hidden md:flex justify-between items-center w-full md:w-auto md:order-1" id="mobile-menu-3">
                    <ul class="flex-col md:flex-row flex md:space-x-8 mt-4 md:mt-0 md:text-sm md:font-medium">
                        <li>
                            <a href="http://localhost/Wiki/pages/dashboard"
                                class="bg-blue-700 md:bg-transparent text-white block pl-3 pr-4 py-2 md:text-blue-700 md:p-0 rounded"
                                aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="http://localhost/Wiki/pages/categories"
                                class="text-gray-700 hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 block pl-3 pr-4 py-2 md:hover:text-blue-700 md:p-0">Categories</a>
                        </li>
                    </ul>
                </div>

                <div class="hidden md:flex justify-between items-center w-full md:w-auto md:order-1" id="mobile-menu-3">
                    <ul class="flex-col md:flex-row flex md:space-x-8 mt-4 md:mt-0 md:text-sm md:font-medium">
                        <li>
                            <a href="http://localhost/Wiki/Register/login"
                                class="bg-blue-700 md:bg-transparent text-white block pl-3 pr-4 py-2 md:text-blue-700 md:p-0 rounded"
                                aria-current="page">Login</a>
                        </li>
                        <li>
                            <a href="http://localhost/Wiki/Register/register"
                                class="text-gray-700 hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 block pl-3 pr-4 py-2 md:hover:text-blue-700 md:p-0">Register</a>
                        </li>
                    </ul>
                </div>

                <div class="flex md:order-2">
                    
                    <button data-collapse-toggle="mobile-menu-3" type="button"
                        class="md:hidden text-gray-400 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-300 rounded-lg inline-flex items-center justify-center"
                        aria-controls="mobile-menu-3" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </nav>

    </div>

    <div class="container my-12 mx-auto px-4 md:px-12">
    <div class="flex flex-wrap -mx-1 lg:-mx-4">

        <!-- Container for demo purpose -->
        <div class="container my-24 mx-auto md:px-6">
            <!-- Section: Design Block -->
            <section class="mb-32">
                <img src="https://picsum.photos/600/400/?random"
                    class="mb-6 w-1/2 rounded-lg shadow-lg dark:shadow-black/20" alt="image" />

                <div class="mb-6 flex items-center">
                    <img src="https://picsum.photos/600/400/?random" class="mr-2 h-8 rounded-full" alt="avatar"
                        loading="lazy" />
                    <div>
                        <span> Published <u><?= $data['wiki']->date_modified ?></u> by </span>
                        <a href="#!" class="font-medium"><?= $data['wiki']->author ?></a>
                    </div>
                </div>

                <h1 class="mb-6 text-3xl font-bold">
                   <?= $data['wiki']->title ?>
                </h1>

                <p>
                <?= $data['wiki']->content ?>
                </p>
            </section>
            <!-- Section: Design Block -->
        </div>

    </div>

</div>


</body>

</html>