@extends('includes.admin')
@section('content')

        
                    <ol class="breadcrumb bc-3" >
                                <li>
                        <a href="index"><i class="fa-home"></i>Home</a>
                    </li>
                            <li class="active">
        
                                    <strong>Fund List</strong>
                            </li>
                        
                            </ol>
                    
        <h2>Fundings</h2>
        
        <br />
        
        <script type="text/javascript">
        jQuery( document ).ready( function( $ ) {
            var $table1 = jQuery( '#table-1' );
            
            // Initialize DataTable
            $table1.DataTable( {
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": true
            });
            
            // Initalize Select Dropdown after DataTables is created
            $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                minimumResultsForSearch: -1
            });
        } );
        </script>
        
        <table class="table table-striped table-bordered" id="table-1">
            <thead>
                                
                    <tr>
                       
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Bank</th>
                        <th>Date</th>
                        <th>Update</th>
                        <th>Status</th>
                        <th>Action Taken</th>
                    </tr>
    
            </thead>
            <tbody>

            @foreach($transaction as $transactions)
                <tr>
                    <td>{{$transactions->surname}}  {{$transactions->firstname}}</td>
                    <td>{{$transactions->amount}}</td>

                    <td>{{$transactions->bank_name}}</td>
                    <td>{{$transactions->date}}</td>



                    <td>

                        @if( $transactions->status==1 )
                            <a href="{{url('/admin/editbranchoffice')}}{{'/'.$transactions->id}}" class="btn btn-primary btn-sm done"> Fund Account    <span class="fa fa-money"></span></a>
                        @elseif($transactions->status==3)
                         <h5 style="color:red">Rejected</h5>
   
                        @else
                            <h5 style="color:blue">DONE</h5>

                        @endif

                    </td>
                    <td>
                        
                        @if( $transactions->status==1 )
                            <h5 style="color:black">Pending</h5>
                        @else
                            <h5 style="color:red">Commpleted</h5>

                        @endif
                    </td>
                    <td>

                        @if( $transactions->status==1 )
                            <h5 style="color:black">Pending</h5>
                        @elseif($transactions->status==2)
                            <h5 style="color:blue">Funded</h5>
                        @else
                            <h5 style="color:red">Rejected</h5>

                        @endif

                    </td>
                </tr>
            @endforeach
            
   
            </tbody>
            
        </table>

        
        <br />

          <script >
            //get the elements
            $('.done').click(function(e){
                var me = $(this);
                //get user id
                var id =me.data('id');
                var id =me.data('id');
                var user =me.data('user');
                var amount =me.data('amount');
                var parent = $(this).parent();
                //check if the id is defined
                if(id){


                    //send ajax request to the server using the id
                    
                    $.get("setDone.php?id="+id+'&action=funding&user='+user+'&amount='+amount,function(res){
                        console.log(res);

                        if(res.success){
                            parent.html("Completed");
                            parent.next().html("DONE");
                        }
                    });

                    /*
                    $id = $_GET['id'];
                    //success reply
                    echo json_encode(['success'=>true]);
                    //failure reply
                     echo json_encode(['success'=>false]);
                     */
                }


            });
        </script>
        
        
@endsection