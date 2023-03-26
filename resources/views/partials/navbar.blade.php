<header class="bg-white shadow">
    <div class="container mx-auto px-6 py-3">
        <div class="flex items-center justify-between">
            <div>
                <a href="/" class="text-xl font-semibold text-gray-800">Cleopatra</a>
            </div>
            <nav class="space-x-4 text-gray-600">
                <a href="#" class="hover:text-gray-800">Shop</a>
                <a href="#" class="hover:text-gray-800">About</a>
                <a href="#" class="hover:text-gray-800">Contact</a>
                <a href="#" onclick="toggleCart()" class="hover:text-gray-800">Cart</a>
                <!-- Add login and register links -->
                @guest
                    <a href="{{ route('login') }}" class="hover:text-gray-800">Login</a>
                    <a href="{{ route('register') }}" class="hover:text-gray-800">Register</a>
                @else
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="hover:text-gray-800">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                @endguest
            </nav>
        </div>
    </div>
</header>
