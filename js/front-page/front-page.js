import {menu} from '../moduls/menu.js';
import {advantage} from '../moduls/advantage-section.js';
import {slider} from '../moduls/main_slider.js';
import Swiper from 'swiper';

jQuery(document).ready(function ($) {
    menu($);
    advantage($);
    slider($);

    var mySwiper = new Swiper ('.swiper-container', {
        // Optional parameters
        direction: 'horizontal',
        slidesPerView: 4,
        spaceBetween: 30,
        speed: 500,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            // when window width is <= 320px
            480: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            992: {
                slidesPerView: 2,
                spaceBetween: 20
            }
        }
    })
});