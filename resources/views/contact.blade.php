@extends('layouts.app')
@section('content')
<section id="contact-us" class="top-bottom-empty">
    <div class="main-title-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="main-title">
                        <h1>CONTACT US</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-wrap">
                        <div class="title green-decor-title">
                            <div class="decor-squ"></div>
                            <div>Contact info</div>
                        </div>
                        <div class="content">
                            <p>02-2697-1246</p>
                            <p>02-2697-1248</p>
                            <p>sales-service@je-gauge.com.tw</p>
                            <p>Room.17-12,17F ,No.99, Sec. 1, Xintai 5th Rd., Xizhi Dist., New Taipei City 221, Taiwan (R.O.C.)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-wrap">
                        <div class="title green-decor-title">
                            <div class="decor-squ"></div>
                            <div>message board</div>
                        </div>
                        <div class="form-wrap">
                            <form action="" id="contact-us-form">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="input-wrap">
                                            <label for="">NAME</label>
                                            <input name="client-name" type="text" placeholder="Enter Your Name">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="input-wrap">
                                            <label for="">PHONE</label>
                                            <input name="phone" type="text" placeholder="Enter Your Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-wrap">
                                            <label for="">E-MAIL</label>
                                            <input name="email" type="text" placeholder="Enter Your Email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-wrap">
                                            <label for="">TITLE</label>
                                            <input name="title" type="text" placeholder="Enter Your Title">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-wrap textarea">
                                            <label for="">MESSAGE</label>
                                            <textarea name="content" placeholder="Enter Your Message" name="" id="" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="btn-area">
                                            <input type="button" value="CLEAR" onclick="document.getElementById('contact-us-form').reset();">
                                            <input type="submit" value="SEND">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
