<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Panel Principal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Título principal -->
                    <h1 class="text-4xl font-bold bg-gradient-to-r from-[#FF2D20] to-purple-600 bg-clip-text text-transparent mb-8">
                        Bienvenido/a a blogg
                    </h1>

                    <!-- Descripción de la web app -->
                    <div class="space-y-6">
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
                    <div class="mt-12">
                        <a href="{{ route('posts.create') }}" 
                           class="inline-block bg-gradient-to-r from-[#FF2D20] to-purple-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:shadow-lg transition-shadow duration-300">
                            Crear un nuevo post →
                        </a>
                    </div>

                    <!-- Sección de funcionalidades destacadas -->
                    {{-- <div class="mt-20 grid gap-8 md:grid-cols-2">
                        <div class="p-6 bg-white dark:bg-zinc-900 rounded-xl shadow-[0_10px_40px_-15px_rgba(0,0,0,0.2)]">
                            <h3 class="text-xl font-semibold mb-4">📝 Editor minimalista</h3>
                            <p class="text-gray-500 dark:text-gray-400">
                                Escribe y formatea tus posts de manera sencilla con nuestro editor intuitivo.
                            </p>
                        </div>

                        <div class="p-6 bg-white dark:bg-zinc-900 rounded-xl shadow-[0_10px_40px_-15px_rgba(0,0,0,0.2)]">
                            <h3 class="text-xl font-semibold mb-4">🖼️ Imágenes fácilmente</h3>
                            <p class="text-gray-500 dark:text-gray-400">
                                Arrastra y suelta imágenes para enriquecer tus publicaciones.
                            </p>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>