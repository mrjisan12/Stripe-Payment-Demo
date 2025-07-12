<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Parent Payment Portal - Bizzy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #d7f2dc;
        }
        .card {
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .bizzy-logo {
            background-color: #4cd964;
            color: white;
            font-size: 30px;
            font-weight: bold;
            padding: 15px 25px;
            border-radius: 10px;
            display: inline-block;
        }
        .exclusive-tag {
            background-color: #f87171;
            color: white;
            font-size: 12px;
            padding: 2px 8px;
            border-radius: 20px;
            margin-left: 5px;
        }
        .plan-card {
            cursor: pointer;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }
        .plan-card input[type="radio"] {
            margin-top: 5px;
            transform: scale(1.3);
            cursor: pointer;
        }
        .plan-card.active {
            border: 2px solid #4cd964;
            background-color: #e8fff0;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="text-center mb-4">
        <div class="d-flex justify-content-between align-items-center px-3 py-2 bg-white rounded-top shadow-sm">
            <strong>Parent / Friend Payment Portal</strong>
            <a href="#" class="text-decoration-none">Learn More</a>
        </div>
    </div>

    <div class="card mx-auto p-4" style="max-width: 600px;">
        <div class="text-center">
            <div class="bizzy-logo mb-3">Bizzy <span style="font-size:16px; display:block;">Premium</span></div>
            <h5>Support Your Student with Bizzy Premium!</h5>
            <p>For just <strong>$3.99/month</strong>, give your student unlimited access to exclusive food, drink, and entertainment discounts near their campus — plus free food giveaways, limited-time offers, and more.</p>
            <p class="text-muted">🎓 You're supporting: <strong>Cooper Aiello</strong></p>
        </div>

        <form id="paymentForm" action="{{ route('checkout') }}" method="POST">
            @csrf
            <input type="hidden" name="amount" id="selectedAmount">
            <input type="hidden" name="plan" id="selectedPlan">

            <h6 class="mt-3">Choose a Plan</h6>

            <div class="form-check plan-card p-3 my-2 border rounded active" data-price="399" data-plan="Monthly">
                <input class="form-check-input" type="radio" name="planOption" value="Monthly" checked>
                <label class="form-check-label w-100">
                    <strong>Monthly – $3.99/mo</strong> <span class="text-muted">(Auto-Renew)</span>
                </label>
            </div>

            <div class="form-check plan-card p-3 my-2 border rounded" data-price="3999" data-plan="1-Year">
                <input class="form-check-input" type="radio" name="planOption" value="1-Year">
                <label class="form-check-label w-100">
                    <strong>1-Year Pass – $39.99</strong> <span class="text-muted">(Billed Annually)</span>
                </label>
            </div>

            <div class="form-check plan-card p-3 my-2 border rounded" data-price="9999" data-plan="4-Year">
                <input class="form-check-input" type="radio" name="planOption" value="4-Year">
                <label class="form-check-label w-100">
                    <span class="exclusive-tag">🎓 Exclusive Promotion – Only 250 available!</span><br>
                    <strong>4-Year College Pass – $99.99</strong><br>
                    <small class="text-muted">One-time payment, covers all 4 years. No future charges.</small>
                </label>
            </div>

            <p class="text-center mt-4"><strong>Top users saved $52+ per month using Bizzy — that’s over $600/year in savings!</strong></p>

            <button type="submit" class="btn btn-primary w-100 py-2 mt-2">Pay with Card – Secure Checkout 🔒</button>

            <small class="text-muted d-block text-center mt-3">
                Once payment is complete, the subscription will be applied. You’ll receive a confirmation email.
            </small>
        </form>
    </div>

    <div class="text-center mt-4">
        <a href="#" class="text-muted mx-2">Terms</a>
        <a href="#" class="text-muted mx-2">Privacy Policy</a>
        <a href="#" class="text-muted mx-2">Contact Us</a>
    </div>
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('.plan-card').click(function () {
        $('.plan-card').removeClass('active');
        $(this).addClass('active');

        // Select the radio button inside this plan
        $(this).find('input[type=radio]').prop('checked', true);

        let price = $(this).data('price');
        let plan = $(this).data('plan');
        $('#selectedAmount').val(price);
        $('#selectedPlan').val(plan);
    });
</script>
</body>
</html>
