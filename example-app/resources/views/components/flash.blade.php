@if (session()->has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 3000)"
         x-show="show"
         x-transition:enter="transition transform ease-out duration-300"
         x-transition:enter-start="translate-y-[-20%] opacity-0"
         x-transition:leave="transition transform ease-in duration-300"
         x-transition:leave-end="translate-y-[-20%] opacity-0"
         class="fixed bg-blue-500 bg-opacity-80 text-white py-5 px-10 rounded-full top-4 left-1/2 transform -translate-x-1/2 w-[300px] text-sm"
    >
        <p>{{ session('success') }}</p>
    </div>
@endif

