@extends('includes.city')
@section('content')
<div class="tm-top-a-box tm-full-width tm-box-bg-1 ">
            <div class="uk-container uk-container-center">
                <section id="tm-top-a" class="tm-top-a uk-grid uk-grid-collapse" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">
                    <div class="uk-width-1-1 uk-row-first">
                        <div class="uk-panel">
                            <div class="uk-cover-background uk-position-relative head-wrap" style="height: 290px; background-image: url({{url('images/head-bg.jpg')}});">
                                <img class="uk-invisible" src="../images/head-bg.jpg" alt="" height="290" width="1920">
                                <div class="uk-position-cover uk-flex uk-flex-center head-title">
                                    <h1>
                                        News
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="uk-container uk-container-center alt">
            <ul class="uk-breadcrumb">
                <li><a href="index">Home</a></li>
                <li><a href="news">News</a></li>
                <li class="uk-active"><span class="hidden-xs hidden-sm">{{ $posts->title or 'Opps something went wrong'}}</span></li>
            </ul>
        </div>
@if($posts)
        <div class="uk-container uk-container-center">
            <div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
                <div style="left: 10px; width: 100%" class="tm-main uk-width-medium-3-4 uk-push-1-4">
                    <main id="tm-content" class="tm-content">
                        <div class="contentpaneopen">
                           <article>
                                <div class="clearfix"></div>
                                <div class="article-slider">
                                    <div id="carusel-11-30" class="uk-slidenav-position" data-uk-slideshow="{ height : 510 }">
                                        <ul class="uk-slideshow">

                                            <li>
                                                <div style="background-image: url(../images/{{$posts->images}});" class="img-polaroid" alt="news" class="uk-cover-background uk-position-cover"></div>
                                                <img style="width: 100%; height: auto; opacity: 0;" src="../admins/images/posts/{{$posts->images}}" alt="">
                                            </li>
                                            <li>
                                                <div style="background-image: url(../images/{{$posts->images}});" class="uk-cover-background uk-position-cover"></div>
                                                <img style="width: 100%; height: auto; opacity: 0;" src="../admins/images/posts/{{$posts->images}}" alt="">
                                            </li>
                                        </ul>
                                        <div class="article-slider-btn">
                                            <a href="/" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
                                            <a href="/" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="article-param">
                                    <div class="date">
                                        <i class="uk-icon-calendar"></i>
                                        {{date('d-m-Y', strtotime($posts->time))}}
                                    </div>
                                    <div class="author">
                                        <i class="uk-icon-user"></i>
                                        <a class="filter-link" data-original-title="Show only articles of <b>Guest</b>" href="#" rel="nofollow">{{$posts->tag}}</a>
                                    </div>
                                    <div class="categories">
                                        <i class="uk-icon-list-ul"></i>
                                        <a href="#">{{$posts->post_category}}</a>
                                    </div>
                                </div>
                                <div class="article-single-text">
                                    <h3>{{$posts->title}}</h3>
                                    <p>{{$posts->content}}</p>
                                    
                                   
                                </div>
                                <div class="share-wrap">
                                    <div class="share-title">share</div>
                                    <script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
                                    <div class="yashare-auto-init" data-yasharel10n="en" data-yasharetype="none" data-yasharequickservices="facebook,twitter,gplus"><span class="b-share"><a rel="nofollow" target="_blank" title="Facebook" class="b-share__handle b-share__link b-share-btn__facebook" href="https://share.yandex.net/go.xml?service=facebook&amp;url=http%3A%2F%2Fsport.statiolh.bget.ru%2Findex.php%2Fnews%2Fitem%2F2-life%2F30-bla-bla-bla&amp;title=Your%20Joomla!%20Site%20-%20Suspendisse%20purus%20enim%2C%20dictum%20sed%20lorem%20ac%2C%20sodales%20maximus%20est%20-%20Life%20-%20News" data-service="facebook"><span class="b-share-icon b-share-icon_facebook"></span></a><a rel="nofollow" target="_blank" title="Twitter" class="b-share__handle b-share__link b-share-btn__twitter" href="https://share.yandex.net/go.xml?service=twitter&amp;url=http%3A%2F%2Fsport.statiolh.bget.ru%2Findex.php%2Fnews%2Fitem%2F2-life%2F30-bla-bla-bla&amp;title=Your%20Joomla!%20Site%20-%20Suspendisse%20purus%20enim%2C%20dictum%20sed%20lorem%20ac%2C%20sodales%20maximus%20est%20-%20Life%20-%20News" data-service="twitter"><span class="b-share-icon b-share-icon_twitter"></span></a><a rel="nofollow" target="_blank" title="Google Plus" class="b-share__handle b-share__link b-share-btn__gplus" href="https://share.yandex.net/go.xml?service=gplus&amp;url=http%3A%2F%2Fsport.statiolh.bget.ru%2Findex.php%2Fnews%2Fitem%2F2-life%2F30-bla-bla-bla&amp;title=Your%20Joomla!%20Site%20-%20Suspendisse%20purus%20enim%2C%20dictum%20sed%20lorem%20ac%2C%20sodales%20maximus%20est%20-%20Life%20-%20News" data-service="gplus"><span class="b-share-icon b-share-icon_gplus"></span></a></span></div>
                                </div>
                            </article>
                            @else
                                <div class="container">Opps something went wrong <a class="btn btn-danger" href="{{url('news')}}">Back to news</a></div>
                            @endif

                          <br><br>
                            

                                    <script type="text/javascript">
                                      
                                    </script> 
                                </div>
                    </main>
                            </div> 

            
                        </div>
   
                    </main>
                </div>
              
            </div>
        </div>
 @endsection