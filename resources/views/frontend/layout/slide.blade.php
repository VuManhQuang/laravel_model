
<div id="amazingslider">
                          <ul class="amazingslider-slides">
                            <li>
                                <div id="visual">
                                    <div class="viewport">
                                    <div class="overview">
                                    <ul>
                    @foreach($slide as $getslide)

            <li><p><a  href="{{ $getslide['link'] }}"><img class="anhresponsive"  src="{{ url('resources/upload/slide')}}/{{ $getslide['anh'] }}" ></a></p></li>

                    @endforeach
           
                                    </ul>
                                    </div><!-- .overview -->
                             
                                    </div><!-- .viewport -->
                                </div><!-- #visual -->
                                                                </li>
                          </ul>
                          



</div>









 
                        



