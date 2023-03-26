<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cleopatra')</title>
    @vite('resources/css/app.css')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.csrfToken = "{{ csrf_token() }}";
    </script>

</head>

<body>
    @include('partials.navbar')

    @yield('content')

    @include('partials.footer')

    @include('cart')

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        window.toggleCart = function() {
            const cart = document.getElementById('cart');
            cart.classList.toggle('hidden');
        }

        document.addEventListener('DOMContentLoaded', function() {
            updateCart();
            const cart = document.getElementById('cart');
            const cartContent = document.querySelector('.cart-content');

            cart.addEventListener('click', function(event) {
                if (!cartContent.contains(event.target)) {
                    cart.classList.add('hidden');
                }
            });

            const addToCartButtons = document.querySelectorAll('.add-to-cart');
            addToCartButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');
                    addToCart(productId);
                });
            });
        });


        function addToCart(productId) {
            fetch('{{ route('cart.add') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        product_id: productId,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data.message);
                    updateCart();

                    // Update cart display or show a success message
                })
                .catch(error => {
                    console.error('Error adding product to cart:', error);
                    // Show an error message
                });
        }

        function createReduceQuantityButton(itemId) {
            const reduceQuantityButton = document.createElement('button');
            reduceQuantityButton.textContent = 'Reduce Quantity';
            reduceQuantityButton.classList.add('bg-red-500', 'text-white', 'px-3', 'py-1', 'rounded', 'hover:bg-red-600',
                'ml-2');
            reduceQuantityButton.addEventListener('click', () => {
                // Make an AJAX request to reduce the quantity of the item
                axios.post('/cart/reduce', {
                    product_id: itemId,
                    _token: csrfToken,
                }).then((response) => {
                    cart = response.data;
                    updateCart();
                }).catch((error) => {
                    console.error(error);
                });
            });
            return reduceQuantityButton;
        }

        function updateCart() {
            fetch('/cart/data')
                .then(response => response.json())
                .then(data => {
                    const cartItemsDiv = document.querySelector('.cart-items');
                    cartItemsDiv.innerHTML = ''; // Clear the cart items div

                    const cart = data.cart;

                    // Loop through the cart items and create HTML elements for each item
                    for (const itemId in cart) {
                        const item = cart[itemId];

                        const itemDiv = document.createElement('div');
                        itemDiv.classList.add('cart-item', 'mb-4');

                        const itemName = document.createElement('p');
                        itemName.textContent = item.name;
                        itemName.classList.add('text-gray-800', 'font-medium');

                        const itemPrice = document.createElement('p');
                        itemPrice.textContent = `$${item.price}`;
                        itemPrice.classList.add('text-gray-600', 'font-semibold');

                        itemDiv.appendChild(itemName);
                        itemDiv.appendChild(itemPrice);
                        cartItemsDiv.appendChild(itemDiv);

                        const itemQuantity = document.createElement('p');
                        itemQuantity.textContent = `Quantity: ${item.quantity}`;
                        itemQuantity.classList.add('text-gray-600', 'font-semibold');

                        const reduceQuantityButton = createReduceQuantityButton(itemId);

                        itemDiv.appendChild(itemName);
                        itemDiv.appendChild(itemPrice);
                        itemDiv.appendChild(itemQuantity);
                        itemDiv.appendChild(reduceQuantityButton);
                        cartItemsDiv.appendChild(itemDiv);
                    }
                })
                .catch(error => {
                    console.error('Error fetching cart data:', error);
                });
        }
    </script>


</body>

</html>
