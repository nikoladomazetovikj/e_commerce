<!-- Footer -->
<footer class="text-center text-lg-start bg-dark text-muted">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
            <span>Get connected with us on social networks:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div>
            <a href="{{\App\Helpers\SiteData::getFacebook()}}" class="me-4 text-reset">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="{{\App\Helpers\SiteData::getTwitter()}}" class="me-4 text-reset">
                <i class="fab fa-twitter"></i>
            </a>

            <a href="{{\App\Helpers\SiteData::getInstagram()}}" class="me-4 text-reset">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fa-solid fa-seedling me-2 text-success"></i>Super Seeds
                    </h6>
                    <p>
                       Super Seed is a company that provides the best organic seeds from Macedonia to the US customers
                    </p>
                </div>
                <!-- Grid column -->



                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                    <p><i class="fas fa-home me-3"></i> {{App\Helpers\SiteData::getAdress()}}</p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        customers@superseeds.com
                    </p>
                    <p><i class="fas fa-phone me-3"></i> {{\App\Helpers\SiteData::getPhone()}}</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © {{\Carbon\Carbon::now()->year}} Copyright:
        <a class="text-reset fw-bold" href="/"> SuperSeeds</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
