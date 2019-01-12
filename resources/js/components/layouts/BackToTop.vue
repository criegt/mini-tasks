<template>
    <a id="back2Top" title="Back to top" class="btn btn-outline-primary" href="#">
        <i class="fas fa-arrow-up"></i>
    </a>
</template>

<script>
/*Scroll to top when arrow up clicked BEGIN*/
$(window).scroll(function() {
    var height = $(window).scrollTop();
    if (height > 100) {
        $('#back2Top').fadeIn();
    } else {
        $('#back2Top').fadeOut();
    }
});
$(document).ready(function() {
    $("#back2Top").click(function(event) {
        event.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, 400);
        return false;
    });

});

export default {
}
</script>

<style>
#back2Top {
    overflow: hidden;
    z-index: 999;
    display: none;
    position: fixed;
    bottom: 40px;
    right: 40px;
}
</style>
