let slideIndex = 1;
showSlide(slideIndex);

function plusSlideIndex(num){
    showSlide(slideIndex += num);
}

function currentSlideIndex(num){
    showSlide(slideIndex = num);
}

function showSlide(n){
    let i;
    let slides = document.getElementsByClassName('slide');
    if(n<1){slideIndex = slides.length}
    if(n>slides.length){slideIndex = 1}
    for(i=0;i<slides.length;i++){
        slides[i].style.display = "none";
    }
    slides[slideIndex-1].style.display = "flex";
    document.querySelector('.pagination').id = "slide"+slideIndex;
    document.querySelector('.current-slide').innerHTML = slideIndex+"/3";
}

setInterval(function(){
autoSlide()
},20000);

function autoSlide(){
    slideIndex++;
    showSlide(slideIndex);
}