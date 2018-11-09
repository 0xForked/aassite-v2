function readIMG01(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#img01')
                .attr('src', e.target.result)
                .width(270)
                .height(270);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
