$("#slider").slider({
    animate: "fast",
    max: 5,
    min: 1,
    step: 1,
    value: 5,
    range: true,
    values: [1, 5],
    slide: function (event, ui) {
        $("#starRating").val(ui.value);
    }
});