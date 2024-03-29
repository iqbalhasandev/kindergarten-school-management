<footer id="footer" class="st-2">
    <section class="tf-subcribe-2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="fl-subcribe wow fadeIn animated" data-wow-delay="0.3ms" data-wow-duration="1200ms">
                        <div class="subcribe-wp">
                            <h2 class="title clr-pri-5">Subscribe Our Newsletter</h2>
                            <p class="sub f-mulish clr-pri-2">Amet consectetur adipiscing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua suspendisse
                                ultrices gravida. Risus commodo</p>
                        </div>
                        <div class="subcribe-form fx">
                            <form action="#" id="subscribe-form">
                                <input type="email" id="subscribe-email" placeholder="Email Address">
                                <button class="fl-btn st-7" id="subscribe-button"><span
                                        class="inner">Subscribe</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="footer-inner st-2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="widget-footer">
                        <div class="widget widget-logo">
                            <div class="logo-bottom" id="logo-footer">
                                <a href="{{ route('home') }}">
                                    <img src="{{ storage_asset(setting('school-info.logo'))}}"> </a>
                            </div>
                            <p class="wrap f-mulish">{{ setting('school-info.description') }}</p>
                            <div class="list-contact">
                                <ul>
                                    <li class="fx"><span><i class="far fa-map-marker-alt"></i>
                                            {{ setting('school-info.address') }}
                                        </span></li>
                                    <li class="fx"><a href="mailto:{{
                                            setting('school-info.mail')}}"><i class="far fa-envelope"></i> {{
                                            setting('school-info.mail')}}</a></li>
                                    <li class="fx"><a href="tel:{{setting('school-info.hotline')}}"><i
                                                class="fal fa-phone"></i>
                                            {{setting('school-info.hotline')}}</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget widget-business">
                            <div class="inner">
                                {!! setting('school-info.opening_day_and_hour') !!}
                            </div>
                        </div>
                        <div class="widget widget-link">
                            <h4 class="title-widget">Our Program</h4>
                            <ul class="list-link">
                                <li class="fx"><a href="program.html" class="wd-ctm f-mulish">Arts &
                                        Drawing</a></li>
                                <li class="fx"><a href="program.html" class="wd-ctm f-mulish">Computer
                                        Engineering </a></li>
                                <li class="fx"><a href="program.html" class="wd-ctm f-mulish">Digital
                                        Mathematics</a></li>
                                <li class="fx"><a href="program.html" class="wd-ctm f-mulish">Physical
                                        Exercise</a></li>
                                <li class="fx"><a href="program.html" class="wd-ctm f-mulish">General
                                        Science</a></li>
                                <li class="fx"><a href="program.html" class="wd-ctm f-mulish">English
                                        Basic</a></li>
                                <li class="fx"><a href="program.html" class="wd-ctm f-mulish">Social
                                        Science</a></li>
                            </ul>
                        </div>
                        <div class="widget widget-news st-3">
                            <h4 class="title-widget">recent news</h4>
                            <ul class="list-news">
                                <li class="fx">
                                    <img src="{{ front_asset('images/thumbnails/widget9.jpg')}}" alt="Image"
                                        class="feature">
                                    <ul class="box-content">
                                        <li>
                                            <h6 class="title"><a href="blog-grid.html">Useful Code Extened
                                                    End Developers</a></h6>
                                        </li>
                                        <li><a href="blog-grid.html" class="fx meta-news clr-pri-6"><i
                                                    class="far fa-calendar-alt"></i>25 dec 2021</a></li>
                                    </ul>
                                </li>
                                <li class="fx">
                                    <img src="{{ front_asset('images/thumbnails/widget10.jpg')}}" alt="Image"
                                        class="feature">
                                    <ul class="box-content">
                                        <li>
                                            <h6 class="title"><a href="blog-grid.html">Useful Code Extened
                                                    End Developers</a></h6>
                                        </li>
                                        <li><a href="blog-grid.html" class="fx meta-news clr-pri-6"><i
                                                    class="far fa-calendar-alt"></i>25 dec 2021</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="footer-bottom jus-ct">
                        <p class="copy-right">Copyright © 2022, Kinco - Kindergarten HTML Template. Designed
                            by <a href="https://themeforest.net/user/themesflat/portfolio">Themesflat</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
