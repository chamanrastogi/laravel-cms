<div class="navigation">
    <h5 class="title">Navigation</h5>
    <!-- /.title -->
    <ul class="menu js__accordion">
        <li>
            <a class="waves-effect" href="{{url('admin')}}"><i class="menu-icon ti-dashboard"></i><span>Dashboard</span></a>
        </li>
       <?php
     //  dd(auth()->user()->roles->first()->slug);
       ?>
       
        @can('isAdmin')        
		<x-admin.sidebar.admin-sidebar-menu></x-admin-sidebar-menu>		
        <x-admin.sidebar.admin-sidebar-page></x-admin-sidebar-page>
        <x-admin.sidebar.admin-sidebar-module></x-admin-sidebar-module>	
        <x-admin.sidebar.admin-sidebar-gallery></x-admin-sidebar-gallery>
        <x-admin.sidebar.admin-sidebar-slider></x-admin-sidebar-slider>
		<x-admin.sidebar.admin-sidebar-testimonial></x-admin-sidebar-testimonial>	
		<x-admin.sidebar.admin-sidebar-social></x-admin-sidebar-social>	
		<x-admin.sidebar.admin-sidebar-user></x-admin-sidebar-user>
        <x-admin.sidebar.admin-sidebar-role></x-admin-sidebar-role>
        <x-admin.sidebar.admin-sidebar-permission></x-admin-sidebar-permission> 
        <x-admin.sidebar.admin-sidebar-user></x-admin-sidebar-user>       
            @elsecan('isManager')                
        <x-admin.sidebar.admin-sidebar-menu></x-admin-sidebar-menu>		
            <x-admin.sidebar.admin-sidebar-page></x-admin-sidebar-page>
            <x-admin.sidebar.admin-sidebar-module></x-admin-sidebar-module>	
            <x-admin.sidebar.admin-sidebar-gallery></x-admin-sidebar-gallery>
            <x-admin.sidebar.admin-sidebar-slider></x-admin-sidebar-slider>
                @else
                User
              @endcan
    </ul>
   
    
    <!-- /.menu js__accordion -->
</div>