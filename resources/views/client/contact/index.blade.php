@extends('client.layouts.master')
@section('main')
<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main" class="checkout-page">
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Home</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Liên hệ</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="mb-5">
            <h1 class="text-center" style="color:black">Liên hệ</h1>
        </div>
        <!-- Accordion -->
        <div id="shopCartAccordion" class="accordion rounded mb-5">
            <!-- Card -->
            <div class="card border-0">
                <div id="shopCartHeadingOne" class="alert alert-primary mb-0" role="alert">
                    Liên hệ với admin? <a href="#" class="alert-link" data-toggle="collapse" data-target="#shopCartOne" aria-expanded="false" aria-controls="shopCartOne">Nhấn vào đây để đăng nhập</a>
                </div>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Accordion -->

        <form class="js-validate" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-5 order-lg-2 mb- mb-lg-0">
                    <div class="pl-lg-3 ">
                        <!-- Title -->
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title mb-0 pb-2 font-size-25" style="color:black">Nội dung liên hệ</h3>
                        </div>
                        <!-- Input -->
                        <div class="js-form-message mb-6">
                            <label class="form-label" style="color:black">
                                Nội dung
                            </label>

                            <form class="needs-validation" novalidate action="{{url('contact')}}" method="POST" enctype="multipart/form-data">
                                <div class="input-group">
                                    <input class="form-control p-4" rows="4" name="text" placeholder="Vui lòng điền họ và tên." style="color: black;"></input>
                                </div>
                                
                                <div class="input-group">
                                    <input class="form-control p-4" rows="4" name="text" placeholder="Vui lòng điền Email." style="color: black;"></input>
                                </div>
                                
                                <div class="input-group">
                                    <textarea class="form-control p-5" rows="4" name="text" placeholder="Vui lòng điền vào form liên hệ này !" style="color: black;"></textarea>
                                </div>
                                <div >
                                <button type="submit" class="btn btn-primary me-2">Gửi</button>
                                </div>
                            </form>

                        </div>
                        <!-- End Input -->
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
<!-- ========== END MAIN CONTENT ========== -->

@endsection