 <!-- feature_post start-->
 <section class="all_post section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">

                    @foreach ($allposts as $post)
                    <div class="col-lg-6 col-sm-6">
                        <div class="single_post post_1">
                            <div class="single_post_img">
                                @foreach ($post->images as $item)
                                @if($post->images->first()==$item)
                                <img src="{{$item->image}}" alt="">
                                @endif
                                @endforeach
                               
                            </div>
                            <div class="single_post_text text-center">
                                <a href="category.html">
                                     @foreach ($post->categories as $category)
                                    @if ($post->categories->first() == $category)
                                    <h5> 
                                        {{$category->name}}
                                    </h5>
                                    @endif
                                     @endforeach
                                </a> 
                                <a href="single-blog.html"><h2>{{$post->title}}</h2></a> 
                                <p>Posted on {{$post->created_at->toFormattedDateString()}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
          
                </div>
                <div class="page_pageniation">
                    <nav aria-label="Page navigation example">

                        {{$allposts->links()}}
                       
                    </nav>
                </div>
            </div>
           @include('partials.sidebar')
        </div>
    </div>
</section>
<!-- feature_post end-->