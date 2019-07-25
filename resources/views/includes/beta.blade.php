

<!-- **********************************************************************************************
                            designed by satoseries an optisoft project

                        optisoft official website -> https://optisoft.ng/


                      satoseries github repo -> https://github.com/satowind

                            ****************************************

                     satoseries twitter page -> https://twitter.com/Satowind

                  satoseries facebook page -> https://www.facebook.com/satoseries
      
         satoseries linkedin page -> https://www.linkedin.com/in/ogugua-tochukwu-900495113/
    ************************************************************************************************ -->
<!DOCTYPE html>
<html lang="en-gb">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BetaBET</title>
    
    <link href="{{asset('images/favicon.ico')}}" rel="shortcut icon" type="image/vnd.microsoft.icon">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/akslider.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/donate.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/theme.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/satoUI.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('admins/assets/css/neon-forms.css')}}">
    <link rel="stylesheet" href="{{asset('admins/assets/css/font-icons/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admins/assets/css/custom.css')}}">
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/mootools/1.3.1/mootools-yui-compressed.js'></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
  <script src="{{asset('admins/assets/js/jquery-1.11.3.min.js')}}"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">

    
    
</head>

<body class="tm-isblog">

    <div class="preloader">
        <div class="loader"></div>
    </div>


    <div class="over-wrap">
        <div class="toolbar-wrap">
            <div class="uk-container uk-container-center">
                <div class="tm-toolbar uk-clearfix uk-hidden-small">


                    <div class="uk-float-right">
                        <div class="uk-panel">
                            <!-- <div class="social-top">
                                <a href="#"><span class="uk-icon-small uk-icon-hover uk-icon-facebook"></span></a>
                                <a href="#"><span class="uk-icon-small uk-icon-hover uk-icon-twitter"></span></a>
                                <a href="#"><span class="uk-icon-small uk-icon-hover uk-icon-google"></span></a>
                                <a href="#"><span class="uk-icon-small uk-icon-hover uk-icon-pinterest"></span></a>
                                <a href="#"><span class="uk-icon-small uk-icon-hover uk-icon-youtube"></span></a>
                                <a href="#"><span class="uk-icon-small uk-icon-hover uk-icon-instagram"></span></a>
                                <a href="#"><span class="uk-icon-small uk-icon-hover uk-icon-flickr"></span></a>
                            </div> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="tm-menu-box">

            <div style="height: 70px;" class="uk-sticky-placeholder">
                <nav style="margin: 0px;" class="tm-navbar uk-navbar" data-uk-sticky="">
                    <div  class="uk-container uk-container-center">
                        <a class="tm-logo uk-float-left" href="index">
                             <img src="{{asset('images/logo-loader.png')}}" alt="logo" title="logo"> <span>Beta<em> Bet</em></span>
                        </a>

                        <ul class="uk-navbar-nav uk-hidden-small">
                            
                            <li data-uk-dropdown="{'preventflip':'y'}" aria-haspopup="true" aria-expanded="false"><a href="{{url('/')}}">CityCyber</a></li>
                           
                            <li class="uk-parent" data-uk-dropdown="{'preventflip':'y'}" aria-haspopup="true" aria-expanded="false"><a href="#">Our Services</a>
                                <div class="uk-dropdown uk-dropdown-navbar uk-dropdown-width-1">
                                    <div class="uk-grid uk-dropdown-grid">
                                        <div class="uk-width-1-1">
                                            <ul class="uk-nav uk-nav-navbar">
                                                <li><a href="#">Creating Online Bet9ja Account</a>
                                                </li>
                                                <li><a href="{{url('/services')}}">Funding/Withdrawal</a>
                                                </li>
                                                <li><a href="#">Display Pool Fixures</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        
                            
                            <li><a href="{{url('/branches')}}">Our Branches</a></li>
                            <li><a href="{{url('/contact')}}">Contact</a></li>
                            <li class="uk-parent" data-uk-dropdown="{'preventflip':'y'}" aria-haspopup="true" aria-expanded="false"><a href="#">Disclaimer</a>
                                <div class="uk-dropdown uk-dropdown-navbar uk-dropdown-width-1">
                                    <div class="uk-grid uk-dropdown-grid">
                                        <div class="uk-width-1-1">
                                            <ul class="uk-nav uk-nav-navbar">
                                                
                                                <li><a href="#">Terms and Conditions</a>
                                                </li>
                                                <li><a href="#">Privacy Policies</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            
                        
                
                         <!--    <li><a href="Profile">Profile</a></li>
                             <li><a class="sa_side border_to_forestgreen to_forestgreen" href="logout">LogOut</a></li> -->

                      
                            
                            <li><a class="sa_side border_to_forestgreen to_forestgreen" onclick="logout()" >Logout</a></li>
                       
                       
                   
                 </ul>
                 <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas=""></a>
                    </div>
                </nav>
            </div>

        </div>

        
