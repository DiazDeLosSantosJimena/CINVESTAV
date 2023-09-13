<!DOCTYPE html>

<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <title>Mis talleres</title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" /><!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: inherit !important;
        }

        #MessageViewBody a {
            color: inherit;
            text-decoration: none;
        }

        p {
            line-height: inherit
        }

        .desktop_hide,
        .desktop_hide table {
            mso-hide: all;
            display: none;
            max-height: 0px;
            overflow: hidden;
        }

        .image_block img+div {
            display: none;
        }

        @media (max-width:620px) {
            .desktop_hide table.icons-inner {
                display: inline-block !important;
            }

            .icons-inner {
                text-align: center;
            }

            .icons-inner td {
                margin: 0 auto;
            }

            .image_block img.fullWidth {
                max-width: 100% !important;
            }

            .mobile_hide {
                display: none;
            }

            .row-content {
                width: 100% !important;
            }

            .stack .column {
                width: 100%;
                display: block;
            }

            .desktop_hide,
            .desktop_hide table {
                display: table !important;
                max-height: none !important;
            }
        }
    </style>
</head>

<body style="background-color: #fff; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
    <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fff;" width="100%">
        <tbody>
            <tr>
                <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                        <tbody>
                            <tr>
                                <td>
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000; width: 600px; margin: 0 auto;" width="600">
                                        <tbody>
                                            <tr>
                                                <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                    <table border="0" cellpadding="0" cellspacing="0" class="image_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                        <tr>
                                                            <td class="pad" style="width:100%;padding-right:0px;padding-left:0px;">
                                                                <div align="center" class="alignment" style="line-height:10px"><img class="fullWidth" src="img/logo_color.jpg" style="height: auto; border: 0; max-width: 390px; width: 100%;" width="390" /></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border="0" cellpadding="10" cellspacing="0" class="heading_block block-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                        <tr>
                                                            <td class="pad">
                                                                <h1 style="margin: 0; color: #8a3c90; direction: ltr; font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 38px; font-weight: 700; letter-spacing: normal; line-height: 200%; text-align: center; margin-top: 0; margin-bottom: 0;"><span class="tinyMce-placeholder" style="background-color: #ffffff; color: #000000;">Talleres a los que se registro </span></h1>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                    </table>
                                    <br>
                                    <table class="table table-striped">
                                        <thead class="table-info">
                                            <tr>
                                                <td>Presentadores</td>
                                                <td>Nombre del proyecto</td>
                                                <td>Hora</td>
                                                <td>Fecha</td>
                                                <td>Sitio</td>
                                            </tr>
                                        </thead>
                                        @foreach($talleres as $t)
                                        <tr>
                                            <td>{{ $t->nameu}}</td>
                                            <td>{{ $t->title}}</td>
                                            <td>{{ $t->date}}</td>
                                            <td>{{ $t->hour}}</td>
                                            <td>{{ $t->site}}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                    <div class="spacer_block block-3" style="height:60px;line-height:60px;font-size:1px;"> </div>
                                    <div class="spacer_block block-4" style="height:60px;line-height:60px;font-size:1px;"> </div>
                                    <div class="spacer_block block-5" style="height:60px;line-height:60px;font-size:1px;"> </div>
                                    <div class="spacer_block block-6" style="height:60px;line-height:60px;font-size:1px;"> </div>
                                    <div class="spacer_block block-7" style="height:60px;line-height:60px;font-size:1px;"> </div>
                                    <table border="0" cellpadding="0" cellspacing="0" class="image_block block-10" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                        <tr>
                                            <td class="pad" style="width:100%;padding-right:0px;padding-left:0px;">
                                                <div align="center" class="alignment" style="line-height:10px"><img src="img/logocinves.png" style="height: auto; border: 0; max-width: 240px; width: 100%;" width="240" /></div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table><!-- End -->
</body>

</html>