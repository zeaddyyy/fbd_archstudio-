<!-- FOOTER -->

<footer class="main-footer">

<!-- GLOW -->

<div class="footer-glow"></div>

<!-- TOP -->

<div class="footer-top">

<!-- BRAND -->

<div class="footer-brand">

<h2>
FB DESIGN STUDIO
</h2>

<p>
Crafting timeless architecture and cinematic
interiors with modern luxury aesthetics,
minimal forms and emotionally immersive spaces.
</p>

</div>

<!-- LINKS -->

<div class="footer-links">

<!-- NAV -->

<div class="footer-column">

<h3>
Navigation
</h3>

<a href="/">
Home
</a>

<a
href="javascript:void(0)"
onclick="openProjects()"
>
Projects
</a>

<a href="/contact">
Contact
</a>

<a href="/admin">
Admin
</a>

</div>

<!-- SOCIAL -->

<div class="footer-column">

<h3>
Socials
</h3>

<a
href="https://instagram.com"
target="_blank"
>
Instagram
</a>

<a
href="https://wa.me/917359129662"
target="_blank"
>
WhatsApp
</a>

<a href="#">
Behance
</a>

</div>

<!-- LOCATION -->

<div class="footer-column">

<h3>
Location
</h3>

<p>
Bharuch, Gujarat
</p>

<p>
India
</p>

</div>

</div>

</div>

<!-- LINE -->

<div class="footer-line"></div>

<!-- BOTTOM -->

<div class="footer-bottom">

<p>
© <?= date('Y') ?> FB Design Studio.
All Rights Reserved.
</p>

<span>
Designed By Zaid Patel &  Mantashashaikh
</span>


</div>

</footer>

<style>

/* FOOTER */

.main-footer{
    position:relative;

    padding:120px 7% 40px;

    background:
    #070707;

    overflow:hidden;
}

/* GLOW */

.footer-glow{
    position:absolute;

    top:-200px;
    left:-200px;

    width:500px;
    height:500px;

    background:
    radial-gradient(
        circle,
        rgba(217,176,120,0.12),
        transparent 70%
    );

    pointer-events:none;
}

/* TOP */

.footer-top{
    position:relative;

    z-index:2;

    display:flex;

    justify-content:space-between;

    gap:100px;

    flex-wrap:wrap;
}

/* BRAND */

.footer-brand{
    max-width:520px;
}

.footer-brand h2{
    font-size:48px;

    font-weight:200;

    line-height:1;

    color:#f3e7d6;

    margin-bottom:26px;
}

.footer-brand p{
    line-height:2;

    color:#bca991;

    font-size:15px;
}

/* LINKS */

.footer-links{
    display:flex;

    gap:90px;

    flex-wrap:wrap;
}

/* COLUMN */

.footer-column{
    display:flex;

    flex-direction:column;

    gap:16px;
}

.footer-column h3{
    color:#f3e7d6;

    font-size:14px;

    letter-spacing:0.22em;

    text-transform:uppercase;

    margin-bottom:10px;
}

.footer-column a,
.footer-column p{
    text-decoration:none;

    color:#9e9e9e;

    transition:0.4s;

    font-size:15px;
}

.footer-column a:hover{
    color:#d9b078;

    transform:
    translateX(4px);
}

/* LINE */

.footer-line{
    width:100%;

    height:1px;

    background:
    rgba(255,255,255,0.06);

    margin:60px 0 34px;
}

/* BOTTOM */

.footer-bottom{
    display:flex;

    justify-content:space-between;

    align-items:center;

    gap:20px;

    flex-wrap:wrap;
}

.footer-bottom p,
.footer-bottom span{
    color:#777;

    font-size:13px;

    letter-spacing:0.08em;
}

/* MOBILE */

@media(max-width:768px){

.main-footer{
    padding:90px 7% 30px;
}

.footer-brand h2{
    font-size:34px;
}

.footer-links{
    gap:50px;
}

.footer-bottom{
    flex-direction:column;

    align-items:flex-start;
}

}

</style>

<script>

function toggleMenu()
{
    document.getElementById(
    'mobileNav'
    ).classList.toggle(
    'active'
    );
}

</script>

</body>
</html>