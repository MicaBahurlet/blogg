<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Panel Principal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Título principal -->
            <h1 class="text-4xl font-bold bg-gradient-to-r from-[#FF2D20] to-purple-600 bg-clip-text text-transparent mb-8">
                Bienvenido/a a blogg
            </h1>

            <!-- Descripción de la web app -->
            <div class="space-y-6 mb-12">
                <p class="text-xl text-gray-600 dark:text-gray-300">
                    En <strong>blogg</strong>, puedes compartir tus ideas, pensamientos y experiencias de manera simple y rápida. 
                    Escribe sobre lo que desees, agrega imágenes y publica en cuestión de segundos.
                </p>

                <p class="text-xl text-gray-600 dark:text-gray-300">
                    Nuestra plataforma está diseñada para ser minimalista y fácil de usar, para que te enfoques en lo que realmente importa: 
                    <strong>crear y compartir</strong>.
                </p>
            </div>

            <!-- Botón para crear un post -->
            <div class="mb-12">
                <a href="{{ route('posts.create') }}" 
                   class="inline-block bg-gradient-to-r from-[#FF2D20] to-purple-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:shadow-lg transition-shadow duration-300">
                    Crear un nuevo post →
                </a>
            </div>

            <h3 class="text-4xl font-bold bg-gradient-to-r from-[#FF2D20] to-purple-600 bg-clip-text text-transparent mb-8">
                Todos tus posts
            </h3>

            <!-- Listado de posts -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($posts as $post)
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-[0_10px_40px_-15px_rgba(0,0,0,0.2)] p-6">
                    <!-- Imagen del post -->
                    @if($post->image_url)
                    <div class="mb-4 rounded-lg overflow-hidden">
                        <img src="{{ asset('storage/' . $post->image_url) }}" 
                             alt="{{ $post->title }}" 
                             class="w-full h-48 object-cover">
                    </div>
                    @endif

                    

                    <!-- Contenido del post -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                            {{ $post->title }}
                        </h3>
                        
                        <p class="text-gray-600 dark:text-gray-400 line-clamp-3">
                            {{ strip_tags($post->body) }}
                        </p>
                        
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                {{ $post->created_at->format('d/m/Y H:i') }}
                            </span>
                            
                            <a href="{{ route('posts.show', $post) }}" 
                               class="bg-gradient-to-r from-[#FF2D20] to-purple-600 text-white px-4 py-2 rounded-full 
                                      text-sm font-semibold hover:shadow-lg transition-shadow duration-300">
                                Leer Post
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Mensaje cuando no hay posts -->
            @if($posts->isEmpty())
            <div class="text-center py-12">
                <p class="text-gray-600 dark:text-gray-400 text-lg mb-4">
                    📭 Aún no has creado ningún post
                </p>
            </div>
            @endif
        </div>

        
    </div>
    <footer class="w-full mt-16 py-4 text-center text-sm bg-gradient-to-r from-[#FF2D20] to-purple-600 text-white px-8 text-lg font-semibold">
        <h3 class="mb-4">© 2025 blogg</h3>
        <h3>Developed by: <a href="https://micaela-bahurlet.vercel.app/" target="_blank" class="hover:underline">Micaela Bahurlet</a></h3>
    </footer>
</x-app-layout>