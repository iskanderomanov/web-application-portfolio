jQuery(document).ready(function(){
    jQuery(".header__burger").click(function () {
        jQuery(".header__burger, .header__menu").toggleClass("active");
        jQuery("body").toggleClass("lock");
    });
});

jQuery(document).ready(function(){
    jQuery("body").on("mousemove",".scroll__image",function(e){
        var t=jQuery(window).scrollTop(),
            n=jQuery(this).find("img").height(),
            o=jQuery(this).height()-.2*jQuery(this).height(),
            i=e.clientY-jQuery(this).offset().top+t-.1*jQuery(this).height(),
            c= jQuery(this).offset().top,
            a=parseInt(100*i/o),
            r=(n-o)/100*a;
        jQuery(this).scrollTop(r)
    }),
        jQuery("body").on("mouseleave",".scroll__image",function(e){
            jQuery(this).scrollTop("0px")
        })

});

var prevScrollpos = window.pageYOffset;
window.addEventListener('scroll', function() {
    var currentScrollpos = window.pageYOffset;
    if(prevScrollpos > currentScrollpos){
        document.getElementById("navbar").style.marginTop = "0";
    }else{
        document.getElementById("navbar").style.marginTop = "-100px";
    }
    prevScrollpos = currentScrollpos;
})
jQuery(document).ready(function(){
    jQuery("#file").on("change", function(e){
        var files = jQuery(this)[0].files;

        if(files.length >= 2){
            jQuery(".uploader__caption").text(files.length + " выбранных файла")
        }else{
            var filename = e.target.value.split('\\').pop();
            jQuery(".uploader__caption").text(filename);
        }
    });
});
