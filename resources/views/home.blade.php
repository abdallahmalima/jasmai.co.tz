@extends('layouts.apps')

@section('content')

    <!-- end header -->
    <section id="featured">
      <!-- start slider -->
      <!-- Slider -->
      <div id="nivo-slider">
        <div class="nivo-slider">
          <!-- Slide #1 image -->
          @foreach($headers as  $key=>$header)
           <img src="{{ asset($header->image) }}" alt="" title="#caption-{{++$key}}" />
          @endforeach
          
        </div>
        <div class="container">
          <div class="row">
            <div class="span12">
              <!-- Slide #1 caption -->
              @foreach($headers as  $key=>$header)
              <div class="nivo-caption" id="caption-{{++$key}}">
                <div>
                  <h2><strong>{{ $header->title }}</strong></h2>
                  <p>
                     {{ $header->description }}
                
                  </p>
                  <a href="#" class="btn btn-theme">Read More</a>
                </div>
              </div>
              @endforeach  
              
            </div>
          </div>
        </div>
      </div>
      <!-- end slider -->
    </section>
    <section class="callaction">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="big-cta">
              <div class="cta-text">
                <h3>We've done more than <span class="highlight"><strong>5000 Design</strong></span> this year!</h3>
              </div>
              <div class="cta floatright">
                <a class="btn btn-large btn-theme btn-rounded" href="#">Request a quote</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="row">
            @foreach($categories as $category)
              <div class="span3">
                <div class="box aligncenter">
                  <div class="aligncenter icon">
                   <!-- <i class="icon-briefcase icon-circled icon-64 active"></i>-->
                    <img src="{{asset($category->image)}}" alt="cat1"/>
                  </div>
                  <div class="text">
                    <h6>{{$category->title}}</h6>
                    <p>
                       {{$category->description}}
                    </p>
                    <a href="{{ route('category_details')}}">Learn more</a>
                  </div>
                </div>
              </div>
            @endforeach
           
            </div>
          </div>
        </div>
        <!-- divider -->
        <div class="row">
          <div class="span12">
            <div class="solidline">
            </div>
          </div>
        </div>
        <!-- end divider -->
        <!-- Portfolio Projects -->
        <div class="row">
          <div class="span12">
            <h4 class="heading">Some of recent <strong>works</strong></h4>
            <div class="row">
              <section id="projects">
                <ul id="thumbs" class="portfolio">
                  <!-- Item Project and Filter Name -->
                  @foreach($works as  $key=>$work)
                  <li class="item-thumbs span3 design" data-id="id-{{$key++}}" data-type="web">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The City" href="{{asset($work->image)}}">
                    <span class="overlay-img"></span>
                    <span class="overlay-img-thumb font-icon-plus"></span>
                    </a>
                    <!-- Thumb Image and Description -->
                    <img src="{{asset($work->image)}}"  alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                  </li>
                  @endforeach
                  <li>
                <a class="text-center" href="{{ route('portfolio')}}">
					<h5><span class="highlight">View All</span></h5>
					</a>
              </li>
                  <!-- End Item Project -->
                </ul>
              </section>
            </div>
          </div>
        </div>
        <!-- End Portfolio Projects -->
        <!-- divider -->
        <div class="row">
          <div class="span12">
            <div class="solidline">
            </div>
          </div>
        </div>
        <!-- end divider -->
        <div class="row">
          <div class="span12">
            <h4>Very satisfied <strong>clients</strong></h4>
            <ul id="mycarousel" class="jcarousel-skin-tango recent-jcarousel clients">

            @foreach($clients as $client)
              <li>
                <a href="#">
					        <img src="{{asset($client->image)}}" class="client-logo" alt="" />
					      </a>
              </li>
              @endforeach
             
              
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="bottom">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="aligncenter">
              <div id="twitter-wrapper">
                <div id="twitter">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
   
  @endsection