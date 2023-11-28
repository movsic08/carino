@php
$setting = App\Models\SiteSetting::find(1);
$blog = App\Models\BlogPost::latest()->limit(2)->get();
@endphp
<footer class="main-footer">
    <div class="footer-top bg-color-2" style="padding-top: 20px; padding-bottom: 20px;">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget about-widget">
                        <div class="widget-title">
                            <h3>About</h3>
                        </div>
                        <div class="text">
                            <p>We are a service-oriented organization providing sexual and reproductive services to all the Filipinos, especially the poor, marginalized, socially excluded and underserved.​</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget links-widget ml-70">
                        <div class="widget-title">
                            <h3>A member of association of:</h3>
                        </div>
                        <div class="widget-content">
                            <img src="{{ asset('assets/img/IPPF-logo-Edited.png') }}" alt="IPPF Logo" style="max-width: 100%; height: auto;">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget contact-widget">
                        <div class="widget-title">
                            <h3>Contacts</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="info-list clearfix">
                                <li><i class="fas fa-map-marker-alt"></i>{{ $setting->company_address }}</li>
                                <li><i class="fas fa-microphone"></i><a href="tel:23055873407">+{{ $setting->support_phone }}</a></li>
                                <li><i class="fas fa-envelope"></i><a href="mailto:info@example.com">{{ $setting->email }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

