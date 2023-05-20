<header class="bg-dark text-white">
    <div class="bg-light d-flex justify-content-between p-2">
        <ul class="nav">
            <li>
                <a href="#" class="nav-link">Home</a>
            </li>
            <li>
                <a href="#" class="nav-link">About Us</a>
            </li>
            <li>
                <a href="#" class="nav-link">Contact Us</a>
            </li>
            <li>
                <a href="#" class="nav-link">FAQ's</a>
            </li>
        </ul>
        <div class="d-flex gap-2">
            <form action="">
                <input type="search" name="search" id="search" class="form-control form-control-dark" placeholder="Search">
            </form>

            @guest
                <a href="/login" class="text-black">Login</a>
                <a href="/register" class="text-black">Register</a>
            @endguest

            @auth
                <a href="/logout"  class="text-black">Logout</a>
            @endauth
        </div>
    </div>
</header>