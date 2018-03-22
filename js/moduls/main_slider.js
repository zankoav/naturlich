/**
 * Created by alexandrzanko on 2/16/18.
 */
import Swiper from 'swiper';


export function slider($) {

    let tab = '.swiper-container';
    let tabN = '.swiper-button-next';
    let tabP = '.swiper-button-prev';

    let swiper;
    let products = initSliderData();

    window.onload = function () {
        $('.slider').empty();
        $('.slider').append(getSliderContainer());
        for (let product of products) {
            let pH = getProductHtml(product);
            $('.swiper-wrapper').append(pH);
        }
        updateSlider(tab, tabN, tabP);
    };



    $('.taxonomy').click(function (e) {

        e.preventDefault();

        let scrollTo = $(this).attr('data-count');

        swiper.slideTo(scrollTo, 0);

    });

    function getSliderContainer() {
        return `<div class="swiper-container">
                <!-- Additional required wrapper -->
                    <div class="swiper-wrapper"></div>
                </div>
                <div class="swiper-button-prev">
                    <i class="fas fa-2x fa-chevron-left float-right"></i>
                </div>
                <div class="swiper-button-next">
                    <i class="fas fa-2x fa-chevron-right"></i>
                </div>`;
    }


    function getProductHtml(product) {
        return `<div class="swiper-slide">
                   <div class="img-wrap">
                        <img class="card-img-top rounded-0 img-fluid" src="${product.img}" alt="${product.title}">
                   </div>
                   <div class="card-body">
                        <h5 class="product-mark card-title text-uppercase mb-0">${product.mark}</h5>
                        <p class="product-category card-text text-lowercase mb-0">${product.categoryName}</p>
                        <hr class="my-2">
                        <p class="product-title card-text">${product.title}</p>
                   </div>
                   <div class="card-footer p-0">
                        <a href="<?php the_permalink(); ?>"
                           class="btn btn-success">${product.btnTitle}</a>
                   </div>
                </div>`;
    }

    function initSliderData() {
        let products = [];

        let swiperSlides = document.getElementsByClassName('swiper-slide');

        for (let i = 0; i < swiperSlides.length; i++) {
            let obj = swiperSlides[i];
            let imgUrl = $(obj).find('img').attr('src');
            imgUrl = imgUrl ? imgUrl : '';

            let mark = $(obj).find('.product-mark').html();
            let category = $(obj).find('.product-category').attr('data-tax');
            let categoryName = $(obj).find('.product-category').html();
            let title = $(obj).find('.product-title').html();
            let btnTitle = $(obj).find('a').html();


            products.push({
                'img': imgUrl,
                'title': title,
                'category': category,
                'categoryName': categoryName,
                'mark': mark,
                'btnTitle': btnTitle,
            });
        }

        products.sort(function (a, b) {
            if (a.category > b.category) {
                return 1;
            }
            if (a.category < b.category) {
                return -1;
            }
            return 0;
        });

        return products;
    }

    function updateSlider(tab, tabN, tabP) {

        swiper = new Swiper(tab, {
            // Optional parameters
            direction: 'horizontal',
            slidesPerView: 4,
            spaceBetween: 30,
            speed: 500,
            loop: false,
            navigation: {
                nextEl: tabN,
                prevEl: tabP,
            },
            breakpoints: {
                // when window width is <= 320px
                480: {
                    centeredSlides: true,
                    slidesPerView: 1.5,
                    spaceBetween: 20
                },
                992: {
                    slidesPerView: 2,
                    spaceBetween: 20
                }
            }
        });

        $('.slider').removeClass('invisible');
    }
}