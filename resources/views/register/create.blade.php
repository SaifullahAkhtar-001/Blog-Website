<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 color1 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register!</h1>

            <form method="POST" action="/register" class="mt-10" enctype="multipart/form-data">
                @csrf

                <x-form.input name="name" required />
                <x-form.input name="username" required />
                <x-form.input name="ProfileImage" type="file"/>
                <x-form.input name="email" type="email" required />
                <x-form.input name="password" type="password" autocomplete="new-password" required />

                <x-form.button>Sign Up</x-form.button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
