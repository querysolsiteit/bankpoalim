jQuery(document).ready(function(){
    if(jQuery('.widget_nav_menu').length){
        jQuery('.widget_nav_menu ul > li').each(function(index){
            jQuery(this).find('a').addClass('db links-row-link');
        });
    }
});
