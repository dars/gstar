<div id="productMenu">
  <img src="{{ asset('assets/frontend/images/menu_title.gif') }}" />
  @if($menu)
  <ul class="accordion">
    @foreach($menu as $t)
      <li><a href="#" id="taxo1_a_{{ $t['id'] }}">{{ $t['name'] }}</a>
        @if($t['child'])
          <ul id="taxo1_{{ $t['id'] }}">
          @foreach($t['child'] as $t2)
            <li><a href="#">{{ $t2['name'] }}</a></li>
          @endforeach
          </ul>
        @endif
      </li>
    @endforeach
  </ul>
  @endif
</div>
