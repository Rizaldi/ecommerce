$(document).ready(function () {
    search();
});
function search() {
    var options = {

      url: base_url+"search-product",
      url: function(param) {
        // var str = str.replace(/ /g, '');
        return base_url+"search/?product=" + param;
      },
      getValue: "title",

      list: {   
        match: {
          enabled: true
        }
      },
    };

    $("#search_home").easyAutocomplete(options);
}