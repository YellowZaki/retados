$('.example_typeahead > > input').tagsinput({
  typeahead: {
    source: function(query) {
      return $.getJSON('/asignaturas.json');
    }
  }
});

$('.example_objects_as_tags > > input').tagsinput({
  itemValue: 'value',
  itemText: 'text',
  typeahead: {
    source: function(query) {
      return $.getJSON('/asignaturas.json');
    }
  }
});
