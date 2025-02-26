@extends('layouts.customer')

@section('content')
    <header style=" background-color: #ffffff; border-bottom: solid 1px #30303050;"><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
        <div class="top-header container">

            <nav class="navbar navbar-expand-lg ">
                <a class="navbar-brand"  href="{{route('/')}}">
                    <img src="{{ asset('view/img/logo.png')}}" alt="">
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ">
                        <li class="nav-item active">
                          
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="progress">
            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar" role="progressbar" style="width:45%">
            </div>
        </div>
    </header>
    <section class="sixth_body">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="seventh_box">
                        <div class="third_title1">
                            <span>Schritt 3</span> von 6
                        </div>
                        <div class="target_group">
                            <div class="second_option_title">
                               Welche Zielgruppe wollen Sie erreichen ?
                            </div>
                            <div class="seventh_text">
                               An wen richtet sich Ihre Kampagne ? Wir informieren nur Anbieter über Ihre Anfrage - wenn diese, Dienstleistungen  auch an Ihre Zielgruppe anbieten. Diese Selektion unterstützt Sie als Kunde - aber auch die Dienstleister.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="seventh_item" id="seventh_item1">
                                <div class="checkbox1">

                                    <label>
                                        <input type="checkbox" value="">
                                        <span class="cr"><i class="fas fa-check"></i></span>                                        
                                    </label>

                                    <div class="text-center">
                                        <img src="{{ asset('view/img/company.jpg')}}" alt="" class="country_flag">
                                    </div>

                                    <div class="seven_item_text text-center">
                                        Unternehmen
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="seventh_item" id="seventh_item2">
                                <div class="checkbox1">

                                    <label>
                                        <input type="checkbox" value="">
                                        <span class="cr"><i class="fas fa-check"></i></span>                                        
                                    </label>

                                    <div class="text-center">
                                        <img src="{{ asset('view/img/persion.jpg')}}" alt="" class="country_flag">
                                    </div>

                                    <div class="seven_item_text text-center">
                                        Privatpersonen
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="seven_btns">
                        <a href="{{route('customer.country')}}"> <button class="btn prev_btn"> <i class="fas fa-arrow-left"></i>Zurück</button></a>
                        <a href="{{route('customer.description')}}"> <button class="btn next_btn btn-primary"> Weiter <i class="fas fa-arrow-right"></i></button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {  

            let formdata = JSON.parse(localStorage.getItem('formdata'));

            if(typeof(formdata.supplier_company) != "undefined"){
                if(formdata.supplier_company == '1'){    
                    $('#seventh_item1 .checkbox1 label input[type="checkbox"]').prop('checked', 'true');          
                    $('#seventh_item1').css('border-color', '#0289ff');
                    $('#seventh_item1 .checkbox1 label .cr').css('border-color', '#0289ff');
                }
    
                if(formdata.supplier_personal == '1'){    
                    $('#seventh_item2 .checkbox1 label input[type="checkbox"]').prop('checked', 'true');          
                    $('#seventh_item2').css('border-color', '#0289ff');
                    $('#seventh_item2 .checkbox1 label .cr').css('border-color', '#0289ff');
                }
            } else {
                formdata.supplier_company = 0;
                formdata.supplier_personal = 0;
            }         

            $('#seventh_item1 .checkbox1 label input[type="checkbox"]').click(function() {
                if (($('#seventh_item1 .checkbox1 label input[type="checkbox"]').prop('checked'))) {

                    $('#seventh_item1').css('border-color', '#0289ff');
                    $('#seventh_item1 .checkbox1 label .cr').css('border-color', '#0289ff');

                    formdata.supplier_company = 1;
                    localStorage.setItem('formdata', JSON.stringify(formdata));

                } else {

                    $('#seventh_item1').css('border-color', '#30303050');
                    $('#seventh_item1 .checkbox1 label .cr').css('border-color', '#30303050');
                    formdata.supplier_company = 0;
                    localStorage.setItem('formdata', JSON.stringify(formdata));
                }

            })

            $('#seventh_item2 .checkbox1 label input[type="checkbox"]').click(function() {
                if (($('#seventh_item2 .checkbox1 label input[type="checkbox"]').prop('checked'))) {

                    $('#seventh_item2').css('border-color', '#0289ff');
                    $('#seventh_item2 .checkbox1 label .cr').css('border-color', '#0289ff');

                    formdata.supplier_personal = 1;
                    localStorage.setItem('formdata', JSON.stringify(formdata));

                } else {

                    $('#seventh_item2').css('border-color', '#30303050');
                    $('#seventh_item2 .checkbox1 label .cr').css('border-color', '#30303050');
                    formdata.supplier_personal = 0;
                    localStorage.setItem('formdata', JSON.stringify(formdata));
                }

            })    
            
            $('#seventh_item1').click(function(){
                if (($('#seventh_item1 .checkbox1 label input[type="checkbox"]').prop('checked'))) {                    
                    $('#seventh_item1').css('border-color', '#30303050');
                    $('#seventh_item1 .checkbox1 label .cr').css('border-color', '#30303050');                             
                    formdata.supplier_company = 0;
                    localStorage.setItem('formdata', JSON.stringify(formdata));
                    $('#seventh_item1 .checkbox1 label input[type="checkbox"]').prop("checked", false);
                    $('#seventh_item1 .checkbox1 label .cr .fas').css('opacity', '0');                      
                }   
                else{                                              
                    $('#seventh_item1').css('border-color', '#0289ff');
                    $('#seventh_item1 .checkbox1 label .cr').css('border-color', '#0289ff');                   
                    formdata.supplier_company = 1;
                    localStorage.setItem('formdata', JSON.stringify(formdata));
                    $('#seventh_item1 .checkbox1 label input[type="checkbox"]').prop("checked", true);
                    $('#seventh_item1 .checkbox1 label .cr .fas').css('opacity', '1');
                }
            })

            $('#seventh_item2').click(function(){
                if (($('#seventh_item2 .checkbox1 label input[type="checkbox"]').prop('checked'))) {                    
                    $('#seventh_item2').css('border-color', '#30303050');
                    $('#seventh_item2 .checkbox1 label .cr').css('border-color', '#30303050');                             
                    formdata.supplier_personal = 0;
                    localStorage.setItem('formdata', JSON.stringify(formdata));
                    $('#seventh_item2 .checkbox1 label input[type="checkbox"]').prop("checked", false);
                    $('#seventh_item2 .checkbox1 label .cr .fas').css('opacity', '0');                      
                }   
                else{                                              
                    $('#seventh_item2').css('border-color', '#0289ff');
                    $('#seventh_item2 .checkbox1 label .cr').css('border-color', '#0289ff');                   
                    formdata.supplier_personal = 1;
                    localStorage.setItem('formdata', JSON.stringify(formdata));
                    $('#seventh_item2 .checkbox1 label input[type="checkbox"]').prop("checked", true);
                    $('#seventh_item2 .checkbox1 label .cr .fas').css('opacity', '1');
                }
            })

            localStorage.setItem('formdata', JSON.stringify(formdata));
           
            
        
        })
    </script>
@endsection