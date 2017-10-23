jQuery(document).ready(function() {

  jQuery("#search-box").select2({
    placeholder: 'Search by course title or subject',
    tags: false,
    ajax: {
      url: "/search-test-2/",
      dataType: "json",
      delay: 150,
      data: function (params) {
        return params;
      },
      processResults: function (data, params) {

        return {
          results: data

        };
      },
      formatNoMatches: function (term) {
                    alert("No Matches E3 box");
                },
      cache: true
  },

    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1
    // templateResult: formatRepo, // omitted for brevity, see the source of this page
    // templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
  }).on("select2:select", function (e) { 
          window.location.href="https://www.knowsleycollege.ac.uk/" + (e.params.data.url);
  });

});



  