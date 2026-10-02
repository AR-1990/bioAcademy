@extends('university.main')
@section('title', 'Fee Structure | Clinical Research Program | Biopharma Academy')
@section('meta_description', 'View the payment plan for our Clinical Research Excellence Program pay in instalments as you progress through online modules and hands-on training.')

@section('content')
<style>
    .fee-table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 16px;
        text-align: left;
    }
    .fee-table th {
        background: #1C3866;
        color: #fff;
        padding: 12px 15px;
        font-weight: 600;
    }
    .fee-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #ddd;
    }
    .fee-table tr:nth-child(even) {
        background: #f9f9f9;
    }
    .fee-table tr:last-child td {
        border-bottom: 2px solid #1C3866;
    }
    .fee-total {
        font-weight: 700;
        background: #eef2f7;
    }
    .fee-total td {
        padding: 12px 15px;
        border-top: 2px solid #1C3866;
    }
    @media (max-width: 768px) {
        .fee-table {
            font-size: 14px;
        }
        .fee-table th, .fee-table td {
            padding: 8px 10px;
        }
    }
</style>

<div class="sub_header bg_1">
    <div id="intro_txt">
        <h1><strong>Fee Structure</strong></h1>
        <p>Transparent payment plan for your clinical research training</p>
    </div>
</div>

<div class="container_gray_bg">
    <div class="container margin_60">
        <div class="row">
            <div class="col-md-12">
                <div class="box_style_1">
                    <!-- Back link -->
                    <p><a href="{{ url('course') }}" class="btn_1 rounded"><i class="icon-left-open"></i> Back to Course Overview</a></p>

                    <div class="indent_title_in">
                        <i class="pe-7s-cash"></i>
                        <h3>Payment Plan</h3>
                        <p>Pay as you progress through the program</p>
                    </div>
                    <div class="wrapper_indent">
                        <p>
                            Our Clinical Research Excellence Program is designed with flexibility in mind not just for learning, but also for payment. You can pay in two instalments, aligned with the key milestones of your training journey.
                        </p>

                        <table class="fee-table">
                            <thead>
                                <tr>
                                    <th>Payment Milestone</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Upon Enrollment Online Modules</strong><br><small>Access to all 18 self‑paced modules</small></td>
                                    <td><strong>$2,000.00</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>After Successfully Completing the Modules Hands‑On Training</strong><br><small>1:1 mentorship at our clinical research site</small></td>
                                    <td><strong>$2,500.00</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Exam Retake (if applicable)</strong><br><small>Optional only if you need to retake the comprehensive exam</small></td>
                                    <td><strong>$225.00</strong></td>
                                </tr>
                                <tr class="fee-total">
                                    <td><strong>Total (without retake)</strong></td>
                                    <td><strong>$4,500.00</strong></td>
                                </tr>
                            </tbody>
                        </table>

                        <p style="margin-top: 20px;">
                            <i class="icon-info-circled" style="color: #1C3866;"></i> 
                            All fees are due in USD. Payment plans are flexible contact our admissions team at 
                            <a href="mailto:RKoenning@biopharmainfo.net">RKoenning@biopharmainfo.net</a> 
                            or call <strong>+1 (361) 219-6321</strong> for more details.
                        </p>
                    </div>
                </div><!-- End box_style_1 -->
            </div><!-- End col-md-12 -->
        </div><!-- End row -->
    </div><!-- End container -->
</div><!-- End container_gray_bg -->
@endsection