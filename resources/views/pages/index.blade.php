@extends('layouts.app')


@section('content-index')
        <header class="masthead" id="home">
            <div class="container">
                <div class="masthead-subheading">WELCOME TO</div>
                <div class="masthead-heading text-uppercase">B4-BLOG <i class="fas fa-feather-alt"></i></div>
                <a class="btn btn-danger btn-xl text-uppercase js-scroll-trigger btn-color" href="https://localhost/dbms/BlogProject/public/posts/"><i class="fas fa-book-reader"></i> Read</a>
            </div>
        </header>

        <section class="jumbotron junmbotron-fluid mt-4 mb-0">
            <div class="container content ">
                <div class="left-content">
                    <h1>Create a Blog<br> Worth Sharing</h1>
                    <h5>Bring your ideas to life by writing and managing your blog<br> whenever inspiration strikes, on your desktop or on the go.</h5>
                    <a href="https://localhost/dbms/BlogProject/public/posts/create"><button class="btn btn-dark mb-4" ><i class="far fa-edit"></i> Create Blog</button></a>
                </div>
                <div class="right-content">
                    <img src="https://localhost/dbms/BlogProject/public/img/blog.png">
                </div>
            </div>
        </section>


        <footer class="">
            <div class="container">
                <div class="toprow">
                    <a class="" href="https://localhost/dbms/BlogProject/public/home">Home</a>
                    <a class="" href="https://localhost/dbms/BlogProject/public/services">Services</a>
                    <a class="" href="https://localhost/dbms/BlogProject/public/about">About</a>
                    <a class="" href="https://localhost/dbms/BlogProject/public/posts">Blog</a>
                </div>
                <div class="midrow">
                    Copyright &copy; B4BLOG 2020
                </div>
                <div class="lastrow">
                    <a class="btn btn-dark btn-social mx-2 mb-2" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2 mb-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2 mb-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="contactidetail">
                    <i class="fas fa-mobile contact"></i> +91-1234567890
                    <i class="fas fa-mobile contact"></i> abcd1234@gmail.com 
                    <i class="fas fa-map-marked-alt contact"></i> 120 B 12th St oh-12
                </div>
                
            </div>
        </footer>


@endsection 