'use strict';

const each = (arr, fn) => Array.prototype.forEach.call(arr, fn);

export default () => ({
	props: ['images'],

	template:`
		<div style="position:relative; overflow: hidden">
			<ul> 
				<li v-for="image in images" style="float:left;list-style: none"> 
					<span style="display: block;background:url({{image}}); background-size: cover; background-position: center; height: 100vh"></span> 
				</li> 
			</ul>
		</div>
	`,

	ready() {
		let lis = this.$el.querySelectorAll('li');
		this.$el.querySelector('ul').style.width = '${lis.length * 100 }%';
		let w = 100 / lis.length;
		
		each(lis, function(el) {
			el.style.width = `${w}%`;
		});


	}
})

