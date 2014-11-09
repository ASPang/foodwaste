
<!doctype html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" data-useragent="Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <title>Magic Bin | Contact</title>
    
    <meta name="description" content="Documentation and reference library for ZURB Foundation. JavaScript, CSS, components, grid and more."/>
    <meta name="author" content="ZURB, inc. ZURB network also includes zurb.com"/>
    <meta name="copyright" content="ZURB, inc. Copyright (c) 2014"/>
    
    <link rel="stylesheet" href="css/foundation.css"/>
    <script src="js/vendor/modernizr.js"></script>
</head>


<body>

<div class="row">
    <div class="large-12 columns">

        <nav class="top-bar" data-topbar>
            <ul class="title-area">

                <li class="name">
                    <h1><a href="index.html">Magic Bin</a></h1>
                </li>
                
                <li class="toggle-topbar menu-icon">
                    <a href="#"><span>menu</span></a>
                </li>
            </ul>
            
            <section class="top-bar-section">
                <ul class="left">

                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    
                    <li>
                        <a href="#">About</a>

                    </li>
                    
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>

                </ul>
                
                <ul class="right">
                    <li class="divider"></li>
                    <li> 
                        <a href="#">Login</a>
                    </li> 
                </ul>
            
            </section>
        </nav> 
    </div>
</div>
 
 
<div class="row">
 
<div class="large-9 columns">
    <h3>Get in Touch!</h3>

    <br>
    <p>We'd love you hear from you. Reach out for any concerns, feedback or a specific question you might have and we will get back to as soon as possible.</p>
    <p> Have a nice day! </p>

    <div class="section-container tabs" data-section>

        <br>
        <section class="section">
            <h5 class="title"><a href="#panel1">Contact Me</a></h5>
            <div class="content" data-slug="panel1">
                <form>
                    <div class="row collapse">
                        <div class="large-2 columns">
                            <label class="inline">Your Name</label>
                        </div>
                        <div class="large-10 columns">
                            <input type="text" id="yourName" placeholder="John Smith">
                        </div>
                    </div>

                    <div class="row collapse">
                        <div class="large-2 columns">
                            <label class="inline"> Your Email</label>
                        </div>
                        <div class="large-10 columns">
                            <input type="text" id="yourEmail" placeholder="john@smithco.com">
                        </div>
                    </div>

                    <label>What's up?</label>
                    <textarea rows="4"></textarea>
                    <button type="submit" class="radius button">Submit</button>
                </form>
            </div>
        </section>
    </div>
</div>
 
 
<div class="large-3 columns">
    <h5>Map</h5>
 
    <p>
        <a href="" data-reveal-id="mapModal"><img src="https://www.google.ca/maps/vt/data=U4aSnIyhBFNIJ3A8fCzUmaVIwyWq6RtIfB4QKiGq_w,CNv1oHPuqbpd1-FyGe_l_FpyyMQY9nMTh93WhcTCM1J2-3AfWjw_NM2HwKm5vWVZfm57rNfBHbsr7-VVFOD832wua5ndCGdMEjHeaMe1mzeL50yb14ghiTmLz6jkr3kf90aov80LAWtaTpTHGXlvo_xNVY1YbujRQfyc7oIp28iJVMpC2B9eUNlrEsrc3tA4EYnvL2HFZVMpclYoEQ"></a><br/>
        <a href="" data-reveal-id="mapModal">View Map</a>
    </p>

    <p>
        50 Stone Road East<br/>
        Guelph, ON N1G 2W1
    </p>
</div>
 
</div>
 
<br>
<br>
<br>
<br>
<br>
<br> 
<br>
<br>
<br> 
<br>

<footer class="row">
    <div class="large-12 columns"><hr/>
        <div class="row">
            <div class="large-6 columns">
                <p>&copy The Food Fighters</p>
            </div>
        </div>
    </div>
</footer>
 
 
<div class="reveal-modal" id="mapModal">

    <h4>Where We Are</h4>
    <p><img src="http://placehold.it/800x600"/></p>
 
    <a href="#" class="close-reveal-modal">&times;</a>
</div>


<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>

<script>
    $(document).foundation();
</script>

<script src="js/vendor/jquery.js"></script>
<script src="js/foundation/foundation.js"></script>

<script>
    $(document).foundation();

    var doc = document.documentElement;
    doc.setAttribute('data-useragent', navigator.userAgent);
</script>

<script type="text/javascript">
/* <![CDATA[ */
(function(){try{var s,a,i,j,r,c,l=document.getElementsByTagName("a"),t=document.createElement("textarea");for(i=0;l.length-i;i++){try{a=l[i].getAttribute("href");if(a&&"/cdn-cgi/l/email-protection"==a.substr(0 ,27)){s='';j=28;r=parseInt(a.substr(j,2),16);for(j+=2;a.length-j&&a.substr(j,1)!='X';j+=2){c=parseInt(a.substr(j,2),16)^r;s+=String.fromCharCode(c);}j+=1;s+=a.substr(j,a.length-j);t.innerHTML=s.replace(/</g,"&lt;").replace(/>/g,"&gt;");l[i].setAttribute("href","mailto:"+t.value);}}catch(e){}}}catch(e){}})();
/* ]]> */
</script>
</body>
</html>