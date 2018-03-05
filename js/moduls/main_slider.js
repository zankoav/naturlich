/**
 * Created by alexandrzanko on 2/16/18.
 */
import Swiper from 'swiper';


export function slider($) {

    let tabAcoustic = false,
        tabConstruction = false;

    window.onload = updateSlider;

    function updateSlider(type){
        let tab = '.swiper-container';
        let tabN = '.swiper-button-next';
        let tabP = '.swiper-button-prev';

        if ( !tabConstruction && type === 'construction'){
            tab += '.construction';
            tabN += '.construction';
            tabP += '.construction';


            tabConstruction = new Swiper(tab, {
                // Optional parameters
                direction: 'horizontal',
                slidesPerView: 4,
                spaceBetween: 30,
                speed: 500,
                loop: true,
                navigation: {
                    nextEl: tabN,
                    prevEl: tabP,
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

        }else if(!tabAcoustic) {
            tab += '.acoustic';
            tabN += '.acoustic';
            tabP += '.acoustic';

            tabAcoustic = new Swiper(tab, {
                // Optional parameters
                direction: 'horizontal',
                slidesPerView: 4,
                spaceBetween: 30,
                speed: 500,
                loop: true,
                navigation: {
                    nextEl: tabN,
                    prevEl: tabP,
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
        }

        $('.swiper-container-wrapper').removeClass('invisible');
    }


    $('#pills-tab a').on('shown.bs.tab', function (e) {
        let id = $(this).attr('id');
        if (id === 'pills-profile-tab'){
            updateSlider('construction');
        }else{
            updateSlider('acoustic');
        }
    });
}