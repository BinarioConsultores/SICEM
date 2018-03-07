@extends('layouts.appadmin')
@section('javascript')

@endsection

@section('content')
<div class="content">

    <div class="page-layout carded left-sidebar">

        <div class="top-bg bg-primary"></div>

        <div class="page-content-wrapper">

            <aside class="page-sidebar" data-fuse-bar="demo-sidebar" data-fuse-bar-media-step="md">

                <!-- HEADER -->
                <div class="header p-6 bg-primary text-auto">
                    <span class="h3">Información de Nicho</span>
                </div>
                <!-- / HEADER -->

                <!-- DEMO CONTENT -->
                <div class="demo-sidebar">

                    <ul class="nav flex-column">

                        <li class="subheader">Menú</li>

                        <li class="nav-item">
                            <a class="nav-link">Sidenav Item 1</a>
                        </li>

                        <md-divider></md-divider>

                        <li class="nav-item">
                            <a class="nav-link">Sidenav Item 2</a>
                        </li>

                        

                    </ul>
                </div>
                <!-- / DEMO CONTENT -->

            </aside>

            <!-- CONTENT -->
            <div class="page-content">

                <!-- HEADER -->
                <div class="header py-6 bg-primary text-auto">

                    <div class="d-flex flex-row align-items-center">

                        <button type="button" class="sidebar-toggle-button btn btn-icon d-block d-lg-none mr-2" data-fuse-bar-toggle="demo-sidebar">
                            <i class="icon icon-menu"></i>
                        </button>

                        <span class="h3">Nicho {{$nicho->nicho_nro}}</span>
                    </div>

                </div>
                <!-- / HEADER -->

                <div class="page-content-card">
                    <!-- CONTENT TOOLBAR -->
                    <div class="toolbar p-6">Información General</div>
                    <!-- / CONTENT TOOLBAR -->

                    <div class="p-6">
                        <!-- DEMO CONTENT -->
                        <!-- DEMO CONTENT -->
                        <div class="demo-content">
                            <div class="row">
                                
                                        <div class="about col-12 col-md-7 col-xl-9">

                                            <div class="profile-box info-box general card mb-4">

                                                <header class="h6 bg-secondary text-auto p-4">
                                                    <div class="title">General Information</div>
                                                </header>

                                                <div class="content p-4">

                                                    <div class="info-line mb-6">
                                                        <div class="title font-weight-bold mb-1">Gender</div>
                                                        <div class="info">Female</div>
                                                    </div>

                                                    <div class="info-line mb-6">
                                                        <div class="title font-weight-bold mb-1">Birthday</div>
                                                        <div class="info">12.01.1987</div>
                                                    </div>

                                                    <div class="info-line mb-6">
                                                        <div class="title font-weight-bold mb-1">Locations</div>

                                                        <div class="info location">
                                                            <span>Istanbul, Turkey</span>
                                                            <i class="icon-map-marker s-4"></i>
                                                        </div>

                                                        <div class="info location">
                                                            <span>New York, USA</span>
                                                            <i class="icon-map-marker s-4"></i>
                                                        </div>

                                                    </div>

                                                    <div class="info-line">
                                                        <div class="title font-weight-bold mb-1">About Me</div>
                                                        <div class="info">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eget pharetra felis, sed ullamcorper dui. Sed et elementum neque. Vestibulum pellente viverra ultrices. Etiam justo augue, vehicula ac
                                                            gravida a, interdum sit amet nisl. Integer vitae nisi id nibh dictum mollis in vitae tortor.</div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="profile-box info-box work card mb-4">

                                                <header class="h6 bg-secondary text-auto p-4">
                                                    <div class="title">Work</div>
                                                </header>

                                                <div class="content p-4">

                                                    <div class="info-line mb-6">
                                                        <div class="title font-weight-bold mb-1">Occupation</div>
                                                        <div class="info">Developer</div>
                                                    </div>

                                                    <div class="info-line mb-6">
                                                        <div class="title font-weight-bold mb-1">Skills</div>
                                                        <div class="info">C#, PHP, Javascript, Angular, JS, HTML, CSS</div>
                                                    </div>

                                                    <div class="info-line mb-6">
                                                        <div class="title font-weight-bold mb-1">Jobs</div>
                                                        <table class="info jobs">

                                                            <tr class="job">
                                                                <td class="company font-weight-bold pr-4">Self-Employed</td>
                                                                <td class="date">2010 - Now</td>
                                                            </tr>

                                                            <tr class="job">
                                                                <td class="company font-weight-bold pr-4">Google</td>
                                                                <td class="date">2008 - 2010</td>
                                                            </tr>

                                                        </table>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="profile-box info-box contact card mb-4">

                                                <header class="h6 bg-secondary text-auto p-4">
                                                    <div class="title">Contact</div>
                                                </header>

                                                <div class="content p-4">

                                                    <div class="info-line mb-6">
                                                        <div class="title font-weight-bold mb-1">Address</div>
                                                        <div class="info">Ut pharetra luctus est quis sodales. Duis nisi tortor, bibendum eget tincidunt, aliquam ac elit. Mauris nec euismod odio.</div>
                                                    </div>

                                                    <div class="info-line mb-6">
                                                        <div class="title font-weight-bold mb-1">Tel.</div>

                                                        <div class="info">
                                                            <span>&#43;6 555 6600</span>
                                                        </div>

                                                        <div class="info">
                                                            <span>&#43;9 555 5255</span>
                                                        </div>

                                                    </div>

                                                    <div class="info-line mb-6">
                                                        <div class="title font-weight-bold mb-1">Website</div>

                                                        <div class="info">
                                                            <span>withinpixels.com</span>
                                                        </div>

                                                    </div>

                                                    <div class="info-line mb-6">
                                                        <div class="title font-weight-bold mb-1">Emails</div>

                                                        <div class="info" ng-repeat="email in vm.about.contact.emails">
                                                            <span>mail@withinpixels.com</span>
                                                        </div>

                                                        <div class="info" ng-repeat="email in vm.about.contact.emails">
                                                            <span>mail@creapond.com</span>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                <div class="about-sidebar col-12 col-md-5 col-xl-3">

                                            <div class="profile-box friends card mb-4">

                                                <header class="row no-gutters align-items-center justify-content-between bg-secondary text-auto p-4">
                                                    <div class="title h6">Imagen del Nicho</div>
                                                    <div class="more text-muted">
                                                        <span>Imagen</span>
                                                        <span>Referencial</span>
                                                    </div>
                                                </header>

                                                <div class="content row no-gutters p-4">

                                                    <div class="friend col-3 p-1">
                                                        <img class="w-100" src="{{asset('assets/images/nicho/default.jpg')}}">
                                                    </div>

                                                    <div class="friend col-3 p-1">
                                                        <img class="w-100" src="../assets/images/avatars/carl.jpg">
                                                    </div>

                                                    <div class="friend col-3 p-1">
                                                        <img class="w-100" src="../assets/images/avatars/jane.jpg">
                                                    </div>

                                                    <div class="friend col-3 p-1">
                                                        <img class="w-100" src="../assets/images/avatars/garry.jpg">
                                                    </div>

                                                    <div class="friend col-3 p-1">
                                                        <img class="w-100" src="../assets/images/avatars/vincent.jpg">
                                                    </div>

                                                    <div class="friend col-3 p-1">
                                                        <img class="w-100" src="../assets/images/avatars/alice.jpg">
                                                    </div>

                                                    <div class="friend col-3 p-1">
                                                        <img class="w-100" src="../assets/images/avatars/andrew.jpg">
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="profile-box groups card mb-4">

                                                <header class="row no-gutters align-items-center justify-content-between bg-secondary text-auto p-4">
                                                    <div class="title h6">Joined Groups</div>
                                                    <div class="more text-muted">
                                                        <span>See</span>
                                                        <span>6</span>
                                                        <span>More</span>
                                                    </div>
                                                </header>

                                                <div class="content p-4">

                                                    <div class="group row no-gutters align-items-center justify-content-between mb-4">

                                                        <div class="col">

                                                            <div class="row no-gutters align-items-center">

                                                                <img class="logo col-auto mr-4" src="../assets/images/logos/android.png" alt="Android" />

                                                                <div class="col">
                                                                    <div class="name">Android</div>
                                                                    <div class="category">Technology</div>
                                                                    <div class="members mt-4">1.856.546 people</div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="col-auto">
                                                            <button type="button" class="btn btn-icon" aria-label="more">
                                                                <i class="icon icon-dots-vertical"></i>
                                                            </button>
                                                        </div>

                                                    </div>

                                                    <div class="group row no-gutters align-items-center justify-content-between mb-4">

                                                        <div class="col">

                                                            <div class="row no-gutters align-items-center">

                                                                <img class="logo col-auto mr-4" src="../assets/images/logos/google.png" alt="Google" />

                                                                <div class="col">
                                                                    <div class="name">Google</div>
                                                                    <div class="category">Web</div>
                                                                    <div class="members mt-4">1.226.121 people</div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="col-auto">
                                                            <button type="button" class="btn btn-icon" aria-label="more">
                                                                <i class="icon icon-dots-vertical"></i>
                                                            </button>
                                                        </div>

                                                    </div>

                                                    <div class="group row no-gutters align-items-center justify-content-between mb-4">

                                                        <div class="col">

                                                            <div class="row no-gutters align-items-center">

                                                                <img class="logo col-auto mr-4" src="../assets/images/logos/fallout.png" alt="Fallout" />

                                                                <div class="col">
                                                                    <div class="name">Fallout</div>
                                                                    <div class="category">Games</div>
                                                                    <div class="members mt-4">526.142 people</div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="col-auto">
                                                            <button type="button" class="btn btn-icon" aria-label="more">
                                                                <i class="icon icon-dots-vertical"></i>
                                                            </button>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                            </div>
                            
                        </div>
                        <!-- / DEMO CONTENT -->
                        <!-- / DEMO CONTENT -->
                    </div>
                </div>

            </div>
            <!-- / CONTENT -->
        </div>
    </div>

</div>


@endsection