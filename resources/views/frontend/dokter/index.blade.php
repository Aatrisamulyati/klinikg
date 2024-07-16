@extends('frontend.layouts.main')
  <section id="doctors" class="doctors">
    <div class="container">

      <div class="section-title">
        <br><br><br><br>
        <h2>Doctors</h2>
        <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
      </div>
      <div class="row">

        <div class="col-lg-6">
          <div class="member d-flex align-items-start">
            <div class="pic"><img src="{{ asset('frontend/img/doctors/doctors-1.jpg') }}" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Drg.Maicitra Nur Fadghli</h4>
              <span>Chief Medical Officer</span>
              <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
              <div class="social">
                <a href=""><i class="ri-twitter-fill"></i></a>
                <a href=""><i class="ri-facebook-fill"></i></a>
                <a href=""><i class="ri-instagram-fill"></i></a>
                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mt-4 mt-lg-0">
          <div class="member d-flex align-items-start">
            <div class="pic"><img src="{{ asset('frontend/img/doctors/doctors-1.jpg') }}" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Drg.Maicitra Nur Fadghli</h4>
              <span>Anesthesiologist</span>
              <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
              <div class="social">
                <a href=""><i class="ri-twitter-fill"></i></a>
                <a href=""><i class="ri-facebook-fill"></i></a>
                <a href=""><i class="ri-instagram-fill"></i></a>
                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
              </div>
            </div>
          </div>
        </div>
    </div>
  </section>
