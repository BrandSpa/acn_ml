'use strict';
import input from './input';
import form from './form';
import donate from './components/donate';

import changeAmount from './components/change_amount';
import sliderBg from './components/slider_bg';

(function() {
	Vue.component('change-amount', changeAmount());
	Vue.component('donate-landing', donate());
	Vue.component('bsslider-bg', sliderBg());

	const vm = new Vue({
		el: '#app-ml'
	});

	input();
	form();
	donate();
  
})();
