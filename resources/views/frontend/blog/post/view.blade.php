@extends('frontend.layouts.main')

@isset($post['title'])
    @section('title')
        {{ $post['title'] }}
    @endsection
@endisset

@section('content')
    <div class="row">
        <div class="col-md-4 pull-right col-xs-12">
            <aside class="sidebar sidebar-right">
                @include('frontend.blog.post.search')
                <div class="post-category">
                    <h2>Post Category</h2>
                    <ul>
                        @foreach($post->categories as $category)
                            <li><a href="{{$category->url}}">{{$category->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="recent-post">
                    <h2>Recent Posts</h2>
                    <div class="post-item-list">
                        <div class="post-item">
                            <div class="post-item-img">
                                <a href="#"><img src="" alt="images" class="img-reponsive"></a>
                            </div>
                            <div class="post-item-text">
                                <h3 class="title">
                                    <a href="#" title="">Arcte Beritatis et Quasi solar...</a>
                                </h3>
                                <div class="tags">
                                    <span class="date">22 June, 2016</span>
                                </div>
                            </div>
                        </div>
                        <div class="post-item">
                            <div class="post-item-img">
                                <a href="#"><img src="img/blog/blog-recentpost-2.jpg" alt="images" class="img-reponsive"></a>
                            </div>
                            <div class="post-item-text">
                                <h3 class="title">
                                    <a href="#" title="">Arcte Beritatis et uas veatae Vitae</a>
                                </h3>
                                <div class="tags">
                                    <span class="date">22 June, 2016</span>
                                </div>
                            </div>
                        </div>
                        <div class="post-item">
                            <div class="post-item-img">
                                <a href="#"><img src="img/blog/blog-recentpost-3.jpg" alt="images" class="img-reponsive"></a>
                            </div>
                            <div class="post-item-text">
                                <h3 class="title">
                                    <a href="#" title="">Arcte Beritatis et Qusi solar veatae...</a>
                                </h3>
                                <div class="tags">
                                    <span class="date">22 June, 2016</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="archives">
                    <h2>Archive</h2>
                    <ul>
                        <li><a href="#" title="">May 2015 <span class="count">(4)</span></a></li>
                        <li><a href="#" title="">January 2015 <span class="count">(5)</span></a></li>
                        <li><a href="#" title="">December 2014 <span class="count">(6)</span></a></li>
                        <li><a href="#" title="">October 2014 <span class="count">(8)</span></a></li>
                    </ul>
                </div>
                <div class="tags">
                    <h2>Tags</h2>
                    <div class="tagcloud">
                        <a href="#" class="tag-position">WP</a>
                        <a href="#" class="tag-position">Haintheme</a>
                        <a href="#" class="tag-position">Shop</a>
                        <a href="#" class="tag-position">Shopping</a>
                        <a href="#" class="tag-position">Love</a>
                        <a href="#" class="tag-position">Quick</a>
                        <a href="#" class="tag-position">Care</a>
                        <a href="#" class="tag-position">Lovely Man</a>
                        <a href="#" class="tag-position">Hi!</a>
                    </div>
                </div>
            </aside>
        </div>
        <div class="main-content col-sm-12 col-lg-8 col-md-8">
            <div class="blog-slide">
                <a href="#"><img src="{{ Resizer::get($post->thumbnail, 770, 400) }}" alt="images" class="img-responsive"></a>
                <div class="blog-slide-title">
                    <div class="tag">
                        <ul>
                            <li><a href="#"><i class="fa fa-pencil-square-o fa-3" aria-hidden="true"></i>ADMIN</a></li>
                            <li><a href="#"><i class="ion-eye fa-3a"></i>986</a></li>
                            <li><a href="#"><i class="ion-chatbubbles fa-3a"></i>125</a></li>
                        </ul>
                    </div>
                </div>
                <div class="blog-slide-content">
                    {!! $post->desc !!}
                    <div class="blog-connect-social">
                        <a href="#" class="blog-share-text pull-left">15 Shares</a>
                        <div class="blog-connect-social-group pull-right">
                            <ul>
                                <li><a href="#" title=""><i class="ion-social-facebook fa-3" aria-hidden="true"></i></a></li>
                                <li><a href="#" title=""><i class="ion-social-twitter fa-3" aria-hidden="true"></i></a></li>
                                <li><a href="#" title=""><i class="ion-social-googleplus fa-3" aria-hidden="true"></i></a></li>
                                <li><a href="#" title=""><i class="ion-social-linkedin fa-3" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="blog-navigation">
                <div class="blog-navigation-links">
                    <div class="row">
                        <div class="blog-navigation-prev col-md-6">
                            <div class="post-item">
                                <div class="post-item-img">
                                    <a href="#"><img src="img/blog/blog-slide-prev.jpg" alt="images" class="img-responsive"></a>
                                </div>
                                <div class="post-item-content">
                                    <h3><a href="#">Good Way to Generate Leads</a></h3>
                                    <div class="post-item-link">
                                        <a href="#" class="btn-prev">Previous</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog-navigation-next col-md-6">
                            <div class="post-item">
                                <div class="post-item-content">
                                    <h3><a href="#">Additional Value to the Search</a></h3>
                                    <div class="post-item-link">
                                        <a href="#" class="btn-next">Next</a>
                                    </div>
                                </div>
                                <div class="post-item-img">
                                    <a href="#"><img src="img/blog/blog-slide-next.jpg" alt="images" class="img-responsive"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog-comment">
                <h2 class="blog-title">
                    Comments (3)
                </h2>
                <div class="blog-comment-list">
                    <ul class="commentlist">
                        <li>
                            <div class="comment">
                                <div class="avatar">
                                    <img src="img/avatar_author.png" alt="images" class="img-responsive">
                                </div>
                                <div class="comment-box">
                                    <div class="comment-author-meta">
                                        <strong>billu manson</strong>
                                        <div class="comment-post-date">
                                            <span class="date">March 14, 2017 at 4:35 am</span>
                                            <a href="#" class="comment-reply">Reply</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="comment-content">
                                        Accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo marvl inven tore veritatis et quasi architecto.beatae vitae dicta sunt explicabo.
                                    </div>
                                </div>
                            </div>
                            <ul class="comment-child">
                                <li>
                                    <div class="comment">
                                        <div class="avatar">
                                            <img src="img/avatar_author.png" alt="images" class="img-responsive">
                                        </div>
                                        <div class="comment-box">
                                            <div class="comment-author-meta">
                                                <div class="comment-author-meta">
                                                    <strong>billu manson</strong>
                                                    <div class="comment-post-date">
                                                        <span class="date">March 14, 2017 at 4:35 am</span>
                                                        <a href="#" class="comment-reply">Reply</a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <div class="comment-content">
                                                Accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo marvl inven tore veritatis et quasi architecto.beatae vitae dicta sunt explicabo.
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="comment">
                                <div class="avatar">
                                    <img src="img/avatar_author.png" alt="images" class="img-responsive">
                                </div>
                                <div class="comment-box">
                                    <div class="comment-author-meta">
                                        <div class="comment-author-meta">
                                            <strong>billu manson</strong>
                                            <div class="comment-post-date">
                                                <span class="date">March 14, 2017 at 4:35 am</span>
                                                <a href="#" class="comment-reply">Reply</a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="comment-content">
                                        Accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo marvl inven tore veritatis et quasi architecto.beatae vitae dicta sunt explicabo.
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="blog-comment-form">
                <div class="blog-comment-title">
                    <h2 class="blog-title">Leave Your Comment</h2>
                </div>
                <form action="#" method="get" accept-charset="utf-8" class="comment-form">
                    <div class="form-group">
                        <input type="text" name="author" placeholder="Name*" class="form-control" id="author" value="" aria-required="true">
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" placeholder="Email Address *" class="form-control" id="email" value="" aria-required="true">
                    </div>
                    <div class="form-group">
                        <textarea id="comment" name="comment" class="form-control" placeholder="Comment "></textarea>
                    </div>
                    <button type="submit" class="btn-submit-comment">Submit Now</button>
                </form>
            </div>
        </div>
    </div>
@endsection
