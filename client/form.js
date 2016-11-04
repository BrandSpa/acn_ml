'use strict';
import $ from 'jquery';
import validate from './validate';

export default function() {
  $('form[data-validate="true"]').on('submit', function(e) {
    e.preventDefault();
    let $form = $(this);
    let inputs = $(this).find('input');
    let isValid = false;
    let results = [];

    inputs.each(function(index) {
      let $input = $(this);
      let val = $input.val();
      let name = $input.attr('name');
      let validations = $input.data('validate').split('|');
      let messages = $input.data('messages').split('|');
      let $err = $(`input[name="${name}"]`)
          .parent()
          .find('.input__errors');
      
      $err.empty();

      let f = Promise.all(validations.map((type, i) => {
        if(!validate(type, val)) {
          $err
          .append(messages[i]);
          return false;
        }

        return true;

      }));

      f.then(res => results = [...results, ...res] );
      

    });

    console.log('is valid: ', results);


  });
}
