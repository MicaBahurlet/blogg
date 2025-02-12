<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Leer Post') }}
        </h2>
    </x-slot>

    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Botón para editar el post -->
            <div class="mt-12 mb-8">
                <a href="{{ route('posts.edit', $post) }}" 
                   class="inline-block bg-gradient-to-r from-[#FF2D20] to-purple-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:shadow-lg transition-shadow duration-300">
                   Editar Post
                </a>
            </div>

            <!-- Imagen del post -->
            @if($post->image_url)
            <div class="mb-8 rounded-lg overflow-hidden">
                <img src="{{ asset('storage/' . $post->image_url) }}" 
                     alt="{{ $post->title }}" 
                     class="w-full h-48 object-cover">
            </div>
            @endif

            <!-- Título del post -->
            <h1 class="text-4xl font-bold bg-gradient-to-r from-[#FF2D20] to-purple-600 bg-clip-text text-transparent mb-8">
                {{ $post->title }}
            </h1>

            

            <!-- Contenido del post -->
            <div class="prose dark:prose-dark max-w-none">
                {!! $post->body !!}
            </div>

            
        </div>
    </div>
</x-app-layout>