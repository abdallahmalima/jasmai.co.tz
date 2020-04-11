@extends('layouts.apps')

@section('content')
<section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="inner-heading">
              <h2>Category Detail</h2>
            </div>
          </div>
          <div class="span8">
            <ul class="breadcrumb">
              <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
              <li><a href="#">Category</a><i class="icon-angle-right"></i></li>
              <li class="active">Category Detail</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">
            <article>
              <div class="top-wrapper">
                <div class="post-heading">
                  <h3><a href="#">This is an example of category detail</a></h3>
                </div>
                <!-- start flexslider -->
                <div class="flexslider">
                  <ul class="slides">
                    <li>
                      <img src="app/img/works/full/image-01-full.jpg" alt="" />
                    </li>
                    <li>
                      <img src="app/img/works/full/image-02-full.jpg" alt="" />
                    </li>
                    <li>
                      <img src="app/img/works/full/image-03-full.jpg" alt="" />
                    </li>
                  </ul>
                </div>
                <!-- end flexslider -->
              </div>
              <p>
                Qui ut ceteros comprehensam. Cu eos sale sanctus eligendi, id ius elitr saperet, ocurreret pertinacia pri an. No mei nibh consectetuer, semper laoreet perfecto ad qui, est rebum nulla argumentum ei. Fierent adipisci iracundia est ei, usu timeam persius
                ea. Usu ea justo malis, pri quando everti electram ei, ex homero omittam salutatus sed.
              </p>
            </article>
          </div>
          <div class="span4">
            <aside class="right-sidebar">
              <div class="widget">
                <h5 class="widgetheading">Category information</h5>
                <ul class="cat">
                  <li><i class="icon-angle-right"></i><a href="#">Web design</a><span> (20)</span></li>
                  <li><i class="icon-angle-right"></i><a href="#">Online business</a><span> (11)</span></li>
                  <li><i class="icon-angle-right"></i><a href="#">Marketing strategy</a><span> (9)</span></li>
                  <li><i class="icon-angle-right"></i><a href="#">Technology</a><span> (12)</span></li>
                  <li><i class="icon-angle-right"></i><a href="#">About finance</a><span> (18)</span></li>
                </ul>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Text widget</h5>
                <p>
                  Lorem ipsum dolor sit amet, unum suscipiantur te cum, vide magna ea eam. At eos wisi tractatos temporibus. Ne has omnis harum. Ei mea graece delenit nominati. Ut dolore albucius torquatos vel, choro gubergren no mel.
                </p>
              </div>
            </aside>
          </div>
        </div>
      </div>
    </section>
    @endsection