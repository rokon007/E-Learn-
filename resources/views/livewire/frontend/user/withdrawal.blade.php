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

        </style>
    @endsection

    <div class="dashboard-header">
        <h1 class="dashboard-title">Withdrawal</h1>
    </div>
    <div class="dashboard-cards">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Blance</h3>
                <div class="card-icon">
                    ৳
                </div>
            </div>
            <div class="card-value">140.2 ৳</div>
            <p class="card-text">Your withdrawal Account is Active,You can withdraw only after 7 days from your last withdrawal!</p>
        </div>
    </div>
    <div class="dashboard-cards">
        <div class="card">
            <img src="{{asset('assets/img/payment/bikash.png')}}" alt="bikash" class="w-24 h-full"/>
        </div>
        <div class="card">
            <img src="{{asset('assets/img/payment/Google_Pay.webp')}}" alt="Google_Pay" class="w-24 h-full"/>
        </div>
        <div class="card">
            <img src="{{asset('assets/img/payment/nagad.webp')}}" alt="nagad" class="w-24 h-full"/>
        </div>
        <div class="card">
            <img src="{{asset('assets/img/payment/Paytm.png')}}" alt="Paytm" class="w-24 h-full"/>
        </div>
        <div class="card">
            <img src="{{asset('assets/img/payment/PhonePe.png')}}" alt="PhonePe" class="w-24 h-full"/>
        </div>
        <div class="card">
            <img src="{{asset('assets/img/payment/roket.png')}}" alt="roket" class="w-24 h-full"/>
        </div>
        <div class="card">
            <img src="{{asset('assets/img/payment/upay.png')}}" alt="upay" class="w-24 h-full"/>
        </div>
    </div>
   @section('js')

   @endsection
</div>
