// add to cart effect
$(document).ready(function () {
    $('#navbar ul li.toggle span').click(function () {
        $('#navbar ul div.items').toggleClass("show");
        $('#navbar ul li.toggle span').toggleClass("show");
    });
    $('.addtocart-btn').on('click', function () {
        var cart = $('#shopping-cart');
        var imgtodrag = $(this).closest('.fruit-items').find("img").eq(0);
        if (imgtodrag) {
            var imgclone = imgtodrag.clone()
                .offset({
                    top: imgtodrag.offset().top,
                    left: imgtodrag.offset().left
                })
                .css({
                    'opacity': '0.5',
                    'position': 'absolute',
                    'height': '165px',
                    'width': '150px',
                    'z-index': '100'
                })
                .appendTo($('.row'))
                .animate({
                    'top': cart.offset().top + 10,
                    'left': cart.offset().left + 10,
                    'width': 75,
                    'height': 75
                }, 1000, 'easeInOutExpo');

            setTimeout(function () {
                cart.effect("shake", {
                    times: 2
                }, 200);
            }, 1500);

            imgclone.animate({
                'width': 0,
                'height': 0
            }, function () {
                $(this).detach()
            });
        }
    });
});
// sticky navabar
window.onscroll = function () { myFunction() };

let navbar = document.getElementById("navbar");
let sticky = navbar.offsetTop;

function myFunction() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
    } else {
        navbar.classList.remove("sticky");
    }
}


// magnify effect for products
jQuery(document).ready(function () {
    $('.zoom-image').each(function(){
      var originalImagePath = $(this).find('img').data('original-image');
      $(this).zoom({
        url: originalImagePath,
        magnify: 2
      });
    });
}); 

//search button disabled
