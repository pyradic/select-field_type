import Choices from 'choices.js';
import $ from 'jquery';


console.log('READY');
let $fields = $('select[data-provides="anomaly.field_type.select"][data-search]');
console.log('fields', $fields);
$fields.each((index, el) => {
    console.log('field', index, el);
    let $el          = $(el);
    let choices      = new Choices(el, {
        shouldSort: false,
        allowHTML : true,
    });
    el[ '_choices' ] = choices;
    $el.data('choices', choices);
    $el.removeAttr('data-provides');
    console.log('field choices', index, choices, $el, el);
});
