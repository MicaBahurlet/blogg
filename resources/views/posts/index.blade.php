<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Todos tus posts') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-3xl font-bold">Todos tus posts </h1>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-200">
                    <!-- Modal toggle -->
                    <a href="{{ route('posts.create') }}"
                           class=" block inline-block bg-gradient-to-r from-[#FF2D20] to-purple-600 text-white px-8 py-4 rounded-full text-lg font-bold hover:shadow-lg transition-shadow duration-300 text-center"
                        type="button">
                        Nuevo post →
                    </a>

                </div>

            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Título e Imagen
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Contenido
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Fecha de creación
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Acción
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 flex items-center space-x-4">
                                    @if ($post->image_url)
                                        <!-- Imagen -->
                                        <img src="{{ asset('storage/' . $post->image_url) }}"
                                            alt="Imagen de {{ $post->title }}"
                                            class="w-16 h-16 object-cover rounded-lg">
                                    @endif
                                    <!-- Título -->
                                    <span class="text-gray-900 dark:text-white">
                                        {{ $post->title }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        style="display:inline-block;
                                    width:180px;
                                    white-space: nowrap;
                                    overflow:hidden !important;
                                    text-overflow: ellipsis;">
                                        {{ strip_tags($post->body) }}

                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-500 dark:text-gray-400">
                                    {{ $post->created_at->format('d/m/Y') }}
                                </td>

                                {{-- <td class="px-6 py-4">
                                    <a href="{{ route('posts.delete', $post->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Borrar</a>
                                </td> --}}

                                <td class="px-6 py-4">
                                    <button data-modal-target="popup-modal-{{ $post->id }}"
                                        data-modal-toggle="popup-modal-{{ $post->id }}"
                                        class="text-sm font-semibold text-red-700 dark:text-gray-300 
                                               hover:bg-gray-100 dark:hover:bg-zinc-800 px-5 py-2 rounded-full 
                                               transition-colors duration-300 border-2 border-red-500">
                                        Borrar
                                    </button>

                                    <a href="{{ route('posts.edit', $post->id) }}"
                                        class="text-sm font-semibold text-violet-700 dark:text-gray-300 
                                               hover:bg-gray-100 dark:hover:bg-zinc-800 px-5 py-2 rounded-full 
                                               transition-colors duration-300 border-2 border-violet-500">
                                        Editar
                                    </a>

                                    <!-- Modal de confirmación -->
                                    <div id="popup-modal-{{ $post->id }}" tabindex="-1"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button"
                                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="popup-modal-{{ $post->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-4 md:p-5 text-center">
                                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                    <h3
                                                        class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                        ¿Estás seguro de que deseas borrar este post? Esta acción no se
                                                        puede deshacer.
                                                    </h3>
                                                    <div class="flex items-center justify-center space-x-4">
                                                        <form action="{{ route('posts.delete', $post->id) }}"
                                                            method="GET">
                                                            @csrf

                                                            <button type="submit"
                                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                Sí, borrar
                                                            </button>
                                                        </form>
                                                        <button data-modal-hide="popup-modal-{{ $post->id }}"
                                                            type="button"
                                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                            Cancelar
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Fin del modal -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <footer class="w-full mt-16 py-4 text-center text-sm bg-gradient-to-r from-[#FF2D20] to-purple-600 text-white px-8 text-lg font-semibold">
        <h3 class="mb-4">© 2025 blogg</h3>
        <h3>Developed by: <a href="https://micaela-bahurlet.vercel.app/" target="_blank" class="hover:underline">Micaela Bahurlet</a></h3>
    </footer>
</x-app-layout>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });

    @if (session('success'))
        Toast.fire({
            icon: "success",
            title: "{{ session('success') }}"
        });
    @endif
</script>

{{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> --}}
<script src="https://cdn.tiny.cloud/1/c3duvwl26x50nced34cn3uowoxzso8epbekiovs1wd2dpvok/tinymce/7/tinymce.min.js"
    referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#body', // Selecciona el textarea por ID
        apiKey: 'c3duvwl26x50nced34cn3uowoxzso8epbekiovs1wd2dpvok', // API Key de TinyMCE
        plugins: 'lists link image table code emoticons pagebreak table formatselect fullscreen styleselect ', // las herramientas que quiero que tenga
        toolbar: 'undo redo | styleselect | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code | emoticons | pagebreak  | table | fullscreen', // perzonalizacion de la barra de herramientas
        menubar: false, // aqui lo que quiera poner como menú, ver la docu
        branding: false // Oculta el branding de TinyMCE


    });
</script>

