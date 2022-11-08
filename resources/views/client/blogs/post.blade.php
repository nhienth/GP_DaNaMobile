@extends('client.layouts.master')
@section('main')<br><br><br><br><br><br>
<div class="container">
                <div class="row">
                    <div class="col-xl-9 col-wd">
                        <div class="min-width-1100-wd">
                            @foreach ($posts as $post)
                                
                            <article class="card mb-13 border-0">
                                <div class="row">
                                    @foreach ($allPost as $post) 
                                    <div class="col-lg-4 mb-5 mb-lg-0">
                                        <a href="http://localhost:8000/post/details/{{$post->id}}" class="d-block"><img class="img-fluid min-height-250 object-fit-cover" src="{{asset('images/post/'.$post->post_img)}}" alt="Image Description"></a>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="card-body p-0">
                                            <h4 class="mb-3"><a href="http://localhost:8000/post/details/{{$post->id}}">{{$post->title}}</a></h4>
                                            <div class="mb-3 pb-3 border-bottom">
                                                <div class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                                                    <a href="http://localhost:8000/post/details/{{$post->id}}" class="mx-0dot5 text-gray-5">{{$post->category->category_name}}</a>
                                                  
                                                    <span class="mx-2 font-size-n5 mt-1 text-gray-5"><i class="fas fa-circle"></i></span>
                                                    <a href="http://localhost:8000/post/details/{{$post->id}}" class="mx-0dot5 text-gray-5">{{$post->created_at->format('d/m/Y')}}</a>
                                                </div>
                                            </div>
                                            <p>{{$post->summary}}</p>
                                            <div class="flex-horizontal-center">
                                                <a href="http://localhost:8000/post/details/{{$post->id}}" class="btn btn-soft-secondary-w mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5">Read More</a>
                                                <a href="http://localhost:8000/post/details/{{$post->id}}" class="font-size-12 text-gray-5 ml-4"><i class="far fa-comment"></i> 3</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            @endforeach
                            
                            
                            
                            
                        </div>
                    </div>
                    <div class="col-xl-3 col-wd">
                        <aside class="mb-7">
                            <form class="" action="{{url('post/search')}}" method="get">
                                <div class="d-flex align-items-center">
                                    <label class="sr-only" for="signupSrEmail">Search Electro blog</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control px-4" name="keyword" id="signupSrEmail" placeholder="Search..." aria-label="Search Electro blog">
                                    </div>
                                    <button type="submit" class="btn btn-primary text-nowrap ml-3 d-none">
                                        <span class="fas fa-search font-size-1 mr-2"></span> Search
                                    </button>
                                </div>
                            </form>
                        </aside>
                        <aside class="mb-7">
                            <div class="border-bottom border-color-1 mb-5">
                                <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Categories</h3>
                            </div>
                            <div class="list-group">
                                <a href="../blog/single-blog-post.html" class="font-bold-on-hover px-3 py-2 list-group-item list-group-item-action border-0"><i class="mr-2 fas fa-angle-right"></i> Design</a>
                                <a href="../blog/single-blog-post.html" class="font-bold-on-hover px-3 py-2 list-group-item list-group-item-action border-right-0 border-left-0 border-bottom-0"><i class="mr-2 fas fa-angle-right"></i> Events</a>
                                <a href="../blog/single-blog-post.html" class="font-bold-on-hover px-3 py-2 list-group-item list-group-item-action border-right-0 border-left-0 border-bottom-0"><i class="mr-2 fas fa-angle-right"></i> Links & Quotes</a>
                                <a href="../blog/single-blog-post.html" class="font-bold-on-hover px-3 py-2 list-group-item list-group-item-action border-right-0 border-left-0 border-bottom-0"><i class="mr-2 fas fa-angle-right"></i> News</a>
                                <a href="../blog/single-blog-post.html" class="font-bold-on-hover px-3 py-2 list-group-item list-group-item-action border-right-0 border-left-0 border-bottom-0"><i class="mr-2 fas fa-angle-right"></i> Social</a>
                                <a href="../blog/single-blog-post.html" class="font-bold-on-hover px-3 py-2 list-group-item list-group-item-action border-right-0 border-left-0 border-bottom-0"><i class="mr-2 fas fa-angle-right"></i> Technology</a>
                                <a href="../blog/single-blog-post.html" class="font-bold-on-hover px-3 py-2 list-group-item list-group-item-action border-right-0 border-left-0 border-bottom-0"><i class="mr-2 fas fa-angle-right"></i> Audios</a>
                                <a href="../blog/single-blog-post.html" class="font-bold-on-hover px-3 py-2 list-group-item list-group-item-action border-right-0 border-left-0 border-bottom-0"><i class="mr-2 fas fa-angle-right"></i> Videos</a>
                            </div>
                        </aside>
                        <aside class="mb-7">
                            <div class="border-bottom border-color-1 mb-5">
                                <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Recent Posts</h3>
                            </div>
                            <article class="mb-4">
                                <div class="media">
                                    <div class="width-75 height-75 mr-3">
                                        <img class="img-fluid object-fit-cover" src="{{asset('/client/assets/img/1500X730/img1.jpg')}}" alt="Image Description">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="font-size-14 mb-1"><a href="../blog/single-blog-post.html" class="text-gray-39">Robot Wars – Post with Gallery</a></h4>
                                        <span class="text-gray-5">March 3, 2020</span>
                                    </div>
                                </div>
                            </article>
                            <article class="mb-4">
                                <div class="media">
                                    <div class="width-75 height-75 mr-3">
                                        <img class="img-fluid object-fit-cover" src="{{asset('/client/assets/img/1500X730/img4.jpg')}}" alt="Image Description">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="font-size-14 mb-1"><a href="../blog/single-blog-post.html" class="text-gray-39">Robot Wars – Now Closed – Post with Audio</a></h4>
                                        <span class="text-gray-5">March 3, 2020</span>
                                    </div>
                                </div>
                            </article>
                            <article class="mb-4">
                                <div class="media">
                                    <div class="width-75 height-75 mr-3">
                                        <img class="img-fluid object-fit-cover" src="{{asset('/client/assets/img/1500X730/img5.jpg')}}" alt="Image Description">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="font-size-14 mb-1"><a href="../blog/single-blog-post.html" class="text-gray-39">Robot Wars – Now Closed – Post with Video</a></h4>
                                        <span class="text-gray-5">March 3, 2020</span>
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
                                        <h4 class="font-size-14 mb-1"><a href="../blog/single-blog-post.html" class="text-gray-39">Announcement – Post without Image</a></h4>
                                        <span class="text-gray-5">March 3, 2020</span>
                                    </div>
                                </div>
                            </article>
                            <article class="mb-4">
                                <div class="media">
                                    <div class="width-75 height-75 mr-3">
                                        <img class="img-fluid object-fit-cover" src="{{asset('/client/assets/img/1500X730/img6.jpg')}}" alt="Image Description">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="font-size-14 mb-1"><a href="../blog/single-blog-post.html" class="text-gray-39">Robot Wars – Now Closed</a></h4>
                                        <span class="text-gray-5">March 3, 2020</span>
                                    </div>
                                </div>
                            </article>
                        </aside>
                        <aside class="mb-7">
                            <div class="border-bottom border-color-1 mb-5">
                                <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Tags Clouds</h3>
                            </div>
                            <div class="d-flex flex-wrap mx-n1">
                                <a href="../blog/single-blog-post.html" class="text-gray-90 mb-2 bg-primary-on-hover py-2 px-3 border mx-1">amazon like</a>
                                <a href="../blog/single-blog-post.html" class="text-gray-90 mb-2 bg-primary-on-hover py-2 px-3 border mx-1">Awesome</a>
                                <a href="../blog/single-blog-post.html" class="text-gray-90 mb-2 bg-primary-on-hover py-2 px-3 border mx-1">bootstrap</a>
                                <a href="../blog/single-blog-post.html" class="text-gray-90 mb-2 bg-primary-on-hover py-2 px-3 border mx-1">buy it</a>
                                <a href="../blog/single-blog-post.html" class="text-gray-90 mb-2 bg-primary-on-hover py-2 px-3 border mx-1">clean design</a>
                                <a href="../blog/single-blog-post.html" class="text-gray-90 mb-2 bg-primary-on-hover py-2 px-3 border mx-1">electronics</a>
                                <a href="../blog/single-blog-post.html" class="text-gray-90 mb-2 bg-primary-on-hover py-2 px-3 border mx-1">theme</a>
                                <a href="../blog/single-blog-post.html" class="text-gray-90 mb-2 bg-primary-on-hover py-2 px-3 border mx-1">video post format</a>
                                <a href="../blog/single-blog-post.html" class="text-gray-90 mb-2 bg-primary-on-hover py-2 px-3 border mx-1">Ecommerce</a>
                                <a href="../blog/single-blog-post.html" class="text-gray-90 mb-2 bg-primary-on-hover py-2 px-3 border mx-1">wordpress</a>
                            </div>
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
                                    <img class="img-fluid m-auto max-height-50" src="{{asset('/client/assets/img/200X60/img1.png')}}" alt="Image Description">
                                </a>
                            </div>
                            <div class="js-slide">
                                <a href="#" class="link-hover__brand">
                                    <img class="img-fluid m-auto max-height-50" src="{{asset('/client/assets/img/200X60/img2.png')}}" alt="Image Description">
                                </a>
                            </div>
                            <div class="js-slide">
                                <a href="#" class="link-hover__brand">
                                    <img class="img-fluid m-auto max-height-50" src="{{asset('/client/assets/img/200X60/img3.png')}}" alt="Image Description">
                                </a>
                            </div>
                            <div class="js-slide">
                                <a href="#" class="link-hover__brand">
                                    <img class="img-fluid m-auto max-height-50" src="{{asset('/client/assets/img/200X60/img4.png')}}" alt="Image Description">
                                </a>
                            </div>
                            <div class="js-slide">
                                <a href="#" class="link-hover__brand">
                                    <img class="img-fluid m-auto max-height-50" src="{{asset('/client/assets/img/200X60/img5.png')}}" alt="Image Description">
                                </a>
                            </div>
                            <div class="js-slide">
                                <a href="#" class="link-hover__brand">
                                    <img class="img-fluid m-auto max-height-50" src="{{asset('/client/assets/img/200X60/img6.png')}}" alt="Image Description">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Brand Carousel -->
            </div>
@endsection