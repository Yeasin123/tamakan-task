
    <div class="catagory-sidebar-area">
        <div class="catagory-sidebar-area-inner">
            <div class="catagory-sidebar all-catagory-option">
                <ul class="cat_menu">
                    @foreach (App\Models\Category::orderBy('id','desc')->get() as $maincate)
                    <li class="hassubs">
                        <a href="{{route('maincatproduct',$maincate->name)}}">{{$maincate->name}}</a>
                        
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
