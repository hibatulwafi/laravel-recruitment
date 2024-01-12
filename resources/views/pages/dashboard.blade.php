@extends('layouts.dashboard')

@section('tab_tittle', 'Dashboard')

@section('content')
<div class="row row-cols-1">
    <div class="overflow-hidden d-slider1 ">
        <ul class="p-0 m-0 mb-2 swiper-wrapper list-inline">
            <!-- <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                <div class="card-body">
                    <div class="progress-widget">
                        <div id="circle-progress-01" class="text-center circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="100" data-type="percent">
                            <svg class="card-slie-arrow " width="24" height="24px" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                            </svg>
                        </div>
                        <div class="progress-detail">
                            <p class="mb-2">On Progress</p>
                            <h4 class="counter">2 Vacancies</h4>
                        </div>
                    </div>
                </div>
            </li>
            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                <div class="card-body">
                    <div class="progress-widget">
                        <div id="circle-progress-02" class="text-center circle-progress-01 circle-progress circle-progress-info" data-min-value="0" data-max-value="100" data-value="100" data-type="percent">
                            <svg class="card-slie-arrow " width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                            </svg>
                        </div>
                        <div class="progress-detail">
                            <p class="mb-2">New Data/day</p>
                            <h4 class="counter">3</h4>
                        </div>
                    </div>
                </div>
            </li> -->
            
            <!-- <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1100">
                    <div class="card-body">
                        <div class="progress-widget">
                            <div id="circle-progress-05"
                                class="text-center circle-progress-01 circle-progress circle-progress-primary"
                                data-min-value="0" data-max-value="100" data-value="50" data-type="percent">
                                <svg class="card-slie-arrow " width="24px" height="24px" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                                </svg>
                            </div>
                            <div class="progress-detail">
                                <p class="mb-2">Net Income</p>
                                <h4 class="counter">$150K</h4>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1200">
                    <div class="card-body">
                        <div class="progress-widget">
                            <div id="circle-progress-06"
                                class="text-center circle-progress-01 circle-progress circle-progress-info"
                                data-min-value="0" data-max-value="100" data-value="40" data-type="percent">
                                <svg class="card-slie-arrow " width="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                </svg>
                            </div>
                            <div class="progress-detail">
                                <p class="mb-2">Today</p>
                                <h4 class="counter">$4600</h4>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1300">
                    <div class="card-body">
                        <div class="progress-widget">
                            <div id="circle-progress-07"
                                class="text-center circle-progress-01 circle-progress circle-progress-primary"
                                data-min-value="0" data-max-value="100" data-value="30" data-type="percent">
                                <svg class="card-slie-arrow " width="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                </svg>
                            </div>
                            <div class="progress-detail">
                                <p class="mb-2">Members</p>
                                <h4 class="counter">11.2M</h4>
                            </div>
                        </div>
                    </div>
                </li> -->

        </ul>
        <div class="swiper-button swiper-button-next"></div>
        <div class="swiper-button swiper-button-prev"></div>
    </div>
