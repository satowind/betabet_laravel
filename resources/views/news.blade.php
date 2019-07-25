@extends('includes.city')
@section('content')
    <style>
        .pagination{
            margin-bottom: -10px;

        }

        .pagination>li>a, .pagination>li>span{
            color:#ed663b;

        }

        .pagination>li>a:hover, .pagination>li>span:hover{
            color:#228b22;

        }

        .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover{
            background-color:#ed663b ;
            border-color: #ed663b;
        }
    </style>
        <div class="tm-top-a-box tm-full-width tm-box-bg-1 ">
            <div class="uk-container uk-container-center">
                <section id="tm-top-a" class="tm-top-a uk-grid uk-grid-collapse" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">
                    <div class="uk-width-1-1 uk-row-first">
                        <div class="uk-panel">
                            <div class="uk-cover-background uk-position-relative head-wrap" style="height: 290px; background-image: url('images/head-bg.jpg');">
                                <img class="uk-invisible" src="images/head-bg.jpg" alt="" height="290" width="1920">
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
                <li class="uk-active"><span>News</span></li>
            </ul>
        </div>

        <div class="uk-container uk-container-center">
            <div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
                <div style="left: 10px; width: 100%" class="tm-main uk-width-medium-3-4 uk-push-1-4">
                   
                    <div class="contentpaneopen">
                       <main id="tm-content" class="tm-content">
                            <div class="uk-grid" data-uk-grid-match="">

                
     @foreach($posts as $post)
                               
                                <div class="uk-width-large-1-3 uk-width-medium-2-4 uk-width-small-2-4 list-article uk-flex uk-flex-column">
                                    <div class="wrapper">
                                        <div class="img-wrap uk-flex-wrap-top">
                                            <a href="news_single/{{$post->id}}">
                                            <img src="admins/images/posts/{{$post->images}}" class="img-polaroid" alt="news">
                                            </a>        
                                        </div>
                                        <div class="info uk-flex-wrap-middle">
                                            <div class="date">
                                                {{date('d-m-Y', strtotime($post->time))}}
                                            </div>
                                            <div class="name">
                                                <h4>
                                                    <a href="news_single/{{$post->id}}">{{$post->title}}</a>
                                                </h4>
                                            </div>
                                            <div class="text">
                                                <p>{{$post->content}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="article-actions uk-flex-wrap-bottom">
                                        <div class="count"><i class="uk-icon-calendar"></i><span>{{date('d-m-Y', strtotime($post->time))}}</span></div>
                                        <div class="read-more"><a href="news_single/{{$post->id}}">Read More</a></div>
                                    </div>
                                </div> 





@endforeach




                               
                               

</div></main>
                        <div align="center">
                            <h4 style="color:#228b22;"><span style=" margin-right: 20px">page {{$posts->currentPage()}}</span>  {{ $posts->links() }} <span style=" margin-left: 20px">of {{$posts->total()}} pages</span></h4>
                        </div>
</div></div></div>


</div><br>
        </div>
</div>


@endsection