<div class="tm-top-a-box tm-full-width tm-box-bg-1 ">
            <div class="uk-container uk-container-center">
                <section id="tm-top-a" class="tm-top-a uk-grid uk-grid-collapse" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">
                    <div class="uk-width-1-1 uk-row-first">
                        <div class="uk-panel">
                            <div class="uk-cover-background uk-position-relative head-wrap" style="height: 290px; background-image: url('{{asset("images/head-bg.jpg")}}');">
                                <img class="uk-invisible" src="{{asset('images/head-bg.jpg')}}" alt="" height="290" width="1920">
                                <div class="uk-position-cover uk-flex uk-flex-center head-title">
                                    <h1>
                                        Profile
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
                <li><a href="Profile">Home</a>
                </li>
                <li class="uk-active"><span>Profile</span>
                </li>
            </ul>
        </div>

       <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
            
  <table class="table table-condensed table-bordered">
    
    <tbody class="table-hover">
        <tr>
        <td><a href="{{url('betabet/index')}}">Profile<span class="glyphicon glyphicon-home pull-right"></span></a> </td>
        
      </tr>
        <tr>
            <td><a href="{{url('betabet/inbox')}}">Inbox <span class="badge"> {{Session::get('inbox')}}</span><span class=" glyphicon glyphicon-envelope pull-right"></span></a></td>

        </tr>
      <tr>
        <td><a href="{{url('betabet/fund')}}">Fund Account<span class=" glyphicon glyphicon-piggy-bank pull-right"></span></a></td>
      
      </tr>
      <tr>
        <td><a href="{{url('betabet/withdraw')}}">Withdraw From Your Account<span class="glyphicon glyphicon-euro pull-right"></span></a></td>
        
      </tr>

        <tr>
        <td><a href="{{url('betabet/ticket')}}">Raise/view Tickets<span class="fa  fa-question-circle pull-right"></span></a></td>

        </tr>
     
      <tr>
        <td><a href="{{url('betabet/faq')}}">FAQ<span class=" glyphicon glyphicon-info-sign pull-right"></span></a></td>
      
      </tr>

        <tr>
            <td><a href="{{url('betabet/change_password')}}">Change Password<span class=" glyphicon glyphicon-info-sign pull-right"></span></a></td>

        </tr>

      <tr>
        <td><a  onclick="logout()">Logout<span class="glyphicon glyphicon-log-out pull-right"></span></a></td>
        
      </tr>
    </tbody>
  </table>
  
   

                </div>
                <div class="col-sm-9">
                    
                    <h3>
                        <em>Good Day</em>
                        &nbsp
                        <span class="text-primary">
                            <b>{{$name->surname}}
                            {{$name->firstname}}
                            </b>
                        </span>
                        <button class="sato pull-right sa_circle border_to_forestgreen to_forestgreen" data-toggle="modal" data-target='#edit'>
                            Edit profile
                            <i class="fa fa-edit"></i>
                        </button>

                    </h3>

                    <div class="clearfix">


                
              </div>
                    
