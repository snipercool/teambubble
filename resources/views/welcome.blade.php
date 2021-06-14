<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('images/bubble.svg')}}" type="image/x-icon">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <nav>
        <div class="navigation-menu">
            <ul class="menu-nav">
                <li class="home">
                    <a href="#home" class="nav-link">
                        <span class="link-text">Home</span>
                    </a>
                </li>
                <li class="services">
                    <a href="#services" class="nav-link">
                        <span class="link-text">Services</span>
                    </a>
                </li>
                <li class="subscriptions">
                    <a href="#subscriptions" class="nav-link">
                        <span class="link-text">Abonnement</span>
                    </a>
                </li>
                <li class="contact">
                    <a href="#contact" class="nav-link">
                        <span class="link-text">Contact</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="hamburger-menu">
            <svg class="ham hamRotate ham7" viewBox="0 0 100 100" width="80">
                <path class="line top"
                    d="m 70,33 h -40 c 0,0 -6,1.368796 -6,8.5 0,7.131204 6,8.5013 6,8.5013 l 20,-0.0013" />
                <path class="line middle" d="m 70,50 h -40" />
                <path class="line bottom"
                    d="m 69.575405,67.073826 h -40 c -5.592752,0 -6.873604,-9.348582 1.371031,-9.348582 8.244634,0 19.053564,21.797129 19.053564,12.274756 l 0,-40" />
            </svg>
        </div>
    </nav>
    <section id="home">
        <div class="content">
            <div>
                <img src="images/logo.svg" alt="logo">
                <p>TeamBubble wilt groepen helpen met wat zij het liefst van al doen, leuke plannen maken! Door dat ze
                    ons platform gebruiken zullen ze veel minder werk hebben met het organiseren, plannen en vragen voor
                    feedback. Daarnaast hebben ze meer tijd om te genieten van hun goed uitgewerkt plan. </p>
                <a href="#subscriptions">Begin te werken met ons platform >></a>
            </div>
            <img src="images/home.svg" alt="homepage-image">
        </div>
    </section>
    <section id="services">
        <h1>Hoe werkt het?</h1>
        <div class="content">
            <img src="images/files.jpg" alt="homepage-image">
            <div>
                <h1><img src="https://s.svgbox.net/hero-outline.svg?ic=badge-check" alt="check"> Communiceer</h1>
                <p>Communicatie is een belangrijke factor voor ons platform. Wij willen ervoor zorgen dat iedereen van
                    het team zijn / haar stem kan later horen. Doordat er een mogelijkheid is om vlot en efficiënt
                    feedback te geven op ideeën of topics verloopt het plannen ook veel vlotter.</p>
                <h1><img src="https://s.svgbox.net/hero-outline.svg?ic=badge-check" alt="check"> Deel</h1>
                <p>Bestanden delen blijft een groot probleem op vele platformen. Daarom pakken wij dit aan door een file
                    sharing te gebruiken en die vervolgens in ons platform te implementeren waardoor je geen nieuw
                    tabblad moet openen. Bij de bestanden kan je verschillende mapjes aanmaken die nodig zijn voor jou
                    organisatie / project / activiteit of iets anders. Zo willen wij vermijden dat er bestanden verloren
                    gaan in gesprekken en er een duidelijk overzicht is voor de teamleiders.</p>
                <h1><img src="https://s.svgbox.net/hero-outline.svg?ic=badge-check" alt="check"> Plan</h1>
                <p>Plannen, het is nogal een werkje. Er zijn duizenden tools om dit te doen maar welke kan je dan best
                    gebruiken? Nou, ons platform biedt een geïmplementeerde agenda aan binnen jou groep. Hierop kan jij
                    jou taken of taken van jou teamleden aanduiden op een overzichtelijke kalender. Er worden dagelijks
                    ook reminders gegeven zodat je zeker niets uit het oog verliest.</p>
            </div>

        </div>
    </section>
    <section id="subscriptions">
        <h1>Abonnementen</h1>
        <div class="row">
            <div class="card-1 card">
                <div class="wrapper">
                    <div class="data">
                        <div class="content">
                            <h1 class="title">Free <br/> Basic</h1>
                                <ul>
                                    <li>
                                        <p><img src="https://s.svgbox.net/hero-outline.svg?fill=007adf&ic=check" alt="check"> 10 text and voice channels</p>
                                    </li>
                                    <li>
                                        <p><img src="https://s.svgbox.net/hero-outline.svg?fill=007adf&ic=check" alt="check"> 10GB of file data</p>
                                    </li>
                                    <li>
                                        <p><img src="https://s.svgbox.net/hero-outline.svg?fill=007adf&ic=check" alt="check"> 10 people</p>
                                    <li>
                                        <p><img src="https://s.svgbox.net/hero-outline.svg?fill=E8441E&ic=x" alt="check"> Your own branding</p>
                                    </li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-2 card">
                <div class="wrapper">
                    <div class="data">
                        <div class="content">
                            <h1 class="title">&euro;4.99 <br> premium</h1>
                                <ul>
                                    <li>
                                        <p><img src="https://s.svgbox.net/hero-outline.svg?fill=007adf&ic=check" alt="check"> Unlimited text and voice channels</p>
                                    </li>
                                    <li>
                                        <p><img src="https://s.svgbox.net/hero-outline.svg?fill=007adf&ic=check" alt="check"> 50GB of file data</p>
                                    </li>
                                    <li>
                                        <p><img src="https://s.svgbox.net/hero-outline.svg?fill=007adf&ic=check" alt="check"> 30 people</p>
                                    </li>
                                    <li>
                                        <p><img src="https://s.svgbox.net/hero-outline.svg?fill=007adf&ic=check" alt="check"> Your own branding</p>
                                    </li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-3 card">
                <div class="wrapper">
                    <div class="data">
                        <div class="content">
                            <h1 class="title">&euro;9.99 <br> pro</h1>
                                <ul>
                                    <li>
                                        <p><img src="https://s.svgbox.net/hero-outline.svg?fill=007adf&ic=check" alt="check"> Unlimited text and voice channels</p>
                                    </li>
                                    <li>
                                        <p><img src="https://s.svgbox.net/hero-outline.svg?fill=007adf&ic=check" alt="check"> Unlimited file data</p>
                                    </li>
                                    <li>
                                        <p><img src="https://s.svgbox.net/hero-outline.svg?fill=007adf&ic=check" alt="check"> unlimited people</p>
                                    </li>
                                    <li>
                                        <p><img src="https://s.svgbox.net/hero-outline.svg?fill=007adf&ic=check" alt="check"> Your own branding</p>
                                    </li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contact">
        <h1>Contacteer ons</h1>
        <div class="contact-card">
            <form action="" method="post">
                <div class="form-group">
                    <label for="Email">Email <span>(Verplicht)</span></label>
                    <input type="email" name="email" id="email" placeholder="Uw Email adres" />
                </div>
                <div class="form-group">
                    <label for="Email">Onderwerp <span>(Verplicht)</span></label>
                    <input type="text" name="subject" id="subject" placeholder="Korte beschrijving van uw bericht" />
                </div>
                <div class="form-group">
                    <label for="Email">Bericht <span>(Verplicht)</span></label>
                    <textarea name="message" id="message" placeholder="Uw bericht..."></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" id="sumbit" value="Stuur uw bericht">
                </div>
            </form>
        </div>
    </section>
    <footer>
        <div class="wave wave1"></div>
        <div class="wave wave2"></div>
        <div class="wave wave3"></div>
        <div class="wave wave4"></div>
        <div class="container">
            <div class="row">
                <div class="about-us">
                    <h6>Over ons</h6>
                    <p class="text-justify"><i>Teambubble</i> is een online communicatietool voor kleine groepen zoals
                        jeugdbewegingen/de duivenbond/etc. Met ons platform kunnen jullie alle nodige tools gebruiken
                        zonder te veel tabbladen te openen. Zo is het handig en snel samenwerken!</p>
                </div>

                <div class="link-section">
                    <h6>Handige links</h6>
                    <ul class="footer-links">
                        <li><a href=".">Reviews</a></li>
                        <li><a href="">Nieuws</a></li>
                        <li><a href="">Blogs</a></li>
                        <li><a href="privacy-policy.html">Privacy Policy</a></li>
                        <li><a href="sitemap.xml">Sitemap</a></li>
                    </ul>
                </div>

                <div class="link-section">
                    <h6>Secties</h6>
                    <ul class="footer-links">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#subscriptions">Abonnementen</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="row footer-bottom">
                <div class="copy-text">
                    <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by
                        <a href="teambubble.nicolasvh.be">TeamBubble</a>.
                    </p>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="social-icons">
                        <li><a class="facebook" href="#"><svg aria-hidden="true" focusable="false" data-prefix="fab"
                                    data-icon="facebook-f" class="svg-inline--fa fa-facebook-f fa-w-10" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                    <path fill="currentColor"
                                        d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z">
                                    </path>
                                </svg></a></li>
                        <li><a class="twitter" href="#"><svg aria-hidden="true" focusable="false" data-prefix="fab"
                                    data-icon="twitter" class="svg-inline--fa fa-twitter fa-w-16" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor"
                                        d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                                    </path>
                                </svg></a></li>
                        <li><a class="instagram" href="#"><svg aria-hidden="true" focusable="false" data-prefix="fab"
                                    data-icon="instagram" class="svg-inline--fa fa-instagram fa-w-14" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path fill="currentColor"
                                        d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                                    </path>
                                </svg></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="js/index.js"></script>

</html>