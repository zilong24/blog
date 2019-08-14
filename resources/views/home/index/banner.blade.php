<div class="picsbox"> 
  <div class="banner">
    <div id="banner" class="fader">
      @foreach($banners as $k=>$v)
      <li class="slide" ><a href="{{$v->url}}" target="_blank"><img src="/uploads/{{$v->profile}}"><span class="imginfo">{{$v->title}}</span></a></li>
      @endforeach
      <div class="fader_controls">
        <div class="page prev" data-target="prev">&lsaquo;</div>
        <div class="page next" data-target="next">&rsaquo;</div>
        <ul class="pager_list">
        </ul>
      </div>
    </div>
  </div>
