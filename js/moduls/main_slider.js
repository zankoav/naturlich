/**
 * Created by alexandrzanko on 2/16/18.
 */
import Swiper from 'swiper';


export function slider($) {

    window.onload = function () {
        //initialize swiper when document ready
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
        });

        $('.swiper-container-wrapper').removeClass('invisible');
    }
}