<?php
            $temp=App\Template::find(1);            
            ?>
<header id="header" class="fixed transparent full-width">
    <div class="container">
        <nav class="navbar navbar-default white">
            <!--  Header Logo  -->
            <div id="logo">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{ $temp->logo_path() }}" class="normal" alt="logo">
                    <img src="{{ $temp->logo_path() }}" class="retina" alt="logo">
                    <img src="{{ $temp->logo_path() }}" class="normal white-logo" alt="logo">
                    <img src="{{ $temp->logo_path() }}" class="retina white-logo" alt="logo">
                </a>
            </div>
            <!--  END Header Logo  -->
            <!--  Classic menu, responsive menu classic  -->
            <div id="sidemenu">
                <div class="menu-holder">
                    <?php
                    $menu =Harimayco\Menu\Models\Menus::where('id', 1)->with('items')->first();
                    $data = $menu->items;         
                    ?>  
                        
@if($data)
<ul class="menu">
    <li class="nav-item">
        <a href="{{url('/')}}">Home</a>
     </li>   
@foreach($data as $menu)
<li class="">
    <a href="{{ url($menu['class'].$menu['link']) }}" title="">{{ $menu['label'] }}</a>
    @if( $menu['child'] )
    <ul class="sub-menu">
        @foreach( $menu['child'] as $child )
            <li class=""><a href="{{ url($child['link']) }}" title="">{{ $child['label'] }}</a></li>
        @endforeach
    </ul><!-- /.sub-menu -->
    @endif
</li>
@endforeach
@endif
@if(Auth::check())
<li class="nav-item">
    <a  href="{{url('/admin')}}" target="_blank">Admin</a>
 </li>  
@endif
</ul><!-- /.menu -->
                </div>
            </div>
            <!--  END Classic menu, responsive menu classic  -->
            <!--  Button for Responsive Menu Classic  -->
            <div id="menu-responsive-sidemenu">
                <div class="menu-button">
                    <span class="bar bar-1"></span>
                    <span class="bar bar-2"></span>
                    <span class="bar bar-3"></span>
                </div>
            </div>
            <!--  END Button for Responsive Menu Classic  -->
        </nav>
    </div>
</header>