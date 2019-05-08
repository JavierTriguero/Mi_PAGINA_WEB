  $(".single-image").fancybox({
      openEffect : 'elastic',   //'fade', 'elastic'
      closeEffect	: 'elastic',
      openSpeed:'normal', //ms, slow, normal, fast (default 250ms)
      closeSpeed:'normal',
      helpers : {
        title : {
           type : 'float' //'float', 'inside', 'outside' or 'over'
        },
        overlay : {
          closeClick : true  // if true, se cierra al hacer click fuera de la imagen
        }
    },
    padding:11
});
