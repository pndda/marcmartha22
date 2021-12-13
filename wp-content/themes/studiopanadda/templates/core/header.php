<header class="c-header py-2 py-lg-4">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-between">


                <div id="c-nav" class="overlay">
                    <div class="container">
                        <div class="row">
                            <a href="javascript:void(0)" class="closebtn py-2 py-lg-4" onclick="closeNav()">Close</a>
                            <?php wp_nav_menu( array( 'container'=> 'ul', 'menu_class'=> 'overlay-content', 'theme_location' => 'primary_navigation' ) ); ?>
                        </div>
                    </div>
                </div>
                <span style="cursor:pointer" onclick="openNav()"> Menu</span>
                <a href="<?= get_home_url(); ?>" class="c-header__logo" title="Home">
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
        z-index: 1;
        top: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.9);
        overflow-x: hidden;
        transition: 0.5s;
    }

    .overlay-content {
        position: relative;
        top: 25%;
        width: 100%;
        text-align: center;
        margin-top: 30px;
    }

    .overlay a {
        padding: 24px 0;
        text-decoration: none;
        font-size: 36px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .overlay a:hover,
    .overlay a:focus {
        color: #f1f1f1;
    }

    .overlay .closebtn {
        top: 20px;
        left: 45px;
        font-size: 20px;

    }

    @media screen and (max-height: 450px) {
        .overlay a {
            font-size: 20px
        }

        .overlay .closebtn {
            font-size: 40px;
            top: 15px;
            right: 35px;
        }
    }
</style>