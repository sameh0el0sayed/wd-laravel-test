<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Test</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <!-- Font Awesome -->
    <link href="{{asset('src/font-awesome.min.css')}}" rel="stylesheet">
    {{-- {{asset('')}} --}}
    <!-- Styles -->
    <link href="{{asset('src/style.css')}}" rel="stylesheet">


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @csrf
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

 <!-- Topbar Start -->
 <div class="container-fluid">

    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary  ">We</span>deliver</h1>
            </a>
        </div>

    </div>
</div>
<!-- Topbar End -->





<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">My Grocery</h1>

    </div>
</div>
<!-- Page Header End -->
            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <dev>
                                <div class="input-group">
                                    <input type="text" class="form-control search_text" placeholder="Search by name">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <a href="javascript:void(0)" onclick="getfood()"><i class="fa fa-search"></i></a>
                                        </span>
                                    </div>
                                </div>
                            </dev>

                        </div>
                    </div>
                </div>
                <div class="row pb-3 item_container">





                </div>
            </div>
            <!-- Shop Product End -->


    </div>



    {{-- Page Scripts --}}
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-sort-asc"></i></a>
    <!-- JavaScript Libraries -->
    <script src=" {{asset('src/jquery.js')}}"></script>
    <script src="{{asset('src/bootstrap.min.js')}}"></script>
    <!-- Template Javascript -->
    <script src=" {{asset('src/main.js')}}"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $( document ).ready(function() {
            getfoodtop();
});

function getfood() {
            var search_text_inp=$('.search_text ').val();

            var devfinal='';

            var myformData = new FormData();
            myformData.append('text', search_text_inp);
            myformData.append('_token ', '{{ csrf_token() }}');
            $.ajax({
                url: '{{ route('Getfood') }}',
                method: 'post',
                contentType: false,
                processData: false,
                dataType: 'json',
                data: myformData,
                success: function(response) {
                    console.log('success');
                    $('.item_container').html('');

for (let index = 0; index < response.length; index++) {
    const value = response[index];
    // console.log(value['name']);
    var dev='<div class="col-lg-4 col-md-6 col-sm-12 pb-1"> <div class="card product-item border-0 mb-4"> <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0"> <img class="img-fluid w-100" src="{{asset('src/product.png')}}" alt=""> </div> <div class="card-body border-left border-right text-center p-0 pt-4 pb-3 "> <h6 class="text-truncate mb-3"><div class="name">'+value['name']+'</div></h6> <div class="d-flex justify-content-center"> <h6>Price: <div class="price">'+value['price']+'</div></h6> </div> <div class="d-flex justify-content-center"> <h6 class="text-muted text-left col-12">Category: <div class="cat">'+value['ctname']+'</div></h6> </div> </div> </div> </div>';
     devfinal +=dev;
}
$('.item_container').html(devfinal);
                },
                error: function(data) {
                    console.log(data);
                    console.log('error');
                }
            });
        }
        function getfoodtop() {
            var devfinal='';
            $.ajax({
                url: '{{ route('Getfoodtop') }}',
                method: 'get',
                dataType: 'json',
                success: function(response) {
                    console.log('success');
                    // console.log(response);

                    $('.item_container').html('');

                    for (let index = 0; index < response.length; index++) {
                        const value = response[index];
                        // console.log(value['name']);
                        var dev='<div class="col-lg-4 col-md-6 col-sm-12 pb-1"> <div class="card product-item border-0 mb-4"> <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0"> <img class="img-fluid w-100" src="{{asset('src/product.png')}}" alt=""> </div> <div class="card-body border-left border-right text-center p-0 pt-4 pb-3 "> <h6 class="text-truncate mb-3"><div class="name">'+value['name']+'</div></h6> <div class="d-flex justify-content-center"> <h6>Price: <div class="price">'+value['price']+'</div></h6> </div> <div class="d-flex justify-content-center"> <h6 class="text-muted text-left col-12">Category: <div class="cat">'+value['ctname']+'</div></h6> </div> </div> </div> </div>';
                         devfinal +=dev;
                    }
                    $('.item_container').html(devfinal);


                },
                error: function(data) {
                    console.log(data);
                    console.log('error');
                }
            });
        }
    </script>
    <script type="text/javascript">




</body>

</html>
