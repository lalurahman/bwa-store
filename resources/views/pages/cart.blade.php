@extends('layouts.app')

@section('title')
    Store - Cart
@endsection

@section('content')
<div class="page-content page-cart">
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
                  Cart
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>

    <section class="store-cart">
      <div class="container">
        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-12 table-responsive">
            <table class="table table-borderless table-cart">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Name &amp; Seller</th>
                  <th>Price</th>
                  <th>Menu</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <img
                      src="/images/product-card-1.png"
                      class="cart-image"
                    />
                  </td>
                  <td>
                    <div class="product-title">Sofa Ternyaman</div>
                    <div class="product-subtitle">By Lalu rahman</div>
                  </td>
                  <td>
                    <div class="product-title">$ 109</div>
                    <div class="product-subtitle">USD</div>
                  </td>
                  <td>
                    <a href="#" class="btn btn-remove-cart">Remove</a>
                  </td>
                </tr>
                <tr>
                  <td style="width: 20%;">
                    <img
                      src="/images/product-card-1.png"
                      class="cart-image"
                    />
                  </td>
                  <td style="width: 35%;">
                    <div class="product-title">Sofa Ternyaman</div>
                    <div class="product-subtitle">By Lalu rahman</div>
                  </td>
                  <td style="width: 35%;">
                    <div class="product-title">$ 109</div>
                    <div class="product-subtitle">USD</div>
                  </td>
                  <td style="width: 10%;">
                    <a href="#" class="btn btn-remove-cart">Remove</a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <img
                      src="/images/product-card-1.png"
                      class="cart-image"
                    />
                  </td>
                  <td>
                    <div class="product-title">Sofa Ternyaman</div>
                    <div class="product-subtitle">By Lalu rahman</div>
                  </td>
                  <td>
                    <div class="product-title">$ 109</div>
                    <div class="product-subtitle">USD</div>
                  </td>
                  <td>
                    <a href="#" class="btn btn-remove-cart">Remove</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="150">
          <div class="col-12">
            <hr />
          </div>
          <div class="col-12">
            <h2 class="mb-4">Shipping Details</h2>
          </div>
        </div>

        <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
          <div class="col-12 col-md-6">
            <div class="form-group">
              <label for="addressOne">Address 1</label>
              <input
                type="text"
                class="form-control"
                name="addressOne"
                id="addressOne"
              />
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="form-group">
              <label for="addressTwo">Address 2</label>
              <input
                type="text"
                class="form-control"
                name="addressTwo"
                id="addressTwo"
              />
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="form-group">
              <label for="province">Province</label>
              <select name="province" id="province" class="form-control">
                <option value="West Sulawesi">West Sulawesi</option>
              </select>
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="form-group">
              <label for="city">City</label>
              <select name="city" id="city" class="form-control">
                <option value="Makassar">Makassar</option>
              </select>
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="form-group">
              <label for="postalcode">Postal Code</label>
              <input
                type="text"
                class="form-control"
                name="postalcode"
                id="postalcode"
              />
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="form-group">
              <label for="country">Country</label>
              <input
                type="text"
                class="form-control"
                name="country"
                id="country"
              />
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="form-group">
              <label for="mobile">Mobile</label>
              <input
                type="text"
                class="form-control"
                name="mobile"
                id="mobile"
              />
            </div>
          </div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="150">
          <div class="col-12">
            <hr />
          </div>
          <div class="col-12">
            <h2 class="mb-1">Payment Informations</h2>
          </div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="200">
          <div class="col-6 col-md-2">
            <div class="product-title">$10</div>
            <div class="product-subtitle">Country Tax</div>
          </div>
          <div class="col-6 col-md-2">
            <div class="product-title">$25</div>
            <div class="product-subtitle">Product Insurance</div>
          </div>
          <div class="col-6 col-md-2">
            <div class="product-title">$250</div>
            <div class="product-subtitle">Ship to Makassar</div>
          </div>
          <div class="col-6 col-md-2">
            <div class="product-title text-success">$2509</div>
            <div class="product-subtitle">Total</div>
          </div>
          <div class="col-8 col-md-3">
            <a
              href="/success.html"
              class="btn btn-success mt-4 px-4 btn-block"
              >Checkout Now</a
            >
          </div>
        </div>
      </div>
    </section>
</div>
@endsection