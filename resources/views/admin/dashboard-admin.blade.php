@extends('layouts.lte.main')

@section('content')

<!--begin::Content Header-->
<div class="app-content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h3 class="mb-0">Dashboard v3</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Dashboard v3</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--end::Content Header-->

<!--begin::App Content-->
<div class="app-content">
  <div class="container-fluid">

    <!--begin::Top small boxes row-->
    <div class="row mb-3">
      <div class="col-lg-3 col-6">
        <div class="small-box text-bg-primary">
          <div class="inner">
            <h3>150</h3>
            <p>New Orders</p>
          </div>
          <div class="small-box-icon">
            <i class="bi bi-cart-fill" style="font-size: 2.2rem;" aria-hidden="true"></i>
          </div>
          <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
            More info <i class="bi bi-link-45deg"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box text-bg-success">
          <div class="inner">
            <h3>53<sup class="fs-5">%</sup></h3>
            <p>Bounce Rate</p>
          </div>
          <div class="small-box-icon">
            <i class="bi bi-graph-up-arrow" style="font-size: 2.2rem;" aria-hidden="true"></i>
          </div>
          <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
            More info <i class="bi bi-link-45deg"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box text-bg-warning">
          <div class="inner">
            <h3>44</h3>
            <p>User Registrations</p>
          </div>
          <div class="small-box-icon">
            <i class="bi bi-people-fill" style="font-size: 2.2rem;" aria-hidden="true"></i>
          </div>
          <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
            More info <i class="bi bi-link-45deg"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box text-bg-danger">
          <div class="inner">
            <h3>65</h3>
            <p>Unique Visitors</p>
          </div>
          <div class="small-box-icon">
            <i class="bi bi-people" style="font-size: 2.2rem;" aria-hidden="true"></i>
          </div>
          <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
            More info <i class="bi bi-link-45deg"></i>
          </a>
        </div>
      </div>
    </div>
    <!--end::Top small boxes row-->

    <!--begin::Main row (charts + table)-->
    <div class="row">
      <!-- Left column -->
      <div class="col-lg-6">
        <!-- Visitors Card -->
        <div class="card mb-4">
          <div class="card-header border-0 d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Online Store Visitors</h3>
            <a href="#" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">View Report</a>
          </div>
          <div class="card-body">
            <div class="d-flex">
              <p class="d-flex flex-column">
                <span class="fw-bold fs-5">820</span>
                <span>Visitors Over Time</span>
              </p>
              <p class="ms-auto d-flex flex-column text-end">
                <span class="text-success"><i class="bi bi-arrow-up"></i> 12.5%</span>
                <span class="text-secondary">Since last week</span>
              </p>
            </div>

            <div class="position-relative mb-4">
              <div id="visitors-chart" style="min-height:200px;"></div>
            </div>

            <div class="d-flex flex-row justify-content-end">
              <span class="me-2"><i class="bi bi-square-fill text-primary"></i> This Week</span>
              <span><i class="bi bi-square-fill text-secondary"></i> Last Week</span>
            </div>
          </div>
        </div>

        <!-- Products Table -->
        <div class="card mb-4">
          <div class="card-header border-0 d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Products</h3>
            <div class="card-tools">
              <a href="#" class="btn btn-tool btn-sm"><i class="bi bi-download"></i></a>
              <a href="#" class="btn btn-tool btn-sm"><i class="bi bi-list"></i></a>
            </div>
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-striped align-middle mb-0">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Sales</th>
                  <th>More</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <img src="{{ asset('assets/img/default-150x150.png') }}" alt="Product 1" class="rounded-circle img-size-32 me-2" />
                    Some Product
                  </td>
                  <td>$13 USD</td>
                  <td><small class="text-success me-1"><i class="bi bi-arrow-up"></i> 12%</small>12,000 Sold</td>
                  <td><a href="#" class="text-secondary"><i class="bi bi-search"></i></a></td>
                </tr>
                <tr>
                  <td>
                    <img src="{{ asset('assets/img/default-150x150.png') }}" alt="Product 2" class="rounded-circle img-size-32 me-2" />
                    Another Product
                  </td>
                  <td>$29 USD</td>
                  <td><small class="text-info me-1"><i class="bi bi-arrow-down"></i> 0.5%</small>123,234 Sold</td>
                  <td><a href="#" class="text-secondary"><i class="bi bi-search"></i></a></td>
                </tr>
                <tr>
                  <td>
                    <img src="{{ asset('assets/img/default-150x150.png') }}" alt="Product 3" class="rounded-circle img-size-32 me-2" />
                    Amazing Product
                  </td>
                  <td>$1,230 USD</td>
                  <td><small class="text-danger me-1"><i class="bi bi-arrow-down"></i> 3%</small>198 Sold</td>
                  <td><a href="#" class="text-secondary"><i class="bi bi-search"></i></a></td>
                </tr>
                <tr>
                  <td>
                    <img src="{{ asset('assets/img/default-150x150.png') }}" alt="Product 4" class="rounded-circle img-size-32 me-2" />
                    Perfect Item <span class="badge text-bg-danger">NEW</span>
                  </td>
                  <td>$199 USD</td>
                  <td><small class="text-success me-1"><i class="bi bi-arrow-up"></i> 63%</small>87 Sold</td>
                  <td><a href="#" class="text-secondary"><i class="bi bi-search"></i></a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- /.col -->

      <!-- Right column -->
      <div class="col-lg-6">
        <!-- Sales Card -->
        <div class="card mb-4">
          <div class="card-header border-0 d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Sales</h3>
            <a href="#" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">View Report</a>
          </div>
          <div class="card-body">
            <div class="d-flex">
              <p class="d-flex flex-column">
                <span class="fw-bold fs-5">$18,230.00</span>
                <span>Sales Over Time</span>
              </p>
              <p class="ms-auto d-flex flex-column text-end">
                <span class="text-success"><i class="bi bi-arrow-up"></i> 33.1%</span>
                <span class="text-secondary">Since Past Year</span>
              </p>
            </div>

            <div class="position-relative mb-4">
              <div id="sales-chart" style="min-height:200px;"></div>
            </div>

            <div class="d-flex flex-row justify-content-end">
              <span class="me-2"><i class="bi bi-square-fill text-primary"></i> This year</span>
              <span><i class="bi bi-square-fill text-secondary"></i> Last year</span>
            </div>
          </div>
        </div>

        <!-- Online Store Overview -->
        <div class="card">
          <div class="card-header border-0 d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Online Store Overview</h3>
            <div class="card-tools">
              <a href="#" class="btn btn-sm btn-tool"><i class="bi bi-download"></i></a>
              <a href="#" class="btn btn-sm btn-tool"><i class="bi bi-list"></i></a>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
              <p class="text-success fs-2"><i class="bi bi-graph-up-arrow"></i></p>
              <p class="d-flex flex-column text-end">
                <span class="fw-bold"><i class="bi bi-graph-up-arrow text-success"></i> 12%</span>
                <span class="text-secondary">CONVERSION RATE</span>
              </p>
            </div>

            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
              <p class="text-info fs-2"><i class="bi bi-cart4"></i></p>
              <p class="d-flex flex-column text-end">
                <span class="fw-bold"><i class="bi bi-graph-up-arrow text-info"></i> 0.8%</span>
                <span class="text-secondary">SALES RATE</span>
              </p>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-0">
              <p class="text-danger fs-2"><i class="bi bi-people-fill"></i></p>
              <p class="d-flex flex-column text-end">
                <span class="fw-bold"><i class="bi bi-graph-down-arrow text-danger"></i> 1%</span>
                <span class="text-secondary">REGISTRATION RATE</span>
              </p>
            </div>
          </div>
        </div>

      </div>
      <!-- /.col -->
    </div>
    <!--end::Main row-->

  </div>
</div>
<!--end::App Content-->

@endsection
