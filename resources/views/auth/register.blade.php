@extends('layouts.auth')

@section('title')
    Register new account
@endsection
@section('content')

<div class="page-content page-auth" id="register">
    <div class="section-store-auth" data-aos="fade-up">
      <div class="container">
        <div class="row align-items-center justify-content-center row-login">
          <div class="col-lg-4">
            <h2>
              Memulai untuk jual beli, <br />
              dengan cara baru.
            </h2>
            <form action="{{ route('register') }}" method="post" class="mt-3">
              @csrf
              <div class="form-group">
                <label for="name">Full Name</label>
                <input
                  type="text"
                  name="name"
                  id="name"
                  class="form-control @error('name') is-invalid @enderror"
                  v-model="name"
                  value="{{ old('name') }}" required autocomplete="name" autofocus
                />
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="email">Email Address</label>
                <input
                  type="email"
                  name="email"
                  @change="checkForEmailAvailability()"
                  :class="{ 'is-invalid' : this.email_unavailable }"
                  id="email"
                  class="form-control @error('email') is-invalid @enderror"
                  v-model="email"
                  value="{{ old('email') }}" required autocomplete="email"
                />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input
                  type="password"
                  name="password"
                  id="password"
                  class="form-control @error('password') is-invalid @enderror"
                  required autocomplete="new-password"
                />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input
                  type="password"
                  name="password_confirmation"
                  id="password_confirmation"
                  class="form-control @error('password_confirmation') is-invalid @enderror"
                  required autocomplete="new-password"
                />
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label>Store</label>
                <p class="text-muted">
                  Apakah anda juga ingin membuka toko?
                </p>
                <div
                  class="custom-control custom-radio custom-control-inline"
                >
                  <input
                    class="custom-control-input"
                    type="radio"
                    name="is_store_open"
                    id="openStoreTrue"
                    v-model="is_store_open"
                    :value="true"
                  />
                  <label class="custom-control-label" for="openStoreTrue"
                    >Iya, boleh</label
                  >
                </div>
                <div
                  class="custom-control custom-radio custom-control-inline"
                >
                  <input
                    class="custom-control-input"
                    type="radio"
                    name="is_store_open"
                    id="openStoreFalse"
                    v-model="is_store_open"
                    :value="false"
                  />
                  <label
                    makasih
                    class="custom-control-label"
                    for="openStoreFalse"
                    >Enggak, makasih</label
                  >
                </div>
              </div>
              <div class="form-group" v-if="is_store_open">
                <label>Nama Toko</label>
                <input type="text" class="form-control @error('store_name') is-invalid @enderror" v-model="store_name" name="store_name" id="store_name" required autofocus autocomplete/>
                @error('store_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group" v-if="is_store_open">
                <label for="categories_id">Category</label>
                <select name="categories_id" id="categories_id" class="form-control">
                  <option value="" disabled>Select Category</option>
                  @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
              <button 
                type="submit" 
                class="btn btn-success btn-block mt-4" 
                :disabled="this.email_unavailable">
                Sign Up Now
              </button>
              <a href="{{ route('login') }}" class="btn btn-signup btn-block mt-2">
                Back to Sign In
              </a>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection

@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
  Vue.use(Toasted);
  var register = new Vue({
    el: "#register",
    mounted() {
      AOS.init();
      
    },
    methods: {
      checkForEmailAvailability: function(){
        var self = this;
        axios.get('{{ route('api-register-check') }}', {
          params: {
            email: this.email
          }
        })
        .then(function(response) {
          if(response.data == 'Available'){
            self.$toasted.show(
                "Email tersedia!",
                {
                  position: "top-center",
                  className: "rounded",
                  duration: 1000,
                }
              );
              self.email_unavailable == false;
          } else {
              self.$toasted.error(
                "Maaf, tampaknya email sudah terdaftar pada sistem kami.",
                {
                  position: "top-center",
                  className: "rounded",
                  duration: 1000,
                }
              );
              self.email_unavailable == true;
          }
        });
      }
    },
    data() {
      return {
        name: "",
        email: "",
        is_store_open: true,
        store_name: "",
        email_unavailable: false
      }
    },
  });
</script>
@endpush
