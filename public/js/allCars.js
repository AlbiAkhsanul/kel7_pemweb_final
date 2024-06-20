$(document).ready(function(){
    $('.car-wrap').each(function(index){
        $(this).delay(200 * index).queue(function(next){
            $(this).addClass('visible');
            next();
        });
    });
});
$(document).addEventListener('DOMContentLoaded', function() {
    const slider = document.getElementById('price-slider');
    const minPriceInput = document.getElementById('min-price');
    const maxPriceInput = document.getElementById('max-price');

    // Initialize input values
    minPriceInput.value = '$0';
    maxPriceInput.value = `$${parseInt(slider.max).toLocaleString()}`;

    slider.addEventListener('input', function() {
        const value = slider.value;
        maxPriceInput.value = `$${parseInt(value).toLocaleString()}`;
    });

    slider.addEventListener('change', function() {
        const value = slider.value;
        maxPriceInput.value = `$${parseInt(value).toLocaleString()}`;
    });
});