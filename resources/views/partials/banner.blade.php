   <!-- banner post start-->
   <section class="banner_post">
    <div class="container">
        <div class="row justify-content-between ">

            @foreach ($posts as $post)
            <div class="banner_post_1">
                @foreach ($post->images as $item)
                @if($post->images->first()==$item)
                <img src="{{$item->image}}" alt="">
                @endif
                @endforeach
              
                   
                       
                       
                    
                    <a href="category.html">
                        @foreach ($post->categories as $category)
                        @if ($post->categories->first() == $category)
                        <h5> {{$category->name}}</h5>
                        @endif
                        @endforeach
                        
                    </a> 
                    <a href="{{route('posts.show', $post->id)}}"><h2> {{$post->title}} </h2></a> 
                    <p>Posted on {{$post->created_at->toFormattedDateString()}}</p>
             
            </div>
            @endforeach
            
        </div>
    </div>
</section>
<!-- banner post end-->