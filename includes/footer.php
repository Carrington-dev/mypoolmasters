<!-- ======= Footer ======= -->
<footer id="footer">

<div class="footer-top">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-md-6 footer-contact">
                <h3><?php echo "$company"; ?></h3>
                <p>
                    395 Francis Baard Street <br> Pretoria, Gauteng 0001<br> South Africa <br><br>
                    <strong>Phone:</strong> <?php echo "$phone"; ?><br>
                    <strong>Email:</strong> <?php echo "$email"; ?><br>
                </p>
            </div>

            <div class="col-lg-2 col-md-6 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    <li><i class="bx bx-chevron-right"></i> <a href="/">Home</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="/about">About us</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="/services">Services</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="/services">Terms of service</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="/services">Privacy policy</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
                <h4>Our Services</h4>
                <ul>
                    <li><i class="bx bx-chevron-right"></i> <a href="/services">Pool Design</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="/services">Pool Cleaning</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="/services">Pool Matainence</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="/services">Pool Construction</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="/services">Pool Inspections</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-6 footer-newsletter">
                <h4>Join Our Newsletter</h4>
                <p>We offer free pool inspections and update every now and then, so contact us today to schedule an appointment!

                </p>
                <form action="forms/newsletter.php" method="post">
                    <input type="email" name="email"><input type="submit" value="Subscribe">
                </form>
            </div>

        </div>
    </div>
</div>

<div class="container d-md-flex py-4">

    <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
            &copy; Copyright <strong><span><?php echo "$company"; ?></span></strong>. All Rights Reserved
        </div>
        <!-- <div class="credits">
            Designed by <a href="https://Stemgon.co.za/">Stemgon</a>
        </div> -->
    </div>
    <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
    </div>
</div>
</footer>
<!-- End Footer -->