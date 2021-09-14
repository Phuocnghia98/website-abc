@extends('layouts.master')

@section('title')
    {{ $page->title }} | @parent
@stop
@section('meta')
    <meta name="title" content="{{ $page->meta_title}}" />
    <meta name="description" content="{{ $page->meta_description }}" />
@stop

@section('content')
<section id="banner">
                    <div id="particles-banner" class="particles"></div>
                  <div class="container">
                      <div class="slider-banner">
                        <div class="">
                            <div class="row">
                                <div class="col-6">
                                    <div class="image-banner"><img src="assets/images/banner2.webp" alt=""/></div>
                                </div>
                                <div class="col-6">
                                    <div class="info-banner">
                                        <div class="heading--banner">
                                          <h1>Bitcoin and <br> Cryptocurrency <br> Technologies</h1>
                                        </div>
                                        <div class="description--banner d-none d-lg-block">
                                            <span>I'm about to reveal to you how you can build both <br>passive and active
                                                income with Bitcoin and <br>orther cryptocurrencies.
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="row">
                                <div class="col-6">
                                    <div class="image-banner"><img src="assets/images/banner2.webp" alt=""/></div>
                                </div>
                                <div class="col-6">
                                    <div class="info-banner">
                                        <div class="heading--banner">
                                          <h1>Bitcoin and <br> Cryptocurrency <br> Technologies</h1>
                                        </div>
                                        <div class="description--banner d-none d-lg-block">
                                            <span>I'm about to reveal to you how you can build both <br>passive and active
                                                income with Bitcoin and <br>orther cryptocurrencies.
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
              </section>
              <section id="contact">
                  <div class="container">
                      <div class="contact">
                          <div class="d-flex align-items-center justify-content-between p-4">
                              <div class="headding--primary">
                                  <h2>LIÊN HỆ?</h2>
                              </div>
                              <form action="" class="d-flex form-contact">
                                <input type="text" placeholder="Name" />
                                <input type="text" placeholder="Telephone number" />
                                <input type="submit" placeholder="Callback" value="Callback" />
                              </form>
                          </div>
                          <div class="row contact-info" >
                              <div class="col-12 col-md-4 item__info mb-3">
                                  <div class="item__info--image">
                                      <img src="assets/images/contact1.webp" alt=""/>
                                      <div class="over-black"></div>
                                  </div>
                                  <div class="d-flex align-items-center item__info--title">
                                    <i class="fa fa-youtube-play mr-4" aria-hidden="true"></i>
                                      <a href="#">Đào Tạo</a>
                                  </div>
                              </div>
                              <div class="col-12 col-md-4 item__info mb-3">
                                <div  class="item__info--image">
                                    <img src="assets/images/contact2.webp" alt=""/>
                                    <div class="over-black"></div>
                                </div>
                                <div class="d-flex align-items-center item__info--title">
                                    <i class="fa fa-headphones mr-4" aria-hidden="true"></i>
                                    <a href="#">Nghiên cứu</a>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 item__info mb-3">
                                <div  class="item__info--image">
                                    <img src="assets/images/contatc3.webp" alt=""/>
                                    <div class="over-black"></div>
                                </div>
                                <div class="d-flex align-items-center item__info--title">
                                    <i class="fa fa-book mr-4" aria-hidden="true"></i>
                                    <a href="#">Hợp tác</a>
                                </div>
                            </div>
                          </div>
                      </div>
                  </div>
              </section>
              <section id="about-us">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-5 col-lg-6">
                            <div class="image-phone">
                                <img src="assets/images/phone.webp"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-7 col-lg-6">
                            <div class="info-about">
                                <div class="headding--primary">
                                    <h2>GIỚI THIỆU?</h2>
                                </div>
                                <ul class="lists-info">
                                    <li>
                                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                                       <span> How to recognize and store stocks with great potential and how to make money in trading.</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                                        <span>The basics of crisis management to deal with risks during a stocks market crash.</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                                       <span> How to make a profit on currency fluctuations and how to approach a request for quotation.</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                                        <span>Which fundamental factors distinguish long and short-term stocks and how to invest in them.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
              </section>
              <section id="background-info">
                    <div id="particles-info" class="particles"></div>
                    <div class="container">
                        <img src="assets/images/image_bg.jpg"/>
                    </div>
              </section>
              <section id="news">
                <div class="container">
                    <div class="headding--primary text-center">
                        <h2>TIN TỨC?</h2>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="blog">
                                <div class="banner-blog">
                                    <img src="assets/images/course3.jpg" alt=""/>
                                </div>
                                <div class="content-blog">
                                    <h5>Blockchain là gì? Hoạt động của Blogchain như thế nào? Ứng dụng ra sao?</h5>
                                    <div class="info-blog">
                                        <span><i class="fa fa-clock-o" aria-hidden="true"></i>April 26,2018</span>
                                        <span><i class="fa fa-user" aria-hidden="true"></i>Ashley Bronks</span>
                                        <span><i class="fa fa-commenting-o" aria-hidden="true"></i>0</span>
                                    </div>
                                    <p>Công nghệ Blogchain xuất hiện mở ra một xu hướng mới cho các lĩnh vực như: tài chính,
                                        ngân hàng,điện tử viễn thông kế toán
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="blog">
                                <div class="banner-blog">
                                    <img src="assets/images/course3.jpg" alt=""/>
                                </div>
                                <div class="content-blog">
                                    <h5>Blockchain là gì? Hoạt động của Blogchain như thế nào? Ứng dụng ra sao?</h5>
                                    <div class="info-blog">
                                        <span><i class="fa fa-clock-o" aria-hidden="true"></i>April 26,2018</span>
                                        <span><i class="fa fa-user" aria-hidden="true"></i>Ashley Bronks</span>
                                        <span><i class="fa fa-commenting-o" aria-hidden="true"></i>0</span>
                                    </div>
                                    <p>Công nghệ Blogchain xuất hiện mở ra một xu hướng mới cho các lĩnh vực như: tài chính,
                                        ngân hàng,điện tử viễn thông kế toán
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="blog">
                                <div class="banner-blog">
                                    <img src="assets/images/course3.jpg" alt=""/>
                                </div>
                                <div class="content-blog">
                                    <h5>Blockchain là gì? Hoạt động của Blogchain như thế nào? Ứng dụng ra sao?</h5>
                                    <div class="info-blog">
                                        <span><i class="fa fa-clock-o" aria-hidden="true"></i>April 26,2018</span>
                                        <span><i class="fa fa-user" aria-hidden="true"></i>Ashley Bronks</span>
                                        <span><i class="fa fa-commenting-o" aria-hidden="true"></i>0</span>
                                    </div>
                                    <p>Công nghệ Blogchain xuất hiện mở ra một xu hướng mới cho các lĩnh vực như: tài chính,
                                        ngân hàng,điện tử viễn thông kế toán
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </section>
              <section id="course">
                <div class="container">
                    <div class="headding--primary text-center">
                        <h2>CÁC KHÓA HỌC BLOCKCHAIN</h2>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="course">
                                <div class="banner-course">
                                    <img src="assets/images/course1.jpg"/>
                                    <span>FUNDAMENTER LEVER</span>
                                    <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                    <div class="over-black"></div>
                                </div>
                                <div class="content-course">
                                    <h5>Khóa học Blockchain cơ bản</h5>
                                    <hr>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="time-course"><i class="fa fa-clock-o" aria-hidden="true"></i> 8 Hour</span>
                                        <span class="price-course">$149.0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="course">
                                <div class="banner-course">
                                    <img src="assets/images/course2.jpg"/>
                                    <span>FUNDAMENTER LEVER</span>
                                    <div class="over-black"></div>
                                    <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                </div>
                                <div class="content-course">
                                    <h5>Khóa học Blockchain cơ bản</h5>
                                    <hr>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="time-course"><i class="fa fa-clock-o" aria-hidden="true"></i> 8 Hour</span>
                                        <span class="price-course">$149.0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="course">
                                <div class="banner-course">
                                    <img src="assets/images/course3.jpg"/>
                                    <span>FUNDAMENTER LEVER</span>
                                    <div class="over-black"></div>
                                    <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                </div>
                                <div class="content-course">
                                    <h5>Khóa học Blockchain cơ bản</h5>
                                    <hr>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="time-course"><i class="fa fa-clock-o" aria-hidden="true"></i> 8 Hour</span>
                                        <span class="price-course">$149.0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <button class="btn-read-more">View More</button>
                    </div>
                </div>
              </section>
@stop
