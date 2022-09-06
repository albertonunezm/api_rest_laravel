<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        @vite('resources/css/app.css')

    </head>
    <body class="bg-gray-100 text-gray-700">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-3 my-10">
                @forelse ($posts as $post)
                    <div class="bg-white hover:bg-blue-100 border border-gray-200 p-5">
                        <h2 class="font-bold text-lg mb-4">{{ $post->title }}</h2>
                        <p class="text-xs">{{ Str::substr($post->content, 0, 120) }}</p>
                        <p class="text-xs text-right">{{ $post->created_at->format('d/m/Y') }}</p>
                    </div>
                @empty
                    <p>No hay posts...</p>
                @endforelse
            </div>
        </div>

        <div class="mt-10 p-10">
            {{ $posts->links() }}
        </div>


        
    </body>
</html>
