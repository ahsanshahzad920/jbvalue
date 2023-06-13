{{-- header --}}
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid px-md-5">
            <a class="navbar-brand" href="{{route('home')}}">
                <i class="fa-solid fa-icons fs-1"></i>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-4">
                        <a @class(["nav-link fw-bold", "active"=>(request()->route()->getName() == 'home') ]) href="{{route('home')}}">Values</a>
                    </li>
                    <li class="nav-item mx-4">
                        <a @class(["nav-link fw-bold", "active"=>(request()->route()->getName() == 'calculator') ]) href="{{route('calculator.index')}}">Calculator</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
