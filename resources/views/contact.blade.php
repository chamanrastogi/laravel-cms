
<x-home-master title="Contact Us" :key="$temps->meta_key" :des="$temps->meta_des">

    @section('content')
    <div id="page-content" class="header-static">
        <!--  Slider  -->
        <div id="flexslider" class="fullpage-wrap small">
            <ul class="slides">
                <li style="background-image:url({{asset('/assets/img/contact.jpg')}});height: 260px !important;">
              
                    <div class="container text text-center">
                        <h1 class="white margin-bottom-small">Contact</h1>
                        
                    </div>
                    <div class="gradient dark"></div>
                </li>
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">Contact</li>
                </ol>
            </ul>
        </div>
        <!--  END Slider  -->
        <div id="page-wrap" class="content-section fullpage-wrap">
            <div class="row margin-leftright-null">
                <div class="container">
                    <!--  Contact Info  -->
                    <div class="col-md-6 padding-leftright-null">
                        <div class="text">
                            <h3 class="big margin-bottom-small title left">Get in touch </h3>
                           
                            <div class="padding-onlytop-md">
                                <p class="margin-bottom">{{$mo5->text}}</p>
                                <p><span class="contact-info">Address: <em>{{$mo3->text}}</em></span><br><span class="contact-info">Phone: <em><a href="tel:{{$mo1->text}}"><?=$mo1->text?></a></em></span><br><span class="contact-info">Email: <em><a href="tel:<?=$mo2->text?>">{{$mo2->text}}</em></a></span></p>
                            </div>
                        </div>
                    </div>
                    <!--  END Contact Info -->
                    <!--  Input Form  -->
                    <div class="col-md-6 padding-leftright-null">
                        <div class="text padding-onlybottom-sm padding-md-top-null">
                            @if(session()->has('type'))				  
			
			<div class="alert alert-{{@session('type')}}" role="alert">			
				{{@session('msg')}}			
			  </div>
			  @endif
			  @if(count($errors)>0)

			  <div class="alert alert-danger" role="alert">	
				  <ul>
					  @foreach($errors->all() as $er)
					  <li>{{$er}}</li>
					  @endforeach
				  </ul>
	
			  </div>
			  @endif
              {!! Form::open([
                'method' => 'Post',
                'route' => ['thanks'],
                'class' => 'padding-onlytop-md padding-md-topbottom-null',
                'id' =>  'contact-form'
            ]) !!}
                            

                                <div class="row">
                                    <div class="col-md-6">
                                        {!! Form::text('fname', $value = null, ['class' => 'form-field', 'placeholder' => 'First Name']) !!}
                                       
                                    </div>
                                    <div class="col-md-6">
                                        {!! Form::text('lname', $value = null, ['class' => 'form-field', 'placeholder' => 'Last Name']) !!}
                                        
                                    </div>
                                    <div class="col-md-12">
                                        {!! Form::email('email', $value = null, ['class' => 'form-field', 'placeholder' => 'Email']) !!}
                                    </div>
                                     <div class="col-md-12">
                                        {!! Form::text('phone', $value = null, ['class' => 'form-field', 'placeholder' => 'Mobile No']) !!}
                                       
                                    </div>
                                    <div class="col-md-12">
                                        
                                        {!! Form::text('subject', $value = null, ['class' => 'form-field', 'placeholder' => 'Subject']) !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        {!! Form::textarea('msg', $value = null, ['class' => 'form-field', 'placeholder' => 'Your Message']) !!}  
                                        
                                        <div class="submit-area padding-onlytop-sm">
                                           
                                            {!! Form::submit('Send Message', ['id'=>'submitcontact','name'=>'submit','class' => 'btn-alt'] ) !!}
                                            <div id="msg" class="message"></div>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close()  !!}
                        </div>
                    </div>
                    <!--  END Input Form  -->
                </div>
            </div>
            <div class="row margin-leftright-null">
                <!--  Map. Settings in assets/js/maps.js  -->
                <div class="col-md-12 padding-leftright-null">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.26868841193!2d-105.03328668520022!3d19.44397904535532!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x84249d89b38a931d%3A0x6eff29cd9738c5d5!2sCosta%20Careyes%2C%20Jalisco!5e0!3m2!1sen!2sin!4v1607203552273!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <!--  END Map  -->
            </div>
        </div>
    </div>
    @endsection
    </x-home-master>
    