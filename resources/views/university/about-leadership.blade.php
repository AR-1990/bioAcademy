@extends('university.main')
@section('title', 'Leadership Team | Biopharma Academy')
@section('meta_description', 'Meet the experienced leaders behind Biopharma Academy – Dr. Syed A. Naqvi, Shuja Naqvi, and Dr. Humayun Naqvi – driving excellence in clinical research education.')

@section('content')
<style>
    /* Copy team card styles from the main about page */
    .single-team { text-align: center; margin-bottom: 30px; }
    .team-thumb { position: relative; display: inline-block; }
    .brd { border: 4px solid #1C3866; border-radius: 50%; padding: 6px; width: 180px; height: 180px; margin: 0 auto; overflow: hidden; transition: all 0.3s ease; }
    .brd img { width: 100%; height: 100%; object-fit: cover; border-radius: 50%; transition: all 0.3s ease; }
    .single-team:hover .brd { border-color: #1cafec; }
    .single-team:hover .brd img { transform: scale(1.05); }
    .dropdown { position: absolute; bottom: 10px; right: 10px; z-index: 10; }
    .xbtn { display: inline-block; width: 36px; height: 36px; line-height: 36px; text-align: center; background: #1C3866; color: #fff; border-radius: 50%; font-size: 22px; font-weight: 700; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 8px rgba(0,0,0,0.2); }
    .xbtn:hover { background: #1cafec; transform: rotate(90deg); }
    .team-social ul { list-style: none; padding: 0; margin: 0; display: flex; gap: 12px; justify-content: center; }
    .team-social ul li a { display: block; width: 38px; height: 38px; line-height: 38px; text-align: center; background: #1C3866; color: #fff; border-radius: 50%; font-size: 16px; transition: all 0.3s ease; }
    .team-social ul li a:hover { background: #1cafec; color: #fff; }
    .team-info h4 { font-size: 20px; margin-top: 18px; margin-bottom: 4px; font-family: "proxima_nova_rgbold", Arial, sans-serif; color: #222; }
    .team-info span { font-size: 14px; color: #1C3866; font-family: "proxima_novasemibold", Arial, sans-serif; }
    .dropdown-menu { min-width: auto; padding: 12px 16px; border-radius: 10px; background: #fff; box-shadow: 0 6px 20px rgba(0,0,0,0.15); border: none; transform: translateX(-50%); left: 50%; margin-top: 8px; }
    .dropdown-menu::before { content: ''; position: absolute; top: -8px; left: 50%; transform: translateX(-50%); border-left: 8px solid transparent; border-right: 8px solid transparent; border-bottom: 8px solid #fff; }
    .dropdown-toggle::after { display: none; }
    @media (max-width: 768px) { .brd { width: 140px; height: 140px; } .xbtn { width: 30px; height: 30px; line-height: 30px; font-size: 18px; bottom: 0; right: 0; } }
</style>

<div class="sub_header bg_2">
    <div id="intro_txt">
        <h1><strong>Our Leadership</strong></h1>
        <p>Meet the experienced professionals guiding Biopharma Academy</p>
    </div>
</div>

<div class="container margin_60" id="leadership">
    <div class="main_title">
        <h2>Meet Our Team</h2>
        <p>Decades of experience, one shared vision</p>
    </div>

    <div class="row">
        <div class="col-md-12">
            <p><a href="{{ url('about') }}" class="btn_1 rounded"><i class="icon-left-open"></i> Back to About Overview</a></p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <p>
                Biopharma Academy is led by a passionate group of leaders who have been driving innovation in clinical research for over a decade. Our founders, <strong>Dr. Syed A. Naqvi, President, Shuja Naqvi, CEO, and Dr. Humayun Naqvi, MD, MBA Medical Director</strong>, bring invaluable expertise and a shared commitment to excellence. Their leadership has been instrumental in growing Biopharma Informatic into a nationwide network of over 100 associates. Their vision and dedication continue to shape the mission of Biopharma Academy as we strive to advance education in clinical research.
            </p>

            <div class="row" style="margin-top: 30px;">
                {{-- Founder 1: Dr. Syed A. Naqvi --}}
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="single-team">
                        <div class="team-thumb">
                            <div class="brd">
                                <img src="{{ asset('university/img/team/Dr. Syed Naqvi.webp') }}" alt="Dr. Syed A. Naqvi" />
                            </div>
                            <div class="dropdown">
                                <a class="xbtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">+</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <div class="team-social mt-15">
                                        <ul>
                                            <li><a target="_blank" href="https://www.linkedin.com/in/biopharmainformatic"><i class="fab fa-linkedin"></i></a></li>
                                            <li><a href="mailto:rkoenning@biopharmainfo.net"><i class="fa fa-envelope"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="team-info">
                            <h4>Dr. Syed A. Naqvi</h4>
                            <span>President</span>
                        </div>
                    </div>
                </div>

                {{-- Founder 2: Shuja Naqvi --}}
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="single-team">
                        <div class="team-thumb">
                            <div class="brd">
                                <img src="{{ asset('university/img/team/shuja_naqvi_new.png') }}" alt="Shuja Naqvi" />
                            </div>
                            <div class="dropdown">
                                <a class="xbtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">+</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <div class="team-social mt-15">
                                        <ul>
                                            <li><a target="_blank" href="https://www.linkedin.com/in/shujanaqvi"><i class="fab fa-linkedin"></i></a></li>
                                            <li><a href="mailto:rkoenning@biopharmainfo.net"><i class="fa fa-envelope"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="team-info">
                            <h4>Shuja Naqvi</h4>
                            <span>C.E.O</span>
                        </div>
                    </div>
                </div>

                {{-- Founder 3: Dr. Humayun Naqvi --}}
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="single-team">
                        <div class="team-thumb">
                            <div class="brd">
                                <img src="{{ asset('university/img/team/Humaiyon Naqvi.webp') }}" alt="Dr. Humayun Naqvi" />
                            </div>
                            <div class="dropdown">
                                <a class="xbtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">+</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <div class="team-social mt-15">
                                        <ul>
                                            <li><a target="_blank" href="https://www.linkedin.com/in/humayunaqvi"><i class="fab fa-linkedin"></i></a></li>
                                            <li><a href="mailto:rkoenning@biopharmainfo.net"><i class="fa fa-envelope"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="team-info">
                            <h4>Dr. Humayun Naqvi</h4>
                            <span>MD, MBA Medical Director</span>
                        </div>
                    </div>
                </div>
            </div><!-- End team row -->
        </div><!-- End col-md-12 -->
    </div><!-- End row -->
</div><!-- End container -->
@endsection