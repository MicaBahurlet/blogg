<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-200">

                    <h2 class="text-4xl font-bold bg-gradient-to-r from-[#FF2D20] to-purple-600 bg-clip-text text-transparent mb-8">
                        Estas a punto de crear un nuevo post para tu blogg
                    </h2>
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-6">
                            <label for="title" class="block mb-2 text-m font-medium text-gray-900 dark:text-white">Título
                                <span style="color:red">*</span></label>
                            <input type="text" id="title" name="title"
                                class="bg-gray-50 border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400 focus:ring-4 focus:ring-blue-300 focus:outline-none w-full p-3 text-sm"
                                placeholder="Título del post" required>
                            <label for="body" class="block mb-2 text-m font-medium text-gray-900 dark:text-white">¿Sobre qué deseas escribir?
                                <span style="color:red">*</span></label>
                            <textarea name="body" id="body" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"></textarea>
                            <label for="image" class="block mb-2 text-m font-medium text-gray-900 dark:text-white">Imágen de portada
                                <span style="color:red">*. jpg</span></label>
                            <input
                                class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:placeholder-gray-400"
                                id="file_input" type="file" name="image">
                        </div>
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600 mt-6 space-x-4">
                            <button type="submit"
                                class="inline-block bg-gradient-to-r from-[#FF2D20] to-purple-600 text-white px-8 py-4 rounded-full text-m
                                 font-semibold hover:shadow-lg transition-shadow duration-300">
                                Crear Post</button>
                            <a href="{{ route('posts.index') }}"
                                class="text-m font-semibold text-violet-700 dark:text-gray-300 
                                               hover:bg-gray-100 dark:hover:bg-zinc-800 px-7 py-4 rounded-full 
                                               transition-colors duration-300 border-2 border-purple-500">
                                Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer class="w-full mt-16 py-4 text-center text-sm bg-gradient-to-r from-[#FF2D20] to-purple-600 text-white px-8 text-lg font-semibold">
        <h3 class="mb-4">© 2025 blogg</h3>
        <h3>Developed by: <a href="https://micaela-bahurlet.vercel.app/" target="_blank" class="hover:underline">Micaela Bahurlet</a></h3>
    </footer>
</x-app-layout>

<script src="https://cdn.tiny.cloud/1/c3duvwl26x50nced34cn3uowoxzso8epbekiovs1wd2dpvok/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#body', // Selecciona el textarea por ID
        apiKey: 'c3duvwl26x50nced34cn3uowoxzso8epbekiovs1wd2dpvok', // API Key de TinyMCE
        plugins: 'lists link image table code emoticons pagebreak table formatselect fullscreen ', // las herramientas que quiero que tenga
        toolbar: 'undo redo  | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code | emoticons | pagebreak | table | fullscreen | fontsizeselect | forecolor backcolor', // personalización de la barra de herramientas
        menubar: false, // aquí lo que quiera poner como menú, ver la docu
        branding: false, // Oculta el branding de TinyMCE
        style_formats: [
            { title: 'Encabezado 1', block: 'h1' },
            { title: 'Encabezado 2', block: 'h2' },
            { title: 'Encabezado 3', block: 'h3' },
            { title: 'Encabezado 4', block: 'h4' },
            { title: 'Encabezado 5', block: 'h5' },
            { title: 'Encabezado 6', block: 'h6' },
            { title: 'Párrafo', block: 'p' }
        ]
    });
</script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('success') }}',
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: false,
            willClose: () => {
                window.location.href = "{{ route('posts.index') }}";
            }
        });
    @endif
</script>