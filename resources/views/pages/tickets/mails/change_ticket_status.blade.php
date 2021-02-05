<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
</head>
<body bgcolor="#8d8e90">
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#f3f3f3">
    <tr>
        <td>
            <table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#fff" align="center" style="padding:16px">
                <tr>
                    <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="393" style="text-align: center">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td >
                                                <img src="{{$img}}/logo_{{$config->config_lang}}.png"  height="80" border="0" alt=""/>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr><td align="center">&nbsp;</td></tr>
                <tr><td>&nbsp;</td></tr>
                <tr>
                    <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="10%">&nbsp;</td>
                                <td width="80%" align="left" valign="top"><font style="font-family: Georgia, 'Times New Roman', Times, serif; color:#010101; font-size:24px"><strong><em>{{trans('web.reset_msg_0')}} {{$name}},</em></strong></font><br /><br />
                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#666766; font-size:13px; line-height:21px">{{trans('web.reset_msg_1')}}
                                        <br /><br />
                                        <a href="{{ url('user/reset_password_from_mail', $link)}}">@lang('web.clickToRest')</a>
                                        <br />
                                        {{trans('web.reset_msg_2')}}
                                        <br />
                                        {{trans('web.reset_msg_3')}}<br />
                                        {{trans('web.reset_msg_4')}}</font></td>
                                <td width="10%">&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td align="right" valign="top"></td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                <tr><td>&nbsp;</td></tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
