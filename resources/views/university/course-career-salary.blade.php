@extends('university.main')
@section('title', 'Career & Salary Insights | Biopharma Academy')
@section('meta_description', 'Discover career paths and earning potential in clinical research. From CRC to CRA, see the salary ranges and job roles you can pursue.')

@section('content')
<style>
   .salary-grid {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    gap: 12px;
    text-align: center;
}
.salary-card{
    background:#fff;
    border:1px solid #eee;
    border-radius:12px;
    padding:20px;
}

.salary-role{
    font-size:20px;
    font-weight:600;
    margin-bottom:8px;

    display:-webkit-box;
    -webkit-line-clamp:2;
    -webkit-box-orient:vertical;
    overflow:hidden;
}

.salary-main{
    font-size:22px;
    font-weight:700;
    line-height:1;
}

.salary-main span{
    font-size:12px;
    color:#777;
}

.salary-label{
    font-size:11px;
    color:#777;
    margin:4px 0 8px;
}

.salary-progress{
    position:relative;
    height:4px;
    background:#eee;
    border-radius:20px;
}

.salary-progress span{
    position:absolute;
    top:50%;
    transform:translate(-50%,-50%);
    width:8px;
    height:8px;
    background:#6d28d9;
    border-radius:50%;
}

.salary-range{
    display:flex;
    justify-content:space-between;
    margin-top:8px;
    font-size:11px;
    color:#666;
}

@media(max-width:768px){
    .salary-grid{
        grid-template-columns:1fr;
    }
}
</style>

<div class="sub_header bg_1">
    <div id="intro_txt">
        <h1><strong>Career & Salary Insights</strong></h1>
        <p>Understand your earning potential in clinical research.</p>
    </div>
</div>

<div class="container_gray_bg">
    <div class="container margin_60">
        <div class="row">
            <div class="col-md-12">
                <div class="box_style_1">
                    <p><a href="{{ url('/course') }}" class="btn_1 rounded"><i class="icon-left-open"></i> Back to Course Overview</a></p>

                    <div class="indent_title_in">
                        <i class="pe-7s-graph1"></i>
                        <h3>Career & Salary Insights</h3>
                        <p>Understand your earning potential in clinical research</p>
                    </div>
                    <div class="wrapper_indent">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Career List</h4>
                                <ul class="list_style_1">
                                    <li>Clinical Research Nurse (CRN)</li>
                                    <li>Clinical Trial Assistant (CTA)</li>
                                    <li>Clinical Research Associate (CRA)</li>
                                    <li>Clinical Research Coordinator (CRC)</li>
                                    <li>Clinical Trial / Project Manager</li>
                                    <li>Quality Assurance Assistant</li>
                                    <li>Regulatory Assistant</li>
                                    <li>Business Development Assistant</li>
                                    <li>Finance Assistant</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <div class="salary-grid">
                                    <div class="salary-card">
                                        <div class="salary-role">
                                            <strong>Earnings Potential</strong>
                                        </div>
                                        <div class="salary-main">
                                            $18-$30
                                            <span>/hr</span>
                                        </div>
                                        <div class="salary-label">
                                            Median Hourly Wage
                                        </div>
                                        <div class="salary-progress">
                                            <span style="left: 40%"></span>
                                        </div>
                                        <div class="salary-range">
                                            <span>$10/hr</span>
                                            <span>$50/hr</span>
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