function previewFile() {
    var preview = document.querySelector("#show");
    var file = document.querySelector("input[type=file]").files[0];
    console.log(file);
    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
}
$(document).ready(function () {
    if (window.File && window.FileList && window.FileReader) {
        $("#files").on("change", function (e) {
            var files = e.target.files;
            console.log(files);
            filesLength = files.length;
            for (var i = 0; i < filesLength; i++) {
                var f = files[i];
                var fileReader = new FileReader();
                fileReader.onload = function (e) {
                    var file = e.target;

                    $(
                        '<span class="pip">' +
                            '<img class="imageThumb" src="' +
                            e.target.result +
                            '" title="' +
                            file.name +
                            '"/>' +
                            '<br/><span class="remove">Remove image</span>' +
                            "</span>"
                    ).insertAfter("#files");
                    $(".remove").click(function () {
                        $(this).parent(".pip").remove();
                    });

                    // Old code here
                    /*$("<img></img>", {
              class: "imageThumb",
              src: e.target.result,
              title: file.name + " | Click to remove"
            }).insertAfter("#files").click(function(){$(this).remove();});*/
                };
                fileReader.readAsDataURL(f);
            }
        });
    } else {
        alert("Your browser doesn't support to File API");
    }
});
// $(document).on("click", ".remove", function () {
//     var pips = $(".pip").toArray();
//     var $selectedPip = $(this).parent(".pip");
//     var index = pips.indexOf($selectedPip[0]);
//     var dt = new DataTransfer();
//     var files = $("#files")[0].files;
//     for (var fileIdx = 0; fileIdx < files.length; fileIdx++) {
//         if (fileIdx !== index) {
//             dt.items.add(files[fileIdx]);
//         }
//     }

//     $("#files")[0].files = dt.files;

//     $selectedPip.remove();
// });
