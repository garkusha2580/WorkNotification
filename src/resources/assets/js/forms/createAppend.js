$(document).ready(function () {
    let sitesSelect = $("#sites_select");
    sitesSelect.select2({
        maximumSelectionLength: 5,
        maximumSelectionSize: 5,
        allowClear: true,
        theme: "bootstrap",
        placeholder: sitesSelect.attr("placeholder"),
        tags: true
    })
});