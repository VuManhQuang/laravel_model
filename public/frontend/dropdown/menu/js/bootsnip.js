/* tạo thanh x trên toggle cho data-taget=".navbar-collapse" */

$(document).ready(function () {
			  $(".navbar-toggle").on("click", function () {
				    $(this).toggleClass("active");
			  });
		});
/* end tạo thanh x trên toggle */
/* dropdown menu */

$(document).ready(function() {
    $('.navbar a.dropdown-toggle').on('click', function(e) {
        var $el = $(this);
        var $parent = $(this).offsetParent(".dropdown-menu");
        $(this).parent("li").toggleClass('open');

        if(!$parent.parent().hasClass('nav')) {
            $el.next().css({"top": $el[0].offsetTop, "left": $parent.outerWidth() - 4});
        }

        $('.nav li.open').not($(this).parents("li")).removeClass("open");

        return false;
    });
});
/*end dropdown menu */
// phần slide hover

// end phần slide hover
// side bar 

// end side bar 
