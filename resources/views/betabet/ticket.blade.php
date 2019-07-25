
@extends('includes.beta')
@section('content')



    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog  modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Please Choose your ticket here and explain the issues</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <small class="text-danger">* </small>
                        <label for="register-form-repassword"> Choose Your Issue </label>
                        <select id="ticket_category" class="form-control" name="branch">
                            <option value="">--Choose your Ticket Category--</option>
                            @foreach($ticket_categorys as $ticket_category)
                                <option value="{{$ticket_category->id}}" >{{$ticket_category->title}}</option>
                            @endforeach


                        </select>
                    </div>

                    <div class="form-group no-margin">
                        <label for="field-7" class="control-label">Explain the issue</label>

                        <textarea class="form-control autogrow" id="explain" placeholder="" ></textarea>
                    </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
                    <button onclick="add_category()"   class="btn btn-info approve">Submit A Ticket</button>
                </div>
            </div>

        </div>
    </div>


            <div class="col-sm-12">
                @if($id=='errore')
                    <div class="alert alert-danger"> An Error Occured Sorry Try Again <a class='close' data-dismiss='alert'>&times;</a></div>
                @endif
                @if($id=='update')
                    <div class="alert alert-success"> New Message have been Updated Succesfully <a class='close' data-dismiss='alert'>&times;</a></div>
                @endif
                @if($id=='erroru')
                    <div class="alert alert-danger"> Unable to Update try Again  <a class='close' data-dismiss='alert'>&times;</a></div>
                @endif
                @if($id=='errora')
                    <div class="alert alert-danger"> Unable to Add try Again  <a class='close' data-dismiss='alert'>&times;</a></div>
                @endif
                @if($id=='add')
                    <div class="alert alert-success"> New Ticket  have been Added Succesfully <a class='close' data-dismiss='alert'>&times;</a></div>
                @endif
                @if($id=='delete')
                    <div class="alert alert-success"> Ticket  Deleted Succesfully <a class='close' data-dismiss='alert'>&times;</a></div>
                @endif
                @if($id=='errord')
                    <div class="alert alert-danger"> Unable to Delete try again <a class='close' data-dismiss='alert'>&times;</a></div>
                @endif


                <button class="btn btn-primary btn-block" type="button" data-toggle="modal" data-target="#myModal"> Create New Ticket</button>
            </div>
    <br><br>

    <hr>





        <div class="col-sm-12">
            <nav class="nav-sidebar">

                <ul class="nav tabs">

                    @foreach( $ticket_title as $ticket_titles)
                        <li >
                            <a  class="btn btn-default btn-block"  href="{{url('betabet/ticket_single')}}/{{$ticket_titles->id}}" data-id="{{$ticket_titles->id}}" >
                                {{$ticket_titles->title}}
                            </a>
                        </li>
                        <br>

                    @endforeach

                </ul>
            </nav>

        </div>










 <br><br>
   </div>
          </div>

       </section>



    <script>

        function add_category(){

            var ticket_category = $('#ticket_category').val();

            var explain = $('#explain').val();



            if (  ticket_category=='' ){
                $.alert({
                    title: 'Alert!',
                    content: 'Please Choose a ticket description',
                });
            } else if(explain == ''){

                $.alert({
                    title: 'Alert!',
                    content: 'Please Add an issue description',
                });

            }else{


                $.confirm({
                    title: 'Confirm!',
                    content: 'Are You Sure You Want To add ticket',
                    buttons: {
                        confirm: function () {
                            $.ajax({
                                type: 'POST',
                                url: "{{url('/betabet/create_ticket')}}",
                                data: {

                                    explain:explain,
                                    ticket_category:ticket_category,
                                    "_token": "{{ csrf_token() }}"
                                },
                                error: function() {
                                    window.location = "{{url('betabet/ticket/errora')}}";
                                },
                                dataType: 'text',
                                success: function() {
                                    window.location = "{{url('betabet/ticket/add')}}";

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

        {{--$('.fetch').click(function(e){--}}

            {{--var id = $(this).data('id');--}}


            {{--$.ajax({--}}
                {{--type: 'POST',--}}
                {{--url: "{{url('/betabet/fetch_ticket')}}",--}}
                {{--data: {--}}
                    {{--id:id,--}}
                    {{--"_token": "{{ csrf_token() }}"--}}
                {{--},--}}
                {{--error: function() {--}}
                    {{--// window.location = "{{url('/admin/ticket_category/errord')}}";--}}
                {{--},--}}
                {{--dataType: 'text',--}}
                {{--beforeSend:function(xhr){--}}
                    {{--$.dialog({--}}
                        {{--title: 'Alert!',--}}
                        {{--theme: 'dark',--}}
                        {{--content: 'Loading Pls Wait',--}}
                        {{--buttons:[],--}}


                    {{--})--}}
                {{--},--}}
                {{--complete:function(data){--}}




                {{--},--}}
                {{--success: function(data) {--}}


                     {{--data = JSON.parse(data)--}}
                    {{--$('#choose').hide();--}}
                    {{--$('.form-groups').show();--}}


                    {{--$('.jconfirm-closeIcon').click();--}}
                    {{--console.log( data.ticket_chat );--}}
                            {{--let wind;--}}
                    {{--for( datas in data ){--}}

                        {{--wind = wind + data[datas];--}}

                    {{--}--}}

                    {{--console.log(wind);--}}




                   {{--// window.location = "{{url('/admin/ticket_category/delete')}}";--}}

                {{--},--}}

            {{--});--}}

        {{--});--}}

    </script>

@endsection
