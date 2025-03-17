<x-mail::message>
# Dear {{ $user_name }},

Thank you for your order! We've received your purchase and will notify you once it's shipped.

Order Details:

Product Name: {{ $product_name}} <br>
Quantity: {{ $quantity }} <br>
Price: {{ $price }} <br>
Total: {{ $total }} <br>


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
