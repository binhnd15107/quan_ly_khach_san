$(document).ready(function () {
    var url = "room";
    arr = [];
    $("input[name=q]").keypress(function (event) {
        let id = $(this).val();
        var keycode = event.keyCode ? event.keyCode : event.which;
        if (keycode == "13") {
            window.location = UpdateQueryString("q", id);
        }
    });
    $("select[name=type_room_id]").change(function () {
        let id = $(this).val();
        window.location = UpdateQueryString("type_room_id", id);
    });
    $("select[name=bannerable_id]").change(function () {
        let id = $(this).val();
        window.location = UpdateQueryString("bannerable_id", id);
    });
    $("select[name=roles_id]").change(function () {
        let id = $(this).val();
        window.location = UpdateQueryString("roles_id", id);
    });
    $(function () {
        function getUrlParameter(name) {
            name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
            var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
            var results = regex.exec(location.search);
            return results === null
                ? ""
                : decodeURIComponent(results[1].replace(/\+/g, " "));
        }
        const start = getUrlParameter("startTime")
            ? moment(getUrlParameter("startTime"))
            : moment().subtract(29, "days");
        const end = getUrlParameter("endTime")
            ? moment(getUrlParameter("endTime"))
            : moment();
        function cb(start, end, ranges) {
            $("#reportrange span").html(
                start.format("DD/MM/YYYY HH:mm:ss") +
                    " - " +
                    end.format("DD/MM/YYYY HH:mm:ss")
            );
            if (ranges == "Hôm nay") {
                window.location = UpdateQueryString(
                    "endTime",
                    end.format("MMMM D, YYYY HH:mm:ss"),
                    UpdateQueryString(
                        "startTime",
                        start.format("MMMM D, YYYY HH:mm:ss")
                    )
                );
            } else if (ranges == "Hôm qua") {
                window.location = UpdateQueryString(
                    "endTime",
                    end.format("MMMM D, YYYY HH:mm:ss"),
                    UpdateQueryString(
                        "startTime",
                        start.format("MMMM D, YYYY HH:mm:ss")
                    )
                );
            } else if (ranges == "7 ngày trước") {
                window.location = UpdateQueryString(
                    "endTime",
                    end.format("MMMM D, YYYY HH:mm:ss"),
                    UpdateQueryString(
                        "startTime",
                        start.format("MMMM D, YYYY HH:mm:ss")
                    )
                );
            } else if (ranges == "30 ngày trước") {
                window.location = UpdateQueryString(
                    "endTime",
                    end.format("MMMM D, YYYY HH:mm:ss"),
                    UpdateQueryString(
                        "startTime",
                        start.format("MMMM D, YYYY HH:mm:ss")
                    )
                );
            } else if (ranges == "Tháng này") {
                window.location = UpdateQueryString(
                    "endTime",
                    end.format("MMMM D, YYYY HH:mm:ss"),
                    UpdateQueryString(
                        "startTime",
                        start.format("MMMM D, YYYY HH:mm:ss")
                    )
                );
            } else if (ranges == "Tháng trước") {
                window.location = UpdateQueryString(
                    "endTime",
                    end.format("MMMM D, YYYY HH:mm:ss"),
                    UpdateQueryString(
                        "startTime",
                        start.format("MMMM D, YYYY HH:mm:ss")
                    )
                );
            } else if (ranges == "Custom Range") {
                window.location = UpdateQueryString(
                    "endTime",
                    end.format("MMMM D, YYYY HH:mm:ss"),
                    UpdateQueryString(
                        "startTime",
                        start.format("MMMM D, YYYY HH:mm:ss")
                    )
                );
            }
        }

        $("#reportrange").daterangepicker(
            {
                startDate: start,
                endDate: end,
                ranges: {
                    "Hôm nay": [moment(), moment()],
                    "Hôm qua": [
                        moment().subtract(1, "days"),
                        moment().subtract(1, "days"),
                    ],
                    "7 ngày trước": [moment().subtract(6, "days"), moment()],
                    "30 ngày trước": [moment().subtract(29, "days"), moment()],
                    "Tháng này": [
                        moment().startOf("month"),
                        moment().endOf("month"),
                    ],
                    "Tháng trước": [
                        moment().subtract(1, "month").startOf("month"),
                        moment().subtract(1, "month").endOf("month"),
                    ],
                },
            },
            cb
        );

        cb(start, end, (ranges = ""));
    });

    function UpdateQueryString(key, value, url) {
        if (!url) url = window.location.href;
        var re = new RegExp("([?&])" + key + "=.*?(&|#|$)(.*)", "gi"),
            hash;

        if (re.test(url)) {
            if (typeof value !== "undefined" && value !== null) {
                return url.replace(re, "$1" + key + "=" + value + "$2$3");
            } else {
                hash = url.split("#");
                url = hash[0].replace(re, "$1$3").replace(/(&|\?)$/, "");
                if (typeof hash[1] !== "undefined" && hash[1] !== null) {
                    url += "#" + hash[1];
                }
                return url;
            }
        } else {
            if (typeof value !== "undefined" && value !== null) {
                var separator = url.indexOf("?") !== -1 ? "&" : "?";
                hash = url.split("#");
                url = hash[0] + separator + key + "=" + value;
                if (typeof hash[1] !== "undefined" && hash[1] !== null) {
                    url += "#" + hash[1];
                }
                return url;
            } else {
                return url;
            }
        }
    }
});
