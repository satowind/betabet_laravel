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
                                    <h1>How to</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
 <div class="tm-top-d-box  ">
            <div class="uk-container uk-container-center">
                <section id="tm-top-d" class="tm-top-d uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">

                    <div class="uk-width-1-1">
                        <div class="uk-panel">
                            <div class="donate-wrap">
                                <div class="donate-inner">
                                    <h3><span>Fund </span>With Us</h3>
                                    <div class="uk-grid">
                                        <div class="uk-width-8-10 uk-push-1-10 intro-text">
                                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                                    </div>
                                    <form class="teamdonate-form" method="post" target="paypal">
                                        <div class="radio-wrap">
                                            <label class="active">₦ 100
                                                <input name="amount" value="100" type="radio">
                                            </label>
                                            <label>₦ 250
                                                <input name="amount" value="250" type="radio">
                                            </label>
                                            <label>₦ 500
                                                <input name="amount" value="500" type="radio">
                                            </label>
                                            <label>₦ 750
                                                <input name="amount" value="750" type="radio">
                                            </label>
                                            <label>₦ 1000
                                                <input name="amount" value="1000" type="radio">
                                            </label>
                                           
                                        </div>
                                        
                                        <br>
                                        <br>
                                        <a href="betabet" class="donate-btn" type="submit" name="submit"><span>Fund Now</a>
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

@endsection