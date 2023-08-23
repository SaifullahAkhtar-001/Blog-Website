@if (session()->has('success'))
    <style>
        @keyframes floatIn {
            0% {
                transform: translate(-50%, -40%);
                opacity: 0;
            }
            100% {
                transform: translate(-50%, 0);
                opacity: 1;
            }
        }

        @keyframes floatOut {
            0% {
                transform: translate(-50%, 0);
                opacity: 1;
            }
            100% {
                transform: translate(-50%, -40%);
                opacity: 0;
            }
        }
    </style>

    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 2000)"
         x-show="show"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed bg-purple-500 text-white py-4 px-8 rounded-full top-4 left-1/2 transform -translate-x-1/2 text-sm"
         style="animation: floatIn 0.5s ease-in-out forwards;"
    >
        <p>{{ session('success') }}</p>
    </div>
@endif
