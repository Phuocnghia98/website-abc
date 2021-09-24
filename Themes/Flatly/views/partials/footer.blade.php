<footer class="footer">
    <div id="particles-footer" class="particles"></div>
    <div class="container-footer">
        <div class="footer__logo">
            <img src="{!!url('assets/images/logo.png ')!!}" alt=""/>
        </div>
        <div class="footer__info container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="title-footer">
                        <h5>{{ trans('core::core.pages-title.contact-information') }}</h5>
                    </div>
                    <div class="info-detail">
                        <ul>
                            <li class="d-flex">{{ trans('core::core.footer.address') }}:
                            <span class="ml-3">{{ $footer->address }}</span>
                            </li>
                            <li>{{ trans('core::core.footer.phone') }}: <span class="ml-3">{{ $footer->phone }}</span></li>
                            <li>Email:   <span class="ml-3">{{ $footer->phone }}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="map-footer">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.895552434546!2d108.21799931432676!3d16.070908943662833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314218314b9a71b7%3A0x3aa3d7cc91ab2372!2zNDEgxJAuIEzDqiBEdeG6qW4sIEjhuqNpIENow6J1IDEsIEjhuqNpIENow6J1LCDEkMOgIE7hurVuZyA1NTAwMDAsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1632298375965!5m2!1svi!2s" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__copyright">
            <span>©{{ $footer->phone }}</span>
        </div>
    </div>
</footer>
