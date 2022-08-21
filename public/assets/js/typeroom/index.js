function btDrop($id) {
    form = document.querySelector("#fromDrop_" + $id);
    var q = confirm("Bạn có muốn xóa không");
    if (q == true) {
        form.submit();
    }
}
