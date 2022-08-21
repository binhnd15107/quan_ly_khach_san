$(document).ready(function () {
    $("input[name=start_time_room]").change(function () {
        // var tomorrow = moment(today).add(1, 'days');
        var start_time = $("input[name=start_time_room]").val();
        let d = new Date(start_time);
        var format2 = "YYYY-MM-DD";
        dateTime2 = moment(d).add(1, "days").format(format2);
        $("input[name=end_time_room]").attr({
            min: dateTime2,
        });
    });

    $(".detail-room").click(function () {
        let id = $(this).data("id");
        var url = "/room/" + id;
        window.location = addParameter(url);
    });
    $("#order-room").click(function () {
        let id = $(this).data("id");
        var url = "/cart/" + id;
        window.location = addParameter(url);
    });
    function addParameter(url) {
        function getUrlParameter(name) {
            name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
            var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
            var results = regex.exec(location.search);
            return results === null
                ? ""
                : decodeURIComponent(results[1].replace(/\+/g, " "));
        }
        let d = new Date();
        var format2 = "YYYY-MM-DD";
        dateTime2 = moment(d).add(1, "days").format(format2);
        let $starTime = getUrlParameter("start_time_room")
            ? moment(getUrlParameter("start_time_room")).format(format2)
            : moment(d).format(format2);
        let $endTime = getUrlParameter("end_time_room")
            ? moment(getUrlParameter("end_time_room")).format(format2)
            : dateTime2;
        let id = $(this).data("id");
        return (
            url + "?start_time_room=" + $starTime + "&end_time_room=" + $endTime
        );
    }
});