<br><br>





		  @yield('content')



 <div class="bottom-wrapper">
            <div class="tm-bottom-f-box  ">
                <div class="uk-container uk-container-center">
                    <section id="tm-bottom-f" class="tm-bottom-f uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">

                        <div class="uk-width-1-1">
                            <div class="uk-panel">
                                <div class="footer-logo">
                                    <a href="index"><img src="images/footer-logo-img.png" alt=""><span>City</span> Cyber <span>Solutions</span></a>
                                </div>
                                <div class="footer-socials">
                                    <!-- <div class="social-top">
                                         <a href=""><span class="uk-icon-small uk-icon-hover uk-icon-facebook"></span></a>
                                <a href=""><span class="uk-icon-small uk-icon-hover uk-icon-twitter"></span></a>
                                <a href=""><span class="uk-icon-small uk-icon-hover uk-icon-google"></span></a>
                                <a href=""><span class="uk-icon-small uk-icon-hover uk-icon-pinterest"></span></a>
                                <a href=""><span class="uk-icon-small uk-icon-hover uk-icon-youtube"></span></a>
                                <a href=""><span class="uk-icon-small uk-icon-hover uk-icon-instagram"></span></a>
                                <a href=""><span class="uk-icon-small uk-icon-hover uk-icon-flickr"></span></a>
                                    </div> -->
                                </div>
                                <div class="clear"></div>

                                <p class="footer-about-text">
                               
                                </p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <div class="tm-bottom-g-box  ">
                <div class="uk-container uk-container-center">
                    <section id="tm-bottom-g" class="tm-bottom-f uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">


                        <div class="uk-width-1-1 uk-width-large-1-2 row" style="width: 100%">
                            <div  class="uk-panel col-sm-6 col-sm-offset-3">
                                <div class="" id="">
                                    <div class="" id="">
                                        <form id="" method="post" name="sub" action="">
                                            <div class="acymailing_module_form">
                                                <div class="mail-title">Newsletters</div>
                                                <div class="acymailing_introtext">Subscribe to Our Weekly Mail</div>
                                                <div class="clear"></div>
                                                <div class="space"></div>
                                               <h3> <small class="text-danger">* </small></h3>
                                                <table class="acymailing_form">
                                                    <tbody>
                                                        <tr>
                                                            <td class="">
                                                                <span class="mail-wrap">
                                                                    <input id=""  class="" name="email" style="width:80%" placeholder="Enter your email"  type="text">
                                                            </span>
                                                            </td>
                                                        </tr>
                                                        <tr>

                                                            <td class="">
                                                                <span class="submit-wrap">
                                                                    <span class="submit-wrapper">
                                                                        <input class="btn btn-primary" value="Subscribe" name="Submit"  type="submit">
                                                                    </span>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <footer id="tm-footer" class="tm-footer">


                <div class="uk-panel">
                    <div class="uk-container uk-container-center">
                        <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <div class="footer-wrap">
                                    <div class="foot-menu-wrap">
                                        <ul class="nav menu">
                                            <li class="item-165"><a href="betabet">Betabet</a>
                                            </li>
                                            <li class="item-167"><a href="contact">Contact Us</a>
                                            </li>
                                            <li class="item-168"><a href="branches">Our Branches</a>
                                            </li>
                                            <li class="item-169"><a href="news">News</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="copyrights">Copyright © 2015 <a href="#">City Cyber Solutions</a>. All Rights Reserved City Cyber Solutions. </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

        </div>

        <div id="offcanvas" class="uk-offcanvas">
            <div class="uk-offcanvas-bar">
                <ul class="uk-nav uk-nav-offcanvas">
                    <li class="uk-parent uk-active"><a href="betabet">Betabet</a>
                        
                    </li>
                    <li><a href="services">Our Services</a></li>
                    <li class="uk-parent"><a href="Branches">Our Branches</a>
                       
                    </li>
                    <li class="uk-parent"><a href="contact">Contact Us</a>
                        
                    </li>
                
                </ul>
            </div>
        </div>
    </div>

