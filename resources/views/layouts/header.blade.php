<div class="header">
    <nav class="navbar navbar-expand-sm navbar-blue">
        <div class="container-fluid">
            <a class="navbar-brand" href="">Childgram</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item">
                            {{link_to_route('login','Login')}}
                        </li>
                        <li class="nav-item">
                            {{link_to_route('register','Register')}}
                        </li>
                    @else

                    @endguest
                        @auth()

                            <form method="post" action="{{ route('logout') }}">
                                @csrf
                                {{Form::button('Logout',['class'=>'logout-btn','type'=>'submit'])}}
                            </form>
                        @endauth
                </ul>
            </div>
        </div>
    </nav>
</div>


