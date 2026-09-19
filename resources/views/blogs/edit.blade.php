<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Blog</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container mx-auto px-4 py-6 max-w-3xl">
        <div class="flex justify-between w-full mb-6">
            <h1 class="text-4xl font-bold mb-4">Edit Blog</h1>
        </div>

        <div class="bg-white p-6 rounded-lg shadow border border-gray-200">

            <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-5">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $blog->tittle) }}"
                        class="@error('title') border-red-300 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Masukkan judul blog...">

                    @error('title')
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">{{ $message }}</div>
                    @enderror

                </div>

                <div class="mb-5">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                    <textarea id="description" name="description" rows="5"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Tuliskan deskripsi blog...">{{ old('description', $blog->deskripsi) }}</textarea>

                    @error('description')
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">{{ $message }}</div>
                    @enderror

                </div>

                <div class="mb-6">
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                    <select id="status" name="status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="Active" {{ old('status', $blog->status) == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ old('status', $blog->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>

                </div>

                <div class="flex items-center space-x-3">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Update
                    </button>
                    <a href="{{ route('blogs.index') }}"
                        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
</body>

</html>
