
@extends('includes.beta')
@section('content')

                    {{--<main id="tm-content" class="tm-content">--}}
                        {{--<div class="match-list-wrap">--}}
                            {{--<div class="match-list-item">--}}
                                {{--<div class="date">--}}
                                    {{--<span>14</span>--}}
                                    {{--Nov                --}}
                                {{--</div>--}}
                                {{----}}
                                {{--<div class="team-name">--}}
                                    {{--England                --}}
                                {{--</div>--}}




                                {{--<div class="location">--}}
                                    {{--<address>--}}
                                        {{--Read--}}
                                    {{--</address>--}}
                                    {{--<div class="team-score">--}}
                                        {{--Unread--}}
                                    {{--</div>--}}
                                {{--</div>--}}



                                {{--<div class="va-view-wrap">--}}
                                    {{--<a class="view-article" href="#">view</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}


                            {{----}}
                        {{--</div>--}}
                    {{--</main>--}}
            {{----}}

@if( count($message) != 0 )
                        <div class="uk-accordion" data-uk-accordion="">

                            @foreach( $message as $mes )

                            <h4 data-ids="{{$mes->ids}}"  class="uk-accordion-title uk-active done"><span class="badge"> {{date('d-m-Y', strtotime($mes->time)) }}  </span>   {{ $mes->header}}<span class=" label {{($mes->status==1)?'label-danger':'label-primary'}} pull-right" style="padding-right: 50px ">{{($mes->status==1)?'Unread':'read'}}</span> <span class="arrow"><i class="uk-icon-arrow-right"></i></span></h4>
                            <div aria-expanded="false" data-wrapper="true" role="list" style="height: 0px; position: relative; overflow: hidden;">
                                <div class="uk-accordion-content">{{$mes->body}}</div>
                            </div>

                            @endforeach

                        </div>
@else
    <h4 class="uk-accordion-title"> No Message</h4>
@endif


 <br><br>
   </div>
          </div>
     
       </section>

<script>
    function read(){

        var amount = $('#amount').val();
        var bank = $('#bank').val();
        var user_id = '{{$name->user_id}}' ;


        if (amount==''|| bank=='' ){
            $.alert({
                title: 'Alert!',
                content: 'Please fill all the form input!',
            });
        } else{
            if (amount <= 100) {

                $.alert({
                    title: 'Alert!',
                    content: 'Amount must be greater than 100!',
                });
            } else{


                $.confirm({
                    title: 'Confirm!',
                    content: 'Are You Sure You Want To Fund',
                    buttons: {
                        confirm: function () {
                            $.ajax({
                                type: 'POST',
                                url: "{{url('/betabet/fund')}}",
                                data: {

                                    amount:amount,
                                    bank:bank,
                                    user_id:user_id,
                                    "_token": "{{ csrf_token() }}"
                                },
                                error: function() {
                                    window.location = "{{url('/betabet/index/errorfund')}}";
                                },
                                dataType: 'text',
                                success: function() {
                                    window.location = "{{url('/betabet/index/fund')}}";

                                },

                            });


                        },
                        cancel: function () {
                            $.alert('Canceled!');
                        }

                    }
                });
            }
        }
    }

    $('.done').click(function(e){
        var me = $(this);
        //get user id
        var ids = me.data('ids');
        $.ajax({
            type: 'POST',
            url: "{{url('/betabet/read_message')}}",
            data: {

                ids:ids,

                "_token": "{{ csrf_token() }}"
            },
            error: function() {
               // window.location = "{{url('/betabet/index/errorfund')}}";
            },
            dataType: 'text',
            success: function() {
               // window.location = "{{url('/betabet/index/fund')}}";

            },

        })

    });
</script>

@endsection
