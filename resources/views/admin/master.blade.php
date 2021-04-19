
@extends('layouts.admin')

@section('admin_body')
<section>
            
            <!-- Sidebar Area-->
    @include('admin.includes.sidebar')
                <!-- body content start-->
                <div class="body-content">
                   <!-- Hader Area-->
                   @include('admin.includes.header')
                    <div class="container-fluid">
                        @yield('master_content')           
                        
                    </div><!--end container-->
    
                    <!--footer section start-->
                    <footer class="footer">
                        Develop By MD.Fakrul Islam <a href="https://www.facebook.com/fakrulislam53935" class="link"  target="_blank">Follow Me</a> 
                    </footer>
                    <!--footer section end-->
    
                </div>
                <!--end body content-->
            </section>

@stop