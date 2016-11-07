'use strict';
import $ from 'jquery';

export default function() {
  let form = $('.form_steps');
  let steps = form.find('.form_steps__step');
  let maxStep = steps.length;
  let step = 0;
  let viewportWidth = (maxStep * 100);
  let viewport = form.find('form_steps__viewport');
  viewport.css({'width':`${viewportWidth}%` });
  
  form.on('submit', function(evt) {
    evt.preventDefault();
    steps.removeClass('bs_donate_form__step--active');
    steps[step++].addClass('bs_donate_form__step--active');
  });
}
