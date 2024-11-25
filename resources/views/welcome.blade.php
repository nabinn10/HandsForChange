<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
   <div>
    <input type="button" value="">
   </div>
<div class="flex justify-center mt-4">
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
        Donate Now
    </button>
    <a  href="{{route('requestnow')}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
        Request Now
    </a>




</div>

</body>
</html>
