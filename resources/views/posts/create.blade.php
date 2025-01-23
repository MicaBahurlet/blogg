<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-200">
                    <div class="py-12">
                        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 ">
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    {{-- {{ __("You're logged in!") }} --}}
                                    <h1 class="text-3xl font-bold">Crear nuevo post </h1>
                                </div>
                            </div>
                        </div>
                    </div>


                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-6">
                        Estas a punto de crear un nuevo post para tu blog
                    </h3>
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-6">
                            {{-- <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                Estas a punto de crear un nuevo post para tu blog. 
                            </p> --}}
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Título
                                <span style="color:red">*</span></label>
                            <input type="text" id="title" name="title"
                                class="bg-gray-50 border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400 focus:ring-4 focus:ring-blue-300 focus:outline-none w-full p-3 text-sm"
                                placeholder="Título del post" required>
                            <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">¿Sobre qué deseas escribir?
                                <span style="color:red">*</span></label>
                            <textarea name="body" id="body" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"></textarea>
                            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imágen
                                <span style="color:red">*. jpg</span></label>
                            <input
                                class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:placeholder-gray-400"
                                id="file_input" type="file" name="image">
                        </div>
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600 mt-6">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Crear Post</button>
                            <a href="{{ route('posts.index') }}"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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