@extends('student.main')
@section('content')
<style>
    html[dir].dark-mode .card{
        background-color: #1c386624
    }
    html.dark-mode .card-title{
        color: #1c3866;
        font-size: 22px;
        margin-bottom: 10px;
    }
    .fullbleed strong{
        color: #1c3866;
        font-size: 18px;
    }
    html.dark-mode .text-50, html.dark-mode .text-muted{
        color: #1c3866!important;
    }
    html.dark-mode .chart-legend-item{
        color: #1c3866;
    }
    html.dark-mode .text-50, html.dark-mode .text-muted{
        font-size: 16px;
    }
    .small, small{
        font-size: 1rem;
    }
    .chart-legend-item{
        font-size: 1rem;
    }
    
    p.card-title {
        font-size: 40px !important;
    }
    
    
</style>
    <div class="pt-32pt">
        <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
            <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

                <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                    <h2 class="mb-0">Dashboard</h2>

                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{ url('/student_dashboard') }}">Home</a></li>

                        <li class="breadcrumb-item active">

                            Dashboard

                        </li>

                    </ol>

                </div>
            </div>

            <div class="row" role="tablist">
                <div class="col-auto">
                    <a href="{{ url('/student_module') }}" class="btn btn-outline-secondary">My Modules</a>
                </div>
            </div>

        </div>
    </div>


    <!-- Page Content -->

    <div class="container page__container">
        <div class="page-section">
            @if($showDashboardProgress)
                <div class="row mb-lg-8pt">
                    <div class="col-lg-12">

                        <div class="page-separator">
                            <div class="page-separator__text">Modules Progress</div>
                        </div>

                        <div class="card">
                            <div class="card-body p-24pt">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <div class="chart" style="height: 262px;">
                                            <div class="text-center fullbleed d-flex align-items-center justify-content-center flex-column z-0 text-dark">
                                                <h1 class="m-0 text-dark">{{$percentage}}%</h1>
                                                <strong>Completed</strong>
                                            </div>
                                            <canvas class="chart-canvas position-relative z-1"
                                                id="attendanceDoughnutChart"
                                                data-completed="{{$percentage}}"
                                                data-pending="{{100-$percentage}}">
                                                <span style="font-size: 1rem;" class="text-muted"><strong>Progress</strong></span>
                                            </canvas>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="nav border-0">
                                            <div class="row no-gutters flex" role="tablist">
                                                <div class="col-auto">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex">
                                                            <p class="card-title">Modules Progress Status</p>
                                                            <p class="text-muted mb-0">{{ $completedModules ?? 0 }} of {{ $moduleCount ?? 0 }} modules completed</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="attendanceDoughnutChartLegend" class="chart-legend chart-legend--vertical mt-24pt"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row mb-lg-8pt">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body p-32pt text-center">
                                <h2 class="mb-0 text-dark">Welcome to Biopharma Academy</h2>
                            </div>
                        </div>
                    </div>
                </div>
            @endif


        </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const chartElement = document.getElementById('attendanceDoughnutChart');
        if (!chartElement) {
            return;
        }

        const ctx = chartElement.getContext('2d');

        const completed = parseFloat(chartElement.dataset.completed);
        const pending = parseFloat(chartElement.dataset.pending);

        const data = {
            labels: ['Completed', 'Pending'],
            datasets: [{
                data: [completed, pending],
                backgroundColor: ['#1C3866', '#E55123'],
                borderWidth: 0
            }]
        };

        const config = {
            type: 'doughnut',
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom'
                    },
                },
                cutout: '70%',
            }
        };

        const attendanceDoughnutChart = new Chart(ctx, config);
    });
</script>

    <!-- // END Page Content -->
@endsection
