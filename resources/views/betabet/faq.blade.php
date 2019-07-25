

@extends('includes.beta')
@section('content')


  <h2>Frequently Asked Questions</h2>
  <p>Here are tips to help u manage ur account</p>
  <div class="uk-accordion" data-uk-accordion="">
    @foreach($faqs as $faq)



      <h4 class="uk-accordion-title">  {{ $faq->question}} <span class="arrow"><i class="uk-icon-arrow-right"></i></span></h4>
      <div aria-expanded="false" data-wrapper="true" role="list" style="height: 0px; position: relative; overflow: hidden;">
        <div class="uk-accordion-content">{{$faq->reply}}</div>
      </div>



    @endforeach
  </div>
</div></div></div>
@endsection