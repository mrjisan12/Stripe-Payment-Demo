<!DOCTYPE html>
<html>
<head>
    <title>Stripe Payment</title>
</head>
<body>
<h2>Stripe Payment Demo</h2>
<form action="{{ route('checkout') }}" method="GET">
    <button type="submit">Pay with Stripe</button>
</form>
</body>
</html>
