@extends('welcome')

@section('header')

    @include('header.headerTwo')
@endsection

@section('content')
<br><br>
<section class="features-1 text-center">
    <div class="container">
        <div class="row justify-center">
            <div class="col-md-12 text-center">

                <h2>Wgat is organisation?</h2>

                <div class="divider"></div>
                <p>In the desire to create a new value that will help the Associations, the Unions, the Foundations or other related organizations in the field of medical science and healthcare to shape their activities easily and efficiently, the Careoll Community was created.</p>
                <p>Acquiring the Careoll Community membership status, you have the possibility of using free software  intended for simple, flexible and safe operation and management of your organization. In this way, you can dedicate your energy and available time to informing and educating the public about the significant elements of your action, which are of great importance for health and medical awareness of people.</p>
                <p>We believe that every person – young and old, rich and poor, sick and healthy – needs access to a good knowledge base of health care and medical science at the international level, all in one place.</p>

            </div>
        </div>
    </div>
</section>
<div class="container body-content">
    <section class="content-1">
        <div class="container">
            <div class="row justify-center">
                <div class="col-md-6 text-center">
                    <img class="mb-4 img-fluid" src="<?=FULL_URL_PATH?>laravelorganisation/Assets/img/about.jpg" id="A1">
                </div>
                <div class="col-md-6 text-center text-md-left">
                    <h2 class="mb-4 mt-4">Vision</h2>
                    <p class="mb-4 text-justify">To become the leading information Portal in the field of health through the conscientious action of the Association, the Alliance, the Foundation and similar organizations at the international level.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="content-1">
        <div class="container">
            <div class="row justify-center">
                <div class="col-md-6 text-center text-md-left pl-5">
                    <h2 class="mb-4 mt-4">Mission</h2>
                    <p class="mb-4 text-justify">Integration of the Association, Alliance, Foundation and other organizations in the field of health and related activities at the international level, providing the possibility of free use of the software in a simple and efficient way.</p>
                </div>
                <div class="col-md-6 text-center">
                    <img class="mb-4 img-fluid" src="<?=FULL_URL_PATH?>laravelorganisation/Assets/img/about.jpg" id="A2">
                </div>
            </div>
        </div>
    </section>


    <section class="content-1">
        <div class="container">
            <div class="row justify-center">
                <div class="col-md-6 text-center">
                    <img class="mb-4 img-fluid" src="<?=FULL_URL_PATH?>laravelorganisation/Assets/img/about.jpg" id="A3">
                </div>
                <div class="col-md-6 text-center text-md-left">
                    <h2 class="mb-4 mt-4">Goals</h2>
                    <p class="mb-4">
                    </p><ul>
                        <li class="text-justify"> Creation of a database of successful non-governmental organizations in the field of medicine and health and improvement of their work;</li>
                        <li class="text-justify"> Strengthening the capacity of the Associations, Alliances, Foundations or similar organizations in the field of health and related activities;</li>
                        <li class="text-justify">International cooperation and encouragement of joint activities;</li>
                        <li class="text-justify"> Promoting common values and building a knowledge base from a medical and related field;</li>
                    </ul>
                    <p></p>
                </div>
            </div>
        </div>
    </section>

</div>
<br><br><br><br>
<section class="cta-4 text-center  " style="height: 100px; background-color:#17a2b8" >
    <div class="container">
        <div class="row justify-center">
            <div class="col-lg-12 text-center text-lg">
                <p class="lead mb-3 text-white " style="padding: 30px;font-size: 25px">Contact us on: <a href="mailto:stefangrujicic996@gmail.com" style="color: white">stefangrujicic996@gmail.com</a></p>
            </div>
        </div>
    </div>
</section>


<!-- Footer -->


@endsection
