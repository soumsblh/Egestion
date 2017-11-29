var select = function(s) {
    return document.querySelector(s);
  },
  selectAll = function(s) {
    return document.querySelectorAll(s);
  }, 
  animationWindow = select('#animationWindow'),    
    animData = {
		wrapper: animationWindow,
		animType: 'svg',
		loop: true,
		prerender: true,
		autoplay: true,
		path: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/35984/walking_time_bomb.json'
	}, anim;

	anim = lottie.loadAnimation(animData);
 anim.setSpeed(1);


      $('.datepicker').datepicker({
        //language: 'fr',
        todayHighlight: true,
            todayBtn: "linked",
    language: "fr",
        startDate: '-3d'
      })
              $('.input-group.date').datepicker({
        language: 'fr',
        startDate: 'd',
        keyboardNavigation: false,
        todayHighlight: true
    });