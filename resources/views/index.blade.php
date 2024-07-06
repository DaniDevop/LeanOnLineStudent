@extends('layouts.front')

@section('content')
<section class="home" id="home">
        <div class="home-container container grid">
          <div class="home-img-bg">
            <!-- <img src="assets/images/bg-hero.jpg" alt="" class="home-img" /> -->
          </div>




          <div class="home-data">
            <h1 class="home-title">
            Nous vous apprenons <br />
            Tout ce que tu as besoin de savoir
            </h1>
            <p class="home-description">
            Découvrez la façon dont vous apprenez, prenez le contrôle de votre vie et créez quelque chose d'utile pour les autres.

            </p>
            <div class="home-btns">
              <a href="{{ route('courses.index') }}" class="button btn-gray btn-small"> Mes cours</a>
              <a href="#course" class="button button-home">Decrouvrir</a>
            </div>
          </div>
        </div>
      </section>


      <section class="story section container">
        <div class="story-container grid">
          <div class="story-data">
            <h2 class="section-title story-section-title">NOS BUTS</h2>
            <h1 class="story-title">
            Profitez d'apprendre sans aucune pression
            </h1>

            <p class="story-description">
            Apprenez à créer quelque chose avec un projet du monde réel qui vous aide à accroître votre créativité
            </p>
            <a href="#course" class="button btn-small">Decouvrir</a>
          </div>
          <div class="story-images">
            <img src="{{ asset('frontend/assets/images/goals.jpg') }}" alt="" class="story-img" />
            <div class="story-square"></div>
          </div>
        </div>
      </section>

      <section class="products section container" id="course">
        <h2 class="section-title">Tous les cours</h2>

        <div class="new-container">
          <div class="swiper new-swipper">
            <div class="swiper-wrapper">
            @foreach($courses as $course)
              <article class="products-card swiper-slide">
              <a style="color: inherit;" href="{{ route('courses.show', [$course->slug]) }}" class="products-link">
                <img
                  src="{{ Storage::url($course->course_image) }}"
                  class="products-img"
                  alt=""
                />
                <h3 class="products-title">{{ $course->title }}</h3>
                <div class="products-star">
                @for ($star = 1; $star <= 5; $star++)
                    @if ($course->rating >= $star)
                    <i class="bx bxs-star"></i>
                    @else
                    <i class='bx bx-star'></i>
                    @endif
                @endfor
                </div>
                <span class="products-price">${{ $course->price }}</span>
                @if($course->students()->count() > 5)
                  <button class="products-button">
                    Popular
                  </button>
                @endif
                <span class="products-student">
                {{ $course->students()->count() }} students
                </span>
              </a>
              </article>
            @endforeach

            </div>
            <div
              class="swiper-button-next"
              style="
                bottom: initial;
                top: 50%;
                right: 0;
                left: initial;
                border-radius: 50%;
              "
            >
              <i class="bx bx-right-arrow-alt"></i>
            </div>
            <div
              class="swiper-button-prev"
              style="bottom: initial; top: 50%; border-radius: 50%"
            >
              <i class="bx bx-left-arrow-alt"></i>
            </div>
          </div>
        </div>
      </section>



      <section class="newsletter section container">
        <div class="newsletter-bg grid">
          <div>
            <h2 class="newsletter-title">
              Subscribe Our <br />
              Newsletter
            </h2>
            <p class="newsletter-description">
              Be the first to know the new course and discount.
            </p>
          </div>

          <form action="" class="newsletter-subscribe">
            <input
              type="email"
              placeholder="Enter your email"
              class="newsletter-input"
            />
            <button class="button">BUTTON</button>
          </form>
        </div>
      </section>
@endsection
