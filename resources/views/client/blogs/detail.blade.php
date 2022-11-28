@extends('client.layouts.master')
@section('main')
<div class="container">
                <div class="row">
                    <div class="col-xl-9 col-wd">
                        <div class="min-width-1100-wd">
                            <article class="card mb-8 border-0">
                                <div class="card-body pt-5 pb-0 px-0">
                                    <div class="d-block d-md-flex flex-center-between mb-4 mb-md-0">
                                        <h2 class="mb-md-3 mb-1 text-black">{{$post->title}}</h2>
                                        <a href="#" class="font-size-12 text-gray-5 ml-md-4"><i class="far fa-comment"></i> Để lại bình luận</a>
                                    </div>
                                    <div class="mb-3 pb-3 border-bottom">
                                        <div class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                                            <a href="http://localhost:8000/post/details/{{$post->id}}" class="mx-0dot5 text-gray-5">{{$post->category->category_name}}</a>
                                                  
                                            <span class="mx-2 font-size-n5 mt-1 text-gray-5"><i class="fas fa-circle"></i></span>
                                            <a href="http://localhost:8000/post/details/{{$post->id}}" class="mx-0dot5 text-gray-5">{{$post->created_at->format('d/m/Y')}}</a>
                                        </div>
                                    </div>                              
                                    <div class="row">
                                        <?php                                           
                                            echo $post->content;    
                                        ?>                                        
                                    </div>
                                </div>
                            </article>
                            <div class="bg-gray-1 px-3 py-5 mb-10">
                                <!-- Review -->
                                <div class="d-block d-md-flex media">
                                    <div class="u-xl-avatar mb-4 mb-md-0 mr-md-4">
                                        <img class="img-fluid" src="{{asset('/images/post/' . $post->post_img)}}" alt="Image Description">
                                    </div>
                                    <div class="media-body">
                                        <h3 class="font-size-18 mb-3"><a href="../blog/single-blog-post.html">{{$post->title}}</a></h3>
                                        <p class="mb-0">{{$post->summary}}</p>
                                    </div>
                                </div>
                                <!-- End Review -->
                            </div>
                            <ul class="nav justify-content-between mb-11">
                                <li class="nav-item m-0">
                                    <a class="nav-link text-gray-27 px-0" href="../blog/single-blog-post.html"><span class="mr-1">←</span> SpaceX Falcon bùng nổ sau khi hạ cánh</a>
                                </li>
                                <li class="nav-item m-0">
                                    <a class="nav-link text-gray-27 px-0" href="../blog/single-blog-post.html">Thông báo - Đăng không có hình ảnh <span class="ml-1">→</span></a>
                                </li>
                            </ul>
                            <div class="mb-10">
                                <div class="border-bottom border-color-1 mb-10" style="color: black">
                                    <h4 class="section-title mb-0 pb-3 font-size-25">3 Bình luận</h4>
                                </div>
                                <ol class="nav">
                                    <li class="w-100 border-bottom pb-6 mb-6 border-color-1">
                                        <!-- Review -->
                                        @foreach ($previews as $item)
                                        <div class="d-block d-md-flex media" >
                                            <div class="u-xl-avatar mr-md-4 mb-4 mb-md-0">
                                                <img class="img-fluid rounded-circle" src="{{asset('/images/user/default.jpg')}}" alt="Image Description" width="50px">
                                            </div>                                         
                                            <div class="media-body">
                                                <p>{{$item->review}}</p>                                             
                                                <div class="d-flex">
                                                    <h4 class="font-size-14 font-weight-bold mr-2"><a href="../blog/single-blog-post.html" class="">{{$item->name}}</a></h4>
                                                    <span><a href="../blog/single-blog-post.html" class="text-gray-23">{{$item->created_at->format('d/m/Y')}}</a></span>
                                                    <a href="#" id="{{$item->id}}" class="text-blue ml-auto">Trả lời</a>
                                                </div>                                       
                                            </div>                                                                          
                                        </div>
                                        @endforeach
                                        <!-- End Review -->
                                    </li><br>
                                </ol>
                            </div>
                            <div class="mb-10">
                                <div class="border-bottom border-color-1 mb-6">
                                    <h4 class="section-title mb-0 pb-3 font-size-25" style="color: black">Để lại đánh giá</h4>
                                </div>
                                <p class="text-dark">Bạn cần đăng nhập để đánh giá bài viết<span class="hidden" style="color: red">*</span></p>
                                <form class="js-validate" action="{{route('post_review',$post->id)}}"  method="POST" novalidate="novalidate">
                                    @csrf
                                    @if (Auth::check())
                                    <div class="js-form-message mb-4" style="color: black">
                                        <label class="form-label">
                                            Bình luận
                                        </label>
                                        <div class="input-group">
                                            <textarea class="form-control p-5" rows="4" name="review" placeholder=""></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary-dark-w px-5">Đăng bình luận</button>
                                    </div>
                                   @endif
                                </form>
                            </div>                
                        </div>
                    </div>
                    <div class="col-xl-3 col-wd">
                        <aside class="mb-7">
                            <form class="">
                                <div class="d-flex align-items-center">
                                    <label class="sr-only" for="signupSrEmail">Tìm kiếm bài viết</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control px-4" name="search" id="signupSrEmail" placeholder="Tìm kiếm..." aria-label="Search Electro blog">
                                    </div>
                                    <button type="submit" class="btn btn-primary text-nowrap ml-3 d-none">
                                        <span class="fas fa-search font-size-1 mr-2"></span> Tìm kiếm
                                    </button>
                                </div>
                            </form>
                        </aside>

                        <aside class="mb-7">
                            <div class="border-bottom border-color-1 mb-5">
                                <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Danh mục</h3>
                            </div>
                            <div class="list-group">
                                <a href="../blog/single-blog-post.html" class="font-bold-on-hover px-3 py-2 list-group-item list-group-item-action border-0"><i class="mr-2 fas fa-angle-right"></i> Thiết kế</a>
                                <a href="../blog/single-blog-post.html" class="font-bold-on-hover px-3 py-2 list-group-item list-group-item-action border-right-0 border-left-0 border-bottom-0"><i class="mr-2 fas fa-angle-right"></i> Sự kiện</a>
                                <a href="../blog/single-blog-post.html" class="font-bold-on-hover px-3 py-2 list-group-item list-group-item-action border-right-0 border-left-0 border-bottom-0"><i class="mr-2 fas fa-angle-right"></i> Liên kết & Trích dẫn</a>
                                <a href="../blog/single-blog-post.html" class="font-bold-on-hover px-3 py-2 list-group-item list-group-item-action border-right-0 border-left-0 border-bottom-0"><i class="mr-2 fas fa-angle-right"></i> Tin tức</a>
                                <a href="../blog/single-blog-post.html" class="font-bold-on-hover px-3 py-2 list-group-item list-group-item-action border-right-0 border-left-0 border-bottom-0"><i class="mr-2 fas fa-angle-right"></i> Xã hội</a>
                                <a href="../blog/single-blog-post.html" class="font-bold-on-hover px-3 py-2 list-group-item list-group-item-action border-right-0 border-left-0 border-bottom-0"><i class="mr-2 fas fa-angle-right"></i> Công nghệ</a>
                                <a href="../blog/single-blog-post.html" class="font-bold-on-hover px-3 py-2 list-group-item list-group-item-action border-right-0 border-left-0 border-bottom-0"><i class="mr-2 fas fa-angle-right"></i> Âm thanh</a>
                                <a href="../blog/single-blog-post.html" class="font-bold-on-hover px-3 py-2 list-group-item list-group-item-action border-right-0 border-left-0 border-bottom-0"><i class="mr-2 fas fa-angle-right"></i> Video</a>
                            </div>
                        </aside>
                        <aside class="mb-7">
                            <div class="border-bottom border-color-1 mb-5">
                                <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Bài viết gần đây</h3>
                            </div>
                            <article class="mb-4">
                                <div class="media">
                                    <div class="width-75 height-75 mr-3">
                                        <img class="img-fluid object-fit-cover" src="../../assets/img/ig1.jpg" alt="Image Description">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="font-size-14 mb-1"><a href="../blog/single-blog-post.html" class="text-gray-39">Robot Wars – Đăng với bộ sưu tập</a></h4>
                                        <span class="text-gray-5">Tháng 12, 2022</span>
                                    </div>
                                </div>
                            </article>
                            <article class="mb-4">
                                <div class="media">
                                    <div class="width-75 height-75 mr-3">
                                        <img class="img-fluid object-fit-cover" src="../../assets/img/ig4.jpg" alt="Image Description">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="font-size-14 mb-1"><a href="../blog/single-blog-post.html" class="text-gray-39">Robot Wars – Bây giờ đã đóng - Đăng với âm thanh</a></h4>
                                        <span class="text-gray-5">Tháng 12, 2022</span>
                                    </div>
                                </div>
                            </article>
                            <article class="mb-4">
                                <div class="media">
                                    <div class="width-75 height-75 mr-3">
                                        <img class="img-fluid object-fit-cover" src="../../assets/img/ig5.jpg" alt="Image Description">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="font-size-14 mb-1"><a href="../blog/single-blog-post.html" class="text-gray-39">Robot Wars – Bây giờ đã đóng - đăng với Video</a></h4>
                                        <span class="text-gray-5">Tháng 12, 2022</span>
                                    </div>
                                </div>
                            </article>
                            <article class="mb-4">
                                <div class="media">
                                    <div class="width-75 height-75 mr-3 position-relative">
                                        <img class="img-fluid object-fit-cover" src="https://placehold.it/150x150/DDD/DDD/" alt="Image Description">
                                        <i class="fa fa-paragraph position-absolute-center text-white"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="font-size-14 mb-1"><a href="../blog/single-blog-post.html" class="text-gray-39">Thông báo - Đăng không có hình ảnh</a></h4>
                                        <span class="text-gray-5">Tháng 12, 2022</span>
                                    </div>
                                </div>
                            </article>
                            <article class="mb-4">
                                <div class="media">
                                    <div class="width-75 height-75 mr-3">
                                        <img class="img-fluid object-fit-cover" src="../../assets/img/ig6.jpg" alt="Image Description">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="font-size-14 mb-1"><a href="../blog/single-blog-post.html" class="text-gray-39">Robot Wars – Bây giờ đã đóng</a></h4>
                                        <span class="text-gray-5">Tháng 12, 2022</span>
                                    </div>
                                </div>
                            </article>
                        </aside>
                    </div>
                </div>
                <!-- Brand Carousel -->
                <div class="mb-6">
                    <div class="py-2 border-top border-bottom">
                        <div class="js-slick-carousel u-slick my-1"
                            data-slides-show="5"
                            data-slides-scroll="1"
                            data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-normal u-slick__arrow-centered--y"
                            data-arrow-left-classes="fa fa-angle-left u-slick__arrow-classic-inner--left z-index-9"
                            data-arrow-right-classes="fa fa-angle-right u-slick__arrow-classic-inner--right"
                            data-responsive='[{
                                "breakpoint": 992,
                                "settings": {
                                    "slidesToShow": 2
                                }
                            }, {
                                "breakpoint": 768,
                                "settings": {
                                    "slidesToShow": 1
                                }
                            }, {
                                "breakpoint": 554,
                                "settings": {
                                    "slidesToShow": 1
                                }
                            }]'>
                            <div class="js-slide">
                                <a href="#" class="link-hover__brand">
                                    <img class="img-fluid m-auto max-height-50" src="../../assets/img/200X60/img1.png" alt="Image Description">
                                </a>
                            </div>
                            <div class="js-slide">
                                <a href="#" class="link-hover__brand">
                                    <img class="img-fluid m-auto max-height-50" src="../../assets/img/200X60/img2.png" alt="Image Description">
                                </a>
                            </div>
                            <div class="js-slide">
                                <a href="#" class="link-hover__brand">
                                    <img class="img-fluid m-auto max-height-50" src="../../assets/img/200X60/img3.png" alt="Image Description">
                                </a>
                            </div>
                            <div class="js-slide">
                                <a href="#" class="link-hover__brand">
                                    <img class="img-fluid m-auto max-height-50" src="../../assets/img/200X60/img4.png" alt="Image Description">
                                </a>
                            </div>
                            <div class="js-slide">
                                <a href="#" class="link-hover__brand">
                                    <img class="img-fluid m-auto max-height-50" src="../../assets/img/200X60/img5.png" alt="Image Description">
                                </a>
                            </div>
                            <div class="js-slide">
                                <a href="#" class="link-hover__brand">
                                    <img class="img-fluid m-auto max-height-50" src="../../assets/img/200X60/img6.png" alt="Image Description">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Brand Carousel -->
            </div>
@endsection

