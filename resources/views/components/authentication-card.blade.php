<div class="container">
    <div class="my-5 row justify-content-center bg-slate-400">
        <div class="col-md-6 col-lg-6 d-none d-sm-none d-md-block d-lg-block d-xl-block">
            <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner rounded-start">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/login/1.jpg') }}" class="d-block w-100" alt="imagen-1" height="360">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/login/2.jpg') }}" class="d-block w-100" alt="imagen-2" height="360">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/login/3.jpg') }}" class="d-block w-100" alt="imagen-3" height="360">
                    </div>
                </div>
            </div>
        </div>
        <div class="my-5 col-sm-8 col-md-6 col-lg-6 rounded-end">
            <div class="px-1 mx-4 card-light">
                {{ $slot }}
            </div>
        </div>
    </div>

</div>