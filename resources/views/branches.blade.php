@extends('includes.city')
@section('content')

        <div class="tm-top-a-box tm-full-width tm-box-bg-1 ">
           <div class="uk-container uk-container-center">
              <section id="tm-top-a" class="tm-top-a uk-grid uk-grid-collapse" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">
                 <div class="uk-width-1-1 uk-row-first">
                    <div class="uk-panel">
                       <div class="uk-cover-background uk-position-relative head-wrap" style="height: 290px; background-image: url('images/head-bg.jpg');">
                          <img class="uk-invisible" src="images/head-bg.jpg" alt="" height="290" width="1920">
                          <div class="uk-position-cover uk-flex uk-flex-center head-title">
                             <h1>
                               Our Branches
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
                <li class="uk-active"><span>Branches</span></li>
            </ul>
        </div>

        <div class="uk-container uk-container-center">
           <div class="container">
            <div class="contact-title">
                
            
  <h2>Our Branches Are</h2></div>
  <br><br>
          
  <br><br>
  <div style="border: 2px solid rgba(0,0,0,0.1); padding: 30px; border-radius: 5px">
    
 
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
    
    <table class="table table-striped table-bordered datatable" id="table-1">
    <thead>
      <tr>
        <th style="border-bottom: none">Addresse</th>
        <th style="border-bottom: none">Phone Number</th>
        <th style="border-bottom: none">Email</th>

      </tr>
    </thead>
    <tbody>

    @foreach($branches as $branch)

        <tr>
            <td>{{$branch->address}}</td>
            <td>{{$branch->phone}}</td>
            <td>{{$branch->email}}</td>

        </tr>

    @endforeach
 
    </tbody>
  </table>
</div>
  <br><br>
</div>

        </div>


@endsection