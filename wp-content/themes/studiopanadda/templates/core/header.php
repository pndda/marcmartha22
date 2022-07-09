<header class="c-header py-5 my-3">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-between">


                <div id="c-nav" class="overlay">
                    <div class="container">
                        <div class="row">
                            <div class="c-overlay__header col-12 d-flex justify-content-between py-5 my-3 px-0">
                                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">Close</a>
                                <a href="<?= get_home_url(); ?>" class="c-home__logo" title="Home">
                                    Martha
                                </a>
                                <a href="">Shop(1)</a>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12 c-overlay__menu">
                                <?php wp_nav_menu( array( 'container'=> 'ul', 'menu_class'=> 'overlay-content', 'theme_location' => 'primary_navigation' ) ); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <span style="cursor:pointer" onclick="openNav()"> Menu</span>
                <a href="<?= get_home_url(); ?>" class="c-home__logo" title="Home">
                    Martha
                </a>

                <a href="">Shop(1)</a>

            </div>

        </div>
    </div>
</header>

<div class="headerHeight"></div>

<script>
    function openNav() {
        document.getElementById("c-nav").style.height = "100%";
    }

    function closeNav() {
        document.getElementById("c-nav").style.height = "0%";
    }
</script>

<style>
    .overlay {
        height: 0;
        width: 100%;
        position: fixed;
        z-index: 11;
        top: 0;
        left: 0;
        background-color: #000;
        overflow-x: hidden;
        transition: 0.5s;
    }


    @media screen and (max-height: 450px) {
        .overlay a {
            font-size: 20px;
        }
    }
</style>