@extends('layouts.dashboard')

@section('title')
    Store - Dashboard Transactions Details
@endsection

@section('content')
<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
<div class="container-fluid">
    <div class="dashboard-heading">
    <h2 class="dashboard-title">#STORE0839</h2>
    <p class="dashboard-subtitle">Transactions Details</p>
    </div>
    <div class="dashboard-content" id="transactionDetails">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-4">
                <img
                    src="/images/product-details-dashboard.png"
                    alt="product-details"
                    class="w-100 mb-3"
                />
                </div>
                <div class="col-12 col-md-8">
                <div class="row">
                    <div class="col-12 col-md-6">
                    <div class="product-title">Customer Name</div>
                    <div class="product-subtitle">
                        Lalu Abdurrahman
                    </div>
                    </div>
                    <div class="col-12 col-md-6">
                    <div class="product-title">Product Name</div>
                    <div class="product-subtitle">
                        Shirup Marzaann
                    </div>
                    </div>
                    <div class="col-12 col-md-6">
                    <div class="product-title">
                        Date of Transactions
                    </div>
                    <div class="product-subtitle">
                        12 Juni 2020
                    </div>
                    </div>
                    <div class="col-12 col-md-6">
                    <div class="product-title">Status</div>
                    <div class="product-subtitle text-danger">
                        Pending
                    </div>
                    </div>
                    <div class="col-12 col-md-6">
                    <div class="product-title">
                        Total Amount
                    </div>
                    <div class="product-subtitle">
                        $280.000
                    </div>
                    </div>
                    <div class="col-12 col-md-6">
                    <div class="product-title">
                        Mobile
                    </div>
                    <div class="product-subtitle">
                        6285256999428
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-4">
                <h5>Shipping Information</h5>
                </div>
                <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-6">
                    <div class="product-title">Address 1</div>
                    <div class="product-subtitle">
                        alamat 1
                    </div>
                    </div>
                    <div class="col-12 col-md-6">
                    <div class="product-title">Address 2</div>
                    <div class="product-subtitle">
                        alamat 2
                    </div>
                    </div>
                    <div class="col-12 col-md-6">
                    <div class="product-title">Province</div>
                    <div class="product-subtitle">
                        Sulawesi Selatan
                    </div>
                    </div>
                    <div class="col-12 col-md-6">
                    <div class="product-title">City</div>
                    <div class="product-subtitle">
                        Luwu Timur
                    </div>
                    </div>
                    <div class="col-12 col-md-6">
                    <div class="product-title">Postal Code</div>
                    <div class="product-subtitle">
                        78979
                    </div>
                    </div>
                    <div class="col-12 col-md-6">
                    <div class="product-title">Country</div>
                    <div class="product-subtitle">
                        Indonesia
                    </div>
                    </div>
                    <div class="col-12 col-md-3">
                    <div class="product-title">Status</div>
                    <select
                        name="status"
                        id="status"
                        class="form-control"
                        v-model="status"
                    >
                        <option value="UNPAID">Unpaid</option>
                        <option value="PENDING">Pending</option>
                        <option value="SHIPPING">Shipping</option>
                        <option value="SUCCESS">Success</option>
                    </select>
                    </div>
                    <template v-if="status == 'SHIPPING' ">
                    <div class="col-md-3">
                        <div class="product-title">Input Resi</div>
                        <input
                        type="text"
                        name="resi"
                        class="form-control"
                        v-model="resi"
                        />
                    </div>
                    <div class="col-md-2">
                        <button
                        type="submit"
                        class="btn btn-primary btn-block mt-4"
                        >
                        Update Resi
                        </button>
                    </div>
                    </template>
                    <div class="col-12 col-md-4 mt-4">
                    <button
                        type="submit"
                        class="btn btn-success btn-block"
                    >
                        Save Now
                    </button>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
@endsection

@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script>
  var transactionDetails = new Vue({
    el: "#transactionDetails",
    data: {
      status: "SHIPPING",
      resi: "BD00126628",
    },
  });
</script>
@endpush