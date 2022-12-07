<div>
    <div class="container my-3 vh-70 d-flex align-items-center">
        <div class="row">
            <div class="col-sm-12 col-md-6 d-flex d-block align-items-center">
                <img src="{{ asset('images/error.png') }}" alt="error" class="img-fluid">
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="d-flex d-block align-items-center text-start text-opc page-error">
                    <div class="d-block w-100">
                        <h1 class="d-block fw-bold display-1">{{$code}}</h1>
                        <h4 class="d-block">{{$title}}</h4>
                        <p>{{$text}}</p>
                        <a href="{{ $route }}" class="btn btn-primary btn-lg text-white no-bullets mt-1">
                            {{ $textbutton }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <style>
            h1{
                color: #f67d48;
            }
            .vh-70{
                height: 70vh !important;
            }
        </style>
    </div>
</div>
