<div>
    @section('title')
        <title>Withdrawal</title>
    @endsection

    @section('css')
        <style>
            .w-24 {
                width: 6rem;
            }
            .h-full {
                height: 100%;
            }
            img, video {
                max-width: 100%;
                height: auto;
            }
            img, svg, video, canvas, audio, iframe, embed, object {
                display: block;
                vertical-align: middle;
            }
            img {
                overflow-clip-margin: content-box;
                overflow: clip;
            }

            /* Enhanced Withdrawal Styles */
            .dashboard-header {
                margin-bottom: 30px;
                text-align: center;
            }

            .dashboard-title {
                font-size: 2.2rem;
                color: var(--text-dark);
                margin-bottom: 10px;
                position: relative;
                display: inline-block;
            }

            .dashboard-title::after {
                content: '';
                position: absolute;
                bottom: -10px;
                left: 50%;
                transform: translateX(-50%);
                width: 60px;
                height: 4px;
                background: var(--accent-color);
                border-radius: 2px;
            }

            .balance-card {
                background: white;
                border-radius: 15px;
                padding: 25px;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                overflow: hidden;
                position: relative;
                margin-bottom: 30px;
            }

            .balance-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
            }

            .balance-card-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
                padding-bottom: 15px;
                border-bottom: 1px solid #e2e8f0;
            }

            .balance-card-title {
                font-size: 1.2rem;
                color: var(--text-dark);
                font-weight: 600;
            }

            .balance-card-icon {
                width: 50px;
                height: 50px;
                border-radius: 12px;
                background: linear-gradient(135deg, var(--accent-color), #3b82f6);
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 1.5rem;
            }

            .balance-card-value {
                font-size: 2rem;
                font-weight: 700;
                color: var(--text-dark);
                margin: 15px 0;
                display: flex;
                align-items: center;
            }

            .balance-card-value i {
                margin-right: 10px;
                color: var(--success);
                font-size: 1.8rem;
            }

            .balance-card-text {
                color: #64748b;
                font-size: 0.95rem;
                line-height: 1.5;
                padding: 10px;
                background-color: #f8fafc;
                border-radius: 8px;
                border-left: 4px solid var(--warning);
            }

            /* Payment Methods Section */
            .payment-section {
                margin-bottom: 40px;
            }

            .section-title {
                font-size: 1.5rem;
                color: var(--text-dark);
                margin-bottom: 25px;
                text-align: center;
                position: relative;
                padding-bottom: 10px;
            }

            .section-title::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 50%;
                transform: translateX(-50%);
                width: 100px;
                height: 3px;
                background: var(--accent-color);
                border-radius: 2px;
            }

            .payment-methods {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
                gap: 20px;
                margin-bottom: 30px;
            }

            @media (min-width: 768px) {
                .payment-methods {
                    grid-template-columns: repeat(4, 1fr);
                }
            }

            @media (max-width: 767px) {
                .payment-methods {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            .payment-card {
                background: white;
                border-radius: 12px;
                padding: 20px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
                transition: all 0.3s ease;
                cursor: pointer;
                text-align: center;
                position: relative;
                overflow: hidden;
                border: 2px solid transparent;
                height: 140px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .payment-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
                border-color: var(--accent-color);
            }

            .payment-card.selected {
                border-color: var(--accent-color);
                background-color: rgba(76, 132, 255, 0.05);
            }

            .payment-card.selected::after {
                content: '✓';
                position: absolute;
                top: 10px;
                right: 10px;
                width: 24px;
                height: 24px;
                background: var(--success);
                color: white;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 14px;
                font-weight: bold;
            }

            .payment-image {
                height: 70px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 10px;
            }

            .payment-image img {
                max-height: 100%;
                max-width: 100%;
                object-fit: contain;
            }

            .payment-name {
                font-weight: 600;
                color: var(--text-dark);
                font-size: 0.9rem;
            }

            /* Continue Button */
            .continue-btn-container {
                text-align: center;
                margin-top: 30px;
            }

            .btn-continue {
                display: inline-flex;
                align-items: center;
                background: linear-gradient(135deg, var(--accent-color), #3b82f6);
                color: white;
                padding: 15px 35px;
                border-radius: 30px;
                text-decoration: none;
                font-weight: 600;
                font-size: 1.1rem;
                transition: all 0.3s ease;
                border: none;
                cursor: pointer;
                box-shadow: 0 5px 15px rgba(76, 132, 255, 0.3);
            }

            .btn-continue:hover {
                transform: translateY(-3px);
                box-shadow: 0 8px 20px rgba(76, 132, 255, 0.4);
            }

            .btn-continue:active {
                transform: translateY(0);
            }

            .btn-continue i {
                margin-left: 10px;
                transition: transform 0.3s ease;
            }

            .btn-continue:hover i {
                transform: translateX(5px);
            }

            /* Animation */
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }

            .animated {
                animation: fadeIn 0.6s ease forwards;
            }

            .delay-1 { animation-delay: 0.1s; }
            .delay-2 { animation-delay: 0.2s; }
            .delay-3 { animation-delay: 0.3s; }
            .delay-4 { animation-delay: 0.4s; }
            .delay-5 { animation-delay: 0.5s; }
        </style>
    @endsection

    <div class="dashboard-header">
        <h1 class="dashboard-title">Withdrawal</h1>
    </div>

    <div class="balance-card animated">
        <div class="balance-card-header">
            <h3 class="balance-card-title">Balance</h3>
            <div class="balance-card-icon">
                <i class="fas fa-wallet"></i>
            </div>
        </div>
        <div class="balance-card-value"><i class="fas fa-bangladeshi-taka-sign"></i> 140.2 ৳</div>
        <p class="balance-card-text">Your withdrawal account is active. You can withdraw only after 7 days from your last withdrawal!</p>
    </div>

    <div class="payment-section">
        <h2 class="section-title">Select Payment Method</h2>

        <div class="payment-methods">
            <div class="payment-card animated delay-1" data-method="bikash">
                <div class="payment-image">
                    <img src="{{asset('assets/img/payment/bikash.png')}}" alt="bKash">
                </div>
                <div class="payment-name">bKash</div>
            </div>

            <div class="payment-card animated delay-2" data-method="google-pay">
                <div class="payment-image">
                    <img src="{{asset('assets/img/payment/Google_Pay.webp')}}" alt="Google Pay">
                </div>
                <div class="payment-name">Google Pay</div>
            </div>

            <div class="payment-card animated delay-3" data-method="nagad">
                <div class="payment-image">
                    <img src="{{asset('assets/img/payment/nagad.webp')}}" alt="Nagad">
                </div>
                <div class="payment-name">Nagad</div>
            </div>

            <div class="payment-card animated delay-4" data-method="paytm">
                <div class="payment-image">
                    <img src="{{asset('assets/img/payment/Paytm.png')}}" alt="Paytm">
                </div>
                <div class="payment-name">Paytm</div>
            </div>

            <div class="payment-card animated delay-1" data-method="phonepe">
                <div class="payment-image">
                    <img src="{{asset('assets/img/payment/PhonePe.png')}}" alt="PhonePe">
                </div>
                <div class="payment-name">PhonePe</div>
            </div>

            <div class="payment-card animated delay-2" data-method="roket">
                <div class="payment-image">
                    <img src="{{asset('assets/img/payment/roket.png')}}" alt="Roket">
                </div>
                <div class="payment-name">Roket</div>
            </div>

            <div class="payment-card animated delay-3" data-method="upay">
                <div class="payment-image">
                    <img src="{{asset('assets/img/payment/upay.png')}}" alt="Upay">
                </div>
                <div class="payment-name">Upay</div>
            </div>
        </div>

        <div class="continue-btn-container">
            <button class="btn-continue" id="continueBtn">
                Continue Next <i class="fas fa-arrow-right"></i>
            </button>
        </div>
    </div>

   @section('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Select payment method functionality
                const paymentCards = document.querySelectorAll('.payment-card');
                let selectedMethod = null;

                paymentCards.forEach(card => {
                    card.addEventListener('click', function() {
                        // Remove selected class from all cards
                        paymentCards.forEach(c => c.classList.remove('selected'));

                        // Add selected class to clicked card
                        this.classList.add('selected');

                        // Store selected method
                        selectedMethod = this.getAttribute('data-method');

                        console.log('Selected payment method:', selectedMethod);
                    });
                });

                // Continue button functionality
                const continueBtn = document.getElementById('continueBtn');

                continueBtn.addEventListener('click', function() {
                    if (!selectedMethod) {
                        alert('Please select a payment method first');
                        return;
                    }

                    alert(`Proceeding with ${selectedMethod} as payment method`);
                    // Here you would typically redirect to the next step or show a form
                });
            });
        </script>
   @endsection
</div>
