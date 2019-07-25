
@extends('includes.beta')
@section('content')




    <div class=" well">
        <div class="row panel panel-default " style="padding: 5%">


            <div class="col-sm-12">


                    @if($ticket)

<h3 style="text-decoration: underline">{{$ticket->title}}</h3>

        @foreach( $ticket_titles as $ticket_title )


    <div>
        <h6 style="color: #b2b2b2;font-size: 13px;line-height: 16px;letter-spacing: -.006em; padding-bottom: 5px;">{{date('d-m-Y', strtotime($ticket_title->date))}} <span class="pull-right" style="font-size: 13px;line-height: 16px;letter-spacing: -.006em;font-family: 'SF UI Text Medium', 'SF UI Text Light', 'Helvetica Neue', 'HelveticaNeue', Helvetica, Arial, Verdana, sans-serif;font-weight: 800;padding-bottom: 10px;margin: 0;padding: 0">{{(empty($ticket_title->admin_id))?'From Admin of  City Cyber Solutions':'From You'}}</span></h6>



        <p style="font-size: 15px; line-height: 19px; letter-spacing: -.016em;margin: 0;padding: 0">{{$ticket_title->chats}}</p>

        <hr>

    </div>

        @endforeach

            </div>

            @if($ticket->status == 1)
            <div class="form-group no-margin">
                <label for="explain"><small>Reply</small> <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Type in your question and send or close ticket when issue is resolved"><span class="fa fa-question-circle"></span></button> </label>
            <textarea class="form-control autogrow" id="explain" placeholder="" ></textarea>
            </div>

            <div class="col-sm-12">
                <button type="button" class="btn btn-danger" onclick="closess()" >Close Ticket/Issue</button>
                <button    class="btn btn-info approve pull-right" onclick="add_issue()">Send</button>
            </div>
            @else

                <div align="center"><h3 class="text-danger">Issue have been resolved and closed</h3><span  class="text-danger fa fa-close" style="border: 2px solid #ac1818;border-radius:100%;padding: 0.5% "></span></div>
            @endif



            @else
                <h3>Something went wrong head  <a class="btn btn-danger btn-lg" href="{{url('/betabet')}}">Back</a></h3>
            @endif


        </div>
    </div>





    <br><br>
   </div>
          </div>

       </section>



    <script>

        function add_issue(){

            var explain = $('#explain').val();
            var id = '{{$id}}' ;

            if(explain == ''){

                $.alert({
                    title: 'Alert!',
                    content: 'Please type something',
                });

            }else{


                $.confirm({
                    title: 'Confirm!',
                    content: 'Are You Sure You Want To submit question',
                    buttons: {
                        confirm: function () {
                            $.ajax({
                                type: 'POST',
                                url: "{{url('/betabet/add_issue')}}",
                                data: {

                                    explain:explain,
                                    id:id,
                                    "_token": "{{ csrf_token() }}"
                                },
                                error: function() {
                                    window.location = "{{url('betabet/ticket_single')}}/{{$id}}";
                                },
                                dataType: 'text',
                                success: function() {
                                    window.location = "{{url('betabet/ticket_single')}}/{{$id}}";

                                },
                                beforeSend:function(xhr){
                                    $('approve').html('sending......')
                                    $.dialog({
                                        title: 'Alert!',
                                        theme: 'dark',
                                        content: 'Loading Pls Wait',
                                        buttons:[],


                                    })
                                },
                                complete: function(){
                                    $('.highestS').html('Send')
                                }

                            });


                        },
                        cancel: function () {
                            $.alert('Canceled!');
                        }

                    }
                });
            }
        }

        function closess(){

            var id = '{{$id}}' ;

            $.confirm({
                title: 'Confirm!',
                content: 'Are You Sure You Want To Close Ticket This cant be undone!!!',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            type: 'POST',
                            url: "{{url('/betabet/close_ticket')}}",
                            data: {

                                id:id,
                                "_token": "{{ csrf_token() }}"
                            },
                            error: function() {
                                window.location = "{{url('betabet/ticket_single')}}/{{$id}}";
                            },
                            dataType: 'text',
                            success: function() {
                                window.location = "{{url('betabet/ticket_single')}}/{{$id}}";

                            },
                            beforeSend:function(xhr){
                                $('approve').html('Closing........')
                                $.dialog({
                                    title: 'Alert!',
                                    theme: 'dark',
                                    content: 'Loading Pls Wait',
                                    buttons:[],


                                })
                            },
                            complete: function(){
                                $('.highestS').html('Closed')
                            }

                        });


                    },
                    cancel: function () {
                        $.alert('Canceled!');
                    }

                }
            });

        }


    </script>

@endsection
