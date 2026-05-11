<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Your Cart</h1>
        <table class="w-full mb-6">
            <thead>
                <tr class="border-b">
                    <th class="text-left py-2">Product</th>
                    <th class="text-left py-2">Price</th>
                    <th class="text-left py-2">Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carts as $cart)
                <tr class="border-b">
                    <td class="py-2">{{ $cart->product->name }}</td>
                    <td class="py-2">
                        $ {{ $cart->product->price }}
                    </td>
                    <td class="py-2">
                        <input type="text"
                               value="{{ $cart->quantity }}"
                               class="border rounded p-1 w-16">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Click here
        </button>
        <div class="mt-4 text-xl font-bold">
            Total: $ {{ $carts->sum(fn($c) => $c->product->price * $c->quantity) }}
        </div>
    </div>
</body>
</html>
