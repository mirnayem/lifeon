<div class="col-lg-4">
    <div class="sidebar_widget">
        <div class="single_sidebar_wiget search_form_widget">
            <form action="#">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder='Search Keyword'
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                    <div class="btn_1">search</div>
                </div>
            </form>
        </div>
        <div class="single_sidebar_wiget">
            <div class="sidebar_tittle">
                <h3>Categories</h3>
            </div>
            <div class="single_catagory_item category">
                <ul class="list-unstyled">

                    @foreach ($categories as $category)
                    <li><a href="{{route('categories.show', $category->id)}}">{{$category->name}}</a> <span>{{$category->posts->count()}}</span> </li>
                    @endforeach
                 
                </ul>
            </div>
        </div>
        <div class="single_sidebar_wiget">
            <div class="sidebar_tittle">
                <h3>Tags</h3>
            </div>
            <div class="tags are-medium">
                @foreach ($tags as $tag)
                <span class="tag is-success is-medium"><a class="text-light" href=" {{route('tags.show',$tag->id)}} "> {{$tag->name}} </a> </span>
                @endforeach
            </div>
            
          
        </div>
        <div class="single_sidebar_wiget">
            <div class="sidebar_tittle">
                <h3>Popular Feeds</h3>
            </div>
            <div class="single_catagory_post post_2 ">
                <div class="category_post_img">
                    <img src="img/sidebar/sidebar_1.png" alt="">
                </div>
                <div class="post_text_1 pr_30">
                    <a href="single-blog.html">
                        <h3>Subdue lesser beast winged
                            bearing meat tree one</h3>
                    </a>
                    <p><span> By Michal</span> / March 30</p>
                </div>
            </div>
            <div class="single_catagory_post post_2 ">
                <div class="category_post_img">
                    <img src="img/sidebar/sidebar_2.png" alt="">
                </div>
                <div class="post_text_1 pr_30">
                    
                    <a href="single-blog.html">
                        <h3>Subdue lesser beast winged
                            bearing meat tree one</h3>
                    </a>
                    <p><span> By Michal</span> / March 30</p>
                </div>
            </div>
            <div class="single_catagory_post post_2">
                <div class="category_post_img">
                    <img src="img/sidebar/sidebar_3.png" alt="">
                </div>
                <div class="post_text_1 pr_30">
                    <a href="single-blog.html">
                        <h3>Subdue lesser beast winged
                            bearing meat tree one</h3>
                    </a>
                    <p><span> By Michal</span> / March 30</p>
                </div>
            </div>
        </div>
        
        <div class="single_sidebar_wiget">
            <div class="sidebar_tittle">
                <h3>Share this post</h3>
            </div>
            <div class="social_share_icon tags">
                <ul class="list-unstyled">
                    <li><a href="#"><i class="ti-facebook"></i></a></li>
                    <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                    <li><a href="#"><i class="ti-pinterest"></i></a></li>
                    <li><a href="#"><i class="ti-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>