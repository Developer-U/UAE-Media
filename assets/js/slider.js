window.addEventListener('DOMContentLoaded', function(){
    const first_news_slider = new Swiper(".first-news-slider", {
        slidesPerView: 1, 
        spaceBetween: 4,  
        autoplay: false,               
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },   
        pagination: {
          el: '.swiper-pagination',
          type: 'bullets',
          clickable: true,
        },     
    });  
    
    const second_news_slider = new Swiper(".block-second-slider", {
      slidesPerView: 1, 
      spaceBetween: 4,  
      autoplay: false,               
      navigation: {
        nextEl: ".swiper-button-next.second",
        prevEl: ".swiper-button-prev.second",
      },   
      pagination: {
        el: '.swiper-pagination.second',
        type: 'bullets',
        clickable: true,
      },     
    }); 

    const third_news_slider = new Swiper(".third-slider", {
      slidesPerView: 1, 
      spaceBetween: 4,  
      autoplay: false,               
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },   
      pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true,
      },     
    }); 

    const fourth_news_slider = new Swiper(".block-fourth-slider", {
      slidesPerView: 1, 
      spaceBetween: 4,  
      autoplay: false,               
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },   
      pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true,
      },     
    }); 

    const sixth_news_slider = new Swiper(".sixth-slider", {
      slidesPerView: 1, 
      spaceBetween: 4,  
      autoplay: false,               
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },   
      pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true,
      },     
    }); 

});