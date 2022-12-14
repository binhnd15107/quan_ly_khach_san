<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400,900,700,500,300,100);

    * {
        margin: 0;
        box-sizing: border-box;
        -webkit-print-color-adjust: exact;
    }

    body {
        background: #E0E0E0;
        font-family: 'Roboto', sans-serif;
    }

    ::selection {
        background: #f31544;
        color: #FFF;
    }

    ::moz-selection {
        background: #f31544;
        color: #FFF;
    }

    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }

    .col-left {
        float: left;
    }

    .col-right {
        float: right;
    }

    h1 {
        font-size: 1.5em;
        color: #444;
    }

    h2 {
        font-size: .9em;
    }

    h3 {
        font-size: 1.2em;
        font-weight: 300;
        line-height: 2em;
    }

    p {
        font-size: .75em;
        color: #666;
        line-height: 1.2em;
    }

    a {
        text-decoration: none;
        color: #00a63f;
    }

    #invoiceholder {
        width: 100%;
        height: 100%;
        padding: 50px 0;
    }

    #invoice {
        position: relative;
        margin: 0 auto;
        width: 700px;
        background: #FFF;
    }

    [id*='invoice-'] {
        /* Targets all id with 'col-' */
        /*  border-bottom: 1px solid #EEE;*/
        padding: 20px;
    }

    #invoice-top {
        border-bottom: 2px solid #00a63f;
    }

    #invoice-mid {
        min-height: 110px;
    }

    #invoice-bot {
        min-height: 240px;
    }

    .logo {
        display: inline-block;
        vertical-align: middle;
        width: 110px;
        overflow: hidden;
    }

    .info {
        display: inline-block;
        vertical-align: middle;
        margin-left: 20px;
    }

    .logo img,
    .clientlogo img {
        width: 100%;
    }

    .clientlogo {
        display: inline-block;
        vertical-align: middle;
        width: 50px;
    }

    .clientinfo {
        display: inline-block;
        vertical-align: middle;
        margin-left: 20px
    }

    .title {
        float: right;
    }

    .title p {
        text-align: right;
    }

    #message {
        margin-bottom: 30px;
        display: block;
    }

    h2 {
        margin-bottom: 5px;
        color: #444;
    }

    .col-right td {
        color: #666;
        padding: 5px 8px;
        border: 0;
        font-size: 0.75em;
        border-bottom: 1px solid #eeeeee;
    }

    .col-right td label {
        margin-left: 5px;
        font-weight: 600;
        color: #444;
    }

    .cta-group a {
        display: inline-block;
        padding: 7px;
        border-radius: 4px;
        background: rgb(196, 57, 10);
        margin-right: 10px;
        min-width: 100px;
        text-align: center;
        color: #fff;
        font-size: 0.75em;
    }

    .cta-group .btn-primary {
        background: #00a63f;
    }

    .cta-group.mobile-btn-group {
        display: none;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    td {
        padding: 10px;
        border-bottom: 1px solid #cccaca;
        font-size: 0.70em;
        text-align: left;
    }

    .tabletitle th {
        border-bottom: 2px solid #ddd;
        text-align: right;
    }

    .tabletitle th:nth-child(2) {
        text-align: left;
    }

    th {
        font-size: 0.7em;
        text-align: left;
        padding: 5px 10px;
    }

    .item {
        width: 50%;
    }

    .list-item td {
        text-align: right;
    }

    .list-item td:nth-child(2) {
        text-align: left;
    }

    .total-row th,
    .total-row td {
        text-align: right;
        font-weight: 700;
        font-size: .75em;
        border: 0 none;
    }

    .table-main {}

    footer {
        border-top: 1px solid #eeeeee;
        ;
        padding: 15px 20px;
    }

    .effect2 {
        position: relative;
    }

    .effect2:before,
    .effect2:after {
        z-index: -1;
        position: absolute;
        content: "";
        bottom: 15px;
        left: 10px;
        width: 50%;
        top: 80%;
        max-width: 300px;
        background: #777;
        -webkit-box-shadow: 0 15px 10px #777;
        -moz-box-shadow: 0 15px 10px #777;
        box-shadow: 0 15px 10px #777;
        -webkit-transform: rotate(-3deg);
        -moz-transform: rotate(-3deg);
        -o-transform: rotate(-3deg);
        -ms-transform: rotate(-3deg);
        transform: rotate(-3deg);
    }

    .effect2:after {
        -webkit-transform: rotate(3deg);
        -moz-transform: rotate(3deg);
        -o-transform: rotate(3deg);
        -ms-transform: rotate(3deg);
        transform: rotate(3deg);
        right: 10px;
        left: auto;
    }

    @media screen and (max-width: 767px) {
        h1 {
            font-size: .9em;
        }

        #invoice {
            width: 100%;
        }

        #message {
            margin-bottom: 20px;
        }

        [id*='invoice-'] {
            padding: 20px 10px;
        }

        .logo {
            width: 140px;
        }

        .title {
            float: none;
            display: inline-block;
            vertical-align: middle;
            margin-left: 40px;
        }

        .title p {
            text-align: left;
        }

        .col-left,
        .col-right {
            width: 100%;
        }

        .table {
            margin-top: 20px;
        }

        #table {
            white-space: nowrap;
            overflow: auto;
        }

        td {
            white-space: normal;
        }

        .cta-group {
            text-align: center;
        }

        .cta-group.mobile-btn-group {
            display: block;
            margin-bottom: 20px;
        }

        /*==================== Table ====================*/
        .table-main {
            border: 0 none;
        }

        .table-main thead {
            border: none;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        .table-main tr {
            border-bottom: 2px solid #eee;
            display: block;
            margin-bottom: 20px;
        }

        .table-main td {
            font-weight: 700;
            display: block;
            padding-left: 40%;
            max-width: none;
            position: relative;
            border: 1px solid #cccaca;
            text-align: left;
        }

        .table-main td:before {
            /*
        * aria-label has no advantage, it won't be read inside a table
        content: attr(aria-label);
        */
            content: attr(data-label);
            position: absolute;
            left: 10px;
            font-weight: normal;
            text-transform: uppercase;
        }

        .total-row th {
            display: none;
        }

        .total-row td {
            text-align: left;
        }

        footer {
            text-align: center;
        }
    }
