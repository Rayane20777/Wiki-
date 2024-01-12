<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.tailwindcss.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>

<body>

    <div class="flex h-screen bg-gray-900 ">
        <?php require APPROOT . '/views/pages/sidebar.php' ?>



        <div id="overlayCategory"
            class="fixed hidden  inset-0 top-0 left-0 bg-black w-full h-full bg-opacity-30 backdrop-blur-sm  z-50 flex items-center justify-center">

            <form action="http://localhost/Wiki/Wikis/addWiki" method="POST" id="formCategory"
                class="w-[550px] bg-white p-5 rounded-lg relative">
                <div>
                    <h2 class="text-center text-xl font-semibold bg-gray-900 py-3 text-white mt-5 rounded-md text-white"
                        id="nameFrom"></h2>
                </div>
                <p class="mt-2 text-md opacity-0 font-medium text-red-600 bg-red-50 py-2 px-3 rounded-lg dark:text-red-500"
                    id="fieldErr"></p>

                <div class="py-3">
                    <label for="error" class="block mb-2 text-md font-medium text-secondary">Name Category</label>
                    <input type="text" id="name"
                        class=" bg-white border text-sm rounded-lg focus:ring-red-500  focus:border-red-500 block w-full p-2.5 "
                        placeholder="Enter Category name" name="title">
                </div>

                <div class="py-3">
                    <label for="error" class="block mb-2 text-md font-medium text-secondary">Name Category</label>
                    <input type="text" id="name"
                        class=" bg-white border text-sm rounded-lg focus:ring-red-500  focus:border-red-500 block w-full p-2.5 "
                        placeholder="Enter Category name" name="content">
                </div>

                <div class="py-3">
                    <label for="error" class="block mb-2 text-md font-medium text-secondary">Name Category</label>
                    <input type="text" id="name"
                        class=" bg-white border text-sm rounded-lg focus:ring-red-500  focus:border-red-500 block w-full p-2.5 "
                        placeholder="Enter Category name" name="id_category">
                </div>

                <div class="py-3">
                    <label for="error" class="block mb-2 text-md font-medium text-secondary">Name Category</label>
                    <input type="text" id="name"
                        class=" bg-white border text-sm rounded-lg focus:ring-red-500  focus:border-red-500 block w-full p-2.5 "
                        placeholder="Enter Category name" name="id_user">
                </div>

                <div class="flex gap-5 items-center justify-center">
                    <button id="addCategory" type="submit" class=" mt-5  items-center px-4 py-2 w-[200px]  text-center border
                    border-transparent text-sm leading-6 font-medium rounded-md text-white bg-gray-900 focus:outline-none
                    transition duration-150 ease-in-out" style="display: block;">
                        Add Category
                    </button>
                    <button id="upCategory" class="mt-5 block items-center px-4 py-2 w-[200px] text-center border
                    border-transparent text-sm leading-6 font-medium rounded-md text-white bg-gray-900 focus:outline-none
                    transition duration-150 ease-in-out">
                        Update Category
                    </button>
                </div>

                <div class="absolute top-[10px] right-[20px] cursor-pointer" id="btnClose">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 text-secondary">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </div>
            </form>
        </div>

        <?php if (isset($data['edit'])) { ?>
            <div id="overlayCategory"
                class="fixed  inset-0 top-0 left-0 bg-black w-full h-full bg-opacity-30 backdrop-blur-sm  z-50 flex items-center justify-center">

                <form action="<?= URLROOT . 'Wikis/edit' ?>" method="POST" id="formCategory"
                    class="w-[550px] bg-white p-5 rounded-lg relative">
                    <div>
                        <h2 class="text-center text-xl font-semibold bg-gray-900 py-3 text-white mt-5 rounded-md text-white"
                            id="nameFrom"></h2>
                    </div>
                    <input value="<?= $data['Wiki']->id_wiki ?>" type="hidden" id="id"
                        class=" bg-white border text-sm rounded-lg focus:ring-red-500  focus:border-red-500 block w-full p-2.5 "
                        placeholder="Enter Category name" name="id">

                    <p class="mt-2 text-md opacity-0 font-medium text-red-600 bg-red-50 py-2 px-3 rounded-lg dark:text-red-500"
                        id="fieldErr"></p>
                    <div class="py-3">
                        <label for="error" class="block mb-2 text-md font-medium text-secondary">Name Category</label>
                        <input value="<?= $data['Wiki']->title ?>" type="text" id="name"
                            class=" bg-white border text-sm rounded-lg focus:ring-red-500  focus:border-red-500 block w-full p-2.5 "
                            placeholder="Enter Category name" name="title">
                    </div>

                    <div class="py-3">
                        <label for="error" class="block mb-2 text-md font-medium text-secondary">Name Category</label>
                        <input value="<?= $data['Wiki']->content ?>" type="text" id="name"
                            class=" bg-white border text-sm rounded-lg focus:ring-red-500  focus:border-red-500 block w-full p-2.5 "
                            placeholder="Enter Category name" name="content">
                    </div>

                    <div class="py-3">
                        <label for="error" class="block mb-2 text-md font-medium text-secondary">Name Category</label>
                        <input value="<?= $data['Wiki']->id_user ?>" type="text" id="name"
                            class=" bg-white border text-sm rounded-lg focus:ring-red-500  focus:border-red-500 block w-full p-2.5 "
                            placeholder="Enter Category name" name="id_user">
                    </div>

                    <div class="py-3">
                        <label for="error" class="block mb-2 text-md font-medium text-secondary">Name Category</label>
                        <input value="<?= $data['Wiki']->id_category ?>" type="text" id="name"
                            class=" bg-white border text-sm rounded-lg focus:ring-red-500  focus:border-red-500 block w-full p-2.5 "
                            placeholder="Enter Category name" name="id_category">
                    </div>

                    <div class="flex gap-5 items-center justify-center">
                        <button id="addCategory" type="submit" class=" mt-5  items-center px-4 py-2 w-[200px]  text-center border
                        border-transparent text-sm leading-6 font-medium rounded-md text-white bg-gray-900 focus:outline-none
                        transition duration-150 ease-in-out" style="display: block;">
                            Update Category
                        </button>
                    </div>

                    <div class="absolute top-[10px] right-[20px] cursor-pointer" id="btnClose">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 text-secondary">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </div>
                </form>
            </div>
        <?php } ?>
        <div class="flex-grow bg-white ">
            <div class=" w-[95%] mx-auto my-5 flex items-center justify-between p-3 bg-gray-800 text-white rounded-lg">
                <h1 class="text-xl font-bold">CATEGORIES</h1>
                <div class="flex items-center gap-5">

                    <button id="btnAdd">
                        <a href="#" class="inline-flex items-center px-6 py-2 border border-transparent text-sm
                    leading-6 font-medium rounded-md text-black bg-white  hover:text-white hover:bg-slate-500 focus:outline-none
                     transition duration-150 ease-in-out">Add Category</a>
                    </button>
                </div>
            </div>

            <div>
                <table id="example" class="display" style="width:100%">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Id</th>
                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">title</th>
                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">content</th>
                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">id_user</th>
                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">id_category</th>
                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Actions</th>

                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <?php foreach ($data as $wikis): ?>
                            <tr class="border-[1px] border-black bg-gray-200">
                                <td class="w-1/3 text-left py-3 px-4">
                                    <?= $wikis->id_wiki ?>
                                </td>
                                <td class="w-1/3 text-left py-3 px-4">
                                    <?= $wikis->title ?>
                                </td>
                                <td class="w-1/3 text-left py-3 px-4">
                                    <?= $wikis->content ?>
                                </td>
                                <td class="w-1/3 text-left py-3 px-4">
                                    <?= $wikis->id_user ?>
                                </td>
                                <td class="w-1/3 text-left py-3 px-4">
                                    <?= $wikis->id_category ?>
                                </td>
                                <td class="w-1/3 text-left py-3 px-4"><button type="button"><a
                                            href="<?= URLROOT . 'wikis/delete/' . $wikis->id_wiki ?>">Delete</a></button><button
                                        type="button"><a
                                            href="<?= URLROOT . 'wikis/get/' . $wikis->id_wiki ?>">Edit</a></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php require APPROOT . '/views/pages/scripts.php' ?>

</body>

</html>