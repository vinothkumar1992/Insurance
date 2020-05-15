// Class definition
var KTTypeahead = function() {

    var states = ["JOHOR", "KEDAH", "KELANTAN", "KUALA LUMPUR", "LABUAN", "MALACCA", "NEGERI SEMBILAN", "PAHANG", "PERAK", "PERLIS", "PENANG", "SABAH", "SARAWAK", "SELANGOR", "TERENGGANU"];

    // Private functions
    var demo1 = function() {
        var substringMatcher = function(strs) {
            return function findMatches(q, cb) {
                var matches, substringRegex;

                // an array that will be populated with substring matches
                matches = [];

                // regex used to determine if a string contains the substring `q`
                substrRegex = new RegExp(q, 'i');

                // iterate through the pool of strings and for any string that
                // contains the substring `q`, add it to the `matches` array
                $.each(strs, function(i, str) {
                    if (substrRegex.test(str)) {
                        matches.push(str);
                    }
                });

                cb(matches);
            };
        };

        $('#kt_typeahead_1, #kt_typeahead_1_modal, #kt_typeahead_1_validate, #kt_typeahead_2_validate, #kt_typeahead_3_validate').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'states',
            source: substringMatcher(states)
        });
    }

 

    return {
        // public functions
        init: function() {
            demo1();
           ;
        }
    };
}();

jQuery(document).ready(function() {
    KTTypeahead.init();
});