</div>
<!-- <div class="row">
    <div class="col-md-6 col-lg-6">
        <div class="card" data-aos="fade-up" data-aos-delay="600">
            <div class="flex-wrap card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="mb-2 card-title">Activity overview</h4>
                    <p class="mb-0">
                        <svg class="icon-32" width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 22C6.48 22 2 17.51 2 12C2 6.48 6.48 2 12 2C17.51 2 22 6.48 22 12C22 17.51 17.51 22 12 22ZM16 10.02C15.7 9.73 15.23 9.73 14.94 10.03L12 12.98L9.06 10.03C8.77 9.73 8.29 9.73 8 10.02C7.7 10.32 7.7 10.79 8 11.08L11.47 14.57C11.61 14.71 11.8 14.79 12 14.79C12.2 14.79 12.39 14.71 12.53 14.57L16 11.08C16.15 10.94 16.22 10.75 16.22 10.56C16.22 10.36 16.15 10.17 16 10.02Z" fill="#17904b"></path>
                        </svg>
                        Progress Recruitment Video Editor
                    </p>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-2 d-flex profile-media align-items-top">
                    <div class="mt-1 profile-dots-pills-active border-primary"></div>
                    <div class="ms-4">
                        <h6 class="mb-1 ">Seleksi Tahap 1</h6>
                        <span class="mb-0">30 Ags 2023</span>
                    </div>
                </div>
                <div class="mb-2  d-flex profile-media align-items-top">
                    <div class="mt-1 profile-dots-pills border-primary"></div>
                    <div class="ms-4">
                        <h6 class="mb-1 ">Seleksi Tahap 2</h6>
                        <span class="mb-0"> TBA </span>
                    </div>
                </div>
                <div class="mb-2  d-flex profile-media align-items-top">
                    <div class="mt-1 profile-dots-pills border-primary"></div>
                    <div class="ms-4">
                        <h6 class="mb-1 ">Group Interview</h6>
                        <span class="mb-0"> TBA </span>
                    </div>
                </div>
                <div class="mb-2  d-flex profile-media align-items-top">
                    <div class="mt-1 profile-dots-pills border-primary"></div>
                    <div class="ms-4">
                        <h6 class="mb-1 ">Task</h6>
                        <span class="mb-0"> TBA </span>
                    </div>
                </div>
                <div class="mb-2  d-flex profile-media align-items-top">
                    <div class="mt-1 profile-dots-pills border-primary"></div>
                    <div class="ms-4">
                        <h6 class="mb-1 ">Seleksi Tahap Akhir</h6>
                        <span class="mb-0"> TBA </span>
                    </div>
                </div>
                <div class="mb-1  d-flex profile-media align-items-top">
                    <div class="mt-1 profile-dots-pills border-primary"></div>
                    <div class="ms-4">
                        <h6 class="mb-1 ">Offering</h6>
                        <span class="mb-0"> TBA </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-6">
        <div class="col-sm-12">
            <div class="card" data-aos="fade-up" data-aos-delay="600">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Summary</h4>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive mt-4">
                        <table id="basic-table" class="table table-striped mb-0" role="grid">
                            <thead>
                                <tr>
                                    <th>Position</th>
                                    <th>Batch</th>
                                    <th>Candidates</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <h6>Programmer</h6>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="iq-media-group iq-media-group-1">
                                            <a href="#" class="iq-media-1">
                                                <div class="icon iq-icon-box-3 rounded-pill">2</div>

                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-info">2
                                            <svg class="icon-32" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2124 7.76241C14.2124 10.4062 12.0489 12.5248 9.34933 12.5248C6.6507 12.5248 4.48631 10.4062 4.48631 7.76241C4.48631 5.11865 6.6507 3 9.34933 3C12.0489 3 14.2124 5.11865 14.2124 7.76241ZM2 17.9174C2 15.47 5.38553 14.8577 9.34933 14.8577C13.3347 14.8577 16.6987 15.4911 16.6987 17.9404C16.6987 20.3877 13.3131 21 9.34933 21C5.364 21 2 20.3666 2 17.9174ZM16.1734 7.84875C16.1734 9.19506 15.7605 10.4513 15.0364 11.4948C14.9611 11.6021 15.0276 11.7468 15.1587 11.7698C15.3407 11.7995 15.5276 11.8177 15.7184 11.8216C17.6167 11.8704 19.3202 10.6736 19.7908 8.87118C20.4885 6.19676 18.4415 3.79543 15.8339 3.79543C15.5511 3.79543 15.2801 3.82418 15.0159 3.87688C14.9797 3.88454 14.9405 3.90179 14.921 3.93246C14.8955 3.97174 14.9141 4.02253 14.9396 4.05607C15.7233 5.13216 16.1734 6.44206 16.1734 7.84875ZM19.3173 13.7023C20.5932 13.9466 21.4317 14.444 21.7791 15.1694C22.0736 15.7635 22.0736 16.4534 21.7791 17.0475C21.2478 18.1705 19.5335 18.5318 18.8672 18.6247C18.7292 18.6439 18.6186 18.5289 18.6333 18.3928C18.9738 15.2805 16.2664 13.8048 15.5658 13.4656C15.5364 13.4493 15.5296 13.4263 15.5325 13.411C15.5345 13.4014 15.5472 13.3861 15.5697 13.3832C17.0854 13.3545 18.7155 13.5586 19.3173 13.7023Z" fill="currentColor"></path>
                                        </div>
                                        </svg>
                                    </td>
                                    <td>
                                        <div class="text-success">Completed</div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <h6>Video Editor</h6>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="iq-media-group iq-media-group-1">
                                            <a href="#" class="iq-media-1">
                                                <div class="icon iq-icon-box-3 rounded-pill">2</div>

                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-info">1
                                            <svg class="icon-32" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2124 7.76241C14.2124 10.4062 12.0489 12.5248 9.34933 12.5248C6.6507 12.5248 4.48631 10.4062 4.48631 7.76241C4.48631 5.11865 6.6507 3 9.34933 3C12.0489 3 14.2124 5.11865 14.2124 7.76241ZM2 17.9174C2 15.47 5.38553 14.8577 9.34933 14.8577C13.3347 14.8577 16.6987 15.4911 16.6987 17.9404C16.6987 20.3877 13.3131 21 9.34933 21C5.364 21 2 20.3666 2 17.9174ZM16.1734 7.84875C16.1734 9.19506 15.7605 10.4513 15.0364 11.4948C14.9611 11.6021 15.0276 11.7468 15.1587 11.7698C15.3407 11.7995 15.5276 11.8177 15.7184 11.8216C17.6167 11.8704 19.3202 10.6736 19.7908 8.87118C20.4885 6.19676 18.4415 3.79543 15.8339 3.79543C15.5511 3.79543 15.2801 3.82418 15.0159 3.87688C14.9797 3.88454 14.9405 3.90179 14.921 3.93246C14.8955 3.97174 14.9141 4.02253 14.9396 4.05607C15.7233 5.13216 16.1734 6.44206 16.1734 7.84875ZM19.3173 13.7023C20.5932 13.9466 21.4317 14.444 21.7791 15.1694C22.0736 15.7635 22.0736 16.4534 21.7791 17.0475C21.2478 18.1705 19.5335 18.5318 18.8672 18.6247C18.7292 18.6439 18.6186 18.5289 18.6333 18.3928C18.9738 15.2805 16.2664 13.8048 15.5658 13.4656C15.5364 13.4493 15.5296 13.4263 15.5325 13.411C15.5345 13.4014 15.5472 13.3861 15.5697 13.3832C17.0854 13.3545 18.7155 13.5586 19.3173 13.7023Z" fill="currentColor"></path>
                                        </div>
                                        </svg>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center mb-2">
                                            <h6>20%</h6>
                                        </div>
                                        <div class="progress bg-soft-info shadow-none w-100" style="height: 6px">
                                            <div class="progress-bar bg-info" data-toggle="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <h6>Trainer</h6>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="iq-media-group iq-media-group-1">
                                            <a href="#" class="iq-media-1">
                                                <div class="icon iq-icon-box-3 rounded-pill">2</div>

                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-info">10
                                            <svg class="icon-32" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2124 7.76241C14.2124 10.4062 12.0489 12.5248 9.34933 12.5248C6.6507 12.5248 4.48631 10.4062 4.48631 7.76241C4.48631 5.11865 6.6507 3 9.34933 3C12.0489 3 14.2124 5.11865 14.2124 7.76241ZM2 17.9174C2 15.47 5.38553 14.8577 9.34933 14.8577C13.3347 14.8577 16.6987 15.4911 16.6987 17.9404C16.6987 20.3877 13.3131 21 9.34933 21C5.364 21 2 20.3666 2 17.9174ZM16.1734 7.84875C16.1734 9.19506 15.7605 10.4513 15.0364 11.4948C14.9611 11.6021 15.0276 11.7468 15.1587 11.7698C15.3407 11.7995 15.5276 11.8177 15.7184 11.8216C17.6167 11.8704 19.3202 10.6736 19.7908 8.87118C20.4885 6.19676 18.4415 3.79543 15.8339 3.79543C15.5511 3.79543 15.2801 3.82418 15.0159 3.87688C14.9797 3.88454 14.9405 3.90179 14.921 3.93246C14.8955 3.97174 14.9141 4.02253 14.9396 4.05607C15.7233 5.13216 16.1734 6.44206 16.1734 7.84875ZM19.3173 13.7023C20.5932 13.9466 21.4317 14.444 21.7791 15.1694C22.0736 15.7635 22.0736 16.4534 21.7791 17.0475C21.2478 18.1705 19.5335 18.5318 18.8672 18.6247C18.7292 18.6439 18.6186 18.5289 18.6333 18.3928C18.9738 15.2805 16.2664 13.8048 15.5658 13.4656C15.5364 13.4493 15.5296 13.4263 15.5325 13.411C15.5345 13.4014 15.5472 13.3861 15.5697 13.3832C17.0854 13.3545 18.7155 13.5586 19.3173 13.7023Z" fill="currentColor"></path>
                                        </div>
                                        </svg>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center mb-2">
                                            <h6>25%</h6>
                                        </div>
                                        <div class="progress bg-soft-primary shadow-none w-100" style="height: 6px">
                                            <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection