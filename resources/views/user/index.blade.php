@extends('user.partials.app')

@section('title', 'Dashboard | Biopharma Academy Of Clinical Research')

@section('content')
<div class="row g-6">
  <!-- Website Analytics -->
  <div class="col-xl-8 col">
    <div class="swiper-container swiper-container-horizontal swiper swiper-card-advance-bg"
      id="swiper-with-pagination-cards">
      <div class="swiper-wrapper">

        {{-- Slide 1 --}}
        <div class="swiper-slide">
          <div class="row">
            <div class="col-12">
              <h5 class="text-white mb-0">Website Analytics</h5>
              <small>Total 28.5% Conversion Rate</small>
            </div>
            <div class="row">
              <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1 pt-md-9">
                <h6 class="text-white mt-0 mt-md-3 mb-4">Traffic</h6>
                <div class="row">
                  <div class="col-6">
                    <ul class="list-unstyled mb-0">
                      <li class="d-flex mb-4 align-items-center">
                        <p class="mb-0 fw-medium me-2 website-analytics-text-bg">28%</p>
                        <p class="mb-0">Sessions</p>
                      </li>
                      <li class="d-flex align-items-center">
                        <p class="mb-0 fw-medium me-2 website-analytics-text-bg">1.2k</p>
                        <p class="mb-0">Leads</p>
                      </li>
                    </ul>
                  </div>
                  <div class="col-6">
                    <ul class="list-unstyled mb-0">
                      <li class="d-flex mb-4 align-items-center">
                        <p class="mb-0 fw-medium me-2 website-analytics-text-bg">3.1k</p>
                        <p class="mb-0">Page Views</p>
                      </li>
                      <li class="d-flex align-items-center">
                        <p class="mb-0 fw-medium me-2 website-analytics-text-bg">12%</p>
                        <p class="mb-0">Conversions</p>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-4 my-md-0 text-center">
                <img src="{{ asset('user-assets/assets/img/illustrations/card-website-analytics-1.png') }}" alt="Website Analytics"
                  height="150" class="card-website-analytics-img" />
              </div>
            </div>
          </div>
        </div>

        {{-- Slide 2 --}}
        <div class="swiper-slide">
          <div class="row">
            <div class="col-12">
              <h5 class="text-white mb-0">Website Analytics</h5>
              <small>Total 28.5% Conversion Rate</small>
            </div>
            <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1 pt-md-9">
              <h6 class="text-white mt-0 mt-md-3 mb-4">Spending</h6>
              <div class="row">
                <div class="col-6">
                  <ul class="list-unstyled mb-0">
                    <li class="d-flex mb-4 align-items-center">
                      <p class="mb-0 fw-medium me-2 website-analytics-text-bg">12h</p>
                      <p class="mb-0">Spend</p>
                    </li>
                    <li class="d-flex align-items-center">
                      <p class="mb-0 fw-medium me-2 website-analytics-text-bg">127</p>
                      <p class="mb-0">Order</p>
                    </li>
                  </ul>
                </div>
                <div class="col-6">
                  <ul class="list-unstyled mb-0">
                    <li class="d-flex mb-4 align-items-center">
                      <p class="mb-0 fw-medium me-2 website-analytics-text-bg">18</p>
                      <p class="mb-0">Order Size</p>
                    </li>
                    <li class="d-flex align-items-center">
                      <p class="mb-0 fw-medium me-2 website-analytics-text-bg">2.3k</p>
                      <p class="mb-0">Items</p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-4 my-md-0 text-center">
              <img src="{{ asset('user-assets/assets/img/illustrations/card-website-analytics-2.png') }}" alt="Website Analytics"
                height="150" class="card-website-analytics-img" />
            </div>
          </div>
        </div>

        {{-- Slide 3 --}}
        <div class="swiper-slide">
          <div class="row">
            <div class="col-12">
              <h5 class="text-white mb-0">Website Analytics</h5>
              <small>Total 28.5% Conversion Rate</small>
            </div>
            <div class="col-lg-7 col-md-9 col-12 order-2 order-md-1 pt-md-9">
              <h6 class="text-white mt-0 mt-md-3 mb-4">Revenue Sources</h6>
              <div class="row">
                <div class="col-6">
                  <ul class="list-unstyled mb-0">
                    <li class="d-flex mb-4 align-items-center">
                      <p class="mb-0 fw-medium me-2 website-analytics-text-bg">268</p>
                      <p class="mb-0">Direct</p>
                    </li>
                    <li class="d-flex align-items-center">
                      <p class="mb-0 fw-medium me-2 website-analytics-text-bg">62</p>
                      <p class="mb-0">Referral</p>
                    </li>
                  </ul>
                </div>
                <div class="col-6">
                  <ul class="list-unstyled mb-0">
                    <li class="d-flex mb-4 align-items-center">
                      <p class="mb-0 fw-medium me-2 website-analytics-text-bg">890</p>
                      <p class="mb-0">Organic</p>
                    </li>
                    <li class="d-flex align-items-center">
                      <p class="mb-0 fw-medium me-2 website-analytics-text-bg">1.2k</p>
                      <p class="mb-0">Campaign</p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-5 col-md-3 col-12 order-1 order-md-2 my-4 my-md-0 text-center">
              <img src="{{ asset('user-assets/assets/img/illustrations/card-website-analytics-3.png') }}" alt="Website Analytics"
                height="150" class="card-website-analytics-img" />
            </div>
          </div>
        </div>

      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
  <!--/ Website Analytics -->

  <!-- Average Daily Sales -->
  <div class="col-xl-4 col-sm-12">
    <div class="card h-100">
      <div class="card-header pb-0">
        <h5 class="mb-3 card-title">Average Daily Traffic</h5>
        <p class="mb-0 text-body">Total Traffic This Month</p>
        <h4 class="mb-0">280k</h4>
      </div>
      <div class="card-body px-0">
        <div id="averageDailySales"></div>
      </div>
    </div>
  </div>
  <!--/ Average Daily Sales -->

  <!-- DataTable Section -->
  <!-- <div class="col-xxl-12">
    <div class="card">
      <div class="card-datatable table-responsive pt-0">
        <table class="datatables-basic table">
          <thead>
            <tr>
              <th></th>
              <th></th>
              <th>id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Date</th>
              <th>Salary</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div> -->
  <!--/ DataTable Section -->

</div>
@endsection