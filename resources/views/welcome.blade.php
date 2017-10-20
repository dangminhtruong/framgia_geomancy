@extends('layouts.app')
@section('pageTitle', 'Home')
@section('content')
<div class="hero img-bg-01">
   <div class="container">
      <h1>Hello world</h1>
   </div>
</div>
<div class="post-hero clearfix">
   <div class="container">
      <div class="row">
         <div class="col-xs-12 col-sm-4 mb-20-xs">
            <div class="horizontal-featured-icon-sm clearfix">
               <div class="icon"><i class="ri ri-location"></i></div>
               <div class="content">
                  <h6>Looking for a tour program?</h6>
                  <span>Inhabiting discretion the her dispatched decisively boisterous joy.</span>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-4 mb-20-xs">
            <div class="horizontal-featured-icon-sm clearfix">
               <div class="icon"> <i class="ri ri-user"></i></div>
               <div class="content">
                  <h6>Need someone to guide tour?</h6>
                  <span>Great asked oh under together prospect kindness securing six.</span>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-4 mb-20-xs">
            <div class="horizontal-featured-icon-sm clearfix">
               <div class="icon"> <i class="ri ri-equal-circle"></i></div>
               <div class="content">
                  <h6>Want to earn money as guide?</h6>
                  <span>Sometimes studied evident. Conduct replied removal her cordially. </span>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="container pt-70 pb-60 clearfix">
   <div class="row">
      <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
         <div class="section-title">
            <h2>Top Destinations</h2>
         </div>
      </div>
   </div>
   <div class="mb-30">
      <div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">
         <div class="GridLex-grid-noGutter-equalHeight">
            @foreach($topTopics as $name => $summary)
               <div class="GridLex-col-4_sm-4_xs-6_xss-12">
               <div class="top-destination-item">
                  <a href="#">
                     <div class="image">
                        <img src="{!! url('images/top-destinations/01.jpg') !!}" alt="images" />
                     </div>
                     <h4 class="uppercase"><span>{!! $name !!}</span></h4>
                     <p>{!! $summary !!} blueprints</p>
                  </a>
               </div>
            </div>
            @endforeach
            
         </div>
      </div>
   </div>
