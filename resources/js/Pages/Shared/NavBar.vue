<template>
    <header id="home" class="hero-area">
        <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
            <div class="container">
                <div class="theme-header clearfix">

                    <div class="navbar-header">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            <span class="lni lni-menu"></span>
                            <span class="lni lni-menu"></span>
                            <span class="lni lni-menu"></span>
                        </button>
                        <a href="" class="navbar-brand"><img src="/assets/img/logo.png" alt="No image"></a>
                    </div>
                    <div class="collapse navbar-collapse" id="main-navbar">
                        <ul class="navbar-nav mr-auto w-100 justify-content-end">
                            <li class="nav-item active">
                                <inertia-link href="/" class="nav-link">Home</inertia-link>
                            </li>

                            <li v-if="$page.auth.user && $page.auth.user.role[0] == 'Candidate'" class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Candidates
                                </a>
                                <ul class="dropdown-menu">
                                    <inertia-link href="/jobs" class="dropdown-item">Browse Jobs</inertia-link>
                                </ul>
                            </li>

                            <li v-if="$page.auth.user && $page.auth.user.role[0] == 'Employer'" class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Employer
                                </a>
                                <ul class="dropdown-menu">
                                    <li><inertia-link class="dropdown-item" href="/jobs/create">Add Job</inertia-link></li>
                                    <li><inertia-link class="dropdown-item" href="/jobs">Browse Jobs</inertia-link></li>                                </ul>
                            </li>

                            <li class="nav-item">
                                <inertia-link class="nav-link" href="">About</inertia-link>
                            </li>
                            <li class="nav-item">
                                <inertia-link class="nav-link" href="">
                                    Contact
                                </inertia-link>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Profile
                                </a>
                                <ul class="dropdown-menu">
                                    <li><inertia-link class="dropdown-item" href="/profiles">My Resume</inertia-link></li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown" v-if="$page.auth.user">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ $page.auth.user.name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <inertia-link class="dropdown-item" href="logout" method="post">Log Out</inertia-link>
                                </div>
                            </li>

                            <li class="nav-item" v-else>
                                <a class="nav-link"><inertia-link href="login">Login</inertia-link></a>
                            </li>

                            <li class="button-group">
                                <inertia-link href="/jobs/create"><a class=" button btn btn-common">Post a Job</a></inertia-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mobile-menu" data-logo="assets/img/logo-mobile.png"></div>
        </nav>
    </header>
</template>

<script>
export default {
    name: "NavBar",
}
</script>

<style scoped>

</style>
