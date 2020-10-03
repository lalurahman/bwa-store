@extends('layouts.app')

@section('title')
    Store - Details
@endsection

@section('content')
<div class="page-content page-details">
    <section
        class="store-breadcrumbs"
        data-aos="fade-down"
        data-aos-delay="100"
    >
        <div class="container">
        <div class="row">
            <div class="col-12">
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/index.html">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    Product Details
                </li>
                </ol>
            </nav>
            </div>
        </div>
        </div>
    </section>

    <section class="store-gallery" id="gallery">
        <div class="container">
        <div class="row">
            <div class="col-lg-8" data-aos="zoom-in">
            <transition name="slide-fade" mode="out-in">
                <img
                :src="photos[activePhoto].url"
                :key="photos[activePhoto].id"
                class="w-100 main-image"
                />
            </transition>
            </div>
            <div class="col-lg-2">
            <div class="row">
                <div
                class="col-3 col-lg-12 mt-2 mt-lg-0"
                v-for="(photo, index) in photos"
                :key="photo.id"
                data-aos="zoom-in"
                data-aos-delay="100"
                >
                <a href="#" @click="changeActive(index)">
                    <img
                    :src="photo.url"
                    class="w-100 thumbnail-image"
                    :class="{ active: index == activePhoto}"
                    />
                </a>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>

    <div class="store-details-container" data-aos="fade-up">
        <section class="store-heading">
        <div class="container">
            <div class="row">
            <div class="col-lg-8">
                <h1>Sofa Ternyaman</h1>
                <div class="owner">By Lalu Abdurrahman</div>
                <div class="price">$1,409</div>
            </div>
            <div class="col-lg-2" data-aos="zoom-in">
                <a href="{{ route('cart') }}" class="btn btn-success btn-block px-4 mb-3"
                >Add to Cart</a
                >
            </div>
            </div>
        </div>
        </section>
        <section class="store-description">
        <div class="container">
            <div class="row">
            <div class="col-12 col-lg-8" data-aos="zoom-in">
                <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero
                reprehenderit eligendi quibusdam, ut ducimus vel nihil alias
                minus explicabo cumque, sit accusamus blanditiis maiores,
                provident debitis optio modi obcaecati pariatur.
                </p>
                <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Nulla quibusdam dolor dolorem architecto explicabo impedit
                ducimus qui voluptatibus ipsum ad consectetur inventore
                officia nisi illo, delectus nam commodi vel consequuntur.
                </p>
            </div>
            </div>
        </div>
        </section>
        <section class="store-review">
        <div class="container">
            <div class="row">
            <div class="col-12 col-lg-8 mt-3 mb-3">
                <h5>Costumer Review (3)</h5>
            </div>
            </div>
            <div class="row">
            <div class="col-12 col-lg-8">
                <ul class="list-unstyled">
                <li class="media">
                    <img
                    src="/images/icon-testimonial-1.png"
                    alt="Testimonial"
                    class="rounded-circle mr-3"
                    />
                    <div class="media-body">
                    <h5 class="mt-2 mb-1">Harry Helvizar</h5>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Sunt pariatur quis repellat sequi ratione, dolores nisi
                    minima recusandae
                    </div>
                </li>
                <li class="media">
                    <img
                    src="/images/icon-testimonial-2.png"
                    alt="Testimonial"
                    class="rounded-circle mr-3"
                    />
                    <div class="media-body">
                    <h5 class="mt-2 mb-1">Aswar Kasim</h5>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Sunt pariatur quis repellat sequi ratione, dolores nisi
                    minima recusandae
                    </div>
                </li>
                <li class="media">
                    <img
                    src="/images/icon-testimonial-3.png"
                    alt="Testimonial"
                    class="rounded-circle mr-3"
                    />
                    <div class="media-body">
                    <h5 class="mt-2 mb-1">Ikram Anas</h5>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Sunt pariatur quis repellat sequi ratione, dolores nisi
                    minima recusandae
                    </div>
                </li>
                </ul>
            </div>
            </div>
        </div>
        </section>
    </div>
</div>
@endsection

@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script>
  var gallery = new Vue({
    el: "#gallery",
    mounted() {
      AOS.init();
    },
    data: {
      activePhoto: 0,
      photos: [
        {
          id: 1,
          url: "/images/product-details-1.jpg",
        },
        {
          id: 2,
          url: "/images/product-details-2.jpg",
        },
        {
          id: 3,
          url: "/images/product-details-3.jpg",
        },
        {
          id: 4,
          url: "/images/product-details-4.jpg",
        },
      ],
    },
    methods: {
      changeActive(id) {
        this.activePhoto = id;
      },
    },
  });
</script>
@endpush