<script  type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script  type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
<script  type="text/javascript" src="{{asset('js/uikit.js')}}"></script>
<script   type="text/javascript" src="{{asset('js/SimpleCounter.js')}}"></script>
<script  type="text/javascript" src="{{asset('js/components/grid.js')}}"></script>
<script  type="text/javascript" src="{{asset('js/components/slider.js')}}"></script>
<script  type="text/javascript" src="{{asset('js/components/slideshow.js')}}"></script>
<script  type="text/javascript" src="{{asset('js/components/slideset.js')}}"></script>
<script  type="text/javascript" src="{{asset('js/components/sticky.js')}}"></script>
<script  type="text/javascript" src="{{asset('js/components/lightbox.js')}}"></script>
<script  type="text/javascript" src="{{asset('js/components/accordion.js')}}"></script>
<script  type="text/javascript" src="{{asset('js/isotope.pkgd.min.js')}}"></script>
<script  src="http://maps.google.com/maps/api/js?key=AIzaSyDLfjH-rl16zH64tdzOz2Hcjx1KeGqYVJc"></script>
<script  type="text/javascript" src="{{asset('js/theme.js')}}"></script>
<script  type="text/javascript">
    new SimpleCounter("countdown4", 1447448400, {
      'continue': 0,
      format: '{D} {H} {M} {S}',
      lang: {
          d: {
              single: 'day',
              plural: 'days'
          }, //days
          h: {
              single: 'hr',
              plural: 'hrs'
          }, //hours
          m: {
              single: 'min',
              plural: 'min'
          }, //minutes
          s: {
              single: 'sec',
              plural: 'sec'
          } //seconds
      },
      formats: {
          full: "<span class='countdown_number' style='color:  '>{number} </span> <span class='countdown_word' style='color:  '>{word}</span> <span class='countdown_separator'>:</span>", //Format for full units representation
          shrt: "<span class='countdown_number' style='color:  '>{number} </span>" //Format for short unit representation
      }
  });
</script>

<script  type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
  <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('admins/assets/js/select2/select2-bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('admins/assets/js/select2/select2.css')}}">
     <link rel="stylesheet" href="{{asset('admins/assets/js/datatables/datatables.css')}}">

      <!-- Imported scripts on this page -->
    <script src="{{asset('admins/assets/js/datatables/datatables.js')}}"></script>
    <script src="{{asset('admins/assets/js/select2/select2.min.js')}}"></script>
    <script src="{{asset('admins/assets/js/neon-chat.js')}}"></script>
      <script src="{{asset('admins/assets/js/lga.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
                <script>
                    function logout(){


                                $.confirm({
                                    animation: 'zoom',
                                    closeAnimation: 'scale',
                                    theme: 'supervan',
                                    title: 'Confirm!',
                                    icon: 'fa fa-question',
                                    content: 'Are You Sure You Want To Logout',
                                    buttons: {
                                        confirm: function () {

                                            $.ajax({
                                                type: 'GET',
                                                url: "{{url('/betabet/logout')}}",
                                                data: {
                                                    "_token": "{{ csrf_token() }}"
                                                },
                                                error: function() {

                                                },
                                                dataType: 'text',
                                                success: function() {
                                                    window.location = "{{url('/betabet/logout')}}";

                                                },

                                            });


                                        },
                                        cancel: function () {

                                        }

                                    }
                                });


                    }
                </script>

</body>

</html>
<!-- **********************************************************************************************
                            designed by satoseries an optisoft project

                        optisoft official website -> https://optisoft.ng/


                      satoseries github repo -> https://github.com/satowind

                            ****************************************

                     satoseries twitter page -> https://twitter.com/Satowind

                  satoseries facebook page -> https://www.facebook.com/satoseries
      
         satoseries linkedin page -> https://www.linkedin.com/in/ogugua-tochukwu-900495113/
    ************************************************************************************************ -->
 

      