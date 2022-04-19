$("#slider").slider({
    animate: "fast",
    max: 5,
    min: 1,
    step: 1,
    range: true,
    values: [1, 5],
    slide: function (event, ui) {
        $("#starRating").val(ui.value);
        $(".controls-section__button").removeClass("js--hidden");
        filterFeedbacksByRating()
    }
});

if (document.getElementById("ratingForm")) {
    const form = document.getElementById("ratingForm");
    const select = document.getElementById("bathType");
    form.addEventListener("reset", () => {
        $("#slider").slider("values", [1, 5])
        $(".controls-section__button").addClass("js--hidden");

        var allFeedbacks = document.querySelectorAll('.feedback-item');
        allFeedbacks.forEach(feedback => {

            feedback.classList.remove("js--hidden");
        });
    })
    select.addEventListener("change", () => {
        $(".controls-section__button").removeClass("js--hidden")
        var checkedOption = $(select).val();
        filterFeedbacksByName(checkedOption)
    });
}

function filterFeedbacksByRating() {
    var allFeedbacks = document.querySelectorAll('.feedback-item');
    var starRating = $("#slider").slider("values");

    allFeedbacks.forEach(feedback => {
        if (feedback.querySelector(".amount").textContent !=
            $("#starRating").val()) {
            feedback.classList.add("js--hidden");
        } else {
            feedback.classList.remove("js--hidden");
        }
    })

}
function filterFeedbacksByName(checkedValue) {
    var allFeedbacks = document.querySelectorAll('.feedback-item');
    allFeedbacks.forEach(feedback => {

        if (feedback.querySelector(".feedback-item__caption").textContent != checkedValue) {
            feedback.classList.add("js--hidden");
        } else {
            feedback.classList.remove("js--hidden");
        }
    })
}