<div class="ui borderless main menu">
    <div class="ui grid container">
        <div class="four wide column">
            <div class="item">
                <a href="{{route('home')}}">
                    <img class="ui iamge logo"  src="{{asset('img/brand.png')}}">
                </a>
            </div>
        </div>
        <div class="eight wide column">
            <div class="item searchItem">
                <div class="ui input icon">
                    <input type="text" placeholder="Search">
                    <i class="search icon"></i>
              </div>
            </div>
        </div>
        <div class="four wide column">
            <div class="item">
                <a class="item" href="{{route('home')}}">
                    <i class="big safari icon"></i>
                </a>
                <a class="item" href="{{route('home')}}">
                    <i class="big empty heart icon"></i>
                </a>
                <a class="item" href="{{route('home')}}">
                    <i class="big user outline icon"></i>
                </a>

                <a class="item" href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="big sign out icon"></i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</div>