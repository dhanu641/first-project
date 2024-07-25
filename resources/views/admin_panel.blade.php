<!DOCTYPE html>
<html lang="en">
<head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Document</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
                <style>
                    /* The side navigation menu */
            .sidenav {
            height: 100%; /* 100% Full-height */
            width: 0; /* 0 width - change this with JavaScript */
            position: fixed; /* Stay in place */
            z-index: 1; /* Stay on top */
            top: 0; /* Stay at the top */
            left: 0;
            background-color: #5ce99c; /* Black*/
            overflow-x: hidden; /* Disable horizontal scroll */
            padding-top: 60px; /* Place content 60px from the top */
            transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
            }

            /* The navigation menu links */
            .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
            }

            /* When you mouse over the navigation links, change their color */
            .sidenav a:hover {
            color: #f1f1f1;
            }

            /* Position and style the close button (top right corner) */
            .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
            }

            /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
            #main {
            transition: margin-left .5s;
            padding: 20px;
            padding-left: 250px;
            }

            /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
            @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
            }
                </style>
            </head>
            <body>
                <div id="mySidenav" class="sidenav" style="width: 250px;">
                    <h1>Admin Panel</h1>
                    {{-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> --}}
                    <a href="#">Category</a>
                    <ul class="ms-5 ">
                        <li><a href="{{route('category.index')}}">--view all</a></li>
                        <li><a href="{{route('category.create')}}">--create</a></li>
                    </ul>
                    <a href="#">Products</a>
                    <ul class="ms-5 ">
                        <li><a href="{{route('products.index')}}">--view all</a></li>
                        <li><a href="{{route('products.create')}}">--create</a></li>
                    </ul>
                </div>
                
                
                
                <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
                <div id="main">
                    @yield('content')
                    <!-- Use any element to open the sidenav -->
                {{-- <span onclick="openNav()">open</span> --}}
                </div>
                @stack('scripts')
                <script>
                    /* Set the width of the side navigation to 250px */
                    function openNav() {
                    document.getElementById("mySidenav").style.width = "250px";
                    }

                    /* Set the width of the side navigation to 0 */
                    function closeNav() {
                    document.getElementById("mySidenav").style.width = "0";
                    }

                </script>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
                
            </body>
            </html>