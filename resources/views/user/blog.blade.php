@extends('user/app')

@section('main-content')
  <!-- Main Content -->
  <div class="container">
        <div class="row">
            <div class="col-md-8">

              @foreach($posts as $post)
                <article class="post-item">
                    <div class="post-item-image">
                        <a href="{{route('post',$post->slug)}}">
                            
                            <img src="{{ Storage::disk('local')->url($post->image) }}" />
                        </a>
                    </div>
                    <div class="post-item-body">
                        <div class="padding-10">
                            <h2><a href="{{route('post',$post->slug)}}">{{$post->title}}</a></h2>
                            <h3>{{$post->subtitle}}</h3>
                            {{ str_limit($post->body, 150) }}
                        </div>

                        <div class="post-meta padding-10 clearfix">
                            <div class="pull-left">
                                <ul class="post-meta-group">
                                    <li><i class="fa fa-user"></i><a href="#"> Admin</a></li>
                                    <li><i class="fa fa-clock-o"></i><time>{{$post->created_at}}</time></li>
                                    <li><i class="fa fa-tags"></i><a href="#"> Blog</a></li>
                                    <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                                </ul>
                            </div>
                            <div class="pull-right">
                                <a href="{{route('post',$post->slug)}}" class="btn btn-primary">Read More &raquo;</a>
                            </div>
                        </div>
                    </div>
                </article>
              @endforeach
                <nav>
                   <ul class="pager">
                  <li class="next">
                    {{ $posts->links() }}
                  </li>
              </ul>
                </nav>
            </div>
            <div class="col-md-4">
                <aside class="right-sidebar">
                    <div class="search-widget">
                        <div class="input-group">
                          <input type="text" class="form-control input-lg" placeholder="Search for...">
                          <span class="input-group-btn">
                            <button class="btn btn-lg btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                          </span>
                        </div><!-- /input-group -->
                    </div>

                    <div class="widget">
                        <div class="widget-heading">
                            <h4>Categories</h4>
                        </div>
                        <div class="widget-body">
                            <ul class="categories">
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{ route('category',$category->id) }}"><i class="fa fa-angle-right"></i> {{$category->name}}</a>
                                        <span class="badge pull-right"></span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="widget">
                        <div class="widget-heading">
                            <h4>Popular Posts</h4>
                        </div>
                        <div class="widget-body">
                            <ul class="popular-posts">
                                <li>
                                    <div class="post-image">
                                        <a href="#">
                                            <img src="img/Post_Image_5_thumb.jpg" />
                                        </a>
                                    </div>
                                    <div class="post-body">
                                        <h6><a href="#">Blog Post #5</a></h6>
                                        <div class="post-meta">
                                            <span>36 minutes ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-image">
                                        <a href="#">
                                            <img src="img/Post_Image_4_thumb.jpg" />
                                        </a>
                                    </div>
                                    <div class="post-body">
                                        <h6><a href="#">Blog Post #4</a></h6>
                                        <div class="post-meta">
                                            <span>36 minutes ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-image">
                                        <a href="#">
                                            <img src="img/Post_Image_3_thumb.jpg" />
                                        </a>
                                    </div>
                                    <div class="post-body">
                                        <h6><a href="#">Blog Post #3</a></h6>
                                        <div class="post-meta">
                                            <span>36 minutes ago</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="widget">
                        <div class="widget-heading">
                            <h4>Tags</h4>
                        </div>
                        <div class="widget-body">
                            <ul class="tags">
                                @foreach($tags as $tag)
                                    <li><a href="#">{{$tag->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
  <hr>
@endsection
