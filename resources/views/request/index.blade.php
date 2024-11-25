<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- icon --}}
</head>
<body>
    <form action="{{route('request.store')}}" method="POST" class="mt-4" enctype="multipart/form-data">
        @csrf


        {{-- request type either money cloth food medicine --}}
        <div class="mt-4">
            <label for="request_type" class="block text-sm font-medium text-gray-700">Request Type</label>
            <select id="request_type" name="request_type" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="money">Money</option>
                <option value="cloth">Cloth</option>
                <option value="food">Food</option>
                <option value="medicine">Medicine</option>
            </select>
        </div>
        {{-- request description --}}
        <div class="mt-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" rows="3" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
        </div>

        {{-- document --}}
        <div class="mt-4">
            <label for="document" class="block text-sm font-medium text-gray-700">Document</label>
            <input id="document" type="file" name="document" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Submit
            </button>
        </div>
    </form>

</body>
</html>
