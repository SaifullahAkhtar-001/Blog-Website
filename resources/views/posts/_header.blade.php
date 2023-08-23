<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="flex items-center justify-center text-4xl">
        <p class="flex-shrink-0">Latest</p>
        <span class="flex-grow whitespace-no-wrap text-purple-500">
        <div class="flex items-center justify-center pl-2">
            <p id="word" class="whitespace-no-wrap"></p>
            <p class="header-sub-title blink">|</p>
        </div>
    </span>
        <p class="flex-shrink-0 whitespace-no-wrap">News</p>
    </h1>


    <h2 class="inline-flex items-end mt-2">By &nbsp;<span class="text-purple-400">Saifullah Akhtar</span> &nbsp;<img src="./images/avatar.png"
                                                                          alt="Head of Lary the mascot"
                                                                          class="h-8 w-8 shrink-0"></h2>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
        <!--  Category -->
        <div class="relative lg:inline-flex items-center color2 rounded-xl">
            <x-category-dropdown/>
        </div>

        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center color2 rounded-xl px-3 py-2">
            <form method="GET" action="#">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{request('category')}}">
                @endif
                <input type="text" name="search" placeholder="Find something"
                       class="bg-transparent w-full placeholder-white font-semibold text-sm focus-within:outline-none"
                       value="{{request('search')}}">
            </form>
        </div>
    </div>
</header>
<script src="/app.js"></script>


