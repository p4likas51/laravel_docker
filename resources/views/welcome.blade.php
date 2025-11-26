<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Település kereső</title>

    @vite(entrypoints: ['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container mx-auto">
        <h1 class="text-center text-4xl">Település kereső</h1>
        <div class="w-fit mx-auto mt-8">

            <form method="GET" action="/">
                <label>Postal code:</label>
                <input type="number" class="border rounded-md p-1" name="code">
                <input type="submit" value="Search" class="border rounded-md px-3 py-1 ms-5 cursor-pointer">
            </form>
        </div>
    </div>
    @if (isset($result) && $result != 'helytelen')
        @include('result')
    @endif
    @if (isset($result) && $result == 'helytelen')
        <h1 class="text-2xl text-red-600 text-center my-10">Hibás irányítószám!</h1>
    @endif
</body>

</html>