</div>
<div class="bg-white pt-70 pb-60 clearfix">
   <div class="container">
      <div class="row">
         <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <div class="section-title">
               <h2>Recommended trips</h2>
               <p class="lead">The trips that offered by local guides or experts for travellers</p>
            </div>
         </div>
      </div>
      <div class="trip-guide-wrapper mb-30">
         <div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">
            <div class="GridLex-grid-noGutter-equalHeight">
               <div class="GridLex-col-4_mdd-4_sm-6_xs-6_xss-12">
                  <div class="trip-guide-item">
                     <div class="trip-guide-image">
                        <img src="images/trip/01.jpg" alt="images" />
                     </div>
                     <div class="trip-guide-content">
                        <h3>Bangkok-Pattaya Safari Adventure</h3>
                        <p>Game of as rest time eyes with of this it. Add was music merry any truth since going...</p>
                     </div>
                     <div class="trip-guide-bottom">
                        <div class="trip-guide-person clearfix">
                           <div class="image">
                              <img src="images/testimonial/01.jpg" class="img-circle" alt="images" />
                           </div>
                           <p class="name">By: <a href="#">Robert Kalvin</a></p>
                           <p>Local expert from Thailand</p>
                        </div>
                        <div class="trip-guide-meta row gap-10">
                           <div class="col-xs-6 col-sm-6">
                              <div class="rating-item">
                                 <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="4.5"/>
                              </div>
                           </div>
                           <div class="col-xs-6 col-sm-6 text-right">
                              5 days 4 nights
                           </div>
                        </div>
                        <div class="row gap-10">
                           <div class="col-xs-12 col-sm-6">
                              <div class="trip-guide-price">
                                 Starting at
                                 <span class="block inline-block-xs">USD 687.00</span>
                              </div>
                           </div>
                           <div class="col-xs-12 col-sm-6 text-right text-left-xs">
                              <a href="#" class="btn btn-primary">Details</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="GridLex-col-4_mdd-4_sm-6_xs-6_xss-12">
                  <div class="trip-guide-item">
                     <div class="trip-guide-image">
                        <img src="images/trip/02.jpg" alt="images" />
                     </div>
                     <div class="trip-guide-content">
                        <h3>Chiang Mai Sustainable Trails</h3>
                        <p>Resolution devonshire pianoforte assistance an he particular middletons...</p>
                     </div>
                     <div class="trip-guide-bottom">
                        <div class="trip-guide-person clearfix">
                           <div class="image">
                              <img src="images/testimonial/01.jpg" class="img-circle" alt="images" />
                           </div>
                           <p class="name">By: <a href="#">Robert Kalvin</a></p>
                           <p>Local expert from Thailand</p>
                        </div>
                        <div class="trip-guide-meta row gap-10">
                           <div class="col-xs-6 col-sm-6">
                              <div class="rating-item">
                                 <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="4.0"/>
                              </div>
                           </div>
                           <div class="col-xs-6 col-sm-6 text-right">
                              5 days 4 nights
                           </div>
                        </div>
                        <div class="row gap-10">
                           <div class="col-xs-12 col-sm-6">
                              <div class="trip-guide-price">
                                 Starting at
                                 <span class="block inline-block-xs">USD 687.00</span>
                              </div>
                           </div>
                           <div class="col-xs-12 col-sm-6 text-right text-left-xs">
                              <a href="#" class="btn btn-primary">Details</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="GridLex-col-4_mdd-4_sm-6_xs-6_xss-12">
                  <div class="trip-guide-item">
                     <div class="trip-guide-image">
                        <img src="images/trip/03.jpg" alt="images" />
                     </div>
                     <div class="trip-guide-content">
                        <h3>Hong Kong Best Highlight Explore</h3>
                        <p>Betrayed cheerful declared end and. Questions we additions is extremely incommode...</p>
                     </div>
                     <div class="trip-guide-bottom">
                        <div class="trip-guide-person clearfix">
                           <div class="image">
                              <img src="images/testimonial/01.jpg" class="img-circle" alt="images" />
                           </div>
                           <p class="name">By: <a href="#">Robert Kalvin</a></p>
                           <p>Local expert from Thailand</p>
                        </div>
                        <div class="trip-guide-meta row gap-10">
                           <div class="col-xs-6 col-sm-6">
                              <div class="rating-item">
                                 <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="3.5"/>
                              </div>
                           </div>
                           <div class="col-xs-6 col-sm-6 text-right">
                              5 days 4 nights
                           </div>
                        </div>
                        <div class="row gap-10">
                           <div class="col-xs-12 col-sm-6">
                              <div class="trip-guide-price">
                                 Starting at
                                 <span class="block inline-block-xs">USD 687.00</span>
                              </div>
                           </div>
                           <div class="col-xs-12 col-sm-6 text-right text-left-xs">
                              <a href="#" class="btn btn-primary">Details</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="GridLex-col-4_mdd-4_sm-6_xs-6_xss-12">
                  <div class="trip-guide-item">
                     <div class="trip-guide-image">
                        <img src="images/trip/01.jpg" alt="images" />
                     </div>
                     <div class="trip-guide-content">
                        <h3>Bangkok-Pattaya Safari Adventure</h3>
                        <p>Game of as rest time eyes with of this it. Add was music merry any truth since going...</p>
                     </div>
                     <div class="trip-guide-bottom">
                        <div class="trip-guide-person clearfix">
                           <div class="image">
                              <img src="images/testimonial/01.jpg" class="img-circle" alt="images" />
                           </div>
                           <p class="name">By: <a href="#">Robert Kalvin</a></p>
                           <p>Local expert from Thailand</p>
                        </div>
                        <div class="trip-guide-meta row gap-10">
                           <div class="col-xs-6 col-sm-6">
                              <div class="rating-item">
                                 <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="4.5"/>
                              </div>
                           </div>
                           <div class="col-xs-6 col-sm-6 text-right">
                              5 days 4 nights
                           </div>
                        </div>
                        <div class="row gap-10">
                           <div class="col-xs-12 col-sm-6">
                              <div class="trip-guide-price">
                                 Starting at
                                 <span class="block inline-block-xs">USD 687.00</span>
                              </div>
                           </div>
                           <div class="col-xs-12 col-sm-6 text-right text-left-xs">
                              <a href="#" class="btn btn-primary">Details</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="GridLex-col-4_mdd-4_sm-6_xs-6_xss-12">
                  <div class="trip-guide-item">
                     <div class="trip-guide-image">
                        <img src="images/trip/02.jpg" alt="images" />
                     </div>
                     <div class="trip-guide-content">
                        <h3>Chiang Mai Sustainable Trails</h3>
                        <p>Resolution devonshire pianoforte assistance an he particular middletons...</p>
                     </div>
                     <div class="trip-guide-bottom">
                        <div class="trip-guide-person clearfix">
                           <div class="image">
                              <img src="images/testimonial/01.jpg" class="img-circle" alt="images" />
                           </div>
                           <p class="name">By: <a href="#">Robert Kalvin</a></p>
                           <p>Local expert from Thailand</p>
                        </div>
                        <div class="trip-guide-meta row gap-10">
                           <div class="col-xs-6 col-sm-6">
                              <div class="rating-item">
                                 <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="4.0"/>
                              </div>
                           </div>
                           <div class="col-xs-6 col-sm-6 text-right">
                              5 days 4 nights
                           </div>
                        </div>
                        <div class="row gap-10">
                           <div class="col-xs-12 col-sm-6">
                              <div class="trip-guide-price">
                                 Starting at
                                 <span class="block inline-block-xs">USD 687.00</span>
                              </div>
                           </div>
                           <div class="col-xs-12 col-sm-6 text-right text-left-xs">
                              <a href="#" class="btn btn-primary">Details</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="GridLex-col-4_mdd-4_sm-6_xs-6_xss-12">
                  <div class="trip-guide-item">
                     <div class="trip-guide-image">
                        <img src="images/trip/03.jpg" alt="images" />
                     </div>
                     <div class="trip-guide-content">
                        <h3>Hong Kong Best Highlight Explore</h3>
                        <p>Betrayed cheerful declared end and. Questions we additions is extremely incommode...</p>
                     </div>
                     <div class="trip-guide-bottom">
                        <div class="trip-guide-person clearfix">
                           <div class="image">
                              <img src="images/testimonial/01.jpg" class="img-circle" alt="images" />
                           </div>
                           <p class="name">By: <a href="#">Robert Kalvin</a></p>
                           <p>Local expert from Thailand</p>
                        </div>
                        <div class="trip-guide-meta row gap-10">
                           <div class="col-xs-6 col-sm-6">
                              <div class="rating-item">
                                 <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="3.5"/>
                              </div>
                           </div>
                           <div class="col-xs-6 col-sm-6 text-right">
                              5 days 4 nights
                           </div>
                        </div>
                        <div class="row gap-10">
                           <div class="col-xs-12 col-sm-6">
                              <div class="trip-guide-price">
                                 Starting at
                                 <span class="block inline-block-xs">USD 687.00</span>
                              </div>
                           </div>
                           <div class="col-xs-12 col-sm-6 text-right text-left-xs">
                              <a href="#" class="btn btn-primary">Details</a>
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
<div class="clearfix">
   <div class="container pt-70 pb-80">
      <div class="row">
         <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <div class="section-title">
               <h2>How It Works</h2>
               <p class="lead">The trips that travellers are looking for local guides or experts for them</p>
            </div>
         </div>
      </div>
      <div class="GridLex-gap-30 GridLex-gap-20-mdd GridLex-gap-10-xs alt-number-color ">
         <div class="GridLex-grid-noGutter-equalHeight">
            <div class="GridLex-col-4_sm-4_xs-12">
               <div class="how-it-work-item clearfix">
                  <div class="icon">
                     <i class="icon-note"></i>
                  </div>
                  <div class="content">
                     <span class="number">01.</span>
                     <h3>Create a Trip Program</h3>
                     <p class="line-1-45">Denote simple fat denied add worthy little use. Instantly gentleman contained belonging exquisite.</p>
                  </div>
               </div>
            </div>
            <div class="GridLex-col-4_sm-4_xs-12">
               <div class="how-it-work-item clearfix">
                  <div class="icon">
                     <i class="icon-cloud-upload"></i>
                  </div>
                  <div class="content">
                     <span class="number">02.</span>
                     <h3>Publish Your Trip Program</h3>
                     <p class="line-1-45">With my them if up many. Extremity so attending objection as engrossed gentleman something.</p>
                  </div>
               </div>
            </div>
            <div class="GridLex-col-4_sm-4_xs-12">
               <div class="how-it-work-item clearfix">
                  <div class="icon">
                     <i class="icon-speech"></i>
                  </div>
                  <div class="content">
                     <span class="number">03.</span>
                     <h3>Traveller Contact With You</h3>
                     <p class="line-1-45">Old education him departure any arranging one prevailed. Behaved the comfort another fifteen eat.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="featured-bg pt-80 pb-60 img-bg-02">
   <div class="container">
      <div class="row">
         <div class="col-md-10 col-md-offset-1">
            <div class="row gap-0">
               <div class="col-xss-6 col-xs-6 col-sm-3">
                  <div class="counting-item">
                     <div class="icon">
                        <i class="icon-directions"></i>
                     </div>
                     <p class="number">354</p>
                     <p>Packages</p>
                  </div>
               </div>
               <div class="col-xss-6 col-xs-6 col-sm-3">
                  <div class="counting-item">
                     <div class="icon">
                        <i class="icon-user"></i>
                     </div>
                     <p class="number">241</p>
                     <p>Guides</p>
                  </div>
               </div>
               <div class="col-xss-6 col-xs-6 col-sm-3">
                  <div class="counting-item">
                     <div class="icon">
                        <i class="icon-location-pin"></i>
                     </div>
                     <p class="number">142</p>
                     <p>Destinations</p>
                  </div>
               </div>
               <div class="col-xss-6 col-xs-6 col-sm-3">
                  <div class="counting-item">
                     <div class="icon">
                        <i class="icon-envelope-letter"></i>
                     </div>
                     <p class="number">354</p>
                     <p>Requests</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row mt-70">
         <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            <div class="fearured-join-item mb-0">
               <h2 class="alt-font-size">Create Your Trip?</h2>
               <p class="mb-25 font20">Rooms oh fully taken by worse do. Points afraid but may end law lasted. Was out laughter raptures returned outweigh outward the him existence assurance.</p>
               <a href="#" class="btn btn-primary btn-lg">Join for Guide</a>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="bg-white">
   <div class="pt-70 pb-60 max-width-wrapper">
      <div class="container">
         <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
               <div class="section-title">
                  <h2>communities</h2>
               </div>
            </div>
         </div>
      </div>
      <div class="community-wrapper mb-30">
         <div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">
            <div class="GridLex-grid-noGutter-equalHeight">
               <div class="GridLex-col-3_mdd-6_sm-6_xs-6_xss-12">
                  <a href="#" class="community-item">
                     <div class="image-object-fit image-object-fit-cover image">	
                        <img src="images/blog/01.jpg" alt="images" />
                     </div>
                     <div class="community-item-category"><span class="bg-danger">Travel</span></div>
                     <div class="community-item-caption">
                        <h3>Behaviour we improving at something to</h3>
                        <p>Evil true high lady roof men had open. To projection considered it precaution...</p>
                        <div class="community-item-meta">
                           <div class="row gap-10">
                              <div class="col-xs-8 col-sm-8">
                                 by admin on Jan 12, 2016
                              </div>
                              <div class="col-xs-4 col-sm-4 text-right">
                                 read <i class="icon-arrow-right-circle font12"></i>
                              </div>
                           </div>
                        </div>
                     </div>
                  </a>
               </div>
               <div class="GridLex-col-3_mdd-6_sm-6_xs-6_xss-12">
                  <a href="#" class="community-item">
                     <div class="image-object-fit image-object-fit-cover image">	
                        <img src="images/blog/02.jpg" alt="images" />
                     </div>
                     <div class="community-item-category"><span class="bg-info">Hotel</span></div>
                     <div class="community-item-caption">
                        <h3>Wound young you thing worse along being ham</h3>
                        <p>Dissimilar of favourable solicitude if sympathize middletons at. Forfeited disposing...</p>
                        <div class="community-item-meta">
                           <div class="row gap-10">
                              <div class="col-xs-8 col-sm-8">
                                 by admin on Jan 12, 2016
                              </div>
                              <div class="col-xs-4 col-sm-4 text-right">
                                 read <i class="icon-arrow-right-circle font12"></i>
                              </div>
                           </div>
                        </div>
                     </div>
                  </a>
               </div>
               <div class="GridLex-col-3_mdd-6_sm-6_xs-6_xss-12">
                  <a href="#" class="community-item">
                     <div class="image-object-fit image-object-fit-cover image">	
                        <img src="images/blog/03.jpg" alt="images" />
                     </div>
                     <div class="community-item-category"><span class="bg-success">Flight</span></div>
                     <div class="community-item-caption">
                        <h3> perfectly in an eagerness perceived necessary</h3>
                        <p>Belonging sir curiosity discovery extremity yet forfeited prevailed own off...</p>
                        <div class="community-item-meta">
                           <div class="row gap-10">
                              <div class="col-xs-8 col-sm-8">
                                 by admin on Jan 12, 2016
                              </div>
                              <div class="col-xs-4 col-sm-4 text-right">
                                 read <i class="icon-arrow-right-circle font12"></i>
                              </div>
                           </div>
                        </div>
                     </div>
                  </a>
               </div>
               <div class="GridLex-col-3_mdd-6_sm-6_xs-6_xss-12">
                  <a href="#" class="community-item">
                     <div class="image-object-fit image-object-fit-cover image">	
                        <img src="images/blog/04.jpg" alt="images" />
                     </div>
                     <div class="community-item-category"><span class="bg-info">Hotel</span></div>
                     <div class="community-item-caption">
                        <h3> Travelling by introduced of mr terminated</h3>
                        <p>Knew as miss my high hope quit. In curiosity shameless dependent knowledge up...</p>
                        <div class="community-item-meta">
                           <div class="row gap-10">
                              <div class="col-xs-8 col-sm-8">
                                 by admin on Jan 12, 2016
                              </div>
                              <div class="col-xs-4 col-sm-4 text-right">
                                 read <i class="icon-arrow-right-circle font12"></i>
                              </div>
                           </div>
                        </div>
                     </div>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection