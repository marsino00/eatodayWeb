<?= $this->extend('layouts/layout') ?>

<?= $this->section('sections') ?>
<!-- Vista de la pàgina principal -->


<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
  <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
    <div class="row">
      <div class="col-lg-8">
        <h1>Benvinguts a ea<span>t</span>oday</h1>
        <h2>Restaurants sostenibles i propers</h2>
      </div>
      <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative" data-aos="zoom-in" data-aos-delay="200">
        <a href="/assets/video/eatoday.mp4" class="glightbox play-btn"></a>
      </div>

    </div>
  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
          <div class="about-img">
            <img src="/assets/img/eatoday_logo_white.png" alt="">
          </div>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
          <h3>Valors de la iniciativa</h3>
          <p class="fst-italic">
            La nostra iniciativa es la de realitzar una ajuda als restaurants per a que siguin més sostenibles i
            propers.
          </p>
          <ul>
            <li><i class="bi bi-check-circle"></i> Experiències culinàries úniques</li>
            <li><i class="bi bi-check-circle"></i> Àpats de qualitat</li>
            <li><i class="bi bi-check-circle"></i> Comandes al establiment i per emportar</li>
          </ul>
          <!-- <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
              voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum
            </p> -->
        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Why Us Section ======= -->
  <section id="why-us" class="why-us">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Establiments</h2>
        <p>Els nostres establiments</p>
      </div>

      <div id="establiments" class="row">
      </div>
      <a style="color:white" href="./establiments">Veure'ls tots</a>
    </div>
  </section><!-- End Why Us Section -->



  <!-- ======= Specials Section ======= -->
  <section id="specials" class="specials">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Plans</h2>
        <p>Selecciona el pla ideal per a tu</p>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-3">
          <ul class="nav nav-tabs flex-column">
            <li class="nav-item">
              <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Bàsic</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Estàndard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Premium</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-9 mt-4 mt-lg-0">
          <div class="tab-content">
            <div class="tab-pane active show" id="tab-1">
              <div class="row">
                <div class="col-lg-8 details order-2 order-lg-1">
                  <h3>Pla bàsic</h3>
                  <p class="fst-italic">7,99 / any</p>
                  <p>Aquest pla està pensat per a petits restaurants, els quals compten amb un o pocs establiments.</p>
                </div>
                <!-- <div class="col-lg-4 text-center order-1 order-lg-2">
                  <img src="assets/img/specials-1.png" alt="" class="img-fluid">
                </div> -->
              </div>
            </div>
            <div class="tab-pane" id="tab-2">
              <div class="row">
                <div class="col-lg-8 details order-2 order-lg-1">
                  <h3>Pla estàndard</h3>
                  <p class="fst-italic">12,99 / any</p>
                  <p>Aquest pla està pensat per a restaurants mijtans, els quals compten amb pocs establiments, però ja necessiten una gestió més elevada de la seva empresa.</p>

                </div>
                <!-- <div class="col-lg-4 text-center order-1 order-lg-2">
                  <img src="assets/img/specials-2.png" alt="" class="img-fluid">
                </div> -->
              </div>
            </div>
            <div class="tab-pane" id="tab-3">
              <div class="row">
                <div class="col-lg-8 details order-2 order-lg-1">
                  <h3>Pla premium</h3>
                  <p class="fst-italic">19,99 / any</p>
                  <p>Aquest pla està pensat per a multinacionals del sector, les quals els seus establiments es poden trobar en gairebé qualsevol país.</p>

                </div>
                <!-- <div class="col-lg-4 text-center order-1 order-lg-2">
                  <img src="assets/img/specials-3.png" alt="" class="img-fluid">
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Specials Section -->

  <!-- ======= Events Section ======= -->


  <!-- ======= Book A Table Section ======= -->
  <section id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Alta</h2>
        <p>Petició d'alta</p>
      </div>

      <form action="forms/book-a-table.php" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
        <div class="row">
          <div class="col-lg-4 col-md-6 form-group">
            <input type="text" name="name" class="form-control" id="name" placeholder="Nom" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
            <div class="validate"></div>
          </div>
          <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
            <input type="email" class="form-control" name="email" id="email" placeholder="Correu electrònic" data-rule="email" data-msg="Please enter a valid email">
            <div class="validate"></div>
          </div>
          <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Telèfon de contacte" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
            <div class="validate"></div>
          </div>
        </div>
        <div class="form-group mt-3">
          <textarea class="form-control" name="message" rows="5" placeholder="Missatge"></textarea>
          <div class="validate"></div>
        </div>
        <div class="mb-3">
          <div class="loading">Loading</div>
          <div class="error-message"></div>
          <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your
            reservation. Thank you!</div>
        </div>
        <div class="text-center"><button type="submit">Enviar</button></div>
      </form>

    </div>
  </section><!-- End Book A Table Section -->

  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Opinions</h2>
        <p>Experiències sobre eatoday</p>
      </div>

      <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Una iniciativa molt bona per a donar visibilitat als restaurants!
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img src="/assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
              <h3>Saul Goodman</h3>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Des de que la faig servir, s'ha tornat indispensable per al meu dia a dia.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img src="/assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
              <h3>Sara Wilsson</h3>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                El disseny de la web i la forma que es troba organitzada resulta molt intuitiva per al usuari.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img src="/assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
              <h3>Jena Karlis</h3>
            </div>
          </div>

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Testimonials Section -->



  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Contactar</h2>
        <p>Contactar amb els responsables de la iniciativa</p>
      </div>
    </div>

    <div class="container" data-aos="fade-up">

      <div class="row mt-5">

        <div class="col-lg-4">
        </div>

      </div>

      <div class="col-lg-8 mt-5 mt-lg-0">

        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
          <div class="row">
            <label for="cars">Tria un tema</label>

            <div class="col-md-12 form-group">
              <select style="background-color:black;color:white" name="tema" class="form-control" id="tema" placeholder="Tema">

              </select>

            </div>
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="El teu nom" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="El teu Email" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Assumpte" required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="8" placeholder="Missatge" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          <div class="text-center"><button id="enviarMissatge" type="submit">Enviar missatge</button></div>
        </form>

      </div>

    </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->

<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script>
  let establiments = document.getElementById("establiments");
  Api.obtenirEstabliments(establiments, "home");


  let selectTema = document.getElementById("tema");
  Api.ObtenirTemes(selectTema);

  document.getElementById("enviarMissatge").addEventListener("click", function() {
    console.log(selectTema.options[selectTema.selectedIndex].value);
  })
</script>
<?= $this->endSection() ?>

</body>

</html>