@extends('layouts.main')

@section('content')


@include('partials.header')


       <!-- breadcrumb start-->
       <section class="breadcrumb breadcrumb_bg align-items-center">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-sm-6">
                    <div class="breadcrumb_tittle text-left">
                        <h2>blog details</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="breadcrumb_content text-right">
                        <p>Home<span>/</span>blog details</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->
   <!--================Blog Area =================-->
   <section class="blog_area single-post-area all_post section_padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                      @foreach ($post->images as $image)
                          @if ($post->images->first() == $image)
                          <img class="img-fluid" src="{{$image->image}}" alt="">
                          @endif
                      @endforeach
                    
                  </div>
                  <div class="blog_details">
                     <h2>
                         {{$post->title}}
                     </h2>
                     <ul class="blog-info-link mt-3 mb-4">
                         @foreach ($post->categories as $category)
                         <li><a href="#"><i class="far fa-user"></i> {{$category->name}} </a></li>
                         @endforeach
                        @php
                            $total_comment = $post->comments->count();
                        @endphp
                        <li><a href="#"><i class="far fa-comments"></i> {{$total_comment}}

                            @if ($total_comment <= 1)
                              Comment
                            @else
                            Comments
                        @endif </a>
                    </li>
                     </ul>
                     <p class="excert">
                           {{$post->body}}
                     </p>
                  </div>
               </div>
               <div class="navigation-top">
                  <div class="d-sm-flex justify-content-between text-center">
                     <p class="like-info"><span class="align-middle"><i class="far fa-heart"></i></span> Lily and 4
                        people like this</p>
                     <div class="col-sm-4 text-center my-2 my-sm-0">
                        <!-- <p class="comment-count"><span class="align-middle"><i class="far fa-comment"></i></span> 06 Comments</p> -->
                     </div>
                     <ul class="social-icons">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
                     </ul>
                  </div>
                  <div class="navigation-area">
                     <div class="row">
                        <div
                           class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                           <div class="thumb">
                              <a href="#">
                                 <img class="img-fluid" src="img/post/preview.png" alt="">
                              </a>
                           </div>
                           <div class="arrow">
                              <a href="#">
                                 <span class="text-white ti-arrow-left"></span>
                              </a>
                           </div>
                           <div class="detials">
                            
                              @if($previous)
                              <a  href="{{ route( 'posts.show', $previous->id ) }}"> <h4 class="text-success"> {{ Str::words($previous->title , 5 ,' >>' )}} </h4></a>
                               
                              @endif
                              
                           </div>
                        </div>
                        <div
                           class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                           <div class="detials">

                              @if($next)
                              <a href="{{ route( 'posts.show', $next->id ) }}"><h4 class="text-success"> {{ Str::words($next->title , 5, ' >>')}} </h4></a>
                              @endif
                            
                           </div>
                           <div class="arrow">
                              <a href="#">
                                 <span class="text-white ti-arrow-right"></span>
                              </a>
                           </div>
                           <div class="thumb">
                              <a href="#">
                                 <img class="img-fluid" src="img/post/next.png" alt="">
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="blog-author">
                  <div class="media align-items-center">
                     <img src="img/blog/author.png" alt="">
                     <div class="media-body">
                        <a href="#">
                           <h4>{{$post->user->name}}</h4>
                        </a>
                        <p>{{$post->user->description}}</p>
                     </div>
                  </div>
               </div>
               <div class="comments-area">
                  <h4>{{$total_comment}}

                    @if ($total_comment <= 1)
                      Comment
                    @else
                    Comments
                @endif</h4>


                @foreach ($post->comments as $comment)
                <div class="comment-list">
                    <div class="single-comment justify-content-between d-flex">
                       <div class="user justify-content-between d-flex">
                          <div class="thumb">
                             <img src="img/comment/comment_1.png" alt="">
                          </div>
                          <div class="desc">
                             <p class="comment">
                                 {{$comment->body}}
                             </p>
                             <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                   <h5>
                                      <a href="#">{{$comment->user->name}}</a>
                                   </h5>
                                   <p class="date">{{$comment->created_at->toFormattedDateString()}} at {{$comment->created_at->format(' h:i:s A')}} </p>
                                </div>
                                <div class="reply-btn">
                                   <a href="#" class="btn-reply text-uppercase">reply</a>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
                @endforeach
                
                 
               </div>
               <div class="comment-form">
                  <h4>Leave a Reply</h4>
                  <form class="form-contact comment_form" action="#" id="commentForm">
                     <div class="row">
                        <div class="col-12">
                           <div class="form-group">
                              <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                 placeholder="Write Comment"></textarea>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="form-group">
                              <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                           </div>
                        </div>
                     </div>
                     <div class="load_btn">
                        <a href="#" class="btn_1">SUBMIT </a>
                     </div>
                  </form>
               </div>
            </div>
         @include('partials.sidebar')
         </div>
      </div>
   </section>
   <!--================Blog Area end =================-->

@include('partials.footer')



@endsection