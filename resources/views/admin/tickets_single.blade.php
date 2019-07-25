@extends('includes.admin')
@section('content')
    
 
                    <ol class="breadcrumb bc-3" >
                                <li>
                        <a href="index"><i class="fa-home"></i>Home</a>
                    </li>
                            <li class="active">
        
                                    <strong>Ticket Category</strong>
                            </li>
                        
                            </ol>
                    
        <h2>Tickets</h2>
        
        <br />
        


                    {{--@if($id=='errore')--}}
                        {{--<div class="alert alert-danger"> An Error Occured Sorry Try Again <a class='close' data-dismiss='alert'>&times;</a></div>--}}
                    {{--@endif--}}
                    {{--@if($id=='update')--}}
                        {{--<div class="alert alert-success"> New Message have been Updated Succesfully <a class='close' data-dismiss='alert'>&times;</a></div>--}}
                    {{--@endif--}}
                    {{--@if($id=='erroru')--}}
                        {{--<div class="alert alert-danger"> Unable to Update try Again  <a class='close' data-dismiss='alert'>&times;</a></div>--}}
                    {{--@endif--}}
                    {{--@if($id=='errora')--}}
                        {{--<div class="alert alert-danger"> Unable to Add try Again  <a class='close' data-dismiss='alert'>&times;</a></div>--}}
                    {{--@endif--}}
                    {{--@if($id=='add')--}}
                        {{--<div class="alert alert-success"> New Ticket Category have been Added Succesfully <a class='close' data-dismiss='alert'>&times;</a></div>--}}
                    {{--@endif--}}
                    {{--@if($id=='delete')--}}
                        {{--<div class="alert alert-success"> Ticket Category Deleted Succesfully <a class='close' data-dismiss='alert'>&times;</a></div>--}}
                    {{--@endif--}}
                    {{--@if($id=='errord')--}}
                        {{--<div class="alert alert-danger"> Unable to Delete try again <a class='close' data-dismiss='alert'>&times;</a></div>--}}
                    {{--@endif--}}

                    <div class="container well">
                        <div class="row panel panel-default " style="padding: 5%">




                    <div class="col-sm-12">


                        @if($ticket)

                            <h3 style="text-decoration: underline">{{$ticket->title}}</h3>
                            <br><br>

                            @foreach( $ticket_titles as $ticket_title )


                                <div>
                                    <h6 style="color: #b2b2b2;font-size: 13px;line-height: 16px;letter-spacing: -.006em; padding-bottom: 5px;">{{date('d-m-Y', strtotime($ticket_title->date))}} <span class="pull-right" style="font-size: 13px;line-height: 16px;letter-spacing: -.006em;font-family: 'SF UI Text Medium', 'SF UI Text Light', 'Helvetica Neue', 'HelveticaNeue', Helvetica, Arial, Verdana, sans-serif;font-weight: 800;padding-bottom: 10px;margin: 0;padding: 0">{{(empty($ticket_title->admin_id))?'From a concerned customer':'From You'}}</span></h6>



                                    <p style="font-size: 15px; line-height: 19px; letter-spacing: -.016em;margin: 0;padding: 0">{{$ticket_title->chats}}</p>

                                    <hr>

                                </div>

                            @endforeach

                    </div >

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
                        <h3>Something went wrong head  <a class="btn btn-danger btn-lg" href="{{url('/admin/tickets')}}">Back</a></h3>
                    @endif

                        </div>
                    </div>


        
        <br />



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
                                url: "{{url('/admin/add_issue')}}",
                                data: {

                                    explain:explain,
                                    id:id,
                                    "_token": "{{ csrf_token() }}"
                                },
                                error: function() {
                                    window.location = "{{url('admin/tickets_single')}}/{{$id}}";
                                },
                                dataType: 'text',
                                success: function() {
                                    window.location = "{{url('admin/tickets_single')}}/{{$id}}";

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
                            url: "{{url('/admin/close_ticket')}}",
                            data: {

                                id:id,
                                "_token": "{{ csrf_token() }}"
                            },
                            error: function() {
                                window.location = "{{url('admin/tickets_single')}}/{{$id}}";
                            },
                            dataType: 'text',
                            success: function() {
                                window.location = "{{url('admin/tickets_single')}}/{{$id}}";

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




