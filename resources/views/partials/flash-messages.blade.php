@if (session('success'))
    <div class="mb-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative shadow-sm" role="alert">
            <strong class="font-bold">¡Éxito! </strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="mb-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative shadow-sm" role="alert">
            <strong class="font-bold">¡Error! </strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    </div>
@endif