<?= $this->extend('layouts/layout') ?>
<?= $this->section('css') ?>
<style>
    i[class^='bi bi-'],
    i [class*='bi bi-'] {
        font-size: 50px;
        color: tomato;
    }

    * {
        box-sizing: border-box;
    }

    .slider {
        width: 500px;
        text-align: center;
        overflow: hidden;
    }

    .slides {
        display: flex;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        scroll-behavior: smooth;
        -webkit-overflow-scrolling: touch;
    }

    .slides::-webkit-scrollbar {
        width: 10px;
        height: 10px;
    }

    .slides::-webkit-scrollbar-thumb {
        /* background: 'red'; */
        border-radius: 10px;
    }

    .slides::-webkit-scrollbar-track {
        background: transparent;
    }

    .slides>img {
        scroll-snap-align: start;
        flex-shrink: 0;
        width: 500px;
        margin-right: 50px;
        border-radius: 10px;
        transform-origin: center center;
        transform: scale(1);
        transition: transform 0.5s;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        max-width: 100%;
        height: auto;
    }

    .slider>a {
        display: inline-flex;
        width: 1.5rem;
        height: 1.5rem;
        background: white;
        text-decoration: none;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        margin: 0 0 0.5rem 0;
        position: relative;
    }

    .slider>a:active {
        top: 1px;
        color: #1c87c9;
    }

    .slider>a:focus {
        background: #eee;
    }

    /* Don't need button navigation */
    @supports (scroll-snap-type) {
        .slider>a {
            display: none;
        }
    }
</style>
<?= $this->endSection() ?>
<?= $this->section('sections') ?>
<section id="about" class="about">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
                <div id=slider class="slider">
                    <div id=slides class="slides">
                    </div>
                </div>
            </div>
            <div id="establiments" class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script src="/assets/js/Api.js"></script>
<script>
    typeof document;

    divEstabliment = document.getElementById("establiments")
    slider = document.getElementById("slider")
    slides = document.getElementById("slides")
    Api.obtenirUnEstabliment(<?= $codi_establiment ?>, divEstabliment, slider, slides);
</script>
<?= $this->endSection() ?>