</style>

<body>
    <div id="invoiceholder">
        <div id="invoice" class="effect2">

            <div id="invoice-top">
                <div class="logo"><img src="https://fpt.edu.vn/Content/images/assets/Poly.png" alt="Logo" /></div>
                <div class="title">
                    <h1>H??A ????N THU?? PH??NG</h1>
                    <p>Ng??y ?????t<span id="invoice_date">
                            {{ Carbon\Carbon::parse($mailData['bill']->created_at)->format('d/m/Y') }}</span><br>
                        {{-- GL Date: <span id="gl_date">23 Feb 2018</span> --}}
                    </p>
                </div>
                <!--End Title-->
            </div>
            <!--End InvoiceTop-->


            @if ($mailData['bill'] != null)


                <div id="invoice-mid">
                    <div id="message">
                        <h2>C???m ??n {{ $mailData['bill']->uName }} ???? s??? d???ng d???ch v??? c???a ch??ng t??i</h2>

                    </div>
                    <div class="cta-group mobile-btn-group">
                        <a href="javascript:void(0);" class="btn-primary">Approve</a>
                        <a href="javascript:void(0);" class="btn-default">Reject</a>
                    </div>
                    <div class="clearfix">
                        <div class="col-left">
                            <div class="clientlogo"><img
                                    src="https://cdn3.iconfinder.com/data/icons/daily-sales/512/Sale-card-address-512.png"
                                    alt="Sup" /></div>
                            <div class="clientinfo">
                                <h2 id="supplier">M?? H??A ????N</h2>
                                <p><span id="address">{{ $mailData['bill']->name }}</span>
                                    {{-- <br><span id="city">RORETO DI
                                        CHERASCO</span><br><span id="country">IT</span> - <span
                                        id="zip">12062</span><br><span id="tax_num">555-555-5555</span><br> --}}
                                </p>
                                <br>
                                <div class="cta-group">
                                    @if ($mailData['bill']->pay_status == 0)
                                        <a class="btn-primary">Ch??a thanh to??n</a>
                                    @else
                                        <a class="btn-primary">???? thanh to??n</a>
                                    @endif
                                    {{-- <a href="javascript:void(0);" class="btn-default">Reject</a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-right">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td><span> Ng??y nh???n :</span><label id="payment_term">
                                                {{ Carbon\Carbon::parse($mailData['bill']->start_time)->format('d/m/Y') }}</label>
                                        </td>
                                        <td><span> Ng??y tr???
                                                :</span><label
                                                id="invoice_type">{{ Carbon\Carbon::parse($mailData['bill']->end_time)->format('d/m/Y') }}</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <?php $date = \Carbon\Carbon::parse($mailData['bill']->start_time)
                                            ->diff(\Carbon\Carbon::parse($mailData['bill']->end_time))
                                            ->format('%d');
                                        $total_voucher = 0; ?>
                                        <td colspan="2"><span>Th???i gian ??? th???c :</span><label
                                                id="note">{{ $date }} ng??y</label></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--End Invoice Mid-->
                <br>
                <br>
                <div id="invoice-bot">
                    <div id="table">
                        <table class="table bill_sevices_table">
                            <thead>
                                <tr>
                                    <th>T??n ph??ng</th>
                                    <th>Lo???i ph??ng</th>

                                    <th>S??? ng??y thu??</th>
                                    <th>Gi??/ng??y</th>
                                    <th>T???ng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($mailData['bill']->rooms != null)
                                    <?php $date = \Carbon\Carbon::parse($mailData['bill']->start_time)
                                        ->diff(\Carbon\Carbon::parse($mailData['bill']->end_time))
                                        ->format('%d');
                                    $total_voucher = 0; ?>
                                    @foreach ($mailData['bill']->rooms as $key)
                                        <tr>
                                            <td scope="row">{{ $key->name }}</td>
                                            <td> {{ $key->type_rooms_name }}</td>
                                            <td>{{ $date }}
                                                Ng??y
                                            </td>
                                            <td>{{ number_format($key->type_rooms_price) }}
                                                Vn??
                                            </td>
                                            <td> {{ number_format($key->type_rooms_price * $date) }}
                                                Vn??
                                                <?php
                                                $mailData['bill']->percent = $mailData['bill']->percent != null ? $mailData['bill']->percent : 0;
                                                $total_voucher = (($key->type_rooms_price * $date) / 100) * $mailData['bill']->percent; ?> <br>
                                                <span style="color: red">Gi???m
                                                    {{ $mailData['bill']->percent }}
                                                    %</span><br>
                                                <span style="color: red">-
                                                    {{ number_format($total_voucher) }}
                                                    Vn??

                                                </span>
                                            </td>

                                        </tr>
                                        <?php $tongRoom = $key->type_rooms_price * $date - $total_voucher; ?>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>T???ng :{{ number_format($tongRoom) }} Vn??
                                        </td>
                                    </tr>
                                @else
                                    <p style="color: black;padding:10px"> Kh??ng t??m th???y
                                        ph??ng</p>
                                @endif


                            </tbody>
                        </table>


                    </div>
                    <br>
                    <br>
                    <br>

                    <div id="service">
                        <table class="table bill_sevices_table">
                            <thead>
                                <tr>
                                    <th>T??n d???ch v???</th>
                                    <th>S??? l?????ng</th>
                                    <th>Gi??</th>
                                    <th>T???ng Ti???n</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($mailData['bill']->bill_sevices != null)
                                    <?php $tong = 0; ?>
                                    @foreach ($mailData['bill']->bill_sevices as $key)
                                        <tr>
                                            <td scope="row">{{ $key->svName }}
                                            </td>
                                            <td> {{ number_format($key->amount) }}</td>
                                            <td> {{ number_format($key->svPrice) }}
                                                Vn??</td>
                                            <td> {{ number_format($key->total_many) }}
                                                Vn??
                                            </td>
                                        </tr>
                                        <?php $tong += $key->total_many; ?>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>T???ng :{{ number_format($tong) }} Vn?? </td>
                                    </tr>
                                @else
                                    <p style="color: black;padding:10px"> Ch??a c?? d???ch
                                        v???</p>
                                @endif


                            </tbody>
                        </table>
                    </div>
                    <a class="btn-primary">T???ng thanh to??n : {{ number_format($mailData['bill']->total_money) }}
                        Vn??</a>
                    <br>
                    <h3>Stk: 1013347788 </h3>
                    <h3>Ng??n h??ng : Vietcomback</h3>
                </div>
            @endif
            <!--End InvoiceBot-->
            <footer>
                <div id="legalcopy" class="clearfix">
                    <p class="col-right">?????a ch??? email:
                        <span class="email"><a
                                href="mailto:supplier.portal@almonature.com">{{ $mailData['email'] }}</a></span>
                    </p>
                </div>
            </footer>

        </div>
        <!--End Invoice-->
    </div><!-- End Invoice Holder-->



</body>
